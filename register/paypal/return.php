<?php
	require('../Connections/registerDB.php');
  require_once("lib/src/constants.php");
  
	// set paid status 
  // $record = $DB->getRecordById('cgi_web-family', $_SESSION['recid']);
  // 
  // $record->setField('paypalStatus', 'Paid');
  // 
  // $result = $record->commit();
	
  // if(FileMaker::isError($result))
  // {
  //  $params = array('message' => 'There was a problem completing this transaction. Please email Debbie Deruy at debbie@peninsuladaycamp.org for assistance. ');
  //  exit;
  // }
  
	unset($_SESSION['recid']);
	require("../lib/page/header.php"); 
?>

	<h3>Registration Complete</h3>
	<p>Thank you for registering for Peninsula Girl Scout Day Camp! </p>
	<ul>
    <li>If applicable, a receipt for any payments has been emailed to you. 
		You may log into your account at www.paypal.com/us to view details of this transaction.</li>        
    <li>If your camper(s) is registered with an "At-Camp Adult Volunteer" 
    both the adult volunteer and camper(s) are accepted into day camp.</li>
    <li>If your camper(s) is registered with an "At-Home Adult Volunteer", your camper(s) has been accepted into day camp. Our Volunteer Coordinator will be contacting you regarding at home jobs that are available. We appreciate your volunteering, camp could not operate without your preparation help. (If you fail to complete a home job, satisfactorily and on time, your camper(s) will drop to the wait list immediately.</li>
    <li>If your camper(s) is registered without an Adult Volunteer, your camper(s) has been placed on the waitlist and will be accepted as additional At-Camp volunteers are recruited.</li>

     <li>Please watch for a confirmation email from our camp administrator.  
        If you don't receive one within 24 hours,
        <?php
          // global $PDC_Dates;
          // $time = strtotime($PDC_Dates["registrationDeadline"]);
          // $time = date("F d, Y", $time);
          // echo $time;
        ?> please contact Debbie@peninsuladaycamp.org.</li>
    <li><b>Important:</b> If you registered as an at-camp volunteer,
        <a href="http://www.peninsuladaycamp.org/volunteer/training_signup.php">
        click here to sign up for your volunteer training classes</a>. </li>
</ul>
	<p>To return to the Peninsula Day Camp home page, please <a href="http://www.peninsuladaycamp.org">click here</a>.</p>

    
<?php require("../lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
