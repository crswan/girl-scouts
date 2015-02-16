<?php
function drawRegistrationFields( $numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupon)
{
	$summary = array();
?>
	<input type="hidden" name="postback" value="1"/>
	<input type="hidden" name="type" value="<?php echo $_REQUEST['type']; ?>"/>
	<div class="instructions">

<?php
	displayFamilyPriceHeader($numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupon);
?>

	<p>Once you have completed this form, please click the &quot;Continue&quot; button to proceed to the next step.</p>

	</div>
	<?php 

	addFamilyBlock();

	$nonScoutTrue = TRUE;
	$nonScoutFalse = FALSE;

	for ($i=1; $i<=$numCampers; $i++)
		$summary[] = addRegistrationBlock("Camper", $i, $volunteerType, $nonScoutFalse);

	for ($i=1; $i<=$numCampers_NonScouts; $i++)
		$summary[] = addRegistrationBlock("Camper", $i, $volunteerType, $nonScoutTrue);

	if ( PDC_AcceptingAideRegistrations() )
	{
	for ($i=1; $i<=$numAides; $i++)
		$summary[] = addRegistrationBlock("Aide", $i, $volunteerType, $nonScoutFalse);
	for ($i=1; $i<=$numAides_NonScouts; $i++)
		$summary[] = addRegistrationBlock("Aide", $i, $volunteerType, $nonScoutTrue);
	}

	if (isset($volunteerType) && ($volunteerType != "VolunteerNone") )
	{
		$summary[] = addRegistrationBlock("Adult", 0, $volunteerType, $nonScoutFalse);

		if ($volunteerType != "VolunteerAtHome")
		for ($i=1; $i<=$numTags; $i++)
			$summary[] = addRegistrationBlock("Tagalong", $i, $volunteerType, $nonScoutFalse);
	}

	addFamilyFooterBlock($cookieCoupon);

	return $summary;
}

//
// Draw this block of fields at the top of the page, just once for the whole family.
// There's another block of family fields at the bottom, after all the per-camper blocks.
// Once we get some user feedback, we may decide to move some fields between the two family blocks
//
function addFamilyBlock()
{
?>
<h1>Family Contact Information</h1>
<table class="form">
	<tr>
		<th>Address</th><td><input type="text" name="contactAddress" id="address" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>City,State</th><td><input type="text" name="contactCityState" id="citystate" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Zip</th><td><input type="text" name="contactZip" id="zip" class="validate[required,custom[uszip]]"/></td>
	</tr>
	<tr>
		<th>Parent/Guardian Email</th><td><input type="text" name="contactEmail" id="contactEmail" class="validate[required,custom[email]]"/></td>
	</tr>
	<tr>
		<th>Bus stop choice</th><td><select name="transportBusStopRequest" id="transportBusStopRequest" class="validate[required]"><option></option><option>Drive</option><option value="">-</option>
		<?php foreach(array("Mills High School","Hillsdale High School","Foster City Rec Center","Woodside Elementary School","McKinley School (RWC)","Menlo Park Library","Woodside Methodist Church") as $item) echo "<option>{$item}</option>"; ?>
		</select></td>
	</tr>
</table>
<?php
}

//
// Draw this block of fields at the bottom of the page, just once for the whole family
//
function addFamilyFooterBlock($cookieCoupons)
{
	 
	if ( $_REQUEST["paymentFinancialAid"] == "Yes" ) $financialAid = "yes";
	else $financialAid = "";

	
?>
<h1>More Family Details</h1>
<table class="form">

	<h3>Guardian1/Mother</h3>
	<table class="form">
	<tr>
		<th>First Name</th><td><input type="text" name="motherFirstName" id="mothersFirstName"  class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Last Name</th><td><input type="text" name="motherLastName" id="mothersLastName"  class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Home Phone (555-555-5555)</th><td><input type="text" name="contactHomePhone" id="homePhone" class="validate[required,custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Work Phone (555-555-5555)</th><td><input type="text" name="motherWorkPhone" id="mothersWorkPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Cell Phone (555-555-5555)</th><td><input type="text" name="motherCellPhone" id="mothersCellPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
	</table>
	<h3>Guardian2/Father</h3>
	<table class="form">
	<tr>
		<th>First Name</th><td><input type="text" name="fatherFirstName" id="fathersFirstName"/></td>
	</tr>
	<tr>
		<th>Last Name</th><td><input type="text" name="fatherLastName" id="fathersLastName"/></td>
	</tr>
	<tr>
		<th>Home Phone (555-555-5555)</th><td><input type="text" name="fatherHomePhone" id="fathersHomePhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Work Phone (555-555-5555)</th><td><input type="text" name="fatherWorkPhone" id="fathersWorkPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Cell Phone (555-555-5555)</th><td><input type="text" name="fatherCellPhone" id="fathersCellPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
	</table>

	<h3>Family's Emergency Contact</h3>
	<p>(Please notify your emergency contact that you're listing them, so that they won't be surprised if we need to call.) </p>
	<table class="form">
		<tr> <th>Contact Name</th><td><input type="text" name="emergencyName" id="emergencyName" /></td> </tr>
		<tr> <th>Phone Numbers</th><td><input type="text" name="emergencyPhone" id="emergencyPhone" /></td> </tr>
		<tr> <th>Relationship to Camper</th><td><input type="text" name="emergencyRelationship" id="emergencyRelationship" /></td> </tr>
	</table>
    
    
	<h3>Notes to Registrar (if needed)</h3>
    	<table class="form">
	<tr>
		<td colspan="2"><textarea name="specialRequests" rows="3" cols="80"></textarea>
	</td></tr>
	</table>
    
    <!-- Hidden fields to pass through cookie coupons and financial Aid status -->

    <input type="hidden" name="cookieCoupons" value="<?php echo $cookieCoupons;?>">
    <input type="hidden" name="financialAid" value="<?php echo $financialAid; ?>">
<?php
}


//
// Decide which questions to ask for each type of person
//
function addRegistrationBlock($personType, $number, $volunteerType, $nonScout)
{

	static $personNum = 0;

	if ( $personType == "Camper" ) $priceType = $volunteerType;
	else $priceType = $personType;

?>
	<div class="instructions">
	<h1>
<?php

	if ( $nonScout ) echo "Non-Scout ";
	if ($personType == "Adult") echo "Adult Volunteer"; else echo $personType." number " . $number ;

	if ( !isset($personType) ||  !isset($personType) ) echo "Error!  No registration type supplied.";

	$thisPrice = getPrice($priceType, $nonScout);

	$summaryRow[] = array(
		type => $personType,
		price => $thisPrice[1],
		comments => $thisPrice[0]);
	?>

	</h1>
	<table class="form">
	<tr> <th>First Name</th><td><input type="text" name="camperFirstName[<?php echo $personNum ?>]" id="firstName[<?php echo $personNum ?>]" class="validate[required]"/></td> </tr>
	<tr> <th>Last Name</th><td>
    <input type="text" name="camperLastName[<?php echo $personNum ?>]" id="lastName[<?php echo $personNum ?>]"/>
    <input type="hidden" name="camperType[<?php echo $personNum ?>]" id="personType[<?php echo $personNum ?>]"  value="<?php echo $personType ?>"/>
    <input type="hidden" name="camperPrice[<?php echo $personNum ?>]" id="price[<?php echo $personNum ?>]"  value="<?php echo $thisPrice[1] ?>"/>
    <input type="hidden" name="camperPriceDescription[<?php echo $personNum ?>]" id="priceDescription[<?php echo $personNum ?>]"  value="<?php echo $thisPrice[0]; ?>"/>
    </td> </tr>

	<?php
	// conditional fields for different types of people
	switch ($personType)
	{
	case "Camper":
		addShirtSizeField($personNum);
		addBirthdayField($personNum);
		addGradeField($personNum, "Camper");
		addGirlScoutFields($personNum, $personType, $nonScout );
		addBuddyField($personNum);
		break;
	case "Aide":
		addShirtSizeField($personNum);
		addBirthdayField($personNum);
		addGradeField($personNum, "Aide");
		addGirlScoutFields($personNum, $personType, $nonScout );
		addCampNameField($personNum);
		break;
	case "Tagalong":
		addShirtSizeField($personNum);
		addGenderField($personNum);
		addBirthdayField($personNum);
		addGradeField($personNum, "Tagalong");
		addGirlScoutFields($personNum, $personType, $nonScout );
		break;
	case "Adult":
		?>
        <input type="hidden" name="volunteerType" value="<?php echo $volunteerType;?>"/>
		<?php
		
		switch ($volunteerType)
		{
		case "VolunteerFullTime":
			addShirtSizeField($personNum);
			addCampNameField($personNum);
			addVolunteerJobChoiceFields($personNum, $volunteerType);
			addLiveScanField($personNum);
			break;
		case "Volunteer5Day":
		case "Volunteer3Day":
			addShirtSizeField($personNum);
			addCampNameField($personNum);
			addVolunteerJobChoiceFields($personNum, $volunteerType);
			addVolunteerDateChoiceFields($personNum, $volunteerType);
			addLiveScanField($personNum);
			break;
		case "VolunteerAtHome":
			addCommentField("Thank you for volunteering for an at-home job!  Our volunteer coordinator will contact you to help you select a job.");
			break;
		case "VolunteerNone":
		default:
			addCommentField("Your adult volunteer type is " . $volunteerType . ".");
			break;
		addGirlScoutFields($personNum, $personType, $nonScout );
		}
		break;
	default:
	  echo "Error! Unrecognized registration type " . $personType . ".";
	}
?>
	</table>
	</div>
<?php

	$personNum++;
	return $summaryRow;
	
} // end addRegistrationBlock


function addGirlScoutFields($personNum, $personType, $nonScout)
{
	switch ($personType)
		{
	
		// for campers and aides, we already know their status so just pass that through .
		// ask for troop # if applicable
		case "Camper":	
		case "Aide":
		{
			if ( $nonScout )
			{
				?>
				<input type="hidden" name="registeredGirlScout" value="0"/>
				<input type="hidden" name="troopNum" value="n/a"/>
				<?php	
			}
			else
			{
				?>
				<tr> 
				<th>What is your Troop #?</th>
				<td><input type="text" name="troopNum[<?php echo $personNum ?>]" value="n/a" id="troopNum" class="validate[required]"/>
				<input type="hidden" name="registeredGirlScout" value="1"/>
				</td> 
				</tr>
				<?php		
			}
			break;
		}
		case "Tagalong":
		{
		// field is blank for tags
			?>
			<input type="hidden" name="registeredGirlScout" value=""/>
			<input type="hidden" name="troopNum" value=""/>
			<?php	
			break;
		}
		case "Adult":	// for adults, ask them
		{
			?>
			<tr>
			<th>Are you a registered Girl Scout?</th><td><select name="registeredGirlScout[<?php echo $personNum ?>]" id="registeredGirlScout"><option></option><option>No</option><option>Yes</option></select></td>
			</tr>
			<tr>
			<th>Have you undergone the Girl Scouts' LiveScan fingerprinting process?</th><td><select name="liveScan[<?php echo $personNum ?>]" id="liveScan"><option></option><option>No</option><option>Yes</option></select></td>
			</tr>
			<?php
			break;
		}
	
	
		}

}

function addBuddyField($personNum)
{
?>
	<tr><th>I want to be placed with (choose one person please)</th><td><input type="text" name="otherSpecialRequests[<?php echo $personNum ?>]"/></td> </tr>
<?php
}


function addGradeField($personNum, $personType)
{
	switch ($personType)
	{

		case "Camper":
			$gradeList = array(2,3,4,5,6,7,8,9,10,11,12);
			break;
		case "Aide":
			$gradeList = array(10,11,12,"Just Graduated");
			break;
		case "Tagalong":
			$gradeList = array("Pre-school", "K", 1, 2,3,4,5,6,7,8,9);
			break;
	}
?>
	<tr>
	<th>Grade in Fall</th><td><select name="camperGradeInFall[<?php echo $personNum ?>]" id="gradeInFall" class="validate[required]">
			<?php foreach($gradeList as $item) echo "<option>{$item}</option>"; ?>
		</select></td>
	</tr>
<?php
}

function addCommentField($comment)
{

	echo "<tr> <th colspan=3>". $comment . "</th></tr>";
}

function addShirtSizeField($personNum)
{
?>
	<tr> <th>T-shirt size</th><td><select name="otherTshirtSize[<?php echo $personNum ?>]" id="otherTshirtSize">
			<option value=""></option>
			<?php
			foreach(array("Child XS", "Child S","Child M","Child L","Adult S","Adult M","Adult L","Adult XL","Adult XXL") as $item) echo "<option>{$item}</option>";
			?>
	</select></td></tr>
<?php
}

function addBirthdayField($personNum)
{
?>
	<tr> <th>Birthday (mm/dd/yyyy)</th><td><input type="text" name="camperBirthday[<?php echo $personNum ?>]" id="birthday" class="validate[required,custom[usdate]]"/></td> </tr>
<?php
}

function addGenderField($personNum)
{
?>
	<tr> <th>Gender</th><td><select name="tag_Gender[<?php echo $personNum ?>]"><option>Male</option><option>Female</option></select></td> </tr>
<?php
}

function addCampNameField($personNum)
{
?>

	<tr> <th>Camp name if you have one</th><td><input type="text" name="otherCampName[<?php echo $personNum ?>]"/></td> </tr>

<?php
}


function addLiveScanField($personNum)
{
?>
	<tr>
	<th>Are you a registered Girl Scout?</th><td><select name="registeredGirlScout[<?php echo $personNum ?>]" id="registeredGirlScout"><option></option><option>No</option><option>Yes</option></select></td>
	</tr>
	<tr>
	<th>Have you undergone the Girl Scouts' LiveScan fingerprinting process?</th><td><select name="liveScan[<?php echo $personNum ?>]" id="liveScan"><option></option><option>No</option><option>Yes</option></select></td>
	</tr>
<?php
}

function addVolunteerDateChoiceFields($personNum, $volunteerType)
{
	global $PDC_VolunteerDates;
	if (!isset($volunteerType)) return;
	if ( $volunteerType == "Volunteer5Day" || $volunteerType == "Volunteer3Day" )
	{
?>
	<tr>
		<th>Which dates do you prefer working?<br/><span style="font-weight:normal;font-style:italic;font-size:11px;">Press ctrl (cmd on mac) and click to select multiple days</span></th><td>
			<select name="volunteerDates[]" multiple="multiple" size="5">
				<?php foreach($PDC_VolunteerDates as $item) echo "<option>{$item}</option>"; ?>
			</select>
		</td></tr>
	</tr>
    
    	<tr>
<?php
	}
}


function addVolunteerJobChoiceFields($personNum, $volunteerType)
{
	if (!isset($volunteerType)) return;

?>
	<tr> <th>Thank you for volunteering as a <?php echo $volunteerType ?>!</th> </tr>
	<tr>
		<th>Where do you want to work?</th><td><select name="volunteerWhereDoYouWantToWork[<?php echo $personNum ?>]">
			<option>Unit Leader (must be full time)</option><option>Program crafts</option><option>Program skills</option><option>Program nature</option><option>Program service project</option><option>Program shelter</option><option>Program treasure hunt</option><option>Where needed</option><option>At Home</option></select></td>
	</tr>
<?php
}

function displayFamilyPriceHeader(
	$numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupon)
{
global $PDC_Prices, $PDC_Today, $PDC_RegistrationStartDate, $PDC_RegistrationDeadline;

?>
	<ol>
	<h3>Summary of who you'll be entering on this page:</h3>
<?php
	// Page header summarizing everybody

	// campers
	if ( $numCampers > 0 ) echo ("<li>".$numCampers." Campers (Registered Girl Scouts)</li>");
	if ( $numCampers_NonScouts > 0 ) echo ("<li>".$numCampers_NonScouts." Campers (Not Registered Girl Scouts)</li>");

	if ( PDC_AcceptingAideRegistrations() )
	{
	if ( $numAides > 0 ) echo ("<li>".$numAides." Aides (Registered Girl Scouts)</li>");
	if ( $numAides_NonScouts > 0 ) echo ("<li>".$numAides_NonScouts." Aides (Not Registered Girl Scouts)</li>");
	}
	else
	{
		if ( $numAides > 0 || $numAides_NonScouts > 0 ) 
			?><li>The registration deadline has passed.  We are no longer accepting aide registrations. </li><?php
	}

	switch ($volunteerType) {
		case "VolunteerFullTime":
		case "Volunteer5Day":
		case "Volunteer3Day":
			echo "<li>An adult volunteer with a discount type of $volunteerType</li>";
			if ( $numTags > 0 )
				echo "<li>$numTags younger children or boys</li>";
			break;
		case "VolunteerAtHome":
			echo "<li>You are registering as an at-home volunteer and will receive a discount on your first camper. </li>";
			break;
		case "VolunteerNone":
		default:
			break;
	}

	if ( isset($cookieCoupon) && $cookieCoupon > 0 ) echo "<li>You are using $".$cookieCoupon." in cookie coupons. </li>";

	if ( $_REQUEST["paymentFinancialAid"] == "Yes" )
	{
	?>
		<li>You are requesting financial aid.    
		A financial aid form will be sent to you; please complete and return as soon as possible. 
		A payment of $125 per camper is due with your registration. </li>
	
	<?php
	}
	?>
	</ol>
<?php
}

function drawPriceSummary($regSummary, $cookieCoupon)
{
?>

	
	<h1>Registration Summary</h1>
	<table class="priceSummary">
	<tr><th></th><th>Registration Type</th><th>Comments</th><th>Price</th></tr>
<?php

	// this is an array of arrays-- one array per block
	$recordCount = 1;
	$priceTotal = 0;
	for ($j = 0; $j < count($regSummary); $j++)
	{
		$regBlockSummary = $regSummary[$j];
		for ($k = 0; $k < count($regBlockSummary[$k]); $k++)
		{
	?>
		<tr>
			<th><?php echo $recordCount++; ?> </th>
			<td><?php echo $regBlockSummary[$k]["type"];  ?> </td>
			<td><?php echo $regBlockSummary[$k]["comments"]; ?> </td>
			<td style="text-align:right;">$<?php echo $regBlockSummary[$k]["price"]; ?> </td>
		</tr>
	<?php
			$priceTotal += $regBlockSummary[$k]["price"];
		}
	}

if ( isset($cookieCoupon) && ($cookieCoupon > 0 ) )
{
?>
	<tr><th></th><th>Subtotal </th><th></th><th style="text-align:right;">$<?php echo $priceTotal;?></th></tr>
	<tr><th></th><th>Minus Cookie Coupons </th><th></th><th style="text-align:right;">$<?php echo $cookieCoupon;?></th></tr>
<?php
	$priceTotal -= $cookieCoupon;
}
?>
	<tr><th></th><th>Total </th><th></th><th style="text-align:right;">$<?php echo $priceTotal;?></th></tr>
	</table>

<?php
}
?>
