<?php

/*
 * Called by paypal after payment is processed
 */

	require_once('../Connections/registerDB.php');
	require_once('../PayPal_Module/paypal.php'); 
	include("../../lib/src/config_general.php");

	include("/home/peninsul/php/Mail.php"); // Pear Mail module
	include("/home/peninsul/php/Mail/mime.php");

	ini_set('log_errors','on');
	ini_set('display_errors','off');
	ini_set('error_log',dirname(__FILE__)."/error_log.log");
	error_reporting(E_ALL^E_NOTICE);
	// error_log("Top of notify.php");
	
	// Update the filemaker record 

	// PRODUCTION
		$fm_update = FMStudio_PayPal_Notify($DB,"cgi_web-family","businesspgsdc@yahoo.com","zz_webRegId","paypalStatus","paypalNames","paypalVars","ProcessPayment",false,"../");

	// SANDBOX Hanzel Morato
	// $fm_update = FMStudio_PayPal_Notify($DB,"cgi_web-family","hanzel_1297112916_biz@amantessoftware.com","zz_webRegId","paypalStatus","paypalNames","paypalVars","ProcessPayment",true,"../"); 
	
	// ::TODO:: handle verification error here
	if($fm_update["result"] == False){
		$recipients = 'hanz@beezwax.net';
		$headers['To']      = 'hanz@beezwax.net';
		$headers['Subject'] = 'Paypal error invoice #' . $fm_update["invoice_num"] ;
		$params['sendmail_path'] = '/usr/sbin/sendmail';
		
		$txt_body = "paypal failure";
		$mime = new Mail_mime(array('eol' => "\r\n"));
		$mime->setHTMLBody($txt_body);

		$body = $mime->get();
		$hdrs = $mime->headers($headers);
		
		// Create the mail object using the Mail::factory method
		$mail =& Mail::factory('sendmail');
		$mail->send($recipients, $hdrs, $body);
		exit;
	}


	
	// Prep the notification email
	$recipients = $fm_update["contact_email"];

	$headers['From']    = 'admin@peninsuladaycamp.org';
	$headers['Reply-To'] = 'admin@peninsuladaycamp.org';
	// $headers['From']    = 'hanzel@gmail.com';
	// $headers['Reply-To'] = 'hanzel@gmail.com';
	$headers['To']      = $fm_update["contact_email"];
	// $headers['To']      = "hanz@beezwax.net";
	// $headers['Bcc']      = 'dderuy@comcast.net,hanzel@gmail.com';
	$headers['Subject'] = 'Peninsula Day Camp Invoice #' . $fm_update["invoice_num"];
	$params['sendmail_path'] = '/usr/sbin/sendmail';

	$year = Date("Y");

	$txt_body = "<html>";
	$txt_body .= "<body style = \"font-family: sans-serif; font-weight: normal;\">";
	$txt_body .= "<p>Peninsula Day Camp &#45; Registration Confirmation</p>";
	$txt_body .= "<p>Your registration and payment for Peninsula Day Camp has been received.</p>";
	$txt_body .= "<p>&#8226;	If your camper(s) is registered with an \"At&#45;Camp Adult Volunteer\", both the adult volunteer and camper(s) are accepted into day camp.</p>";
	$txt_body .= "<p>&#8226;	If your camper(s) is registered with an \"At&#45;Home Adult Volunteer\", your camper(s) has been accepted into day camp. Our Volunteer Coordinator will be contacting you regarding at home jobs that are available. We appreciate your volunteering, camp could not operate without your preparation help. (If you fail to complete a home job, satisfactorily and on time, your camper(s) will drop to the wait list immediately.</p>";
	$txt_body .= "<p>&#8226;	If your camper(s) is registered without an Adult Volunteer, your camper(s) has been placed on the waitlist and will be accepted as additional At&#45;Camp volunteers are recruited.</p>";
	$txt_body .= "<p>You will receive an email with additional camp information, bus schedules and health forms in the next few weeks.  Thank you for registering and welcome to Day Camp " . $year . "!</p>";
	
	// get the body of the email
	// functions used
	include("lib/src/constants.php");
	include("lib/src/util.php");
	include("lib/src/prices.php");
	include("../getPricesForEmail.php"); 

	// from main.php
	if ( !isset($_REQUEST['numCampers'])
		&& !isset($_REQUEST['numCampers_NonScouts'])
		&& !isset($_REQUEST['numAides'])
		&& !isset($_REQUEST['numAides_NonScouts'])
		&& !isset($_REQUEST['numTags'])
		&& !isset($_REQUEST['volunteerType'])
	)
	{
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
	}
	
	$regSummary = drawRegistrationFields( $numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupons);

	$html_body = drawPriceSummary($regSummary, $cookieCoupons);
	$html_body .= "</body>";
	$html_body .= "</html>";

	$mime = new Mail_mime(array('eol' => "\r\n"));
	// $mime->setTXTBody($txt_body);
	$mime->setHTMLBody($txt_body . $html_body);
	
	
	
	$body = $mime->get();
	$hdrs = $mime->headers($headers);
	// Create the mail object using the Mail::factory method
	$mail =& Mail::factory('sendmail');

	// $mail->send($recipients, $hdrs, $body);
	// END OF SEND MAIL
	
// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support 
?>