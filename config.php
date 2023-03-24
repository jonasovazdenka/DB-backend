<?php
$host = 'localhost';  // adresář MySQL serveru
$dbname = 'books';  // název databáze
$username = 'root';  // uživatelské jméno
$password = '';  // heslo
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'Připojení k databázi selhalo: ' . $e->getMessage();
}
