<?php
$hostname = "localhost";
$dbname = "libreriafilm";
$user = "root";
$pass = "";
  try{
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
  }catch(PDOException $e){
    echo "Errore: " . $e->getMessage();
  }

  $sql = "SELECT * FROM " . "`" . $_POST["tab"] . "`" . " WHERE ";

  $statement = $db->query($sql);

  $films = $statement->fetchAll(PDO::FETCH_ASSOC);

  if($films){
    foreach($films as $film){
      echo $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['durata'] . '<br>';
    }
  }
?>
