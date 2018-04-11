<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';

$logger=Logger::getLogger("controller.page.auth.part02.php");

if(isset($_GET["action"])){

  if($_GET["action"]=='USERINFO_BY_PHONENUMBER'){
    if(isset($_GET["countrycode"])){
	 if(isset($_GET["phoneNumber"])){
	   $countrycode=$_GET["countrycode"];
       $phoneNumber=$_GET["phoneNumber"];
       $authObj=new user_authentication();
	   $query=$authObj->query_getuserInfoByPhoneNumber($countrycode,$phoneNumber);
	   $dbObj=new Database();
	   echo $dbObj->getJSONData($query);
	  } else { echo 'MISSING_PHONENUMBER'; }
    } else { echo 'MISSING_COUNTRYCODE'; }
  }

  else if($_GET["action"]=='CHECK_USERNAME_AVAILABILITY'){
   if(isset($_GET["user_Id"])){
     if(isset($_GET["username"])){
	    $user_Id=$_GET["user_Id"];
		$username=$_GET["username"];
		/* Condition :
		 *  1) Get userId and username for Previously existing Account: 
         *     If username exists for other than this userId, Say not allowed.
         *     else Allowed.
         *  2) If userId=0, check username exists or not for all rows
         */
		 $authpObj=new user_authentication();
		 $dbObj=new Database();
		 if($user_Id=='0'){ /* check username exists or not for all rows */
		    $query=$authpObj->query_checkUsernameAvailability($username);
			$jsonData=$dbObj->getJSONData($query);
			$dejsonData=json_decode($jsonData);
			if(count($dejsonData)>0){
			   echo 'USERNAME_ALREADY_EXISTS';
			} else { echo 'USERNAME_NOT_EXISTS'; }
		 } else {
		    $query=$authpObj->query_checkUsernameAvailabilityExceptcurrentUserId($user_Id,$username);
			$jsonData=$dbObj->getJSONData($query);
			$dejsonData=json_decode($jsonData);
			if(count($dejsonData)>0){
			   echo 'USERNAME_ALREADY_EXISTS';
			} else { echo 'USERNAME_NOT_EXISTS'; }
		 }
	 } else { echo 'MISSING_USERNAME'; }
   } else { echo 'MISSING_USER_ID'; }
   // 
   // 
  }
  
  
  
} else { echo 'MISSING_ACTION'; }

?>