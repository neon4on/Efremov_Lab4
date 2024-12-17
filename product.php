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
    die("Товар не найден. Укажите ID товара.");
}

// Получение данных о товаре
$stmt = $pdo->prepare("
    SELECT p.*, c.name AS category 
    FROM products p 
    LEFT JOIN categories c ON p.category_id = c.id 
    WHERE p.id = ?
");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Товар с указанным ID не найден.");
}

// Получение комментариев для товара
$stmt = $pdo->prepare("
    SELECT * 
    FROM comments 
    WHERE product_id = ? 
    ORDER BY parent_id ASC, created_at ASC
");
$stmt->execute([$productId]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Строим дерево комментариев
function buildCommentTree($comments) {
    $tree = [];
    $refs = [];

    foreach ($comments as &$comment) {
        $comment['replies'] = [];
        $refs[$comment['id']] = &$comment;

        if ($comment['parent_id'] === 0 || $comment['parent_id'] === null) {
            $tree[] = &$comment;
        } else {
            if (isset($refs[$comment['parent_id']])) {
                $refs[$comment['parent_id']]['replies'][] = &$comment;
            }
        }
    }

    return $tree;
}

$commentTree = buildCommentTree($comments);

// Передача данных в шаблон
$smarty->assign('product', $product);
$smarty->assign('comments', $commentTree);
$smarty->display('product.tpl');
?>
