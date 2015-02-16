<?php
$db_host = "localhost";
$db_username = "peninsul_web";
$db_password = "941Crane";
$db_name = "peninsul_training";

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
  
?>


