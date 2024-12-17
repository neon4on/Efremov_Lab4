<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/src/config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'] ?? null;
    $parentId = $_POST['parent_id'] ?? null;
    $userName = $_POST['user_name'];
    $comment = $_POST['comment'];

    if (!$productId || !$userName || !$comment) {
        die("Все поля обязательны для заполнения.");
    }

    $stmt = $pdo->prepare("INSERT INTO comments (product_id, user_name, comment, parent_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$productId, $userName, $comment, $parentId]);

    header("Location: product.php?id=$productId");
    exit;
}
?>