<?php
require_once __DIR__ . '/src/config/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Удаляем комментарий и все его ответы
    $stmt = $pdo->prepare("DELETE FROM comments WHERE id = ? OR parent_id = ?");
    $stmt->execute([$id, $id]);
}

header('Location: admin.php');
exit;
?>
