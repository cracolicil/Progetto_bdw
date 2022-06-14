<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>
  <div class="header">
    <?php include('header.php');?>
  </div>
  <?php
  $infoFilm = $_SESSION['infoFilm'];
  foreach($infoFilm as $value): ?>
  <p>
    <?php echo $value['titolo'] . '<br>Durata: ' . $value['durata'] . ' min<br>Uscita: ' . $value['anno'] . '<br>genere: ' . $value['genere'] . '<br>';?>
  </p>
  <?php endforeach; ?>
</body>
</html>
