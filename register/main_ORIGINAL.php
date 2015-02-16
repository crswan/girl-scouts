<?php
if( !session_id()) session_start();

if (    !isset($_REQUEST['numCampers'])
	&& !isset($_REQUEST['numCampers_NonScouts'])
	&& !isset($_REQUEST['numAides'])
	&& !isset($_REQUEST['numAides_NonScouts'])
	&& !isset($_REQUEST['numTags'])
	&& !isset($_REQUEST['volunteerType'])
)
{
	header("Location:index-2011.php");
	exit();
}
else
{
	$numCampers = $_REQUEST['numCampers'];
	$numCampers_NonScouts = $_REQUEST['numCampers_NonScouts'];
	$numAides = $_REQUEST['numAides'];
	$numAides_NonScouts = $_REQUEST['numAides_NonScouts'];
	$numTags = $_REQUEST['numTags'];
	$volunteerType = $_REQUEST['volunteerType'];
	
	// save the query string in the session for later use - hanzel morato 2012-02-13
	$_SESSION['query_string'] = urlencode($_SERVER['QUERY_STRING']);
}

// include("../lib/src/config_general.php");
// $firephp->info($_SERVER['QUERY_STRING']);

// Clear out any session data and make sure we're submitting the new stuff.
if ( $_SESSION['registrationData'] )
	unset ($_SESSION['registrationData']);
	// unset ($_SESSION['query_string']);

// functions used on this page
require_once("lib/src/constants.php");
require_once("lib/src/util.php");
require_once("lib/src/prices.php");
require_once("form-parts/main/family.php");

require("lib/page/header.php"); 
?>



<form action="confirm.php" method="post" class="validateme">

<?php

	$regSummary = drawRegistrationFields( $numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupons);

	drawPriceSummary($regSummary, $cookieCoupons);
?>

	<div style="margin-top:20px;border-top:1px solid #CCC;text-align:center;padding-top:20px;">
		<input type="submit" value="Continue to the next step" style="font-size:12px"/>
	</div>
</form>

<?php require("lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
