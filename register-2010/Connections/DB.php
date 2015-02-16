<?php
// FMStudio v1.0 - do not remove comment, needed for DreamWeaver support
# FileName="Connection_php_FileMaker.htm"
# Type="FileMaker"
# FileMaker="true"
$path = preg_replace("#^(.*[/\\\\])[^/\\\\]*[/\\\\][^/\\\\]*$#",'\1',__FILE__);
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
require_once('FileMaker.php');
require_once('FileMaker/FMStudio_Tools.php');
$hostname_DB = "23.fmgateway.com";
$database_DB = "2010 database";
$username_DB = "web";
$password_DB = "152HGB346HFSDG";
$DB = new FileMaker($database_DB, $hostname_DB, $username_DB, $password_DB); 
?>