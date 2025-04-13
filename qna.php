<?php

namespace App\Models;

use App\Core\Database;
use PDO;

require_once __DIR__ . '/db/Database.php'; // cesta ku Database.php

class QnA extends Database {

    public function __construct() {
        // vola konstruktor nadradenej triedy Database
        parent::__construct();
    }

    public function getAllQnA() {
        $sql = "SELECT question, answer FROM qna";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertQnA($question, $answer) {
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

        $sqlInsert = "INSERT INTO qna (question, answer) VALUES (:question, :answer)";
        $stmtInsert = $this->pdo->prepare($sqlInsert);
        $stmtInsert->execute([
            ':question' => $question,
            ':answer' => $answer
        ]);

        return "Úspešne pridané!";
    }
}
