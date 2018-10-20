<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.notifications.php';

$logger=Logger::getLogger("controller.page.app.notifications.php");

if(isset($_GET["action"])){ 
  if($_GET["action"]=='NOTIFICATION_APPSERVICE'){
    if(isset($_GET["user_Id"])){
	$user_Id=$_GET["user_Id"];
	$limit_start='0';
	$limit_end='5';
    $notifyObj=new app_notifications();
	$dbObj=new Database();
    $peopleRelationshipRequestDataQuery=$notifyObj->query_getPeopleRelationshipRequests($user_Id,$limit_start,$limit_end);
	$communityMembershipRequestDataQuery=$notifyObj->query_getCommunityMembershipRequests($user_Id, $limit_start, $limit_end);
	$unionNewsFeedRequestDataQuery;
	$bizNewsFeedRequestDataQuery;
	$movementRequestDataQuery;
	$content='{';
	$content.='"playStoreAppVersion":"1.0.9",';
	$content.='"peopleRelationshipRequestData":'.$dbObj->getJSONData($peopleRelationshipRequestDataQuery).',';
	$content.='"communityMembershipRequestData":'.$dbObj->getJSONData($communityMembershipRequestDataQuery).',';
	$content.='"unionNewsFeedRequestData":'.'[]'.',';
	$content.='"bizNewsFeedRequestData":'.'[]'.',';
	$content.='"movementRequestData":'.'[]';
	$content.='}';
	echo $content;
	} else { echo 'MISSING_USERID'; } 
  }
  else if($_GET["action"]=='NOTIFICATION_OVERVIEW'){
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
  else if($_GET["action"]=='NOTIFICATION_COUNT_PEOPLEREQUEST'){
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
	  if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	     $user_Id=$_GET["user_Id"];
		 $limit_start=$_GET["limit_start"];
		 $limit_end=$_GET["limit_end"];
		 $notifyObj=new app_notifications();
		 $dbObj=new Database();
		 $query=$notifyObj->query_getPeopleRelationshipRequests($user_Id,$limit_start,$limit_end);
		 echo $dbObj->getJSONData($query);
	  } else { echo 'MISSING_USERID'; }
  }
  else if($_GET["action"]=='NOTIFICATION_COUNT_COMMUNITYREQUEST'){
     if(isset($_GET["user_Id"])){
	     $user_Id=$_GET["user_Id"];
		 $notifyObj=new app_notifications();
		 $dbObj=new Database();
		 $query=$notifyObj->query_count_getCommunityMembershipRequests($user_Id);
		 $jsonData=$dbObj->getJSONData($query);
		 $dejsonData=json_decode($jsonData);
		 echo $dejsonData[0]->{'totalData'};
	  } else { echo 'MISSING_USERID'; }
  }
} else { echo 'MISSING_ACTION'; }
?>