<?php
session_start();

// Проверяем авторизацию
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/src/config/db.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir('./templates/');
$smarty->setCompileDir('./templates_c/');

// Получаем список товаров
$stmt = $pdo->query("SELECT p.*, c.name AS category FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получаем категории
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

// Получаем комментарии
$comments = $pdo->query("SELECT * FROM comments ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

// Передаём данные в шаблон
$smarty->assign('products', $products);
$smarty->assign('categories', $categories);
$smarty->assign('comments', $comments);
$smarty->assign('admin_username', $_SESSION['admin']);

$smarty->display('admin.tpl');
?>