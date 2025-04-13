<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    protected $pdo;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'project';
        $username = 'root';
        $password = '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Chyba pripojenia k databáze: " . $e->getMessage());
        }
    }

    // metoda pristupu ku PDO:
    public function getConnection() {
        return $this->pdo;
    }
}
?>
