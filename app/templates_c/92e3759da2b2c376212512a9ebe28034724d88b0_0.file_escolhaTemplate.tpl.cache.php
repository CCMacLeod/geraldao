<?php
/* Smarty version 5.3.0, created on 2024-06-25 15:14:25
  from 'file:./app/templates/escolhaTemplate.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.0',
  'unifunc' => 'content_667ac2b1095c13_13237492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92e3759da2b2c376212512a9ebe28034724d88b0' => 
    array (
      0 => './app/templates/escolhaTemplate.tpl',
      1 => 1719321259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_667ac2b1095c13_13237492 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
$_smarty_tpl->getCompiled()->nocache_hash = '1899688079667ac2b0d56f58_57354108';
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_562735747667ac2b104b273_65181464', "body");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "app/templates/layout.tpl", $_smarty_current_dir);
}
/* {block "content-header"} */
class Block_1910745619667ac2b104dfe2_20272941 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

                <h1 class="mb-0">Escolha um Template para uso</h1>
            <?php
}
}
/* {/block "content-header"} */
/* {block "body"} */
class Block_562735747667ac2b104b273_65181464 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\projetos\\geraldao\\app\\templates';
?>

    
    
    <form id="escolhaTemplate" name="escolhaTemplate" >
        <div class="card">
            <div class="card-header text-white bg-primary fw-bold">
            <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1910745619667ac2b104dfe2_20272941', "content-header", $this->tplIndex);
?>

            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-3 col-xs-12">
                        <select name='template' id='template' onchange="mostrarCamposHTML(this.value)">
                            <option value=''></option>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('listaArquivos'), 'item', false, 'key', 'name', array (
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('item')->value) {
$foreach0DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('item');?>
"><?php echo $_smarty_tpl->getValue('item');?>
</option>
                            <?php
}
if ($foreach0DoElse) {
?>
                                <option value=''></option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="templateContent">
        <?php echo $_smarty_tpl->getValue('templateContent');?>

    </div>

    <?php echo '<script'; ?>
>
        function mostrarCamposHTML(templateName) {
            $.ajax({
                url: '<?php echo $_smarty_tpl->getValue('base_url');?>
/Geraldo/carregarTemplate',  // URL do controlador/método para carregar o template
                type: 'GET',
                data: { template: templateName },
                success: function(response) {
                    $('#templateContent').html(response);
                },
                error: function() {
                    alert('Erro ao carregar o template.');
                }
            });
        }
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "body"} */
}
