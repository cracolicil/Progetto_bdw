<?php
session_start();
include 'connection.php';

$db = OpenCon();

$sqlInfo = "SELECT f.titolo as titolo, f.trama as trama, f.durata as durata, f.anno as anno, g.nome as genere FROM `film` as f
            JOIN `generefilm` as gf ON f.idFilm = gf.idFilm 
            JOIN `generi` as g ON g.idGenere = gf.idGenere
            WHERE f.idFilm = " . $_SESSION['idFilm'];

# $sqlDirector;
# $sqlActors;

$statement = $db->query($sqlInfo);
$infoFilm = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['infoFilm'] = $infoFilm;

header('Location: film_page.html.php');

?>