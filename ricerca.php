<?php
include 'connection.php';

$db = OpenCon();

$sqlFilm = "SELECT * FROM " . "`FILM` WHERE titolo LIKE '%" . $_POST['searchname'] . "%'";

$statement = $db->query($sqlFilm);

$films = $statement->fetchAll(PDO::FETCH_ASSOC);

if($films){
  echo '<b>Film trovati:</b><br>';
  foreach($films as $film){
    echo $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['anno'] . '<br>';
  }
}

$nome = explode(' ',$_POST['searchname']);

$sqlPersone = "SELECT * FROM `PERSONE` WHERE nome LIKE '%" . $nome[0] . "%' OR cognome LIKE '%" . $nome[0] . "%'";

$statement = $db->query($sqlPersone);

$persone = $statement->fetchALL(PDO::FETCH_ASSOC);

if($persone){
  echo '<b>Persone trovate:</b><br>';
  foreach($persone as $persona){
    echo $persona['nome'] . ' ' . $persona['cognome'] . '<br>';
  }
}

?>
