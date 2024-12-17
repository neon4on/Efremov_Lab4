<?php
/* Smarty version 5.4.2, created on 2024-12-16 19:25:18
  from 'file:edit_comment.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_6760708e50b117_84785088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc717eccf4e6cf44cccd2017496fccb0f18f9a05' => 
    array (
      0 => 'edit_comment.tpl',
      1 => 1734373076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6760708e50b117_84785088 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\catalog_lab\\templates';
?><h1>Редактировать комментарий</h1>
<form action="edit_comment.php?id=<?php echo $_smarty_tpl->getValue('comment')['id'];?>
" method="POST">
    <label for="user_name">Имя пользователя:</label>
    <input type="text" name="user_name" id="user_name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['user_name'], ENT_QUOTES, 'UTF-8', true);?>
" required>
    
    <label for="comment">Текст комментария:</label>
    <textarea name="comment" id="comment" required><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('comment')['comment'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    
    <button type="submit">Сохранить</button>
</form>
<?php }
}
