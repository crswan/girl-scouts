<?php
 /*
  * Person Model
  * Will contain methods to get person data from the filemaker database
  */
  class Person
  {
  
 /*
	* Acquires a list of all the members in a particular family
	*
	* @author      $Author: hanz $
	*
	* string family_id  id of the family record
	*/
	function getMembersInFamily( $params )
	{
		$family_id = $params['family_id'];

		global $fm;
		$layout_name = 'cgi_web-healthFamilyMembers';

		// $findCommand =& $fm->newFindCommand('cgi_web-healthFamilyMembers');
		// 		$findCommand->addFindCriterion('Family_ID', $family_id);
		
		$compoundFind =& $fm->newCompoundFindCommand($layout_name);
		
		$findreq1 =& $fm->newFindRequest($layout_name);
		$findreq2 =& $fm->newFindRequest($layout_name);
		
		$findreq1->addFindCriterion('Family_ID', $family_id);
		
		$findreq2->addFindCriterion('At Camp', "No");
		$findreq2->setOmit(true);
		
		$compoundFind->add(1,$findreq1);
		$compoundFind->add(2,$findreq2);
		
		
		// print_r($compoundFind);
		$result = $compoundFind->execute();
		// echo $result->getMessage();
		// exit;
		
		// exit;

    if (FileMaker::isError($result)) {
			echo 'There was a problem acquiring family member information. Please try again.';
			exit;
		}
		
		return $result->getRecords();
	}

  /*
 	* Acquires a information about a particular person
 	*
 	* @author      $Author: hanz $
 	*
 	* string id  id of the person record
 	*/
 	function getPerson( $params )
 	{
 		$id = $params['id'];

 		global $fm;
 		$findCommand =& $fm->newFindCommand('cgi_web-HealthPeople');
 		$findCommand->addFindCriterion('Reg. #', $id);
 		$result = $findCommand->execute();

     if (FileMaker::isError($result)) {
 			trigger_error("FM error at getPerson", E_USER_ERROR);
 		}

    return $result->getFirstRecord();
 	}
}
?>