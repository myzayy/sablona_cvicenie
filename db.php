<?php
$host = 'localhost'; // host
$dbname = 'project'; // nazov bd
$username = 'root'; // meno usera
$password = ''; // heslo usera

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Nastavenie chybového režimu
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Chyba pripojenia k databáze: " . $e->getMessage());
}
?>
