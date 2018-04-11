<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
/* User related Data Access Layer */
require_once '../dal/data.authentication.php';
require_once '../dal/data.subscription.php';
/* Utilities */
require_once '../lal/lal.appIdentity.php';
require_once '../lal/lal.area.php';
require_once '../lal/lal.dom.php';

/* Logger Insertion */
$logger=Logger::getLogger("controller.app.authentication.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["action"])) { 
   
   
	
    else if($_GET["action"]==='CHECK_USERID_UNIQUE'){
		if(isset($_GET["user_Id"])) {
		    $user_Id=$_GET["user_Id"];
            $regObj=new tbl_useraccount();
			$sql=$regObj->query_userUniqueUserIdCheck($user_Id);
            $dbObj=new Database();
			$u_jsonData=$dbObj->getJSONData($sql);
            $u_DejsonData=json_decode($u_jsonData);
            if(count($u_DejsonData)>0) {
                echo 'USERID_ALREADY_EXIST';
            }
			else { echo 'USERID_ALLOWED'; }
        } 
		else { echo 'MISSING_USERID'; }
	}
	
	else if($_GET["action"]==='USER_BULKINVITE_COMMEM_REGISTRATION') {
	    /* User Registration */
	    $arry_user_Id=explode(",",$_GET["user_Id"]);
		
		$username='';$surName='';$name='';$email_val='N';$mobile='';$mob_val='N';
		$path_Id='001';$profile_pic='';$minlocation='';$location='';$state='';$country='';
		$created_On=date("Y-m-d H:i:s");$dob='';$gender='';$isAdmin='N';$user_tz='Asia/Kolkata';
		$acc_active='N';$and_app_v='1.0.0';
		
	    $arry_email=explode(",",$_GET["email"]);
		
		$regObj=new tbl_useraccount();
		$dbObj=new Database();
		$idObj=new identity();
		
		$executeQuery=$regObj->query_referencedunregisteredAddUser($arry_user_Id,$username,$surName,
		                         $name,$arry_email,$email_val,$mobile,$mob_val,$dob,$gender,$path_Id,$profile_pic,$minlocation,
								 $location,$state,$country,$created_On,$isAdmin,$user_tz,$acc_active,$and_app_v);
	    $r1_status=$dbObj->addupdateData($executeQuery);
        if($r1_status=='Success') {  echo 'INVITE_REGISTRATION_DONE'; }
	}
	
} else {
    echo 'MISSING_ACTION_INPUT';
}
?>
