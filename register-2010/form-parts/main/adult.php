<script type="text/javascript">
$(function(){
	$("#tags .template :input").attr("disabled","disabled");
	$("#addTag").click(function(e){
		e.preventDefault();
		$("#tags .template").clone().appendTo("#tags").removeClass('template').find(":input").removeAttr("disabled").each(function(){
			$(this).attr("id","input_"+Math.round(Math.random()*1000000));
		}).end().find(".firstName").addClass('validate[required]').end().find(".lastName").addClass('validate[required]').end().find(".dateOfBirth").addClass('validate[required,custom[usdate]]');		
	});
	$("a.removeTag").live('click',function(e){
		e.preventDefault();
		$(this).parent().remove();
	});
});
</script>

<input type="hidden" name="type" value="<?php echo $_REQUEST['type'];?>"/>

<h3>Adult Volunteer Details</h3>
<table class="form">
	<tr>
		<th>First Name</th><td><input type="text" name="camperFirstName" id="firstName" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Last Name</th><td><input type="text" name="camperLastName" id="lastName" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Names of children at camp</th><td><input type="text" name="camperChildrenAtCamp" id="camperChildrenAtCamp"/></td>
	</tr>
</table>

<h3>Contact Details</h3>
<table class="form">
	<tr>
		<th>Address</th><td><input type="text" name="contactAddress" id="address" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>City, State</th><td><input type="text" name="contactCityState" id="citystate" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>Zip</th><td><input type="text" name="contactZip" id="zip" class="validate[required,custom[uszip]]"/></td>
	</tr>
	<tr>
		<th>Email</th><td><input type="text" name="contactEmail" id="email" class="validate[required,custom[email]]"/></td>
	</tr>
	<tr>
		<th>Home Phone</th><td><input type="text" name="contactHomePhone" id="homePhone" class="validate[required,custom[usphone]]"/></td>
	</tr>
	<tr>
		<th>Cell Phone</th><td><input type="text" name="contactCellPhone" id="cellPhone" class="validate[optional,custom[usphone]]"/></td>
	</tr>
</table>

<h3>Emergency Contact</h3>
<table class="form">
	<tr>
		<th>Contact Name</th><td><input type="text" name="emergencyName" class="validate[required]" id="emergencyName"/></td>
	</tr>
	<tr>
		<th>Phone #</th><td><input type="text" name="emergencyPhone" class="validate[required,custom[usphone]]" id="emergencyPhone"/></td>
	</tr>
</table>

<h3>Volunteer Details</h3>
<table class="form">
	<tr>
		<th>Will you be working at camp?</th><td><select name="volunteerAtCamp"><option>Yes</option><option>No-- want an at-home job</option></select></td>
	</tr>
	<tr>
		<th>How many days will you be working at camp?</th><td><select name="volunteerDaysAtCamp">
			<option value=""></option>
			<option>Full Time</option><option>5 days+</option><option>3 days+</option></select></td>
	</tr>
	<tr>
		<th>Where do you want to work?</th><td><select name="volunteerWhereDoYouWantToWork">
			<option>Unit Leader (must be full time)</option><option>Program crafts</option><option>Program skills</option><option>Program nature</option><option>Program service project</option><option>Program shelter</option><option>Where needed</option><option>At Home</option></select></td>
	</tr>
	<tr>
		<th>Which dates do you prefer working?<br/><span style="font-weight:normal;font-style:italic;font-size:11px;">Press ctrl (cmd on mac) and click to select multiple days</span></th><td>
			<select name="volunteerDates[]" multiple="multiple" size="5">
				<option>Full Time</option>
				<option value="">-</option>
				<option>7/12</option>
				<option>7/13</option>
				<option>7/14</option>
				<option>7/15</option>
				<option>7/19</option>
				<option>7/20</option>
				<option>7/21</option>
				<option>N/A-- At Home Job</option>
			</select>
		</td></tr>
	</tr>
</table>

<h3>Other</h3>
<table class="form">
	<tr>
		<th>Camp name if you have one</th><td><input type="text" name="otherCampName" value=""/></td>
	</tr>
	<tr>
		<th>Are you currently a registered Girl Scout?</th><td><select name="otherRegisteredGirlScout" id="otherRegisteredGirlScout" class="validate[required]"><option></option><option>No</option><option>Yes</option></select></td>
	</tr>
	<tr>
		<th>What is your Troop #</th><td><input type="text" name="otherRegisteredGirlScoutTroop" value="n/a" id="otherRegisteredGirlScoutTroop" class="validate[required]"/></td>
	</tr>
	<tr>
		<th>T-shirt size</th><td><select name="otherTshirtSize" id="otherTshirtSize">
			<option value=""></option>
			<?php foreach(array("Child S","Child M","Child L","Adult S","Adult M","Adult L","Adult XL","Adult XXL") as $item) echo "<option>{$item}</option>"; ?>
		</select>
		</td>
	</tr>
</table>

<h3>Will a younger child / boy be attending?</h3>
<div class="instructions">
	<p>If a young child or boy (Tag along) will be attending on the days you volunteer, please <a href="#" id="addTag">click here to add their details</a> [<b>CLICK ONCE FOR EACH TAG YOU WANT TO ADD</b>]. Each tag along child will cost $70.00.</p>
</div>
<div id="tags">
	<div class="template" style="border-top:1px solid #CCC;padding-top:10px;padding-bottom:10px;">
		<a href="#" class="removeTag">Remove [x]</a>
		<p style="font-weight:bold;color:#666;">Please fill out the form regarding the additional child below.</p>
		<table class="form">
			<tr>
				<th>First Name</th><td><input type="text" name="tag_FirstName[]" class="firstName"/></td>
			</tr>
			<tr>
				<th>Last Name</th><td><input type="text" name="tag_LastName[]" class="lastName"/></td>
			</tr>
			<tr>
				<th>Gender</th><td><select name="tag_Gender[]"><option>Male</option><option>Female</option></select></td>
			</tr>
			<tr>
				<th>Grade In Fall</th><td><select name="tag_GradeInFall[]" class="gradeInFall"><?php foreach( array("Pre-school","K",1,2,3,4,5,6,7,8,9) as $option ) echo "<option>{$option}</option>"; ?></select></td>
			</tr>
			<tr>
				<th>Date of Birth</th><td><input type="text" name="tag_DateOfBirth[]" class="dateOfBirth"/></td>
			</tr>
		</table>
	</div>
</div>
