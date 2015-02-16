{include file='_header.tpl' title='Health Forms'}
<p class="pageName">Adult Health Form for {$full_name}</p>

{if $previously_completed}
<p><span style="color:red;">Warning!</span> This form was previously completed on {$previously_completed}. You can re-submit the form which will overwrite your previous submission.</p>
{/if}

<form method="post" action="{$php_self}" name="login" class="validateme">
<table border="0" cellspacing="0" cellpadding="4" class="form">
  <tr>
    <td colspan="2"><h3>Part I: Adult Record</h3></td>
  </tr>
  <tr>
    <th>Adult Name</th>
    <td>{$full_name}</td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{$camper->getField("Address")}{if $camper->getField("City_State")},
		{$camper->getField("City_State")} {$camper->getField("Zip")}
		{/if}</td>
  </tr>
  <tr>
    <th>Alternate/Cell Phone</th>
    <td>{$camper->getField("Cell Phone")}</td>
  </tr>
  <tr>
    <th>Evening Phone</th>
    <td>{$camper->getField("Home Phone")}</td>
  </tr>
	
  <tr>
    <th>Day Time Phone</th>
    <td><input type="text" name="guardian1_daytime_phone" id="guardian1_daytime_phone" value="{$guardian1_daytime_phone}" class="validate[required,custom[phone]]" size="80"/></td>
  </tr>
  <tr>
  	<th>Birthday</th>
    <td><input type="text" name="age_at_camp" id="age_at_camp" value="{$age_at_camp}" class="validate[required]" size="80"/></td>
  </tr>
  <tr>
    <th>Gender</th>
    <td>
		Female<input type="radio" value="Female" name="gender" id="gender" checked="checked"/>
		Male<input type="radio" value="Male" name="gender" id="gender"/>
	</td>
  </tr>

	<tr>
	  <td colspan="2"><h3>Health Information Privacy Statement</h3><br/>
			The Adult Health History Record is for health care concerns at the event only. All records will be 
			handled by staff/volunteers whose job includes processing or using this information for the benefit of 
			the participant. All medical records will be held in limited access by the health care supervisor of 
			the specific event. Minimal necessary information may be shared with event staff/volunteers in order 
			to provide adequate participant safety and health care. The health history record will be retained by 
			the council or GSUSA unit it is destroyed. All forms/records with noted treatment will be retained for 
			seven years. Access to the information will be limited, but copies may be requested from the council, 
			by the participant or their legal representative.
			<p><span style="font-weight:bold;">I have read the above procedures for handling the health history record 
				information and I agree to the release of any records necessary for treatment, referral, billing or 
				insurance purposes. If this form is completed electronically, I agree that my printed name serves as my electronic signature.</span>
			</p>
		</td>
  </tr>
	<tr>
  	<th>Adult Participant Signature</th>
    <td><input type="text" name="electronic_signature" id="electronic_signature" value="" class="validate[required]"/></td>
  </tr>

	<tr>
    <td colspan="2"><h3>Part II: Health Insurance Information</h3></td>
  </tr>
	<tr>
    <th>Name of Family Dentist</th>
    <td><input type="text" name="dentist_name" id="dentist_name" value="{$dentist_name}" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Dentist Telephone</th>
    <td><input type="text" name="dentist_phone" id="dentist_phone" value="{$dentist_phone}" class="validate[required,custom[phone]]"/></td>
  </tr>
	<tr>
    <th>Name of Family Physician</th>
    <td><input type="text" name="physician_name" id="physician_name" value="{$physician_name}" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Physician Telephone</th>
    <td><input type="text" name="physician_telephone" id="physician_telephone" value="{$physician_telephone}" class="validate[required,custom[phone]]"/></td>
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
    <td colspan="2"><h3>Part III: Allergies/Illnesses/Injuries</h3>
{foreach from=$adult_allergy_options item=row name=loop}
  {$id = $row->getField('id')}
   {if $id|@array_search:$allergies !==false}
   <label><input checked="checked" type="checkbox" name="allergies[]" value="{$row->getField('id')}"/>{$row->getField('name')}</label><br/>
   {else}
     <label><input type="checkbox" name="allergies[]" value="{$row->getField('id')}" />{$row->getField('name')}</label><br/>
   {/if}
{/foreach}
		</td>
  </tr>
	<tr>
    <th>Other (specify)</th>
    <td><input type="text" name="allergy_other" id="allergy_other" value="{$allergy_other}"/></td>
  </tr>
	<tr>
    <td colspan="2"><span style="font-weight:bold;">Chronic or Recurring Illnesses:</span> Check those that apply and give appropriate dates<br/>
		{include file='_ailments.tpl'}
		</td>
  </tr>
	<tr>
    <th>Date of last<br/>health examination:</th>
    <td><input type="text" name="last_exam_date" id="last_exam_date" value="{$last_exam_date}"/></td>
  </tr>
	<tr>
    <th>Note any complication<br/>at last exam</th>
    <td><input type="text" name="last_exam_details" id="last_exam_details" value="{$last_exam_details}"/></td>
  </tr>
	<tr>
    <td colspan="2">Other health conditions, chronic diseases, or injuries that might impact your participation: (explain)</h3>
	</tr>
	<tr>
    <td colspan="2"><input type="text" class="long" name="health_conditions_other" id="health_conditions_other" value="{$health_conditions_other}"/></h3>
	</tr>
	
	<tr>
    <td colspan="2"><h3>Part IV: Medication</h3></td>
  </tr>
	<tr>
    <td colspan="2">If you are taking any medications, Please list them here:
	</tr>
	<tr>
    <td colspan="2"><input class="long" type="text" name="medication_prescription1" id="medication_prescription1" value="{$medication_prescription1}"/></h3>
	</tr>
	<tr>
    <td colspan="2">List the possible side effects from these medications:
	</tr>
	<tr>
    <td colspan="2"><input class="long" type="text" name="medication_prescription_sideeffect1" id="medication_prescription_sideeffect1" value="{$medication_prescription_sideeffect1}"/></h3>
	</tr>
	
	<tr>
    <td colspan="2"><h3>Part V: Consent to Treat</h3>
			In the event of an emergency, every effort will be made to contact an emergency contact. I hereby give 
			authorization to Girls Scounts of Northern California to seek treatment for myself by a licensed 
			physician pursuant to California Family Code Section 6910 and California Civil Code 25.8. I know of no 
			reason(s), other than the information indicated on this form, why I should not participate in prescribed activities.<br/>
			<span style="font-weight:bold;">If this form is completed electronically, I agree that my printed name serves as my electronic signature.</span>
		</td>
  </tr>
	<tr>
    <th>Printed Name</th>
    <td><input type="text" name="electronic_signature_treat_consent" id="electronic_signature_treat_consent" value=""/></td>
  </tr>

	<tr>
    <td colspan="2"><h3>Part VI: Over-the-Counter Medication</h3>
			Over-the-counter medicines will be used to treat routine illness per Treatment Protocols. (Acetaminophen is used in place of aspirin.) Please list any over-the-counter medicines you DO NOT want to receive
			<input type="text" name="medication_over_counter1" id="medication_over_counter1" value="{$medication_over_counter1}"/>
		</td>
  </tr>

	<tr>
    <td colspan="2"><h3>Emergency Contact(s)</h3></td>
  </tr>
	<tr>
	    <td colspan="2" style="font-weight:bold;">1st Contact</th>
  </tr>
	<tr>
	    <th>Name</th>
	    <td><input type="text" name="emergency_contact_name1" id="emergency_contact_name1" value="{$emergency_contact_name1}"/></td>
  </tr>
	<tr>
	    <th>Relationship</th>
	    <td><input type="text" name="emergency_contact_relation1" id="emergency_contact_relation1" value="{$emergency_contact_relation1}"/></td>
  </tr>
	<tr>
	    <th>Mobile Phone</th>
	    <td><input type="text" name="emergency_contact_mobile1" id="emergency_contact_mobile1" value="{$emergency_contact_mobile1}"/></td>
  </tr>
	<tr>
	    <th>Daytime Phone</th>
	    <td><input type="text" name="emergency_contact_dayphone1" id="emergency_contact_dayphone1" value="{$emergency_contact_dayphone1}"/></td>
  </tr>
	<tr>
	    <th>Evening Phone</th>
	    <td><input type="text" name="emergency_contact_eve_phone1" id="emergency_contact_eve_phone1" value="{$emergency_contact_eve_phone1}"/></td>
  </tr>

	<tr>
	    <td colspan="2" style="font-weight:bold;">2nd Contact</th>
  </tr>
	<tr>
	    <th>Name</th>
	    <td><input type="text" name="emergency_contact_name2" id="emergency_contact_name2" value="{$emergency_contact_name2}"/></td>
  </tr>
	<tr>
	    <th>Relationship</th>
	    <td><input type="text" name="emergency_contact_relation2" id="emergency_contact_relation2" value="{$emergency_contact_relation2}"/></td>
  </tr>
	<tr>
	    <th>Mobile Phone</th>
	    <td><input type="text" name="emergency_contact_mobile2" id="emergency_contact_mobile2" value="{$emergency_contact_mobile2}"/></td>
  </tr>
	<tr>
	    <th>Daytime Phone</th>
	    <td><input type="text" name="emergency_contact_dayphone2" id="emergency_contact_dayphone2" value="{$emergency_contact_dayphone2}"/></td>
  </tr>
	<tr>
	    <th>Evening Phone</th>
	    <td><input type="text" name="emergency_contact_eve_phone2" id="emergency_contact_eve_phone2" value="{$emergency_contact_eve_phone2}"/></td>
  </tr>
</table>
<p>
<input type="hidden" name="reg_num" value="{$reg_num}">
<input type="submit" name="submit" value="Save &raquo;" />
</p>
</form>
{include file='_footer.tpl'}