<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Regista fun fact</title>
</head>
<body>
  <div class="header">
    <?php include('header.php');?>
  </div>
  <?php
  include 'connection.php';

  $db = OpenCon();

  $anno = $_GET['anno'];  

  $sql = "SELECT p.idPersona, p.nome, p.cognome
          FROM `persone` as p
          JOIN `ruolo` as r ON p.idPersona = r.idPersona
          JOIN `film` as f ON r.idFilm = f.idFilm
          WHERE r.ruolo = 'regista' and YEAR(f.anno) = ".$anno." and (SELECT COUNT(f2.idFilm) as numFilm
                                                                 FROM `film` as f2
                                                                 JOIN `ruolo` as r2 ON f2.idFilm = r2.idFilm
                                                                 JOIN `persone` as p2 ON p2.idPersona = r2.idPersona
                                                                 WHERE YEAR(f2.anno) = ".$anno." and p.idPersona = p2.idPersona) >= ALL (SELECT COUNT(f3.idFilm)
                                                                                                                                    FROM `film` as f3
                                                                                                                                    JOIN `ruolo` as r3 ON f3.idFilm = r3.idFilm
                                                                                                                                    JOIN `persone` as p3 ON p3.idPersona = r3.idPersona
                                                                                                                                    WHERE YEAR(f3.anno) = ".$anno." and r3.ruolo = 'Regista' and p.idPersona != p3.idPersona)
          GROUP BY(p.idPersona)";

  $statement = $db->query($sql);

  $directors = $statement->fetchAll(PDO::FETCH_ASSOC);

  if($directors){
    foreach($directors as $director){
      echo '<p>Il regista che ha diretto più film nel'.$director['cognome'].' '.$director['nome'].'</p>';
    }
  }
  ?>
</body>
</html>
