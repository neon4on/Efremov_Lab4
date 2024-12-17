<?php
/* Smarty version 5.4.2, created on 2024-12-17 09:54:35
  from 'file:admin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67613c4b9f80f4_34556766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f87a68967ae07a9ca5311003fb45db0550b1b6b' => 
    array (
      0 => 'admin.tpl',
      1 => 1734425666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67613c4b9f80f4_34556766 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Панель администратора</h1>
    <p>Вы вошли как: <strong><?php echo $_smarty_tpl->getValue('admin_username');?>
</strong></p>
    <a href="logout.php" class="btn btn-danger mb-4">Выйти</a>

    <!-- Список товаров -->
    <h2>Список товаров</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('product')['id'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['category'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('product')['description'],50);?>
</td>
                    <td>
                        <a href="edit_product.php?id=<?php echo $_smarty_tpl->getValue('product')['id'];?>
" class="btn btn-sm btn-primary">Редактировать</a>
                        <a href="delete_product.php?id=<?php echo $_smarty_tpl->getValue('product')['id'];?>
" class="btn btn-sm btn-danger"
                           onclick="return confirm('Удалить этот товар?')">Удалить</a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

    <!-- Категории -->
    <h2>Категории</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach1DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('category')['id'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td>
                        <a href="edit_category.php?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
" class="btn btn-sm btn-primary">Редактировать</a>
                        <a href="delete_category.php?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
" class="btn btn-sm btn-danger"
                           onclick="return confirm('Удалить категорию?')">Удалить</a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

    <!-- Добавить категорию -->
    <h3>Добавить категорию</h3>
    <form action="add_category.php" method="POST" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Название категории:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
