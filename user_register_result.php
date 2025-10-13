<?php
    include("conex.php");

    #----------------------------------------------
    #               CONTENIDO PHP
    #----------------------------------------------

    // Se recogen los datos del formulario
    $mail        = isset($_POST['MAIL'])       ? trim($_POST['MAIL'])    : '';
    $password    = isset($_POST['PASSWORD'])   ? $_POST['PASSWORD']      : '';
    $rpassword   = isset($_POST['R-PASSWORD']) ? $_POST['R-PASSWORD']    : '';
    $name        = isset($_POST['NAME'])       ? trim($_POST['NAME'])    : '';
    $webname     = isset($_POST['WEBNAME'])    ? trim($_POST['WEBNAME']) : '';
    $country_id  = isset($_POST['COUNTRY'])    && $_POST['COUNTRY']      !== '' ? intval($_POST['COUNTRY']) : null;

    ################### EXPLICACIÓN VARIABLES ###################
    # $_POST['MAIL']        = El valor enviado desde el formulario.
    # isset($_POST['MAIL']) = Verifica si el usuario entrego información.
    # trim($_POST['MAIL'])  = Si se entregó se aplica trim() para eliminar espacios.
    # : '' si no existe, se asigna una cadena vacía
    #############################################################

    // Validaciones
    $errors = []; // Lista para almacenar errores
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) $errors[] = "Email inválido";
    if (strlen($password) < 8)                     $errors[] = "La contraseña debe tener al menos 8 caracteres";
    if ($password !== $rpassword)                  $errors[] = "Las contraseñas no coinciden";
    if (empty($name))                              $errors[] = "El nombre es obligatorio";

        // Verificar si el CORREO ya está registrado
        $query_check = $conn->prepare("SELECT id FROM users WHERE mail = ?");
        if ($query_check) {
            $query_check->bind_param("s", $mail); # Cada letra indica el tipo de dato [s - string] [i - int]
            $query_check->execute();
            $query_check->store_result();
            if ($query_check->num_rows > 0) {
                $errors[] = "No puedes registrarte por que el correo que ingresaste ya está registrado";
            }
            $query_check->close();
        }

        // Verificar si el WEBNAME ya está registrado
        $query_check = $conn->prepare("SELECT id FROM users WHERE webname = ?");
        if ($query_check) {
            $query_check->bind_param("s", $webname); 
            $query_check->execute();
            $query_check->store_result();
            if ($query_check->num_rows > 0) {
                $errors[] = "El apodo ingresado ya está en uso, por favor elige otro";
            }
            $query_check->close();
        }   

    // Mostrar errores
    if (!empty($errors)) {
        echo "<h1> ERROR </h1>";
        foreach ($errors as $err) {
            echo "<p>".htmlspecialchars($err)."</p>";
        }
        exit;
    }

    // Hashear contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); # función de php que convierte una contraseña en un hash seguro.

    // Preparar consulta SQL para insertar al usuario a la base de datos
    $query_correct = $conn->prepare("INSERT INTO users (mail, password, name, webname, country_id) VALUES (?, ?, ?, ?, ?)"); # ejecutar consulta de forma segura
    # Se utiliza signos de interrogación como placeholder, es una forma de decir que se proporcionarán los datos despúes.
    if (!$query_correct) { # Verificar si la preparación fue exitosa.
        die("Error: " . $conn->error);
    }

    $query_correct->bind_param(
        "ssssi", 
        $mail,
        $hashed_password,
        $name,
        $webname,
        $country_id 
    );

    // Ejecutar resultados de la consulta
    if ($query_correct->execute()) { 
        echo "Registro exitoso. <a href='user_login.php'>Iniciar sesión</a></p>";
    } else {
        echo "Error al registrar <a href='user_login.php'>Reintentar</a></p>";
    }

    # Terminar conexión
    $query_correct->close();
    $conn->close();
?>
