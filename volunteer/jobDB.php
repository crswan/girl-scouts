<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<pre>

Field Type Null Default Comments 
ID  smallint(6) No   
Name  text No   
Description  text Yes NULL  
NumJobsTotal  smallint(6) No 0  
NumJobsOpen  tinyint(4) No 0  
PostedFor  varchar(8) Yes NULL 



</pre>



<table border="1">
<tr>
  <th>Job ID</th>
  <th>Job Name</th>
  <th>Description</th>
  <th>Jobs left</th>
</tr>

<?php
$db_host = "localhost";
$db_username = "peninsul_web";
$db_password = "941Crane";
$db_name = "peninsul_jobs";

$con = mysql_connect($db_host, $db_username, $db_password);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
  $jobDB = mysql_select_db($db_name);
  if (!$jobDB)
  {
  die('Could not select the database: ' . mysql_error());
  }
  

	$query = "SELECT * FROM `jobs` LIMIT 0, 30 ";
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
          <td><?php echo $result_row["ID"]; ?></td>
          <td><?php echo $result_row["Name"]; ?></td>
          <td><?php echo $result_row["Description"]; ?><br /><i>posted for <?php echo $result_row["PostedFor"]; ?> </td>
          <td><?php echo $result_row["NumJobsOpen"]; ?> jobs left of <?php echo $result_row["NumJobsTotal"]; ?> total jobs</td>
          </tr><?php
          
	  }
  
  //print_r( $result );

// some code

mysql_close($con);


?>

</table>
		  
</body>
</html>