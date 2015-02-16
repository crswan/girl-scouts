<?php  
class PDC_Registration { 

  var $id = null;
  
  // information duplicated across family members
  var $motherFirstName = null;
  var $motherLastName = null;
  var $contactHomePhone = null;
  var $motherWorkPhone = null;
  var $motherCellPhone = null;
  
  var $fatherFirstName = null;
  var $fatherLastName = null;
  var $fatherHomePhone = null;
  var $fatherWorkPhone = null;
  var $fatherCellPhone = null;
  
  var $emergencyName = null;
  var $emergencyPhone = null;
  var $emergencyRelationship = null;
  // var $adultFirstName = null; // not needed
  // var $adultLastName = null;	// not needed
  
  var $cookieCoupons = null;
  var $amountReceived = null;
  var $financialAid = null;
  
  var $contactAddress = null;
  var $contactCityState = null;
  var $contactZip = null;
  var $contactEmail = null;
  var $transportBusStopRequest = null;
  var $specialRequests = null;

  function initiate($params) {
    global $DB;
	echo ("<br />&nbsp;<br>");
    print_r($params);
	echo ("<br />&nbsp;<br>");
    // exit;
    $shared_field_list = array(
      'motherFirstName', 
      'motherLastName', 
      'contactHomePhone',
      'motherWorkPhone', 
      'motherCellPhone',
      
      'fatherFirstName', 
      'fatherLastName', 
      'fatherHomePhone', 
      'fatherWorkPhone', 
      'fatherCellPhone',
      
      'contactAddress',
      'contactCityState',
      'contactZip',
      'contactEmail',
      'transportBusStopRequest',
	  'specialRequests',
	  
	  'emergencyName',
	  'emergencyPhone',
	  'emergencyRelationship',
	  'cookieCoupons',
	  'financialAid'
    );
    
    // setup data that will be shared across family members
    foreach($shared_field_list as $var){
      $this->$var = $params[$var];
    }
  
    // specify filemaker layout 'cgi_web-family'
    $new_record = $DB->newAddCommand('cgi_web-family');
  
    // reference filemaker field name to be set
	
	// not in table yet
    //$new_record->setField('amountReceived', $params['amountReceived']);

    $new_record->setField('emergencyName', $params['emergencyName']);
    $new_record->setField('emergencyPhone', $params['emergencyPhone']);
    $new_record->setField('emergencyRelationship', $params['emergencyRelationship']);
	
	// store the family's volunteer name here?
    $new_record->setField('adultFirstName', $params['adultFirstName']);
    $new_record->setField('adultLastName', $params['adultLastName']);
    
    $new_record->setField('guardianFirstName1', $params['motherFirstName']);
    $new_record->setField('guardianLastName1', $params['motherLastName']);
    $new_record->setField('guardianHomePhone1', $params['contactHomePhone']);
    $new_record->setField('guardianHomeWorkPhone1', $params['motherWorkPhone']);
    $new_record->setField('guardianHomeMobilePhone1', $params['motherCellPhone']);
    
    $new_record->setField('guardianFirstName2', $params['fatherFirstName']);
    $new_record->setField('guardianLastName2', $params['fatherLastName']);
    $new_record->setField('guardianHomePhone2', $params['fatherHomePhone']);
    $new_record->setField('guardianHomeWorkPhone2', $params['fatherWorkPhone']);
    $new_record->setField('guardianHomeMobilePhone2', $params['fatherCellPhone']);
    
    $new_record->setField('contactAddress', $params['contactAddress']);
    $new_record->setField('contactCityState', $params['contactCityState']);
    $new_record->setField('contactZip', $params['contactZip']);
    $new_record->setField('contactEmail', $params['contactEmail']);
    $new_record->setField('transportBusStopRequest', $params['transportBusStopRequest']);
    $new_record->setField('specialRequests', $params['specialRequests']);
	$new_record->setField('cookieCoupons', $params['cookieCoupons']);
	$new_record->setField('financialAidFlag', $params['financialAid']);

    $result = $new_record->execute();
  
    if(FileMaker::isError($result))
  	{
  		echo 'There was a problem creating a family record (' . $result->getMessage() . ')';
      exit(0);
  	}

    $family = $result->getFirstRecord();
    $this->id = $family->getField('zz_webRegId');
  }

  function new_camper( $params ) {
	  
	  // to add: Level, Code, Hidden name
	  
	echo ("<br />&nbsp;<br>");
	print_r($params);
	echo ("<br />&nbsp;<br>");
	  
    global $DB;
    $new_record = $DB->newAddCommand('cgi_web-person');
    
    $new_record->setField('First Name', $params['firstName']);
    $new_record->setField('Last Name', $params['lastName']);
    $new_record->setField('T Shirt', $params['tShirtSize']);
    $new_record->setField('Camper Birthday', $params['camperBirthday']);
    $new_record->setField('grade in fall', $params['camperGradeInFall']);
    $new_record->setField('Registered GS', $params['registeredScout']);
    $new_record->setField('Troop #', $params['camperTroop']);	
    $new_record->setField('Level', $params['level']);

    $new_record->setField('Year', $params['campYear']);
	$new_record->setField('Camper_Aide_Staff', $params['camperAideStaff']);
    $new_record->setField('Staff Children', $params['staffChildren']);
    $new_record->setField('Sponsored', $params['sponsored']);
	
	// tagalong fields
    $new_record->setField('Gender', $params['gender']);
	
	// adult fields
    $new_record->setField('Live Scan', $params['liveScan']);
	
    $new_record->setField('FT_PT', $params['fullTimePartTime']);
    $new_record->setField('At Camp', $params['atCamp']);

    $new_record->setField('Job Notes', $params['jobNotes']);
    
	$new_record->setField('Camp name', $params['campName']);
	/*
	$new_record->setField('field', $params['campName']);
	$new_record->setField('field', $params['campName']);
	$new_record->setField('field', $params['campName']);
	$new_record->setField('field', $params['campName']);
	$new_record->setField('field', $params['campName']);
	$new_record->setField('field', $params['campName']);
*/
    // duplicated information
	
    $new_record->setField("Family_ID", $this->id);
    $new_record->setField("Mom First Name", $this->motherFirstName);
    $new_record->setField("Mom Last Name", $this->motherLastName);
    $new_record->setField("Home Phone", $this->contactHomePhone);
    $new_record->setField("Mom Work Phone", $this->motherWorkPhone);
    $new_record->setField("Cell Phone", $this->motherCellPhone);
    
    
    $new_record->setField("Dad First Name", $this->fatherFirstName);
    $new_record->setField("Dad Last Name", $this->fatherLastName);
    $new_record->setField("Dad Home Phone", $this->fatherHomePhone);
    $new_record->setField("Dad Work Phone", $this->fatherWorkPhone);
    $new_record->setField("Dad Cell Phone", $this->fatherCellPhone);
        
	$new_record->setField("Address", $this->contactAddress);
	$new_record->setField("City_State", $this->contactCityState);
	$new_record->setField("Zip", $this->contactZip);
	$new_record->setField("e-mail", $this->contactEmail);
	$new_record->setField("Bus Stop Request 1", $this->transportBusStopRequest);
	
	$new_record->setField("Special Requests", $this->specialRequests);
	
	$new_record->setField("Emergency Name", $this->emergencyName);
	$new_record->setField("Emergency Phone", $this->emergencyPhone);
	$new_record->setField("Emergency Relationship", $this->emergencyRelationship);
	$new_record->setField("Cookie Coupons", $this->cookieCoupons);
	$new_record->setField("Financial Aid", $this->financialAid);

    $result = $new_record->execute();
  
    if(FileMaker::isError($result))
  	{
  		echo 'There was a problem creating a camper record (' . $result->getMessage() . ')';
      exit(0);
  	}
  }
  
  function new_tagalong( $params ) {  }
  function new_aide( $params ) {  }
  function new_adult( $params ) {  }
}  
?>