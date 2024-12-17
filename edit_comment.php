<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/src/config/db.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir('./templates/');
$smarty->setCompileDir('./templates_c/');

$commentId = $_GET['id'] ?? null;

if (!$commentId) {
    die("Комментарий не найден.");
}

// Если форма отправлена, обновляем комментарий
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST['user_name'];
    $commentText = $_POST['comment'];

    $stmt = $pdo->prepare("UPDATE comments SET user_name = ?, comment = ? WHERE id = ?");
    $stmt->execute([$userName, $commentText, $commentId]);

    header('Location: admin.php');
    exit;
}

// Получаем данные комментария
$stmt = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
$stmt->execute([$commentId]);
$comment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$comment) {
    die("Комментарий не найден.");
}

$smarty->assign('comment', $comment);
$smarty->display('edit_comment.tpl');
?>
