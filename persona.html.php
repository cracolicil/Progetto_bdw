<html>
<head>
  <title>Profilo persona</title>
</head>
<body>
  <?php
    $hostname = "localhost";
    $dbname = "libreriafilm";
    $user = "root";
    $pass = "";
    try{
      $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    }catch(PDOException $e){
      echo "Errore: " . $e->getMessage();
    }

    $nome = $_GET['nome'];
    $cognome = $_GET['cognome'];

    $sql = 'SELECT f.titolo FROM `persone` as p JOIN `ruolo` as r ON p.idPersona = r.idPersona JOIN `film` as f ON r.idFilm = f.idFilm
            WHERE p.nome = "' . $nome . '" AND p.cognome = "' . $cognome . '"';

    $statement = $db->query($sql);

    $persondata = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($persondata){
      echo $nome . ' ' . $cognome . '<br>';
      echo 'filmografia = <br>';
      foreach($persondata as $film){
        echo $film['titolo'] . '<br>';
      }
    }
  ?>
</body>
</html>
