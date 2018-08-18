<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.friends.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.user.friends.php");

if(isset($_GET["action"])){
  if($_GET["action"]=='FRNDS_LIST_COUNT'){
	if(isset($_GET["user_Id"])){
	 $user_Id=$_GET["user_Id"];
	 $dbObj=new Database();
	 $conObj=new user_friends();
     $list1Query=$conObj->query_count_userFrndsList_acceptedByMe($user_Id);
	 $list1dejsonData=$dbObj->getJSONData($list1Query);
	 $list1jsonData=json_decode($list1dejsonData);
	 $result1=intval($list1jsonData[0]->{'count(*)'});
	 $list2Query=$conObj->query_count_userFrndsList_acceptedByFrnds($user_Id);
	 $list2dejsonData=$dbObj->getJSONData($list2Query);
	 $list2jsonData=json_decode($list2dejsonData);
	 $result2=intval($list2jsonData[0]->{'count(*)'});
	 $result=$result1+$result2;
	 echo $result;
	 } else { echo "MISSING_USER_ID"; }
  }
  else if($_GET["action"]=='FRNDS_LIST'){
	 if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	         $limit_start=$_GET["limit_start"];
		     $limit_end=$_GET["limit_end"];
		     $user_Id=$_GET["user_Id"];
			 $dbObj=new Database();
			 $conObj=new user_friends();
			 $list1Query=$conObj->query_userFrndsList_acceptedByMe($user_Id,$limit_start,$limit_end);
			 $list1dejsonData=$dbObj->getJSONData($list1Query);
			 $list1jsonData=json_decode($list1dejsonData);
			 $list2Query=$conObj->query_userFrndsList_acceptedByFrnds($user_Id,$limit_start,$limit_end);
			 $list2dejsonData=$dbObj->getJSONData($list2Query);
			 $list2jsonData=json_decode($list2dejsonData);
			 $content='[';
			 for($list1index=0;$list1index<count($list1jsonData);$list1index++){
				 $content.='{';
				 $content.='"user_Id":"'.$list1jsonData[$list1index]->{'user_Id'}.'",';
				 $content.='"surName":"'.$list1jsonData[$list1index]->{'surName'}.'",';
				 $content.='"name":"'.$list1jsonData[$list1index]->{'name'}.'",';
				 $content.='"profile_pic":"'.$list1jsonData[$list1index]->{'profile_pic'}.'",';
				 $content.='"minlocation":"'.$list1jsonData[$list1index]->{'minlocation'}.'",';
				 $content.='"location":"'.$list1jsonData[$list1index]->{'location'}.'",';
				 $content.='"state":"'.$list1jsonData[$list1index]->{'state'}.'",';
				 $content.='"country":"'.$list1jsonData[$list1index]->{'country'}.'"';
				 $content.='},';
			 }
			 for($list2index=0;$list2index<count($list2jsonData);$list2index++){
				 $content.='{';
				 $content.='"user_Id":"'.$list2jsonData[$list2index]->{'user_Id'}.'",';
				 $content.='"surName":"'.$list2jsonData[$list2index]->{'surName'}.'",';
				 $content.='"name":"'.$list2jsonData[$list2index]->{'name'}.'",';
				 $content.='"profile_pic":"'.$list2jsonData[$list2index]->{'profile_pic'}.'",';
				 $content.='"minlocation":"'.$list2jsonData[$list2index]->{'minlocation'}.'",';
				 $content.='"location":"'.$list2jsonData[$list2index]->{'location'}.'",';
				 $content.='"state":"'.$list2jsonData[$list2index]->{'state'}.'",';
				 $content.='"country":"'.$list2jsonData[$list2index]->{'country'}.'"';
				 $content.='},';
			 }
			 $content=chop($content,',');
			 $content.=']';
			 echo $content;
	} else {
	   $content='Missing ';
	   if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
	   if(!isset($_GET["limit_start"])){ $content.='limit_start, '; }
	   if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	   $content=chop($content,', ');
	   echo $content;
	}
  } 
  else if($_GET["action"]=='DELETE_FRND'){
	if(isset($_GET["user_Id"]) && isset($_GET["frnd_Id"])) {
	   $user_Id=$_GET["user_Id"];
	   $frnd_Id=$_GET["frnd_Id"];
	   $dbObj=new Database();
	   $conObj=new user_friends();
	   $deleteQuery=$conObj->query_deleteFrnd($user_Id, $frnd_Id);
	   echo $dbObj->addupdateData($deleteQuery);
	 } else {
	    $content='Missing ';
		if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
		if(!isset($_GET["frnd_Id"])){ $content.='frnd_Id, '; }
		$content=chop($content,', ');
	    echo $content;
	 }
  }
  
  else if($_GET["action"]=="SEND_USERFRND_REQUESTS") {
	   if(isset($_GET["projectURL"]) && isset($_GET["from_user_Id"]) && isset($_GET["to_user_Id"])){
	         $projectURL=$_GET["projectURL"];
	         $idObj=new Identity();
			 $req_Id=$idObj->user_frnds_req_id();
			 $from_userId=$_GET["from_user_Id"];
			 $to_userId=$_GET["to_user_Id"];
			 $usr_frm_call_to='My LocalHook Friend';	
			 $userObj=new user_friends();
			 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
			 $insertQuery=$userObj->query_sendUserFrndRequests($req_Id,$from_userId,$to_userId,$usr_frm_call_to);
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
    $reqObj=new user_friends();
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
		if(isset($_GET["from_userId"]) && isset($_GET["to_userId"])){  
		 $from_userId=$_GET["from_userId"];
		 $to_userId=$_GET["to_userId"];
	     $reqObj=new user_friends();
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
}

  else { echo 'INVALID_ACTION'; }
}  
else { echo 'MISSING_ACTION'; }
?>