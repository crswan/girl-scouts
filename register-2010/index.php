<?php require("lib/page/header.php"); ?>

<!-- When turning registration back on next year, turn off this div and turn on the other one -->
<div class="instructions">
	<h1>Registration for Day Camp 2011 has not yet opened. </h1>
	<blockquote>
	    <p>Come back to this page in late February or early March. <br />
		Meanwhile, visit
		<a href="http://www.peninsuladaycamp.org">visit to the Peninsula Day Camp home page</a> to learn more about our camp.</p>
</div>
<div style="display:none;border:1">


<form action="main.php" method="get">
	<div class="instructions">
		<p>Welcome to the Peninsula Girl Scout Day Camp Online Registration system.</p>
		<p>Please select an application type and press &quot;Begin Registration&quot; to get started.</p>
		<p>If you have multiple Campers/Aides/Adults to register, you should complete the registration form several times [Please note that any tag along children (tags) are registered inside the adult application]. Once you complete your registration you will be given the opporunity to register the next Camper/Aide/Adult.</p>
		<p>Notes:</strong></p>
		<li>The deadline to apply for financial aid has passed.</li>
		<li>Campers registering after April 3 will incur a $50 late-registration fee and will be placed on a wait list while we recruit additional adult volunteers.</li>
		</strong>
	</div>
	<h3>Registration Type</h3>
	<table class="form" >
		<tr><th>Registration Type</th><td>
			<select name="type">
				<option value="">Select One</option>
				<option value="">-</option>
				<option>Camper</option>
				<option>Aide</option>
				<option>Adult</option>
			</select>
		</td></tr>
	</table>
	<div style="margin-top:20px;border-top:1px solid #CCC;text-align:center;padding-top:20px;">
		<input type="submit" value="Begin Registration" style="font-size:12px"/>
	</div>
</form>


</div> <!-- main body form -->
<?php require("lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
