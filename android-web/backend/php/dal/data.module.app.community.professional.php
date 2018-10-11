<?php
class ProfessionalCommunity {
 
 /**************************************************************************************************************************/
 /************************************************ COMMUNITY ***************************************************************/
 /**************************************************************************************************************************/

  function query_createCommunity($union_Id,$domain_Id,$subdomain_Id,$main_branch_Id,$unionName,$aboutUnion,
								$profile_pic, $admin_Id, $issue01, $issue02, $issue03, $issue04, $issue05, $issue06, 
								$issue07, $issue08, $issue09, $issue10){
 /* FUNCTION DESCRIPTION : This Function is used to Create Community
  * PAGES UTILIZED :  
  */
  $sql="INSERT INTO unionprof_account(union_Id, domain_Id, subdomain_Id, main_branch_Id, unionName, aboutUnion, profile_pic, ";
  $sql.="created_On, admin_Id, issue01, issue02, issue03, issue04, issue05, issue06, issue07, issue08, issue09, issue10) ";
  $sql.=" VALUES ('".$union_Id."','".$domain_Id."','".$subdomain_Id."','".$main_branch_Id."','".$unionName."','";
  $sql.=$aboutUnion."','".$profile_pic."','".date('Y-m-d H:i:s')."','".$admin_Id."','".$issue01."','".$issue02;
  $sql.="','".$issue03."','".$issue04."','".$issue05."','".$issue06."','".$issue07."','".$issue08."','".$issue09;
  $sql.="','".$issue10."');";
  return $sql;
 }
 
 function query_getCommunityProfileData($union_Id){
  // unionprof_account  unionprof_branch  unionprof_mem  unionprof_mem_perm  unionprof_mem_req  unionprof_mem_roles
  // unionprof_sup  user_account  newsfeed_info  move_info  subs_dom_info  	subs_subdom_info
  $sql="SELECT ";
  $sql.="subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, subs_subdom_info.domain_Id, ";
  $sql.="subs_subdom_info.subdomainName, unionprof_account.union_Id, unionprof_account.main_branch_Id, ";
  $sql.="unionprof_account.unionName, unionprof_account.unionURLName, unionprof_account.aboutUnion, unionprof_account.profile_pic, ";
  $sql.="unionprof_account.created_On, unionprof_account.admin_Id, unionprof_branch.minlocation, ";
  $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
  $sql.="user_account.username As admin_username, user_account.surName As admin_surName, user_account.name As admin_name, ";
  $sql.="user_account.profile_pic As admin_profilepic, user_account.minlocation As admin_minlocation, ";
  $sql.="user_account.location As admin_location, user_account.state As admin_state, ";
  $sql.="user_account.country As admin_country, ";
  $sql.="(SELECT count(*) FROM unionprof_branch WHERE unionprof_branch.union_Id='".$union_Id."') As noOfBranches, ";
  $sql.="(SELECT count(*) FROM unionprof_mem WHERE unionprof_mem.union_Id='".$union_Id."') As noOfMembers, ";
  $sql.="(SELECT count(*) FROM unionprof_sup WHERE unionprof_sup.union_Id='".$union_Id."') As noOfSupporters ";
  $sql.="FROM subs_dom_info, subs_subdom_info, user_account, unionprof_account, unionprof_branch ";
  $sql.="WHERE unionprof_account.domain_Id=subs_dom_info.domain_Id AND ";
  $sql.="unionprof_account.subdomain_Id=subs_subdom_info.subdomain_Id ";
  $sql.="AND unionprof_account.main_branch_Id=unionprof_branch.branch_Id AND ";
  $sql.="unionprof_account.admin_Id=user_account.user_Id AND unionprof_account.union_Id='".$union_Id."';";
  return $sql;
 }
 
 function query_listOfCommunity_count_byDomainSubdomain($domain_Id,$subdomain_Id){
  $sql="SELECT unionprof_account.domain_Id, ";
  $sql.="(SELECT domainName FROM subs_dom_info WHERE domain_Id=unionprof_account.domain_Id) As domainName, ";
  $sql.="unionprof_account.subdomain_Id, ";
  $sql.="(SELECT subdomainName FROM subs_subdom_info WHERE subdomain_Id=unionprof_account.subdomain_Id) As subdomainName, ";
  $sql.=" count(*) As total_data ";
  $sql.="FROM unionprof_account WHERE domain_Id='".$domain_Id."' AND subdomain_Id='".$subdomain_Id."';";
  return $sql;
 }
 
 function query_listOfCommunity_data_byDomainSubdomain($domain_Id,$subdomain_Id,$limit_start,$limit_end){
  $sql="SELECT  ";
  $sql.="unionName, profile_pic, ";
  $sql.="(SELECT count(*) FROM unionprof_branch WHERE union_Id=unionprof_account.union_Id) As branches, ";
  $sql.="(SELECT count(*) FROM unionprof_mem WHERE union_Id=unionprof_account.union_Id) As members, ";
  $sql.="(SELECT count(*) FROM unionprof_sup WHERE union_Id=unionprof_account.union_Id) As subscribers ";
  $sql.="FROM unionprof_account WHERE domain_Id='".$domain_Id."' AND subdomain_Id='".$subdomain_Id."' ";
  $sql.="LIMIT ".$limit_start.",".$limit_end.";";
  return $sql;
 }
 
 function query_listOfCommunity_count_userBeingOwner($user_Id){
  $sql="SELECT count(*) FROM unionprof_account ";
  $sql.="WHERE unionprof_account.admin_Id='".$user_Id."';";
  return $sql;
 }
 
 function query_listOfCommunity_data_userBeingOwner($user_Id,$limit_start,$limit_end){
  $sql="SELECT unionprof_account.union_Id, unionprof_account.domain_Id, ";
  $sql.="(SELECT domainName FROM subs_dom_info WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id) As domainName, ";
  $sql.="unionprof_account.subdomain_Id, (SELECT subdomainName FROM subs_subdom_info WHERE ";
  $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id) As subdomainName, ";
  $sql.="unionprof_account.unionName, unionprof_account.profile_pic, unionprof_account.created_On, ";
  $sql.="(SELECT CONCAT(minlocation,',',location,',',state,',',country) FROM unionprof_branch WHERE ";
  $sql.="unionprof_branch.branch_Id=unionprof_account.main_branch_Id) As mainbranch, ";
  $sql.="(SELECT count(*) FROM unionprof_mem WHERE unionprof_mem.union_Id=unionprof_account.union_Id AND ";
  $sql.="unionprof_mem.branch_Id=unionprof_account.main_branch_Id) As members, ";
  $sql.="(SELECT count(*) FROM unionprof_sup WHERE unionprof_sup.union_Id=unionprof_account.union_Id) As subscribers ";
  $sql.="FROM unionprof_account WHERE unionprof_account.admin_Id='".$user_Id."' LIMIT ".$limit_start.",".$limit_end.";";
  return $sql;
 }
 
 function query_listOfCommunity_count_userBeingMember($user_Id){
  $sql="SELECT count(*) FROM unionprof_account ";
  $sql.="WHERE unionprof_account.union_Id IN (SELECT DISTINCT union_Id FROM unionprof_mem WHERE user_Id='".$user_Id."');";
  return $sql;
 }
 
 function query_listOfCommunity_data_userBeingMember($user_Id,$limit_start,$limit_end){
  $sql="SELECT unionprof_account.union_Id, unionprof_account.domain_Id, ";
  $sql.="(SELECT domainName FROM subs_dom_info WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id) As domainName, ";
  $sql.="unionprof_account.subdomain_Id, (SELECT subdomainName FROM subs_subdom_info WHERE ";
  $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id) As subdomainName, ";
  $sql.="unionprof_account.unionName, unionprof_account.profile_pic, unionprof_account.created_On, ";
  $sql.="(SELECT CONCAT(minlocation,',',location,',',state,',',country) FROM unionprof_branch WHERE ";
  $sql.="unionprof_branch.branch_Id=unionprof_account.main_branch_Id) As mainbranch, ";
  $sql.="(SELECT count(*) FROM unionprof_mem WHERE unionprof_mem.union_Id=unionprof_account.union_Id AND ";
  $sql.="unionprof_mem.branch_Id=unionprof_account.main_branch_Id) As members, ";
  $sql.="(SELECT count(*) FROM unionprof_sup WHERE unionprof_sup.union_Id=unionprof_account.union_Id) As subscribers ";
  $sql.="FROM unionprof_account ";
  $sql.="WHERE unionprof_account.union_Id IN (SELECT DISTINCT union_Id FROM unionprof_mem WHERE user_Id='".$user_Id."') ";
  $sql.="LIMIT ".$limit_start.",".$limit_end.";";
  return $sql;
 }
 
 function query_listOfCommunity_count_userSubscription($user_Id){
  $sql="SELECT count(*) FROM unionprof_account ";
  $sql.="WHERE unionprof_account.union_Id IN (SELECT DISTINCT union_Id FROM unionprof_sup WHERE user_Id='".$user_Id."');";
  return $sql;
 }
 
 function query_listOfCommunity_data_userSubscription($user_Id,$limit_start,$limit_end){
  $sql="SELECT unionprof_account.union_Id, unionprof_account.domain_Id, ";
  $sql.="(SELECT domainName FROM subs_dom_info WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id) As domainName, ";
  $sql.="unionprof_account.subdomain_Id, (SELECT subdomainName FROM subs_subdom_info WHERE ";
  $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id) As subdomainName, ";
  $sql.="unionprof_account.unionName, unionprof_account.profile_pic, unionprof_account.created_On, ";
  $sql.="(SELECT CONCAT(minlocation,',',location,',',state,',',country) FROM unionprof_branch WHERE ";
  $sql.="unionprof_branch.branch_Id=unionprof_account.main_branch_Id) As mainbranch, ";
  $sql.="(SELECT count(*) FROM unionprof_mem WHERE unionprof_mem.union_Id=unionprof_account.union_Id AND ";
  $sql.="unionprof_mem.branch_Id=unionprof_account.main_branch_Id) As members, ";
  $sql.="(SELECT count(*) FROM unionprof_sup WHERE unionprof_sup.union_Id=unionprof_account.union_Id) As subscribers ";
  $sql.="FROM unionprof_account ";
  $sql.="WHERE unionprof_account.union_Id IN (SELECT DISTINCT union_Id FROM unionprof_sup WHERE user_Id='".$user_Id."') ";
  $sql.="LIMIT ".$limit_start.",".$limit_end.";";
  return $sql;
 }
 
 
 function query_updateCommunityData($union_Id,$domain_Id,$subdomain_Id,$main_branch_Id,$unionName,
				$unionURLName,$profile_pic, $admin_Id){
 /* FUNCTION DESCRIPTION : This Function is used to Update an Existing Community
  * PAGES UTILIZED :  
  */
  $sql="UPDATE unionprof_account SET ";
  if(strlen($domain_Id)>0)   {  $sql.=" domain_Id='".$domain_Id."',"; }
  if(strlen($subdomain_Id)>0){  $sql.=" subdomain_Id='".$subdomain_Id."',";  }
  if(strlen($main_branch_Id)>0){  $sql.=" main_branch_Id='".$main_branch_Id."',";  }
  if(strlen($unionName)>0){ $sql.=" unionName='".$unionName."',";  }
  if(strlen($unionURLName)>0){  $sql.=" unionURLName='".$unionURLName."',";  }
  if(strlen($profile_pic)>0){  $sql.=" profile_pic='".$profile_pic."',";  }
  if(strlen($admin_Id)>0){  $sql.=" admin_Id='".$admin_Id."',";  }
  $sql=chop($sql,',');
  $sql.=" WHERE union_Id='".$union_Id."';";
  return $sql;
 }
 
 /**************************************************************************************************************************/
 /************************************************ COMMUNITY BRANCH ********************************************************/
 /**************************************************************************************************************************/

 function query_updateBranchData($branch_Id,$union_Id,$minlocation,$location,$state, $country){
 /* FUNCTION DESCRIPTION : This Function is used to Update the Details of Existing Branch in a Community
  * PAGES UTILIZED :  
  */
   $sql="UPDATE unionprof_branch SET ";
   if(strlen($minlocation)>0) { $sql.=" minlocation='".$minlocation."',";  }
   if(strlen($location)>0) { $sql.=" location='".$location."',";  }
   if(strlen($state)>0) { $sql.=" state='".$state."',";  }
   if(strlen($country)>0) { $sql.=" country='".$country."'";  }
   $sql=chop($sql,',');
   $sql.=" WHERE branch_Id='".$branch_Id."' AND union_Id='".$union_Id."';";
   return $sql;
 }
 
 function query_count_getListOfBranchesInACommunity($union_Id){
 /* FUNCTION DESCRIPTION : This Function is used to get the Count of List of Branches in a Community 
  * PAGES UTILIZED : 
  */
   $sql="SELECT count(*) FROM unionprof_branch WHERE union_Id='".$union_Id."';";
   return $sql;
 }
 
 function query_data_getListOfBranchesInACommunity($union_Id,$limit_start,$limit_end){
 /* FUNCTION DESCRIPTION : This Function is used to get the List of Branches in a Community on Limit Size
  * PAGES UTILIZED : 
  */
   $sql="SELECT unionprof_branch.branch_Id, unionprof_branch.union_Id, unionprof_branch.minlocation, ";
   $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
   $sql.="(SELECT count(DISTINCT user_Id) FROM unionprof_mem WHERE unionprof_mem.branch_Id=unionprof_branch.branch_Id) As members ";
   $sql.="FROM unionprof_branch WHERE union_Id='".$union_Id."' ";
   $sql.="LIMIT ".$limit_start.",".$limit_end;
   return $sql;
 }
 
 /**************************************************************************************************************************/
 /******************************************* COMMUNITY BRANCH MEMBER ROLES ************************************************/
 /**************************************************************************************************************************/

 function query_updateMemberRoles($role_Id,$roleName){
 /* FUNCTION DESCRIPTION : This Function is used to update Member Roles in a Branch of a Community.
  * PAGES UTILIZED : 
  */
   $sql="UPDATE unionprof_mem_roles SET roleName='".$roleName."' WHERE role_Id='".$role_Id."';";
   return $sql;
 }
 
 function query_count_getListOfRolesInABranch($union_Id,$branch_Id){
 /* FUNCTION DESCRIPTION : This Function provides list of Roles in a Branch.
  * PAGES UTILIZED : 
  */
   $sql="SELECT * FROM unionprof_mem_roles WHERE union_mem_roles.union_Id='".$union_Id."' ";
   $sql.="AND union_mem_roles.branch_Id='".$branch_Id."'; ";
   return $sql;
 }
 
 function query_data_getListOfRolesInABranch($union_Id,$branch_Id,$limit_start,$limit_end){
 /* FUNCTION DESCRIPTION : This Function provides daata of list of Roles in a Community including list of Members 
  *                        Details in Each Row.
  * PAGES UTILIZED : 
  */
  $sql="SELECT unionprof_mem_roles.role_Id, unionprof_mem_roles.roleName, ";
  $sql.="GROUP_CONCAT(CONCAT('{\"name\":\"',user_account.surName,' ',";
  $sql.="user_account.name,'\",\"profile_pic\":\"',user_account.profile_pic,'\",\"minlocation\":\"',";
  $sql.="user_account.minlocation,'\",\"location\":\"',user_account.location,'\",\"state\":\"',user_account.state,";
  $sql.="'\",\"country\":\"',user_account.country,'\"}')) ";
  $sql.="FROM unionprof_mem_roles, unionprof_mem, user_account WHERE unionprof_mem_roles.union_Id=unionprof_mem.union_Id ";
  $sql.="AND unionprof_mem_roles.branch_Id=unionprof_mem.branch_Id ";
  $sql.="AND unionprof_mem_roles.union_Id='".$union_Id."' ";
  $sql.="AND unionprof_mem_roles.branch_Id='".$branch_Id."' ";
  $sql.="AND unionprof_mem.user_Id=user_account.user_Id GROUP BY unionprof_mem_roles.role_Id ";
  $sql.="LIMIT ".$limit_start.",".$limit_end;
  return $sql;
 }
 
}

?>