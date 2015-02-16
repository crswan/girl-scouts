<?php		
	function drawRegistrationFields( $numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupons)
	{
		$summary = array();

		$nonScoutTrue = TRUE;
		$nonScoutFalse = FALSE;

		for ($i=1; $i<=$numCampers; $i++)
			$summary[] = addRegistrationBlock("Camper", $i, $volunteerType, $nonScoutFalse);

		for ($i=1; $i<=$numCampers_NonScouts; $i++)
			$summary[] = addRegistrationBlock("Camper", $i, $volunteerType, $nonScoutTrue);

		if ( PDC_AcceptingAideRegistrations() )
		{
		for ($i=1; $i<=$numAides; $i++)
			$summary[] = addRegistrationBlock("Aide", $i, $volunteerType, $nonScoutFalse);
		for ($i=1; $i<=$numAides_NonScouts; $i++)
			$summary[] = addRegistrationBlock("Aide", $i, $volunteerType, $nonScoutTrue);
		}

		if (isset($volunteerType) && ($volunteerType != "VolunteerNone") )
		{
			$summary[] = addRegistrationBlock("Adult", 0, $volunteerType, $nonScoutFalse);

			if ($volunteerType != "VolunteerAtHome")
			for ($i=1; $i<=$numTags; $i++)
				$summary[] = addRegistrationBlock("Tagalong", $i, $volunteerType, $nonScoutFalse);
		}

		return $summary;
	}

	// from family.php
	function addRegistrationBlock($personType, $number, $volunteerType, $nonScout)
	{

		static $personNum = 0;

		if ( $personType == "Camper" ) $priceType = $volunteerType;
		else $priceType = $personType;
	
			if ( !isset($personType) ||  !isset($personType) ) echo "Error!  No registration type supplied.";

		$thisPrice = getPrice($priceType, $nonScout);

		$summaryRow[] = array(
			type => $personType,
			price => $thisPrice[1],
			comments => $thisPrice[0]);

		$personNum++;
		return $summaryRow;
	

	}
	function drawPriceSummary($regSummary, $cookieCoupons)
	{
		$html = "<h1>Registration Summary</h1>";
		$html .= "<table border=\"1\">";
		$recordCount = 1;
		$priceTotal = 0;
		for ($j = 0; $j < count($regSummary); $j++)
		{
			$regBlockSummary = $regSummary[$j];
			for ($k = 0; $k < count($regBlockSummary[$k]); $k++)
			{
				$recordCount++;
				
				$html .= "<tr style=\"vertical-align:text-top;\">";
					$html .= "<td style=\"border:1px solid black;\">{$regBlockSummary[$k]['type']}</td>";
					$html .= "<td style=\"border:1px solid black;\">{$regBlockSummary[$k]['comments']}</td>";
					$html .= "<td style=\"text-align:right; border:1px solid black;\">{$regBlockSummary[$k]['price']}</td>";
				$html .= '</tr>';
				$priceTotal += $regBlockSummary[$k]["price"];
			}// end inner for
		} // end outer for
		
		if ( isset($cookieCoupons) && ($cookieCoupons > 0 ) ){
			$html .= "<tr><th>Subtotal </th><th></th><th style=\"text-align:right;\">{$priceTotal}</th></tr>";
			$html .= "<tr><th>Minus Cookie Coupons </th><th></th><th style=\"text-align:right;\">{$cookieCoupons}</th></tr>";
			$priceTotal -= $cookieCoupons;
		}
		
		$html .= "<tr><th>Total </th><th></th><th style=\"text-align:right;\">{$priceTotal}</th></tr>";		
		$html .= "</table>";

		return $html;
	}
?>
