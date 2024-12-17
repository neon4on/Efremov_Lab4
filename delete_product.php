<?php
require_once __DIR__ . '/src/config/db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Удаляем связанные изображения
    $stmt = $pdo->prepare("DELETE FROM product_images WHERE product_id = ?");
    $stmt->execute([$id]);

    // Удаляем сам товар
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: admin.php');
exit;
?>
