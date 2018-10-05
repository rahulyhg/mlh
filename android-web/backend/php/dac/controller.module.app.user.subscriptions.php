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
  if(isset($_GET["user_Id"])){
   $user_Id=$_GET["user_Id"];
   $subObj=new Subscriptions();
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $query01=$subObj->query_getCategoriesList();
   $jsonData01=$dbObj->getJSONData($query01);
   $dejsonData01=json_decode($jsonData01);
   $content='{"domains":[';
   if(count($dejsonData01)>0){
    for($i1=0;$i1<count($dejsonData01);$i1++){
	  $domain_Id=$dejsonData01[$i1]->{'domain_Id'};
	  $domainName=$dejsonData01[$i1]->{'domainName'};
	  $content.='{"domain_Id":"'.$domain_Id.'",';
	  $content.='"domainName":"'.$domainName.'",';
	  $query02=$subObj->query_getSubCategoriesSubscription($user_Id,$domain_Id);
	  $jsonData02=$dbObj->getJSONData($query02);
	  $content.='"subdomains":'.$jsonData02.'},';
	}
	$content=chop($content,',');
   }
   $content.=']}';
   echo $content;
  } 
  else { echo 'MISSING_USERID'; }
 }
 else if($_GET["action"]=='SET_USER_SUBSCRIPTION'){
  if(isset($_GET["user_Id"])){
   $user_Id=$_GET["user_Id"];
   $sub_random=rand(1111,9999);
   $subObj=new Subscriptions();
   $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
   $idObj=new Identity(); // echo $_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"].'<br/>';
   $subscriptionListJsonData=$_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"];
   $subscriptionListdeJsonData=json_decode($subscriptionListJsonData);
   $domainData=$subscriptionListdeJsonData->{'domains'};
   $queryBuilder='';
   for($i1=0;$i1<count($domainData);$i1++){
	$domain_Id=$domainData[$i1]->{'domain_Id'};
	$domainName=$domainData[$i1]->{'domainName'};
	$subdomains=$domainData[$i1]->{'subdomains'};
	for($i2=0;$i2<count($subdomains);$i2++){
	   $subdomain_Id=$subdomains[$i2]->{'subdomain_Id'};
	   $subdomainName=$subdomains[$i2]->{'subdomainName'};
	   $subscribed=$subdomains[$i2]->{'subscribed'};
	   if($subscribed=='YES'){
		$sub_Id='SUB'.$user_Id.$sub_random.sprintf("%03d", $i2);
		$queryBuilder.=$subObj->query_setUserSubscription($sub_Id,$user_Id,$domain_Id,$subdomain_Id);
	   } 
	   else { $queryBuilder.=$subObj->query_removeUserSubscription($user_Id,$domain_Id,$subdomain_Id); }
	}
   }
   echo $dbObj->addupdateData($queryBuilder);
  }
  else { echo 'MISSING_USERID'; }
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