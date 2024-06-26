<?php
/* Smarty version 5.3.0, created on 2024-06-25 14:57:23
  from 'file:./app/templates/uploadArquivo.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667abeb30d4fd5_14009167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f384722e7a51277ed354670162e8b0c5ff18335f' => 
    array (
      0 => './app/templates/uploadArquivo.tpl',
      1 => 1719320240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667abeb30d4fd5_14009167 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
$_smarty_tpl->getCompiled()->nocache_hash = '340795365667abeb2ec77b7_43629232';
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1422631468667abeb30b37b9_93851929', "body");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "app/templates/layout.tpl", $_smarty_current_dir);
}
/* {block "content-header"} */
class Block_1999213169667abeb30ba561_43301678 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

                    <h1 class="mb-0">Faça o upload do arquivo ODT (Template)</h1>
                <?php
}
}
/* {/block "content-header"} */
/* {block "body"} */
class Block_1422631468667abeb30b37b9_93851929 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

    
        <form action="<?php echo $_smarty_tpl->getValue('base_url');?>
/Geraldo/uploadArquivo" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header text-white bg-primary fw-bold">
                <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1999213169667abeb30ba561_43301678', "content-header", $this->tplIndex);
?>

                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-3 col-xs-12">
                            <input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
                            <input type="file" name="arquivo" required />
                        </div>                        
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-3 col-xs-12">
                            <button type="submit">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    
<?php
}
}
/* {/block "body"} */
}
