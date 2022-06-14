<?php
// Start the session
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Lista film</title>
</head>
<body>
  <div class="header">
    <?php include('header.php');?>
  </div>
  <?php
  include 'connection.php';

  $db = OpenCon();

    $sql = "SELECT * FROM `FILM`";

  $statement = $db->query($sql);

  $films = $statement->fetchAll(PDO::FETCH_ASSOC);

  if($films){
    foreach($films as $film){
      echo '<a href=info_film.php?idFilm='.$film['idFilm'].'>' . $film['titolo'] . '</a><br>';
    }
  }
  ?>
</body>
</html>
