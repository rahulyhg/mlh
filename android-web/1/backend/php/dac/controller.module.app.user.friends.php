<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.friends.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.user.friends.php");

if(isset($_GET["action"])){
       if($_GET["action"]=="GET_COUNT_MYFRIENDSLIST") {
	      if(isset($_GET["user_Id"])){
			$user_Id=$_GET["user_Id"];
			$frndObj=new UserFriends();
			$query=$frndObj->query_count_allFriendsOfUser($user_Id);
			$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
			$jsonData=$dbObj->getJSONData($query);
			$dejsonData=json_decode($jsonData);
			echo $dejsonData[0]->{'count(*)'};
		  } else { echo 'MISSING_USER_ID'; }
	   } 
  else if($_GET["action"]=="GET_DATA_MYFRIENDSLIST") {
	      if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
			$user_Id=$_GET["user_Id"];
			$user_Id=$_GET["user_Id"];
			$frndObj=new UserFriends();
			$query=$frndObj->query_data_allFriendsOfUser($user_Id);
			$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
			echo $dbObj->getJSONData($query);
		  } else { 
		     $content='Missing ';
			 if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
			 if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
			 if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
			 $content=chop($content,', ');
		     echo $content; 
		  }
	   }
  else if($_GET["action"]=="SEND_USERFRND_REQUESTS") {
  /* Used in app-search.php, triggers When a User wants to Send Friend Request to a Person */
	   if(isset($_GET["projectURL"]) && isset($_GET["from_user_Id"]) && isset($_GET["to_user_Id"])){
	         $projectURL=$_GET["projectURL"];
	         $idObj=new Identity();
			 $req_Id=$idObj->user_frnds_req_id();
			 $fromUserId=$_GET["from_user_Id"];
			 $toUserId=$_GET["to_user_Id"];
			 $usr_frm_call_to='My LocalHook Friend';
			 $usr_to_call_from='My LocalHook Friend';
			 $req_tz='Asia/Kolkata';
			 $reqMessage='';
			 $userObj=new UserFriends();
			 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
			 $insertQuery=$userObj->query_sendUserFrndRequests($req_Id,$fromUserId,$toUserId,$usr_frm_call_to,
									$usr_to_call_from,$req_tz,$reqMessage);
			 echo $insertQuery;
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
	$idObj=new Identity();
    $reqObj=new UserFriends();
    $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
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
  else if($_GET["action"]=='DELETE_A_REQUEST_SENT'){
  /* Used in app-search.php, triggers When a User wants delete a "Send Friend Request" already sent to a Person  */
		if(isset($_GET["from_userId"]) && isset($_GET["to_userId"])){  
		 $from_userId=$_GET["from_userId"];
		 $to_userId=$_GET["to_userId"];
	     $reqObj=new UserFriends();
		 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
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
  else if($_GET["action"]=='UNFRIEND_A_PERSON'){ 
  /* Used in app-search.php, triggers When a User wants unfriend a person who is already his Person  */  
	  if(isset($_GET["frnd1"]) && isset($_GET["frnd2"])){
		$frnd1=$_GET["frnd1"];
		$frnd2=$_GET["frnd2"];
		$frndObj=new UserFriends();
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
}
  else if($_GET["action"]=='GET_COUNT_RECEIVEDFRIENDREQUESTS'){
   if(isset($_GET["to_userId"])){
     $to_userId=$_GET["to_userId"];
     $frndObj = new UserFriends();
	 $query=$frndObj->query_count_recievedFriendRequests($to_userId);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
   } else { echo 'MISSING_TO_USERID'; }
     
  }
  else if($_GET["action"]=='GET_DATA_RECEIVEDFRIENDREQUESTS'){
   if(isset($_GET["to_userId"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
    $to_userId=$_GET["to_userId"];
	$limit_start=$_GET["limit_start"];
	$limit_end=$_GET["limit_end"];
    $frndObj = new UserFriends();
	 $query=$frndObj->query_data_recievedFriendRequests($to_userId,$limit_start,$limit_end);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
   } else {
       $content='Missing';
	   if(!isset($_GET["to_userId"])){ $content.=' to_userId,'; }
	   if(!isset($_GET["limit_start"])){ $content.=' limit_start,'; }
	   if(!isset($_GET["limit_end"])){ $content.=' limit_end,'; }
	   $content=chop($content,',');
      echo $content; 
    }
  }
  else if($_GET["action"]=='GET_COUNT_SENTFRIENDREQUESTS'){
    if(isset($_GET["from_userId"])){
     $from_userId=$_GET["from_userId"];
	 $frndObj = new UserFriends();
	 $query=$frndObj->query_count_sentFriendRequests($from_userId);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
	} else { echo 'MISSING_FROM_USERID'; } 
  }
  else if($_GET["action"]=='GET_DATA_SENTFRIENDREQUESTS'){
   if(isset($_GET["from_userId"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
     $from_userId=$_GET["from_userId"];
	 $limit_start=$_GET["limit_start"];
	 $limit_end=$_GET["limit_end"];
     $frndObj = new UserFriends();
	 $query=$frndObj->query_data_sentFriendRequests($from_userId,$limit_start,$limit_end);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
   } else {
       $content='Missing';
	   if(!isset($_GET["from_userId"])){ $content.=' from_userId,'; }
	   if(!isset($_GET["limit_start"])){ $content.=' limit_start,'; }
	   if(!isset($_GET["limit_end"])){ $content.=' limit_end,'; }
	   $content=chop($content,',');
      echo $content; 
    }
  }
  else { echo 'INVALID_ACTION'; }
}  
else { echo 'MISSING_ACTION'; }
?>