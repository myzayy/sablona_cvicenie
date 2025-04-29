<?php
$host = 'localhost';  // host
$dbname = 'new_database';  // db name
$username = 'root';  // user name
$password = '';  // heslo

try {
    // connect to db
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // configuring PDOs to throw exceptions in case of errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection error: ' . $e->getMessage();
}
?>
