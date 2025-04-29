<?php
// require_once 'db.php';
require_once 'qna.php';

// $qna = new QnA($pdo);
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    if (!empty($question) && !empty($answer)) {
        $message = $qna->insertQnA($question, $answer);
    } else {
        $message = "Vyplňte všetky polia.";
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Pridať otázku</title>
</head>
<body>
    <h1>Pridať otázku a odpoveď</h1>
    
    <form method="post">
        <label>Otázka:<br>
            <textarea name="question" rows="3" cols="40" required></textarea>
        </label><br><br>
        <label>Odpoveď:<br>
            <textarea name="answer" rows="3" cols="40" required></textarea>
        </label><br><br>
        <button type="submit">Pridať</button>
    </form>

    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>
</body>
</html>
