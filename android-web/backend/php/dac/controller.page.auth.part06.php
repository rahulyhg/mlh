<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';
require_once '../lal/logic.appIdentity.php';
require_once '../lal/logic.dom.php';
require_once '../lal/logic.user.subscription.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.page.auth.part06.php");

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
 else if($_GET["action"]=='SET_USER_SUBSCRIPTION'){
	if(isset($_GET["user_Id"]) && isset($_GET["subscription"])){
		$authObj=new user_authentication();
		$dbObj=new Database();
		$idObj=new identity();
		$user_Id=$_GET["user_Id"];
		$subscription=$_GET["subscription"];
		/* Get List of Subscription */
		for($index=0;$index<count($subscription['subscriptionList']);$index++){
			$domain_Id=$subscription['subscriptionList'][$index]['domain_Id'];
			$domainFileURL=$_SESSION["PROJECT_URL"]."backend/config/".$_SESSION["USR_LANG"]."/domains/".$domain_Id."/subdomain_list.json";
			$jsonData=file_get_contents($domainFileURL);
			echo $jsonData;
			$dejsonData=json_decode($jsonData);
			$subDomainList=$dejsonData->{'subdomains'};
			$subscription['subscriptionList'][$index]["subdomains"]=$subDomainList;
			if(count($dejsonData)>0){ 
			   for($ind=0;$ind<count($subDomainList);$ind++){
				$subdomain_Id=$subDomainList[$ind]->{'subdomain_Id'};
				$subdomainName=$subDomainList[$ind]->{'subdomainName'};
				$source=$subDomainList[$ind]->{'source'};
				$duplicateCheckQuery=$authObj->query_notifyDuplicateSubscriptionForUser($user_Id,$domain_Id,$subdomain_Id);
				$checkJsonData=$dbObj->getJSONData($duplicateCheckQuery);
				$checkdeJsonData=json_Decode($checkJsonData);
				if(intval($checkdeJsonData[0]->{'count(*)'})==0){
				  $sub_Id=$idObj->user_subscribe_id();
				  $insertQuery=$authObj->query_insertUserSubscription($sub_Id, $user_Id, $domain_Id, $subdomain_Id);
				  $dbObj->addupdateData($insertQuery);
				}
				}
			}
		} 
		$_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]=json_encode($subscription); // JSONData
	}
	else { 
		$content='Missing ';
		if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
		if(!isset($_GET["subscription"])){ $content.='subscription, '; }
		$content=chop($content,', ');
		echo $content;
	}
 }
 else { echo 'INVALID_ACTION'; }
 
} else { echo 'MISSING_ACTION'; }

?>