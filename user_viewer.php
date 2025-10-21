<?php
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------
    // Conexiones necesarias
    session_start();
    include 'conex.php';
    include 'session_helper.php';

    // ID del usuario que se está viendo, se consigue desde community.php / header.php
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;
    // ID del usuario logueado
    $logged_id = $_SESSION['user_id'] ?? null;

    // Consultar SQL para los datos del usuario que se está viendo
    $sql = "SELECT id, name, webname, register_time, description, flags_won, competitions_won, photo_url 
            FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user   = $result->fetch_assoc();

    // Si no se encuentra el usuario
    if (!$user) {
        echo "Usuario no encontrado";
        exit;
    }

    // Si el usuario está modificando su descripción
    if (isset($_POST['new_description']) && $logged_id === $user_id) {
        // Conseguir string
        $new_desc = trim($_POST['new_description']);
        // Actualizar en la base de datos
        $stmt = $conn->prepare("UPDATE users SET description = ? WHERE id = ?");
        $stmt->bind_param("si", $new_desc, $user_id);
        $stmt->execute();
        // Actualizar visualmente sin recargar
        $user['description'] = $new_desc; 
    }

    // Si el usuario actual está subiendo una nueva foto
    if (isset($_FILES['new_photo']) && $logged_id === $user_id) {
        $file = $_FILES['new_photo'];

        if ($file['error'] === 0) {
            // Obtener extensión (png, jpg, etc.)
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            // Nombre único y fijo para cada usuario
            $new_name = "user_image_" . $user_id . "." . $ext;
            $path     = "images/user-images/" . $new_name;

            // Si ya existía una imagen previa se elimina
            foreach (glob("images/user-images/user_image." . $user_id . ".*") as $oldFile) {
                unlink($oldFile);
            }

            // Subir nueva imagen a la base de datos
            if (move_uploaded_file($file['tmp_name'], $path)) {
                $stmt = $conn->prepare("UPDATE users SET photo_url = ? WHERE id = ?");
                $stmt->bind_param("si", $path, $user_id);
                $stmt->execute();
                // Actualizar visualmente sin recargar
                $user['photo_url'] = $path;
            }
        }
    }

?>

<!DOCTYPE html>
<!------------------------------------------------
                CONTENIDO HTML
-------------------------------------------------->
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="CTF, puzzles, acertijos, hacking ético, seguridad informática, retos de lógica">
        <meta name="description" content="FRUNE CTF - Plataforma de acertijos, retos de lógica y hacking ético.">
        <meta name="author" content="FruneCTF Team">
        <title>Perfil de <?= htmlspecialchars($user['name']) ?></title>
        <link rel="stylesheet" href="css/userviewer.css">
        <script src="javascript/page_structure.js"></script>
        <script src="javascript/user_profile.js"></script>
    </head>

    <body>
        <!-- Header -->
        <div id="header"></div>

        <!-- Contenido del usuario -->
        <section id="perfil-usuario">

            <!-- Principal -->
            <div id="user-card">
                <!-- Conseguir datos del usuario -->
                <!-- Foto del usuario -->
                <img id="user-foto" src="<?= htmlspecialchars($user['photo_url'] ?: 'images/user-images/user_image_place_holder.jpg') ?>" alt="Foto de perfil">
                <!-- Apodo y nombre -->
                <p><strong><?= htmlspecialchars($user['webname'])?></strong> - <?= htmlspecialchars($user['name'])?></p>
                <!-- Fecha de creación de la cuenta -->
                <p>Se unió a fruneCTF el <?= htmlspecialchars($user['register_time']) ?></p>
                <!-- Descripción de la cuenta -->
                <p id="user-desc"><?= htmlspecialchars($user['description']) ?></p>
            </div>

            <!-- Estadisticas de la cuenta -->
            <div id="user-statistics">
                <p><strong>Banderas conseguidas:</strong> <?= htmlspecialchars($user['flags_won']) ?></p>
                <p><strong>Competiciones ganadas:</strong> <?= htmlspecialchars($user['competitions_won']) ?></p>
            </div>
                
            <!-- Personalización de la cuenta -->
            <?php if ($logged_id === $user_id): ?> <!-- Disponibles unicamente si el usuario es el mismo -->
                <div id="user-options">

                    <!-- Botones -->
                    <button onclick="toggleDescForm()">Modificar descripción</button>
                    <button onclick="toggleImgForm()">Modificar imagen</button>
                    <a href="logout.php" class="btn-logout">Cerrar sesión</a>

                    <!-- Formularios ocultos -->

                    <!-- Descripción -->
                    <form id="desc-form" method="POST" style="display:none;">
                        <textarea name="new_description" placeholder="Escribe tu nueva descripción..."><?= htmlspecialchars($user['description']) ?></textarea>
                        <br>
                        <button type="submit">Guardar</button>
                    </form>
                    <!-- Imagen -->
                    <form id="img-form" method="POST" enctype="multipart/form-data" style="display:none;">
                        <input type="file" name="new_photo" accept="image/*" required>
                        <button type="submit">Subir nueva imagen</button>
                    </form>
                </div>
            <?php endif; ?>
        </section>

        <!-- Foro de usuario -->
        <section id="forum">
            <h1>El foro de <?= htmlspecialchars($user['webname'])?> aún está en construcción</h1>
            <h5>Los foros estarán habilitados en la entrega 3</h5>
        </section>

        <!-- footer -->
        <div id="footer"></div>

    </body>
</html>
