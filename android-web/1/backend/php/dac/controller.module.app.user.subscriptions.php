<?php
if(!isset($_SESSION)) { session_start(); }
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.user.subscriptions.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.user.subscriptions.php");

if(isset($_GET["action"])){
 /* Action Events used By auth-part-06.php/auth-part-06.js ::: START  */
 if($_GET["action"]=='GET_SESSION_DOMAINSUBSCRIPTION'){
  if(isset($_GET["user_Id"]) && isset($_GET["projectURL"]) && isset($_GET["usrLang"])){
   $user_Id=$_GET["user_Id"];
   $projectURL=$_GET["projectURL"];
   $usrLang=$_GET["usrLang"];
   $jsonURL=$projectURL.'backend/config/'.$usrLang.'/domains/categories.json';
   $jsonFileData=file_get_contents($jsonURL);
   $jsonFileData = json_decode($jsonFileData);
   /* Get List of Domains and SubDomains subscribed By User */
   $subscriptions = new Subscriptions();
   $query = $subscriptions->query_get_userSubscriptionList($user_Id);
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $jsonData = $dbObj->getJSONData($query);
   $dejsonData = json_decode($jsonData);
   for($index=0;$index<count($dejsonData);$index++){
    $domain_Id = $dejsonData[$index]->{'domain_Id'};
	$subdomain_Id = $dejsonData[$index]->{'subdomain_Id'}; // [""][][""]='YES'
	$jsonFileData->{$domain_Id}->{'subdomainInfo'}->{$subdomain_Id}->{"subscribed"}='YES';
   }
   echo json_encode($jsonFileData);
  } 
  else { echo 'MISSING_USERID'; }
 }
 else if($_GET["action"]=='SET_USER_SUBSCRIPTION'){
  if(isset($_GET["user_Id"]) && isset($_GET["subscriptions"])){
  /* Directly get Domain_Id and SubDomain_Id in JSON Format */
   $user_Id = $_GET["user_Id"];
   $subscriptions = $_GET["subscriptions"];
   $subscriptionObj = new Subscriptions();
   $idObj = new Identity(); 
   print_r($subscriptions);
   foreach($subscriptions as $subscriptionKey => $subscriptionArray) {
    if(is_array($subscriptionArray)){
	    $sub_Id = $idObj->user_subscription_id();
	    $domain_Id = $subscriptionArray["domain_Id"];
		$subdomain_Id = $subscriptionArray["subdomain_Id"];
		$query=$subscriptionObj->query_add_userSubscriptionList($sub_Id,$user_Id,$domain_Id,$subdomain_Id);
		$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		echo $dbObj->addupdateData($query); 
	}
   }
  }
  else { 
    $content='Missing ';
    if(!isset($_GET["user_Id"])){ $content.='user_Id,'; }
	if(!isset($_GET["subscriptions"])){ $content.='subscriptions,'; }
	$content=chop($content,',');
    echo $content; 
  }
 }
 else if($_GET["action"]=='ADD_NEW_CATEGORY'){
   if(isset($_GET["category_Id"]) && isset($_GET["categoryName"])){
    $category_Id = $_GET["category_Id"];
	$categoryName = $_GET["categoryName"];
	$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$subscriptions = new Subscriptions();
	$query01 = $subscriptions->query_check_isDuplicateCategory($category_Id,$categoryName);
    $jsonData=$dbObj->getJSONData($query01);
	$dejsonData=json_decode($jsonData);
    if(intval($dejsonData[0]->{'count(*)'})==0){
		$query02 = $subscriptions->query_addNewCategory($category_Id,$categoryName);
		echo $dbObj->addupdateData($query02);
	} else {
	    echo 'DUPLICATE';
	}
   } else {
   
   }
   
 }
 else if($_GET["action"]=='ADD_NEW_SUBCATEGORY'){
 
 }
 else if($_GET["action"]=='UPDATE_CATEGORY'){
 
 }
 else if($_GET["action"]=='UPDATE_SUBCATEGORY'){
 
 }
 else { echo 'INVALID_ACTION'; }
} 
else { echo 'MISSING_ACTION'; }
?>