<?php
  // put full path to Smarty.class.php
  $smarty_sub_dir = "/lib/src/smarty/libs/";
  require(DOCROOT . $smarty_sub_dir . "/Smarty.class.php");

  $smarty = new Smarty();

// point smarty vars to the clients specific templates
  $smarty->template_dir = DOCROOT . '/ui_templates';
  $smarty->compile_dir = DOCROOT . $smarty_sub_dir . 'templates_c';
  $smarty->cache_dir = DOCROOT . $smarty_sub_dir . 'cache';
  $smarty->config_dir = DOCROOT . $smarty_sub_dir . 'configs';
  
  $smarty->debugging = false;
  $smarty->caching = false;

  // make this php global availailable to all smarty templates
	$smarty->assign('WEB_ROOT_ENCRYPT', WEB_ROOT_ENCRYPT);
?>