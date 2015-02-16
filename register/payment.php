<?php

ini_set ('display_errors', false);
ini_set('error_reporting', 'E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE');

if( !session_id()) session_start();

if ( !isset($_SESSION['registrationData']) )
{
	require("lib/page/header.php"); 
	echo "<h1>Error!  No registration Data!</h1>";
}
else 
{
	$regInfo = $_SESSION['registrationData'];
	
	require('Connections/registerDB.php');
	require('lib/src/api_funcs.php');
	require("lib/src/util.php");
	require("lib/src/db_utils.php");

	include("../lib/src/config_general.php");
	// include("/home/peninsul/php/Mail.php"); // Pear Mail module
	// include("/home/peninsul/php/Mail/mime.php");
	include("../php/Mail.php"); // Pear Mail module
	include("../php/Mail/mime.php");
	
	include("lib/src/constants.php");
	include("lib/src/prices.php");
	include("getPricesForEmail.php");

	// create the records in the database
	$registration = createDatabaseRecords($_SESSION['registrationData']);
	// if they owe anything, prompt them to pay, otherwise take them straight to the thank you page.
	if ( $regInfo["priceTotal"]  <= 0 )	// declaring cookie coupons might leave a negative total-- don't let them charge *us*
	{
		// echo "email: " . $registration->contactEmail;
		// Prep the notification email
		$recipients = $registration->contactEmail;

		$headers['From']    = 'admin@peninsuladaycamp.org';
		$headers['Reply-To'] = 'admin@peninsuladaycamp.org';
		$headers['To']      = $registration->contactEmail;
		$headers['Subject'] = 'Peninsula Day Camp Invoice #' . $registration->id;
		$params['sendmail_path'] = '/usr/sbin/sendmail';

		$year = Date("Y");
		// $txt_body = "<html>";
		// $txt_body .= "<body style = \"font-family: sans-serif; font-weight: normal;\">";
		// $txt_body .= "<p>Peninsula Day Camp – Registration Confirmation</p>";
		// $txt_body .= "<p>Your registration for Peninsula Day Camp has been received.</p>";
		// $txt_body .= "<p>•	If your camper(s) is registered with an “At-Camp Adult Volunteer” both the adult volunteer and camper(s) are accepted into day camp.</p>";
		// $txt_body .= "<p>•	If your camper(s) are registered with an “At-Home Adult Volunteer”, your campers have been placed at the top of the wait list.  Our volunteer coordinator will be contacting you regarding the at home jobs that are available.  We appreciate your help with the at home jobs, camp could not operate with out your preparation help.  Your child will be accepted into camp when you commit to and complete an at home job.</p>";
		// $txt_body .= "<p>•	If your camper(s) are registered without an Adult Volunteer, your campers have been placed on the waitlist and will be accepted as additional At-Camp volunteers are recruited.</p>";
		// $txt_body .= "<p>You will receive an email with additional camp information, bus schedules and health forms in the next few weeks.  Thank you for registering and welcome to Day Camp 2012!</p>";
		$txt_body = "<html>";
		$txt_body .= "<body style = \"font-family: sans-serif; font-weight: normal;\">";
		$txt_body .= "<p>Peninsula Day Camp &#45; Registration Confirmation</p>";
		$txt_body .= "<p>Your registration and payment for Peninsula Day Camp has been received.</p>";
		$txt_body .= "<p>&#8226;	If your camper(s) is registered with an \"At&#45;Camp Adult Volunteer\" both the adult volunteer and camper(s) are accepted into day camp.</p>";
		$txt_body .= "<p>&#8226;	If your camper(s) is registered with an \"At&#45;Home Adult Volunteer\", your camper(s) has been accepted into day camp. Our Volunteer Coordinator will be contacting you regarding at home jobs that are available. We appreciate your volunteering, camp could not operate without your preparation help. (If you fail to complete a home job, satisfactorily and on time, your camper(s) will drop to the wait list immediately.</p>";
		$txt_body .= "<p>&#8226;	If your camper(s) is registered without an Adult Volunteer, your camper(s) has been placed on the waitlist and will be accepted as additional At&#45;Camp volunteers are recruited.</p>";
		$txt_body .= "<p>You will receive an email with additional camp information, bus schedules and health forms in the next few weeks.  Thank you for registering and welcome to Day Camp " . $year . "!</p>";
		
		$numCampers = $_REQUEST['numCampers'];
		$numCampers_NonScouts = $_REQUEST['numCampers_NonScouts'];
		$numAides = $_REQUEST['numAides'];
		$numAides_NonScouts = $_REQUEST['numAides_NonScouts'];
		$numTags = $_REQUEST['numTags'];
		$volunteerType = $_REQUEST['volunteerType'];
	
		$regSummary = drawRegistrationFields( $numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupons);

		$html_body = drawPriceSummary($regSummary, $cookieCoupons);
		$html_body .= "</body>";
		$html_body .= "</html>";

		$mime = new Mail_mime(array('eol' => "\r\n"));
		// $mime->setTXTBody($txt_body);  DON'T uncomment this!!
		$mime->setHTMLBody($txt_body . $html_body);
		$body = $mime->get();
		$hdrs = $mime->headers($headers);
		// Create the mail object using the Mail::factory method
		$mail =& Mail::factory('sendmail');

		$mail->send($recipients, $hdrs, $body);
		// END OF SEND MAIL

		//exit;
		?>
        <h3>No payment due.  Transferring you to the confirmation page.</h3>
		<script type="text/javascript">
		 
		window.location = "/register/paypal/return.php";
		
        </script> -->
		<?php

	}
	else
	{
		require('PayPal_Module/paypal.php');
		require("lib/page/header.php"); 

		$invoiceNum = $_SESSION['recid'];
		
		echo ("<h3>Just a couple more steps!  Please click the button below to submit your payment of $" . $regInfo["priceTotal"] . " for invoice " . $invoiceNum . " via Paypal.</h3>");
	
		// $record = $DB->getRecordById('cgi_web-family', $_SESSION['recid']);
		global $DB;
 		$findCommand =& $DB->newFindCommand('cgi_web-family');
 		$findCommand->addFindCriterion('zz_webRegId', $invoiceNum);
 		$result = $findCommand->execute();

 		if (FileMaker::isError($result)) {
			trigger_error("There was a problem finding the family record for paypal. " . $result->getMessage(), E_USER_ERROR);
		}
		else{
			$record = $result->getFirstRecord();
		}
		
		// pass the query string to paypal for the notification email
		$query_string = $_SESSION['query_string'];
		$notify = "http://www.peninsuladaycamp.org/register/paypal/notify.php?" . rawurldecode($query_string);

    // PRODUCTION
    
	echo "<h1 class=\"color-red\">Important!  You are <b>NOT</b> registered yet. You must click the button below and <b>PAY IN FULL</b> to complete your registration.<br />";
    FMStudio_PayPal_BuyNow_With_js("businesspgsdc@yahoo.com","0","Peninsuladaycamp.org Camp Payment",$record->getField('priceTotal'),"1","0","0",$invoiceNum,"http://www.peninsuladaycamp.org/register/paypal/return.php",$notify,false,"USD","http://www.peninsuladaycamp.org/register/payment.php","");
    
    // do not use the following. Use the one above instead. -hanz
    // FMStudio_PayPal_BuyNow_With_js("businesspgsdc@yahoo.com","0","Peninsuladaycamp.org Camp Payment",.5,"1","0","0",$invoiceNum,"https://peninsuladaycamp.org/register/paypal/return.php",$notify,false,"USD","http://www.peninsuladaycamp.org/register/payment.php","");
		echo " <p>The button above will transfer you to paypal, where you can submit your payment to complete your registration.  
        <br />If you are a volunteer or aide and do not owe any registration fees, this button will bypass paypal and confirm your registration immediately.</p>";
		// PAYPAL hanzel morato's sandbox
    // FMStudio_PayPal_BuyNow_With_js("hanzel_1297112916_biz@amantessoftware.com","0","Peninsuladaycamp.org Camp Payment",$record->getField('priceTotal'),"1","0","0",$invoiceNum,"http://www.peninsuladaycamp.org/register/paypal/return.php",$notify,true,"USD","http://www.peninsuladaycamp.org/register/payment.php","");

echo "		<script language='JavaScript'>
		  var needToConfirm = true;

		  window.onbeforeunload = confirmExit;
		  function confirmExit()
		  {
		    if (needToConfirm){
					return 'You have attempted to leave this page. Your registration is incomplete until payment is made.  Are you sure you want to exit this page?';
				}
		  }
		</script>";  	

	}
}
?>
      
<?php require("lib/page/footer.php"); ?>

<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>