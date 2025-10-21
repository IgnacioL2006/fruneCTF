<?php 
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------
    session_start();          
    include 'session_helper.php'; 
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
        <title>FRUNE CTF</title>
        <link rel="stylesheet" href="css/main.css">
        <script src="javascript/page_structure.js"></script>
    </head>

    <body>
        <!-- Header -->
        <div id="header"></div>

        <main>  
            <!-- Seccion de portada -->
            <section id="portada">
                <div id="portada_texto">
                    <h1>Demuestra quién manda en el arte del hacking</h1>
                    <h3>Resuelve retos, encuentra vulnerabilidades y captura las banderas ocultas para ganar.</h3>
                </div>

                <?php if (is_logged_in()): ?>
                    <a class="boton" href="activities.html"><span>Jugar</span></a>
                <?php else: ?>
                    <a class="boton" href="user_login.php"><span>Empezar gratis</span></a>
                <?php endif; ?>
            </section>

            <!-- Efecto Parallax -->
            <script>
                const portada = document.querySelector('#portada');
                const offsetInicial = -550;
                window.addEventListener('scroll', () => {
                    let offset = window.scrollY;
                    portada.style.backgroundPositionY = offsetInicial - offset * 0.2 + "px";
                });
            </script>

            <!-- Seccion principal -->
            <div id="Inicio">
                <article>
                    <div id="introduccion">
                        <h2>¿Qué es frune CTF?</h2>
                        <p>
                            En <b>fruneCTF</b> puedes poner a prueba tus habilidades en seguridad informática y 
                            <i>hacking ético</i>. Resuelve retos de criptografía, forense digital, explotación y más.
                        </p>
                        
                        <hr>

                        <h4>Características principales:</h4>
                        <ul>
                            <li>Retos de criptografía</li>
                            <li>Análisis forense</li>
                            <li>Explotación de vulnerabilidades</li>
                            <li>Rankings en tiempo real</li>
                        </ul>

                        <h4>Pasos para empezar:</h4>
                        <ol>
                            <li>Crea una cuenta</li>
                            <li>Elige una actividad</li>
                            <li>Resuelve los retos</li>
                            <li>Consigue banderas</li>
                        </ol>

                        <h3>Actividades</h3>
                        <p>
                            Explora una variedad de retos diseñados para entrenar tus habilidades. 
                            Cada actividad tiene distintos niveles de dificultad y tipos de desafíos.
                        </p>
                        <img src="images/1.png" alt="Ejemplo de actividad">

                        <h3>Competición</h3>
                        <p>
                            Participa en eventos en tiempo real y compite contra otros usuarios para ver quién completa 
                            primero los retos. ¡Demuestra que eres el mejor hacker!
                        </p>
                        <img src="images/2.png" alt="Competición">

                        <h3>Rankings y puntuaciones</h3>
                        <p>
                            Tu progreso se refleja en el ranking global. Cada bandera que capturas suma puntos y te 
                            permite subir posiciones frente a otros participantes.
                        </p>
                        <img src="images/3.png" alt="Ranking">

                        <h3>Noticias</h3>
                        <p>
                            Mantente al día con las últimas novedades, actualizaciones de retos y anuncios de próximos 
                            eventos en el mundo de fruneCTF.
                        </p>
                        <img src="images/4.png" alt="Noticias">

                        <hr>
                    </div>
                </article>
            </div>
        </main>

        <!-- Footer -->
        <div id="footer"></div>

    </body>
</html>
