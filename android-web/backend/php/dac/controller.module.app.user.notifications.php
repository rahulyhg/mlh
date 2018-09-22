<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.notifications.php';

$logger=Logger::getLogger("controller.module.app.user.notifications.php");
if(isset($_GET["action"])){
  if($_GET["action"]=='NOTIFY_FRIENDREQUESTRECEIVED'){
    if(isset($_GET["req_Id"])){
	  $req_Id=$_GET["req_Id"];
      $usrNotifyObj=new UserNotifications();
	  $query=$usrNotifyObj->query_notified_friendRequestReceived($req_Id);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->addupdateData($query);
	}
	else { echo 'MISSING_REQUEST ID'; }
  } else if($_GET["action"]=='NOTIFY_FRIENDREQUESTACCEPTED'){
     if(isset($_GET["rel_Id"])){
	   $rel_Id=$_GET["rel_Id"];
	   $usrNotifyObj=new UserNotifications();
	   $query=$usrNotifyObj->query_notified_friendRequestAccepted($rel_Id);
	   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	   echo $dbObj->addupdateData($query);
	 }
	 else { echo 'MISSING_REQUEST ID'; }
  }
}
?>