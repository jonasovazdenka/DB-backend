<?php
require_once 'config.php';

if (isset($_POST['submit'])) {
  $nazev = $_POST['nazev'];
  $autor = $_POST['autor'];
  $vydavatel = $_POST['vydavatel'];
  $pocet_stran = $_POST['pocet_stran'];
  $rok_vydani = $_POST['rok_vydani'];
  $cena = $_POST['cena'];

  $stmt = $pdo->prepare('INSERT INTO knihy (nazev, autor, vydavatel, pocet_stran, rok_vydani, cena) VALUES (:nazev, :autor, :vydavatel, :pocet_stran, :rok_vydani, :cena)');
  $stmt->execute(array(
    ':nazev' => $nazev,
    ':autor' => $autor,
    ':vydavatel' => $vydavatel,
    ':pocet_stran' => $pocet_stran,
    ':rok_vydani' => $rok_vydani,
    ':cena' => $cena
  ));
  header('Location: index.php');
  return;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Přidat knihu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="container">
    <h1>Přidat knihu</h1>
    <form method="post">
      <div class="form-group">
        <label>Název</label>
        <input type="text" name="nazev" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Autor</label>
        <input type="text" name="autor" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Vydavatel</label>
        <input type="text" name="vydavatel" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Počet stran</label>
        <input type="number" name="pocet_stran" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Rok vydání</label>
        <input type="number" name="rok_vydani" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Cena</label>
        <input type="number" name="cena" class="form-control" required>
      </div>
      <input type="submit" name="submit" value="Přidat" class="btn btn-primary">
      <a href="index.php" class="btn btn-default">Zpět</a>
    </form>

  </div>
</body>

</html>