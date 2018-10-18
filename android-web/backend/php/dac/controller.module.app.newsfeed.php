<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.newsfeed.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.newsfeed.php");

if(isset($_GET["action"])){
 if($_GET["action"]==='GET_COUNT_LISTOFUNIONSCREATENEWSFEED'){ 
  if(isset($_GET["user_Id"])){
    $user_Id = $_GET["user_Id"];
	$newsfeed = new Newsfeed();
	$query = $newsfeed->query_count_listOfCommunitiesWhereUserMember($user_Id);
	$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$jsonData = $database->getJSONData($query);
	$dejsonData = json_decode($jsonData);
	echo $dejsonData[0]->{'total_data'};
  } else { echo 'MISSING_USER_ID'; }
 }
 else if($_GET["action"]==='GET_DATA_LISTOFUNIONSCREATENEWSFEED'){
  if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
    $user_Id = $_GET["user_Id"];
	$limit_start = $_GET["limit_start"];
	$limit_end = $_GET["limit_end"];
	$newsfeed = new Newsfeed();
	$query = $newsfeed->query_data_listOfCommunitiesWhereUserMember($user_Id,$limit_start,$limit_end);
	$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	echo $database->getJSONData($query);
  } else { echo 'MISSING_USER_ID'; }
 }
 else if($_GET["action"]==='GET_COUNT_LISTOFBRANCHESCREATENEWSFEED'){
  if(isset($_GET["user_Id"]) && isset($_GET["union_Id"])){
    $user_Id = $_GET["user_Id"];
	$union_Id = $_GET["union_Id"];
	$newsfeed = new Newsfeed();
    $query = $newsfeed->query_count_listOfBranchesWhereUserMember($user_Id,$union_Id);
    $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$jsonData = $database->getJSONData($query);
	$dejsonData = json_decode($jsonData);
	echo $dejsonData[0]->{'total_data'};
  } else { 
    $content='Missing';
	if(!isset($_GET["user_Id"])){ $content.=' user_Id,'; }
	if(!isset($_GET["union_Id"])){ $content.=' union_Id,'; }
	$content=chop($content,',');
	echo $content;
  }
   
 }
 else if($_GET["action"]==='GET_DATA_LISTOFBRANCHESCREATENEWSFEED'){
  if(isset($_GET["user_Id"]) && isset($_GET["union_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
    $user_Id = $_GET["user_Id"];
	$union_Id = $_GET["union_Id"];
	$limit_start = $_GET["limit_start"];
	$limit_end = $_GET["limit_end"];
	$newsfeed = new Newsfeed();
    $query = $newsfeed->query_data_listOfBranchesWhereUserMember($user_Id,$union_Id,$limit_start,$limit_end);
	$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	echo $database->getJSONData($query);
  } else { 
    $content='Missing';
	if(!isset($_GET["user_Id"])){ $content.=' user_Id,'; }
	if(!isset($_GET["union_Id"])){ $content.=' union_Id,'; }
	if(!isset($_GET["limit_start"])){ $content.=' limit_start,'; }
	if(!isset($_GET["limit_end"])){ $content.=' limit_end,'; }
	$content=chop($content,',');
	echo $content;
  }
   
 }
 else if($_GET["action"]==='GET_COUNT_LATESTNEWS'){
 
 }
 else if($_GET["action"]==='GET_DATA_LATESTNEWS'){
 
 }
 else { echo 'NO_ACTION'; }
}
else if(isset($_POST["action"])){
 if($_POST["action"]==='WRITE_NEWSFEED'){
   if(isset($_POST["artTitle"]) && isset($_POST["artShortDesc"]) && isset($_POST["artDesc"]) && 
	 isset($_POST["artImage"]) && isset($_POST["unionBranchPostShare"]) && isset($_POST["user_Id"])){
     $identity = new Identity();
	 $info_Id = $identity->newsfeed_info_id(); // ("'","\'","Hello's world world world!");
	 $artTitle = str_replace("'","\'",$_POST["artTitle"]);
	 $artShrtDesc = str_replace("'","\'",$_POST["artShortDesc"]);
	 $artDesc = str_replace("'","\'",$_POST["artDesc"]);
	 $images = $_POST["artImage"];
	 $mediaURL01 = $_POST["mediaURL01"];
	 $mediaURL02 = $_POST["mediaURL02"];
	 $mediaURL03 = $_POST["mediaURL03"];
	 $unionBranchPostShare = $_POST["unionBranchPostShare"];
	 $status = 'ACTIVE';
	 $writtenBy = $_POST["user_Id"];
	 $newsFeed = new Newsfeed();
	 
	 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $query01 = $newsFeed->query_data_addNewsFeedInfo($info_Id, $artTitle, $artShrtDesc, $artDesc, $images, $mediaURL01, 
						$mediaURL02, $mediaURL03, $status, $writtenBy);
	 echo $query01.' '.$database->addupdateData($query01);
	 
	 print_r($unionBranchPostShare);
	 foreach($unionBranchPostShare as $union_Id => $unionObject) {
	  $branches = $unionObject["branches"];
	  if($branches=='ALL'){
	     $view_members = $unionObject["viewMembers"];
		 $view_subscribers = $unionObject["viewSubscribers"];
		  $approveNewsFeedUnionLevel = $unionObject["approveNewsFeedUnionLevel"];
	     if($approveNewsFeedUnionLevel=='Y'){
		   $ishare_Id = $identity->newsfeed_ishare_id();
	       $branch_Id = 'ALL';
		   $biz_Id = '';
		   $approvedBy = $_POST["user_Id"];
	       $query02 = $newsFeed->query_data_addNewsFeedIShare($ishare_Id, $info_Id, $union_Id, $branch_Id, 
						$view_members, $view_subscribers, $biz_Id, $approvedBy);
		   echo $query02.' '.$database->addupdateData($query02);
		 } else {
		    $rshare_Id = $identity->newsfeed_rshare_id();
			$branch_Id = 'ALL';
		    $biz_Id = '';
			$query02 = $newsFeed->query_data_addNewsFeedRShare($rshare_Id, $info_Id, $union_Id, $branch_Id, 
									$view_members, $view_subscribers, $biz_Id);
			echo $query02.' '.$database->addupdateData($query02);
		 }
	  } else {
	     $branchesInfo = $unionObject["branchesInfo"];
		 for($index=0;$index<count($branchesInfo);$index++){
		   $branch_Id = $branchesInfo[$index]["branch_Id"];
		   $approveNewsFeedBranchLevel = $branchesInfo[$index]["approveNewsFeedBranchLevel"];
		   $view_members = $branchesInfo[$index]["viewMembers"];
		   $view_subscribers = $branchesInfo[$index]["viewSubscribers"];
		   if($approveNewsFeedBranchLevel=='Y'){
		   $ishare_Id = $identity->newsfeed_ishare_id();
	       $branch_Id = 'ALL';
		   $biz_Id = '';
		   $approvedBy = $_POST["user_Id"];
	       $query03 = $newsFeed->query_data_addNewsFeedIShare($ishare_Id, $info_Id, $union_Id, $branch_Id, 
						$view_members, $view_subscribers, $biz_Id, $approvedBy);
		   echo $database->addupdateData($query03);
		 } else {
		    $rshare_Id = $identity->newsfeed_rshare_id();
			$branch_Id = 'ALL';
		    $biz_Id = '';
			$query03 = $newsFeed->query_data_addNewsFeedRShare($rshare_Id, $info_Id, $union_Id, $branch_Id, 
									$view_members, $view_subscribers, $biz_Id);
			echo $database->addupdateData($query03);
		 }
		 }
	  }
	 }
	 } 
	 else { $content='Missing';        
	     if(!isset($_POST["artTitle"])){ $content.=' artTitle,'; }
		 if(!isset($_POST["artShortDesc"])){ $content.=' artShortDesc,'; }
		 if(!isset($_POST["artDesc"])){ $content.=' artDesc,'; } 
		 if(!isset($_POST["artImage"])){ $content.=' artImage,'; }
		 if(!isset($_POST["unionBranchPostShare"])){ $content.=' unionBranchPostShare,'; }
		 if(!isset($_POST["user_Id"])){ $content.=' user_Id,'; }
		 $content=chop($content,',');
		 echo $content;
	 }
   }
}
else { echo 'MISSING_ACTION'; }
?>