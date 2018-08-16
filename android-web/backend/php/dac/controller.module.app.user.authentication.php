<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.authentication.php';
require_once '../lal/logic.appIdentity.php';
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
	   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
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
		 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
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
  
  /* No Action Events used By auth-part-03.php/auth-part-03.js */
  
  /* Action Events used By auth-part-04.php/auth-part-04.js, auth-part-05.php/auth-part-05.js, ::: START */
  else if($_GET["action"]==='UPDATE_EXISTING_USERACCOUNT') {
    $usrauthObj=new user_authentication();
    $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
    if(isset($_GET["user_Id"])){
	   $user_Id=$_GET["user_Id"]; 
	   $username='';               if(isset($_GET["username"])) { $username=$_GET["username"]; }
	   $surName='';                if(isset($_GET["surName"])) { $surName=$_GET["surName"]; }
	   $name='';                   if(isset($_GET["name"])) { $name=$_GET["name"]; }
	   $dob='';  					if(isset($_GET["dob"])) {  $dob=$_GET["dob"];  }
	   $gender=''; 			    if(isset($_GET["gender"])) { $gender=$_GET["gender"];  }
	   $profile_pic='';  		if(isset($_GET["profile_pic"])) { $profile_pic=$_GET["profile_pic"]; }
	   $about_me='';			if(isset($_GET["about_me"])) { $about_me=$_GET["about_me"]; }
	   $minlocation='';  		if(isset($_GET["minlocation"])) { $minlocation=$_GET["minlocation"]; }
	   $location='';  		if(isset($_GET["location"])) { $location=$_GET["location"]; }
	   $state='';  			if(isset($_GET["state"])) { $state=$_GET["state"];  }
	   $country='';  			if(isset($_GET["country"])) { $country=$_GET["country"]; }
	   $isAdmin='';			if(isset($_GET["isAdmin"])) { $isAdmin=$_GET["isAdmin"]; }
       $user_tz='';  				if(isset($_GET["user_tz"])) { $user_tz=$_GET["user_tz"];  }
	   $acc_active='';		if(isset($_GET["acc_active"])) { $acc_active=$_GET["acc_active"]; }
	   
	  $updateQuery=$usrauthObj->query_updateUserInfo($user_Id,$username,$surName,$name,
							    $dob,$gender,$profile_pic,$about_me,$minlocation,$location,$state,$country,$isAdmin,
								$user_tz,$acc_active);
	  echo $dbObj->addupdateData($updateQuery);
	} else { echo 'MISSING_USERID';  }
 }
  /* Action Events used By auth-part-04.php/auth-part-04.js, auth-part-05.php/auth-part-05.js, ::: END */
 
  /* Action Events used By auth-part-05.php/auth-part-05.js ::: START */
  else if($_GET["action"]==='ADD_NEW_USERACCOUNT'){
  if(isset($_GET["username"]) && isset($_GET["surName"]) && isset($_GET["name"]) && 
     isset($_GET["mcountrycode"]) && isset($_GET["mobile"]) && isset($_GET["dob"]) && isset($_GET["gender"]) && 
	 isset($_GET["profile_pic"]) && isset($_GET["minlocation"]) &&  isset($_GET["location"]) && 
	 isset($_GET["state"]) && isset($_GET["country"]) && isset($_GET["user_tz"])){
	$idObj=new Identity();
	$usrauthObj=new user_authentication();
	$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$contact_Id=$idObj->user_contact_id();
	$user_Id=$idObj->user_account_id();    
	$username=$_GET["username"];       
	$surName=$_GET["surName"];
	$name=$_GET["name"];   
	$mcountrycode=$_GET["mcountrycode"];     
	$mobile=$_GET["mobile"];
	$mob_val='Y';                  
	$dob=$_GET["dob"];                  
	$gender=$_GET["gender"];
	$profile_pic=$_GET["profile_pic"];    
	$about_me='';
	$minlocation=$_GET["minlocation"];    
	$location=$_GET["location"];
	$state=$_GET["state"];        
	$country=$_GET["country"];    
	$created_On=date('Y-m-d H:i:s');
	$isAdmin='N';     
	$user_tz=$_GET["user_tz"];     
	$acc_active='Y';   
	
	$addQuery=$usrauthObj->query_addNewUser($contact_Id,$user_Id,$username,$surName,$name,$mcountrycode,$mobile,$mob_val,
			                       $dob,$gender,$profile_pic,$about_me,$minlocation,$location,$state,$country,$created_On,
								   $isAdmin,$user_tz,$acc_active);
	echo $addQuery;
    $status=$dbObj->addupdateData($addQuery);
	echo $status;
	if($status=='Success') {
	  $_SESSION["AUTH_USER_ID"]=$user_Id; /* Session: */ 
	}
   } else {
		    $content='MISSING ';
			if(!isset($_GET["username"])) { $content.='USERNAME, '; }
			if(!isset($_GET["surName"])) { $content.='SURNAME, '; }
			if(!isset($_GET["fullName"])) { $content.='FULLNAME, '; }
			if(!isset($_GET["countrycode"])) { $content.='COUNTRYCODE, '; }
			if(!isset($_GET["phone"])) { $content.='PHONE, '; }
			if(!isset($_GET["dob"])) {  $content.='DATEOFBIRTH, ';  }
			if(!isset($_GET["gender"])) { $content.='GENDER, '; }
			if(!isset($_GET["user_profilepic"])) { $content.='PROFILEPIC, '; }
			if(!isset($_GET["user_locality"])) { $content.='LOCALITY, '; }
			if(!isset($_GET["user_location"])) { $content.='LOCATION, '; }
			if(!isset($_GET["user_state"])) { $content.='STATE, '; }
			if(!isset($_GET["user_country"])) { $content.='COUNTRY, '; }
			if(!isset($_GET["user_tz"])) { $content.='TIMESTAMP, ';  }
			$content=chop($content,", ");
			echo $content;
   }
		  
 } 
  /* Action Events used By auth-part-05.php/auth-part-05.js ::: END */
  
  else { echo 'NO_ACTION'; }
} 
else { echo 'MISSING_ACTION'; }
?>