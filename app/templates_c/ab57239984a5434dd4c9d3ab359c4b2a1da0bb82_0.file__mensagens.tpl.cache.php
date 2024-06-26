<?php
/* Smarty version 5.3.0, created on 2024-06-25 14:18:24
  from 'file:app/templates/_mensagens.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ab5903c3e20_39737833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab57239984a5434dd4c9d3ab359c4b2a1da0bb82' => 
    array (
      0 => 'app/templates/_mensagens.tpl',
      1 => 1691499095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ab5903c3e20_39737833 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getCompiled()->nocache_hash = '686813550667ab59007d3e6_18880561';
if ($_smarty_tpl->getValue('mensagem')['texto']) {?>
    <div class="alert alert-<?php echo $_smarty_tpl->getValue('mensagem')['tipo'];?>
 alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $_smarty_tpl->getValue('mensagem')['texto'];?>

    </div>
<?php }
}
}
