<?php
require('Connections/registerDB.php');
require("lib/page/header.php"); 
require_once("lib/src/constants.php");
require("lib/src/util.php");


	// display the registration information so the user can doublecheck it
	require_once("lib/src/displayRegInfo.php");

function titleCase($str)
{
return ucwords(strtolower($str));	
}

function useTitleCase($regInfo)
{

$firstNameArray= $regInfo["camperFirstName"];
$lastNameArray= $regInfo["camperLastName"];
$otherNameArray = $regInfo["otherCampName"];
$lastOne = count($firstNameArray);

for ($j = 0; $j < $lastOne; $j++)
	{
		$regInfo["camperFirstName"][$j] = titleCase($firstNameArray[$j]);
		$regInfo["camperLastName"][$j] = titleCase($lastNameArray[$j]);
		$regInfo["otherCampName"][$j] = titleCase($otherNameArray[$j]);
	}
	
	$regInfo["motherFirstName"] = titleCase($regInfo["motherFirstName"]);
	$regInfo["motherLastName"] = titleCase($regInfo["motherLastName"]);
	$regInfo["fatherFirstName"] = titleCase($regInfo["fatherFirstName"]);
	$regInfo["fatherLastName"] = titleCase($regInfo["fatherLastName"]);
	$regInfo["contactAddress"] = titleCase($regInfo["contactAddress"]);
	$regInfo["contactCityState"] = titleCase($regInfo["contactCityState"]);
	$regInfo["emergencyName"] = titleCase($regInfo["emergencyName"]);

return $regInfo;
}

	//print ("<h1> Here is the post data </h1>");
	//print_r($_POST);

	// strip slashes from quotes
	if (get_magic_quotes_gpc()) {
    function stripslashes_gpc(&$value)
    {
        $value = stripslashes($value);
    }
    array_walk_recursive($_POST, 'stripslashes_gpc');
	}
	$regInfo = useTitleCase($_POST);
			
	//print ("<h1> Here is the reg data </h1>");
	//print_r($regInfo);

	displayRegInfo($regInfo);

	// save the data to submit to the database after they approve it
	$_SESSION['registrationData'] = $regInfo;
	//print_r($_SESSION['registrationData']);
	
	?>
<script type="text/javascript" src="/scripts/volunteer.js"></script>
<script type="text/javascript">
	$( document ).ready( function(){

		// Convert and display volunteer dates given the ids
		var programDateIds = <?php
			if(isset($regInfo["volunteerDates"])){
				$date_ids = "'" . implode(",", $regInfo["volunteerDates"]) . "';";
				echo $date_ids;
			}
			else{
				echo "[];";
			}
			?>
			
			if(programDateIds.length > 0){
				volunteer.programDateIdsToDates(programDateIds, function(program_dates){
					if(program_dates.length > 0){
						// update the date table cell with these dates
						$('#volunteerDates').html(program_dates.join(', '));
					}
				});
			}
	});
</script>

	<p></p>
    <form method="post" action="/register/payment.php?<?php echo rawurldecode($query_string);?>">
    
		<h1>Important!  You are NOT registered yet. You must click the button below to complete your registration.<br />
<input type="submit" value="Confirm and Continue to the Next Step" onclick="needToConfirm = false;"/></h1>
        <p>The button above will transfer you to paypal, where you can submit your payment to complete your registration.  
        <br />If you are a volunteer or aide and do not owe any registration fees, this button will bypass paypal and confirm your registration immediately.</p>
            </form>

    <p>

		<script language="JavaScript">
		  var needToConfirm = true;

		  window.onbeforeunload = confirmExit;
		  function confirmExit()
		  {
		    if (needToConfirm){
					return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
				}
		  }
		</script>
<?php require("lib/page/footer.php"); ?>

<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>

