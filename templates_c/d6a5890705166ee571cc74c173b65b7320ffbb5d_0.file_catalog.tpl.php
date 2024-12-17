<?php
/* Smarty version 5.4.2, created on 2024-12-17 09:56:53
  from 'file:catalog.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67613cd57b1632_56574771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6a5890705166ee571cc74c173b65b7320ffbb5d' => 
    array (
      0 => 'catalog.tpl',
      1 => 1734425804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67613cd57b1632_56574771 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
$_smarty_tpl->getSmarty()->getRuntime('TplFunction')->registerTplFunctions($_smarty_tpl, array (
  'render_categories' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\catalog_lab\\templates_c\\d6a5890705166ee571cc74c173b65b7320ffbb5d_0.file_catalog.tpl.php',
    'uid' => 'd6a5890705166ee571cc74c173b65b7320ffbb5d',
    'call_name' => 'smarty_template_function_render_categories_31257144067613cd56e6be3_15432199',
  ),
));
?><!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Каталог товаров</h1>

    <!-- Форма поиска -->
    <form method="GET" action="catalog.php" class="row mb-4">
        <div class="col-md-4">
            <input type="text" name="search" placeholder="Поиск..." class="form-control" value="<?php echo (($tmp = $_smarty_tpl->getValue('filters')['search'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Искать</button>
        </div>
    </form>

    <!-- Фильтры -->
    <form method="GET" action="catalog.php" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="category" class="form-label">Категория:</label>
            <select name="category" id="category" class="form-select">
                <option value="">Все категории</option>
                
                <?php $_smarty_tpl->getSmarty()->getRuntime('TplFunction')->callTemplateFunction($_smarty_tpl, 'render_categories', array('categories'=>$_smarty_tpl->getValue('categories')), true);?>

            </select>
        </div>
        <div class="col-md-4">
            <label for="sort" class="form-label">Сортировка:</label>
            <select name="sort" id="sort" class="form-select">
                <option value="">Без сортировки</option>
                <option value="id_desc" <?php if ($_smarty_tpl->getValue('filters')['sort'] == 'id_desc') {?>selected<?php }?>>Новые товары</option>
                <option value="id_asc" <?php if ($_smarty_tpl->getValue('filters')['sort'] == 'id_asc') {?>selected<?php }?>>Старые товары</option>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-success">Применить</button>
        </div>
    </form>

    <!-- Список товаров -->
    <h2>Список товаров</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Изображение</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('products'), 'product');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('product')->value) {
$foreach1DoElse = false;
?>
                <tr>
                    <td>
                        <a href="product.php?id=<?php echo $_smarty_tpl->getValue('product')['id'];?>
" class="text-decoration-none text-dark">
                            <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['name'], ENT_QUOTES, 'UTF-8', true);?>

                        </a>
                    </td>
                    <td>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach2DoElse = false;
?>
                            <?php if ($_smarty_tpl->getValue('category')['id'] == $_smarty_tpl->getValue('product')['category_id']) {
echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);
}?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('truncate')($_smarty_tpl->getValue('product')['description'],100);?>
</td>
                    <td>
                        <img src="<?php echo $_smarty_tpl->getValue('product')['image'];?>
" alt="<?php echo $_smarty_tpl->getValue('product')['name'];?>
" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                </tr>
            <?php
}
if ($foreach1DoElse) {
?>
                <tr>
                    <td colspan="4" class="text-center">Товары не найдены.</td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
/* smarty_template_function_render_categories_31257144067613cd56e6be3_15432199 */
if (!function_exists('smarty_template_function_render_categories_31257144067613cd56e6be3_15432199')) {
function smarty_template_function_render_categories_31257144067613cd56e6be3_15432199(\Smarty\Template $_smarty_tpl,$params) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
$params = array_merge(array('name'=>'render_categories','categories'=>array(),'parent_id'=>null,'level'=>0), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->assign($key, $value);
}
?>

                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
                        <?php if ($_smarty_tpl->getValue('category')['parent_id'] == $_smarty_tpl->getValue('parent_id')) {?>
                            <option value="<?php echo $_smarty_tpl->getValue('category')['id'];?>
" class="category-level-<?php echo $_smarty_tpl->getValue('level');?>
" <?php if ($_smarty_tpl->getValue('filters')['category'] == $_smarty_tpl->getValue('category')['id']) {?>selected<?php }?>>
                                <?php echo str_repeat((string) '— ', (int) $_smarty_tpl->getValue('level'));
echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>

                            </option>
                            <?php $_smarty_tpl->getSmarty()->getRuntime('TplFunction')->callTemplateFunction($_smarty_tpl, 'render_categories', array('categories'=>$_smarty_tpl->getValue('categories'),'parent_id'=>$_smarty_tpl->getValue('category')['id'],'level'=>$_smarty_tpl->getValue('level')+1), true);?>

                        <?php }?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                <?php
}}
/*/ smarty_template_function_render_categories_31257144067613cd56e6be3_15432199 */
}
