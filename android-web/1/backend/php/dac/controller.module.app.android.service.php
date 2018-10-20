<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.android.service.php';

$logger=Logger::getLogger("controller.module.app.android.service.php");

if(isset($_POST["action"])){ 
  if($_POST["action"]=='SERVICE_USRDUMPFRNDS'){
    if(isset($_POST["user_Id"]) && isset($_POST["phoneNumbersList"])){
	 /*{"data":[{"user_Id":"USR273782437846","username":"geetha","surName":"Nellutla","name":"Geetha Rani ",
	  *          "phoneNumber":"+91|9959633209","minlocation":"L. B. Nagar","location":"Ranga Reddy District",
	  *          "state":"Telangana","country":"India","IsFriend":"NO"},{...}]}
      */
	  $user_Id=$_POST["user_Id"];
	  $phoneNumbers=trim($_POST["phoneNumbersList"]);
	  $phoneNumbers=str_replace("[","",$phoneNumbers);
	  $phoneNumbers=str_replace("]","",$phoneNumbers);
	  $phoneNumbersArray=explode(",",$phoneNumbers);
	  $phoneNumbersArray=array_map('trim',$phoneNumbersArray);

	  $appAndroidService = new AppAndroidService();
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $query=$appAndroidService->query_get_usrFrndsFromContactsData($user_Id, $phoneNumbersArray);
	 // echo $query;
	  $content='{';
	  $content.='"data":'.$dbObj->getJSONData($query);
	  $content.='}';
	  echo $content;
	  
	} 
	else {
	   $content='MISSING ';
	   if(!isset($_POST["user_Id"])){ $content.='user_Id, '; }
	   else if(!isset($_POST["phoneNumbers"])){ $content.='phoneNumbers, '; }
	   $content=chop($content,", ");
	   echo $content;
	}
  }
  else if($_POST["action"]=='SERVICE_GOOGLEADS'){
	$content='{ "googleAds":{';
    $content.='"status":"ACTIVATE_DEBUG",'; // ACTIVATE_PROD, ACTIVATE_DEBUG, ACTIVATE_NO
	$content.='"debug_Id":"ca-app-pub-3940256099942544/1033173712",';
	$content.='"prod_Id":"ca-app-pub-9032115287615251/7844041725",';
	$content.='"prodExeceptionUsers":["USR924357814934","USR273782437846"],';
	$content.='"duration_in_seconds":100';
	$content.='}';
	$content.='}';
	echo $content;
  }
  else if($_POST["action"]=='SERVICE_INTERVALHOUR'){
     if(isset($_POST["user_Id"])){
		$user_Id=$_POST["user_Id"];
		$content='{';
	    $content.='"playStoreAppVersion":"1.0.9"';
		$content.='}';
		echo $content;
	 }
	 else {
	    echo 'MISSING_USERID';
	 }
  }
  else if($_POST["action"]=='SERVICE_INTERVALDAY'){ // EveryDay 9 PM
    /* Send Statistics of Union Admin about Users joined for Today */
	
  }
  else if($_POST["action"]=='SERVICE_INTERVALMINUTE'){ // USR924357814934
    if(isset($_POST["user_Id"]) && isset($_POST["gps_latitude"]) && isset($_POST["gps_longitude"])){
	  $user_Id=$_POST["user_Id"];
	  $gps_latitude=$_POST["gps_latitude"];
	  $gps_longitude=$_POST["gps_longitude"];
	  $content='[]';
	  $limit_start='0';
	  $limit_end='5';
	  $notifyObj=new AppAndroidService();
	  $query=$notifyObj->query_set_userGeoLocation($user_Id, $gps_latitude, $gps_longitude);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $dbObj->addupdateData($query);
	  $query0=$notifyObj->query_cookies_categoriesUpdate();
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

	  // echo $query10;
	  
	  
	  $sqlArray=array();
	  $sqlArray["cookies_CategoryUpdates"]=$query0;
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

	  echo $content;
	  
	}
	 else {
	    echo 'MISSING_USERID';
	 }
  }
  else if($_POST["action"]=='NOTIFIED_FRIENDREQUESTRECEIVED'){
  
  }
}
?>