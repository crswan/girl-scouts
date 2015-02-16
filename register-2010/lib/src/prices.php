<?php

// global variables and functions used here
require_once("constants.php");

// $priceType is an index into the (global constant) PDC_Prices array.  Campers are typed according to their parent's volunteer status
function getPrice( $priceType, $nonScout )
{

global $PDC_Prices, $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;
static $firstCamperDiscountUsed = 0;
$description = "";
	
	switch ( $priceType ) {
		case "Adult":
		case "Aide":
		case "Tagalong":
			break;
		case "VolunteerFullTime":
			$description = $description . "Full-time volunteer discount applies<br/>";
			break;
		case "Volunteer5Day":
			$description = $description . "5-day volunteer discount applies<br/>";
			break;
		case "Volunteer3Day":
			$description = $description . "3-day volunteer discount applies<br/>";
			break;
		case "VolunteerAtHome":
		case "VolunteerNone":
			break;
	}

	//  Full-time and at-home volunteers get special "first camper" prices 
	if ( $priceType == "VolunteerFullTime" || $priceType == "VolunteerAtHome")
	{
		if ( !$firstCamperDiscountUsed )
		{
			$priceType = $priceType."FirstCamper";
			$firstCamperDiscountUsed = 1;
			$description = $description . "First camper discount applies<br/>";
		}
	}
		
	// now initialize the basic price from the array of constants
	$myPrice = $PDC_Prices[$priceType];

	// add in the non-scout fee
	if ( applyNonScoutFee($priceType, $nonScout) )
	{
		$description = $description . "Non-scout fee applies<br/>";
		$myPrice += $PDC_Prices["NonGirlScout"];
	}

	// add late fee
	if ( applyLateFee($priceType) ) 
	{
		$myPrice += $PDC_Prices["LateFee"];
		$description = $description . "Late Fee applies<br />";
	}

	// replace the whole thing with the financial aid co-pay
	if ( applyFinancialAidCoPay($priceType) )
	{
		$myPrice = $PDC_Prices["FinancialAidCopay"];
		$description = $description . "Financial Aid co-pay applies<br />";
	}

	return array( $description, $myPrice);


}

function applyLateFee($personType)
{
global $PDC_Prices, $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;
	// for testing purposes, allow forcing of late fee in the querystring
	if ( $PDC_Today > $PDC_RegistrationDeadline
		|| ( isset($_REQUEST['debugLateFee']) && $_REQUEST['debugLateFee'] ) )
	{
		// add late fee
		if ($personType == "Adult" ) return FALSE;
		else return TRUE;
	}
	else
		return FALSE;

}

function applyNonScoutFee($personType, $nonScout)
{
global $PDC_Prices, $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;
	if ( !$nonScout )
		return FALSE;

	switch ($personType)
	{
		case "Adult":
		case "Tagalong":
			return FALSE;
		default:
			return TRUE;
	}
}

function applyFinancialAidCoPay($personType)
{ 	
global $PDC_Prices, $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;
	// can only apply for financial aid before the registration deadline
	if ( $PDC_Today > $PDC_RegistrationDeadline || (isset($_REQUEST['debug_late'])) )
		return FALSE;

	// have they asked for it?
	if ( !isset ( $_REQUEST["paymentFinancialAid"] ) ||  $_REQUEST["paymentFinancialAid"] != "Yes" )
	{
		return FALSE;
	}

	// is it cheaper to skip it?
	switch ($personType)
	{
		case "Aide":
		case "Adult":
		case "Tagalong":
		case "VolunteerFullTime":
		case "VolunteerFullTimeFirstCamper":
			return FALSE;
		default:
			$myPrice = $PDC_Prices["FinancialAidCopay"];
			return TRUE;
	}
}

?>

<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
