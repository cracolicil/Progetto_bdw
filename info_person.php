<?php
session_start();
include 'connection.php';

$db = OpenCon();

$idPerson = $_GET['idPerson'];

$sqlInfo = "SELECT *
            FROM `persone`
            WHERE idPersona = " . $idPerson;

$statement = $db->query($sqlInfo);
$infoPerson = $statement->fetchAll(PDO::FETCH_ASSOC);

$sqlDirected = "SELECT f.idFilm, f.titolo, f.anno
                FROM `film` as f
                JOIN `ruolo` as r ON f.idFilm = r.idFilm
                JOIN `persone` as p ON p.idPersona = r.idPersona
                WHERE p.idPersona = " . $idPerson . " AND r.ruolo = 'Regista'
                ORDER  BY f.anno";

$statement = $db->query($sqlDirected);
$directed = $statement->fetchAll(PDO::FETCH_ASSOC);

$sqlActed = "SELECT f.idFilm, f.titolo, f.anno
             FROM `film` as f
             JOIN `ruolo` as r ON f.idFilm = r.idFilm
             JOIN `persone` as p ON p.idPersona = r.idPersona
             WHERE p.idPersona = " . $idPerson . " AND r.ruolo = 'Attore'
             ORDER BY f.anno";

$statement = $db->query($sqlActed);
$acted = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['infoPerson'] = $infoPerson;
$_SESSION['directed'] = $directed;
$_SESSION['acted'] = $acted;

header('Location: person_page.html.php');

?>