<?php
session_start();
include 'connection.php';

$db = OpenCon();

$idFilm = $_GET['idFilm'];

$sqlInfo = "SELECT f.titolo as titolo, f.trama as trama, f.durata as durata, f.anno as anno, g.nome as genere FROM `film` as f
            JOIN `generefilm` as gf ON f.idFilm = gf.idFilm 
            JOIN `generi` as g ON g.idGenere = gf.idGenere
            WHERE f.idFilm = " . $idFilm;

$statement = $db->query($sqlInfo);
$infoFilm = $statement->fetchAll(PDO::FETCH_ASSOC);

$sqlPeople = "SELECT p.idPersona, p.nome, p.cognome, r.ruolo 
              FROM `film` as f
              JOIN `ruolo` as r ON f.idFilm = r.idFilm
              JOIN `persone` as p ON p.idPersona = r.idPersona
              WHERE f.idFilm = " . $idFilm . "
              ORDER BY r.ruolo DESC, p.cognome ASC, p.nome ASC ";

$statement = $db->query($sqlPeople);
$people = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['infoFilm'] = $infoFilm;
$_SESSION['people'] = $people;

header('Location: film_page.html.php');

?>