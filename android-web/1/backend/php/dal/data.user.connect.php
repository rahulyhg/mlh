<?php

class user_connect {
  function query_getUserSubscribeIndustryList($user_Id){
   $sql="SELECT subdomain_Id FROM `user_subscription` WHERE user_Id='".$user_Id."';";
   return $sql;
  }
  
  function query_count_getSuggestionUserList($user_Id,$arry_subdomain,$locality,$location,$state,$country){
    $sql="SELECT ";
	$sql.="count(DISTINCT user_subscription.user_Id) AS suggestions ";
	$sql.="FROM user_subscription, user_account "; 
	$sql.="WHERE user_subscription.user_Id=user_account.user_Id ";
	$sql.="AND ( ";
	$sql.=" user_account.minlocation='".$locality."' OR ";
	$sql.=" user_account.location='".$location."' OR ";
	$sql.=" user_account.state='".$state."' OR ";
	$sql.=" user_account.country='".$country."' OR ";
	for($index=0;$index<count($arry_subdomain);$index++){
	  $sql.=" user_subscription.subdomain_Id =  '".$arry_subdomain[$index]."' OR";
	}
	$sql=chop($sql,"OR");
	$sql.=") ";
    $sql.="AND NOT user_subscription.user_Id = '".$user_Id."' ";
	$sql.="AND user_subscription.user_Id NOT in (SELECT from_userId FROM user_frnds_req WHERE to_userId='".$user_Id."' ) ";  
    $sql.="AND user_subscription.user_Id NOT in (SELECT to_userId FROM `user_frnds_req` WHERE from_userId='".$user_Id."' ) ";
	$sql.="AND user_subscription.user_Id NOT in (SELECT frnd2 FROM user_frnds WHERE frnd1='".$user_Id."' ) ";
	$sql.="AND user_subscription.user_Id NOT in (SELECT frnd1 FROM user_frnds WHERE frnd2='".$user_Id."' )";
	$sql.="ORDER BY RAND() ";
    $sql.="LIMIT 0,10";
	return $sql;
  }
  
  function query_getSuggestionUserList($user_Id,$arry_subdomain,$locality,$location,$state,$country,$limit_start,$limit_end){
    $sql="SELECT ";
	$sql.="DISTINCT user_subscription.user_Id, ";
	$sql.="user_account.surName, user_account.name, user_account.profile_pic, ";
	$sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country ";
	$sql.="FROM user_subscription, user_account "; 
	$sql.="WHERE user_subscription.user_Id=user_account.user_Id ";
	$sql.="AND ( ";
	$sql.=" user_account.minlocation='".$locality."' OR ";
	$sql.=" user_account.location='".$location."' OR ";
	$sql.=" user_account.state='".$state."' OR ";
	$sql.=" user_account.country='".$country."' OR ";
	for($index=0;$index<count($arry_subdomain);$index++){
	  $sql.=" user_subscription.subdomain_Id =  '".$arry_subdomain[$index]."' OR";
	}
	$sql=chop($sql,"OR");
	$sql.=") ";
    $sql.="AND NOT user_subscription.user_Id = '".$user_Id."' ";
	$sql.="AND user_subscription.user_Id NOT in (SELECT from_userId FROM user_frnds_req WHERE to_userId='".$user_Id."' ) ";  
    $sql.="AND user_subscription.user_Id NOT in (SELECT to_userId FROM `user_frnds_req` WHERE from_userId='".$user_Id."' ) ";
	$sql.="AND user_subscription.user_Id NOT in (SELECT frnd2 FROM user_frnds WHERE frnd1='".$user_Id."' ) ";
	$sql.="AND user_subscription.user_Id NOT in (SELECT frnd1 FROM user_frnds WHERE frnd2='".$user_Id."' )";
    $sql.="LIMIT ".$limit_start.",".$limit_end;
	return $sql;
  }

  
 
  
  
  
  
  

  
  
  
  
  
  

  
  
  
  
  function query_searchPeopleByLocation($user_Id,$minlocation,$location,$state,$country,$limit_start,$limit_end){
    $sql="SELECT ";
	$sql.="DISTINCT user_account.user_Id, ";
	$sql.="user_account.surName, ";
	$sql.="user_account.name, ";
	$sql.="user_account.profile_pic, ";   
	$sql.="user_account.minlocation, ";
	$sql.="user_account.location, ";
	$sql.="user_account.state, ";
	$sql.="user_account.country, ";
    $sql.="IF( (STRCMP(user_account.user_Id, user_frnds.frnd1)=0 AND user_frnds.frnd2='".$user_Id."') ";
    $sql.="OR (STRCMP(user_account.user_Id, user_frnds.frnd2)=0 AND user_frnds.frnd1='".$user_Id."'), 'YES',  'NO' ) As isFriend";
	$sql.=" FROM user_account, user_frnds WHERE user_account.acc_active='Y' AND";

	if(strlen($minlocation)>0) { $sql.=" minlocation='".$minlocation."' AND"; }
	if(strlen($location)>0) { $sql.=" location='".$location."' AND"; }
	if(strlen($state)>0) { $sql.=" state='".$state."' AND"; }
	if(strlen($country)>0) { $sql.=" country='".$country."' AND"; }
	$sql=chop($sql,'AND');

	$sql.=" LIMIT ".$limit_start.",".$limit_end.";";
	return $sql;
  }

  

}
	
?>