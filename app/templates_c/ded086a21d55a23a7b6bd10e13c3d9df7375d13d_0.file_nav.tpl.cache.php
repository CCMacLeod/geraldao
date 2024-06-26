<?php
/* Smarty version 5.3.0, created on 2024-06-25 14:18:23
  from 'file:app/templates/nav.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ab58f324fe0_38825379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ded086a21d55a23a7b6bd10e13c3d9df7375d13d' => 
    array (
      0 => 'app/templates/nav.tpl',
      1 => 1718827769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ab58f324fe0_38825379 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getCompiled()->nocache_hash = '1759003465667ab58f22c433_10117278';
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-label="expande"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link text-primary" href="<?php echo $_smarty_tpl->getValue('base_url');?>
" >
                <?php echo $_smarty_tpl->getValue('appName');?>

            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <i class="fas fa-user"></i>
            <?php echo $_smarty_tpl->getValue('nome');?>
 
            <a href="<?php echo $_smarty_tpl->getValue('logout');?>
" role="button">
                Sair
            </a>
        </li>
    </ul>
</nav><?php }
}
