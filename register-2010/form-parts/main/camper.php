<script type="text/javascript">

$(function(){

	var couponValue = 0;

	$("#cookieCoupon").change(function(){

		if( $(this).val() == "Yes" ) {

			if( $("#paymentCoupon").val() == 0 ) $("#paymentCoupon").val(couponValue);

		} else {

			couponValue = $("#paymentCoupon").val();

			$("#paymentCoupon").val(0);

		}

	}).change();

	$("#financialAid").change(function(){

		if( $(this).val() == "Yes" ) $("tr.financialAid").show();

		else $("tr.financialAid").hide();

	}).change();

	$("#otherAdultVolunteer").change(function(){

		if( $("#otherAdultVolunteer").val() == "No" ) $("#adultVolunteer").val(" ");

		else $("#adultVolunteer").val("");

	}).change();

});

</script>

<h3>Camper Details</h3>

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

			<?php foreach(array(2,3,4,5,6,7,8,9,10,11,12) as $item) echo "<option>{$item}</option>"; ?>

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

		<th>Zip</th><td><input type="text" name="contactZip" id="zip" class="validate[required,custom[uszip]]"/></td>

	</tr>

	<tr>

		<th>Home Phone (555-555-5555)</th><td><input type="text" name="contactHomePhone" id="homePhone" class="validate[required,custom[usphone]]"/></td>

	</tr>

	<tr>

		<th>Parent/Guardian Email</th><td><input type="text" name="contactEmail" id="contactEmail" class="validate[required,custom[email]]"/></td>

	</tr>

</table>



<h3>Guardian 1/Mother's Details</h3>

<table class="form">

	<tr>

		<th>First Name</th><td><input type="text" name="motherFirstName" id="mothersFirstName"/></td>

	</tr>

	<tr>

		<th>Last Name</th><td><input type="text" name="motherLastName" id="mothersLastName"/></td>

	</tr>

	<tr>

		<th>Work #</th><td><input type="text" name="motherWorkPhone" id="mothersWorkPhone"/></td>

	</tr>

	<tr>

		<th>Cell # (555-555-5555)</th><td><input type="text" name="motherCellPhone" id="mothersCellPhone" class="validate[optional,custom[usphone]]"/></td>

	</tr>

</table>



<h3>Guardian 2/Father's Details</h3>

<table class="form">

	<tr>

		<th>First Name</th><td><input type="text" name="fatherFirstName" id="fatherFirstName"/></td>

	</tr>

	<tr>

		<th>Last Name</th><td><input type="text" name="fatherLastName" id="fatherLastName"/></td>

	</tr>

	<tr>

		<th>Work #</th><td><input type="text" name="fatherWorkPhone"/></td>

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

		<th>Relationship to Camper</th><td><input type="text" name="emergencyRelationship" id="emergencyRelationship"/></td>

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

		<th>I want to be placed with (choose one person please)</th><td><input type="text" name="otherSpecialRequests"/></td>

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



<h3>Payment Info</h3>

<table class="form">

	<tr>

		<th colspan="2">Volunteer Discount - Are you registering with an adult volunteer? (below)</th>

	</tr>

	<tr>

		<td colspan="2"><select name="otherAdultVolunteer" id="otherAdultVolunteer" style="width:545px;" id="otherAdultVolunteer" class="validate[required]">

			<option value="No">No Volunteer ($395)</option>

			<option value="">-</option>

			<option value="HomeSub">At-Home Volunteer - Subsequent Camper ($395, priority admission to camp)</option>

			<option value="Home">At-Home Volunteer - First Camper ($340, priority admission to camp)</option>

			<option value="3">Part Time At-Camp Volunteer - 3-4 days ($275 per camper, guaranteed admission to camp)</option>

			<option value="5">Part Time At-Camp Volunteer - 5+ days ($195 per camper, guaranteed admission to camp)</option>

			<option value="FullTimeSub">Full Time At-Camp Volunteer - Subsequent Camper ($70, guaranteed admission to camp)</option>

			<option value="FullTime">Full Time At-Camp Volunteer - First Camper (FREE, guaranteed admission to camp)</option>

		</select>

		<!--<div class="error" id="atHomeWarning">Please note, you will receive a discount of $55.00 for the first camper ONLY that is registered with an at home adult volunteer. Any subsequent campers with the same adult volunteer should choose "No" from the above menu.</div>

		<div class="error" id="fullTimeWarning">Please note, the registration of the first camper ONLY is free for those campers attending with a full time adult volunteer. Any subsequent campers with the same adult volunteer should choose "Full Time (Subsequent Camper)" from the above menu. While subsequent registrations are not free, they are charged at $70.00 per camper.</div>-->

		</td>

	</tr>

	<tr>

		<th>If you are registering with an adult volunteer, please enter their name.  <br /><i>Important: You must complete an adult registration for this volunteer.</i></th><td><input type="text" name="otherAssocAdultVolunteer" id="adultVolunteer" class="validate[required]"/></td>

	</tr>

	<tr>

		<th>Do you want to use cookie coupons?</th><td><select id="cookieCoupon"><option>No</option><option>Yes</option></select></td>

	</tr>

	<tr>

		<th>$ Amount of Coupons (enter 0 if not applicable)</th><td><input type="text" name="paymentCoupoun" id="paymentCoupon" class="validate[required]"/></td>

	</tr>

	<tr>

		<th>Do you want to apply for Financial Aid? (Note: the deadline has passed.  No more financial applications are being considered.</th><td><select name="paymentFinancialAid" id="financialAid"><option>No</option><option>Yes</option></select></td>

	</tr>

	<tr class="financialAid">

		<td colspan="2">A financial aid form will be sent to you, please complete and return as soon as possible.  A $125.00 co-pay is due when you register.</td>

	</tr>

</table>

