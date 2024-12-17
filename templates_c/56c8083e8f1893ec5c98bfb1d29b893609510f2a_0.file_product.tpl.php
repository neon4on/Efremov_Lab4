<?php
/* Smarty version 5.4.2, created on 2024-12-17 10:37:54
  from 'file:product.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67614672826a70_25691448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56c8083e8f1893ec5c98bfb1d29b893609510f2a' => 
    array (
      0 => 'product.tpl',
      1 => 1734428262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67614672826a70_25691448 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['name'], ENT_QUOTES, 'UTF-8', true);?>
</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $_smarty_tpl->getValue('product')['image'];?>
" alt="<?php echo $_smarty_tpl->getValue('product')['name'];?>
" class="img-fluid img-thumbnail">
        </div>
        <div class="col-md-6">
            <h1><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
            <p><strong>Категория:</strong> <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['category'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            <p><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
        </div>
    </div>

    <h3 class="mt-5">Комментарии</h3>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('comments'), 'comment');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('comment')->value) {
$foreach0DoElse = false;
?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['user_name'], ENT_QUOTES, 'UTF-8', true);?>
</h5>
                <p class="card-text"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['comment'], ENT_QUOTES, 'UTF-8', true);?>
</p>
            </div>
        </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    <h4 class="mt-4">Добавить комментарий</h4>
    <form action="add_comment.php" method="POST" class="mb-4">
        <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->getValue('product')['id'];?>
">
        <div class="mb-3">
            <label for="user_name" class="form-label">Имя:</label>
            <input type="text" name="user_name" id="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий:</label>
            <textarea name="comment" id="comment" rows="3" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить комментарий</button>
    </form>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
