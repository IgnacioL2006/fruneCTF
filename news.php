<?php
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------
    include 'conex.php';
    session_start()
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
        <title>Noticias</title>
        <!-- CSS -->
        <link rel="stylesheet" href="css/news.css">
        <!-- JS -->
        <script src="javascript/page_structure.js"></script>
    </head>

    <body>
        <!-- Header -->
        <div id="header"></div>


            <div id="title">
                <h1>NOTICIAS</h1>
                <h3>Enterate de las noticias importantes sobre fruneCTF</h3> 
                <img src="images/4.png" alt=""> 
            </div>

            <div id="news_creator">
                <form method="post" action="create_news_letter.php">
                    
                    <label for="title"> Title: </label>
                    <input type="text" name="title" id="title">

                    <label for="body"> Body: </label>
                    <textarea name="body" id="body" rows="5" cols="40" placeholder="Write your news here..."></textarea>

                    <label for="author"> Author: </label>
                    <input type="text" name="author" id="author">

                    <button type="submit">Submit</button>

                </form>
            
            <button id="update_button">Update</button>

            <div id="news_container">
            </div>


        <!-- Lgoic Script -->
        <script src="javascript/news.js"></script>

        <!-- Footer -->
        <div id="footer"></div>

    </body>
</html>