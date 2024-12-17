<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/smarty/libs/Smarty.class.php';
require_once __DIR__ . '/src/config/db.php';

$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir('./templates/');
$smarty->setCompileDir('./templates_c/');

// Получаем категории для фильтров
$categories = $pdo->query("SELECT * FROM categories ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

// Получаем параметры из GET-запроса
$categoryId = $_GET['category'] ?? null;
$sort = $_GET['sort'] ?? null;
$search = $_GET['search'] ?? null;

// Строим SQL-запрос
$query = "SELECT * FROM products WHERE 1=1";
$params = [];

if (!empty($categoryId)) {
    $query .= " AND category_id = ?";
    $params[] = $categoryId;
}

if (!empty($search)) {
    $query .= " AND (name LIKE ? OR description LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if (!empty($sort)) {
    if ($sort === 'id_desc') {
        $query .= " ORDER BY id DESC";
    } elseif ($sort === 'id_asc') {
        $query .= " ORDER BY id ASC";
    }
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$smarty->assign('categories', $categories);
$smarty->assign('products', $products);
$smarty->assign('filters', [
    'category' => $categoryId,
    'sort' => $sort,
    'search' => $search
]);

$smarty->display('catalog.tpl');
?>
