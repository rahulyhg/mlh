<?php session_start();

require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
require_once '../dal/data.user.connect.php';
require_once '../lal/lal.appIdentity.php';

if(isset($_GET["action"])){
   if($_GET["action"]=='FRIEND_SUGGESTION_COUNT') {
		 
			 $user_Id=$_SESSION["AUTH_USER_ID"];
			 $country=$_SESSION["AUTH_USER_COUNTRY"];
			 $state=$_SESSION["AUTH_USER_STATE"];
			 $location=$_SESSION["AUTH_USER_LOCATION"];
			 $locality=$_SESSION["AUTH_USER_LOCALITY"];
			 $surName=$_SESSION["AUTH_USER_SURNAME"];
			 
			 $dbObj=new Database();
			 $sObj=new user_connect();
			 $arry_subdomain=array();
			 
			 /* Friends UserIds */
			 
			 /* Suggest by SurName / Locality / SubDomain */
			 $subdomainQuery=$sObj->query_getUserSubscribeIndustryList($user_Id);
			 $subdomainJSON=$dbObj->getJSONData($subdomainQuery);
			 $subdomainDeJSON=json_decode($subdomainJSON);
			 
			 if(count($subdomainDeJSON)>0){ /* Add to Array */
				for($index=0;$index<count($subdomainDeJSON);$index++){
				   $arry_subdomain[$index]=$subdomainDeJSON[$index]->{'subdomain_Id'};
				}
			 }
			 
			 $countQuery=$sObj->query_count_getSuggestionUserList($user_Id,$arry_subdomain,$locality,$location,$state,$country);
			 $countJsonData=$dbObj->getJSONData($countQuery);
			 $countDeJsonData=json_decode($countJsonData);
			 $totalSuggestions=$countDeJsonData[0]->{'suggestions'};
			 
			 echo $totalSuggestions;
   } 
   else if($_GET["action"]=='FRIEND_SUGGESTION') {
     if(isset($_GET["limit_start"])){
	     if(isset($_GET["limit_end"])){
			 $limit_start=$_GET["limit_start"];
			 $limit_end=$_GET["limit_end"];
		 
			 $user_Id=$_SESSION["AUTH_USER_ID"];
			 $country=$_SESSION["AUTH_USER_COUNTRY"];
			 $state=$_SESSION["AUTH_USER_STATE"];
			 $location=$_SESSION["AUTH_USER_LOCATION"];
			 $locality=$_SESSION["AUTH_USER_LOCALITY"];
			 $surName=$_SESSION["AUTH_USER_SURNAME"];
			 
			 $dbObj=new Database();
			 $sObj=new user_connect();
			 $arry_subdomain=array();
			 
			 /* Friends UserIds */
			 
			 /* Suggest by SurName / Locality / SubDomain */
			 $subdomainQuery=$sObj->query_getUserSubscribeIndustryList($user_Id);
			 $subdomainJSON=$dbObj->getJSONData($subdomainQuery);
			 $subdomainDeJSON=json_decode($subdomainJSON);
			 
			 if(count($subdomainDeJSON)>0){ /* Add to Array */
				for($index=0;$index<count($subdomainDeJSON);$index++){
				   $arry_subdomain[$index]=$subdomainDeJSON[$index]->{'subdomain_Id'};
				}
			 }
			 
			 $s_query=$sObj->query_getSuggestionUserList($user_Id,$arry_subdomain,$locality,$location,$state,$country,$limit_start,$limit_end);
			 $s_JsonData=$dbObj->getJSONData($s_query);
			 echo $s_JsonData;
		   
		 } else {
			echo 'MISSING_LIMIT_END';
		 }
	 } else {
	    echo 'MISSING_LIMIT_START';
	 }
   } 
   else if($_GET["action"]=='FRNDREQUEST_TO_ME'){ 
     if(isset($_GET["limit_start"])) {
	     if(isset($_GET["limit_end"])) {
		     $limit_start=$_GET["limit_start"];
			 $limit_end=$_GET["limit_end"];
	         $user_Id=$_SESSION["AUTH_USER_ID"];
			 $reqObj=new user_connect();
			 $reqQuery=$reqObj->query_frndrequestsToMe($user_Id,$limit_start,$limit_end);
			 $dbObj=new Database();
			 $jsonData=$dbObj->getJSONData($reqQuery);
			 echo $jsonData;
		 } else {
			echo 'MISSING_LIMIT_END';
		 }
	 } else {
	    echo 'MISSING_LIMIT_START';
	 }
   }
   else if($_GET["action"]=='COUNT_FRNDREQUEST_TO_ME'){ 
      $user_Id=$_SESSION["AUTH_USER_ID"];
	  $reqObj=new user_connect();
	  $reqQuery=$reqObj->query_count_frndrequestsToMe($user_Id);
	  $dbObj=new Database();
	  $jsonData=$dbObj->getJSONData($reqQuery);
	  $dejsonData=json_decode($jsonData);
	  echo $dejsonData[0]->{'count(*)'};
   }
   else if($_GET["action"]=='ACCEPT_FRNDREQUEST_TO_ME'){ 
      if(isset($_GET["requestFrom"])){
	     $idObj=new identity();
		 $reqObj=new user_connect();
		 $dbObj=new Database();
		 
	     $from_userId=$_GET["requestFrom"];
		 $to_userId=$_SESSION["AUTH_USER_ID"];
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
   else if($_GET["action"]=='FRNDS_LIST_COUNT'){
     $user_Id=$_SESSION["AUTH_USER_ID"];
	 $dbObj=new Database();
	 $conObj=new user_connect();
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
   }
   else if($_GET["action"]=='FRNDS_LIST'){
     if(isset($_GET["limit_start"])){
	   if(isset($_GET["limit_end"])){
	         $limit_start=$_GET["limit_start"];
		     $limit_end=$_GET["limit_end"];
		     $user_Id=$_SESSION["AUTH_USER_ID"];
			 $dbObj=new Database();
			 $conObj=new user_connect();
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
			echo 'MISSING_LIMIT_START';
	   }
	 } else {
	    echo 'MISSING_LIMIT_START';
	 }
   }
   else if($_GET["action"]=='DELETE_FRND'){
     if(isset($_GET["frnd_Id"])) {
	   $user_Id=$_SESSION["AUTH_USER_ID"];
	   $frnd_Id=$_GET["frnd_Id"];
	   $dbObj=new Database();
	   $conObj=new user_connect();
	   $deleteQuery=$conObj->query_deleteFrnd($user_Id, $frnd_Id);
	   echo $dbObj->addupdateData($deleteQuery);
	 } else {
	    echo 'MISSING_FRND_ID';
	 }
   }
   else if($_GET["action"]=='COUNT_SEARCH_PEOPLE_BYLOCATION'){
      $user_Id=$_SESSION["AUTH_USER_ID"];
      $minlocation='';
	  $location='';
	  $state='';
	  $country='';
	  
      if(isset($_GET["minlocation"])) { $minlocation=$_GET["minlocation"]; }
	  if(isset($_GET["location"])) { $location=$_GET["location"]; }
	  if(isset($_GET["state"])) { $state=$_GET["state"]; }
	  if(isset($_GET["country"])) { $country=$_GET["country"]; }
	  
      $dbObj=new Database();
	  $conObj=new user_connect();
      $selectQuery=$conObj->query_count_searchPeopleByLocation($user_Id,$minlocation,$location,$state,$country);
	  $jsonData=$dbObj->getJSONData($selectQuery);
	  $dejsonData=json_decode($jsonData); 
	  echo $dejsonData[0]->{'searchResult'};
   }
  
} 

?>