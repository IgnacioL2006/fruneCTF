<?php
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------

// Inicio de sesión y conexiones necesarias
session_start();
include 'conex.php';
include 'session_helper.php';

// Consulta SQL para obtener todos los usuarios
$sql = "SELECT id, webname, name, photo_url, description FROM users ORDER BY id ASC";
$result = $conn->query($sql);

// Almacenar usuarios en un array
$users = [];
if ($result && $result->num_rows > 0) {
    // Fetch_assoc para crear un array donde las claves son los nombres de las columnas de la tabla
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
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
            <title>COMUNIDAD</title>
            <link rel="stylesheet" href="css/community.css">
            <script src="javascript/page_structure.js"></script>
    </head>
    
    <body>
        <!-- Header -->
        <div id="header"></div>

        <!-- Contenido de al comunidad -->
        <section id="forum">
            <h1>COMUNIDAD</h1>
            <h2>Explora los perfiles de la comunidad</h2>

            <?php if (empty($users)): ?> <!-- Si no hay usuarios, se le informa al usuario -->
                <p>No hay usuarios registrados.</p>
            <?php else: ?> <!-- Si hay usuarios, se muestra una lista-->
                <div id="results">
                    <?php foreach ($users as $user): ?>
                        <div class="user-result">

                            <!-- Foto de perfil -->
                            <img 
                                src="<?= htmlspecialchars($user['photo_url'] ?: 'images/user-images/user_image_place_holder.jpg') ?>" 
                                alt="Foto de <?= htmlspecialchars($user['webname']) ?>" 
                                class="user-photo"
                            >

                            <!-- Contenedor vertical para nombre y descripción -->
                            <div class="user-info">
                                <span class="user-name"><?= htmlspecialchars($user['webname']) ?> (<?= htmlspecialchars($user['name']) ?>)</span>
                                <span class="user-desc"><?= htmlspecialchars($user['description']) ?></span>
                            </div>

                            <!-- Botón para mostrar perfil -->
                            <button onclick="window.location.href='user_viewer.php?user_id=<?= $user['id'] ?>'">Ver Perfil</button>
                            <!-- window.location.href indica la URL actual de la página, si se le asigna un nuevo valor, el navegador irá a esa página -->
                            <!-- Con "user_id= $user['id']" se construye la página con la ID del usuario seleccionado -->

                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- Footer -->
        <div id="footer"></div>
    </body>
</html>
