<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.search.php';
$logger=Logger::getLogger("controller.page.app.search.php");
if(isset($_GET["action"])){
if($_GET["action"]=='SEARCH_COUNT_USERS'){
 if(isset($_GET["searchKeyword"])){
   $searchQuery=$_GET["searchKeyword"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_count_getSearchedUserList($searchQuery);
   $dbObj=new Database();
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { 
    $content='Missing searchKeyword'; 
 }
}
else if($_GET["action"]=='SEARCH_DATA_USERS'){
  if(isset($_GET["searchKeyword"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_getSearchedUserList($searchQuery,$limit_start,$limit_end);
   $dbObj=new Database();
   echo $dbObj->getJSONData($query);
  } else { 
    $content='Missing ';
	if(!isset($_GET["searchKeyword"])){ $content.='searchKeyword, '; }
	if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,', ');
    echo $content; 
   }
}
else if($_GET["action"]=='SEARCH_COUNT_COMMUNITY'){
 if(isset($_GET["searchKeyword"])){
   $searchQuery=$_GET["searchKeyword"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_count_getSearchedCommunityList($searchQuery);
   $dbObj=new Database();
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { 
    $content='Missing searchKeyword'; 
 }
}
else if($_GET["action"]=='SEARCH_DATA_COMMUNITY'){
  if(isset($_GET["searchKeyword"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_getSearchedCommunityList($searchQuery,$limit_start,$limit_end);
   $dbObj=new Database();
   echo $dbObj->getJSONData($query);
  } else { 
    $content='Missing ';
	if(!isset($_GET["searchKeyword"])){ $content.='searchKeyword, '; }
	if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,', ');
    echo $content; 
   }
}
else if($_GET["action"]=='SEARCH_COUNT_NEWSFEED'){
 if(isset($_GET["searchKeyword"])){
   $searchQuery=$_GET["searchKeyword"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_count_getSearchedNewsFeedList($searchQuery);
   $dbObj=new Database();
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { 
    $content='Missing searchKeyword'; 
 }
}
else if($_GET["action"]=='SEARCH_DATA_NEWSFEED'){
  if(isset($_GET["searchKeyword"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_getSearchedNewsFeedList($searchQuery,$limit_start,$limit_end);
   $dbObj=new Database();
   echo $dbObj->getJSONData($query);
  } else { 
    $content='Missing ';
	if(!isset($_GET["searchKeyword"])){ $content.='searchKeyword, '; }
	if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,', ');
    echo $content; 
   }
}
else if($_GET["action"]=='SEARCH_COUNT_MOVEMENT'){
 if(isset($_GET["searchKeyword"])){
   $searchQuery=$_GET["searchKeyword"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_count_getSearchedMovementList($searchQuery);
   $dbObj=new Database();
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { 
    $content='Missing searchKeyword'; 
 }
}
else if($_GET["action"]=='SEARCH_DATA_MOVEMENT'){
  if(isset($_GET["searchKeyword"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_getSearchedMovementList($searchQuery,$limit_start,$limit_end);
   $dbObj=new Database();
   echo $dbObj->getJSONData($query);
  } else { 
    $content='Missing ';
	if(!isset($_GET["searchKeyword"])){ $content.='searchKeyword, '; }
	if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,', ');
    echo $content; 
   }
}
else { echo 'NO_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION'; }
?>