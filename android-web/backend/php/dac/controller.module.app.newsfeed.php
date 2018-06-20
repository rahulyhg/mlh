<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.newsfeed.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.newsfeed.php");

if(isset($_GET["action"])){
   if($_GET["action"]==='GETLIST_COUNT_WRITENEWSFEEDAVAILABLECOMMUNITIES'){
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
     
	 // $nfObj=new Newsfeed();
	 // $nfObj->query_writeNewsFeed($info_Id, $bizUnionId, $unionBranchId, $artTitle, $artShrtDesc, $artDesc,
	 //					$createdOn, $images, $newsFeedType, $displayLevel, $status);
   }
   else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>