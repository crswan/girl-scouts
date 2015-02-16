<?php 

// Start a brand new session (delete variables, kill cookies, etc)
if( !session_id()) session_start();
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
session_start();


require_once("lib/page/header.php");
require_once("lib/src/constants.php");
require_once("lib/src/util.php");

?>
	

<form action="main.php" method="get" class="validateme">
<div class="instructions">

<?php


global $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline, $PDC_todays_date;
echo("<h2>Today is ".$PDC_todays_date."</h2>");

if ( $PDC_Today < $PDC_RegistrationStartDate )
{
	if ( isset ($_REQUEST["expressRegistration"] ) )
	{
	?>
	<h1>Welcome to Express Registration! 
    <br /> (for returning At-camp Volunteers)</h1>
    <p>Thank you for registering early.  By registering before our campers do, 
    you are helping us to admit campers immediately, rather than having to put them on the wait list.  
    Volunteers like you are what makes our camp run!</p>
    <p>If you have any questions or problems, please contact camp administrator Debbie Deruy at debbie@peninsuladaycamp.org or 650-400-0468 (cell).</p> 
	<?php
	}
	else
	{
	?>
	<h1>Registration will open on <?php echo date("l, F j, Y", $PDC_RegistrationStartDate) ?> </h1>	
	<h1>New this year, girls entering first grade may register as campers.</h1>
	<p>Meanwhile, you can learn more about our camp on our <a href="/">home page</a>.  We look forward to seeing you at camp this year!</p>
	<?php
	}
}
else
{
	?><h1>Welcome to Peninsula Day Camp's online registration system! </h1>
    <h3>Registration for Day Camp opened on <?php echo date("l, F j Y", $PDC_RegistrationStartDate); ?></h3>
	<?php
}

if ( PDC_RegistrationDeadlinePassed() )
{
	?><h2>The  <?php echo date("F j", $PDC_RegistrationDeadline); ?> registration deadline has passed.</h2><?php
}
else 
{
	?><h3>Register before <?php echo date("F j", $PDC_RegistrationDeadline); ?>!</h3><?php 
}
	?>
	<ul>
    <li>Campers registering before  <?php echo date("F j", $PDC_RegistrationDeadline); ?> will receive a $50 discount.</li>
    <li>Campers registering after <?php echo date("F j", $PDC_RegistrationDeadline); ?> will pay full fees and will be placed on a wait list while we recruit additional adult volunteers. </li>
    <li>Due to the large number of aides this year, <b>we will not accept aide registrations after  <?php echo date("F j", $PDC_RegistrationDeadline); ?>.</b></li>

    </ul>
	</div>
    

<?php

if ($PDC_Today >= $PDC_RegistrationStartDate 
	|| isset ($_REQUEST["debugAllowEarlyRegistration"] ) 
	|| isset ($_REQUEST["expressRegistration"] ) 
	)
	drawRegistrationForm();
?>

</div> <!-- main body form -->

<?php

function drawFinancialAidFields()
{

global $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;

if ( PDC_RegistrationDeadlinePassed() )
	{
?>
	<tr>
	<th colspan="2">Do you want to apply for Financial Aid?<br/> </th><td><select name="paymentFinancialAid" id="financialAid" disabled><option>No</option><option>Yes</option></select></td>
	</tr>
	<tr>
	<td></td><td></td>
	<th>Note: the registration deadline has passed.  No more financial applications are being considered.</th>
	</tr>
<?php
	}
	else 
	{
?>
	<tr>
	<th colspan="2">Do you want to apply for Financial Aid?<br/> </th><td><select name="paymentFinancialAid" id="financialAid"><option>No</option><option>Yes</option></select></td>
	</tr>
	<tr class="financialAid">
	<td colspan="3">A financial aid form will be sent to you; please complete and return as soon as possible.  A $125 co-pay is due when you register. </td>
	</tr>
<?php
	}
}

function drawRegistrationForm()
{
?>
	<H3> Now you can register your whole family at once!  Just answer the following questions to tell us how many people you'll be registering, and then we'll get started.</h3>
	<table class="registrationForm" width="100%">
		<tr><th colspan="3">Campers (Girls entering grades 1-12)</th></tr>
		<tr><td>&nbsp;</td><td>Number of campers who are registered Girl Scouts: </td><td>
			<select name="numCampers"> <option>0</option><option>1</option>  <option>2</option> <option>3</option> <option>4</option> <option>5</option> </select>
		</td></tr>
		<tr><td>&nbsp;</td><td>Number of campers who are not registered Girl Scouts: </td><td>
			<select name="numCampers_NonScouts"> <option>0</option><option>1</option>  <option>2</option> <option>3</option> <option>4</option> <option>5</option> </select>
		</td></tr>
        
        <tr><th colspan="3"><hr></th></tr>

	<?php
	if ( PDC_AcceptingAideRegistrations() )
	{
	?>
		<tr><th colspan="3">Aides (Girls entering grades 10-12 or first year of college)</th></tr>
		<tr><td>&nbsp;</td><td>Number of aides who are registered Girl Scouts: </td><td>
			<select name="numAides"> <option>0</option><option>1</option>  <option>2</option> <option>3</option> <option>4</option> <option>5</option> </select>
		</td></tr>
		<tr><td>&nbsp;</td><td>Number of aides who are not registered Girl Scouts: </td><td>
			<select name="numAides_NonScouts"> <option>0</option><option>1</option>  <option>2</option> <option>3</option> <option>4</option> <option>5</option> </select>
		</td></tr>

	<?php
	}
	else
	{
	?>
			<tr><th colspan="3">Aides (Girls entering grades 10-12 or first year of college)</th></tr>
		<tr><td></td><td colspan="2" >Sorry, the deadline for registering as an aide has passed.  Come back next year!</td></tr>

	<?php
	}
	?>

    <tr><th colspan="3"><hr></th></tr>
    <tr><th colspan="3">Be a volunteer!  Adult volunteers receive priority admission to camp and discounted fees, and we provide special units at camp for your younger children and boys.  See the <a href="/fees.html">Fees page</a> for details. </th></tr>
    <tr><td>&nbsp;</td><td>Adult Volunteer Type</td><td>
        <select name="volunteerType">
            <option value="VolunteerNone">No volunteer</option>
            <option value="VolunteerAtHome">At-home volunteer (about 20 hours) </option>
            <option value="Volunteer3Day">3-day volunteer at camp</option>
            <option value="Volunteer5Day">5-day volunteer at camp</option>
            <option value="VolunteerFullTime">10-day volunteer at camp</option>
        </select>
    </td></tr>
    <tr style="vertical-align:text-top;"><td>&nbsp;</td><td># Younger chilren or boys <span class="italic">(for at-camp volunteers only)</span>
				<br/><span style="color:red;">New This Year!</span> <span style="font-weight:bold;">You must enter 1st grade and older girls as campers.</span>
			</td>
		<td>
        <select name="numTags"><option value="0">0</option> <option value="1">1</option> <option value="2">2</option> <option>3</option> <option>4</option> <option>5</option> </select>
    </td></tr>
    <tr><th colspan="3"><hr></th></tr>

	<tr>
		<th colspan="2">If you want to use cookie coupons, enter the amount here ($)</th><td><input type="text" name="cookieCoupons" id="cookieCoupons" class="validate[optional,custom[onlyNumber]]"/></td>
	</tr>

	<?php drawFinancialAidFields(); ?>
</table>

	<?php
	if (isset ($_REQUEST["debugAllowEarlyRegistration"] ) )
	{
	?>
        <h1>FOR TESTING PURPOSES ONLY</h1>
        <table class="form">
            <tr>
                <th colspan="2">Do you want to pretend that the registration deadline has passed?<br/> </th><td><select name="debugLateFee"><option value="0">No</option><option value="1">Yes</option></select></td>
            </tr>
            <!-- 
            <tr>
                <th colspan="2">Do you want to display ultra-detailed info on the next page?<br/> </th><td><select name="debug"><option value="">No</option><option value="1">Yes</option></select></td>
            </tr>
            -->
        </table>
	<?php
    }
    ?>
		<div style="margin-top:20px;border-top:1px solid #CCC;text-align:center;padding-top:20px;">
			<input type="submit" value="Begin Registration" style="font-size:12px"/>
		</div>



</form>
<?php
}

?> 
<?php require("lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
