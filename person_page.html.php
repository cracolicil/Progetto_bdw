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
  foreach($infoPerson as $value): 
    $birth_date = new DateTime($value['data_nascita']);
    if($value['data_morte']){$death_date = new DateTime($value['data_morte']);}else{$death_date = '';}
  ?>
  <p>
    <?php echo $value['nome'] . ' ' . $value['cognome'] . '<br>Data di nascita: ' . $birth_date->format('jS F Y') . '<br>Data di morte: ' . (($death_date)?$death_date->format('jS F Y'):"N/A") . '<br>';?>
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
