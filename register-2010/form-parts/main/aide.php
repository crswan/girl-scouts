<h3>Primary Details</h3>
<table class="form">
	<tr>
		<th>First Name</th><td><input type="text" name="camperFirstName" id="firstName" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Last Name</th><td><input type="text" name="camperLastName" id="lastName" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Birthday (mm/dd/yyyy)</th><td><input type="text" name="camperBirthday" id="birthday" class="validate[required,custom[usdate]]"/></td>
	</tr>
	<tr>
		<th>Grade in Fall</th><td><select name="camperGradeInFall" id="gradeInFall" class="validate[required]">
			<?php foreach(array(10,11,12,"Just Graduated") as $item) echo "<option>{$item}</option>"; ?>
		</select></td>
	</tr>
</table>

<h3>Contact Details</h3>
<table class="form">
	<tr>
		<th>Address</th><td><input type="text" name="contactAddress" id="address" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>City,State</th><td><input type="text" name="contactCityState" id="citystate" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Zip</th><td><input type="text" name="contactZip" id="zip" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Home Phone (555-555-5555)</th><td><input type="text" name="contactHomePhone" id="homePhone" class="validate[required,custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Email</th><td><input type="text" name="contactEmail" id="contactEmail" class="validate[required,custom[email]]"/></td>
	</tr>
</table>

<h3>Guardian 1/Mother's Details</h3>
<table class="form">
	<tr>
		<th>Mom's First Name</th><td><input type="text" name="motherFirstName" id="mothersFirstName"/></td>
	</tr>
	<tr>
		<th>Mom's Last Name</th><td><input type="text" name="motherLastName" id="mothersLastName"/></td>
	</tr>
	<tr>
		<th>Mom's Work #</th><td><input type="text" name="motherWorkPhone" id="mothersWorkPhone"/></td>
	</tr>
	<tr>
		<th>Cell # (555-555-5555)</th><td><input type="text" name="motherCellPhone" id="mothersCellPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
</table>

<h3>Guardian 2/Father's Details</h3>
<table class="form">
	<tr>
		<th>Dad's First Name</th><td><input type="text" name="fatherFirstName"/></td>
	</tr>
	<tr>
		<th>Dad's Last Name</th><td><input type="text" name="fatherLastName"/></td>
	</tr>
	<tr>
		<th>Dad's Work #</th><td><input type="text" name="fatherWorkPhone"/></td>
	</tr>
	<tr>
		<th>Cell # (555-555-5555)</th><td><input type="text" name="fatherCellPhone" id="fatherCellPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
</table>

<h3>Emergency Contact</h3>
<table class="form">
	<tr>
		<th>Contact Name</th><td><input type="text" name="emergencyName" id="emergencyName" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Phone #</th><td><input type="text" name="emergencyPhone" id="emergencyPhone" class="validate[custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Relationship to Aide</th><td><input type="text" name="emergencyRelationship" id="emergencyRelationship"/></td>
	</tr>
</table>

<h3>Transport</h3>
<table class="form">
	<tr>
		<th>Bus stop choice</th><td><select name="transportBusStopRequest" id="transportBusStopRequest" class="validate[required]"><option></option><option>Drive</option><option value="">-</option>
		<?php foreach(array("Mills High School","Hillsdale High School","Foster City Rec Center","Woodside Elementary School","McKinley School (RWC)","Menlo Park Library","Woodside Methodist Church") as $item) echo "<option>{$item}</option>"; ?>
		</select></td>
	</tr>
</table>

<h3>Other</h3>
<table class="form">
	<tr>
		<th>If you are associated with an adult volunteer, please enter their name</th><td><input type="text" name="otherAssocAdultVolunteer"/></td>
	</tr>
	<tr>
		<th>Camp name if you have one</th><td><input type="text" name="otherCampName"/></td>
	</tr>
	<tr>
		<th>Are you currently a registered Girl Scout?</th><td><select name="otherRegisteredGirlScout" id="otherRegisteredGirlScout" class="validate[required]"><option></option><option>No</option><option>Yes</option></select></td>
	</tr>
	<tr>
		<th>What is your Troop #</th><td><input type="text" name="otherRegisteredGirlScoutTroop" value="n/a" id="otherRegisteredGirlScoutTroop" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>T-shirt size</th><td><select name="otherTshirtSize">
			<option value=""></option>
			<?php foreach(array("Child S","Child M","Child L","Adult S","Adult M","Adult L","Adult XL","Adult XXL") as $item) echo "<option>{$item}</option>"; ?>
		</select>
		</td>
	</tr>
</table>