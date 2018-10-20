<?php session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
require_once '../dal/data.module.app.community.php';
require_once '../lal/logic.dom.php';
$logger=Logger::getLogger("controller.page.app.community.my.php");
if(isset($_GET["action"])){
if($_GET["action"]=='USERCREATED_COMMUNITYLIST_COUNT'){
 if(isset($_GET["user_Id"])){
   $user_Id=$_GET["user_Id"];
   $dbObj=new Database();
   $comObj=new app_community();
   $query=$comObj->query_count_communitiesCreatedList($user_Id);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { echo 'MISSING_USERID'; }
} 
else if($_GET["action"]=='USERCREATED_COMMUNITYLIST'){
 if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
  $projectURL=$_SESSION["PROJECT_URL"];
  $lang=$_SESSION["USR_LANG"];
  $user_Id=$_GET["user_Id"];
  $limit_start=$_GET["limit_start"];
  $limit_end=$_GET["limit_end"];
  $dbObj=new Database();
  $comObj=new app_community();
  $domObj=new module_dom();
  $query=$comObj->query_communitiesCreatedList($user_Id,$limit_start,$limit_end);
  $jsonData=$dbObj->getJSONData($query);
  $dejsonData=json_decode($jsonData);
  $content='{"communityListCreated":[';
  if(count($dejsonData)>0){ 
    for($index=0;$index<count($dejsonData);$index++){
     $union_Id=$dejsonData[$index]->{'union_Id'};
	 $domain_Id=$dejsonData[$index]->{'domain_Id'};
	 $subdomain_Id=$dejsonData[$index]->{'subdomain_Id'};
	 $domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$domain_Id);
	 $subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subdomain_Id);
	 $unionName=$dejsonData[$index]->{'unionName'};
	 $unionURLName=$dejsonData[$index]->{'unionURLName'};
	 $profile_pic=$dejsonData[$index]->{'profile_pic'};
	 $minlocation=$dejsonData[$index]->{'minlocation'};
	 $location=$dejsonData[$index]->{'location'};
	 $state=$dejsonData[$index]->{'state'};
	 $country=$dejsonData[$index]->{'country'};
	 $created_On=$dejsonData[$index]->{'created_On'};
	 $admin_Id=$dejsonData[$index]->{'admin_Id'};
	 
	 $memQuery=$comObj->query_communityMembersCount($union_Id);
	 $memjsonData=$dbObj->getJSONData($memQuery);
	 $memdejsonData=json_decode($memjsonData);
	 
	 $supQuery=$comObj->query_communitySupportersCount($union_Id);
	 $supjsonData=$dbObj->getJSONData($supQuery);
	 $supdejsonData=json_decode($supjsonData);
	 
	 $content.='{';
	 $content.='"union_Id":"'.$union_Id.'",';
	 $content.='"members_count":"'.$memdejsonData[0]->{'count(*)'}.'",';
	 $content.='"supporters_count":"'.$supdejsonData[0]->{'count(*)'}.'",';
	 $content.='"domain_Id":"'.$domain_Id.'",';
	 $content.='"domainName":"'.$domainName.'",';
	 $content.='"subdomain_Id":"'.$subdomain_Id.'",';
	 $content.='"subdomainName":"'.$subdomainName.'",';
	 $content.='"unionName":"'.$unionName.'",';
	 $content.='"unionURLName":"'.$unionURLName.'",';
	 $content.='"profile_pic":"'.$profile_pic.'",';
	 $content.='"minlocation":"'.$minlocation.'",';
	 $content.='"location":"'.$location.'",';
	 $content.='"state":"'.$state.'",';
	 $content.='"country":"'.$country.'",';
	 $content.='"created_On":"'.$created_On.'",';
	 $content.='"admin_Id":"'.$admin_Id.'"';
	 $content.='},';
	}
	$content=chop($content,',');
  }
  $content.=']}';
  echo $content;
 } else { 
    $content='Missing ';
	if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
    if(!isset($_GET["limit_start"])){ $content.=' limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,", ");
    echo $content; 
  }
} 
else if($_GET["action"]=='USERBEINGMEMBER_COMMUNITYLIST_COUNT'){
 if(isset($_GET["user_Id"])){
   $user_Id=$_GET["user_Id"];
   $dbObj=new Database();
   $comObj=new app_community();
   $query=$comObj->query_count_communitiesUserBeingMember($user_Id);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { echo 'MISSING_USERID'; }
} 
else if($_GET["action"]=='USERBEINGMEMBER_COMMUNITYLIST'){
 if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
  $projectURL=$_SESSION["PROJECT_URL"];
  $lang=$_SESSION["USR_LANG"];
  $user_Id=$_GET["user_Id"];
  $limit_start=$_GET["limit_start"];
  $limit_end=$_GET["limit_end"];
  $dbObj=new Database();
  $comObj=new app_community();
  $domObj=new module_dom();
  $query=$comObj->query_communitiesUserBeingMember($user_Id,$limit_start,$limit_end);
  $jsonData=$dbObj->getJSONData($query);
  $dejsonData=json_decode($jsonData);
  
  $content='{"beingMemberCommunityList":[';
  if(count($dejsonData)>0){ 
    for($index=0;$index<count($dejsonData);$index++){
     $union_Id=$dejsonData[$index]->{'union_Id'};
	 $domain_Id=$dejsonData[$index]->{'domain_Id'};
	 $subdomain_Id=$dejsonData[$index]->{'subdomain_Id'};
	 $domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$domain_Id);
	 $subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subdomain_Id);
	 $unionName=$dejsonData[$index]->{'unionName'};
	 $unionURLName=$dejsonData[$index]->{'unionURLName'};
	 $profile_pic=$dejsonData[$index]->{'profile_pic'};
	 $minlocation=$dejsonData[$index]->{'minlocation'};
	 $location=$dejsonData[$index]->{'location'};
	 $state=$dejsonData[$index]->{'state'};
	 $country=$dejsonData[$index]->{'country'};
	 $created_On=$dejsonData[$index]->{'created_On'};
	 $admin_Id=$dejsonData[$index]->{'admin_Id'};
	 $roleName=$dejsonData[$index]->{'roleName'};
	 $isAdmin=$dejsonData[$index]->{'isAdmin'};
	 $addedOn=$dejsonData[$index]->{'addedOn'};
	 $status=$dejsonData[$index]->{'status'};
	  
	 $memQuery=$comObj->query_communityMembersCount($union_Id);
     $memjsonData=$dbObj->getJSONData($memQuery);
     $memdejsonData=json_decode($memjsonData);
	 
     $supQuery=$comObj->query_communitySupportersCount($union_Id);
     $supjsonData=$dbObj->getJSONData($supQuery);
     $supdejsonData=json_decode($supjsonData);
	 
	 $content.='{';
	 $content.='"union_Id":"'.$union_Id.'",';
	 $content.='"members_count":"'.$memdejsonData[0]->{'count(*)'}.'",';
	 $content.='"supporters_count":"'.$supdejsonData[0]->{'count(*)'}.'",';
	 $content.='"domain_Id":"'.$domain_Id.'",';
	 $content.='"domainName":"'.$domainName.'",';
	 $content.='"subdomain_Id":"'.$subdomain_Id.'",';
	 $content.='"subdomainName":"'.$subdomainName.'",';
	 $content.='"unionName":"'.$unionName.'",';
	 $content.='"unionURLName":"'.$unionURLName.'",';
	 $content.='"profile_pic":"'.$profile_pic.'",';
	 $content.='"minlocation":"'.$minlocation.'",';
	 $content.='"location":"'.$location.'",';
	 $content.='"state":"'.$state.'",';
	 $content.='"country":"'.$country.'",';
	 $content.='"created_On":"'.$created_On.'",';
	 $content.='"admin_Id":"'.$admin_Id.'",';
	 $content.='"roleName":"'.$roleName.'",';
	 $content.='"isAdmin":"'.$isAdmin.'",';
	 $content.='"addedOn":"'.$addedOn.'",';
	 $content.='"status":"'.$status.'"';
	 $content.='},';
	}
	$content=chop($content,',');
  }
  $content.=']}';
  echo $content;
 } else { 
    $content='Missing ';
	if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
    if(!isset($_GET["limit_start"])){ $content.=' limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,", ");
    echo $content; 
  }
}
else if($_GET["action"]=='USERBEINGSUPPORT_COMMUNITYLIST_COUNT'){
 if(isset($_GET["user_Id"])){
   $dbObj=new Database();
   $user_Id=$_GET["user_Id"];
   $comObj=new app_community();
   $query=$comObj->query_count_communitiesUserBeingSupporting($user_Id);
   $jsonData=$dbObj->getJSONData($query);
   $dejsonData=json_decode($jsonData);
   echo $dejsonData[0]->{'count(*)'};
 } else { echo 'MISSING_USERID'; }
}
else if($_GET["action"]=='USERBEINGSUPPORT_COMMUNITYLIST'){
 if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
  $projectURL=$_SESSION["PROJECT_URL"];
  $lang=$_SESSION["USR_LANG"];
  $user_Id=$_GET["user_Id"];
  $limit_start=$_GET["limit_start"];
  $limit_end=$_GET["limit_end"];
  $dbObj=new Database();
  $comObj=new app_community();
  $domObj=new module_dom();
  $query=$comObj->query_communitiesUserBeingSupporting($user_Id,$limit_start,$limit_end);
  $jsonData=$dbObj->getJSONData($query);
  $dejsonData=json_decode($jsonData);
  $content='{"beingSupportingCommunityList":[';
  if(count($dejsonData)>0){ 
    for($index=0;$index<count($dejsonData);$index++){
     $union_Id=$dejsonData[$index]->{'union_Id'};
	 $domain_Id=$dejsonData[$index]->{'domain_Id'};
	 $subdomain_Id=$dejsonData[$index]->{'subdomain_Id'};
	 $domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$domain_Id);;
	 $subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subdomain_Id);
	 $unionName=$dejsonData[$index]->{'unionName'};
	 $unionURLName=$dejsonData[$index]->{'unionURLName'};
	 $profile_pic=$dejsonData[$index]->{'profile_pic'};
	 $minlocation=$dejsonData[$index]->{'minlocation'};
	 $location=$dejsonData[$index]->{'location'};
	 $state=$dejsonData[$index]->{'state'};
	 $country=$dejsonData[$index]->{'country'};
	 $created_On=$dejsonData[$index]->{'created_On'};
	 $admin_Id=$dejsonData[$index]->{'admin_Id'};
	 $supportOn=$dejsonData[$index]->{'supportOn'};
	  
	 $memQuery=$comObj->query_communityMembersCount($union_Id);
     $memjsonData=$dbObj->getJSONData($memQuery);
     $memdejsonData=json_decode($memjsonData);
	 
     $supQuery=$comObj->query_communitySupportersCount($union_Id);
     $supjsonData=$dbObj->getJSONData($supQuery);
     $supdejsonData=json_decode($supjsonData);
	 
	 $content.='{';
	 $content.='"union_Id":"'.$union_Id.'",';
	 $content.='"members_count":"'.$memdejsonData[0]->{'count(*)'}.'",';
	 $content.='"supporters_count":"'.$supdejsonData[0]->{'count(*)'}.'",';
	 $content.='"domain_Id":"'.$domain_Id.'",';
	 $content.='"domainName":"'.$domainName.'",';
	 $content.='"subdomain_Id":"'.$subdomain_Id.'",';
	 $content.='"subdomainName":"'.$subdomainName.'",';
	 $content.='"unionName":"'.$unionName.'",';
	 $content.='"unionURLName":"'.$unionURLName.'",';
	 $content.='"profile_pic":"'.$profile_pic.'",';
	 $content.='"minlocation":"'.$minlocation.'",';
	 $content.='"location":"'.$location.'",';
	 $content.='"state":"'.$state.'",';
	 $content.='"country":"'.$country.'",';
	 $content.='"created_On":"'.$created_On.'",';
	 $content.='"admin_Id":"'.$admin_Id.'",';
	 $content.='"supportOn":"'.$supportOn.'"';
	 $content.='},';
	}
	$content=chop($content,',');
  }
  $content.=']}';
  echo $content;
 } else { 
    $content='Missing ';
	if(!isset($_GET["user_Id"])){ $content.='user_Id, '; }
    if(!isset($_GET["limit_start"])){ $content.=' limit_start, '; }
	if(!isset($_GET["limit_end"])){ $content.='limit_end, '; }
	$content=chop($content,", ");
    echo $content; 
  }
}
else if($_GET["action"]=='BROWSE_COMMUNITIES_COUNT'){
 $category=''; if(isset($_GET["browse_category"])){ $category=$_GET["browse_category"]; }
 $subCategory=''; if(isset($_GET["browse_subCategory"])){ $subCategory=$_GET["browse_subCategory"]; }
 $country='';  if(isset($_GET["browse_country"])){ $country=$_GET["browse_country"]; }
 $state='';  if(isset($_GET["browse_state"])){ $state=$_GET["browse_state"]; }
 $location='';  if(isset($_GET["browse_location"])){ $location=$_GET["browse_location"]; }
 $minlocation='';  if(isset($_GET["browse_minlocation"])){ $minlocation=$_GET["browse_minlocation"]; }
 $communityObj=new app_community();
 $dbObj=new Database();
 $query=$communityObj->query_count_browseCommunitiesList($category, $subCategory, $country, $state, $location, $minlocation);
 $jsonData=$dbObj->getJSONData($query); 
 $dejsonData=json_decode($jsonData);
 echo $dejsonData[0]->{'count(*)'};
}
else if($_GET["action"]=='BROWSE_COMMUNITIES'){
 if(isset($_GET["projectURL"]) && isset($_GET["lang"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
 $projectURL=$_GET["projectURL"];
 $lang=$_GET["lang"];
 $limit_start=$_GET["limit_start"];
 $limit_end=$_GET["limit_end"];
 $category=''; if(isset($_GET["browse_category"])){ $category=$_GET["browse_category"]; }
 $subCategory=''; if(isset($_GET["browse_subCategory"])){ $subCategory=$_GET["browse_subCategory"]; }
 $country='';  if(isset($_GET["browse_country"])){ $country=$_GET["browse_country"]; }
 $state='';  if(isset($_GET["browse_state"])){ $state=$_GET["browse_state"]; }
 $location='';  if(isset($_GET["browse_location"])){ $location=$_GET["browse_location"]; }
 $minlocation='';  if(isset($_GET["browse_minlocation"])){ $minlocation=$_GET["browse_minlocation"]; }
 $communityObj=new app_community();
 $domObj=new module_dom();
 $dbObj=new Database();
 $query=$communityObj->query_browseCommunitiesList($category, $subCategory, $country, $state, $location, $minlocation);
 $jsonData=$dbObj->getJSONData($query); 
 $dejsonData=json_decode($jsonData);
 if(count($dejsonData)>0){
   $content='[';
   for($index=0;$index<count($dejsonData);$index++){
	$union_Id=$dejsonData[$index]->{'union_Id'};
	$domain_Id=$dejsonData[$index]->{'domain_Id'};
	$subdomain_Id=$dejsonData[$index]->{'subdomain_Id'};
	$domainName=$domObj->getDomainNameByDomId($projectURL,$lang,$domain_Id);
	$subdomainName=$domObj->getSubDomainNameByDomSubDomId($projectURL,$lang,$domain_Id,$subdomain_Id);
	$unionName=$dejsonData[$index]->{'unionName'};
	$unionURLName=$dejsonData[$index]->{'unionURLName'};
	$profile_pic=$dejsonData[$index]->{'profile_pic'};
	$minlocation=$dejsonData[$index]->{'minlocation'};
	$location=$dejsonData[$index]->{'location'};
	$state=$dejsonData[$index]->{'state'};
	$country=$dejsonData[$index]->{'country'};
	$created_On=$dejsonData[$index]->{'created_On'};
	
	$memQuery=$communityObj->query_communityMembersCount($union_Id);
	$memQueryJsonData=$dbObj->getJSONData($memQuery);
	$memQueryDeJsonData=json_decode($memQueryJsonData);
	$memberCount=$memQueryDeJsonData[0]->{'count(*)'};
	
	$supQuery=$communityObj->query_communitySupportersCount($union_Id);
	$supQueryJsonData=$dbObj->getJSONData($supQuery);
	$supQueryDeJsonData=json_decode($supQueryJsonData);
	$supportersCount=$supQueryDeJsonData[0]->{'count(*)'};
	
	$content.='{';
	$content.='"union_Id":"'.$union_Id.'",';
	$content.='"domain_Id":"'.$domain_Id.'",';
	$content.='"domainName":"'.$domainName.'",';
	$content.='"subdomain_Id":"'.$subdomain_Id.'",';
	$content.='"subdomainName":"'.$subdomainName.'",';
	$content.='"unionName":"'.$unionName.'",';
	$content.='"unionURLName":"'.$unionURLName.'",';
	$content.='"profile_pic":"'.$profile_pic.'",';
	$content.='"minlocation":"'.$minlocation.'",';
	$content.='"location":"'.$location.'",';
	$content.='"state":"'.$state.'",';
	$content.='"country":"'.$country.'",';
	$content.='"created_On":"'.$created_On.'",';
	$content.='"memberCount":"'.$memberCount.'",';
	$content.='"supportersCount":"'.$supportersCount.'"';
	$content.='},';
   }
   $content=chop($content,',');
   $content.=']';
   echo $content;
 }
 } else { 
    $content='Missing';
	if(!isset($_GET["projectURL"])){ $content.=' projectURL,'; }
	if(!isset($_GET["lang"])){ $content.=' lang,'; }
	if(!isset($_GET["limit_start"])){ $content.=' limit_start,'; }
	if(!isset($_GET["limit_end"])){ $content.=' limit_end,'; }
	$content=chop($content,',');
    echo $content; 
 }
}

else { echo 'INVALID_ACTION_INPUT'; }
} else { echo 'MISSING_ACTION_INPUT'; }
?>