<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		<h2>{$title}</h2>
	</div>
	<div id="javascript">
		<p>You must have javascript enabled to be able to register. Please enable javascript in your browser and try again.</p>
	</div>
	<div id="body">
	{if isset($error) }
	<div class="error">
		{$error}. Please try again in a moment.
	</div>
	{/if}