<?php
##################################################################################
#
# File				: sac.class.inc.php - simpleAuthenticationClass core class
#					  include file.
# Class Title		: simpleAuthenticationClass
# Class Description	: Enables users to create a simple authentication system on
#					  there site with different levels of user access, user details
#					  are stored in an array that can be easily modified.
# Class Notes		: This is My First Publicised Class Any Input Would be
#					  Appreciated.
# Copyright			: 2007
# Licence			: http://www.gnu.org/copyleft/gpl.html GNU var License
#
# Author 			: Mark Davidson <design@fluxnetworks.co.uk>
#					  <http://design.fluxnetworks.co.uk>
# Created Date     	: 06/01/2007
# Last Modified    	: 07/01/2007
#
##################################################################################

class simpleAuthentication {
//	var $users = array(); //array where user details are stored
	var $cookie_time = 0; //How Long to Keep the Cookie, 0 Means Keep for Session, time()+60*60*24*30 for 30 days etc.
	var $debug = true; //turn debug mode on and off, all but critical errors suppressed when debug is turned off.

	var $level = '';

    /**
     * username attribute
     */
    var $username = NULL;

    /**
     * username accessor
     */
    function username( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->username = $var;
        }
        return $this->username;
    }

    /**
     * password attribute
     */
    var $password = NULL;

    /**
     * password accessor
     */
    function password( $var = NULL )
    {
        if ( isset( $var ) )
        {
            $this->password = $var;
        }
        return $this->password;
    }

	function sac($users) {
		$this->users = $users; //read users array into class
		if (!is_array($this->users)) $this->error('Users Array is Not Declared'); //check users array is valid
	}

	/*
	 * Checks if form values pass basic validation
	 */
	function isValid($username, $password) {
		If( empty($username) || empty($password))
		{
			return false;
		}
		//DataValidate::ValidityCheck($form_data['first_name'], 'text');

		return true;
	}

	function login() {
		global $fm;
		$error = NULL;

		$valid_check = $this->isValid($this->username, $this->password);

		// check form input validity
		if($valid_check == false)
		{
			return array('result' => '', 'error' => 'Invalid input');
		}

		$findCommand =& $fm->newFindCommand('cgi_web-login');
		$findCommand->addFindCriterion('contactEmail', '==' . $this->username);
		$findCommand->addFindCriterion('password', '==' . $this->password);
		$result = $findCommand->execute();

		if (FileMaker::isError($result)) {
			$error = $result->getMessage();

			return array('result' => $result, 'error' => $error);
		}
		return array('result' => $result, 'error' => $error);
	}

	function logout() {
		//delete username and password cookies
		//setcookie('username', '', time() - 3600);
		//setcookie('password', '', time() - 3600);
        session_unset( );
        session_destroy( );
        session_write_close( );
		$_SESSION = array();
	}

	function authenticate($username, $password, $level = 1) {
		//authenticate that the user is valid and that the users level
		//is greater than or equal to the required level
		if ($this->validate($username, $password)) {
			if ($this->users[$username][1] >= $level) {
				return true;
			}
		}
		return false;
	}

	function error($msg, $type = 0) {
		//error handling
		switch ($type) {
			case 0 : $error_type = 'Critical'; break;
			case 1 : $error_type = 'Serious'; break;
			case 2 : $error_type = 'Minor'; break;
		}
		if ($this->debug || $type == 0) {
			echo 'A '.$error_type.' error has occurred; '.$msg.'.';
			if ($type == 0) exit();
		}
	}
}
?>