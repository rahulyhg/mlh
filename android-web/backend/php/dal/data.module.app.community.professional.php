<?php
class ProfessionalCommunity {
 
 /**************************************************************************************************************************/
 /************************************************ COMMUNITY ***************************************************************/
 /**************************************************************************************************************************/
 
 function query_createCommunity($union_Id,$domain_Id,$subdomain_Id,$main_branch_Id,$unionName,$unionURLName,
								$profile_pic, $admin_Id){
 /* FUNCTION DESCRIPTION : This Function is used to Create Community
  * PAGES UTILIZED :  
  */
  $sql="INSERT INTO unionprof_account(union_Id, domain_Id, subdomain_Id, main_branch_Id, unionName, unionURLName, ";
  $sql.="profile_pic, created_On, admin_Id) VALUES ('".$union_Id."','".$domain_Id."','".$subdomain_Id."','";
  $sql.=$main_branch_Id."','".$unionName."','".$unionURLName."','".$profile_pic."','".date('Y-m-d H:i:s')."','".$admin_Id."');";
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
 
 function query_createCommunityBranch($branch_Id, $union_Id, $minlocation, $location, $state, $country){
 /* FUNCTION DESCRIPTION : This Function is used to create Community Branch
  * PAGES UTILIZED :
  */
   $sql="INSERT INTO unionprof_branch(branch_Id, union_Id, minlocation, location, state, country, createdOn) ";
   $sql.="VALUES ('".$branch_Id."','".$union_Id."','".$minlocation."','".$location."','".$state."','".$country;
   $sql.="','".date('Y-m-d H:i:s')."');";
   return $sql;
 }
 
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
 
 function query_createMemberRoles($role_Id, $union_Id, $branch_Id, $roleName){
 /* FUNCTION DESCRIPTION : This Function creates Member Roles in a Branch of a Community.
  * PAGES UTILIZED : 
  */
  $sql="INSERT INTO unionprof_mem_roles(role_Id, union_Id, branch_Id, roleName) ";
  $sql.="VALUES ('".$role_Id."','".$union_Id."','".$branch_Id."','".$roleName."');";
  return $sql;
 }
 
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
 
 /**************************************************************************************************************************/
 /******************************************* COMMUNITY MEMBERS ************************************************************/
 /**************************************************************************************************************************/
 function query_createCommunityMember($member_Id, $union_Id, $branch_Id, $user_Id, $role_Id, $status, 
				$permUnion, $permBranch){
 $sql="INSERT INTO unionprof_mem(member_Id, union_Id, branch_Id, user_Id, role_Id, addedOn, status, permUnion, permBranch) ";
 $sql.="VALUES ('".$member_Id."','".$union_Id."','".$branch_Id."','".$user_Id."','".$role_Id."','".date('Y-m-d H:i:s');
 $sql.="','".$status."','".$permUnion."','".$permBranch."');";
 return $sql;
 }
 
 
 /**************************************************************************************************************************/
 /******************************************* COMMUNITY PERMISSIONS ********************************************************/
 /**************************************************************************************************************************/
 
 function query_createUnionPermissions($union_permission_Id, $role_Id, $createABranch, $updateBranchInfo, 
   $deleteBranch, $shiftMainBranch, $createNewsFeedUnionLevel, $approveNewsFeedUnionLevel, $createMovementUnionLevel, 
   $approveMovementUnionLevel, $createMovementsubdomainLevel, $approveMovementsubdomainLevel){
   $sql="INSERT INTO unionprof_mem_perm_union(union_permission_Id, role_Id, createABranch, updateBranchInfo, ";
   $sql.="deleteBranch, shiftMainBranch, createNewsFeedUnionLevel, approveNewsFeedUnionLevel, createMovementUnionLevel, ";
   $sql.="approveMovementUnionLevel, createMovementsubdomainLevel, approveMovementsubdomainLevel) ";
   $sql.="VALUES ('".$union_permission_Id."','".$role_Id."','".$createABranch."','".$updateBranchInfo."','";
   $sql.=$deleteBranch."','".$shiftMainBranch."','".$createNewsFeedUnionLevel."','".$approveNewsFeedUnionLevel;
   $sql.="','".$createMovementUnionLevel."','".$approveMovementUnionLevel."','".$createMovementsubdomainLevel."','";
   $sql.=$approveMovementsubdomainLevel."');";
   return $sql;
 }
 
 /**************************************************************************************************************************/
 /******************************************* COMMUNITY BRANCH PERMISSIONS ********************************************************/
 /**************************************************************************************************************************/
 
 function query_createBranchPermissions($branch_permission_Id, $role_Id, $createRole, $updateRole, $deleteRole,
    $requestUsersToBeMembers, $approveUsersToBeMembers, $createNewsFeedBranchLevel, $approveNewsFeedBranchLevel,
	$createNewsFeedUnionLevel, $approveNewsFeedUnionLevel, $createMovementBranchLevel, $approveMovementBranchLevel,
	$createMovementUnionLevel, $approveMovementUnionLevel, $createMovementSubDomainLevel, $approveMovementSubDomainLevel,
	$createMovementDomainLevel, $approveMovementDomainLevel){
   $sql="INSERT INTO unionprof_mem_perm_branch(branch_permission_Id, role_Id, createRole, updateRole, DeleteRole,";
   $sql.="requestUsersToBeMembers, approveUsersToBeMembers, createNewsFeedBranchLevel, approveNewsFeedBranchLevel,";
   $sql.="createNewsFeedUnionLevel, approveNewsFeedUnionLevel, createMovementBranchLevel, approveMovementBranchLevel,";
   $sql.="createMovementUnionLevel, approveMovementUnionLevel, createMovementSubDomainLevel, approveMovementSubDomainLevel,";
   $sql.="createMovementDomainLevel, approveMovementDomainLevel) ";
   $sql.="VALUES ('".$branch_permission_Id."','".$role_Id."','".$createRole."','".$updateRole."','".$deleteRole."','";
   $sql.=$requestUsersToBeMembers."','".$approveUsersToBeMembers."','".$createNewsFeedBranchLevel."','";
   $sql.=$approveNewsFeedBranchLevel."','".$createNewsFeedUnionLevel."','".$approveNewsFeedUnionLevel."','";
   $sql.=$createMovementBranchLevel."','".$approveMovementBranchLevel."','".$createMovementUnionLevel."','";
   $sql.=$approveMovementUnionLevel."','".$createMovementSubDomainLevel."','".$approveMovementSubDomainLevel."','";
   $sql.=$createMovementDomainLevel."','".$approveMovementDomainLevel."');";
   return $sql;
 }
   
  
   
  
  
 
}

?>