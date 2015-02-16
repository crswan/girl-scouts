<?php /*%%SmartyHeaderCode:17521497984f1c906a53f8c9-22556251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b666b369458e575d54cf294071bafe60e56246d9' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/login.tpl',
      1 => 1327288414,
      2 => 'file',
    ),
    '30e1904f0385a4a6235352b4d1b7b1726a0db234' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/header.tpl',
      1 => 1327273189,
      2 => 'file',
    ),
    '40d0689c6265f835c24b03e474e727785131cf98' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/footer.tpl',
      1 => 1327268953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17521497984f1c906a53f8c9-22556251',
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f1cd05e30246',
  'variables' => 
  array (
    'error_message' => 0,
    'php_self' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f1cd05e30246')) {function content_4f1cd05e30246($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Peninsula Day Camp Registration</title>
<link href="/register/lib/css/default.css" rel="stylesheet" type="text/css"/>
<link href="/register/lib/css/page.css" rel="stylesheet" type="text/css"/>
<link href="/register/lib/jquery/plugins/validationEngine/css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<!--<script type="text/javascript" src="/register/lib/jquery/plugins/validationEngine/js/jquery.validationEngine.js"></script>-->
<script type="text/javascript" src="/register/lib/jquery/plugins/validationEngine/js/jquery.validationEngine-en.js"></script>
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
		<h2>Health Forms</h2>
	</div>
	<div id="javascript">
		<p>You must have javascript enabled to be able to register. Please enable javascript in your browser and try again.</p>
	</div>
	<div id="body">
	

<div id="form" style="margin-left: 30px; padding-left: 10px; width: 600px;">
<h3>Login to submit your online health forms</h3>
<!-- form start -->
<p><span style="color:red;"></span></p>

<form method="post" action="/health_forms/login.php" name="login">


<table border="0" cellspacing="0" cellpadding="4" class="form-table">
    <tr>
        <th>Username (email address):</th>
        <td><input type="text" name="username" value=""/></td>
    </tr>
    <tr>
        <th>Password:</th>
        <td><input type="password" name="password"/></td>
    </tr>
</table>
<p>
<input type="submit" name="submit" value="Log in &raquo;" />
</p>
</form>
</div> <!-- END form div -->

	</div>
</div>
</body>
</html><?php }} ?>