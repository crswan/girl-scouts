<?php
  include("config_general.php");
  include("config_smarty.php"); // smarty template engine
  include(DOCROOT . "/lib/db/fm_connect.php"); // filemaker connectivity
  include("lib_simple_authentication.php"); // login authentication helper
	include("lib_health_security.php"); // security class for health forms

  /*
   * Created on Apr 9, 2008
   * Include this file if your script requires the user to be logged in.\
   */
  session_start();

  setcookie('referrer', $_SERVER['REQUEST_URI']);

  if(isset($_SERVER['REQUEST_URI']) && (! empty($_SERVER['REQUEST_URI'])))
  {
  	$referrer = $_SERVER['REQUEST_URI'];
  }
  else{
  	$referrer = 'index.php';
  }

  // redirect to login if a session has not been properly initiated
  $header_redirect = 'Location: ' . WEB_PATH_HEALTHFORMS . '/login.php';
  if (!isset($_SESSION['initiated']) || ($_SESSION['initiated'] != TRUE))
  {
    if($_SERVER['SCRIPT_NAME'] != "/health_forms/login.php")
    {
      setcookie('referrer', $referrer);
      header($header_redirect);
    }
  }

  else
  {
  	define('USER_ID', $_SESSION['user_id']);
  }

?>