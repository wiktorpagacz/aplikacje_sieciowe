<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-20 18:54:30
  from 'C:\xampp\htdocs\aplikacje_sieciowe\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdf8fd6386592_04860184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b9320f1d8ea2ba6ab5404d2d260bed2a27bd1de' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aplikacje_sieciowe\\app\\views\\CalcView.tpl',
      1 => 1608237598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdf8fd6386592_04860184 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21282896135fdf8fd6373683_60647011', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "content"} */
class Block_21282896135fdf8fd6373683_60647011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_21282896135fdf8fd6373683_60647011',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
credCalcCompute">
        <div class="row gtr-50 gtr-uniform">
            <div class="col-6 col-12-mobilep">
                <input type="text" name="amount" id="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" placeholder="Kwota kredytu" />
            </div>
            <div class="col-6 col-12-mobilep">
                <input type="text" name="years" id="years" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
" placeholder="Okres splaty w latach" />
            </div>
            <div class="col-12">
                <input type="text" name="interest" id="interest" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
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
    <?php if ($_smarty_tpl->tpl_vars['messages']->value->isError()) {?>
        <h4>Wystąpiły błędy: </h4>
            <ol class="isa_error">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ol>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['messages']->value->isInfo()) {?>
        <h4>Informacje: </h4>
        <ol class="isa_info">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
    <?php }?>

    <?php if ((isset($_smarty_tpl->tpl_vars['result']->value->result))) {?>
        <h4>Wynik: </h4>
        <p class="isa_success">
            <?php echo $_smarty_tpl->tpl_vars['result']->value->result;?>

        </p>
    <?php }?>
</div>
<?php
}
}
/* {/block "content"} */
}
