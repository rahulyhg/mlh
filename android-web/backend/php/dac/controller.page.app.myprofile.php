<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';
require_once '../dal/data.module.user.friends.php';
require_once '../lal/logic.dom.php';

$logger=Logger::getLogger("controller.page.app.myprofile.php");
/*
http://192.168.1.4/mlh/android-web/backend/php/dac/controller.page.app.myprofile.php?
action=USER_PROFILE_GETBYID&profile_user_Id=USR924357814934&user_Id=USR924357814934&projectURL=http://192.168.1.4/mlh/android-web/&lang=english&limit_start=0&limit_end=10
*/
if(isset($_GET["action"])){
 if($_GET["action"]==='UPDATE_USER_PROFILE'){ 
  if(isset($_GET["user_Id"]) && isset($_GET["profile_pic"])){
  $user_Id=$_GET["user_Id"];
  $profile_pic=$_GET["profile_pic"];
  $authObj=new user_authentication();
  $dbObj=new Database();
  $query=$authObj->query_updateProfilePicture($user_Id,$profile_pic);
  echo $dbObj->addupdateData($query);
  } else {
	  $content='Missing ';
	  if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
	  if(!isset($_GET["profile_pic"])){ $content.='profile_pic, '; }
	  $content=chop($content,', ');
	  echo $content;
  }
 } 
 else if($_GET["action"]==='USER_PROFILE_GETBYID') {
	if(isset($_GET["projectURL"]) && isset($_GET["lang"]) && isset($_GET["profile_user_Id"]) && isset($_GET["user_Id"])){
	  $projectURL=$_GET["projectURL"];
	  $lang=$_GET["lang"];
	  $profile_user_Id=$_GET["profile_user_Id"];
	  $user_Id=$_GET["user_Id"];
	  $authObj=new user_authentication();
	  $frndObj=new user_friends();
	  $dbObj=new Database();
	  $domObj=new module_dom();
	  
	  /* User Information */
	  $userprofileQuery=$authObj->query_getUserProfileByUserId($profile_user_Id);
	  $userprofileJsonData=$dbObj->getJSONData($userprofileQuery);
	  /* User Suscriptions */
	  $subscriptionQuery=$authObj->query_getListOfSubscriptions($profile_user_Id);
	  $subscriptionJsonData=$dbObj->getJSONData($subscriptionQuery);
	  $subscriptiondeJsonData=json_decode($subscriptionJsonData);
	  $nonduplicate_domainId_List=array();
	  $subscriptionArray=array();
	  for($i1=0;$i1<count($subscriptiondeJsonData);$i1++){
	    $DOMAINID=$subscriptiondeJsonData[$i1]->{'domain_Id'};
		$tmp1subdomainId=$subscriptiondeJsonData[$i1]->{'subdomain_Id'};
		/* NonDuplicateDomainIdCollection : Start */
		$nonduplicate_domainId_recognizer=false;
		if(count($nonduplicate_domainId_List)>0){
		  for($i2=0;$i2<count($nonduplicate_domainId_List);$i2++){
		    $tmp2domainId=$nonduplicate_domainId_List[$i2];
		    if($DOMAINID===$tmp2domainId){ $nonduplicate_domainId_recognizer=true;break; }
		  }
		}
		/* NonDuplicateDomainIdCollection : End */
		if(!$nonduplicate_domainId_recognizer){
			$nonduplicate_domainId_List[count($nonduplicate_domainId_List)]=$DOMAINID;
			$subDomainList=array();
			for($i2=0;$i2<count($subscriptiondeJsonData);$i2++){
			    $tmpdomainId=$subscriptiondeJsonData[$i2]->{'domain_Id'};
				if($DOMAINID===$tmpdomainId){
				 $SUBDOMAINID=$subscriptiondeJsonData[$i2]->{'subdomain_Id'};
				 $subDomainInfo=array();
				 $subDomainInfo["subdomain_Id"]=$SUBDOMAINID;
				 $subDomainInfo["subdomainName"]=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$DOMAINID,$SUBDOMAINID);
				 $subDomainList[count($subDomainList)]=$subDomainInfo;
				}
			}
			$subscriptionInfo=array();
			$subscriptionInfo["domain_Id"]=$DOMAINID;
			$subscriptionInfo["domainName"]=$domObj->getDomainNameByDomId($projectURL,$lang,$DOMAINID);
			$subscriptionInfo["subdomainList"]=$subDomainList;
			$subscriptionArray[count($subscriptionArray)]=$subscriptionInfo;
		}
	  }
	  /* User Friend */
	  $profileType='OTHER';
	  if($profile_user_Id==$user_Id){ $profileType='OWN'; }
	  else {
	    $frndListQuery=$frndObj->query_getUserFrndListByIds($user_Id);
	    $frndListJsonData=$dbObj->getJSONData($frndListQuery);
	    $frndListdeJsonData=json_decode($frndListJsonData);
		if(count($frndListdeJsonData)>0){
	     for($index=0;$index<count($frndListdeJsonData);$index++){
	       if($profile_user_Id==$frndListdeJsonData[0]->{'frnd'}){ $profileType='FRIEND'; }
	     }
		}
	  }
	  
	  $content='{';
	  $content.='"userProfile":'.$userprofileJsonData.',';
	  $content.='"profileType":"'.$profileType.'",';
	  $content.='"userSubscription":'.json_encode($subscriptionArray);
	  $content.='}';
	  echo $content;
	} else {
	  $content='Missing ';
	  if(isset($_GET["projectURL"])){ $content.='projectURL, '; }
	  if(isset($_GET["lang"])){ $content.='lang, '; }
	  if(isset($_GET["profile_user_Id"])){ $content.='profile_user_Id, '; }
	  $content=chop($content,', ');
	  echo $content;
    }
 }
} else { echo 'MISSING_ACTION'; }
?>