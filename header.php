<?php 
session_start();
include 'conex.php';
include 'session_helper.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="CTF, puzzles, acertijos, hacking ético, seguridad informática, retos de lógica">
        <meta name="description" content="FRUNE CTF - Plataforma de acertijos, retos de lógica y hacking ético.">
        <meta name="author" content="FruneCTF Team">
        <title>FRUNE CTF</title>
        <link rel="stylesheet" href="css/header.css">
    </head>

    <!--
    Este documento se utiliza como HEADER general para todas las sub-paginas
    implementa el logo de la pagina y una serie de hypervinculos como indice de navegación con iconos asociados
    -->

    <body>

        <header>


            <div class="logo">
                <img src="images/logo.png" alt="FRUNE CTF" class="logo-img">
            </div>

            <nav>
                <ul>
                    <li>
                        <a class="navegador" href="main.php">
                            <img src="images/ico3.png" alt="Inicio"> Principal
                        </a>
                    </li>
                    <li>
                        <!-- La dirección del botón "Actividad" cambia según si el usuario inició sesión-->
                        <?php if (is_logged_in()): ?>
                            <a class="Actividades" href="activities.html">
                        <?php else: ?>
                            <a class="Actividades" href="user_login.php">
                        <?php endif; ?>
                            <img src="images/ico5.png" alt="Actividades"> Actividad
                        </a>
                    </li>
                    <li>
                        <a class="navegador" href="#">
                            <img src="images/ico1.png" alt="Competencias"> Competir
                        </a>
                    </li>
                    <li>
                        <a class="navegador" href="community.php">
                            <img src="images/ico6.png" alt="Clasificaciones"> Social
                        </a>
                    </li>
                    <li>
                        <a class="navegador" href="#">
                            <img src="images/ico4.png" alt="Noticias"> Noticias
                        </a>
                    </li>
                </ul>

                <!-- La dirección del botón para registrarse / iniciar sesión cambia según si el usuario inició sesión-->
                <?php if (is_logged_in()): ?>
                    <!-- Si ya inició sesión, manda al usuario a su cuenta -->
                    <a class="user_login" href="user_viewer.php?user_id=<?= $_SESSION['user_id'] ?>">
                        <span><?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    </a>
                <?php else: ?>
                    <a class="user_login" href="user_login.php"><span>Registrarse</span></a>
                <?php endif; ?>   

            </nav>
        </header>
    </body>
</html>
