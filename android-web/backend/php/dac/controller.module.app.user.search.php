<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.search.php';
require_once '../dal/data.module.app.user.friends.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.user.search.php");

if(isset($_GET["action"])){
if($_GET["action"]=='SEARCH_COUNT_USERS'){
 if(isset($_GET["searchKeyword"]) && isset($_GET["user_Id"])){
   $user_Id=$_GET["user_Id"];
   $searchQuery=$_GET["searchKeyword"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_count_getSearchedUserList($user_Id,$searchQuery);
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'totalData'};
 } else { 
	$content='Missing';
    if(!isset($_GET["searchKeyword"])){ $content.=' searchKeyword,'; }
    if(!isset($_GET["user_Id"])){ $content.=' user_Id,'; }
	$content=chop($content,',');
	echo $content;
 }
}
else if($_GET["action"]=='SEARCH_DATA_USERS'){
  if(isset($_GET["searchKeyword"]) && isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $user_Id=$_GET["user_Id"];
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_getSearchedUserList($user_Id,$searchQuery,$limit_start,$limit_end);
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   echo $dbObj->getJSONData($query);
  } else { 
    $content='Missing ';
	if(!isset($_GET["searchKeyword"])){ $content.='searchKeyword, '; }
	if(!isset($_GET["user_Id"])){ $content.=' user_Id,'; }
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
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { 
    $content='Missing searchKeyword'; 
 }
}
else if($_GET["action"]=='SEARCH_DATA_COMMUNITY'){
  if(isset($_GET["projectURL"]) && isset($_GET["lang"]) && isset($_GET["user_Id"]) && 
    isset($_GET["searchKeyword"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $projectURL=$_GET["projectURL"];
   $lang=$_GET["lang"];
   $user_Id=$_GET["user_Id"];
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_getSearchedCommunityList($searchQuery,$limit_start,$limit_end);
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $domObj=new module_dom();
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   $content='[';
   if(count($dejsonData)>0){
     for($index=0;$index<count($dejsonData);$index++){
	   $param_union_Id=$dejsonData[$index]->{'union_Id'};
	   $param_domain_Id=$dejsonData[$index]->{'domain_Id'};
	   $param_domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$param_domain_Id);
	   $param_subdomain_Id=$dejsonData[$index]->{'subdomain_Id'};
	   $param_subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$param_domain_Id,$param_subdomain_Id);
	   $param_unionName=$dejsonData[$index]->{'unionName'};
	   $param_unionURLName=$dejsonData[$index]->{'unionURLName'};
	   $param_profile_pic=$dejsonData[$index]->{'profile_pic'};
	   $param_minlocation=$dejsonData[$index]->{'minlocation'};
	   $param_location=$dejsonData[$index]->{'location'};
	   $param_state=$dejsonData[$index]->{'state'};
	   $param_country=$dejsonData[$index]->{'country'};
	   $param_created_On=$dejsonData[$index]->{'created_On'};
	   
	   $content.='{';
	   $content.='"union_Id":"'.$param_union_Id.'",';
	   $content.='"domainName":"'.$param_domainName.'",';
	   $content.='"subdomainName":"'.$param_subdomainName.'",';
	   $content.='"unionName":"'.$param_unionName.'",';
	   $content.='"unionURLName":"'.$param_unionURLName.'",';
	   $content.='"profile_pic":"'.$param_profile_pic.'",';
	   $content.='"minlocation":"'.$param_minlocation.'",';
	   $content.='"location":"'.$param_location.'",';
	   $content.='"state":"'.$param_state.'",';
	   $content.='"country":"'.$param_country.'",';
	   $content.='"created_On":"'.$param_created_On.'"';
	   $content.='},';
	 }
   }
   $content=chop($content,',');
   $content.=']';
   echo $content;
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
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { 
    $content='Missing searchKeyword'; 
 }
}
else if($_GET["action"]=='SEARCH_DATA_NEWSFEED'){
  if(isset($_GET["projectURL"]) && isset($_GET["lang"]) && isset($_GET["user_Id"]) && isset($_GET["searchKeyword"]) 
  && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
   $projectURL=$_GET["projectURL"];
   $lang=$_GET["lang"];
   $user_Id=$_GET["user_Id"];
   $searchQuery=$_GET["searchKeyword"];
   $limit_start=$_GET["limit_start"];
   $limit_end=$_GET["limit_end"];
   
   $appSearchObj=new app_Search();
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $domObj=new module_dom();
   
   $query=$appSearchObj->query_getSearchedNewsFeedList($searchQuery,$limit_start,$limit_end);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   
   $content='[';
   if(count($dejsonData)>0){
     for($index=0;$index<count($dejsonData);$index++){
	   $param_unionId=$dejsonData[$index]->{'union_Id'};
	   $param_domain_Id=$dejsonData[$index]->{'domain_Id'};
	   $param_subdomain_Id=$dejsonData[$index]->{'subdomain_Id'};
	   $param_domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$param_domain_Id);
	   $param_subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$param_domain_Id,$param_subdomain_Id);
	   $param_unionName=$dejsonData[$index]->{'unionName'};
	   $param_infoId=$dejsonData[$index]->{'info_Id'};
	   $param_artTitle=$dejsonData[$index]->{'artTitle'};
	   $param_artShrtDesc=$dejsonData[$index]->{'artShrtDesc'};
	   $param_artDesc=$dejsonData[$index]->{'artDesc'};
	   $param_createdOn=$dejsonData[$index]->{'createdOn'};
	   $param_images=$dejsonData[$index]->{'images'};
	   $param_status=$dejsonData[$index]->{'status'};
	   $param_newsType='UNION';

	   $content.='{';
	   $content.='"union_Id":"'.$param_unionId.'",';
	   $content.='"domainName":"'.$param_domainName.'",';
	   $content.='"subdomainName":"'.$param_subdomainName.'",';
	   $content.='"unionName":"'.$param_unionName.'",';
	   $content.='"info_Id":"'.$param_infoId.'",';
	   $content.='"artTitle":"'.$param_artTitle.'",';
	   $content.='"artShrtDesc":"'.$param_artShrtDesc.'",';
	   $content.='"artDesc":"'.$param_artDesc.'",';
	   $content.='"createdOn":"'.$param_createdOn.'",';
	   $content.='"images":"'.$param_images.'",';
	   $content.='"status":"'.$param_status.'",';
	   $content.='"newsType":"'.$param_newsType.'"';   
	   $content.='},';
	  
	 }
	 $content=chop($content,',');
	 $content.=']';
	 
	 echo $content;
   }
  } else { 
    $content='Missing ';
	if(!isset($_GET["searchKeyword"])){ $content.='searchKeyword, '; }
	if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	if(!isset($_GET["projectURL"])){ $content.='projectURL, '; }
	if(!isset($_GET["lang"])){ $content.='lang, '; }
	if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
	$content=chop($content,', ');
    echo $content; 
   }
}
else if($_GET["action"]=='SEARCH_COUNT_MOVEMENT'){
 if(isset($_GET["searchKeyword"])){
   $searchQuery=$_GET["searchKeyword"];
   $appSearchObj=new app_Search();
   $query=$appSearchObj->query_count_getSearchedMovementList($searchQuery);
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'totalData'};
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
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
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
else if($_GET["action"]=="SEND_USERFRND_REQUESTS") {
	   if(isset($_GET["projectURL"]) && isset($_GET["from_user_Id"]) && isset($_GET["to_user_Id"])){
	         $projectURL=$_GET["projectURL"];
	         $idObj=new identity();
			 $req_Id=$idObj->user_frnds_req_id();
			 $from_userId=$_GET["from_user_Id"];
			 $to_userId=$_GET["to_user_Id"];
			 $usr_frm_call_to='My LocalHook Friend';
			 $notify_Id=$idObj->user_notify_id();
			 $notifyHeader="";
			 $notifyTitle="";
			 $notifyMsg="";
			 $notifyType="PEOPLE_RELATIONSHIP_REQUEST";
			 $notifyURL=$projectURL."app/user/".$from_userId; // notifyURL is to be added
			 $notify_ts=date("Y-m-d H:i:s");
			 $watched="N";
			 $popup="N";
			 $req_accepted="N";
			 $cal_event="N";
			 $userObj=new user_friends();
			 $notifyObj=new app_notifications();
			 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
			 $insertQuery=$userObj->query_sendUserFrndRequests($req_Id,$from_userId,$to_userId,$usr_frm_call_to);
			 $notifyQuery=$notifyObj->query_addNotify_sendFriendRequest($notify_Id,$to_userId,$from_userId,
			                   $notifyHeader,$notifyTitle,$notifyMsg,$notifyType,$notifyURL,$notify_ts,
							   $watched,$popup,$req_accepted,$cal_event);
			 echo $dbObj->addupdateData($insertQuery);
			 echo $dbObj->addupdateData($notifyQuery);
		} else {
		    $content='Missing ';
			if(!isset($_GET["from_user_Id"])){ $content='from_user_Id, '; }
			if(!isset($_GET["to_user_Id"])){ $content='to_user_Id, '; }
			$content=chop($content,', ');
		    echo $content;
		  }
	} 
else if($_GET["action"]=='ACCEPT_FRNDREQUEST_TO_ME'){ 
  if(isset($_GET["requestFrom"]) && isset($_GET["user_Id"])){
	$idObj=new identity();
    $reqObj=new user_friends();
    $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$notifyObj=new app_notifications();
    $from_userId=$_GET["requestFrom"];
    $to_userId=$_GET["user_Id"];
    $rel_Id=$idObj->user_frnds_id();
		 $rel_from=date("Y-m-d H:i:s");
		 $rel_tz='Asia/Kolkata';
		 $frnd1_call_frnd2='My LocalHook Friend';
		 $frnd2_call_frnd1='My LocalHook Friend';
		 
		 /* Add row in user_frnds */
		 $addQuery=$reqObj->query_addUserFrnds($rel_Id, $rel_from,$rel_tz, $from_userId, $to_userId, $frnd1_call_frnd2, $frnd2_call_frnd1);
		 echo $dbObj->addupdateData($addQuery);
		 /* Delete row in user_frnds_req */
		 $deleteQuery=$reqObj->query_deleteFrndRequestToMe($from_userId,$to_userId);
		 echo $dbObj->addupdateData($deleteQuery);
		 /* Delete Notification */
		 $notifyQuery=$notifyObj->query_deleteNotify_acceptDeleteRequest($to_userId,$from_userId);
		 echo $dbObj->addupdateData($notifyQuery);
	  } else {
	     echo 'MISSING_REQUEST_FROM_USER_ID';
	  }
   }
else if($_GET["action"]=='DELETE_A_REQUEST_SENT'){
		if(isset($_GET["from_userId"]) && isset($_GET["to_userId"])){  
		 $from_userId=$_GET["from_userId"];
		 $to_userId=$_GET["to_userId"];
	     $reqObj=new user_friends();
		 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		 /* Delete row in user_frnds_req */
		 $deleteQuery=$reqObj->query_deleteFrndRequestToMe($from_userId,$to_userId);
		 echo $dbObj->addupdateData($deleteQuery);
		 /* Delete Notification */
		 $notifyQuery=$notifyObj->query_deleteNotify_acceptDeleteRequest($to_userId,$from_userId);
		 echo $dbObj->addupdateData($notifyQuery);
		} else {
		    $content='Missing ';
			if(isset($_GET["from_userId"])){ $content.='from_userId, '; }
			if(isset($_GET["to_userId"])){ $content.='to_userId, '; }
			$content=chop($content,", ");
			echo $content;
		}
}  
else if($_GET["action"]=='UNFRIEND_A_PERSON'){  
	  if(isset($_GET["frnd1"]) && isset($_GET["frnd2"])){
		$frnd1=$_GET["frnd1"];
		$frnd2=$_GET["frnd2"];
		$frndObj=new user_friends();
		$query=$frndObj->query_unfriendAperson($frnd1,$frnd2);
		$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		echo $dbObj->addupdateData($query);
	  } else {
			$content='Missing ';
			if(!isset($_GET["frnd1"])){ $content.='frnd1, ';}
			if(!isset($_GET["frnd2"])){ $content.='frnd2, ';}
			$content=chop($content,", ");
			echo $content;
	  }
	  //  user_frnds	frnd1   frnd2
	  // 
}
else { echo 'NO_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION'; }
?>