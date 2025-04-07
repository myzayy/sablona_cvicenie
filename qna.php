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
    public function insertQnA($question, $answer) {
        // Kontrola, ci kombinacia uz existuje
        $sqlCheck = "SELECT COUNT(*) FROM qna WHERE question = :question AND answer = :answer";
        $stmtCheck = $this->pdo->prepare($sqlCheck);
        $stmtCheck->execute([
            ':question' => $question,
            ':answer' => $answer
        ]);
        $count = $stmtCheck->fetchColumn();
    
        if ($count > 0) {
            return "Táto otázka a odpoveď už existujú!";
        }
    
        // Ak neexistuje, vlozte ho
        $sqlInsert = "INSERT INTO qna (question, answer) VALUES (:question, :answer)";
        $stmtInsert = $this->pdo->prepare($sqlInsert);
        $stmtInsert->execute([
            ':question' => $question,
            ':answer' => $answer
        ]);
    
        return "Úspešne pridané!";
    }
    
}

?>
