<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/extTemplate.dwt" codeOutsideHTMLIsLocked="false" -->
<!-- DW6 -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->

<title>Training Signup Report</title>

<!-- InstanceEndEditable -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="/css/pdc2.css" />

<!-- InstanceBeginEditable name="head" -->

<style type="text/css">

<!--

.style1 {color: #CCCCCC}

-->

</style>

<!-- InstanceEndEditable -->
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

	<!-- InstanceBeginEditable name="EditRegion4" --><!-- InstanceEndEditable --> <br />

	<!-- InstanceBeginEditable name="MainRegion" --><img src="../images/mm_spacer.gif" alt="" width="305" height="1" border="0" /><br />

<?php
require_once("/home/peninsul/public_html/connections/trainingDB.php");

	$query = "SELECT * 	FROM `signups` ";
	$result = mysql_query($query);
	if (!$result)  die('Could not query the database: ' . mysql_error());
	print_r ($result);
	
	
	/*
  regId               
  classId                
  firstName
  lastName                
  email              
  phone                
  dateRegistered               
  yearsAtCamp               
  comments 
*/
 
 ?>

<table border="1">
<tr>
	<th>Class ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>dateRegistered </th>
	<th>yearsAtCamp</th>
	<th>comments</th>
</tr>
<?php

	//$query = "SELECT * 	FROM `signups` order by `signups`.`classId` ASC LIMIT 0 , 30";
	$query = "SELECT * 	FROM `signups` order by `signups`.`regId` DESC LIMIT 0 , 30";

  //$query = "describe `jobs`";
  $result = mysql_query($query);
  
	if (!$result)
	  {
	  die('Could not query the database: ' . mysql_error());
	  }
	  
	  while ( $result_row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		  
		  //print_r ($result_row);
		  ?>
          <tr>
          <td><?php echo $result_row["classId"]; ?></td>
          <td><?php echo $result_row["firstName"]; ?> <?php echo $result_row["lastName"]; ?></td>
          <td><?php echo $result_row["email"]; ?></td>
          <td><?php echo $result_row["phone"]; ?></td>
          <td><?php echo $result_row["dateRegistered"]; ?></td>
          <td><?php echo $result_row["yearsAtCamp"]; ?></td>
          <td><?php echo $result_row["comments"]; ?></td>
 </tr>
		  <?php
          
	  }

?>

</table>

    </div>	  <!-- jobPanel -->

<!-- InstanceEndEditable --> 
</div>



<div id="footer" align="center">
<ul><li><a href="/contact.shtml">contact us</a></li></ul>
</div>



</body>
<!-- InstanceEnd --></html>
