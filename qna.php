<?php
require_once 'db.php'; // pripojenie do db

class QnA {
    private $pdo;

    // akceptovanie PDO
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Metóda na ziskanie všetkych otazok a odpovedi
    public function getAllQnA() {
        $sql = "SELECT question, answer FROM qna";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Vracia pole asociativnych poli
    }
}
?>
