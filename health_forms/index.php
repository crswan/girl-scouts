<?php
  include '../lib/src/setup_healthforms.php';
  include 'db_models/person.php';
  
  // grab all the people in this family
  $family = Person::getMembersInFamily(array("family_id" => $_SESSION["family_id"]));
  $smarty->assign('family', $family);

  $name = !empty($_SESSION["first_name"]) ? $_SESSION["first_name"] . " " : null;
  $name .= !empty($_SESSION["last_name"]) ? $_SESSION["last_name"]: null;
  $smarty->assign('guardian_name', $name );

  // $firephp->info($family);
  $smarty->display('index.tpl');
?>