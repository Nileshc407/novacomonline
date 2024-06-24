<?php
/* Smarty version 3.1.43, created on 2022-03-23 06:33:01
  from 'C:\xampp\htdocs\novacomonline\prestashop\admin\themes\default\template\helpers\tree\tree_node_item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_623ab10dabdc13_62940295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '400272dd102c5dad4a207c985ced0a1af556f05c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\novacomonline\\prestashop\\admin\\themes\\default\\template\\helpers\\tree\\tree_node_item.tpl',
      1 => 1647343202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623ab10dabdc13_62940295 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li class="tree-item">
	<span class="tree-item-name">
		<i class="tree-dot"></i>
		<label class="tree-toggler"><?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
</label>
	</span>
</li>
<?php }
}
