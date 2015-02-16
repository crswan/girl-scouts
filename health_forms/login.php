<?php
  require '../lib/src/setup_healthforms.php';
  
  session_start();

  if (!isset($_SESSION['initiated']))
  {
  	$_SESSION['name'] = "Peninsula";
    session_regenerate_id();
    $_SESSION['initiated'] = FALSE;
  }

  // import vars from post/get
  $method = ( isset( $_POST['submit'] ) ) ? 'POST' : 'GET';
  $form_vars = ( $method == 'POST' ) ?  $_POST : $_GET;

  // convert post vars to variables
  $username = isset($form_vars['username']) ? $form_vars['username'] : NULL;
  $password = isset($form_vars['password']) ? $form_vars['password'] : NULL;
  $id_event = isset($form_vars['id_event']) ? $form_vars['id_event'] : NULL;
  /////////// END OF LOCAL VAR CREATION

  if ( $method == 'POST' )
  {
  	// ::TODO:: clean your inputs

  	// authenticate
  	$authentication = new simpleAuthentication();
  	$authentication->username($username);
  	$authentication->password($password);

  	$result = $authentication->login();

  	// reload the login form if an error was found
  	if( ! is_null($result['error']) )
  	{
  		switch ($result['error']) {

  			case 'No records match the request':
  			$smarty->assign('error_message', 'Your username and password you entered is incorrect. Please try again.');
  			break;

  			case 'Invalid input':
  			$smarty->assign('error_message', 'You must enter both a username and password.');
  			break;

  			default:
  			$smarty->assign('error_message', 'There was a problem trying to log you into the system. Please report this error to your somix administrator');
  		}

  		$smarty->assign('php_self', $_SERVER['PHP_SELF']);
  		$smarty->assign('username', $username);
  		$smarty->display('login.tpl');
  	}
  	// authentication successful
  	else
  	{
  		// extract the record object from the auth results
  		$records = $result['result']->getRecords();
  		$_SESSION['initiated'] = true;
  		$_SESSION['family_id'] = $records[0]->getfield('zz_webRegId');
  		$_SESSION['first_name'] = $records[0]->getfield('guardianFirstName1');
  		$_SESSION['last_name'] = $records[0]->getfield('guardianLastName1');

  		header('Location: ' . WEB_PATH_HEALTHFORMS);
  		exit;
  	}
  }

  else // form not yet posted

  {
  	$smarty->assign('php_self', $_SERVER['PHP_SELF']);
  	$smarty->display('login.tpl');
  }
?>