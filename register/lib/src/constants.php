<?php 

// Initialize the prices and dates
$PDC_Prices = parse_ini_file("/home/peninsul/public_html/register/lib/ini/prices.ini");
$PDC_Dates = parse_ini_file("/home/peninsul/public_html/register/lib/ini/dates.ini", true);

// Dates
$PDC_todays_date = date("Y-m-d");

$PDC_Today = strtotime($PDC_todays_date);
$PDC_RegistrationStartDate = strtotime($PDC_Dates["startDate"]);
$PDC_RegistrationDeadline = strtotime($PDC_Dates["registrationDeadline"]);
$PDC_VolunteerDates= $PDC_Dates["VolunteerDates"];

?> 
