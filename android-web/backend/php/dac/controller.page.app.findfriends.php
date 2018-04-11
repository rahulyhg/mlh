<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.friends.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.page.app.findfriends.php");

if(isset($_GET["action"])){
	if($_GET["action"]=='COUNT_SEARCH_PEOPLE_BYLOCATION'){
	  if(isset($_GET["user_Id"])){
	   $user_Id=$_GET["user_Id"];
	   $minlocation='';
	   $location='';
	   $state='';
	   $country='';
	  
       if(isset($_GET["minlocation"])) { $minlocation=$_GET["minlocation"]; }
	   if(isset($_GET["location"])) { $location=$_GET["location"]; }
	   if(isset($_GET["state"])) { $state=$_GET["state"]; }
	   if(isset($_GET["country"])) { $country=$_GET["country"]; }
	  
       $dbObj=new Database();
	   $conObj=new user_friends();
       $selectQuery=$conObj->query_count_searchPeopleByLocation($user_Id,$minlocation,$location,$state,$country);
	  // echo $selectQuery;
	   $jsonData=$dbObj->getJSONData($selectQuery);
	   $dejsonData=json_decode($jsonData); // 
	   echo $dejsonData[0]->{'searchResult'};
	  } else { echo 'MISSING_USER_ID'; }
	}
	else if($_GET["action"]=='SEARCH_PEOPLE_BYLOCATION'){ 
      if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
		    $limit_start=$_GET["limit_start"];
			$limit_end=$_GET["limit_end"];
			$user_Id=$_GET["user_Id"];
			
			$minlocation='';$location='';$state='';$country='';
	  
			if(isset($_GET["minlocation"])) { $minlocation=$_GET["minlocation"]; }
			if(isset($_GET["location"])) { $location=$_GET["location"]; }
			if(isset($_GET["state"])) { $state=$_GET["state"]; }
			if(isset($_GET["country"])) { $country=$_GET["country"]; }
	  
		    $dbObj=new Database();
		    $conObj=new user_friends();
			$selectQuery=$conObj->query_searchPeopleByLocation($user_Id,$minlocation,$location,$state,$country,$limit_start,$limit_end);
			$jsonData=$dbObj->getJSONData($selectQuery);
			echo $jsonData;
			
		 } else {
		    $content='Missing ';
			if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
			if(!isset($_GET["limit_start"])){ $content.='limit_start, ';}
			if(!isset($_GET["limit_end"])) { $content.='limit_end, '; }
			$content=chop($content,', ');
	        echo $content;
	     }
	  } 
	else if($_GET["action"]=='COUNT_FRNDREQUEST_TO_ME'){  
	  if(isset($_GET["user_Id"])){
       $user_Id=$_GET["user_Id"];
	   
	   $reqObj=new user_friends();
	   $dbObj=new Database();
	  
	   $reqQuery=$reqObj->query_count_frndrequestsToMe($user_Id);
	  
	   $jsonData=$dbObj->getJSONData($reqQuery);
	   $dejsonData=json_decode($jsonData);
	   echo $dejsonData[0]->{'count(*)'};
	  } else { echo 'MISSING_USER_ID'; }
   }
    else if($_GET["action"]=='FRNDREQUEST_TO_ME'){ 
     if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])) {
		     $limit_start=$_GET["limit_start"];
			 $limit_end=$_GET["limit_end"];
	         $user_Id=$_GET["user_Id"];
			 $reqObj=new user_friends();
			 $dbObj=new Database();
			 
			 $reqQuery=$reqObj->query_frndrequestsToMe($user_Id,$limit_start,$limit_end);
			 $jsonData=$dbObj->getJSONData($reqQuery);
			 echo $jsonData;
	 } else {
	     $content='Missing ';
		 if(!isset($_GET["user_Id"])) { $content.='user_Id, '; }
		 if(!isset($_GET["limit_start"])) { $content.='limit_start, '; }
		 if(!isset($_GET["limit_end"])) { $content.='limit_end, '; }
		 $content=chop($content,", ");
		 echo $content;
	   }
	 
   }
    else if($_GET["action"]=="SEND_USERFRND_REQUESTS") {
	   if(isset($_GET["from_user_Id"]) && isset($_GET["to_user_Id"])){
	         $idObj=new identity();
			 $req_Id=$idObj->user_frnds_req_id();
			 $from_userId=$_GET["from_user_Id"];
			 $to_userId=$_GET["to_user_Id"];
			 $usr_frm_call_to='My LocalHook Friend';
			 $notifyObj=new user_friends();
			 $insertQuery=$notifyObj->query_sendUserFrndRequests($req_Id,$from_userId,$to_userId,$usr_frm_call_to);
			 $dbObj=new Database();
			 echo $dbObj->addupdateData($insertQuery);
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
		 $dbObj=new Database();
		 
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
	  } else {
	     echo 'MISSING_REQUEST_FROM_USER_ID';
	  }
   }
    else if($_GET["action"]=='UNFRIEND_A_PERSON'){  
	  if(isset($_GET["frnd1"]) && isset($_GET["frnd2"])){
		$frnd1=$_GET["frnd1"];
		$frnd2=$_GET["frnd2"];
		$frndObj=new user_friends();
		$query=$frndObj->query_unfriendAperson($frnd1,$frnd2);
		$dbObj=new Database();
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
	else if($_GET["action"]=='DELETE_A_REQUEST_SENT'){
		if(isset($_GET["from_userId"]) && isset($_GET["to_userId"])){  
		 $from_userId=$_GET["from_userId"];
		 $to_userId=$_GET["to_userId"];
	     $reqObj=new user_friends();
		 $dbObj=new Database();
		 /* Delete row in user_frnds_req */
		 $deleteQuery=$reqObj->query_deleteFrndRequestToMe($from_userId,$to_userId);
		 echo $dbObj->addupdateData($deleteQuery);
		} else {
		    $content='Missing ';
			if(isset($_GET["from_userId"])){ $content.='from_userId, '; }
			if(isset($_GET["to_userId"])){ $content.='to_userId, '; }
			$content=chop($content,", ");
			echo $content;
		}
	}
	else {
		echo "INVALID_ACTION";
	}
	  
} else { echo 'MISSING_ACTION'; }
?>