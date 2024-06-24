<?php
/* Smarty version 3.1.43, created on 2022-03-23 06:32:59
  from 'C:\xampp\htdocs\novacomonline\prestashop\admin\themes\default\template\controllers\shop\helpers\list\list_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_623ab10b092ae8_29006148',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4deb7caa0f9d530585acc596897edd1e76cd847a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\novacomonline\\prestashop\\admin\\themes\\default\\template\\controllers\\shop\\helpers\\list\\list_header.tpl',
      1 => 1647343202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623ab10b092ae8_29006148 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1600860302623ab10b08b007_26319742', "startForm");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/list/list_header.tpl");
}
/* {block "startForm"} */
class Block_1600860302623ab10b08b007_26319742 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'startForm' => 
  array (
    0 => 'Block_1600860302623ab10b08b007_26319742',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\novacomonline\\prestashop\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>

<?php $_smarty_tpl->_assignInScope('action', smarty_modifier_replace($_smarty_tpl->tpl_vars['action']->value,'id_shop','shop_id'));?>
	<form method="post" action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>
" class="form-horizontal clearfix" id="form-<?php echo $_smarty_tpl->tpl_vars['list_id']->value;?>
">
<?php
}
}
/* {/block "startForm"} */
}
