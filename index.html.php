<html>
  <head>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Home del progetto</title>
  </head>
  <body>
    <div class="header">
      <?php include('header.php');?>
    </div>
    <form action="ricerca.html.php" method="post">
      <label for="search">Cerca:</label><br />
      <input type="text" id="search" name="searchname" />
      <input type="submit" value="Search" />
    </form>
    Oppure dai un'occhiata alla
    <a href="lista_film.html.php">lista completa dei film</a>
  </body>
</html>
