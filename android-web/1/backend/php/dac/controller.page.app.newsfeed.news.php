<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.newsfeed.php';
require_once '../lal/logic.appIdentity.php';
require_once '../lal/logic.dom.php';
$logger=Logger::getLogger("controller.page.app.newsfeed.news.php");

if(isset($_GET["action"])){
 if($_GET["action"]=='ADD_NEWSFEED_TO_USRVIEWED'){
  if(isset($_GET["info_Id"]) && isset($_GET["user_Id"]) && isset($_GET["newsType"])){
  $idObj=new identity();
  $newsfeedObj=new app_newsfeed();
  $dbObj=new Database();
  
  $view_Id=$idObj->dash_info_user_views_id();
  $info_Id=$_GET["info_Id"];
  $user_Id=$_GET["user_Id"];
  $newsType=$_GET["newsType"];
  
  $query=$newsfeedObj->query_add_user_As_Viewed($view_Id, $info_Id, $user_Id, $newsType);
  echo $dbObj->addupdateData($query);
  
  } else {
	$content='MISSING ';
	if(!isset($_GET["info_Id"])){ $content.='info_Id, '; }
	if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
	if(!isset($_GET["newsType"])){ $content.='newsType, '; }
	$content=chop($content,", ");
	echo $content;
  }
 } 
 else if($_GET["action"]=='VIEW_ARTICLE') { 
	if(isset($_GET["newsType"])) {
	  if(isset($_GET["info_Id"])) {
		$newsType=$_GET["newsType"];
		$info_Id=$_GET["info_Id"];
		$newsObj=new app_newsfeed();
		$dbObj=new Database();
		if($newsType=='UNION'){
		   $unionQuery=$newsObj->query_view_union_article($info_Id);
		   echo $dbObj->getJSONData($unionQuery);
		} else {
		   $bizQuery=$newsObj->query_view_biz_article($info_Id);
		   echo $dbObj->getJSONData($bizQuery);
		}
	  } else { echo 'MISSING_INFO_ID'; } 
   } else { echo 'MISSING_NEWSTYPE'; }	  
 }
 else if($_GET["action"]=='NEWSFEED_READ_PEOPLEVIEWSINFOCOUNT'){
	  if(isset($_GET["info_Id"])){
		$info_Id=$_GET["info_Id"];
		$dbObj=new Database();
		$nfObj=new app_newsfeed();
		$query=$nfObj->query_count_newsFeed_getListOfPeopleViewedNews($info_Id);
		$jsonData=$dbObj->getJSONData($query);
		$dejsonData=json_decode($jsonData);
		if(count($dejsonData)>0) {
		 echo $dejsonData[0]->{'ViewPeopleCount'};
		}
	  } else { echo 'MISSING_INFO_ID'; }
	}
 else if($_GET["action"]=='NEWSFEED_READ_PEOPLEVIEWSINFO'){
	   if(isset($_GET["info_Id"])){
	     if(isset($_GET["limit_start"])){ 
		   if(isset($_GET["limit_end"])){
			  $limit_start=$_GET["limit_start"];
			  $limit_end=$_GET["limit_end"];
			  $viewedPeople=array();
			  $info_Id=$_GET["info_Id"];
			  $dbObj=new Database();
			  $nfObj=new app_newsfeed();
			  $query=$nfObj->query_newsFeed_getListOfPeopleViewedNews($info_Id,$limit_start,$limit_end);
			  echo $dbObj->getJSONData($query);
		   } else { echo 'MISSING_LIMIT_END'; }
		 } else { echo 'MISSING_LIMIT_START'; }
	   } else {
	       echo 'MISSING_INFO_ID';
	   }
	}	
 else {
	 echo 'NO_ACTION_INPUT';
 }
} else { echo 'MISSING_ACTION'; }

?>