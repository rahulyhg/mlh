<?php
//  $email='nlnrao228@gmail.com';
//  $pin='1234';
if(isset($_GET["action"])) {

  if($_GET["action"]=='REGISTER_SUCCESS') {
	if(isset($_GET["email_Id"])) {
	  $content="http://anups.in/app/driversUnetwork/php/dac/controller.email.php?";
	  $content.="action=REGISTER_SUCCESS&email_Id=".$email;
	  echo file_get_contents($content);
	}
	else {
	  echo 'MISSING_EMAIL';
	} 
  }
  if($_GET["action"]=='LOGIN_SUCCESS') {
	if(isset($_GET["email_Id"])) {
	  $content="http://anups.in/app/driversUnetwork/php/dac/controller.email.php?";
	  $content.="action=LOGIN_SUCCESS&email_Id=".$email;
	  echo file_get_contents($content);
	}
	else {
	  echo 'MISSING_EMAIL';
	}  
  }
}
else {
 echo 'MISSING_ACTION_INPUT';
}
?>