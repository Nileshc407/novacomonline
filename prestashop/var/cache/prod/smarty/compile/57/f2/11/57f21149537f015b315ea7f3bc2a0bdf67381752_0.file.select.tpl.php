<?php
/* Smarty version 3.1.43, created on 2022-03-23 06:32:59
  from 'C:\xampp\htdocs\novacomonline\prestashop\admin\themes\default\template\controllers\zones\select.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_623ab10bcaba32_75603027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57f21149537f015b315ea7f3bc2a0bdf67381752' => 
    array (
      0 => 'C:\\xampp\\htdocs\\novacomonline\\prestashop\\admin\\themes\\default\\template\\controllers\\zones\\select.tpl',
      1 => 1647343202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623ab10bcaba32_75603027 (Smarty_Internal_Template $_smarty_tpl) {
?><select id="zone_to_affect" name="zone_to_affect">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zones']->value, 'z');
$_smarty_tpl->tpl_vars['z']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['z']->value) {
$_smarty_tpl->tpl_vars['z']->do_else = false;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['z']->value['id_zone'];?>
"><?php echo $_smarty_tpl->tpl_vars['z']->value['name'];?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
<?php }
}
