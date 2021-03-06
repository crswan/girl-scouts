<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/extTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<!-- DW6 -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->

<title>Volunteer Training</title>

<!-- InstanceEndEditable -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="/css/pdc2.css" />

<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<!-- InstanceParam name="OptionalRegion1" type="boolean" value="true" -->
<meta http-equiv="Description" content="Peninsula Girl Scout Day Camp.  A two-week summer camp for Girl Scouts in beautiful Huddart Park in Woodside, CA">
<meta name="Keywords" content="pdc, peninsula girl scouts, girl scout summer camp, girl scout camp, peninsula day camp">
</head>

<body>

<div id="header">
<table width="100%">
<tr>
<td width="375"><img src="/images/redwoods_Canopy.jpg" alt="Header image" width="375" height="173" border="0" style="float:left" /></td>
<td>
<h1>Peninsula Girl Scout Day Camp</h1>
	<p>Huddart Park, Woodside CA<br />
	July 7-18, 2014<br />
	9am-4pm
	<br />
	  </p>
	<div id="topnav">
	  <ul>
	<li><a href="/">PDC home</a> </li>
	<li><a href="/forms/">Forms</a></li>
	<li><a href="/aides/">Aides</a></li>
	</ul>
	</div>
</td>
</tr>
	
	
	
	
	</table>
</div><!-- header -->



<div id="leftnav">

		
        <h2><a href="/">PDC home</a> </h2>
        <h2>About our camp</h2>
		<ul>
			<li><a href="/about.html" >introduction</a></li>
			<li><a href="/who_can_come.html">who can go to camp?  </a></li>
			<li><a href="/fees.html">fees</a></li>
            <li><a href="/forms/">forms</a></li>
			<li><a href="/registration.html">how to register/refund policy</a></li>
			<li><a href="/transportation.html">transportation</a></li>
			<li><a href="/buses.html">bus schedules</a></li>
			<li><a href="/overnight.html">staying overnight  </a></li>
			<li><a href="/aides/">aides</a></li>
			<li><a href="/wishlist.html">wish list</a></li>			
			<li><a href="/directions.html">driving directions</a></li>
			<li><a href="/contact.shtml">contact us</a></li>
		</ul>
		
<h2>Volunteering</h2>
		  <ul>
		  <li><a href="/volunteer/index.html">why volunteer?</a></li>
          <li><a href="/volunteer/ways_to_volunteer.html">ways to volunteer</a> </li>
          <!--<li><a href="../volunteer/volunteer_registration.html">registering as a volunteer</a></li>-->
          <li><a href="/volunteer/volunteer_screening.html">volunteer screening</a></li>
          <li><a href="/volunteer/training.html">training</a></li>
          <!--<li><a href="/volunteer/jobs.html">at-home jobs </a></li>-->
		</ul>
		<h2>Fun Stuff</h2>
		<ul>
			<li><a href="/camp_names.html">pick your camp name</a> </li>
			<li><a href="/hotDays.html">tips for hot days</a> </li>
		</ul>
	  
		  <hr />
		  <script src="http://gmodules.com/ig/ifr?url=http://www.google.com/coop/api/015128982698996127490/cse/ofg3kye1i5m/gadget&amp;synd=open&amp;w=160&amp;h=75&amp;title=Search+Peninsula+Day+Camp&amp;border=%23ffffff%7C3px%2C1px+solid+%23999999&amp;output=js"></script>

 		</ul>
		

	<!-- InstanceBeginEditable name="LeftNav" -->

	<!-- InstanceEndEditable --> <br />

</div>

<div id="col2">

	<!-- InstanceBeginEditable name="EditRegion4" -->

	<!-- InstanceEndEditable --> <br />

	<!-- InstanceBeginEditable name="MainRegion" --><img src="../images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />

    
  <script language="javascript">



function toggle(obj) {

	var el = document.getElementById(obj);

	if ( el.style.display != 'none' ) {

		el.style.display = 'none';

	}

	else {

		el.style.display = '';

	}

}

// toggle("leftnav");

</script>

    <h1>  Training Sign-Up for Adult At-Camp Volunteers </h1>
<!--<p><em>Watch this space for the 2012 schedule and signup form.</em></p>-->
  <div id="WENDY">
  <blockquote style="margin-bottom: 0in">
    
    <?php

function print_course($name, $class)
{
	?>
    
    
    <tr>
      <th><?php echo $name ?> </th>
      <th colspan="6" style="text-align:left"><?php echo $class["classDescription"] ?> (<?php echo $class["length"] ?>)
        <?php 
		if (count($class["classID"]) > 1)
		{
		?>
        <br />(Please select only <STRONG>ONE</STRONG> of the following <?php echo count($class["classID"]); ?>  choices.)
        <?php
		}
		?>
        
        
        </th>
      </tr>
    
    <?php 
	for ($j = 0; $j < count($class["classID"]); $j++)
	{
	if (  0 && $j > 0 ) {
		?>
    <tr>
      <td colspan="6">OR</td>
      </tr>
    <?php
	}
	echo "";
	print_session(
		$class["classID"][$j], 
		$class["date"][$j],
		$class["day"][$j],
		$class["time"][$j],
		$class["place"][$j]
		);

	} 
}

function print_session($id, $date, $day, $time, $place)
{	
?>
    <tr>
      
      <td><input type="checkbox" name="trainingClasses[]" value="<?php echo  $id; ?>"  /> 
        <?php echo  $id; ?></td>
      <td><?php echo $date; ?></td> 
      <td><?php echo $time; ?></td> 
      <td><?php echo $place; ?></td> 
      </tr>
    <?php
}
?>
    
    
    <p><em><strong>Note:</strong> This page is for adult volunteers only. Aides will receive their training information from the Aide Advisor and should not sign up here.</em></p>
    
    <!-- WENDY SAYS: to turn the form back on, get rid of the "display:none" stuff below -->
    
    <div>
      </div>
    
    <h2>Please select from the courses below, according to the following requirements:</h2>
    <ul>
      <li>First year staff (at our camp) - must attend PDC 1, 4, and either 2 or 3 depending on your job at camp. </li>								
      <li>Second year (or more) staff (at our camp) - must attend either PDC 2 or 3 depending on your job at camp. </li>			
      </ul>	
    
    <form action="http://www.peninsuladaycamp.org/cgi-bin/cgiemail/cgiemail/training.txt" method="post"> 
      </form>
    
    <form action="training_confirm_test.php" method="post" >
      
      <?php
$trainingSchedule= parse_ini_file("/home/peninsul/public_html/register/lib/ini/trainingSchedule.ini", true);
?>
      <table border="1">
        <?php
    print_course("PDC1", $trainingSchedule["PDC1"]);
	print_course("PDC2", $trainingSchedule["PDC2"]);
	print_course("PDC3", $trainingSchedule["PDC3"]);
	print_course("PDC4", $trainingSchedule["PDC4"]);
	/*print_course("PDC5", $trainingSchedule["PDC5"]);
	print_course("PDC6", $trainingSchedule["PDC6"]);*/
	?>
        </table>
      
      <h2>Enter your information below:</h2>
      
      <table>
        <tr>
          <td><input type="text" name="firstName" value="" /><br />First Name</td>
          <td><input type="text" name="lastName" value="" /><br />Last Name</td>
          </tr>
        <tr>
          <td colspan="2"><input type="text" name="email" value="your email" /><br />Email Address</td>
          <td></td>
          </tr>
        <tr>
          <td colspan="2"><input type="text" name="phone" value="650-555-5555" /><br />Phone Number</td>
          <td></td>
          </tr>
        <tr>
          <td colspan="2">Have you previously attended Peninsula Day Camp as a Staff member?<br />(If yes, list previous years)<br /><input type="text" name="yearsAtCamp" size="70" value="" /></td>
          <td></td>
          </tr>
        
        <tr>
          <td colspan="2">Notes to training registrar:<br /><input type="text" name="comments" value="" size="70" /></td>
          <td></td>
          </tr>
        </table>
      
      
      <input type="submit" value="Sign Me Up!">
      <input type="reset" value="Reset">
      </p>
      
      </form>
    
    
  </blockquote>
      
  </blockquote>
  </div>



  <!-- InstanceEndEditable --> 
</div>



<div id="footer" align="center">
<ul><li><a href="/contact.shtml">contact us</a></li></ul>
</div>



</body>
<!-- InstanceEnd --></html>
