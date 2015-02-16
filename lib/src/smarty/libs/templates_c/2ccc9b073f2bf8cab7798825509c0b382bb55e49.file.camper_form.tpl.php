<?php /* Smarty version Smarty-3.1.7, created on 2012-02-29 12:02:39
         compiled from "/home/peninsul/public_html/ui_templates/camper_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3993864074f2e0db304c775-83204056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ccc9b073f2bf8cab7798825509c0b382bb55e49' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/camper_form.tpl',
      1 => 1330545755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3993864074f2e0db304c775-83204056',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2e0db31c494',
  'variables' => 
  array (
    'full_name' => 0,
    'php_self' => 0,
    'camper' => 0,
    'age_at_camp' => 0,
    'guardian1_daytime_phone' => 0,
    'guardian1_alternate_phone' => 0,
    'guardian2_daytime_phone' => 0,
    'guardian2_alternate_phone' => 0,
    'physician_name' => 0,
    'physician_telephone' => 0,
    'physician_address' => 0,
    'insurance_carrier' => 0,
    'policy_number' => 0,
    'child_ins_id_num' => 0,
    'hmo_main_phone' => 0,
    'ailments_explained' => 0,
    'allergy_medicine' => 0,
    'allergy_medicine_reaction' => 0,
    'allergy_food' => 0,
    'allergy_food_reaction' => 0,
    'allergy_other' => 0,
    'allergy_other_reaction' => 0,
    'food_activity_restrictions' => 0,
    'additional_health_info' => 0,
    'medication_prescription1' => 0,
    'medication_prescription_reason1' => 0,
    'medication_prescription2' => 0,
    'medication_prescription_reason2' => 0,
    'medication_over_counter1' => 0,
    'medication_over_counter_reason1' => 0,
    'medication_over_counter2' => 0,
    'medication_over_counter_reason2' => 0,
    'immunize_polio_yr1' => 0,
    'immunize_polio_yr2' => 0,
    'immunize_MMR_yr1' => 0,
    'immunize_MMR_yr2' => 0,
    'immunize_Measles_yr1' => 0,
    'immunize_Measles_yr2' => 0,
    'immunize_mumps_yr1' => 0,
    'immunize_mumps_yr2' => 0,
    'immunize_Rubella_yr1' => 0,
    'immunize_Rubella_yr2' => 0,
    'immunize_DTP_yr1' => 0,
    'immunize_DTP_yr2' => 0,
    'immunize_tetanus_t_d_yr1' => 0,
    'immunize_tetanus_t_d_yr2' => 0,
    'immunize_tetanus_yr1' => 0,
    'immunize_tetanus_yr2' => 0,
    'immunize_haemophilus_yr1' => 0,
    'immunize_haemophilus_yr2' => 0,
    'immunize_hepatitis_yr1' => 0,
    'immunize_hepatitis_yr2' => 0,
    'immunize_varicella_yr1' => 0,
    'immunize_varicella_yr2' => 0,
    'reg_num' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2e0db31c494')) {function content_4f2e0db31c494($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'Health Forms'), 0);?>

<p class="pageName">Camper Health Form for <?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
</p>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['php_self']->value;?>
" name="login" class="validateme">

<table border="0" cellspacing="0" cellpadding="4" class="form">
  <tr>
    <td colspan="2"><h3>Registration Information</h3></td>
  </tr>
  <tr>
    <th>Guardian #1</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Mom First Name");?>
 <?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Mom Last Name");?>
</td>
  </tr>
  <tr>
    <th>Daytime Phone</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Home Phone");?>
</td>
  </tr>
  <tr>
    <th>Alternate/Cell Phone</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Cell Phone");?>
</td>
  </tr>
  <tr>
    <th>Guardian #2</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Dad First Name");?>
 <?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Dad Last Name");?>
</td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Address");?>
<?php if ($_smarty_tpl->tpl_vars['camper']->value->getField("City_State")){?>,
		<?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("City_State");?>
 <?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Zip");?>

		<?php }?>
		</td>
  </tr>
  <tr>
    <th>Birthday</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Camper Birthday");?>
</td>
  </tr>
  <tr>
    <th>Troop #</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Troop #");?>
</td>
  </tr>
  <tr>
    <th>Grade in the Fall</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("grade in fall");?>
</td>
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
    <td><input type="text" name="age_at_camp" id="age_at_camp" value="<?php echo $_smarty_tpl->tpl_vars['age_at_camp']->value;?>
" class="validate[required,custom[integer]]" maxlength="2"/></td>
  </tr>
  <tr>
    <th>Guardian #1 Daytime Phone</th>
    <td><input type="text" name="guardian1_daytime_phone" id="guardian1_daytime_phone" value="<?php echo $_smarty_tpl->tpl_vars['guardian1_daytime_phone']->value;?>
" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Guardian #1 Alternate Phone</th>
    <td><input type="text" name="guardian1_alternate_phone" id="guardian1_alternate_phone" value="<?php echo $_smarty_tpl->tpl_vars['guardian1_alternate_phone']->value;?>
" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Guardian #2 Daytime Phone</th>
    <td><input type="text" name="guardian2_daytime_phone" id="guardian2_daytime_phone" value="<?php echo $_smarty_tpl->tpl_vars['guardian2_daytime_phone']->value;?>
" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Guardian #2 Alternate Phone</th>
    <td><input type="text" name="guardian2_alternate_phone" id="guardian2_alternate_phone" value="<?php echo $_smarty_tpl->tpl_vars['guardian2_alternate_phone']->value;?>
" class="validate[required,custom[phone]]"/></td>
  </tr>
	<tr>
    <th>Emergency Contact</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField('people.FAMILY::emergencyName');?>
</td>
  </tr>
	<tr>
    <th>Emergency Contact Phone</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField('people.FAMILY::emergencyPhone');?>
</td>
  </tr>
	<tr>
    <th>Emergency Contact Relationship</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField('people.FAMILY::emergencyRelationship');?>
</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Health Insurance Information (<?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
)</h3></td>
  </tr>
  <tr>
    <th>Name of Physician</th>
    <td><input type="text" name="physician_name" id="physician_name" value="<?php echo $_smarty_tpl->tpl_vars['physician_name']->value;?>
" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Telephone</th>
    <td><input type="text" name="physician_telephone" id="physician_telephone" value="<?php echo $_smarty_tpl->tpl_vars['physician_telephone']->value;?>
" class="validate[required,custom[phone]]"/></td>
  </tr>
  <tr>
    <th>Address of Family Physician</th>
    <td><input type="text" name="physician_address" id="physician_address" value="<?php echo $_smarty_tpl->tpl_vars['physician_address']->value;?>
" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Family Medical/Hospital<br/>Insurance Carrier</th>
    <td><input type="text" name="insurance_carrier" id="insurance_carrier" value="<?php echo $_smarty_tpl->tpl_vars['insurance_carrier']->value;?>
" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Policy/Group Number</th>
    <td><input type="text" name="policy_number" id="policy_number" value="<?php echo $_smarty_tpl->tpl_vars['policy_number']->value;?>
" class="validate[required]"/></td>
  </tr>
  <tr>
    <td colspan="2">
			Do you have memebership with a Health Maintenance Organization (HMO) such as Kaiser, Lifeguard, etc.?<br/>
			Yes<input type="radio" value="Yes" name="has_hmo_membership" id="has_hmo_membership"/>&nbsp;&nbsp;&nbsp;No<input type="radio" value="No" name="has_hmo_membership" id="has_hmo_membership" checked="checked"/>
		</td>
  </tr>
  <tr>
    <th>If yes, what ID number does<br/>your child use</th>
    <td><input type="text" name="child_ins_id_num" id="child_ins_id_num" value="<?php echo $_smarty_tpl->tpl_vars['child_ins_id_num']->value;?>
"/></td>
  </tr>
  <tr>
    <th>HMO main phone number<br/>for emergencies</th>
    <td><input type="text" name="hmo_main_phone" id="hmo_main_phone" value="<?php echo $_smarty_tpl->tpl_vars['hmo_main_phone']->value;?>
"/></td>
  </tr>

  <tr>
    <td colspan="2"><h3>Please check all of the illnesses/injuries/conditions that the occurred in the past 6 months:</h3><br/>
	  <?php echo $_smarty_tpl->getSubTemplate ('_ailments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</td>
  </tr>
	<tr>
    <th>Please provide explainations for any checked boxes</th>
    <td><input type="text" name="ailments_explained" id="ailments_explained" value="<?php echo $_smarty_tpl->tpl_vars['ailments_explained']->value;?>
"/></td>
  </tr>

  <tr>
    <td colspan="2"><h3>Allergies - Please list all known allergies and describe reaction</h3>
	</td>
  </tr>
  <tr>
    <th>Allergies to medication</th>
    <td><input type="text" name="allergy_medicine" id="allergy_medicine" value="<?php echo $_smarty_tpl->tpl_vars['allergy_medicine']->value;?>
"/>
	</td>
  </tr>
  <tr>
    <th>Reaction to the above</th>
    <td><input type="text" name="allergy_medicine_reaction" id="allergy_medicine_reaction" value="<?php echo $_smarty_tpl->tpl_vars['allergy_medicine_reaction']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Allergies to food</th>
    <td><input type="text" name="allergy_food" id="allergy_food" value="<?php echo $_smarty_tpl->tpl_vars['allergy_food']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Reaction to the above</th>
    <td><input type="text" name="allergy_food_reaction" id="allergy_food_reaction" value="<?php echo $_smarty_tpl->tpl_vars['allergy_food_reaction']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Allergies to food</th>
    <td><input type="text" name="allergy_other" id="allergy_other" value="<?php echo $_smarty_tpl->tpl_vars['allergy_other']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Reaction to the above</th>
    <td><input type="text" name="allergy_other_reaction" id="allergy_other_reaction" value="<?php echo $_smarty_tpl->tpl_vars['allergy_other_reaction']->value;?>
"/></td>
  </tr>

  <tr>
    <td colspan="2"><p><span style="font-weight:bold;">Please list any restriction to food or activity for your child</span><br/>
	  <input type="text" name="food_activity_restrictions" id="food_activity_restrictions" value="<?php echo $_smarty_tpl->tpl_vars['food_activity_restrictions']->value;?>
" size="160"/></p>
	</td>
  </tr>
  <tr>
    <td colspan="2"><span style="font-weight:bold;">Please share any other information you feel the camp staff should have about your child's physical, emotional, or mental health</span><br/>
	  <input type="text" name="additional_health_info" id="additional_health_info" value="<?php echo $_smarty_tpl->tpl_vars['additional_health_info']->value;?>
" size="160"/>
	</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Medications</h3>Medications to be taken during camp need to be brought to camp in their original container accompanied by signed instructions from parent/guardian including dosage and time taken. <span style="font-weight:bold;">Please list medications being taken on a regular basis and the reason.</span>
	</td>
  </tr>

  <tr>
    <th>Prescription Meds#1</th>
    <td><input type="text" name="medication_prescription1" id="medication_prescription1" value="<?php echo $_smarty_tpl->tpl_vars['medication_prescription1']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_prescription_reason1" id="medication_prescription_reason1" value="<?php echo $_smarty_tpl->tpl_vars['medication_prescription_reason1']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Prescription Meds#2</th>
    <td><input type="text" name="medication_prescription2" id="medication_prescription2" value="<?php echo $_smarty_tpl->tpl_vars['medication_prescription2']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_prescription_reason2" id="medication_prescription_reason2" value="<?php echo $_smarty_tpl->tpl_vars['medication_prescription_reason2']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Over-the-counter Meds#1</th>
    <td><input type="text" name="medication_over_counter1" id="medication_over_counter1" value="<?php echo $_smarty_tpl->tpl_vars['medication_over_counter1']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_over_counter_reason1" id="medication_over_counter_reason1" value="<?php echo $_smarty_tpl->tpl_vars['medication_over_counter_reason1']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Over-the-counter Meds#2</th>
    <td><input type="text" name="medication_over_counter2" id="medication_over_counter2" value="<?php echo $_smarty_tpl->tpl_vars['medication_over_counter2']->value;?>
"/></td>
  </tr>
  <tr>
    <th>Reason</th>
    <td><input type="text" name="medication_over_counter_reason2" id="medication_over_counter_reason2" value="<?php echo $_smarty_tpl->tpl_vars['medication_over_counter_reason2']->value;?>
"/></td>
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
	<p><span style="font-weight:bold;">Please indicate with a check if 
		you do or do not wants us to give these medications:</span>
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
			<td><input type="text" name="immunize_polio_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_polio_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_polio_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_polio_yr2']->value;?>
" maxlength="5"/></td>
			
		</tr>
		<tr>
			<td>MMR</td>
			<td><input type="text" name="immunize_MMR_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_MMR_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_MMR_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_MMR_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Measles</td>
			<td><input type="text" name="immunize_Measles_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_Measles_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_Measles_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_Measles_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Mumps</td>
			<td><input type="text" name="immunize_mumps_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_mumps_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_mumps_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_mumps_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Rubella</td>
			<td><input type="text" name="immunize_Rubella_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_Rubella_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_Rubella_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_Rubella_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>DTP</td>
			<td><input type="text" name="immunize_DTP_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_DTP_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_DTP_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_DTP_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>T/D(tetanus/<br/>diphtheria)</td>
			<td><input type="text" name="immunize_tetanus_t_d_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_tetanus_t_d_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_tetanus_t_d_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_tetanus_t_d_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Tetanus</td>
			<td><input type="text" name="immunize_tetanus_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_tetanus_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_tetanus_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_tetanus_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Haemophilus influenza B</td>
			<td><input type="text" name="immunize_haemophilus_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_haemophilus_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_haemophilus_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_haemophilus_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Hepatitis B</td>
			<td><input type="text" name="immunize_hepatitis_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_hepatitis_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_hepatitis_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_hepatitis_yr2']->value;?>
" maxlength="5"/></td>
		</tr>
		<tr>
			<td>Varicella</td>
			<td><input type="text" name="immunize_varicella_yr1" value="<?php echo $_smarty_tpl->tpl_vars['immunize_varicella_yr1']->value;?>
" maxlength="5"/></td>
			<td><input type="text" name="immunize_varicella_yr2" value="<?php echo $_smarty_tpl->tpl_vars['immunize_varicella_yr2']->value;?>
" maxlength="5"/></td>
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
		participant safety and health care. All forms/records with noted treatment will be retained for seven years 
		age of maturity of the participant. Access to the information will be limited, but copies may be requested 
		from the event sponsor, by the participant or their legal representative.
	</td>
  </tr>

  <tr>
    <td colspan="2"><h3>Electronic Signature</h3><br/>
	If this form is completed electronically, I agree that my printed name serves as my electronic signature.<br/>
	<input type="text" name="electronic_signature" id="electronic_signature" value="" class="validate[required]"/></td>
  </tr>


  <tr>
    <td colspan="2"><h3>Photo Release</h3>
	I hereby give consent for my camper to appear in photographs taken and used by Girl Scouts of San Francisco Bay Area and its assigns or successors, in Girl Scout publication(s)media and whatever ways they may desire, including audiovisual productions, television and electronic transmissions; furthermore, I hereby consent that such photographs and plates from which they are mde shall be the property of the Photographer, and the Girl Scouts shall have the right to duplicate reproduce and make other uses of such photographs and plates for Girl Scout publicity and publications as they may desire free and clear of any claim whatsoever on my part. The Photographer will not sell the photos without permission of the Girl Scouts of the San Francisco Bay Area I am of legal age, have the right to contract for the minor, and freely sign this release, which I have read and understood.
	If this form is completed electronically, I agree that my printed name serves for valid Photo Release authorization.<br/>
	<input type="text" name="photo_release_signature" id="photo_release_signature" value=""/></td>
  </tr>

</table>


<p>
<input type="hidden" name="reg_num" value="<?php echo $_smarty_tpl->tpl_vars['reg_num']->value;?>
">
<input type="submit" name="submit" value="Save &raquo;" />
</p>
</form>



<?php echo $_smarty_tpl->getSubTemplate ('_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>