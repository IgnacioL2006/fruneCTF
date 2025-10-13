<?php
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------
    include 'conex.php';
    // Consulta SQL para obtener todos los países
    $query = "SELECT id, name, iso_code FROM countries ORDER BY name ASC";
    $result = $conn->query($query);
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
        <title>INICIAR SESIÓN</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/userlogin.css">
        <!-- JS -->
        <script src="javascript/page_structure.js"></script>
    </head>

    <body>

    <!-- Header -->
    <div id="header"></div>

    <!-- Formulario -->
    <div class="form-container">

        <!-- Botones de cambio -->
        <div class="tab-buttons">
            <button id="login-tab" class="active">Iniciar sesión</button>
            <button id="register-tab">Registrarse</button>
        </div>

        <!-- Panel de formularios -->
        <div class="forms-slider">

            <!-- Formulario LOGIN -->
            <div class="form-panel" id="login-form">
                <h2>Iniciar sesión</h2>
                <!-- Estructura formulario -->
                <form action="user_login_result.php" method="post">

                    <label for="login-user">Usuario</label>
                    <input type="text" id="LOGIN-MAIL" name="LOGIN-MAIL" required>

                    <label for="login-pass">Contraseña</label>
                    <input type="password" id="LOGIN-PASS" name="LOGIN-PASS" required>

                    <input type="submit" value="Ingresar">

                </form>
            </div>

            <!-- Formulario REGISTRO -->
            <div class="form-panel" id="register-form">
                <h2>Registrarse</h2>
                <!-- Estructura formulario -->
                <form action="user_register_result.php" method="post" enctype="multipart/form-data">

                    <label for="MAIL">Correo electrónico</label>
                    <input type="text" id="MAIL" name="MAIL" maxlength="100" required>

                    <label for="PASSWORD">Contraseña</label>
                    <input type="password" id="PASSWORD" name="PASSWORD" maxlength="15" required>

                    <label for="R-PASSWORD">Repetir contraseña</label>
                    <input type="password" id="R-PASSWORD" name="R-PASSWORD" maxlength="15" required>

                    <label for="NAME">Nombre y apellido</label>
                    <input type="text" id="NAME" name="NAME" maxlength="30" required>

                    <label for="WEBNAME">Apodo</label>
                    <input type="text" id="WEBNAME" name="WEBNAME" maxlength="30" required>

                    <label>Sexo</label><br>
                    <input type="radio" id="hombre" name="sexo" value="hombre" checked>
                    <label for="hombre">Hombre</label>
                    <input type="radio" id="mujer" name="sexo" value="mujer">
                    <label for="mujer">Mujer</label>
                    <input type="radio" id="otro" name="sexo" value="otro">
                    <label for="otro">Otro / Prefiero no decirlo</label><br><br>

                    <!-- Construir lista de países -->
                    <label for="pais">País</label>         
                    <select id="COUNTRY" name="COUNTRY" required>
                        <option value="">-- Selecciona un país --</option>
                        <?php
                        if ($result->num_rows > 0) {
                            # Conseguri cada fila
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'.intval($row['id']).'">'.htmlspecialchars($row['name']).' ('.$row['iso_code'].')</option>';
                            }
                        }
                        ?>
                    </select>

                    <!-- Lista local para preguntarle al usuario como conoció la página -->
                    <label for="origenPagina">¿Cómo conociste la página?</label>
                    <select id="origenPagina" name="origenPagina">

                        <option value="0" selected>--Sin especificar--</option>
                        <option value="1">Por redes sociales</option>
                        <option value="2">Por un amigo / familiar</option>
                        <option value="3">Publicidad online</option>
                        <option value="4">Correo electrónico / Newsletter</option>
                        <option value="5">Motores de búsqueda (Google, Bing, etc.)</option>
                        <option value="6">Eventos o conferencias</option>
                        <option value="7">Medios impresos (revistas, periódicos)</option>
                        <option value="8">Otro</option>

                    </select>

                    <input type="submit" value="Registrarse">

                </form>
            </div>
        </div>


    </div>
    


    <!-- Ejecutar Footer -->
    <div id="footer"></div>

    <!-- Ejecutar javaScript para el formulario -->
    <script src="javascript/form.js"></script>

    </body>
</html>
