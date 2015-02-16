<?php  
class PDC_Registration { 

  var $id = null;
  
  // information duplicated across family members
  var $motherFirstName = null;
  var $motherLastName = null;
  var $contactHomePhone = null;
  var $motherWorkPhone = null;
  var $motherCellPhone = null;
  
  var $fathersFirstName = null;
  var $fathersLastName = null;
  var $fatherHomePhone = null;
  var $fatherWorkPhone = null;
  var $fatherCellPhone = null;
  
  var $emergencyName = null;
  var $adultFirstName = null;
  var $adultLastName = null;
  
  var $contactAddress = null;
  var $contactCityState = null;
  var $contactZip = null;
  var $contactEmail = null;
  var $transportBusStopRequest = null;
  
  


  function initiate($params) {
    global $DB;
    // print_r($params);
    // exit;
    $shared_field_list = array(
      'motherFirstName', 
      'motherLastName', 
      'contactHomePhone',
      'motherWorkPhone', 
      'motherCellPhone',
      
      'fathersFirstName', 
      'fathersLastName', 
      'fatherHomePhone', 
      'fatherWorkPhone', 
      'fatherCellPhone',
      
      'contactAddress',
      'contactCityState',
      'contactZip',
      'contactEmail',
      'transportBusStopRequest',
    );
    
    // setup data that will be shared across family members
    foreach($shared_field_list as $var){
      $this->$var = $params[$var];
    }
  
    // specify filemaker layout 'cgi_web-family'
    $new_record = $DB->newAddCommand('cgi_web-family');
  
    // reference filemaker field name to be set
    $new_record->setField('emergencyName', $params['emergencyName']);
    $new_record->setField('adultFirstName', $params['adultFirstName']);
    $new_record->setField('adultLastName', $params['adultLastName']);
    
    $new_record->setField('guardianFirstName1', $params['motherFirstName']);
    $new_record->setField('guardianLastName1', $params['motherLastName']);
    $new_record->setField('guardianHomePhone1', $params['contactHomePhone']);
    $new_record->setField('guardianHomeWorkPhone1', $params['motherWorkPhone']);
    $new_record->setField('guardianHomeMobilePhone1', $params['motherCellPhone']);
    
    $new_record->setField('guardianFirstName2', $params['fathersFirstName']);
    $new_record->setField('guardianLastName2', $params['fathersLastName']);
    $new_record->setField('guardianHomePhone2', $params['fatherHomePhone']);
    $new_record->setField('guardianHomeWorkPhone2', $params['fatherWorkPhone']);
    $new_record->setField('guardianHomeMobilePhone2', $params['fatherCellPhone']);
    
    $new_record->setField('contactAddress', $params['contactAddress']);
    $new_record->setField('contactCityState', $params['contactCityState']);
    $new_record->setField('contactZip', $params['contactZip']);
    $new_record->setField('contactEmail', $params['contactEmail']);
    $new_record->setField('transportBusStopRequest', $params['transportBusStopRequest']);

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
    global $DB;
    $new_record = $DB->newAddCommand('cgi_web-person');
    
    $new_record->setField('First Name', $params['firstName']);
    $new_record->setField('Last Name', $params['lastName']);
    $new_record->setField('T Shirt', $params['tShirtSize']);
    
    // duplicated information
    $new_record->setField("Family_ID", $this->id);
    $new_record->setField("Mothers first name", $this->motherFirstName);
    $new_record->setField("Mother's last name", $this->motherLastName);
    $new_record->setField("Home Phone", $this->contactHomePhone);
    $new_record->setField("Mom's Work Phone", $this->motherWorkPhone);
    $new_record->setField("Cell Phone Pager", $this->motherCellPhone);
    
    
    
    
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