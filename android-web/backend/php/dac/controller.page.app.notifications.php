<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.notifications.php';

$logger=Logger::getLogger("controller.page.app.notifications.php");

if(isset($_GET["action"])){
  if($_GET["action"]=='NOTIFICATION_OVERVIEW'){
  /* Description: Getting count of Pending Relationship Requests from the table "user_notify",
   *  When notifyType='PEOPLE_RELATIONSHIP_REQUEST' and req_accepted='N'
   */
   if(isset($_GET["user_Id"])){
    $user_Id=$_GET["user_Id"];
    $notifyObj=new app_notifications();
    $dbObj=new Database();
    $query=$notifyObj->query_count_getNotificationOverview($user_Id);
    echo $dbObj->getJSONData($query);
   } else { echo 'MISSING_USERID'; }
  }
} else { echo 'MISSING_ACTION'; }
?>