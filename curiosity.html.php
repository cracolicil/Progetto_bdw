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

    $sql = "SELECT YEAR(anno) as anni
            FROM `film`
            GROUP BY (anni)";

    $statement = $db->query($sql);
    $years = $statement->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <form action="registaFilmAnno.html.php" method="GET">
      il regista che ha diretto più film nel
      <select id="anno" name="anno">
          <?php 
            if($years){
                foreach($years as $year){
                    echo '<option value="'.$year['anni'].'">'.$year['anni'].'</option>';
                }
            }
          ?>
      </select>
      <input type="submit" value="Avvia" />
  </form>
</body>
</html>