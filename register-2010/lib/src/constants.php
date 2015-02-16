<?php 


// Initialize the prices and dates
$PDC_Prices = parse_ini_file("/home/peninsul/public_html/register/lib/ini/prices.ini");
//echo "<h1>Prices</h1>";
//print_r($PDC_Prices );

$PDC_Dates = parse_ini_file("/home/peninsul/public_html/register/lib/ini/dates.ini", true);
//echo "<h1>Dates</h1>";
//print_r($PDC_Dates );


// Dates
$todays_date = date("Y-m-d");

$PDC_Today = strtotime($todays_date);
$PDC_RegistrationStartDate = strtotime($PDC_Dates["startDate"]);
$PDC_RegistrationDeadline = strtotime($PDC_Dates["registrationDeadline"]);
$PDC_VolunteerDates= $PDC_Dates["VolunteerDates"];

?> 
