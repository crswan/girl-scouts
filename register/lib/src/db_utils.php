<?php 

function createDatabaseRecords($regInfo)
{
// do some preprocessing

global $PDC_Dates;
$campYear = $PDC_Dates["campYear"];

$familyRoster = "";
$firstNameArray= $regInfo["camperFirstName"];
$lastNameArray= $regInfo["camperLastName"];
$lastOne = count($firstNameArray);

for ($j = 0; $j < $lastOne; $j++)
{

	
	// list the whole family for "staff children" field
	$familyRoster = $familyRoster . $firstNameArray[$j] . " " . $lastNameArray[$j];
	if ( $j < $lastOne-1 ) $familyRoster = $familyRoster . ", ";

	// hide aide first names
	if ($regInfo["camperType"][$j] == "Aide" )
	{
		$hiddenNameArray[$j] = $firstNameArray[$j];
		$firstNameArray[$j] = $regInfo["otherCampName"][$j];
	}
	else
		$hiddenNameArray[$j] = "";


}

  $registration = new PDC_Registration;
  $params = array(
  
    'motherFirstName' => $regInfo["motherFirstName"],
    'motherLastName' => $regInfo["motherLastName"],
    'contactHomePhone' => $regInfo["contactHomePhone"],
    'motherWorkPhone' => $regInfo["motherWorkPhone"],
    'motherCellPhone' => $regInfo["motherCellPhone"],
  
    'fatherFirstName' => $regInfo["fatherFirstName"],
    'fatherLastName' => $regInfo["fatherLastName"],
    'fatherHomePhone' => $regInfo["fatherHomePhone"],
    'fatherWorkPhone' => $regInfo["fatherWorkPhone"],
    'fatherCellPhone' => $regInfo["fatherCellPhone"],

	'contactAddress' => $regInfo["contactAddress"],
	'contactCityState' => $regInfo["contactCityState"],
	'contactZip' => $regInfo["contactZip"],
	'contactEmail' => $regInfo["contactEmail"],
	'transportBusStopRequest' => $regInfo["transportBusStopRequest"],
	
    'emergencyName' => $regInfo["emergencyName"],
    'emergencyPhone' => $regInfo["emergencyPhone"],
    'emergencyRelationship' => $regInfo["emergencyRelationship"],
	'notesToRegistrar' => $regInfo["notesToRegistrar"],
  
	'cookieCoupons' => $regInfo["cookieCoupons"],
	'financialAid' => $regInfo["financialAid"],
	'priceTotal' => $regInfo["priceTotal"],
	);

  

  $registration->initiate($params);
  // print_r($registration);
  // echo 'the new family id is: ' . $registration->id. "<br>";
  // echo 'the new invoice id is: ' . $_SESSION['recid']. "<br>";

 for ($j = 0; $j < count($firstNameArray); $j++)
{
	$personType = $regInfo["camperType"][$j];
	
	$sponsored =  PDC_getCamperSponsoredValue($personType, $regInfo["volunteerType"]);
	$level = PDC_getCamperLevel($personType, $regInfo["camperGradeInFall"][$j]);
	$atCamp = PDC_getVolunteerAtCamp($personType, $regInfo["volunteerType"]);
	$gender = "";
	$buddyRequest = "";
	$jobNotes = "";
	$liveScan = "";
	$fullTimePartTime = "";


	switch ($personType) {
		case "Camper":
			$camperAideStaff = "1-Camper";
			if ( $regInfo["buddyRequest"][$j] != "" ) $buddyRequest = "place with " . $regInfo["buddyRequest"][$j];
			break;
		case "Tagalong":
			$camperAideStaff = "1-Camper";
			$gender =  $regInfo["tag_Gender"][$j];
			break;
		case "Aide":
			$camperAideStaff = "2-Aide";
			break;
		case "Adult":
			$camperAideStaff = "3-Staff";
			$liveScan = $regInfo["liveScan"][$j];
			$fullTimePartTime = PDC_getFullTimePartTime($personType, $regInfo["volunteerType"]);
			$volunteerDates = isset($regInfo["volunteerDates"] ) ? implode(", ", $regInfo["volunteerDates"]) : ""; 
			if ( isset($regInfo["volunteerWhereDoYouWantToWork"][$j]) ) $jobNotes = $regInfo["volunteerWhereDoYouWantToWork"][$j];
			if ( isset($volunteerDates) && $volunteerDates != "" ) $jobNotes = $jobNotes . ", " . $volunteerDates;
			break;
	}

	$params = array(
		'firstName' => $firstNameArray[$j],
		'lastName' => $lastNameArray[$j],
		'campName' => $regInfo["otherCampName"][$j],
		'hiddenName' => $hiddenNameArray[$j],
		'tShirtSize' => $regInfo["otherTshirtSize"][$j],
		'camperBirthday' => $regInfo["camperBirthday"][$j],
		'camperGradeInFall' => $regInfo["camperGradeInFall"][$j],
		'camperTroop' => $regInfo["troopNum"][$j],

		'specialRequests' => $buddyRequest,
		'campYear' => $campYear,
		'camperAideStaff' => $camperAideStaff,
		'staffChildren' => $familyRoster,
		'sponsored' => $sponsored,
		'level' => $level,
		
		'registeredScout' => $regInfo["registeredGirlScout"][$j],
		'liveScan' => $regInfo['liveScan'][$j],
		'fullTimePartTime' => $fullTimePartTime,
		'jobNotes' => $jobNotes,
		'price' => $regInfo["camperPrice"][$j],
		'gender' => $gender,
		'camperAideStaff' => $camperAideStaff,
		'liveScan' => $liveScan,
		'fullTimePartTime' => $fullTimePartTime,
		'atCamp' => $atCamp,


	);
  
	$registration->new_camper($params);

}
return $registration;
/*
dump_nameValuePair("List of family members" , $familyRoster);
dump_nameValuePair("VolunteerDates" , $volunteerDates);
dump_nameValuePair("JobNotes" , $jobNotes);
dump_nameValuePair("Year" , $campYear);
*/
}
?>