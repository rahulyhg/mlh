<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';


$logger=Logger::getLogger("controller.page.auth.part01.php");

if(isset($_GET["action"])){
  
  

} else { echo 'MISSING_ACTION'; }
?>