<?php
  require '../lib/src/setup_healthforms.php';
  
  if(isset($_SESSION))
  {
    simpleAuthentication::logout();
  }
  header('Location: ' . WEB_PATH_HEALTHFORMS);
  exit;
?>