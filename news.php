<?php
#----------------------------------------------
#               CONTENIDO PHP
#----------------------------------------------
    include 'conex.php';
    session_start();

    // ID del usuario logueado
    $logged_id = $_SESSION['user_id'] ?? null;

    // Consultar SQL para los datos del usuario que se está viendo
    $sql = "SELECT admin FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $logged_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user   = $result->fetch_assoc();
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
         <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="javascript/page_structure.js"></script>
    </head>

    <body>
        <!-- Header -->
        <div id="header"></div>

            <!-- Title for the page -->
            <div id="title">
                <h1>NOTICIAS</h1>
                <h3>Enterate de las noticias importantes sobre fruneCTF</h3> 
                <img src="images/4.png" alt=""> 
            </div>

            <!-- Form to add new news_letters -->
            <?php if ($user): ?>
                <?php if ($user['admin'] == 1): ?>
                    <div id="news_creator">
                        <form method="post" action="create_news_letter.php">

                            <input type="hidden" name="user_id" value="<?= $logged_id ?>">

                            <label for="title"> Title: </label>
                            <input type="text" name="title" id="title">

                            <label for="body"> Body: </label>
                            <textarea name="body" id="body" rows="5" cols="40" placeholder="Write your news here..."></textarea>

                            <button type="submit">Submit</button>

                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Empty container for all the news_letters, added via JS -->
            <div id="news_container">
            </div>


        <!-- Lgoic Script -->
        <script src="javascript/news.js"></script>
    </body>

    <!-- Footer -->
    <div id="footer"></div>
</html>