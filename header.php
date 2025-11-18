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

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/header.css">
</head>

<body>

  <header class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
      
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="images/logo.png" alt="FRUNE CTF" width="160" height="70" class="me-2">
      </a>

      <!-- Button for mobiles -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCTF" aria-controls="navbarCTF" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarCTF">
        <ul class="navbar-nav mb-2 mb-lg-0 mx-auto"> 
          
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <img src="images/ico3.png" alt="Inicio" width="20" height="20" class="me-1">
              Principal
            </a>
          </li>

          <li class="nav-item">
            <?php if (is_logged_in()): ?>
              <a class="nav-link" href="activities.html">
            <?php else: ?>
              <a class="nav-link" href="user_login.php">
            <?php endif; ?>
                <img src="images/ico5.png" alt="Actividades" width="20" height="20" class="me-1">
                Actividad
              </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <img src="images/ico1.png" alt="Competencias" width="20" height="20" class="me-1">
              Competir
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="community.php">
              <img src="images/ico6.png" alt="Social" width="20" height="20" class="me-1">
              Social
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="news.php">
              <img src="images/ico4.png" alt="Noticias" width="20" height="20" class="me-1">
              Noticias
            </a>
          </li>
        </ul>
      </div>

      <!-- Register button -->
      <div class="d-flex align-items-center">

        <?php if (is_logged_in()): ?>
          <a class="btn btn-outline-light" href="user_viewer.php?user_id=<?= $_SESSION['user_id'] ?>">
            <?= htmlspecialchars($_SESSION['user_name']) ?>
          </a>

        <?php else: ?>
          <a class="btn btn-outline-light" href="user_login.php">Registrarse</a>
        <?php endif; ?>
        
      </div>

    </div>
  </header>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
