<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.notifications.php';

$logger=Logger::getLogger("controller.module.app.notifications.php");

if(isset($_GET["action"])){ 
  if($_GET["action"]=='NOTIFICATION_APPSERVICE'){
     if(isset($_GET["user_Id"])){
	    $notifyObj=new app_notifications();
		$dbObj=new Database();
		
	    $user_Id=$_GET["user_Id"];
		$content='{';
	    $content.='"playStoreAppVersion":"1.0.9"';
		$content.='}';
		echo $content;
	 }
	 else {
	    echo 'MISSING_USERID';
	 }
  }
}
?>