<?php require_once('../Connections/DB.php'); ?>
<?php require_once('../PayPal_Module/paypal.php'); ?>
<?php
ini_set('log_errors','on');
ini_set('display_errors','off');
ini_set('error_log',dirname(__FILE__)."/error_log.log");
error_reporting(E_ALL^E_NOTICE);
//FMStudio_PayPal_Notify($DB,"cgi_web-registrations","cooolg_1260299659_biz@hotmail.com","zz_webRegId","paypalStatus","paypalNames","paypalVars","ProcessPayment",true,"../"); 
FMStudio_PayPal_Notify($DB,"cgi_web-registrations","businesspgsdc@yahoo.com","zz_webRegId","paypalStatus","paypalNames","paypalVars","ProcessPayment",false,"../"); 

// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support ?>
