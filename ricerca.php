<?php
include 'connection.php';

$db = OpenCon();

$sqlFilm = "SELECT * FROM " . "`FILM` WHERE titolo LIKE '%" . $_POST['searchname'] . "%'";

//mettere a posto la call di connection.php

$statement = $db->query($sqlFilm);

$films = $statement->fetchAll(PDO::FETCH_ASSOC);

if($films){
  foreach($films as $film){
    echo $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['anno'] . '<br>';
  }
}

?>
