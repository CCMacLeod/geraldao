<?php
/* Smarty version 5.3.0, created on 2024-06-25 14:43:09
  from 'file:camposHTML.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667abb5db2df02_82402787',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2a2478fba6140c50a72ffdedd63c1b921b2b194' => 
    array (
      0 => 'camposHTML.tpl',
      1 => 1719319375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667abb5db2df02_82402787 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
$_smarty_tpl->getCompiled()->nocache_hash = '1393239235667abb5d9465f0_46296504';
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1575638029667abb5daf27a5_99225183', "body");
?>

<?php }
/* {block "content-header"} */
class Block_77085737667abb5db09562_56696651 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

                <div class="card card-secondary card-outline">
                    <div class="card-header text-white bg-primary fw-bold">
                        <h3 class="card-title">Preencha os Campos do Template</h3>
                    </div>
                
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-3 col-xs-12">
                                <?php echo $_smarty_tpl->getValue('templateContent');?>

                                <input type="hidden" name="template" value="<?php echo $_smarty_tpl->getValue('nomeTemplate');?>
">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
}
}
/* {/block "content-header"} */
/* {block "body"} */
class Block_1575638029667abb5daf27a5_99225183 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

    <form action="<?php echo $_smarty_tpl->getValue('base_url');?>
/Geraldo/processarTemplate" method="post">
        <?php if ($_smarty_tpl->getValue('templateContent') != '') {?>
            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_77085737667abb5db09562_56696651', "content-header", $this->tplIndex);
?>

        <?php } else { ?>
            <div class="card">
                <div class="card-header text-white bg-primary fw-bold">
                    
                    <h3 class="card-title">Template escolhido não possui campos compatíveis.</h3>
                </div>
            </div>
        <?php }?>
    </form>
<?php
}
}
/* {/block "body"} */
}
