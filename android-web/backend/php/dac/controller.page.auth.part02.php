<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';

$logger=Logger::getLogger("controller.page.auth.part02.php");

if(isset($_GET["action"])){
  
  
  
} else { echo 'MISSING_ACTION'; }

?>