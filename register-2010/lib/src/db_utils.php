<h1>Add the new people to the Database </h1>

<?php


  $registration = new PDC_Registration;
  $params = array(
  
    'motherFirstName' => $_POST["motherFirstName"],
    'motherLastName' => $_POST["motherLastName"],
    'contactHomePhone' => $_POST["contactHomePhone"],
    'motherWorkPhone' => $_POST["motherWorkPhone"],
    'motherCellPhone' => $_POST["motherCellPhone"],
    
    'fatherFirstName' => $_POST["fatherFirstName"],
    'fatherLastName' => $_POST["fatherLastName"],
    'fatherHomePhone' => $_POST["fatherHomePhone"],
    'fatherWorkPhone' => $_POST["fatherWorkPhone"],
    'fatherCellPhone' => $_POST["fatherCellPhone"],

	'contactAddress' => $_POST["contactAddress"],
	'contactCityState' => $_POST["contactCityState"],
	'contactZip' => $_POST["contactZip"],
	'contactEmail' => $_POST["contactEmail"],
	'transportBusStopRequest' => $_POST["transportBusStopRequest"],
	
    'emergencyName' => $_POST["emergencyName"],
    'emergencyPhone' => $_POST["emergencyPhone"],
    'emergencyRelationship' => $_POST["emergencyRelationship"],
	'specialRequests' => $_POST["specialRequests"],
  
	'cookieCoupons' => $_POST["cookieCoupons"],
	'financialAid' => $_POST["financialAid"],
	);

  

  $registration->initiate($params);
  // print_r($registration);
  echo 'the new family id is: ' . $registration->id;
  
  
 for ($j = 0; $j < count($firstNameArray); $j++)
{
	$camperType = $_POST["camperType"][$j];

	switch ($camperType) {
		case "Camper":
			$camperAideStaff = "1-Camper";
			$liveScan = "N/A";
			$fullTimePartTime = "N/A";
			$atCamp = "N/A";
			$gender = "N/A";
			break;
		case "Tagalong":
			$camperAideStaff = "1-Camper";
			$liveScan = "N/A";
			$fullTimePartTime = "N/A";
			$atCamp = "N/A";
			$gender =  $_POST["gender"][$j];
			break;
		case "Aide":
			$camperAideStaff = "2-Aide";
			$liveScan = "N/A";
			$fullTimePartTime = "N/A";
			$atCamp = "N/A";
			$gender = "N/A";
			break;
		case "Adult":
			$camperAideStaff = "3-Staff";
			$liveScan = $_POST["liveScan"][$j];
			$fullTimePartTime = $_POST["volunteerType"][$j];
			$atCamp = $_POST["volunteerType"][$j];
			$gender = "N/A";
			break;
	}

	$sponsored = "TBD-- sponsored";
	$level = "TBD-- level";

	$params = array(
		'firstName' => $_POST["camperFirstName"][$j],
		'lastName' => $_POST["camperLastName"][$j],
		'tShirtSize' => $_POST["otherTshirtSize"][$j],
		'camperBirthday' => $_POST["camperBirthday"][$j],
		'camperGradeInFall' => $_POST["camperGradeInFall"][$j],
		'camperTroop' => $_POST["troopNum"][$j],
		
		'campYear' => "11",
		'camperAideStaff' => $camperAideStaff,
		'staffChildren' => $familyRoster,
		'sponsored' => $sponsored,
		'level' => $level,
		'registeredScout' => $_POST["registeredGirlScout"][$j],
		'liveScan' => $_POST['liveScan'][$j],
		'fullTimePartTime' => $fullTimePartTime,
		'jobNotes' => $_POST["volunteerWhereDoYouWantToWork"][$j],
		'price' => $_POST["camperPrice"][$j],
		'gender' => $gender,
		'camperAideStaff' => $camperAideStaff,
		'liveScan' => $liveScan,
		'fullTimePartTime' => $fullTimePartTime,
		'atCamp' => $atCamp,


	);
  
	$registration->new_camper($params);

}

?>