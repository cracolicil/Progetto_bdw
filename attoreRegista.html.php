<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Attore fun fact</title>
</head>
<body>
  <div class="header">
    <?php include('header.php');?>
  </div>
  <?php
  include 'connection.php';

  $db = OpenCon();

  $director = $_GET['idPersona'];

    $sql = "SELECT p.idPersona, p.nome, p.cognome
            FROM `persone` as p
            JOIN `ruolo` as r ON p.idPersona = r.idPersona
            JOIN `film` as f ON r.idFilm = f.idFilm
            WHERE r.ruolo = 'Attore' and (SELECT COUNT(r3.idRuolo)
                                          FROM `film` as f3
                                          JOIN `ruolo` as r3 ON f3.idFilm = r3.idFilm
                                          JOIN `persone` as p3 ON p3.idPersona = r3.idPersona
                                          WHERE r3.ruolo = 'Attore' and p3.idPersona = p.idPersona and f3.idFilm = ANY(SELECT f2.idFilm
                                                                                                                        FROM `persone` as p2
                                                                                                                        JOIN `ruolo` as r2 ON p2.idPersona = r2.idPersona
                                                                                                                        JOIN `film` as f2 ON r2.idFilm = f2.idFilm
                                                                                                                        WHERE r2.ruolo = 'Regista' and p2.idPersona = ".$director.")) >= ALL(SELECT COUNT(r4.idRuolo)
                                                                                                                                                                                FROM `film` as f4
                                                                                                                                                                                JOIN `ruolo` as r4 ON f4.idFilm = r4.idFilm
                                                                                                                                                                                JOIN `persone` as p4 ON p4.idPersona = r4.idPersona
                                                                                                                                                                                WHERE r4.ruolo = 'Attore' and p4.idPersona != p.idPersona and f4.idFilm = ANY(SELECT f5.idFilm
                                                                                                                                                                                                                                                              FROM `persone` as p5
                                                                                                                                                                                                                                                              JOIN `ruolo` as r5 ON p5.idPersona = r5.idPersona
                                                                                                                                                                                                                                                              JOIN `film` as f5 ON r5.idFilm = f5.idFilm
                                                                                                                                                                                                                                                              WHERE r5.ruolo = 'Regista' and p5.idPersona = ".$director."))
    
    
    GROUP BY (p.idPersona)";

  $statement = $db->query($sql);

  $actors = $statement->fetchAll(PDO::FETCH_ASSOC);

  $sqlName = "SELECT cognome, nome FROM `persone` WHERE idPersona = ".$director."";

  $statement = $db->query($sqlName);
  $nomeDirector = $statement->fetchAll(PDO::FETCH_ASSOC);

  if($actors){
    foreach($actors as $actor){
        echo "<p>L'attore che ha partecipato in più film di ".$nomeDirector[0]['cognome']." ".$nomeDirector[0]['nome']." è ".$actor['cognome']." ".$actor['nome']."</p>";
    }
  }
  ?>
</body>
</html>
