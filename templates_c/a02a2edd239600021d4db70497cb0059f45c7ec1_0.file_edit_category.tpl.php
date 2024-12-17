<?php
/* Smarty version 5.4.2, created on 2024-12-16 19:32:37
  from 'file:edit_category.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_67607245afece4_33101827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a02a2edd239600021d4db70497cb0059f45c7ec1' => 
    array (
      0 => 'edit_category.tpl',
      1 => 1734373741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67607245afece4_33101827 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
?><h1>Редактировать категорию</h1>
<form action="edit_category.php?id=<?php echo $_smarty_tpl->getValue('category')['id'];?>
" method="POST">
    <label for="name">Название категории:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('category')['name'], ENT_QUOTES, 'UTF-8', true);?>
" required>
    <button type="submit">Сохранить</button>
</form>
<?php }
}
