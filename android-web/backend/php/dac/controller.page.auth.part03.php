<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.page.auth.part03.php");

if(isset($_GET["action"])){
 if($_GET["action"]==='ADD_NEW_USERACCOUNT'){
  if(isset($_GET["username"]) && isset($_GET["surName"]) && isset($_GET["name"]) && 
     isset($_GET["mcountrycode"]) && isset($_GET["mobile"]) && isset($_GET["dob"]) && isset($_GET["gender"]) && 
	 isset($_GET["profile_pic"]) && isset($_GET["minlocation"]) &&  isset($_GET["location"]) && 
	 isset($_GET["state"]) && isset($_GET["country"]) && isset($_GET["user_tz"])){
	$idObj=new identity();
	$usrauthObj=new user_authentication();
	$dbObj=new Database();
	
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
	
	$addQuery=$usrauthObj->query_addNewUser($user_Id,$username,$surName,$name,$mcountrycode,$mobile,$mob_val,
			                       $dob,$gender,$profile_pic,$about_me,$minlocation,$location,$state,$country,$created_On,
								   $isAdmin,$user_tz,$acc_active);
    echo $dbObj->addupdateData($addQuery);
	
	/* Session: */
	$_SESSION["AUTH_USER_ID"]=$user_Id;
	$_SESSION["AUTH_USER_SUBSCRIPTIONS"]='0';
	$_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]='{}';
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
 else if($_GET["action"]==='UPDATE_EXISTING_USERACCOUNT') {
    $usrauthObj=new user_authentication();
    $dbObj=new Database();
    if(isset($_GET["user_Id"])){
	   $user_Id=$_GET["user_Id"]; 
	   $username='';               if(isset($_GET["username"])) { $username=$_GET["username"]; }
	   $surName='';                if(isset($_GET["surName"])) { $surName=$_GET["surName"]; }
	   $name='';                   if(isset($_GET["name"])) { $name=$_GET["name"]; }
	   $mcountrycode=''; 			if(isset($_GET["mcountrycode"])) { $mcountrycode=$_GET["mcountrycode"];  }
	   $mobile=''; 			    if(isset($_GET["mobile"])) { $mobile=$_GET["mobile"];  }
	   $mob_val='';				if(isset($_GET["mob_val"])) { $mob_val=$_GET["mob_val"];  }
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
	   
	  $updateQuery=$usrauthObj->query_updateUserInfo($user_Id,$username,$surName,$name,$mcountrycode,$mobile,
	                      $mob_val,$dob,$gender,$profile_pic,$about_me,$minlocation,$location,$state,$country,$isAdmin,
						  $user_tz,$acc_active);
	  echo $updateQuery;
	  echo $dbObj->addupdateData($updateQuery);
	  
	  $_SESSION["AUTH_USER_SUBSCRIPTIONS"]='0';
	  $_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]='{}';
	  
	} else { echo 'MISSING_USERID';  }
 }
 else { echo 'INVALID_ACTION';  }
} else { echo 'MISSING_ACTION'; }

?>