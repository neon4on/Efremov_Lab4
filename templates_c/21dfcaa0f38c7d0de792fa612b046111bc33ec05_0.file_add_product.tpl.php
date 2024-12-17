<?php
/* Smarty version 5.4.2, created on 2024-12-17 10:33:36
  from 'file:add_product.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67614570998e47_36911565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21dfcaa0f38c7d0de792fa612b046111bc33ec05' => 
    array (
      0 => 'add_product.tpl',
      1 => 1734426321,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67614570998e47_36911565 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить товар</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Добавить товар</h1>

    <form action="add_product.php" method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Название:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="category" class="form-label">Категория:</label>
            <select name="category" id="category" class="form-select" required>
                <option value="">Выберите категорию</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('category')['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Описание:</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="col-md-6">
            <label for="image" class="form-label">Основное изображение:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="gallery" class="form-label">Галерея изображений:</label>
            <input type="file" name="gallery[]" id="gallery" class="form-control" multiple>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Добавить товар</button>
            <a href="admin.php" class="btn btn-secondary">Назад</a>
        </div>
    </form>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
