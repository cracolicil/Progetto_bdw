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
  /*
  per gestire SESSION di idFilm
  -array di session idFilm??
  -modo più corretto sarebbe assegnare SESSION al click e non si riesce (credo) con href
  -faccio tutto in sta page e passo con SESSION le cose importanti?? NO non ha senso, devo passare SOLO l'id
  */

  if($films){
    foreach($films as $film){
      echo '<a href=info_film.html.php>' . $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['durata'] . '</a><br>';
    }
  }
  ?>
</body>
</html>
