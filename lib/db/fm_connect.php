<?php

  //include the FileMaker PHP API
  require_once(DOCROOT . "/register/FileMaker.php"); // pull from register directory for now
  
  //create the FileMaker Object
  $fm = new FileMaker();
  
  
  //Specify the FileMaker database
  $fm->setProperty('database', 'PDC_Registration');
  
  //Specify the Host
  $fm->setProperty('hostspec', '23.fmgateway.com');

  $fm->setProperty('username', 'web');
  $fm->setProperty('password', '152HGB346HFSDG');
  
  //$dbs = $fm->listDatabases();

?>