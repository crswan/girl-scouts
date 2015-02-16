<?php
if( !session_id()) session_start();

if ( !isset($_SESSION['registrationData']) )
{
	require("lib/page/header.php"); 
	echo "<h1>Error!  No registration Data!</h1>";
}
else 
{
	$regInfo = $_SESSION['registrationData'];
	
	// create the records in the database
	require('Connections/registerDB.php');
	require('lib/src/api_funcs.php');
	require("lib/src/util.php");
	require("lib/src/db_utils.php");
	createDatabaseRecords($_SESSION['registrationData']);

	// if they owe anything, prompt them to pay, otherwise take them straight to the thank you page.
	if ( $regInfo["priceTotal"]  <= 0 )	// declaring cookie coupons might leave a negative total-- don't let them charge *us*
	{	
		?>
        <h3>No payment due.  Transferring you to the confirmation page.</h3>
		<script type="text/javascript">
		<!-- 
		window.location = "/register/paypal/return.php";
		//-->
        </script>
		<?php

	}
	else
	{
		require('PayPal_Module/paypal.php');
		require("lib/page/header.php"); 

    // $invoiceNum = date("Ymd-") . $_SESSION['recid']; // removed date prefix to paypal notify -hanz 20110211
		$invoiceNum = $_SESSION['recid'];
		
		echo ("<h3>Just a couple more steps!  Please click the button below to submit your payment of $" . $regInfo["priceTotal"] . " for invoice " . $invoiceNum . " via Paypal.</h3>");
	
		$record = $DB->getRecordById('cgi_web-family', $_SESSION['recid']);
		
		// pass the query string to paypal for the notification email
		$query_string = $_SESSION['query_string'];
		$notify = "http://www.peninsuladaycamp.org/register/paypal/notify.php?" . rawurldecode($query_string);
		// FMStudio_PayPal_BuyNow("businesspgsdc@yahoo.com","0","Peninsuladaycamp.org Camp Payment",$record->getField('priceTotal'),"1","0","0",$invoiceNum,"https://peninsuladaycamp.org/register/paypal/return.php","http://www.peninsuladaycamp.org/register/paypal/notify.php",false,"USD","http://www.peninsuladaycamp.org/register/payment.php","");

    // PRODUCTION
    FMStudio_PayPal_BuyNow("businesspgsdc@yahoo.com","0","Peninsuladaycamp.org Camp Payment",$record->getField('priceTotal'),"1","0","0",$invoiceNum,"https://peninsuladaycamp.org/register/paypal/return.php",$notify,false,"USD","http://www.peninsuladaycamp.org/register/payment.php","");
		
		// PAYPAL hanzel morato's sandbox
    // FMStudio_PayPal_BuyNow("hanzel_1297112916_biz@amantessoftware.com","0","Peninsuladaycamp.org Camp Payment",$record->getField('priceTotal'),"1","0","0",$invoiceNum,"http://www.peninsuladaycamp.org/register/paypal/return.php",$notify,true,"USD","http://www.peninsuladaycamp.org/register/payment.php","");
		
		
		//FMStudio_PayPal_BuyNow("paypal_1297138040_biz@peninsuladaycamp.org","0","Peninsula Girl Scout Day Camp",$record->getField('priceTotal'),"1","0","0",$invoiceNum,"http://www.peninsuladaycamp.org/register/paypal/return.php",$notify,true,"USD","http://www.peninsuladaycamp.org/register/payment.php","");
  	
	}
}
?>
      
<?php require("lib/page/footer.php"); ?>

<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>