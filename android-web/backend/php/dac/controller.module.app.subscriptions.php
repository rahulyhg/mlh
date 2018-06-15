<?php
if(!isset($_SESSION)) { session_start(); }
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.subscriptions.php';
require_once '../lal/logic.appIdentity.php';
$logger=Logger::getLogger("controller.module.app.subscriptions.php");
if(isset($_GET["action"])){
 if($_GET["action"]=='SET_SESSION_DOMAINSUBSCRIPTION'){
  if(isset($_GET["user_Id"])){
   $user_Id=$_GET["user_Id"];
   $subObj=new app_subscription();
   $query=$subObj->query_geListOfSubscriptions($user_Id);
   $dbObj=new Database();
   $jsonData=$dbObj->getJSONData($query);
	// echo $jsonData.'<br/>';
	$dejsonData1=json_decode($jsonData);
	$content='{"domains" :[';
	for($i1=0;$i1<count($dejsonData1);$i1++){
	  $domain_Id=$dejsonData1[$i1]->{'domain_Id'};
	  $domainName=$dejsonData1[$i1]->{'domainName'};
	  $SubdomainList='['.$dejsonData1[$i1]->{'SubdomainList'}.']';
	  $dejsonData2=json_decode($SubdomainList);
	  $content.='{ "domain_Id" : "'.$domain_Id.'",';
	  $content.='"domainName":"'.$domainName.'",';
	  $content.='"subscribed":"NO",';
	  $content.='"subdomains":[';
	  for($i2=0;$i2<count($dejsonData2);$i2++){
		$subdomain_Id=$dejsonData2[$i2]->{'subdomain_Id'};
		$subdomainName=$dejsonData2[$i2]->{'subdomainName'};
		$subscribed=$dejsonData2[$i2]->{'subscribed'};
		$content.='{ "subdomain_Id":"'.$subdomain_Id.'", ';
		$content.='"subdomainName":"'.$subdomainName.'" ,';
		$content.='"subscribed":"'.$subscribed.'" },';
	  }
	  $content=chop($content,',');
	  $content.=']';
	  $content.='},';
	}
	$content=chop($content,',');
	$content.=']}';
	echo $content;
  } else { echo 'MISSING_USERID'; }
 }
 else { echo 'INVALID_ACTION'; }
} 
else { echo 'MISSING_ACTION'; }
?>