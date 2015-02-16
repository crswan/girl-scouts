<?php require_once('PayPal_Module/paypal.php'); ?>
<?php
if( !session_id() ) session_start();
if( isset($_GET['id']) ) $_SESSION['recid'] = $_GET['id'];
if( !isset($_SESSION['recid']) ) {
	header("Location: index.php");
	exit();
} else {
	require_once("Connections/DB.php");
	$record = $DB->getRecordById('cgi_Web-Registrations',$_SESSION['recid']);
	if( FileMaker::isError($record) ){
		$error = $record->getMessage();
	} else {
		if( $record->getField('zc_totalCost') <= 0 ){ 
			$script = $DB->newFindCommand('cgi_Web-Registrations',array('-recid',$_SESSION['recid']));
			$script->setScript('ProcessPayment_TransferData',$record->getField('zz_webRegId'));
			$script_result = $script->execute();
		}
		if( FileMaker::isError($script_result) ) $error = $script_result->getMessage();
		else unset($_SESSION['id']);
	}
}
require("lib/page/header.php"); 
?>
<?php if( !FileMaker::isError($record) ){ ?>
	<?php if( $record->getField('zc_totalCost') == 0 ) { ?>
		<h3>Registration Complete!!</h3>
		<p>Thank you for registering <?php echo $record->getField('camperFirstName'); ?>.</p>
		<p>Your registration cost $0.00 and has been completed in full.</p>
		<p>&nbsp;</p>
		<h3>Next Steps:</h3>
		<p>To register another Camper/Aide/Adult, please <a href="index.php">click here to start a new registration</a>. If you registered with a volunteer discount, you MUST register the adult volunteer!</p>
		<p>If you registered as an at-camp volunteer, please go to the  <a href="http://www.peninsuladaycamp.org/forms/">forms page</a> to print and mail the Adult Training Schedule and Signup Sheet.</p>
		<p>To return to the Peninsula Day Camp website, please <a href="http://www.peninsuladaycamp.org">click here</a>.</p>
	<?php } else { ?>
			<input type="hidden" name="postback" value="1"/>
			<div class="instructions">
				<p>Please review the payment details below and click &quot;Proceed to Checkout&quot;. You will be redirected to paypal to complete your payment.</p>
			</div>
		
			<h3>Amount Due</h3>
			<table class="form">
				<tr>
					<th style="border-bottom:1px solid #CCC;">Cost Summary</th>
					<td style="border-bottom:1px solid #CCC;width:450px;"><?php echo $record->getFieldUnencoded('zc_cartDescription'); ?></td>
				</tr>
				<tr>
					<th>Total Amount Due:</th>
					<td style="font-size:13px;font-weight:bold;">$<?php echo number_format($record->getField('zc_totalCost'),2); ?></td>
				</tr>
			</table>
		
	<div style="margin-top:20px;border-top:1px solid #CCC;text-align:center;padding-top:20px;">
			<?php //FMStudio_PayPal_BuyNow("cooolg_1260299659_biz@hotmail.com","0",str_replace("<br/>",", ",$record->getFieldUnencoded('zc_cartDescription')),$record->getField('zc_totalCost'),"1","0","0",$record->getField('zz_webRegId'),"http://www.peninsuladaycamp.org/register/paypal/return.php","http://www.peninsuladaycamp.org/register/paypal/notify.php",true,"USD/;/http://www.peninsuladaycamp.org/register/payment.php",""); ?>
			<?php FMStudio_PayPal_BuyNow("businesspgsdc@yahoo.com","0","Peninsuladaycamp.org Camp Payment",$record->getField('zc_totalCost'),"1","0","0",$record->getField('zz_webRegId'),"http://www.peninsuladaycamp.org/register/paypal/return.php","http://www.peninsuladaycamp.org/register/paypal/notify.php",false,"USD/;/http://www.peninsuladaycamp.org/register/payment.php","");?>
	</div>
	<?php } ?>
<?php } ?>
<?php require("lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
