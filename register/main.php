<?php

// ini_set ('display_errors', true);

include($_SERVER['DOCUMENT_ROOT'] . "/register/lib/src/api_funcs.php");

// ob_start();
// include($_SERVER['DOCUMENT_ROOT'] . "/lib/src/FirePHPCore/FirePHP.class.php");
// global $firephp;
// $firephp = FirePHP::getInstance(true);

if( !session_id()) session_start();

if (    !isset($_REQUEST['numCampers'])
	&& !isset($_REQUEST['numCampers_NonScouts'])
	&& !isset($_REQUEST['numAides'])
	&& !isset($_REQUEST['numAides_NonScouts'])
	&& !isset($_REQUEST['numTags'])
	&& !isset($_REQUEST['volunteerType'])
)
{
	header("Location:index-2011.php");
	exit();
}
else
{
	$numCampers = $_REQUEST['numCampers'];
	$numCampers_NonScouts = $_REQUEST['numCampers_NonScouts'];
	$numAides = $_REQUEST['numAides'];
	$numAides_NonScouts = $_REQUEST['numAides_NonScouts'];
	$numTags = $_REQUEST['numTags'];
	$volunteerType = $_REQUEST['volunteerType'];
	
	// save the query string in the session for later use - hanzel morato 2012-02-13
	$_SESSION['query_string'] = urlencode($_SERVER['QUERY_STRING']);
}

// Clear out any session data and make sure we're submitting the new stuff.
if ( $_SESSION['registrationData'] )
	unset ($_SESSION['registrationData']);
	// unset ($_SESSION['query_string']);

// functions used on this page
require_once("lib/src/constants.php");
require_once("lib/src/util.php");
require_once("lib/src/prices.php");
require_once("form-parts/main/family.php");
require("Connections/registerDB.php");
require("models/bus_model.php");
include($_SERVER['DOCUMENT_ROOT'] . "/register/models/volunteer_model.php");

require("lib/page/header.php"); 
?>
	<script type="text/javascript" src="/scripts/mustache.js"></script>
	<script type="text/javascript" src="/scripts/volunteer.js"></script>
	<script type="text/javascript" src="/scripts/dates.js"></script>
  <script type="text/javascript" src="/scripts/util.js"></script>
	<script type="text/javascript" charset="utf-8">

	  var femaleGradeOptions = ["","Pre-school", "K"];
		var maleGradeOptions = ["","Pre-school", "K", 1, 2,3,4,5,6,7,8,9];
    var programList = <?php
      $include_where_needed = FALSE;
      
      switch($_GET['volunteerType']){
        case('Volunteer3Day'):
        case('Volunteer5Day'):
        $include_medic = TRUE;
        break;

        case('VolunteerFullTime'):
        $include_medic = FALSE;
        break;
      }
      $js = VolunteerModel::getVolunteerPrograms(true, $include_medic, $include_where_needed); // to_json = true, omit_medic = true, omit_where_needed = true 
      echo $js;
    ?>
			
    $(document).ready(function() {

      // custom form validation rules
      $.validator.addMethod('customphone', function (value, element) {
          return this.optional(element) || /^\d{3}-\d{3}-\d{4}$/.test(value);
        },
        "Please enter a valid phone number in the form xxx-xxx-xxxx"
      );

      // form validation
      $("form.validateme").validate({
        rules: {
          contactAddress: {
            required: true,
          },
          contactCityState: 'required',
          contactZip: {
            required: true,
            minlength: 5,
            maxlength: 5
          },
          contactEmail:{
            required: true,
            email: true
          },
          transportBusStopRequest: 'required',
          camperFirstName: 'required',
          motherFirstName: 'required',
          motherLastName: 'required',
          contactHomePhone: {
            required: true,
            customphone: true
          },
          emergencyName: 'required',
          emergencyPhone: 'required',
          motherWorkPhone: 'customphone',
          motherCellPhone: 'customphone',
          fatherHomePhone: 'customphone',
          fatherWorkPhone: 'customphone',
          fatherCellPhone: 'customphone'
        },
        submitHandler: function(form) {
          
          form.submit();
        },
        invalidHandler: function(event, validator) {
          // 'this' refers to the form
          var errors = validator.numberOfInvalids();
          if (errors) {
            document.body.scrollTop = document.documentElement.scrollTop = 0;
            var message = errors == 1
              ? 'You missed 1 field. It has been highlighted'
              : 'You missed ' + errors + ' fields. They have been highlighted';
            $("div.error span").html(message);
            $("div.error").show();
          } else {
            $("div.error").hide();
          }
        }
      }); // end form validation configuration

      // hide Unit Leader specific questions
      $('.unitLeaderQuestionnaire').hide();
      $('.ageGroupPreference').attr('disabled', true);
      
		  $('.tagalongGender').change(function() {
				// console.log($(this).val());
				var gender = $(this).val();
				var id = $(this).attr('id');
				var id = id.match(/\d+/);
				var options = '';
				if(gender == 'Male'){						
					$.each(maleGradeOptions, function(val, text){
						options += '<option value="' + text + '">' + text + '</option>';
					});
				}

				else if(gender == 'Female'){
					$.each(femaleGradeOptions, function(val, text){
						options += '<option value="' + text + '">' + text + '</option>';
					});
				}// end elseif
				
				var cssId = '#gradeInFall'+'\\[' + id + '\\]';

				$(cssId).html(options);
				$(cssId + ' option:first').attr('selected', 'selected');
			}); // END $('.tagalongGender').change(

      // build the program list selector
      var programTemplate = $('#programListTpl').html();
      var html = Mustache.to_html(programTemplate, programList);
      $('#programListContainer').html(html);

      // build the date selector if user chose a volunteer type that requires it
      var volunteerType = locationQueryString.volunteerType;
      // build date selector when program is selected
      $( "#programList" ).change(function() {
        var programName = $( "#programList option:selected" ).text();
        var selectable = volunteerType == 'VolunteerFullTime' ? false : true;
          volunteer.getDateData(programName, selectable);
      });  

      // bind onchange event to volunteerSuperType options
      volunteer.bindOnChangeToSuperType();
      // volunteer.bindOnChangeWithWithout(); // deprecated 20150210 darren burgess
  	}); // doc ready
		



	</script>

<form action="confirm.php" method="post" class="validateme">

<?php
	global $busHeadcount;
	$busHeadcount = BusModel::getHeadcount();

	$regSummary = drawRegistrationFields( $numCampers, $numCampers_NonScouts, $numAides, $numAides_NonScouts, $volunteerType, $numTags, $cookieCoupons);

	drawPriceSummary($regSummary, $cookieCoupons);
?>

	<div style="margin-top:20px;border-top:1px solid #CCC;text-align:center;padding-top:20px;">
		<input type="submit" value="Continue to the next step" style="font-size:12px"/>
	</div>
</form>


<script type="text/javascript" id="programListTpl" type="text/template">
  <select id="programList" name="volunteerWhereDoYouWantToWork[<?php echo $personNum; ?>]">
    <option value="">--Select a Program--</option>
    {{#programs}}
      <option value="{{name}}">{{name}}</option>
    {{/programs}}
  </select>
</script>
<?php require("lib/page/footer.php"); ?>
<?php // FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
