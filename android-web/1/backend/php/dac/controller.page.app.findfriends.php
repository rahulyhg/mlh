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
	
	else {
		echo "INVALID_ACTION";
	}
	  
} else { echo 'MISSING_ACTION'; }
?>