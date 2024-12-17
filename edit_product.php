<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/src/config/db.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir('./templates/');
$smarty->setCompileDir('./templates_c/');

$productId = $_GET['id'] ?? null;

if (!$productId) {
    die("Товар не найден.");
}

// Если форма отправлена, обрабатываем данные
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    // Если новое изображение загружено, заменяем его
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = $_FILES['image'];
        $imagePath = 'uploads/' . uniqid() . '_' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $imagePath);

        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, category_id = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $category, $imagePath, $productId]);
    } else {
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, category_id = ? WHERE id = ?");
        $stmt->execute([$name, $description, $category, $productId]);
    }

    header('Location: admin.php');
    exit;
}

// Получаем данные о товаре
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Товар не найден.");
}

// Получаем категории для формы
$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign('product', $product);
$smarty->assign('categories', $categories);
$smarty->display('edit_product.tpl');
?>
