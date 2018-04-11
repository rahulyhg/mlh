<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.newsfeed.php';
require_once '../lal/logic.appIdentity.php';
require_once '../lal/logic.dom.php';
$logger=Logger::getLogger("controller.page.app.newsfeed.php");

if(isset($_GET["action"])){
  if($_GET["action"]=='TOTAL_PUBLIC_NEWSFEED'){
	if(isset($_GET["user_Id"])){  
		$user_Id=$_GET["user_Id"];
		$nfObj=new app_newsfeed();
		$dbObj=new Database();
		$pquery=$nfObj->query_count_union_newsfeed($user_Id);
		$jsonData=$dbObj->getJSONData($pquery);
		$dejsonData=json_decode($jsonData);
		echo $dejsonData[0]->{'union_count'};
	} else { echo 'MISSING_USER_ID'; }
  }
  else if($_GET["action"]=='PUBLIC_NEWSFEED'){
	   if(isset($_GET["limit_start"])){
	     if(isset($_GET["limit_end"])){
		   if(isset($_GET["user_Id"])){
		   $projectURL=$_SESSION["PROJECT_URL"];
		   $lang=$_SESSION["DRI_LANG"];
		   $limit_start=$_GET["limit_start"];
		   $limit_end=$_GET["limit_end"];
		   $user_Id=$_GET["user_Id"]; // $_SESSION["AUTH_USER_ID"]
		   $minlocation='';$location='';$state='';$country='';
		   if(isset($_GET["minlocation"])){ $minlocation=$_GET["minlocation"]; }
		   if(isset($_GET["location"])){ $location=$_GET["location"]; }
		   if(isset($_GET["state"])){ $state=$_GET["state"]; }
		   if(isset($_GET["country"])){ $country=$_GET["country"]; }
		   $dbObj=new Database();
		   $newsObj=new app_newsfeed();
		   $domObj=new module_dom();
		   $unionFeedQuery=$newsObj->query_union_newsfeed($user_Id,$limit_start,$limit_end);
		   
		   $unionFeedJsonData=$dbObj->getJSONData($unionFeedQuery);
		   $unionFeedDejsonData=json_decode($unionFeedJsonData);
		   $content='{';
		   $content.='"unionNewsFeed":[';
		   for($index=0;$index<count($unionFeedDejsonData);$index++){
		   
		   $union_Id=$unionFeedDejsonData[$index]->{'union_Id'};
		   $unionName=$unionFeedDejsonData[$index]->{'unionName'};
		   $domain_Id=$unionFeedDejsonData[$index]->{'domain_Id'};
		   $domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$domain_Id);
		   $subdomain_Id=$unionFeedDejsonData[$index]->{'subdomain_Id'};
		   $subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subdomain_Id);
		   $unionURLName=$unionFeedDejsonData[$index]->{'unionURLName'};
		   $info_Id=$unionFeedDejsonData[$index]->{'info_Id'};
		   $artTitle=$unionFeedDejsonData[$index]->{'artTitle'};
		   $artShrtDesc=$unionFeedDejsonData[$index]->{'artShrtDesc'};
		   $artDesc=$unionFeedDejsonData[$index]->{'artDesc'};
		   $createdOn=$unionFeedDejsonData[$index]->{'createdOn'};
		   $path_Id=$unionFeedDejsonData[$index]->{'path_Id'};
		   $images=$unionFeedDejsonData[$index]->{'images'};
		   $status=$unionFeedDejsonData[$index]->{'status'};
		   
		   
		   $optsQuery=$newsObj->query_count_union_opts($user_Id,$info_Id);
		   $optsJSON=$dbObj->getJSONData($optsQuery);
		   $optsdeJSON=json_decode($optsJSON);
		   
		   $favourites=$optsdeJSON[0]->{'favourites'};
		   $votes_up=$optsdeJSON[0]->{'votes_up'};
		   $votes_down=$optsdeJSON[0]->{'votes_down'};
		   $likes=$optsdeJSON[0]->{'likes'};
		   $viewed=$optsdeJSON[0]->{'viewed'};
		   $usr_favourite=$optsdeJSON[0]->{'usr_favourite'};
		   $usr_liked=$optsdeJSON[0]->{'usr_liked'};
		   $usr_vote_up=$optsdeJSON[0]->{'usr_vote_up'};
		   $usr_vote_down=$optsdeJSON[0]->{'usr_vote_down'};
		   
		   $content.='{'; 
		   $content.='"union_Id":"'.$union_Id.'",';
		   $content.='"unionName":"'.$unionName.'",';
		   $content.='"domain_Id":"'.$domain_Id.'",';
		   $content.='"domainName":"'.$domainName.'",';
		   $content.='"subdomain_Id":"'.$subdomain_Id.'",';
		   $content.='"subdomainName":"'.$subdomainName.'",';
		   $content.='"unionURLName":"'.$unionURLName.'",';
	       $content.='"info_Id":"'.$info_Id.'",';
		   $content.='"artTitle":"'.$artTitle.'",';
		   $content.='"artShrtDesc":"'.$artShrtDesc.'",';
	       $content.='"artDesc":"'.$artDesc.'",';
		   $content.='"createdOn":"'.$createdOn.'",';
		   $content.='"path_Id":"'.$path_Id.'",';
		   $content.='"images":"'.$images.'",';
		   $content.='"status":"'.$status.'",';
		   $content.='"favourites":"'.$favourites.'",';
		   $content.='"votes_up":"'.$votes_up.'",';
		   $content.='"votes_down":"'.$votes_down.'",';
		   $content.='"likes":"'.$likes.'",';
		   $content.='"viewed":"'.$viewed.'",';
		   $content.='"usr_favourite":"'.$usr_favourite.'",';
		   $content.='"usr_liked":"'.$usr_liked.'",';
		   $content.='"usr_vote_up":"'.$usr_vote_up.'",';
		   $content.='"usr_vote_down":"'.$usr_vote_down.'"';
		   $content.='},'; 
		   }
		   $content=chop($content,',');
		   $content.='],';
		  
		   $bizFeedQuery=$newsObj->query_biz_newsfeed($user_Id,$minlocation,$location,$state,$country,$limit_start,$limit_end);
		   
		   $content.='"bizNewsFeed":[';
		   $bizFeedJsonData=$dbObj->getJSONData($bizFeedQuery);
		   $bizFeedDejsonData=json_decode($bizFeedJsonData);
		   for($index=0;$index<count($bizFeedDejsonData);$index++){
		    $biz_Id=$bizFeedDejsonData[$index]->{'biz_Id'};
		    $unionName=$bizFeedDejsonData[$index]->{'unionName'};
		    $domain_Id=$bizFeedDejsonData[$index]->{'domain_Id'};
		    $domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$domain_Id);
		    $subdomain_Id=$bizFeedDejsonData[$index]->{'subdomain_Id'};
		    $subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subdomain_Id);
		    $unionURLName=$bizFeedDejsonData[$index]->{'unionURLName'};
		    $info_Id=$bizFeedDejsonData[$index]->{'info_Id'};
		    $artTitle=$bizFeedDejsonData[$index]->{'artTitle'};
		    $artShrtDesc=$bizFeedDejsonData[$index]->{'artShrtDesc'};
		    $artDesc=$bizFeedDejsonData[$index]->{'artDesc'};
		    $createdOn=$bizFeedDejsonData[$index]->{'createdOn'};
		    $path_Id=$bizFeedDejsonData[$index]->{'path_Id'};
		    $images=$bizFeedDejsonData[$index]->{'images'};
		    $status=$bizFeedDejsonData[$index]->{'status'};
			
			$bizoptsQuery=$newsObj->query_count_biz_opts($user_Id,$info_Id);
		    $bizoptsJSON=$dbObj->getJSONData($bizoptsQuery);
		    $bizoptsdeJSON=json_decode($bizoptsJSON);
		   
		   $favourites=$bizoptsdeJSON[0]->{'favourites'};
		   $votes_up=$bizoptsdeJSON[0]->{'votes_up'};
		   $votes_down=$bizoptsdeJSON[0]->{'votes_down'};
		   $likes=$bizoptsdeJSON[0]->{'likes'};
		   $viewed=$bizoptsdeJSON[0]->{'viewed'};
		   $usr_favourite=$bizoptsdeJSON[0]->{'usr_favourite'};
		   $usr_liked=$bizoptsdeJSON[0]->{'usr_liked'};
		   $usr_vote_up=$bizoptsdeJSON[0]->{'usr_vote_up'};
		   $usr_vote_down=$bizoptsdeJSON[0]->{'usr_vote_down'};
		   
		   $content.='{'; 
		   $content.='"union_Id":"'.$union_Id.'",';
		   $content.='"unionName":"'.$unionName.'",';
		   $content.='"domain_Id":"'.$domain_Id.'",';
		   $content.='"domainName":"'.$domainName.'",';
		   $content.='"subdomain_Id":"'.$subdomain_Id.'",';
		   $content.='"subdomainName":"'.$subdomainName.'",';
		   $content.='"unionURLName":"'.$unionURLName.'",';
	       $content.='"info_Id":"'.$info_Id.'",';
		   $content.='"artTitle":"'.$artTitle.'",';
		   $content.='"artShrtDesc":"'.$artShrtDesc.'",';
	       $content.='"artDesc":"'.$artDesc.'",';
		   $content.='"createdOn":"'.$createdOn.'",';
		   $content.='"path_Id":"'.$path_Id.'",';
		   $content.='"images":"'.$images.'",';
		   $content.='"status":"'.$status.'",';
		   $content.='"favourites":"'.$favourites.'",';
		   $content.='"votes_up":"'.$votes_up.'",';
		   $content.='"votes_down":"'.$votes_down.'",';
		   $content.='"likes":"'.$likes.'",';
		   $content.='"viewed":"'.$viewed.'",';
		   $content.='"usr_favourite":"'.$usr_favourite.'",';
		   $content.='"usr_liked":"'.$usr_liked.'",';
		   $content.='"usr_vote_up":"'.$usr_vote_up.'",';
		   $content.='"usr_vote_down":"'.$usr_vote_down.'"';
		   $content.='},'; 
		   }
		   $content=chop($content,',');
		   $content.=']';
		   $content.='}';
		   echo $content;
		}  else { echo 'MISSING_USER_ID'; }
		} else { echo 'MISSING_LIMIT_END'; }
	  } else { echo 'MISSING_LIMIT_START'; }
	}
	
} else { echo 'MISSING_ACTION'; }

?>