<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.notifications.php';

$logger=Logger::getLogger("controller.module.app.notifications.php");

if(isset($_GET["action"])){ 
  if($_GET["action"]=='SERVICE_INTERVALHOUR'){
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
  else if($_GET["action"]=='SERVICE_INTERVALDAY'){
    
  }
  else if($_GET["action"]=='SERVICE_INTERVALMINUTE'){
    if(isset($_GET["user_Id"])){
	  $user_Id=$_GET["user_Id"];
	  $limit_start='0';
	  $limit_end='5';
	  $notifyObj=new app_notifications();
	  $dbObj=new Database();
	  $peopleRelationshipRequestDataQuery=$notifyObj->query_getPeopleRelationshipRequests($user_Id,$limit_start,$limit_end);
	  $communityMembershipRequestDataQuery=$notifyObj->query_getCommunityMembershipRequests($user_Id, $limit_start, $limit_end);
      $content='{';
	  $content.='"peopleRelationship":'.$dbObj->getJSONData($peopleRelationshipRequestDataQuery).',';
	  $content.='"communityMembership":'.$dbObj->getJSONData($communityMembershipRequestDataQuery).',';
	  $content.='"unionNewsFeed":[],';
	  $content.='"bizNewsFeed":[],';
	  $content.='"movements":'.'[]';
	  $content.='}';
	  echo $content;
	}
	 else {
	    echo 'MISSING_USERID';
	 }
  }
}
?>