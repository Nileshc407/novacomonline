<?php
/* Smarty version 3.1.43, created on 2022-03-23 06:32:59
  from 'C:\xampp\htdocs\novacomonline\prestashop\admin\themes\default\template\controllers\shop_group\helpers\form\form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.43',
  'unifunc' => 'content_623ab10b1a0a93_33821850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '910a8c1ee88bf02bda328b5fce2ef2fa69eccf9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\novacomonline\\prestashop\\admin\\themes\\default\\template\\controllers\\shop_group\\helpers\\form\\form.tpl',
      1 => 1647343202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_623ab10b1a0a93_33821850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_148608705623ab10b19eae6_66570850', 'script');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "helpers/form/form.tpl");
}
/* {block 'script'} */
class Block_148608705623ab10b19eae6_66570850 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_148608705623ab10b19eae6_66570850',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	function toggleShareOrders() {

		var disabled_customer = ($('#share_customer_on').prop('checked')) ? false : true;
		var disabled_stock = ($('#share_stock_on').prop('checked')) ? false : true;

		if (disabled_customer || disabled_stock)
		{
			$("input[name=share_order]").each(function(i) {
	            $(this).attr('disabled', true);
	        });

			$('#share_order_off').attr('checked', true);
		}
		else
		{
			$('input[name=share_order]').attr('disabled', false);
		}
	}

	$(document).ready(function() {
		if (!$("input[name=share_order]").prop('disabled'))
		{
			toggleShareOrders();
			$('input[name=share_customer]').click(function()
			{
				toggleShareOrders();
			});
			$('input[name=share_stock]').click(function()
			{
				toggleShareOrders();
			});
		}

		$('#useImportData').click(function() {
			$('#importList').slideToggle('slow');
		});
	});

<?php
}
}
/* {/block 'script'} */
}
