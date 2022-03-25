<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>
  <?php //ricerca di tutti i film query="SELECT * FROM `FILM`"
  include 'connection.php';

  $db = OpenCon();

    $sql = "SELECT * FROM `FILM`";

  $statement = $db->query($sql);

  $films = $statement->fetchAll(PDO::FETCH_ASSOC);

  $_SESSION["idFilm"] = 1;

  if($films){
    foreach($films as $film){
      echo '<a href=info_film.html.php>' . $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['durata'] . '</a><br>';
    }
  }
  ?>
</body>
</html>
