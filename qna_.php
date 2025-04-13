<?php
// require_once 'db.php';
require_once 'qna.php';

// $qna = new QnA($pdo);
$data = $qna->getAllQnA();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Otázky a odpovede</title>
</head>
<body>
    <h1>Otázky a odpovede</h1>
    <?php foreach ($data as $item): ?>
        <div class="qna-item">
            <h3>Otázka:</h3>
            <p><?= htmlspecialchars($item['question']) ?></p>
            <h4>Odpoveď:</h4>
            <p><?= htmlspecialchars($item['answer']) ?></p>
            <hr>
        </div>
    <?php endforeach; ?>
</body>
</html>
