{include file='_header.tpl' title='Health Forms'}
<p class="pageName">Camper Health Form for {$full_name}</p>

{if $previously_completed}
<p><span style="color:red;">Warning!</span> This form was previously completed on {$previously_completed}. You can re-submit the form which will overwrite your previous submission.</p>
{/if}

<form method="post" action="{$php_self}" name="login" class="validateme">

<table border="0" cellspacing="0" cellpadding="4" class="form">
  <tr>
    <td colspan="2"><h3>Registration Information</h3></td>
  </tr>
  <tr>
    <th>Guardian #1</th>
    <td>{$camper->getField("Mom First Name")} {$camper->getField("Mom Last Name")}</td>
  </tr>
  <tr>
    <th>Daytime Phone</th>
    <td>{$camper->getField("Home Phone")}</td>
  </tr>
  <tr>
    <th>Alternate/Cell Phone</th>
    <td>{$camper->getField("Cell Phone")}</td>
  </tr>
  <tr>
    <th>Guardian #2</th>
    <td>{$camper->getField("Dad First Name")} {$camper->getField("Dad Last Name")}</td>
  </tr>
	<tr>
    <th>Guardian #2 Daytime Phone</th>
    <td><input type="text" name="guardian2_daytime_phone" id="guardian2_daytime_phone" value="{$guardian2_daytime_phone}" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Guardian #2 Alternate Phone</th>
    <td><input type="text" name="guardian2_alternate_phone" id="guardian2_alternate_phone" value="{$guardian2_alternate_phone}" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{$camper->getField("Address")}{if $camper->getField("City_State")},
		{$camper->getField("City_State")} {$camper->getField("Zip")}
		{/if}
		</td>
  </tr>
  <tr>
    <th>Birthday</th>
    <td>{$camper->getField("Camper Birthday")}</td>
  </tr>
  <tr>
    <th>Troop #</th>
    <td>{$camper->getField("Troop #")}</td>
  </tr>
  <tr>
    <th>Grade in the Fall</th>
    <td>{$camper->getField("grade in fall")}</td>
  </tr>

  <tr>
    <th>Gender</th>
    <td>
		Female<input type="radio" value="Female" name="gender" id="gender" checked="checked"/>
		Male<input type="radio" value="Male" name="gender" id="gender"/>
		</td>
  </tr>
  <tr>
    <th>Age At Camp</th>
    <td><input type="text" name="age_at_camp" id="age_at_camp" value="{$age_at_camp}" class="validate[required,custom[integer]]" maxlength="2"/></td>
  </tr>
<!--  <tr>
    <th>Guardian #1 Daytime Phone</th>
    <td><input type="text" name="guardian1_daytime_phone" id="guardian1_daytime_phone" value="{$guardian1_daytime_phone}" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Guardian #1 Alternate Phone</th>
    <td><input type="text" name="guardian1_alternate_phone" id="guardian1_alternate_phone" value="{$guardian1_alternate_phone}" class="validate[required,custom[phone]]"/></td>
  </tr>
-->
	<tr>
    <th>Emergency Contact</th>
    <td>{$camper->getField('people.FAMILY::emergencyName')}</td>
  </tr>
	<tr>
    <th>Emergency Contact Phone</th>
    <td>{$camper->getField('people.FAMILY::emergencyPhone')}</td>
  </tr>
	<tr>
    <th>Emergency Contact Relationship</th>
    <td>{$camper->getField('people.FAMILY::emergencyRelationship')}</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Health Insurance Information ({$full_name})</h3></td>
  </tr>
  <tr>
    <th>Name of Physician</th>
    <td><input type="text" name="physician_name" id="physician_name" value="{$physician_name}" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Telephone</th>
    <td><input type="text" name="physician_telephone" id="physician_telephone" value="{$physician_telephone}" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Address of Family Physician</th>
    <td><input type="text" name="physician_address" id="physician_address" value="{$physician_address}" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Family Medical/Hospital<br/>Insurance Carrier</th>
    <td><input type="text" name="insurance_carrier" id="insurance_carrier" value="{$insurance_carrier}" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Policy/Group Number</th>
    <td><input type="text" name="policy_number" id="policy_number" value="{$policy_number}" class="validate[required]"/></td>
  </tr>
  <tr>
    <td colspan="2">
			Do you have memebership with a Health Maintenance Organization (HMO) such as Kaiser, Lifeguard, etc.?<br/>
			Yes<input type="radio" value="Yes" name="has_hmo_membership" id="has_hmo_membership"/>&nbsp;&nbsp;&nbsp;No<input type="radio" value="No" name="has_hmo_membership" id="has_hmo_membership" checked="checked"/>
		</td>
  </tr>
  <tr>
    <th>If yes, what ID number does<br/>your child use</th>
    <td><input type="text" name="child_ins_id_num" id="child_ins_id_num" value="{$child_ins_id_num}"/></td>
  </tr>
  <tr>
    <th>HMO main phone number<br/>for emergencies</th>
    <td><input type="text" name="hmo_main_phone" id="hmo_main_phone" value="{$hmo_main_phone}"/></td>
  </tr>

  <tr>
    <td colspan="2"><h3>Please check all of the illnesses/injuries/conditions that the occurred in the past 6 months:</h3><br/>
	  {include file='_ailments.tpl'}
	</td>
  </tr>
	<tr>
    <th>Please provide explainations for any checked boxes</th>
    <td><input type="text" name="ailments_explained" id="ailments_explained" value="{$ailments_explained}"/></td>
  </tr>

  <tr>
    <td colspan="2"><h3>Allergies - Please list all known allergies and describe reaction</h3>
	</td>
  </tr>
  <tr>
    <th>Allergies to medication</th>
    <td><input type="text" name="allergy_medicine" id="allergy_medicine" value="{$allergy_medicine}"/>
	</td>
  </tr>
  <tr>
    <th>Reaction to the above</th>
    <td><input type="text" name="allergy_medicine_reaction" id="allergy_medicine_reaction" value="{$allergy_medicine_reaction}"/></td>
  </tr>
  <tr>
    <th>Allergies to food</th>
    <td><input type="text" name="allergy_food" id="allergy_food" value="{$allergy_food}"/></td>
  </tr>
  <tr>
    <th>Reaction to the above</th>
    <td><input type="text" name="allergy_food_reaction" id="allergy_food_reaction" value="{$allergy_food_reaction}"/></td>
  </tr>
  <tr>
    <th>Other Allergies</th>
    <td><input type="text" name="allergy_other" id="allergy_other" value="{$allergy_other}"/></td>
  </tr>
  <tr>
    <th>Reaction to the above</th>
    <td><input type="text" name="allergy_other_reaction" id="allergy_other_reaction" value="{$allergy_other_reaction}"/></td>
  </tr>

  <tr>
    <td colspan="2"><p><span style="font-weight:bold;">Please list any restriction to food or activity for your child</span><br/>
	  <input class="long" type="text" name="food_activity_restrictions" id="food_activity_restrictions" value="{$food_activity_restrictions}" size="160"/></p>
	</td>
  </tr>
  <tr>
    <td colspan="2"><span style="font-weight:bold;">Please share any other information you feel the camp staff should have about your child's physical, emotional, or mental health</span><br/>
	  <input class="long" type="text" name="additional_health_info" id="additional_health_info" value="{$additional_health_info}" size="160"/>
	</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Medications</h3>Medications to be taken during camp need to be brought to camp in their original container accompanied by signed instructions from parent/guardian including dosage and time taken. <span style="font-weight:bold;">Please list medications being taken on a regular basis and the reason.</span>
	</td>
  </tr>

  <tr>
    <th>Prescription Meds#1</th>
    <td><input type="text" name="medication_prescription1" id="medication_prescription1" value="{$medication_prescription1}"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_prescription_reason1" id="medication_prescription_reason1" value="{$medication_prescription_reason1}"/></td>
  </tr>
  <tr>
    <th>Prescription Meds#2</th>
    <td><input type="text" name="medication_prescription2" id="medication_prescription2" value="{$medication_prescription2}"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_prescription_reason2" id="medication_prescription_reason2" value="{$medication_prescription_reason2}"/></td>
  </tr>
  <tr>
    <th>Over-the-counter Meds#1</th>
    <td><input type="text" name="medication_over_counter1" id="medication_over_counter1" value="{$medication_over_counter1}"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_over_counter_reason1" id="medication_over_counter_reason1" value="{$medication_over_counter_reason1}"/></td>
  </tr>
  <tr>
    <th>Over-the-counter Meds#2</th>
    <td><input type="text" name="medication_over_counter2" id="medication_over_counter2" value="{$medication_over_counter2}"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_over_counter_reason2" id="medication_over_counter_reason2" value="{$medication_over_counter_reason2}"/></td>
  </tr>

  <tr>
    <td colspan="2">
	  ***The day camp staff is not permitted to administer any medication without the above information. 
	  However, sometimes being in a different place without family and familiar surroundings can lead to 
	  physical stresses such as headaches or stomachaches. We will have non-Aspirin type pain reliever for 
	  headaches or other minor pain, topical Benadryl/Caladryl for minor itches and rashes caused by plants 
	or insect bites, topical germ killers (like Iodine or Purell) to clean minor cuts and scrapes, and 
	medication for stomach upsets available to give to your child for these simple problems, along with a 
	good dose of TLC (Tender Loving Care)!
	<p><span style="font-weight:bold;">Do we have your permission to give these medications?</span>
		Yes<input class="validate[required] radio" type="radio" value="Yes" name="tlc_medication" id="tlc_medication"/>&nbsp;&nbsp;&nbsp;
		No<input class="validate[required] radio" type="radio" value="No" name="tlc_medication" id="tlc_medication"/>
	</p>
	</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Immunizations</h3>
	</td>
  </tr>
  <tr>
    <td colspan="2">Please give the most recent dates for the following immunizations.
	</td>
  </tr>
  <tr>
    <td colspan="2"><input type="checkbox" name="immunize_opt_out" value="1"/> I have chosen NOT to immunize my child
	</td>
  </tr>
  <tr>
    <td colspan="2">
	<table>
		<tr style="font-weight:bold;">
			<td>Vaccine</td><td>Mo/Yr</td><td>Mo/Yr</td>
		</tr>
		<tr>
			<td>Polio</td>
			<td><input type="text" name="immunize_polio_yr1" value="{$immunize_polio_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_polio_yr2" value="{$immunize_polio_yr2}" maxlength="5"/></td>
			
		</tr>
		<tr>
			<td>MMR</td>
			<td><input type="text" name="immunize_MMR_yr1" value="{$immunize_MMR_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_MMR_yr2" value="{$immunize_MMR_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Measles</td>
			<td><input type="text" name="immunize_Measles_yr1" value="{$immunize_Measles_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_Measles_yr2" value="{$immunize_Measles_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Mumps</td>
			<td><input type="text" name="immunize_mumps_yr1" value="{$immunize_mumps_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_mumps_yr2" value="{$immunize_mumps_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Rubella</td>
			<td><input type="text" name="immunize_Rubella_yr1" value="{$immunize_Rubella_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_Rubella_yr2" value="{$immunize_Rubella_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>DTP</td>
			<td><input type="text" name="immunize_DTP_yr1" value="{$immunize_DTP_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_DTP_yr2" value="{$immunize_DTP_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>T/D(tetanus/<br/>diphtheria)</td>
			<td><input type="text" name="immunize_tetanus_t_d_yr1" value="{$immunize_tetanus_t_d_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_tetanus_t_d_yr2" value="{$immunize_tetanus_t_d_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Tetanus</td>
			<td><input type="text" name="immunize_tetanus_yr1" value="{$immunize_tetanus_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_tetanus_yr2" value="{$immunize_tetanus_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Haemophilus influenza B</td>
			<td><input type="text" name="immunize_haemophilus_yr1" value="{$immunize_haemophilus_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_haemophilus_yr2" value="{$immunize_haemophilus_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Hepatitis B</td>
			<td><input type="text" name="immunize_hepatitis_yr1" value="{$immunize_hepatitis_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_hepatitis_yr2" value="{$immunize_hepatitis_yr2}" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Varicella</td>
			<td><input type="text" name="immunize_varicella_yr1" value="{$immunize_varicella_yr1}" maxlength="5"/></td>
			<td><input type="text" name="immunize_varicella_yr2" value="{$immunize_varicella_yr2}" maxlength="5"/></td>
		</tr>
	</table>
	</td>
  </tr>

  <tr>
    <th>My child has had: </th>
	<td>
		<input type="checkbox" name="immunize_had_pox" value="1"/>Chicken Pox<br/>
		<input type="checkbox" name="immunize_had_measles" value="1"/>Measles<br/>
		<input type="checkbox" name="immunize_had_german_measles" value="1"/>German Measles<br/>
		<input type="checkbox" name="immunize_had_mumps" value="1"/>Mumps<br/>
		<input type="checkbox" name="immunize_had_hepatitis_a" value="1"/>Hepatitis A<br/>
		<input type="checkbox" name="immunize_had_hepatitis_b" value="1"/>Hepatitis B<br/>
		<input type="checkbox" name="immunize_had_hepatitis_c" value="1"/>Hepatitis C
	</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Health Information and Privacy Statement</h3>
	</td>
  </tr>

  <tr>
	<td colspan="2">
		All records will be handled only by staff whose job includes processing or using this information for the
		benefit of the participant. All medical records will be held in  limited access by the health care supervisor.
		Minimal necessary information may be shared with event staff/volunteers in order to provide adequate
		participant safety and health care. All forms/records with noted treatment will be retained for seven years past the 
		age of maturity of the participant. Access to the information will be limited, but copies may be requested 
		from the event sponsor, by the participant or their legal representative.
		<p><span style="font-weight:bold">My signature below indicates</span>: This 
			health history is correct as far as i know, and <span style="font-weight:bold; text-decoration:underline;">{$full_name}</span> has 
			permission to engage in all prescribed activities, except as noted by the physician and me. <span style="font-weight:bold; text-decoration:underline;">{$full_name}</span> 
			is in good health. I give permission for <span style="font-weight:bold; text-decoration:underline;">{$full_name}</span> to receive treatment for routine medical and/or first 
			aid needs, as outlined in the Treatment Protocols and for the administration of prescribed medications. In 
			the event I cannot be reached in an emergency, I give my permission for  
			<span style="font-weight:bold; text-decoration:underline;">{$full_name}</span> to 
			receive emergency medical and surgical treatment and to be hospitalized, if necessary. It is understood 
			every effort will be made to contact me or the emergency contact noted above, before taking this action.</p>
	</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Electronic Signature</h3><br/>
	If this form is completed electronically, I agree that my printed name below serves as my electronic signature.<br/>
	<input type="text" name="electronic_signature" id="electronic_signature" value="" class="validate[required]"/></td>
  </tr>


  <tr>
    <td colspan="2"><h3>Photo Release</h3>
	I hereby give consent for my camper to appear in photographs taken and used by Girl Scouts of San Francisco Bay Area and its assignees successors, in Girl Scout publication(s)media and whatever ways they may desire, including audiovisual productions, television and electronic transmissions. Furthermore, I hereby consent that such photographs and plates from which they are mde shall be the property of the Photographer, and the Girl Scouts shall have the right to duplicate reproduce and make other uses of such photographs and plates for Girl Scout publicity and publications as they may desire free and clear of any claim whatsoever on my part. The Photographer will not sell the photos without permission of the Girl Scouts of the San Francisco Bay Area. I am of legal age, have the right to contract for the minor, and freely sign this release, which I have read and understood.
	If this form is completed electronically, I agree that my printed name serves for valid Photo Release authorization.<br/>
	<input type="text" name="photo_release_signature" id="photo_release_signature" value=""/></td>
  </tr>

</table>


<p>
<input type="hidden" name="reg_num" value="{$reg_num}">
<input type="submit" name="submit" value="Save &raquo;" />
</p>
</form>



{include file='_footer.tpl'}