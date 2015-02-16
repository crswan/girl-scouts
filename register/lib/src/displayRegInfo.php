<?php

// fields we're passing straight through from the post data
function dump_field($record, $label, $name)
{
	if ( isset ($record[$name] ) )
	{
		?>
        <tr>
        <th><?php echo $label; ?></th>
        <td>
			<?php echo $record[$name ]; ?><input type="hidden" name="<?php echo $name; ?>" value="<?php echo $record[$name ] ?>">
		</td></tr>
        <?php
	}
}

// Values we've done some post-processing on, and are not getting straight from the POST data. 
function dump_nameValuePair($name, $value)
{
		?>
        <tr>
        <th><?php echo $name; ?></th>
        <td>
			<?php echo $value; ?>
		</td></tr>
        <?php
}

// arrays-- one record per person
function dump_array_index($record, $label, $name, $index)
{
	if ( isset ($record[$name] ) )
	{
		if ( isset ($index) && $index >= 0  &&  (isset( $record[$name][$index] ) ) )
			{
				?>
                <tr>
                <th><?php echo $label; ?> </th>
                <td><?php echo $record[$name][$index]; ?><input type="hidden" name="<?php echo ($name. "[" . $index . "]"); ?>" value="<?php echo  $record[$name ][$index] ?>">
				</td></tr>
                <?php	
			}
			else
			{
            PDC_EchoDebug("<tr><td>" . $label . "</td>");
			PDC_EchoDebug("<td> nothing at index " . $index . '<input type="hidden" name="' . $name. "[" . $index . "]" . ' value="">');
            PDC_EchoDebug("</td></tr>");
			}
	}
}


function displayRegInfo($regInfo)
{
?>

<br /><h1>Your registration is not yet complete!</h1>
<p>&nbsp;</p>
<p>Please review the information below and then click "Confirm and Continue to the Next Step" button at the bottom of this page.  </p>

<br /><h1>Family Information</h1>

<table border="1" class="form">

<?php
dump_field($regInfo, "Home Address", "contactAddress" );
dump_field($regInfo, "City, State", "contactCityState" );
dump_field($regInfo, "Zip Code", "contactZip" );
dump_field($regInfo, "Parent Email", "contactEmail" );
dump_field($regInfo, "Bus Stop Requested", "transportBusStopRequest" );
dump_field($regInfo, "Guardian1/Mother First Name", "motherFirstName" );
dump_field($regInfo, "Guardian1/Mother Last Name", "motherLastName" );
dump_field($regInfo, "Guardian1/Mother Home Phone", "contactHomePhone" );
dump_field($regInfo, "Guardian1/Mother Work Phone", "motherWorkPhone" );
dump_field($regInfo, "Guardian1/Mother Cell Phone", "motherCellPhone" );
dump_field($regInfo, "Guardian2/Father First Phone", "fatherFirstName" );
dump_field($regInfo, "Guardian2/Father Last Name", "fatherLastName" ) ;
dump_field($regInfo, "Guardian2/Father Home Phone", "fatherHomePhone" );
dump_field($regInfo, "Guardian2/Father Work Phone", "fatherWorkPhone" );
dump_field($regInfo, "Guardian2/Father Cell Phone", "fatherCellPhone" );
dump_field($regInfo, "Emergency Contact Name", "emergencyName" ) ;
dump_field($regInfo, "Emergency Contact Phone Numbers", "emergencyPhone" );
dump_field($regInfo, "Emergency Contact Relationship", "emergencyRelationship" ) ;
dump_field($regInfo, "Notes to Registrar", "notesToRegistrar" ) ;
?>
</table>

<br /><h1>Who You're Registering</h1>

<?php
//
// arrays-- one per person
for ( $j = 0; $j < count($regInfo["camperFirstName"]); $j++)
{
$camperType = $regInfo["camperType"][$j];
echo "<h3>" . $camperType . "</h3>";
echo '<table border="1" class="form">';

dump_array_index($regInfo, "First Name", "camperFirstName", $j);
dump_array_index($regInfo, "Last Name", "camperLastName", $j);
dump_array_index($regInfo, "T-Shirt Size", "otherTshirtSize", $j);
dump_array_index($regInfo, "Date of Birth", "camperBirthday", $j);
dump_array_index($regInfo, "Grade in Fall", "camperGradeInFall", $j);
dump_array_index($regInfo, "Girl Scout Troop #", "troopNum", $j);
dump_array_index($regInfo, "Buddy Request", "buddyRequest", $j);

dump_array_index($regInfo, "Camp Name", "otherCampName", $j);
dump_array_index($regInfo, "Volunteer Job Preference", "volunteerWhereDoYouWantToWork", $j);

$volunteerDates = isset($regInfo["volunteerDates"] ) ? implode(", ", $regInfo["volunteerDates"]) : ""; 
if ($camperType == "Adult") dump_nameValuePair("Preferred dates to work at camp", $volunteerDates);
dump_array_index($regInfo, "Fingerprinted?", "liveScan", $j);
dump_array_index($regInfo, "Price","camperPrice", $j);
dump_array_index($regInfo, "Price Comments", "camperPriceDescription", $j);
echo "</table>";

}

?>

<?php
}
?>

