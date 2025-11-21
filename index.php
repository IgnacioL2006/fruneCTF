<?php 
    session_start();          
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

        <!-- Bootstrap para el diseño responsivo y estilos rápidos -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/main.css">
        <script src="javascript/eventManager.js"></script>
    </head>

    <body>

        <!-- Header cargado desde JS -->
        <div id="header"></div>

        <main class="container-fluid p-0">  

            <!-- Portada centrada usando utilidades de Bootstrap -->
            <section id="portada" class="d-flex flex-column text-center align-items-center justify-content-center p-4">
                
                <div id="portada_texto" class="container">
                    <h1>Demuestra quién manda en el arte del hacking</h1>
                    <h3>Resuelve retos, encuentra vulnerabilidades y captura las banderas ocultas para ganar.</h3>
                </div>

                <!-- Botón cambia según si el usuario está logueado -->
                <?php if (is_logged_in()): ?>
                    <a class="boton mt-3" href="activities.html"><span>Jugar</span></a>
                <?php else: ?>
                    <a class="boton mt-3" href="user_login.php"><span>Empezar gratis</span></a>
                <?php endif; ?>

            </section>

            <script>
                // Pequeño efecto de desplazamiento en la portada
                const portada = document.querySelector('#portada');
                const offsetInicial = -750;
                window.addEventListener('scroll', () => {
                    let offset = window.scrollY;
                    portada.style.backgroundPositionY = offsetInicial - offset * 0.2 + "px";
                });
            </script>

            <!-- Contenedor principal de la info -->
            <div id="Inicio" class="container py-5">

                <!-- Introducción centrada -->
                <article class="row justify-content-center">

                    <!-- Caja principal con sombra y fondo claro -->
                    <div id="introduccion" class="col-12 col-md-10 col-lg-8 shadow rounded p-4 bg-light d-flex flex-column align-items-center gap-3">
                        
                        <h2>¿Qué es frune CTF?</h2>
                        <p>
                            En <b>fruneCTF</b> puedes poner a prueba tus habilidades en seguridad informática y 
                            <i>hacking ético</i>. Resuelve retos de criptografía, forense digital, explotación y más.
                        </p>
                        
                        <hr>

                        <h4>Características principales:</h4>
                        <ul class="text-start">
                            <li>Retos de criptografía</li>
                            <li>Análisis forense</li>
                            <li>Explotación de vulnerabilidades</li>
                            <li>Rankings en tiempo real</li>
                        </ul>

                        <h4>Pasos para empezar:</h4>
                        <ol class="text-start">
                            <li>Crea una cuenta</li>
                            <li>Elige una actividad</li>
                            <li>Resuelve los retos</li>
                            <li>Consigue banderas</li>
                        </ol>

                    </div>
                </article>

                <!-- Sección con las 4 características -->
                <div class="row mt-5 g-600">

                    <!-- Cada tarjeta usa una columna responsiva -->
                    <div class="col-12 col-md-6 col-lg-3 shadow rounded p-3 bg-light">
                        <h3>Actividades</h3>
                        <p>Explora una variedad de retos diseñados para entrenar tus habilidades.</p>
                        <img src="images/1.png" class="img-fluid shadow rounded" alt="Ejemplo de actividad">
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 shadow rounded p-3 bg-light">
                        <h3>Competición</h3>
                        <p>Participa en eventos en tiempo real y compite contra otros usuarios.</p>
                        <img src="images/2.png" class="img-fluid shadow rounded" alt="Competición">
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 shadow rounded p-3 bg-light">
                        <h3>Rankings y puntuaciones</h3>
                        <p>Tu progreso se refleja en el ranking global con cada bandera que ganas.</p>
                        <img src="images/3.png" class="img-fluid shadow rounded" alt="Ranking">
                    </div>

                    <div class="col-12 col-md-6 col-lg-3 shadow rounded p-3 bg-light">
                        <h3>Noticias</h3>
                        <p>Mantente al día con novedades, actualizaciones y próximos eventos.</p>
                        <img src="images/4.png" class="img-fluid shadow rounded" alt="Noticias">
                    </div>

                </div>

            </div>

        </main>

        <!-- Footer cargado desde JS -->
        <div id="footer"></div>

        <!-- Script de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
