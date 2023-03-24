<?php
require_once 'config.php';

if (isset($_POST['submit'])) {
  $stmt = $pdo->prepare('UPDATE knihy SET nazev = :nazev, autor = :autor, vydavatel = :vydavatel, pocet_stran = :pocet_stran, rok_vydani = :rok_vydani, cena = :cena WHERE id = :id');
  $stmt->execute(array(
    ':id' => $_POST['id'],
    ':nazev' => $_POST['nazev'],
    ':autor' => $_POST['autor'],
    ':vydavatel' => $_POST['vydavatel'],
    ':pocet_stran' => $_POST['pocet_stran'],
    ':rok_vydani' => $_POST['rok_vydani'],
    ':cena' => $_POST['cena']
  ));
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare('SELECT * FROM knihy WHERE id = :id');
$stmt->execute(array(':id' => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
  echo "Řádek nebyl nalezen";
  return;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Upravit knihu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="container">
    <h1>Upravit knihu</h1>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <div class="form-group">
        <label>Název</label>
        <input type="text" class="form-control" name="nazev" value="<?php echo $row['nazev']; ?>">
      </div>
      <div class="form-group">
        <label>Autor</label>
        <input type="text" class="form-control" name="autor" value="<?php echo $row['autor']; ?>">
      </div>
      <div class="form-group">
        <label>Vydavatel</label>
        <input type="text" class="form-control" name="vydavatel" value="<?php echo $row['vydavatel']; ?>">
      </div>
      <div class="form-group">
        <label>Počet stran</label>
        <input type="number" class="form-control" name="pocet_stran" value="<?php echo $row['pocet_stran']; ?>">
      </div>
      <div class="form-group">
        <label>Rok vydání</label>
        <input type="number" class="form-control" name="rok_vydani" value="<?php echo $row['rok_vydani']; ?>">
      </div>
      <div class="form-group">
        <label>Cena</label>
        <input type="number" class="form-control" name="cena" value="<?php echo $row['cena']; ?>">
      </div>
      <input type="submit" name="submit" value="Uložit" class="btn btn-primary">
      <a href="index.php" class="btn btn-default">Zpět</a>
    </form>

  </div>
</body>

</html>