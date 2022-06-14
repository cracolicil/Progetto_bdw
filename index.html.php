<html>
  <head>
    <link rel="stylesheet" href="index.css" />
    <title>Home del progetto</title>
  </head>
  <body>
    <div class="header">
      <?php include('header.php');?>
    </div>
    <form action="ricerca.php" method="post">
      <label for="search">Cerca:</label><br />
      <input type="text" id="search" name="searchname" />
      <!--<label for="tab">In: </label>
    <select id="tab" name="tab">
      <option value="film">Film</option>
      <option value="persone">Persone</option>
      <option value="">Genere</option>
      <option value="tutto">Tutto</option>
    </select> -->
      <input type="submit" value="Search" />
    </form>
    Oppure dai un'occhiata alla
    <a href="lista_film.html.php">lista completa dei film</a>
  </body>
</html>
