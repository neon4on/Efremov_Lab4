<?php
require_once __DIR__ . '/src/config/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Удаляем категорию
    $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
    try {
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        die("Невозможно удалить категорию, так как она используется товарами.");
    }
}

header('Location: admin.php');
exit;
?>
