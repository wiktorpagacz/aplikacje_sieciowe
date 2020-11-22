<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-22 15:53:37
  from 'C:\xampp\htdocs\aplikacje_sieciowe\app\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fba7b71223f77_56104857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f09ae00fdfd1efe97843cdf7a7103b07693aa606' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacje_sieciowe\\app\\calc.tpl',
      1 => 1606056371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba7b71223f77_56104857 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17429633915fba7b71218283_76110484', "content");
?>





<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.tpl");
}
/* {block "content"} */
class Block_17429633915fba7b71218283_76110484 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17429633915fba7b71218283_76110484',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php">
        <div class="row gtr-50 gtr-uniform">
            <div class="col-6 col-12-mobilep">
                <input type="text" name="amount" id="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['amount'];?>
" placeholder="Kwota kredytu" />
            </div>
            <div class="col-6 col-12-mobilep">
                <input type="text" name="years" id="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['years'];?>
" placeholder="Okres splaty w latach" />
            </div>
            <div class="col-12">
                <input type="text" name="interest" id="interest" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['interest'];?>
" placeholder="Oprocentowanie" />
            </div>
            <div class="col-12">
                <ul class="actions special">
                    <li><input type="submit" value="Oblicz" /></li>
                </ul>
            </div>
        </div>
    </form>
<div class="messages">
    <?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
        <?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?>
            <ol>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ol>
        <?php }?>
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
        <h4>Wynik</h4>
        <p>
            <?php echo $_smarty_tpl->tpl_vars['result']->value;?>

        </p>
    <?php }?>
</div>
<?php
}
}
/* {/block "content"} */
}
