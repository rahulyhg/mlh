<?php
include_once '../api/app.initiator.php';
include_once '../api/app.database.php';
include_once '../dal/data.module.app.notifications.php';

/* This is the Service called by Android Device. 
 * 
 */
if(isset($_GET["action"])){
  if($_GET["action"]=='LATEST_NOTIFICATION_SERVICE'){
  /* Checks Notifications Exists for Every Minute for a Current User
   * { "latest_notify":[{"notify_Id":"","user_Id":"","from_Id":"","notifyHeader":"","notifyTitle":"",
   * "notifyMsg":"","notifyType":"","notifyURL":"","notify_ts":"","watched":"","popup":"",
   * "req_accepted":"","cal_event":""}]}
   */
   if(isset($_GET["user_Id"])){
     $user_Id=$_GET["user_Id"];
     $notifyObj=new app_notifications();
     $query1=$notifyObj->query_getLatestNotification($user_Id);
	 $dbObj=new Database();
	 $jsonData=$dbObj->getJSONData($query1);
	 $dejsonData=json_decode($jsonData);
	 $notify_Id=$dejsonData[0]->{'notify_Id'};
	 $query2=$notifyObj->query_setNotificationPopup($notify_Id);
	 // echo $dbObj->addupdateData($query2);
	 echo '{"latest_notify":'.$jsonData.'}';
   } else { echo 'MISSING_USER_ID'; }
  } 
  else if($_GET["action"]=='UNWATCHED_NOTIFICATION_SERVICE'){
  /* Checks Notifications Exists for Every 1 Hours for a Current User 
   * { "unwatched_notify":[{"notify_Id":"","user_Id":"","from_Id":"","notifyHeader":"","notifyTitle":"",
   * "notifyMsg":"","notifyType":"","notifyURL":"","notify_ts":"","watched":"","popup":"",
   * "req_accepted":"","cal_event":""}]}
   */
    if(isset($_GET["user_Id"])){
      $user_Id=$_GET["user_Id"];
      $notifyObj=new app_notifications();
      $query=$notifyObj->query_getLatestUnWatchedNotification($user_Id);
	  $dbObj=new Database();
	  echo '{"unwatched_notify":'.$dbObj->getJSONData($query).'}';
   } else { echo 'MISSING_USER_ID'; }
  }  
  else if($_GET["action"]=='MAKE_NOTIFICATION_WATCHED'){
  /* Set Notification Watched */
    if(isset($_GET["notify_Id"])){
	  $notify_Id=$_GET["notify_Id"];
	  $notifyObj=new app_notifications();
	  $query=$notifyObj->query_setNotificationWatched($notify_Id);
	  $dbObj=new Database();
	  echo $dbObj->addupdateData($query);
	} else { echo 'MISSING_USER_ID'; }
  }
  else if($_GET["action"]=='MAKE_NOTIFICATION_POPUP'){
  /* Set Notification Watched */
    if(isset($_GET["notify_Id"])){
	  $notify_Id=$_GET["notify_Id"];
	  $notifyObj=new app_notifications();
	  $query=$notifyObj->query_setNotificationPopup($notify_Id);
	  $dbObj=new Database();
	  echo $dbObj->addupdateData($query);
	} else { echo 'MISSING_USER_ID'; }
  }
  else { echo 'NO_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION_INPUT'; }
?>