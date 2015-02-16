<?php
function FMStudio_PayPal_BuyNow($business, $itemNumber, $item, $price, $qty, $shipping, $tax, $invoice, $return, $notify, $sandbox, $extra, $rootPath) {
	$extra = FMStudio_PayPal_parseArgs_varSelector($extra);
	
	$business = htmlentities($business);
	$itemNumber = htmlentities($itemNumber);
	$item = htmlentities($item);
	$price = htmlentities(sprintf("%01.2f",(float)$price));
	$qty = htmlentities((int)$qty);
	if($shipping!='') $shipping = htmlentities(sprintf("%01.2f",(float)$shipping));
	if($tax!='') $tax = htmlentities(sprintf("%01.2f",(float)$tax));
	$return = htmlentities($return);
	$notify = htmlentities($notify);
	if($sandbox) {
		echo "<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">\n";
	}else{
		echo "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">\n";
	}
	echo "<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">\n";
	echo "<input type=\"hidden\" name=\"business\" value=\"{$business}\">\n";
	echo "<input type=\"hidden\" name=\"item_name\" value=\"{$item}\">\n";
	echo "<input type=\"hidden\" name=\"item_number\" value=\"{$itemNumber}\">\n";
	echo "<input type=\"hidden\" name=\"quantity\" value=\"{$qty}\">\n";
	echo "<input type=\"hidden\" name=\"amount\" value=\"{$price}\">\n";
	echo "<input type=\"hidden\" name=\"shipping\" value=\"{$shipping}\">\n";
	if($invoice != '') echo "<input type=\"hidden\" name=\"invoice\" value=\"{$invoice}\">\n";
	echo "<input type=\"hidden\" name=\"tax\" value=\"{$tax}\">\n";
	if($return != '') 	echo "<input type=\"hidden\" name=\"return\" value=\"{$return}\">\n";
	if($notify != '') 	echo "<input type=\"hidden\" name=\"notify_url\" value=\"{$notify}\">\n";
	echo "<input type=\"hidden\" name=\"currency_code\" value=\"{$extra[0]}\">\n";
	//echo "<input type=\"image\" src=\"https://www.paypal.com/en_US/i/btn/x-click-but23.gif\" name=\"submit\" alt=\"Make payments with payPal - it's fast, free and secure!\">\n";
	echo '<input type="submit" value="Proceed to Checkout" style="font-size:12px"/>';
	echo "</form>\n";
}

function FMStudio_PayPal_Cart($recordset,$business,$itemNumber,$item,$price,$qty,$tax,$shipping,$invoice,$return,$notify,$sandbox,$extra,$rootPath) {
	$extra = FMStudio_PayPal_parseArgs_varSelector($extra);
	
	$business = htmlentities($business);
	
	$recordset.='_result';
	global $$recordset;
	$result = $$recordset;
	
	
	
	$data = array();
	if(is_a($result, 'FileMaker_Result')) {
		foreach($result->getRecords() as $record) {
			$rec = array();
			if($itemNumber != '') $rec['itemNumber'] = $record->getField($itemNumber);
			if($item != '') $rec['item'] = $record->getField($item);
			if($price != '') $rec['price'] = $record->getField($price);
			if($qty != '') $rec['qty'] = $record->getField($qty);
			if($tax != '') $rec['tax'] = $record->getField($tax);
			$data[] = $rec;
		}
	}else{
		foreach($result['data'] as $record) {
			$rec = array();
			if($itemNumber != '') $rec['itemNumber'] = htmlentities($record[$itemNumber][0]);
			if($item != '') $rec['item'] = htmlentities($record[$item][0]);
			if($price != '') $rec['price'] = htmlentities($record[$price][0]);
			if($qty != '') $rec['qty'] = htmlentities($record[$qty][0]);
			if($tax != '') $rec['tax'] = htmlentities($record[$tax][0]);
			$data[] = $rec;
		}
	}
	

	if($shipping!='') $shipping = htmlentities(sprintf("%01.2f",(float)$shipping));
	
	$itemNumber = htmlentities($itemNumber);
	$item = htmlentities($item);
	$price = htmlentities(sprintf("%01.2f",(float)$price));
	$qty = htmlentities((int)$qty);
	if($tax!='') $tax = htmlentities(sprintf("%01.2f",(float)$tax));
	
	$return = htmlentities($return);
	$notify = htmlentities($notify);
	if($sandbox) {
		echo "<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\">\n";
	}else{
		echo "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">\n";
	}
	echo "<input type=\"hidden\" name=\"cmd\" value=\"_cart\">\n";
	echo "<input type=\"hidden\" name=\"upload\" value=\"1\">\n";
	echo "<input type=\"hidden\" name=\"business\" value=\"{$business}\">\n";
	
	foreach($data as $key=>$record) {
		$key++;
		$price = htmlentities(sprintf("%01.2f",(float)$record['price']));
		$qty = htmlentities((int)$record['qty']);
		if(isset($record['tax']) && $record['tax']!='') $tax = htmlentities(sprintf("%01.2f",(float)$record['tax'])); else $tax = '';
	
		echo "<input type=\"hidden\" name=\"item_name_{$key}\" value=\"{$record['item']}\">\n";
		echo "<input type=\"hidden\" name=\"item_number_{$key}\" value=\"{$record['itemNumber']}\">\n";
		echo "<input type=\"hidden\" name=\"quantity_{$key}\" value=\"{$qty}\">\n";
		echo "<input type=\"hidden\" name=\"amount_{$key}\" value=\"{$price}\">\n";
		if($tax) echo "<input type=\"hidden\" name=\"tax_{$key}\" value=\"{$tax}\">\n";
	}
	
	echo "<input type=\"hidden\" name=\"shipping\" value=\"{$shipping}\">\n";
	if($invoice != '') echo "<input type=\"hidden\" name=\"invoice\" value=\"{$invoice}\">\n";
	if($return != '') 	echo "<input type=\"hidden\" name=\"return\" value=\"{$return}\">\n";
	if($notify != '') 	echo "<input type=\"hidden\" name=\"notify_url\" value=\"{$notify}\">\n";
	echo "<input type=\"hidden\" name=\"currency_code\" value=\"{$extra[0]}\">\n";
	echo "<input type=\"image\" src=\"https://www.paypal.com/en_US/i/logo/PayPal_mark_60x38.gif\" name=\"submit\" alt=\"Make payments with payPal - it's fast, free and secure!\"> Save time. Check out securely. Pay without sharing your financial information.\n";
	echo "</form>\n";
}

function FMStudio_PayPal_Notify($Connection,$Layout,$business,$Invoice,$Status,$Fields,$Values,$script,$sandbox,$rootPath) {
	$vars = array();
	foreach($_POST as $var=>$value) {
		if(get_magic_quotes_gpc()) {
			$vars[$var]  =stripslashes($_POST[$var]);
		}else{
			$vars[$var] = $_POST[$var];
		}
	}
	if(!count($vars)) error_log('No post request was submitted');
	file_put_contents('post.txt',serialize($vars));
	
	// Security checks come first
	if($vars['receiver_email'] != $business) {
		error_log('SECURITY ERROR: RECEIVER EMAILS DO NOT MATCH');
	}

	$vars['cmd'] = '_notify-validate';
	if($sandbox) {
		$vars['notify-validate'] = FMStudio_PayPal_sendPOST("https://www.sandbox.paypal.com/cgi-bin/webscr", $vars);
	}else{
		$vars['notify-validate'] = FMStudio_PayPal_sendPOST("https://www.paypal.com/cgi-bin/webscr", $vars);
	}

	if($vars['notify-validate'] != 'VERIFIED') {
		error_log('VALIDATION FAILED');
	}
	if(is_a($Connection,'FileMaker')) {
		$find = $Connection->newFindCommand($Layout);
		$find->addFindCriterion($Invoice, '=='.fmsEscape($vars['invoice']));
		$result = $find->execute();
		if(FileMaker::isError($result)) error_log('Failed to Find the Invoice');
		
		$record = $result->getFirstRecord();
		$edit = $Connection->newEditCommand($Layout,$record->getRecordId());
		$edit->setField($Status, $vars['payment_status']); 
		$edit->setField($Fields, implode("\r",array_keys($vars)));
		$edit->setField($Values, implode("\r",array_values($vars)));
		if($script != '') $edit->setScript($script);
		$result = $edit->execute();
		if(FileMaker::isError($result)) {
		   error_log('FileMaker Error on Commit');
		}
	}else{
		$find = clone($Connection);
		$find->AddDBParam($Invoice, '=='.fmsEscape($vars['invoice']));
		$result = $find->FMFind();
		if($result['errorCode'] != 0) error_log('Failed to Find the Invoice');
		
		$recid = array_shift(explode('.',key($result['data'])));
		$edit = clone($Connection);
		$edit->AddDBParam('-recid', $recid);
		$edit->AddDBParam($Status, $vars['payment_status']); 
		$edit->AddDBParam($Fields, implode("\r",array_keys($vars)));
		$edit->AddDBParam($Values, implode("\r",array_values($vars)));
		if($script != '') $edit->PerformFMScript($script);
		$result = $edit->FMEdit();
		if($result['errorCode'] != 0) {
		   error_log('FileMaker Error on Commit');
		}
	}
    error_log("GOOD");
}

function FMStudio_PayPal_parseArgs_varSelector($arg) {
	if($arg == '') return array();
	$arg = explode('/;/',$arg);
	foreach($arg as $key=>$value) {
		$arg[$key] = urldecode($value);
	}
	return $arg;
}

function FMStudio_PayPal_sendPOST($url, $vars) {
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
   $params = '';
   foreach($vars as $key=>$value) {
      $value = urlencode($value);
      $params.= $key.'='.$value.'&';
   }
   if($params != '') $params = substr($params,0,-1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
   $ret = curl_exec($ch) or error_log(curl_error($ch));
   return $ret;
}
?>