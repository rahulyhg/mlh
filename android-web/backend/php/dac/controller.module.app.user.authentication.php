<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.authentication.php';
require_once '../util/util.mobile.sms.php';
$logger=Logger::getLogger("controller.module.app.user.authentication.php");

if(isset($_GET["action"])){
  /* Action Events used By auth-part-01.php/auth-part-01.js ::: START */
  if($_GET["action"]==='VALIDATE_MOBILE_OTP'){
    if(isset($_GET["OTPCode"])){
	  if(isset($_GET["msisdn"])){
	  $msisdn=str_replace("+","",$_GET["msisdn"]);
	  $otpcode=$_GET["OTPCode"];
	  $smsObj=new mobileSMS();
	  echo $smsObj->sendMobileOTP($otpcode,$msisdn);
	  }
	}
  }
  else if($_GET["action"]==='MOBILE_SMS_BALANCE'){
     $smsObj=new mobileSMS();
	 echo $smsObj->getMobileSMSBalance();
  }
  /* Action Events used By auth-part-01.php/auth-part-01.js ::: END */
  /* Action Events used By auth-part-02.php/auth-part-02.js ::: START */
  else if($_GET["action"]=='USERINFO_BY_PHONENUMBER'){
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
  }
  /* Action Events used By auth-part-02.php/auth-part-02.js ::: END */
  
  else { echo 'NO_ACTION'; }
} 
else { echo 'MISSING_ACTION'; }
?>