<?php
include 'connection.php';

$db = OpenCon();

$sqlFilm = "SELECT idFilm, titolo, YEAR(anno) as anno FROM " . "`FILM` WHERE titolo LIKE '%" . $_POST['searchname'] . "%'";

$statement = $db->query($sqlFilm);

$films = $statement->fetchAll(PDO::FETCH_ASSOC);

if($films){
  echo '<b>Film trovati:</b><br>';
  foreach($films as $film){
    echo '<a href="info_film.php?idFilm='.$film['idFilm'].'">' . $film['titolo'] . ' ' . $film['anno'] . '</a><br>';
  }
}

$nome = explode(' ',$_POST['searchname']);

$sqlPersone = "SELECT idPersona, nome, cognome FROM `PERSONE` WHERE nome LIKE '%" . $nome[0] . "%' OR cognome LIKE '%" . $nome[0] . "%'";

$statement = $db->query($sqlPersone);

$persone = $statement->fetchALL(PDO::FETCH_ASSOC);

if($persone){
  echo '<b>Persone trovate:</b><br>';
  foreach($persone as $persona){
    echo '<a href="info_person.php?idPerson='.$persona['idPersona'].'">' . $persona['nome'] . ' ' . $persona['cognome'] . '</a><br>';
  }
}

?>
