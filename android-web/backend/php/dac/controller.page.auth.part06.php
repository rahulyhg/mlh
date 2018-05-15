<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';
require_once '../lal/logic.appIdentity.php';
require_once '../lal/logic.dom.php';
require_once '../lal/logic.user.subscription.php';

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
		$userId=$_GET["user_Id"];
		$subscription=$_GET["subscription"];
		/* Get List of Subscription */
		for($index=0;$index<count($subscription['subscriptionList']);$index++){
			$domain_Id=$subscription['subscriptionList'][$index]['domain_Id'];
			$domainFileURL=$_SESSION["PROJECT_URL"]."backend/config/".$_SESSION["USR_LANG"]."/domains/".$domain_Id."/subdomain_list.json";
			$jsonData=file_get_contents($domainFileURL);
			$dejsonData=json_decode($jsonData);
			$subscription['subscriptionList'][$index]["subdomains"]=$dejsonData;
		}
		/*
		 Query: 
		 INSERT INTO `user_subscription`(`sub_Id`, `user_Id`, `domain_Id`, `subdomain_Id`, `sub_on`) 
		 SELECT * FROM user_subscription WHERE sub_Id='AB' AND user_Id='USR128879133554' AND domain_Id='04-STP' AND
		 subdomain_Id='14-STP-TAL' AND sub_on='2018-04-07 18:24:23' AND (SELECT count(*) FROM user_subscription WHERE 
		 user_Id='USR128879133554' AND domain_Id='04-STP' AND subdomain_Id='14-STP-TAL')=0		
		*/
		/*
        if(count($dejsonData)>0){
          for($index=0;$index<count($dejsonData->subdomains);$index++){
	        if($dejsonData->subdomains[$index]->{'subdomain_Id'}==$subDomain_Id){
	          $subdomainName=$dejsonData->subdomains[$index]->{'subdomainName'};
		      break;
	        }
	      } 
        } */
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