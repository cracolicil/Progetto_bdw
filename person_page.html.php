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
  $infoPerson = $_SESSION['infoPerson'];
  foreach($infoPerson as $value): ?>
  <p>
    <?php echo $value['nome'] . ' ' . $value['cognome'] . '<br>Data di nascita: ' . $value['data_nascita'] . '<br>Data di morte: ' . (($value['data_morte'])?$value['data_morte']:"N/A") . '<br>';?>
  </p>
  <?php endforeach; ?>
  <?php
  $directed = $_SESSION['directed'];
  if($directed):
      ?>
      <p>Film diretti:</p>
      <?php
      foreach($directed as $value): ?>
        <a href="info_film.php?idFilm=<?php echo $value['idFilm'] ?>"  class="link">
          <?php echo $value['titolo'] . ' ' . $value['anno'] . '<br>';?>
        </a>
        <?php endforeach; ?>
    <?php endif; ?>
  <?php
  $acted = $_SESSION['acted'];
  if($acted):
      ?>
      <p>Film in cui ha recitato:</p>
      <?php
      foreach($acted as $value): ?>
        <a href="info_film.php?idFilm=<?php echo $value['idFilm'] ?>"  class="link">
          <?php echo $value['titolo'] . ' ' . $value['anno'] . '<br>';?>
        </a>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
