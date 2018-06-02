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
  } else if($_GET["action"]=='NOTIFICATION_COUNT_PEOPLEREQUEST'){
     if(isset($_GET["user_Id"])){
	     $user_Id=$_GET["user_Id"];
		 $notifyObj=new app_notifications();
		 $dbObj=new Database();
		 $query=$notifyObj->query_count_getPeopleRelationshipRequests($user_Id);
		 $jsonData=$dbObj->getJSONData($query);
		 $dejsonData=json_decode($jsonData);
		 echo $dejsonData[0]->{'totalData'};
	  } else { echo 'MISSING_USERID'; }
  }
  else if($_GET["action"]=='NOTIFICATION_DATA_PEOPLEREQUEST'){
	  if(isset($_GET["user_Id"])){
	     $user_Id=$_GET["user_Id"];
		 $notifyObj=new app_notifications();
		 $dbObj=new Database();
		 $query=$notifyObj->query_getPeopleRelationshipRequests($user_Id);
		 echo $dbObj->getJSONData($query);
	  } else { echo 'MISSING_USERID'; }
  }
  else if($_GET["action"]=='NOTIFICATION_DELETE_PEOPLEREQUEST'){
	if(isset($_GET["notify_Id"])){
	  $notify_Id=$_GET["notify_Id"];
	  $notifyObj=new app_notifications();
	  $dbObj=new Database();
	  $query=$notifyObj->query_deleteRelationshipRequestNotification($notify_Id);
	  echo $dbObj->addupdateData($query);
	} else { echo 'MISSING_NOTIFYID'; }	 
  }
} else { echo 'MISSING_ACTION'; }
?>