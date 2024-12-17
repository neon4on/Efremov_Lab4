<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/src/config/db.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir('./templates/');
$smarty->setCompileDir('./templates_c/');

$categoryId = $_GET['id'] ?? null;

if (!$categoryId) {
    die("Категория не найдена.");
}

// Если форма отправлена, обновляем категорию
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    if (empty($name)) {
        die("Название категории не может быть пустым.");
    }

    $stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
    $stmt->execute([$name, $categoryId]);

    header('Location: admin.php');
    exit;
}

// Получаем данные категории
$stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
$stmt->execute([$categoryId]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    die("Категория не найдена.");
}

$smarty->assign('category', $category);
$smarty->display('edit_category.tpl');
?>
