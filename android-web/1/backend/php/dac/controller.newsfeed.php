<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
/* Dashboard related Data Access Layer */
require_once '../dal/data.newsfeed.php';
require_once '../lal/lal.appIdentity.php';
require_once '../lal/lal.dom.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 if(isset($_GET["action"])) {
    else if($_GET["action"]=='WRITE_NEWSFEED') {
	   if(isset($_GET["union_Id"]) 
	      && isset($_GET["images"]) && isset($_GET["artTitle"]) && isset($_GET["artShrtDesc"]) 
		  && isset($_GET["artDesc"])) {
		    $newsObj=new newsfeed();
			$idObj=new identity();
			$dbObj=new Database();
			
		    $info_Id=$idObj->dash_info_union_id();
			$union_Id=$_GET["union_Id"]; /* UnionId or BizId */
			$path_Id='001';
			
			$artTitle=rawurlencode($_GET["artTitle"]);
			$artShrtDesc=rawurlencode($_GET["artShrtDesc"]);
			$artDesc=rawurlencode($_GET["artDesc"]);
			
			$images=$_GET["images"];
			$status='ACTIVE'; /* artWriter_Id is Union Activate or else Deactivate */
			
			$infoQuery=$newsObj->query_union_addNewsFeed($info_Id, $union_Id, $artTitle, 
			                         $artShrtDesc, $artDesc, $path_Id, $images, $status);
			echo $dbObj->addupdateData($infoQuery);
		}
		else {
		    $content='MISSING ';
			if(isset($_GET["union_Id"])) { $content.='union_Id,'; }
		    if(isset($_GET["images"])) { $content.='images,'; }
			if(isset($_GET["artTitle"])) { $content.='artTitle,'; }
		    if(isset($_GET["artShrtDesc"])) { $content.='artShrtDesc,'; }
			if(isset($_GET["artDesc"])) { $content.='artDesc,'; }
			$content=chop($content,',');
			echo $content;
		}
	}
	else if($_GET["action"]=='COMMUNITYADMIN_NEWSFEED_LISTCOUNT'){
	   if(isset($_GET["union_Id"])){
	      $union_Id=$_GET["union_Id"];
		  $dbObj=new Database();
		  $newsObj=new newsfeed();
		  
		  $newsFeedQuery=$newsObj->query_count_communityAdminNewsFeedList($union_Id);
		  $jsonData=$dbObj->getJSONData($newsFeedQuery);
		  $dejsonData=json_decode($jsonData);
		  echo $dejsonData[0]->{'count(*)'};
		  
	  } else { echo 'MISSING_UNION_ID'; }
	}
	else if($_GET["action"]=='COMMUNITYADMIN_NEWSFEED_LIST'){
	  if(isset($_GET["union_Id"])){
	      if(isset($_GET["limit_start"])){
		     if(isset($_GET["limit_end"])){
			      $limit_start=$_GET["limit_start"];
				  $limit_end=$_GET["limit_end"];
		          $union_Id=$_GET["union_Id"];
				  $dbObj=new Database();
				  $newsObj=new newsfeed();
				  
				  $newsFeedQuery=$newsObj->query_union_communityAdminNewsFeedList($union_Id,$limit_start,$limit_end);
				  echo $dbObj->getJSONData($newsFeedQuery);
		     } else { echo 'MISSING_LIMIT_END'; }
		  } else { echo 'MISSING_LIMIT_START'; }
	  } else { echo 'MISSING_UNION_ID'; }
	}
	else if($_GET["action"]=='PUBLIC_USERFAV_NEWSFEED_COUNT'){
	       $dbObj=new Database();
		   $newsObj=new newsfeed();
		   
	       $user_Id=$_SESSION["AUTH_USER_ID"];
	    /* Public NewsFeed Count */
		   $minlocation='';$location='';$state='';$country='';
		   if(isset($_GET["minlocation"])){ $minlocation=$_GET["minlocation"]; }
		   if(isset($_GET["location"])){ $location=$_GET["location"]; }
		   if(isset($_GET["state"])){ $state=$_GET["state"]; }
		   if(isset($_GET["country"])){ $country=$_GET["country"]; }
		  
		   $unionFeedQuery=$newsObj->query_count_union_newsfeed($user_Id);
		   $bizFeedQuery=$newsObj->query_count_biz_newsfeed($user_Id,$minlocation,$location,$state,$country);
		   $union_dejsonData=json_decode($dbObj->getJSONData($unionFeedQuery));
		   $biz_dejsonData=json_decode($dbObj->getJSONData($bizFeedQuery));
		   $public_totalData=(intval($union_dejsonData[0]->{'count(*)'})+intval($biz_dejsonData[0]->{'count(*)'}));

		/* User Favourite NewFeed Count */
			$unionFavQuery=$newsObj->query_count_user_fav_unionNewsFeed($user_Id);
			$bizFavQuery=$newsObj->query_count_user_fav_bizNewsFeed($user_Id);
			$unionJsonData=$dbObj->getJSONData($unionFavQuery);
			$bizJsonData=$dbObj->getJSONData($bizFavQuery);
			$uniondeJsonData=json_decode($unionJsonData);
			$bizdeJsonData=json_decode($bizJsonData);
			$fav_totalData=(intval($uniondeJsonData[0]->{'count(*)'})+intval($bizdeJsonData[0]->{'count(*)'}));
			
			$content='{';
			$content.='"total_public_newsFeed":'.$public_totalData.',';
			$content.='"total_fav_newsFeed":'.$fav_totalData;
			$content.='}';
			echo $content;
	}
	else if($_GET["action"]=='PUBLIC_NEWSFEED'){
	   if(isset($_GET["limit_start"])){
	     if(isset($_GET["limit_end"])){
		   $limit_start=$_GET["limit_start"];
		   $limit_end=$_GET["limit_end"];
		   $user_Id=$_SESSION["AUTH_USER_ID"];
		   $minlocation='';$location='';$state='';$country='';
		   if(isset($_GET["minlocation"])){ $minlocation=$_GET["minlocation"]; }
		   if(isset($_GET["location"])){ $location=$_GET["location"]; }
		   if(isset($_GET["state"])){ $state=$_GET["state"]; }
		   if(isset($_GET["country"])){ $country=$_GET["country"]; }
		   $dbObj=new Database();
		   $newsObj=new newsfeed();
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
		   $domainName=$domObj->getDomainNameByDomId($domain_Id);
		   $subdomain_Id=$unionFeedDejsonData[$index]->{'subdomain_Id'};
		   $subdomainName=$domObj->getSubDomainNameByDomSubDomId($domain_Id,$subdomain_Id);
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
		   
		   $content.='"bizNewsFeed":'.$dbObj->getJSONData($bizFeedQuery);
		   $content.='}';
		   echo $content;
		} else { echo 'MISSING_LIMIT_END'; }
	  } else { echo 'MISSING_LIMIT_START'; }
	}
	else if($_GET["action"]=='USER_FAV_NEWSFEED'){
	  if(isset($_GET["limit_start"])){
	    if(isset($_GET["limit_end"])){
		    $user_Id=$_SESSION["AUTH_USER_ID"];
			$limit_start=$_GET["limit_start"];
			$limit_end=$_GET["limit_end"];
			$dashObj=new newsfeed();
			$unionFavQuery=$dashObj->query_user_fav_unionNewsFeed($user_Id,$limit_start,$limit_end);
			$bizFavQuery=$dashObj->query_user_fav_bizNewsFeed($user_Id,$limit_start,$limit_end);
			$dbObj=new Database();
			$content='{';
			$content.='"FavUnionNewsFeed":'.$dbObj->getJSONData($unionFavQuery).',';
			$content.='"FavBizNewsFeed":'.$dbObj->getJSONData($bizFavQuery);
			$content.='}';
			echo $content;
		} else { echo 'MISSING_LIMIT_END'; }
	  } else { echo 'MISSING_LIMIT_START'; }
	}
	
	
	
	
	else if($_GET["action"]=='ADD_NEWSFEED_TO_USRVIEWED'){
	    if(isset($_GET["info_Id"])){ 
	      if(isset($_GET["user_Id"])){
	        if(isset($_GET["newsType"])){
			    $idObj=new identity();
				$view_Id=$idObj->dash_info_user_views_id();
				$info_Id=$_GET["info_Id"];
				$user_Id=$_GET["user_Id"];
				$newsType=$_GET["newsType"];
				$dbObj=new Database();
		        $nfObj=new newsfeed();
				$query=$nfObj->query_newsFeed_noteUserViewed($view_Id, $info_Id, $user_Id, $newsType);
				echo $dbObj->addupdateData($query);
	        } else { echo 'MISSING_NEWSTYPE'; }
	      } else { echo 'MISSING_USER_ID'; }
	    } else { echo 'MISSING_INFO_ID'; }
	}
	else if($_GET["action"]==''){
	
	}
	else {
		echo 'INVALID_ACTION';
	}
 } else {
    echo 'MISSING_ACTION_INPUT';
 }
?>
