<?php

  // setup some helpful globals
  define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);
  define('WEB_ROOT_ENCRYPT', "https://peninsuladaycamp.org");
  define('WEB_PATH_HEALTHFORMS', WEB_ROOT_ENCRYPT . "/health_forms");

  // ajax/php debugger
  // require_once('FirePHPCore/FirePHP.class.php');
  // ob_start();
  // $firephp = FirePHP::getInstance(true);
  
  // define custom error handler
  include("my_error_handler.php");
  set_error_handler("myErrorHandler");
?>