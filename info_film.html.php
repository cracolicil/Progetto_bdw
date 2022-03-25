<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>
  <?php
  include 'connection.php';

  $db = OpenCon();

  //passare l'id con $_SESSION
  $sqlFilm = "SELECT * FROM `FILM` as f
              JOIN `RUOLO` as r ON f.idFilm = r.idFilm
              JOIN `PERSONE` as p ON p.idPersona = r.idPersona
              WHERE f.idFilm = " . $_SESSION["idFilm"];

  //mettere a posto la call di connection.php

  $statement = $db->query($sqlFilm);

  $films = $statement->fetchAll(PDO::FETCH_ASSOC);

  if($films){
    echo $films[0]['titolo'] . ' ' . $films[0]['durata'] . ' min ' . $films[0]['anno'] . '<br>';
    foreach($films as $film){
      echo $film['ruolo'] . ' ' . $film['nome'] . ' ' .  $film['cognome'] . '<br>';

    }
  }

  ?>
  <?php
  // remove all session variables
  session_unset();

  // destroy the session
  session_destroy();
  ?>
</body>
</html>
