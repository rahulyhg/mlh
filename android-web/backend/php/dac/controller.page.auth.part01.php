<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../util/util.mobile.sms.php';

$logger=Logger::getLogger("controller.page.auth.part01.php");

if(isset($_GET["action"])){
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

} else { echo 'MISSING_ACTION'; }
?>