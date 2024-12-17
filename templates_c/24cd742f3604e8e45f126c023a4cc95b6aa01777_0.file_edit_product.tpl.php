<?php
/* Smarty version 5.4.2, created on 2024-12-16 11:51:23
  from 'file:edit_product.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6760062b3e7966_19770008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24cd742f3604e8e45f126c023a4cc95b6aa01777' => 
    array (
      0 => 'edit_product.tpl',
      1 => 1734346075,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6760062b3e7966_19770008 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
?><h1>Редактировать товар</h1>
<form action="edit_product.php?id=<?php echo $_smarty_tpl->getValue('product')['id'];?>
" method="POST" enctype="multipart/form-data">
    <label for="name">Название:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['name'], ENT_QUOTES, 'UTF-8', true);?>
" required>
    
    <label for="category">Категория:</label>
    <select name="category" id="category" required>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'category');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('category')->value) {
$foreach0DoElse = false;
?>
            <option value="<?php echo $_smarty_tpl->getValue('category')['id'];?>
" <?php if ($_smarty_tpl->getValue('category')['id'] == $_smarty_tpl->getValue('product')['category_id']) {?>selected<?php }?>>
                <?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>

            </option>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </select>
    
    <label for="description">Описание:</label>
    <textarea name="description" id="description" required><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('product')['description'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    
    <label for="image">Новое изображение (необязательно):</label>
    <input type="file" name="image" id="image">
    
    <button type="submit">Сохранить</button>
</form>
<?php }
}
