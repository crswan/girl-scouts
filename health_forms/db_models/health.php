<?php
/*
* Health class
* Will contain methods to handle data processing for health forms
*/
class Health
{
	// function __construct() {
	// 	
	// }

 /*
	* Saves form data to the database
	*
	* @author      $Author: hanz $
	*
	* int person_id   (required) ["camper|aide|staff"]
	*/
	function save( $params )
	{
	// $grouping = isset($params['grouping']) ? $params['grouping'] : null;
		$person_id = $params["person_id"];
    $fm_layout = "cgi-HealthForms";

		global $fm;

	  $findCommand =& $fm->newFindCommand($fm_layout);
    $findCommand->addFindCriterion('id_person', $person_id);
		
		$result = $findCommand->execute();

		// create a new health record if we don't already have one
    if (FileMaker::isError($result)) {
			$health_record =& $fm->newAddCommand($fm_layout);
			$health_record->setField("id_person", $person_id);
			$result = $health_record->execute();
			if (FileMaker::isError($health_record)){
				trigger_error("Can't create health form for this user.", E_USER_NOTICE);
			}
		}

		$health_record = $result->getFirstRecord();
		
		$ailments = Health::process_ailments_for_fm($_POST["ailments"]);
		// push form data to equivalent filemaker record object fields
	
		$health_record->setField("guardian1_daytime_phone", $_POST["guardian1_daytime_phone"]);
		$health_record->setField("guardian1_alternate_phone", $_POST["guardian1_alternate_phone"]);
		$health_record->setField("guardian2_daytime_phone", $_POST["guardian2_daytime_phone"]);
		$health_record->setField("guardian2_alternate_phone", $_POST["guardian2_alternate_phone"]);
		// $health_record->setField("emergency_contact_other_name", $_POST["emergency_contact_other_name"]);
		// $health_record->setField("emergency_contact_other_daytime_phone", $_POST["emergency_contact_other_daytime_phone"]);
		// $health_record->setField("emergency_contact_other_alt_phone", $_POST["emergency_contact_other_alt_phone"]);
		
		$health_record->setField("physician_name", $_POST["physician_name"]);
		$health_record->setField("physician_address", $_POST["physician_address"]);
		$health_record->setField("physician_telephone", $_POST["physician_telephone"]);
		$health_record->setField("insurance_carrier", $_POST["insurance_carrier"]);
		$health_record->setField("policy_number", $_POST["policy_number"]);
		$health_record->setField("has_hmo_membership", $_POST["has_hmo_membership"]);
		$health_record->setField("child_ins_id_num", $_POST["child_ins_id_num"]);
		$health_record->setField("hmo_main_phone", $_POST["hmo_main_phone"]);
		$health_record->setField("gender", $_POST["gender"]);
		$health_record->setField("age_at_camp", $_POST["age_at_camp"]);
		$health_record->setField("ailments", $ailments);
		$health_record->setField("ailments_explained", $_POST["ailments_explained"]);
		$health_record->setField("photo_release_signature", $_POST["photo_release_signature"]);
		$health_record->setField("electronic_signature", $_POST["electronic_signature"]);
		
		$health_record->setField("allergy_medicine", $_POST["allergy_medicine"]);
		$health_record->setField("allergy_medicine_reaction", $_POST["allergy_medicine_reaction"]);
		$health_record->setField("allergy_food", $_POST["allergy_food"]);
		$health_record->setField("allergy_food_reaction", $_POST["allergy_food_reaction"]);
		$health_record->setField("food_activity_restrictions", $_POST["food_activity_restrictions"]);
		$health_record->setField("additional_health_info", $_POST["additional_health_info"]);
		$health_record->setField("allergy_other", $_POST["allergy_other"]);
		$health_record->setField("allergy_other_reaction", $_POST["allergy_other_reaction"]);
		
		
		$health_record->setField("medication_prescription1", $_POST["medication_prescription1"]);
		$health_record->setField("medication_prescription_reason1", $_POST["medication_prescription_reason1"]);
		$health_record->setField("medication_prescription2", $_POST["medication_prescription2"]);
		$health_record->setField("medication_prescription_reason2", $_POST["medication_prescription_reason2"]);
		$health_record->setField("medication_over_counter1", $_POST["medication_over_counter1"]);
		$health_record->setField("medication_over_counter_reason1", $_POST["medication_over_counter_reason1"]);
		$health_record->setField("medication_over_counter2", $_POST["medication_over_counter2"]);
		$health_record->setField("medication_over_counter_reason2", $_POST["medication_over_counter_reason2"]);

		$health_record->setField("tlc_medication", $_POST["tlc_medication"]);
		
		$health_record->setField("immunize_opt_out", $_POST["immunize_opt_out"]);
		$health_record->setField("immunize_polio_yr1", $_POST["immunize_polio_yr1"]);
		$health_record->setField("immunize_polio_yr2", $_POST["immunize_polio_yr2"]);
		$health_record->setField("immunize_MMR_yr1", $_POST["immunize_MMR_yr1"]);
		$health_record->setField("immunize_MMR_yr2", $_POST["immunize_MMR_yr2"]);
		$health_record->setField("immunize_Measles_yr1", $_POST["immunize_Measles_yr1"]);
		$health_record->setField("immunize_Measles_yr2", $_POST["immunize_Measles_yr2"]);
		$health_record->setField("immunize_Rubella_yr1", $_POST["immunize_Rubella_yr1"]);
		$health_record->setField("immunize_Rubella_yr2", $_POST["immunize_Rubella_yr2"]);
		$health_record->setField("immunize_DTP_yr1", $_POST["immunize_DTP_yr1"]);
		$health_record->setField("immunize_DTP_yr2", $_POST["immunize_DTP_yr2"]);
		$health_record->setField("immunize_tetanus_yr1", $_POST["immunize_tetanus_yr1"]);
		$health_record->setField("immunize_tetanus_yr2", $_POST["immunize_tetanus_yr2"]);
		$health_record->setField("immunize_haemophilus_yr1", $_POST["immunize_haemophilus_yr1"]);
		$health_record->setField("immunize_haemophilus_yr2", $_POST["immunize_haemophilus_yr2"]);
		$health_record->setField("immunize_hepatitis_yr1", $_POST["immunize_hepatitis_yr1"]);
		$health_record->setField("immunize_hepatitis_yr2", $_POST["immunize_hepatitis_yr2"]);
		$health_record->setField("immunize_varicella_yr1", $_POST["immunize_varicella_yr1"]);
		$health_record->setField("immunize_varicella_yr2", $_POST["immunize_varicella_yr2"]);
		
		$health_record->setField("immunize_had_pox", $_POST["immunize_had_pox"]);
		$health_record->setField("immunize_had_mumps", $_POST["immunize_had_mumps"]);
		$health_record->setField("immunize_had_hepatitis_a", $_POST["immunize_had_hepatitis_a"]);
		$health_record->setField("immunize_had_hepatitis_b", $_POST["immunize_had_hepatitis_b"]);
		$health_record->setField("immunize_had_hepatitis_c", $_POST["immunize_had_hepatitis_c"]);
		$health_record->setField("immunize_had_german_measles", $_POST["immunize_had_german_measles"]);
		$health_record->setField("immunize_had_measles", $_POST["immunize_had_measles"]);
		$health_record->setField("immunize_mumps_yr1", $_POST["immunize_mumps_yr1"]);
		$health_record->setField("immunize_mumps_yr2", $_POST["immunize_mumps_yr2"]);
		$health_record->setField("immunize_tetanus_t_d_yr1", $_POST["immunize_tetanus_t_d_yr1"]);
		$health_record->setField("immunize_tetanus_t_d_yr2", $_POST["immunize_tetanus_t_d_yr2"]);
		
		$health_record->setField("dentist_name", $_POST["dentist_name"]);
		$health_record->setField("dentist_phone", $_POST["dentist_phone"]);
		$health_record->setField("allergies", Health::process_ailments_for_fm($_POST["allergies"]));
		$health_record->setField("last_exam_date", $_POST["last_exam_date"]);
		$health_record->setField("last_exam_details", $_POST["last_exam_details"]);
		$health_record->setField("medication_prescription_sideeffect1", $_POST["medication_prescription_sideeffect1"]);
		
		$health_record->setField("emergency_contact_name1", $_POST["emergency_contact_name1"]);
		$health_record->setField("emergency_contact_name2", $_POST["emergency_contact_name2"]);
		$health_record->setField("emergency_contact_relation1", $_POST["emergency_contact_relation1"]);
		$health_record->setField("emergency_contact_relation2", $_POST["emergency_contact_relation2"]);
		$health_record->setField("emergency_contact_mobile1", $_POST["emergency_contact_mobile1"]);
		$health_record->setField("emergency_contact_mobile2", $_POST["emergency_contact_mobile2"]);
		$health_record->setField("emergency_contact_dayphone1", $_POST["emergency_contact_dayphone1"]);
		$health_record->setField("emergency_contact_dayphone2", $_POST["emergency_contact_dayphone2"]);
		$health_record->setField("emergency_contact_eve_phone1", $_POST["emergency_contact_eve_phone1"]);
		$health_record->setField("emergency_contact_eve_phone2", $_POST["emergency_contact_eve_phone2"]);
		$health_record->setField("electronic_signature_treat_consent", $_POST["electronic_signature_treat_consent"]);
		

		// save the record
		$result = $health_record->commit();
		if (FileMaker::isError($result)){
			$message = "Can't edit the health record for this person. " . $result->getMessage();
			trigger_error($message, E_USER_NOTICE);
		}
		
		
	}
	
	/*
	* Preps ailments values for filemaker consumption
	*
	* @author      $Author: hanz $
	*
	* array ailments   (required) array of ailments
	*/
	function process_ailments_for_fm($ailments){
		// global $firephp;
		
		if( ! empty($ailments)){
			// $firephp->info(implode("\n", $ailments));
			return implode("\r", $ailments);
		}
		
		return null;
	}
}
?>