<?php
if( !session_id()) session_start();
if( !isset($_REQUEST['type']) || !in_array($_REQUEST['type'],array("Camper","Aide","Adult")) ){
	header("Location:index.php");
	exit();
} else {
	$type = $_REQUEST['type'];
}
if( isset($_POST['postback']) ){
	$main_record = $_POST;
	$tags = array();
	unset($main_record['postback']);
	if( isset($main_record['volunteerDates']) && is_array($main_record['volunteerDates']) ){
		$main_record['volunteerDates'] = implode(", ",$main_record['volunteerDates']);
	}
	foreach($main_record as $field=>$value){
		if(is_array($value)){
			unset($main_record[$field]);
			foreach($value as $pos=>$fieldValue){
				$tags[$pos][substr($field,4)]  = $fieldValue;
			}
		}
	}
	//CREATE RECORD... ASSUME DATA IS VALID
	require("Connections/DB.php");
	$add_cmd = $DB->newAddCommand('cgi_Web-Registrations',$main_record);
	$add_result = $add_cmd->execute();
	if( !FileMaker::isError($add_result) ){
		$_SESSION['recid'] = $add_result->getFirstRecord()->getRecordId();
		$record = $add_result->getFirstRecord();	
		foreach($tags as $tag){
			$relrec = $record->newRelatedRecord('Web Registrations_Tags');
			foreach($tag as $field=>$value) $relrec->setField("Web Registrations_Tags::{$field}",$value);
			$relrec->commit();
		}
		header("Location: payment.php");
		exit();
	} else {
		$error = $add_result->getMessage();
	}
}
require("lib/page/header.php"); 
?>
<script type="text/javascript">
$(function(){
	<?php foreach((array)$main_record as $fieldName=>$value){ ?>
	$("[name=<?php echo $fieldName;?>]").val('<?php echo $value; ?>');
	<?php } ?>
	$("#otherRegisteredGirlScout").change(function(){
		if( $(this).val() == "No" || $(this).val() == " " ) $("#otherRegisteredGirlScoutTroop").val("n/a");
		else $("#otherRegisteredGirlScoutTroop").val("");
	});
});
</script>
<form action="main.php" method="post" class="validateme">
	<input type="hidden" name="postback" value="1"/>
	<input type="hidden" name="type" value="<?php echo $_REQUEST['type']; ?>"/>
	<div class="instructions">
		<p>You are filling out an application for <b><?php echo ucwords(strtolower($_REQUEST['type'])); ?></b>. If you would like to change your application type at any time, please <a href="index.php">click here</a>.</p>
		<p>Once you have completed this form, please click &quot;Proceed to Payment&quot;. Please note that you will not be able to return to this screen so ensure that you have entered all details correctly before continuing.</p>
	</div>
	<?php 
	if( $type == "Camper" ) require("form-parts/main/camper.php");
	elseif( $type == "Aide" ) require("form-parts/main/aide.php");
	elseif( $type == "Adult" ) require("form-parts/main/adult.php");
	?>
	<div style="margin-top:20px;border-top:1px solid #CCC;text-align:center;padding-top:20px;">
		<input type="submit" value="Continue" style="font-size:12px"/>
	</div>
</form>
<?php require("lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>