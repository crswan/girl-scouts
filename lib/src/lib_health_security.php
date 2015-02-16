<?php

/**
 * Security class for Health Forms
 *
 * This class provides security related functions
 *
 * @version     $Revision: #1 $
 *
 */

class HealthSecurity
{

/**
  * Checks whether the logged in user can view the camper record requested
  *
	* @param	int		camper_id		camper id (Reg #)
	*
  * @version     $Revision: #1 $
  * @author      $Author: hanz $
	*
	* @return bool
  */
	function CanViewCamper($camper_id)
	{
		global $fm;
		$findCommand =& $fm->newFindCommand('cgi_web-security_people');
		$findCommand->addFindCriterion('Reg. #', $camper_id);
		$findCommand->addFindCriterion('Family_ID', $_SESSION['family_id']);
		$result = $findCommand->execute();

		if (FileMaker::isError($result))
		{
				trigger_error("You are not authorized to view this resource.", E_USER_NOTICE);
				// return FALSE;
		}
		return true;
	}
}
?>