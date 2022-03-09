<html>
<head>
</head>
<body>
  <?php //ricerca di tutti i film query="SELECT * FROM `FILM`"
    $hostname = "localhost";
    $dbname = "libreriafilm";
    $user = "root";
    $pass = "";
    try{
      $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
    }catch(PDOException $e){
      echo "Errore: " . $e->getMessage();
    }

    $sql = "SELECT * FROM `FILM`";

    $statement = $db->query($sql);

    $films = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($films){
      foreach($films as $film){
        echo $film['titolo'] . ' ' . $film['durata'] . ' min ' . $film['durata'] . '<br>';
      }
    }
  ?>
</body>
</html>
