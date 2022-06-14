<?php
// Start the session
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Pagina film</title>
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
  <?php
  $people = $_SESSION['people'];
  foreach($people as $value): ?>
    <a href="info_person.php?idPerson=<?php echo $value['idPersona'] ?>"  class="person-link">
      <?php echo $value['nome'] . ' ' . $value['cognome'] . ' Ruolo: ' . $value['ruolo'] . '<br>';;?>
    </a>
    <?php endforeach; ?>
</body>
</html>