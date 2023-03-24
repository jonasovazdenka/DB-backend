<?php
require_once 'config.php';

$stmt = $pdo->query('SELECT * FROM knihy');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Knihy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
  <div class="container">
    <h1>Knihy</h1>
    <a href="add.php" class="btn btn-primary">Přidat knihu</a>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Název</th>
          <th>Autor</th>
          <th>Vydavatel</th>
          <th>Počet stran</th>
          <th>Rok vydání</th>
          <th>Cena</th>
          <th>Akce</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rows as $row) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nazev']; ?></td>
            <td><?php echo $row['autor']; ?></td>
            <td><?php echo $row['vydavatel']; ?></td>
            <td><?php echo $row['pocet_stran']; ?></td>
            <td><?php echo $row['rok_vydani']; ?></td>
            <td><?php echo $row['cena']; ?></td>
            <td>
              <div class="button-group">
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Upravit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Smazat</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</body>

</html>