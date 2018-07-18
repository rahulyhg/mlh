<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.notifications.php';

$logger=Logger::getLogger("controller.module.app.notifications.php");

if(isset($_GET["action"])){ 
  if($_GET["action"]=='SERVICE_GOOGLEADS'){
	$content='{';
    $content.='"googleAds":"ACTIVATE_DEBUG",'; // ACTIVATE_PROD, ACTIVATE_DEBUG, ACTIVATE_NO
	$content.='"debug_Id":"ca-app-pub-3940256099942544/1033173712",';
	$content.='"prod_Id":"ca-app-pub-9032115287615251/7844041725",';
	$content.='"duration_in_seconds":300';
	$content.='}';
	echo $content;
  }
  else if($_GET["action"]=='SERVICE_INTERVALHOUR'){
     if(isset($_GET["user_Id"])){
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
  else if($_GET["action"]=='SERVICE_INTERVALDAY'){ // EveryDay 9 PM
    /* Send Statistics of Union Admin about Users joined for Today */
	
  }
  else if($_GET["action"]=='SERVICE_INTERVALMINUTE'){ // USR924357814934
    if(isset($_GET["user_Id"])){
	  $user_Id=$_GET["user_Id"];
	  $content='[]';
	  if($user_Id!='null'){
	  $limit_start='0';
	  $limit_end='5';
	  $notifyObj=new AppNotifications();
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $query1=$notifyObj->query_notify_usrFrndsReqReciever($user_Id);
	  $query2=$notifyObj->query_notify_onAcceptUserFrndReq($user_Id);
	  $query3=$notifyObj->query_notify_reqLocalBranch($user_Id);
	  $query4=$notifyObj->query_notify_unionMemberReqReciever($user_Id);
	  $query5=$notifyObj->query_notify_onAcceptUnionMemberReq($user_Id);
	  $query6=$notifyObj->query_notify_unionMemberOnRoleChange($user_Id);
	  $query7=$notifyObj->query_notify_unionMemberRolePermissionChange($user_Id);
	  $query8=$notifyObj->query_notify_unionMemberNewsFeedNotification($user_Id);
	  $query9=$notifyObj->query_notify_unionSupporterNewsFeedNotification($user_Id);
	  $query10=$notifyObj->query_notify_movementNotification($user_Id);

	  $sqlArray=array();
	  $sqlArray["usrFrndReqRecieved"]=$query1;
	  $sqlArray["usrFrndReqAccepted"]=$query2;
	  $sqlArray["usrReqUnionLocalBranch"]=$query3;
	  $sqlArray["unionMemReqRecieved"]=$query4;
	  $sqlArray["unionMemReqAccepted"]=$query5;
	  $sqlArray["unionMemOnRoleChange"]=$query6;
	  $sqlArray["unionMemRolePermUpdated"]=$query7;
	  $sqlArray["unionMemNewsFeed"]=$query8;
	  $sqlArray["unionSubscriberNewsFeed"]=$query9;
	  $sqlArray["unionMovements"]=$query10;
	  $content=$dbObj->getBulkJSONData($sqlArray);
	  }
	  echo $content;
	}
	 else {
	    echo 'MISSING_USERID';
	 }
  }
}
?>