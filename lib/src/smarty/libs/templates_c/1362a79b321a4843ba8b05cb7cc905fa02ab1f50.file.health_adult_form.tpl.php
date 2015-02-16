<?php /* Smarty version Smarty-3.1.7, created on 2012-05-30 09:45:21
         compiled from "/home/peninsul/public_html/ui_templates/health_adult_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14111733684f2edb75cb2d29-76863394%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1362a79b321a4843ba8b05cb7cc905fa02ab1f50' => 
    array (
      0 => '/home/peninsul/public_html/ui_templates/health_adult_form.tpl',
      1 => 1338396308,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14111733684f2edb75cb2d29-76863394',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4f2edb76287e5',
  'variables' => 
  array (
    'full_name' => 0,
    'previously_completed' => 0,
    'php_self' => 0,
    'camper' => 0,
    'guardian1_daytime_phone' => 0,
    'age_at_camp' => 0,
    'dentist_name' => 0,
    'dentist_phone' => 0,
    'physician_name' => 0,
    'physician_telephone' => 0,
    'insurance_carrier' => 0,
    'policy_number' => 0,
    'adult_allergy_options' => 0,
    'row' => 0,
    'id' => 0,
    'allergies' => 0,
    'allergy_other' => 0,
    'last_exam_date' => 0,
    'last_exam_details' => 0,
    'health_conditions_other' => 0,
    'medication_prescription1' => 0,
    'medication_prescription_sideeffect1' => 0,
    'medication_over_counter1' => 0,
    'emergency_contact_name1' => 0,
    'emergency_contact_relation1' => 0,
    'emergency_contact_mobile1' => 0,
    'emergency_contact_dayphone1' => 0,
    'emergency_contact_eve_phone1' => 0,
    'emergency_contact_name2' => 0,
    'emergency_contact_relation2' => 0,
    'emergency_contact_mobile2' => 0,
    'emergency_contact_dayphone2' => 0,
    'emergency_contact_eve_phone2' => 0,
    'reg_num' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f2edb76287e5')) {function content_4f2edb76287e5($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'Health Forms'), 0);?>

<p class="pageName">Adult Health Form for <?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
</p>

<?php if ($_smarty_tpl->tpl_vars['previously_completed']->value){?>
<p><span style="color:red;">Warning!</span> This form was previously completed on <?php echo $_smarty_tpl->tpl_vars['previously_completed']->value;?>
. You can re-submit the form which will overwrite your previous submission.</p>
<?php }?>

<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['php_self']->value;?>
" name="login" class="validateme">
<table border="0" cellspacing="0" cellpadding="4" class="form">
  <tr>
    <td colspan="2"><h3>Part I: Adult Record</h3></td>
  </tr>
  <tr>
    <th>Adult Name</th>
    <td><?php echo $_smarty_tpl->tpl_vars['full_name']->value;?>
</td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Address");?>
<?php if ($_smarty_tpl->tpl_vars['camper']->value->getField("City_State")){?>,
		<?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("City_State");?>
 <?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Zip");?>

		<?php }?></td>
  </tr>
  <tr>
    <th>Alternate/Cell Phone</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Cell Phone");?>
</td>
  </tr>
  <tr>
    <th>Evening Phone</th>
    <td><?php echo $_smarty_tpl->tpl_vars['camper']->value->getField("Home Phone");?>
</td>
  </tr>
	
  <tr>
    <th>Day Time Phone</th>
    <td><input type="text" name="guardian1_daytime_phone" id="guardian1_daytime_phone" value="<?php echo $_smarty_tpl->tpl_vars['guardian1_daytime_phone']->value;?>
" class="validate[required,custom[phone]]" size="80"/></td>
  </tr>
  <tr>
  	<th>Birthday</th>
    <td><input type="text" name="age_at_camp" id="age_at_camp" value="<?php echo $_smarty_tpl->tpl_vars['age_at_camp']->value;?>
" class="validate[required]" size="80"/></td>
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
    <td><input type="text" name="dentist_name" id="dentist_name" value="<?php echo $_smarty_tpl->tpl_vars['dentist_name']->value;?>
" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Dentist Telephone</th>
    <td><input type="text" name="dentist_phone" id="dentist_phone" value="<?php echo $_smarty_tpl->tpl_vars['dentist_phone']->value;?>
" class="validate[required,custom[phone]]"/></td>
  </tr>
	<tr>
    <th>Name of Family Physician</th>
    <td><input type="text" name="physician_name" id="physician_name" value="<?php echo $_smarty_tpl->tpl_vars['physician_name']->value;?>
" class="validate[required]"/></td>
  </tr>
  <tr>
    <th>Physician Telephone</th>
    <td><input type="text" name="physician_telephone" id="physician_telephone" value="<?php echo $_smarty_tpl->tpl_vars['physician_telephone']->value;?>
" class="validate[required,custom[phone]]"/></td>
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
    <td colspan="2"><h3>Part III: Allergies/Illnesses/Injuries</h3>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['adult_allergy_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
  <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['row']->value->getField('id'), null, 0);?>
   <?php if (array_search($_smarty_tpl->tpl_vars['id']->value,$_smarty_tpl->tpl_vars['allergies']->value)!==false){?>
   <label><input checked="checked" type="checkbox" name="allergies[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getField('id');?>
"/><?php echo $_smarty_tpl->tpl_vars['row']->value->getField('name');?>
</label><br/>
   <?php }else{ ?>
     <label><input type="checkbox" name="allergies[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->getField('id');?>
" /><?php echo $_smarty_tpl->tpl_vars['row']->value->getField('name');?>
</label><br/>
   <?php }?>
<?php } ?>
		</td>
  </tr>
	<tr>
    <th>Other (specify)</th>
    <td><input type="text" name="allergy_other" id="allergy_other" value="<?php echo $_smarty_tpl->tpl_vars['allergy_other']->value;?>
"/></td>
  </tr>
	<tr>
    <td colspan="2"><span style="font-weight:bold;">Chronic or Recurring Illnesses:</span> Check those that apply and give appropriate dates<br/>
		<?php echo $_smarty_tpl->getSubTemplate ('_ailments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</td>
  </tr>
	<tr>
    <th>Date of last<br/>health examination:</th>
    <td><input type="text" name="last_exam_date" id="last_exam_date" value="<?php echo $_smarty_tpl->tpl_vars['last_exam_date']->value;?>
"/></td>
  </tr>
	<tr>
    <th>Note any complication<br/>at last exam</th>
    <td><input type="text" name="last_exam_details" id="last_exam_details" value="<?php echo $_smarty_tpl->tpl_vars['last_exam_details']->value;?>
"/></td>
  </tr>
	<tr>
    <td colspan="2">Other health conditions, chronic diseases, or injuries that might impact your participation: (explain)</h3>
	</tr>
	<tr>
    <td colspan="2"><input type="text" class="long" name="health_conditions_other" id="health_conditions_other" value="<?php echo $_smarty_tpl->tpl_vars['health_conditions_other']->value;?>
"/></h3>
	</tr>
	
	<tr>
    <td colspan="2"><h3>Part IV: Medication</h3></td>
  </tr>
	<tr>
    <td colspan="2">If you are taking any medications, Please list them here:
	</tr>
	<tr>
    <td colspan="2"><input class="long" type="text" name="medication_prescription1" id="medication_prescription1" value="<?php echo $_smarty_tpl->tpl_vars['medication_prescription1']->value;?>
"/></h3>
	</tr>
	<tr>
    <td colspan="2">List the possible side effects from these medications:
	</tr>
	<tr>
    <td colspan="2"><input class="long" type="text" name="medication_prescription_sideeffect1" id="medication_prescription_sideeffect1" value="<?php echo $_smarty_tpl->tpl_vars['medication_prescription_sideeffect1']->value;?>
"/></h3>
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
			<input type="text" name="medication_over_counter1" id="medication_over_counter1" value="<?php echo $_smarty_tpl->tpl_vars['medication_over_counter1']->value;?>
"/>
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
	    <td><input type="text" name="emergency_contact_name1" id="emergency_contact_name1" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_name1']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Relationship</th>
	    <td><input type="text" name="emergency_contact_relation1" id="emergency_contact_relation1" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_relation1']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Mobile Phone</th>
	    <td><input type="text" name="emergency_contact_mobile1" id="emergency_contact_mobile1" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_mobile1']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Daytime Phone</th>
	    <td><input type="text" name="emergency_contact_dayphone1" id="emergency_contact_dayphone1" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_dayphone1']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Evening Phone</th>
	    <td><input type="text" name="emergency_contact_eve_phone1" id="emergency_contact_eve_phone1" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_eve_phone1']->value;?>
"/></td>
  </tr>

	<tr>
	    <td colspan="2" style="font-weight:bold;">2nd Contact</th>
  </tr>
	<tr>
	    <th>Name</th>
	    <td><input type="text" name="emergency_contact_name2" id="emergency_contact_name2" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_name2']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Relationship</th>
	    <td><input type="text" name="emergency_contact_relation2" id="emergency_contact_relation2" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_relation2']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Mobile Phone</th>
	    <td><input type="text" name="emergency_contact_mobile2" id="emergency_contact_mobile2" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_mobile2']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Daytime Phone</th>
	    <td><input type="text" name="emergency_contact_dayphone2" id="emergency_contact_dayphone2" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_dayphone2']->value;?>
"/></td>
  </tr>
	<tr>
	    <th>Evening Phone</th>
	    <td><input type="text" name="emergency_contact_eve_phone2" id="emergency_contact_eve_phone2" value="<?php echo $_smarty_tpl->tpl_vars['emergency_contact_eve_phone2']->value;?>
"/></td>
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