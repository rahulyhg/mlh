<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';
require_once '../lal/logic.appIdentity.php';
require_once '../lal/logic.dom.php';
require_once '../lal/logic.user.subscription.php';

$logger=Logger::getLogger("controller.page.auth.part04.php");

if(isset($_GET["action"])){
 
 if($_GET["action"]=='USER_DOMAIN_SUBSCRIBE'){
   if(isset($_GET["user_Id"])){
    $userId=$_GET["user_Id"];
	$authObj=new user_authentication();
	$dbObj=new Database();
    $query=$authObj->query_getListOfDomainSubscriptions($userId);
	echo $dbObj->getJSONData($query);
   } else {  echo 'MISSING_USERID'; }
 }
 
 else if($_GET["action"]=='USER_SUBSCRIPTION'){
  if(isset($_GET["user_Id"]) && isset($_GET["categories"])){
    $subObj=new user_authentication();
	$dbObj=new Database();
	/* Inputs: */
	$user_Id=$_GET["user_Id"];
	$categories=$_GET["categories"];
    
	// print_r($categories);
	
	/* List of Data Subscribed By User Now */
	$subscribeLogic=new logic_user_subscription();
	$secondaryJsonData=$subscribeLogic->buildUserSubscribingList($categories);
	
	// print_r($secondaryJsonData);
	
	/* Get the List of Data Subscribed By User Previously */
	$listSubquery=$subObj->query_getListOfSubscriptions($user_Id);
	$primaryJsonData=$dbObj->getJSONData($listSubquery);
	
	// print_r($primaryJsonData);
	
	$query=$subObj->query_bulk_user_subscription($user_Id,$primaryJsonData,$secondaryJsonData);
	if(strlen($query)>0){
	  echo $dbObj->addupdateData($query);
	} else { echo 'NO_NEW_SUBSCRIPTION'; }
	
	 /* Get the List of Data Subscribed By User Previously */
	 $allListquery=$subObj->query_getListOfSubscriptions($user_Id);
	 echo $dbObj->getJSONData($allListquery);
	 // $_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]=$dbObj->getJSONData($listSubquery);
  } else {
	  $content='MISSING ';
	  if(!isset($_GET["user_Id"])){ $content.='USERID, '; }
	  if(!isset($_GET["categories"])){ $content.='CATEGORIES, '; }
	  $content=chop($content,", ");
	  echo $content;
  }
 }
 
 else if($_GET["action"]=='VIEW_USER_SUBSCRIPTION'){
    if(isset($_GET["user_Id"])){
	$user_Id=$_GET["user_Id"];
	$subObj=new user_authentication();
	$dbObj=new Database();
	/* Get the List of Data Subscribed By User Previously */
	 $allListquery=$subObj->query_getListOfSubscriptions($user_Id);
	 $_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]=$dbObj->getJSONData($allListquery);
	} else { echo 'MISSING_USER_ID'; }
 }
 
 else { echo 'INVALID_ACTION'; }
 
} else { echo 'MISSING_ACTION'; }

?>