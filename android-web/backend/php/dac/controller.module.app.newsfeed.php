<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.newsfeed.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.newsfeed.php");

if(isset($_GET["action"])){
 if($_GET["action"]==='GET_COUNT_LISTOFUNIONBRANCHCREATENEWSFEED'){ 
  if(isset($_GET["user_Id"])){
    $user_Id = $_GET["user_Id"];
	$newsfeed = new Newsfeed();
	$query = $newsfeed->query_count_listOfUnionBranchesWithCreateNewsFeedPerm($user_Id);
	$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$jsonData = $database->getJSONData($query);
	$dejsonData = json_decode($jsonData);
	echo $dejsonData[0]->{'count(*)'};
  } else { echo 'MISSING_USER_ID'; }
 }
 else if($_GET["action"]==='GET_DATA_LISTOFUNIONBRANCHCREATENEWSFEED'){
  if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
    $user_Id = $_GET["user_Id"];
	$limit_start = $_GET["limit_start"];
	$limit_end = $_GET["limit_end"];
	$newsfeed = new Newsfeed();
	$query = $newsfeed->query_data_listOfUnionBranchesWithCreateNewsFeedPerm($user_Id,$limit_start,$limit_end);
	$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	echo $database->getJSONData($query);
  } else { echo 'MISSING_USER_ID'; }
 }
 else if($_GET["action"]==='GETLIST_COUNT_WRITENEWSFEEDAVAILABLECOMMUNITIES'){
    if(isset($_GET["user_Id"])){
	 $user_Id=$_GET["user_Id"];
     $nfObj=new Newsfeed();
	 $dbObj=new Database();
	 $query=$nfObj->query_count_listOfAvailCommunitiesAndBranchesToWriteNewsFeed($user_Id);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
	}
	else { echo 'MISSING_USERID'; }
   }
 else if($_GET["action"]==='GETLIST_DATA_WRITENEWSFEEDAVAILABLECOMMUNITIES'){
	if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	 $user_Id=$_GET["user_Id"];
	 $limit_start=$_GET["limit_start"];
	 $limit_end=$_GET["limit_end"];
     $nfObj=new Newsfeed();
	 $dbObj=new Database();
	 $query=$nfObj->query_data_listOfAvailCommunitiesAndBranchesToWriteNewsFeed($user_Id,$limit_start,$limit_end);
	 $jsonData=$dbObj->getJSONData($query);
	 echo $jsonData;
	}
	else { 
	 $content='Missing'; 
	 if(!isset($_GET["user_Id"])) { $content.=' user_Id,'; }
	 if(!isset($_GET["limit_start"])) { $content.=' limit_start,'; }
	 if(!isset($_GET["limit_end"])) { $content.=' limit_end,'; }
	 $content=chop($content,',');
	 echo $content;
	}
   }
 else if($_GET["action"]==='WRITE_NEWSFEED'){
     if(isset($_GET["bizUnionId"]) && isset($_GET["unionBranchId"]) && isset($_GET["artTitle"]) && 
	 isset($_GET["artShrtDesc"]) && isset($_GET["artDesc"]) && isset($_GET["createdOn"]) &&
	 isset($_GET["images"]) && isset($_GET["newsFeedType"]) && isset($_GET["displayLevel"]) && 
	 isset($_GET["status"])){
     $identity = new Identity();
	 $info_Id = $identity->newsfeed_info_id();
	 $bizUnionId = $_GET["bizUnionId"];
	 $unionBranchId = $_GET["unionBranchId"];
	 $artTitle = $_GET["artTitle"];
	 $artShrtDesc = $_GET["artShrtDesc"];
	 $artDesc = $_GET["artDesc"];
	 $createdOn = $_GET["createdOn"];
	 $images = $_GET["images"];
	 $newsFeedType = $_GET["newsFeedType"];
	 $displayLevel = $_GET["displayLevel"];
	 $status = $_GET["status"];
     $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $newsfeed=new Newsfeed();
	 $query = $newsfeed->query_writeNewsFeed($info_Id, $bizUnionId, $unionBranchId, $artTitle, $artShrtDesc, $artDesc,
						$createdOn, $images, $newsFeedType, $displayLevel, $status);
	 echo $dbObj->addupdateData($query);
	 } 
	 else { $content='Missing';
	     if(!isset($_GET["bizUnionId"])){ $content.=' bizUnionId,'; }
		 if(!isset($_GET["unionBranchId"])){ $content.=' unionBranchId,'; }
		 if(!isset($_GET["artTitle"])){ $content.=' artTitle,'; } 
		 if(!isset($_GET["artShrtDesc"])){ $content.=' artShrtDesc,'; }
		 if(!isset($_GET["artDesc"])){ $content.=' artDesc,'; }
		 if(!isset($_GET["createdOn"])){ $content.=' createdOn,'; }
	     if(!isset($_GET["images"])){ $content.=' images,'; }
		 if(!isset($_GET["newsFeedType"])){ $content.=' newsFeedType,'; }
		 if(!isset($_GET["displayLevel"])){ $content.=' displayLevel,'; }
		 if(!isset($_GET["status"])){ $content.=' status,'; }
		 $content=chop($content,',');
		 echo $content;
	 }
   }
 else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>