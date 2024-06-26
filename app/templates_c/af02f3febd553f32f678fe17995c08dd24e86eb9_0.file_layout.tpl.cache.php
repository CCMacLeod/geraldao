<?php
/* Smarty version 5.3.0, created on 2024-06-25 14:18:22
  from 'file:./app/templates/layout.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ab58e1794d4_34369379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af02f3febd553f32f678fe17995c08dd24e86eb9' => 
    array (
      0 => './app/templates/layout.tpl',
      1 => 1718973258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/templates/nav.tpl' => 1,
    'file:app/templates/sidenav.tpl' => 1,
    'file:app/templates/_mensagens.tpl' => 1,
  ),
))) {
function content_667ab58e1794d4_34369379 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
$_smarty_tpl->getCompiled()->nocache_hash = '1713472798667ab58ded2c36_39057574';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo (($tmp = $_smarty_tpl->getValue('title') ?? null)===null||$tmp==='' ? "Geraldão" ?? null : $tmp);?>
</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('base_url');?>
/app/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('base_url');?>
/app/assets/css/adminlte.min.css">
    </head>

        <body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
        <div class="wrapper">
            <?php $_smarty_tpl->renderSubTemplate("file:app/templates/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            <?php $_smarty_tpl->renderSubTemplate("file:app/templates/sidenav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1827137454667ab58e13c016_65740623', "content-header");
?>

                        </div>
                    </div>
                </section>

                <div class="content">
                    <div class="container">
                        <?php $_smarty_tpl->renderSubTemplate("file:app/templates/_mensagens.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
                        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_791684081667ab58e1724c3_94507892', "body");
?>

                    </div>
                </div>
            </div>

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Versão</b> 1.0.0
                </div>
                <strong><a href="http://www.trt14.jus.br">Tribunal Regional do Trabalho 14ª Região</a> | 2022</strong>
            </footer>
        </div>
    </body>

   

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('base_url');?>
/app/assets/plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('base_url');?>
/app/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('base_url');?>
/app/assets/js/adminlte.min.js?v=3.2.0"><?php echo '</script'; ?>
>

</html><?php }
/* {block "content-header"} */
class Block_1827137454667ab58e13c016_65740623 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

                            <?php
}
}
/* {/block "content-header"} */
/* {block "body"} */
class Block_791684081667ab58e1724c3_94507892 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

                        <?php
}
}
/* {/block "body"} */
}
