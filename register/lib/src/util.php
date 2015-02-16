<?php 
function PDC_RegistrationDeadlinePassed()
{
global $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;
if ( $PDC_Today > $PDC_RegistrationDeadline  
	|| (isset ($_REQUEST["debugLateFee"] ) && $_REQUEST["debugLateFee"]== TRUE ) )
	return TRUE;
else return FALSE;

}

// In 2011 we're not allowing aides to register after the deadline, but next year we may want to re-enable them.
// The check is done in several places, so rather than having date validation all over the place, isolate it 
// here so we can turn this check on and off more easily.

// Note that the the site talks about aide registrations as being date-related, 
// so if they're are disallowed for other reasons, the site will still need some HTML updates.
function PDC_AcceptingAideRegistrations()
{
	if ( PDC_RegistrationDeadlinePassed() )
	{
		PDC_EchoDebug("in PDC_RegistrationDeadlinePassed, it's passed!");
		return FALSE;
	}
	else 
	{
		PDC_EchoDebug("in PDC_RegistrationDeadlinePassed, you're in time!");
			return TRUE;
	}
}

function PDC_EchoDebug($str)
{
	if (isset($_REQUEST['debug']) && $_REQUEST['debug'] )
		echo "<br /><b>DEBUG:</b> " . $str;
}

function PDC_getCamperLevel($type, $gradeInFall)
{
switch ( $type )
	{
	case "Camper":
		{
		switch ($gradeInFall)
			{
			case 2:
			case 3:
				$level = "BR"; // Brownie Girl Scout
				break;
			case 4:
			case 5:
				$level = "JR"; // Junior Girl Scout
				break;
			default:
				$level = "OG"; // Older Girl Scouts
				break;
		
			}
		break;
		}
	case "Tagalong":
		{
			switch ($gradeInFall) {
				case "Pre-school":
				case "K":
					$level = "PX"; // Pixie 
					break;
			case "1":
					$level = "KK"; // Kamp Kids 
					break;
			default: 
					$level = "Boys"; // K-12 boys 
					break;
			}
					
		break;
		}
	case "Aide":
		$level = "AD";	// Aides
		break;
	default:	// all the other types are adults
		$level = "Staff";
		break;
	
}
return $level;
}


//The database's "Sponsored" field describes people's admission priority
function PDC_getCamperSponsoredValue($personType, $volunteerType)
{
	//echo("<h1>in PDC_getCamperSponsoredValue: type=" . $personType . " and volunteerType = " . $volunteerType . "</h2>");

switch ( $personType )
{
case "Aide":
case "Tagalong":
	$sponsored = "1";	// aides and tags are guaranteed admission
	break;
case "Adult":
	$sponsored = "staff";	// staff are guaranteed 
	break;
case "Camper":
	{
	switch ($volunteerType)
		{
		case "VolunteerFullTime":
		case "Volunteer5Day":
		case "Volunteer3Day":
			$sponsored = "1";	// guaranteed admission to camp
			break;
		case "VolunteerAtHome":
			$sponsored = "2";	// priority 2
			break;
		case VolunteerNone:
		default:
			$sponsored = "3";	// priority 3
			break;
		}
	break;
	}
default:
	$sponsored = "";	//  nobody should get here
	break;

}


return $sponsored;
}


//The database's "Sponsored" field describes people's admission priority
function PDC_getFullTimePartTime($personType, $volunteerType)
{

	switch ( $personType )
	{
	case "Adult":
		{
		switch ($volunteerType)
			{
			case "VolunteerFullTime":
				$fullTimePartTime = "FT";	
				break;
			case "Volunteer5Day":
				$fullTimePartTime = "PT5";	
				break;
			case "Volunteer3Day":
				$fullTimePartTime = "PT3";	
				break;
			case "VolunteerAtHome":
				$fullTimePartTime = "AH";
				break;
			case VolunteerNone:
			default:
				$fullTimePartTime = "";
				break;
			}
		break;
		}
	case "Camper":
	case "Aide":
	case "Tagalong":
	default:
		$fullTimePartTime = "";
		break;
	}


return $fullTimePartTime;
}

//-------------------------------------------------------------------------
function PDC_getVolunteerAtCamp($personType, $volunteerType)
{
	switch ( $personType )
	{
	case "Adult":
		{
		switch ($volunteerType)
			{
			case "VolunteerFullTime":
			case "Volunteer5Day":
			case "Volunteer3Day":
				return "Yes";	
			case "VolunteerAtHome":
			case "VolunteerNone":
			default:
				return "No";
			}
		break;
		}
	case "Camper":
	case "Aide":
	case "Tagalong":
	default:
		return "";
	}

}

?>