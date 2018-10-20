<?php

class mobileSMS {
   private $user='anupchinney';
   private $pwd='@anupanup123';
   private $senderId='WebSMS';
   private $logger;
    
   function __construct() {
    $this->logger= Logger::getLogger("api.database.php");
   }
   
   function sendMobileOTP($otpcode,$msisdn){
     $msg=urlencode('Welcome to MyLocalHook. Your OTPCode is '.$otpcode);
	 $url='http://apps.smslane.com/vendorsms/pushsms.aspx?';
	 $url.='user='.$this->user.'&password='.$this->pwd;
	 $url.='&msisdn='.$msisdn.'&sid='.$this->senderId.'&msg='.$msg.'&fl=0';
    return file_get_contents($url);
   }
   
   function getMobileSMSBalance(){
      $url='http://apps.smslane.com/vendorsms/CheckBalance.aspx?user='.$this->user.'&password='.$this->pwd;
	  $balance=file_get_contents($url);
	  $content='{"bal_smslance":"'.str_replace("Success#","",$balance).'"}';
	  return $content;
   }
}

?>