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
  foreach($infoFilm as $value): 
    $date = new DateTime($value['anno']);
  ?>
  <p>
    <?php echo $value['titolo'] . '<br>Durata: ' . $value['durata'] . ' min<br>Uscita: ' . $date->format('jS F Y') . '<br>genere: ' . $value['genere'] . '<br>';?>
  </p>
  <p>
    <?php echo 'Trama:'?>
  </p>
    <?php include($value['trama']);?>
  <br><br>
  <?php endforeach; ?>
  <?php
  $people = $_SESSION['people'];
  foreach($people as $value): ?>
    <a href="info_person.php?idPerson=<?php echo $value['idPersona'] ?>"  class="link">
      <?php echo $value['nome'] . ' ' . $value['cognome'] . ' Ruolo: ' . $value['ruolo'] . '<br>';?>
    </a>
    <?php endforeach; ?>
</body>
</html>
