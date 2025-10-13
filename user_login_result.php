<?php
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------

    # Conexiones necesarias
    session_start();
    include 'conex.php';

    // Conseguir y limpiar correo y contraseña
    $mail = isset($_POST['LOGIN-MAIL']) ? trim(strtolower($_POST['LOGIN-MAIL'])) : '';
    $pass = isset($_POST['LOGIN-PASS']) ? trim($_POST['LOGIN-PASS']) : '';

    // Validaciones
    $errors = [];

    // Preparar consulta para conseguir id y password
    $query_check = $conn->prepare("SELECT id, password FROM users WHERE TRIM(LOWER(mail)) = ?");
    if ($query_check) {
        $query_check->bind_param("s", $mail);
        $query_check->execute();
        // Obtener resultados
        $query_check->bind_result($id_db, $hashed_password_db);
        if (!$query_check->fetch()) {
            // Si no se trae ninguna fila
            $errors[] = "El correo ingresado no está registrado";
        }
        $query_check->close();
    }

    // Mostrar errores
    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p>".htmlspecialchars($err)."</p>";
        }
        exit;
    }

    // Verificar la contraseña
    if (!password_verify($pass, $hashed_password_db)) {
        echo "<p>Contraseña incorrecta <a href='user_login.php'>Volver</a></p>";
        exit;
    }

    // Si llegó hasta aquí, login exitoso
    $query_name = $conn->prepare("SELECT name FROM users WHERE id = ?");
    $query_name->bind_param("i", $id_db);
    $query_name->execute();
    $query_name->bind_result($user_name_db);
    $query_name->fetch();
    $query_name->close();

    $_SESSION['user_id']   = $id_db;
    $_SESSION['user_name'] = $user_name_db;
    header("Location: main.php");
?>
