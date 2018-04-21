<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';

$logger=Logger::getLogger("controller.page.auth.part01.php");

if(isset($_GET["action"])){
 if($_GET["action"]==='UPDATE_USER_PROFILE'){ 
  if(isset($_GET["user_Id"]) && isset($_GET["profile_pic"])){
  $user_Id=$_GET["user_Id"];
  $profile_pic=$_GET["profile_pic"];
  $authObj=new user_authentication();
  $dbObj=new Database();
  $query=$authObj->query_updateProfilePicture($user_Id,$profile_pic);
  echo $dbObj->addupdateData($query);
  }
 }
} else { echo 'MISSING_ACTION'; }
?>