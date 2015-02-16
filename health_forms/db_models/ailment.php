<?php
 /*
  * Ailment Model class
  * Will contain methods revolving around Ailments table
  */
  class Ailment
  {
  
 /*
	* Acquires a list of all the possible ailments
	*
	* @author      $Author: hanz $
	*
	* string grouping   (optional) "camper" or "adult_allergies" or "adult"
	*/
	function getAilmentsList( $params )
	{
		$grouping = isset($params['grouping']) ? $params['grouping'] : null;
    $fm_layout = "cgi_web-medical_ailments";

		global $fm;
		if(is_null($grouping)){
		  $findCommand =& $fm->newFindAllCommand($fm_layout);
		}
		else{
		  $findCommand =& $fm->newFindCommand($fm_layout);
		  if($grouping == "camper"){
		    $findCommand->addFindCriterion('flag_camper', 1);
		  }
		  elseif($grouping == "adult_alleries"){
		    $findCommand->addFindCriterion('flag_adult_allergies', 1);
		  }
			elseif($grouping == "adult"){
		    $findCommand->addFindCriterion('flag_adult', 1);
		  }
		}
		
		
		$result = $findCommand->execute();

    if (FileMaker::isError($result)) {
			trigger_error("There was a problem acquiring the medical ailments list. " . $result->getMessage(), E_USER_ERROR);
		}
		
		return $result->getRecords();
	}
}
?>