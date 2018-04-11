<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.friends.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.page.app.myfriends.php");

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
  else { echo 'INVALID_ACTION'; }
}  
else { echo 'MISSING_ACTION'; }
?>