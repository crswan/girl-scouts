<?php /* Smarty version Smarty-3.1.7, created on 2012-02-04 21:03:47
         compiled from "/home/peninsul/public_html/ui_templates/_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1858422454f2e0db31d3fb1-91498899%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e13930422c4b6c1560b1dbd800d225576f4cde66' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/_header.tpl',
      1 => 1328385605,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1858422454f2e0db31d3fb1-91498899',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2e0db32e1c1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2e0db32e1c1')) {function content_4f2e0db32e1c1($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="/register/lib/css/default.css" rel="stylesheet" type="text/css"/>
<link href="/register/lib/css/page.css" rel="stylesheet" type="text/css"/>
<link href="/css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="/lib/js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="/lib/js/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="/lib/js/jquery.validationEngine.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Peninsula Day Camp Registration</title>

<script type="text/javascript">
var valOpts = {
	inlineValidation: false,
	success :  false,
	failure : function(){
		
		alert('Please fix the problems in the fields above and try again.');
		return false;
	}
}
$(function(){
	$("div#body").show();
	$("div#javascript").hide();
	$("input[type=submit],input[type=checkbox],input[type=radio]").addClass("submit");
	$("table.form").each(function(){
		$("tr:even",this).addClass("alt");
	});
	$("form.validateme").validationEngine(valOpts);
});
</script>
</head>

<body>
<div id="wrapper">
	<div id="header">
		<h1>Peninsula Girl Scout Day Camp</h1>
		<h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
	</div>
	<div id="javascript">
		<p>You must have javascript enabled to be able to register. Please enable javascript in your browser and try again.</p>
	</div>
	<div id="body">
	<?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
	<div class="error">
		<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
. Please try again in a moment.
	</div>
	<?php }?><?php }} ?>