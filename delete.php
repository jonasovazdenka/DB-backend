<?php
require_once 'config.php';

if (isset($_POST['delete']) && isset($_POST['id'])) {
  $stmt = $pdo->prepare('DELETE FROM knihy WHERE id = :id');
  $stmt->execute(array(':id' => $_POST['id']));
  header('Location: index.php');
  return;
}

if (!isset($_GET['id'])) {
  echo "Řádek nebyl nalezen";
  return;
}

$stmt = $pdo->prepare('SELECT nazev FROM knihy WHERE id = :id');
$stmt->execute(array(':id' => $_GET['id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
  echo "Řádek nebyl nalezen";
  return;
}

$nazev = htmlentities($row['nazev']);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Smazat knihu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">

</head>

<body>
  <div class="container">
    <h1>Smazat knihu</h1>
    <p>Jste si jisti, že chcete smazat knihu "<?php echo $nazev; ?>"?</p>
    <form method="post">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <input type="submit" name="delete" value="Smazat" class="btn btn-danger">
      <a href="index.php" class="btn btn-default">Zpět</a>
    </form>
  </div>
</body>

</html>