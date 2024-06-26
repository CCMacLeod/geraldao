<?php
/* Smarty version 5.3.0, created on 2024-06-25 14:18:23
  from 'file:app/templates/sidenav.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ab58f966db5_94786422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57513fcfa10985b6d5129b32e78868b2b7680e09' => 
    array (
      0 => 'app/templates/sidenav.tpl',
      1 => 1719261815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ab58f966db5_94786422 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getCompiled()->nocache_hash = '1272197927667ab58f8a1d27_20211637';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $_smarty_tpl->getValue('base_url');?>
" class="brand-link logo-switch d-flex justify-content-center">
        <img src="<?php echo $_smarty_tpl->getValue('base_url');?>
/assets/img/cronos_transparente-removebg-preview_small.png" alt="Geraldão" class="brand-image logo-xs">
        <img src="<?php echo $_smarty_tpl->getValue('base_url');?>
/assets/img/cronos_transparente-removebg-preview.png" alt="Geraldão" class="brand-image logo-xl">
    </a>
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2 text-wrap">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link trigger_full_page_loading" href="<?php echo $_smarty_tpl->getValue('base_url');?>
/Geraldo/mostrarUploadArquivo">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>Cadastro de Arquivos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link trigger_full_page_loading" href="<?php echo $_smarty_tpl->getValue('base_url');?>
/Geraldo/escolherTemplate">
                        <i class="fa fa-tag nav-icon"></i>
                        <p>Gerar Arquivo</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<?php }
}
