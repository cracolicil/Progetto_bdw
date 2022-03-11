<?php
  exec('connection.php');

  $sql = "SELECT * FROM " . "`" . $_POST["tab"] . "`" . " WHERE ";

  $statement = $db->query($sql);

  $films = $statement->fetchAll(PDO::FETCH_ASSOC);

  if($films){
    foreach($films as $film){
      echo $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['durata'] . '<br>';
    }
  }
?>
