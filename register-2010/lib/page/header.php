<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Peninsula Day Camp Registration</title>
<link href="/register/lib/css/default.css" rel="stylesheet" type="text/css"/>
<link href="/register/lib/css/page.css" rel="stylesheet" type="text/css"/>
<link href="/register/lib/jquery/plugins/validationEngine/css/validationEngine.jquery.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="/register/lib/jquery/plugins/validationEngine/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="/register/lib/jquery/plugins/validationEngine/js/jquery.validationEngine-en.js"></script>
<script type="text/javascript">
var valOpts = {
	inlineValidation: false,
	success :  false,
	failure : function(){
		<?php if( $_SERVER['REQUEST_URI'] == '/register/main.php?type=Camper' ) { ?>
		if( $("#mothersFirstName").val().length == 0 || $("#mothersLastName").val().length == 0 ){
			if( $("#fatherFirstName").val().length == 0 || $("#fatherLastName").val().length == 0 ){
				alert("Please specify a first and last name for Guardian 1 or 2");
				return false;
			}
		}
		<?php } ?>
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
		<h2>Registration</h2>
	</div>
	<div id="javascript">
		<p>You must have javascript enabled to be able to register. Please enable javascript in your browser and try again.</p>
	</div>
	<div id="body">
	<?php if( isset($error) ) { ?>
	<div class="error">
		<?php echo $error; ?>. Please try again in a moment.
	</div>
	<?php } ?>