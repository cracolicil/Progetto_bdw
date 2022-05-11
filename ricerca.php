<?php
include 'connection.php';

$db = OpenCon();

$sqlFilm = "SELECT * FROM " . "`FILM` WHERE titolo LIKE '%" . $_POST['searchname'] . "%'";

$statement = $db->query($sqlFilm);

$films = $statement->fetchAll(PDO::FETCH_ASSOC);

if($films){
  echo 'Film trovati:<br>';
  foreach($films as $film){
    echo $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['anno'] . '<br>';
  }
}

$nome = explode(' ',$_POST['searchname']);

$sqlPersone = "SELECT * FROM `PERSONE` WHERE nome LIKE '%" . $nome[0] . "%' AND cognome LIKE '%" . $nome[1] . "%'";

$statement = $db->query($sqlPersone);

$persone = $statement->fetchALL(PDO::FETCH_ASSOC);

if($persone){
  echo 'Persone trovate:<br>';
  foreach($persone as $persona){
    echo $persona['nome'] . ' ' . $persona['cognome'] . '<br>';
  }
}

?>
