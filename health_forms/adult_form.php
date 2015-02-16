<?php
  include '../lib/src/setup_healthforms.php';
	include DOCROOT . '/lib/src/lib_time_date.php';
  include 'db_models/person.php';
  include 'db_models/ailment.php';
	include 'db_models/health.php';

	// import vars from post/get
  $method = ( isset( $_POST['submit'] ) ) ? 'POST' : 'GET';
  $form_vars = ( $method == 'POST' ) ?  $_POST : $_GET;
  
  $reg_num = isset($form_vars['reg_num']) ? (int) $form_vars['reg_num'] : NULL;

  // make sure we received a valid registrant id
  if(! is_int($reg_num) || $reg_num == 0){
    trigger_error("Script received bad registrant number.", E_USER_NOTICE);
  }

	// security check. Make sure this user can view the camper record requested
	HealthSecurity::CanViewCamper($reg_num);  

  // get camper info
  $camper = Person::getPerson(array('id' => $reg_num));

// $firephp->info('date:' . $camper->getField('people.HEALTH::date_modified'));

	$smarty->assign('previously_completed', $camper->getField('people.HEALTH::date_modified'));
	
  $smarty->assign('camper', $camper);
  $smarty->assign('full_name', $camper->getField('Full Name'));
  
  if ( $method == 'POST' ){
    $health_record = new Health;
		$params = array(
			"person_id" => $reg_num
		);
		$health_record->save($params);
		
		//send user back to the forms list
		header('Location: ' . WEB_PATH_HEALTHFORMS);
  }
  
  // INITIALIZE FORM
  else{
    $allergy_options = Ailment::getAilmentsList(array("grouping" => "adult_alleries"));
    $smarty->assign('adult_allergy_options', $allergy_options);
    $smarty->assign('allergies', array());

		$ailments_options = Ailment::getAilmentsList(array("grouping" => "adult"));
    $smarty->assign('ailments_options', $ailments_options);
    $smarty->assign('ailments', array());
		$smarty->assign('reg_num', $reg_num);
    $smarty->display('health_adult_form.tpl');
  }
?>