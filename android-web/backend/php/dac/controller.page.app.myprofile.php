<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.user.authentication.php';
require_once '../lal/logic.dom.php';

$logger=Logger::getLogger("controller.page.app.myprofile.php");
/*
http://192.168.1.4/mlh/android-web/backend/php/dac/controller.page.app.myprofile.php?
action=USER_PROFILE_GETBYID&user_Id=USR924357814934&projectURL=http://192.168.1.4/mlh/android-web/&lang=english
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
 } else if($_GET["action"]==='USER_PROFILE_GETBYID') {
	if(isset($_GET["projectURL"]) && isset($_GET["lang"]) && isset($_GET["user_Id"])){
	  $projectURL=$_GET["projectURL"];
	  $lang=$_GET["lang"];
	  $user_Id=$_GET["user_Id"];
	  $authObj=new user_authentication();
	  $dbObj=new Database();
	  $domObj=new module_dom();
	  
	  /* User Information */
	  $userprofileQuery=$authObj->query_getUserProfileByUserId($user_Id);
	  $userprofileJsonData=$dbObj->getJSONData($userprofileQuery);
	 
	  /* User Suscriptions */
	  /* JSONData: {"userSubscriptions":[{"domain_Id":"","domainName":"",
	       "subdomainList":[
							{"subdomain_Id":"","subdomainName":""},
							{"subdomain_Id":"","subdomainName":""}
						   ]}]}
	  
	   */
	  
	  $subscriptionQuery=$authObj->query_getListOfSubscriptions($user_Id);
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
	 
	  /* Community Circle */
	  
	  /* Movement Circle */
	  
	  $content='{';
	  $content.='"userProfile":'.$userprofileJsonData.',';
	  $content.='"userSubscription":'.json_encode($subscriptionArray).',';
	  $content.='"communities":'.'[]'.',';
	  $content.='"movements":'.'[]';
	  $content.='}';
	  echo $content;
	} else {
	  $content='Missing user_Id';
	  echo $content;
    }
 }
} else { echo 'MISSING_ACTION'; }
?>