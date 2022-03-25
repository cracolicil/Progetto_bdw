<?php
function OpenCon(){
  $hostname = "localhost";
  $dbname = "libreriafilm";
  $user = "root";
  $pass = "";
  try{
    $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
  }catch(PDOException $e){
    echo "Errore: " . $e->getMessage();
  }

  return $db;
}
?>
