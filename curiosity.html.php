<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Fun facts</title>
</head>
<body>
  <div class="header">
    <?php include('header.php');?>
  </div>
  <?php
    include 'connection.php';

    $db = OpenCon();

    $sql = "SELECT YEAR(anno) as anno
            FROM `film`";

    $statement = $db->query($sql);
    $years = $statement->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT p.idPersona, p.nome, p.cognome
            FROM `persone` as p
            JOIN `ruolo` as r ON p.idPersona = r.idPersona
            WHERE r.ruolo = 'Regista'
            GROUP BY(p.idPersona)";
    
    $statement = $db->query($sql);
    $directors = $statement->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <form action="registaFilmAnno.html.php" method="GET">
      il regista che ha diretto più film nel
      <select id="anno" name="anno">
          <?php 
            if($years){
                foreach($years as $year){
                    echo '<option value="'.$year['anno'].'">'.$year['anno'].'</option>';
                }
            }
          ?>
      </select>
      <input type="submit" value="Avvia" />
  </form>

  <form action="attoreRegista.html.php" method="GET">
      l'attore che ha partecipato in più film di
      <select id="idPersona" name="idPersona">
          <?php 
            if($directors){
                foreach($directors as $director){
                    echo '<option value="'.$director['idPersona'].'">'.$director['cognome'].' '.$director['nome'].'</option>';
                }
            }
          ?>
      </select>
      <input type="submit" value="Avvia" />
  </form>
</body>
</html>