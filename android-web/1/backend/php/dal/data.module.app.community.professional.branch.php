<?php
class ProfessionalCommunityBranch {

 function query_add_createNewBranch($branch_Id, $union_Id, $minlocation, $location, $state, $country, $admin_Id,
   $publicInvitation){
   $sql="INSERT INTO unionprof_branch(branch_Id, union_Id, minlocation, location, state, country, createdOn, admin_Id, ";
   $sql.="publicInvitation) VALUES ('".$branch_Id."','".$union_Id."','".$minlocation."','".$location."','".$state."',";
   $sql.="'".$country."','".date('Y-m-d H:i:s')."','".$admin_Id."','".$publicInvitation."');";
   return $sql;
 }
 
 function query_add_createNewRole($role_Id, $union_Id, $branch_Id, $roleName){
  $sql="INSERT INTO unionprof_mem_roles(role_Id, union_Id, branch_Id, roleName, updatedOn) ";
  $sql.="VALUES ('".$role_Id."','".$union_Id."','".$branch_Id."','".$roleName."','".date('Y-m-d H:i:s')."');";
  return $sql;
 }
 
 function query_add_createPermissions1($permission1_Id, $member_Id, $createABranch, $createABranchNotify, $updateBranchInfo,
  $updateBranchInfoNotify, $deleteBranch, $deleteBranchNotify, $shiftMainBranch, $shiftMainBranchNotify, 
  $createNewsFeedUnionLevel, $createNewsFeedUnionLevelNotify, $approveNewsFeedUnionLevel, $approveNewsFeedUnionLevelNotify, 
  $createMovementUnionLevel, $createMovementUnionLevelNotify, $approveMovementUnionLevel, $approveMovementUnionLevelNotify, 
  $createMovementSubDomainLevel, $createMovementSubDomainLevelNotify, $approveMovementSubDomainLevel, 
  $approveMovementSubDomainLevelNotify, $createMovementDomainLevel, $createMovementDomainLevelNotify, 
  $approveMovementDomainLevel, $approveMovementDomainLevelNotify){
  $sql="INSERT INTO unionprof_mem_perm1(permission1_Id, member_Id, createABranch, createABranchNotify, updateBranchInfo, ";
  $sql.="updateBranchInfoNotify, deleteBranch, deleteBranchNotify, shiftMainBranch, shiftMainBranchNotify, ";
  $sql.="createNewsFeedUnionLevel, createNewsFeedUnionLevelNotify, approveNewsFeedUnionLevel, ";
  $sql.="approveNewsFeedUnionLevelNotify, createMovementUnionLevel, createMovementUnionLevelNotify, ";
  $sql.="approveMovementUnionLevel, approveMovementUnionLevelNotify, createMovementSubDomainLevel, ";
  $sql.="createMovementSubDomainLevelNotify, approveMovementSubDomainLevel, approveMovementSubDomainLevelNotify, ";
  $sql.="createMovementDomainLevel, createMovementDomainLevelNotify, approveMovementDomainLevel, ";
  $sql.=" approveMovementDomainLevelNotify, updatedPermOn) ";
  $sql.="VALUES ('".$permission1_Id."','".$member_Id."','".$createABranch."','".$createABranchNotify."','".$updateBranchInfo;
  $sql.="','".$updateBranchInfoNotify."','".$deleteBranch."','".$deleteBranchNotify."','".$shiftMainBranch."','";
  $sql.=$shiftMainBranchNotify."','".$createNewsFeedUnionLevel."','".$createNewsFeedUnionLevelNotify;
  $sql.="','".$approveNewsFeedUnionLevel."','".$approveNewsFeedUnionLevelNotify;
  $sql.="','".$createMovementUnionLevel."','".$createMovementUnionLevelNotify."','".$approveMovementUnionLevel;
  $sql.="','".$approveMovementUnionLevelNotify."','".$createMovementSubDomainLevel."','".$createMovementSubDomainLevelNotify;
  $sql.="','".$approveMovementSubDomainLevel."','".$approveMovementSubDomainLevelNotify."','".$createMovementDomainLevel;
  $sql.="','".$createMovementDomainLevelNotify."','".$approveMovementDomainLevel."','".$approveMovementDomainLevelNotify;
  $sql.="','".date('Y-m-d H:i:s')."');";
  return $sql;
 }

 function query_add_createPermissions2($permission2_Id, $role_Id, $createRole,
		$createRoleNotify, $viewRoles, $viewRoleNotify, $updateRole, $updateRoleNotify, $deleteRole, $deleteRoleNotify,
		$requestUsersToBeMembers, $requestUsersToBeMembersNotify, $approveUsersToBeMembers, $approveUsersToBeMembersNotify,
		$createNewsFeedBranchLevel, $createNewsFeedBranchLevelNotify, $approveNewsFeedBranchLevel, $approveNewsFeedBranchLevelNotify, 
		$createMovementBranchLevel, $createMovementBranchLevelNotify, $approveMovementBranchLevel, 
		$approveMovementBranchLevelNotify){
  $sql="INSERT INTO unionprof_mem_perm2(permission2_Id, role_Id, createRole, ";
  $sql.="createRoleNotify, viewRoles, viewRoleNotify, updateRole, updateRoleNotify, deleteRole, deleteRoleNotify, ";
  $sql.="requestUsersToBeMembers, requestUsersToBeMembersNotify, approveUsersToBeMembers, approveUsersToBeMembersNotify, ";
  $sql.="createNewsFeedBranchLevel, createNewsFeedBranchLevelNotify, approveNewsFeedBranchLevel, ";
  $sql.="approveNewsFeedBranchLevelNotify, createMovementBranchLevel, createMovementBranchLevelNotify, ";
  $sql.=" approveMovementBranchLevel, approveMovementBranchLevelNotify, ";
  $sql.=" updatedPermOn) ";
  $sql.="VALUES ('".$permission2_Id."','".$role_Id."','".$createRole."','".$createRoleNotify."','".$viewRoles."','";
  $sql.=$viewRoleNotify."','".$updateRole."','".$updateRoleNotify."','".$deleteRole."','".$deleteRoleNotify."','";
  $sql.=$requestUsersToBeMembers."','".$requestUsersToBeMembersNotify."','".$approveUsersToBeMembers."','";
  $sql.=$approveUsersToBeMembersNotify."','".$createNewsFeedBranchLevel."','".$createNewsFeedBranchLevelNotify."','";
  $sql.=$approveNewsFeedBranchLevel."','".$approveNewsFeedBranchLevelNotify."','".$createMovementBranchLevel;
  $sql.="','".$createMovementBranchLevelNotify."','".$approveMovementBranchLevel."','".$approveMovementBranchLevelNotify;
  $sql.="','".date('Y-m-d H:i:s')."');";
  return $sql;
 }
 
 function query_add_MembersToBranch($member_Id, $union_Id, $branch_Id, $user_Id, $cur_role_Id, $prev_role_Id, $roleNotify, 
					$roleUpdatedOn, $memNotify, $memAddedOn, $memAddedBy, $status){
  $sql="INSERT INTO unionprof_mem(member_Id, union_Id, branch_Id, user_Id, cur_role_Id, prev_role_Id, roleNotify, ";
  $sql.="roleUpdatedOn, memNotify, memAddedOn, memAddedBy, status) ";
  $sql.="VALUES ('".$member_Id."','".$union_Id."','".$branch_Id."','".$user_Id."','".$cur_role_Id."','".$prev_role_Id;
  $sql.="','".$roleNotify."','".$roleUpdatedOn."','".$memNotify."','".$memAddedOn."','".$memAddedBy."','".$status."');";
  return $sql;
 }

 function query_add_MembersReqToJoinBranch($request_Id, $union_Id, $branch_Id, $role_Id, $req_from, $req_to, $reqMessage, 
		$sent_On, $notify, $watched){
   $sql="INSERT INTO unionprof_mem_req(request_Id, union_Id, branch_Id, role_Id, req_from, req_to, reqMessage, sent_On, ";
   $sql.="notify, watched) VALUES ('".$request_Id."','".$union_Id."','".$branch_Id."','".$role_Id."','".$req_from;
   $sql.="','".$req_to."','".$reqMessage."','".$sent_On."','".$notify."','".$watched."');";
   return $sql;
 }
 
 function query_check_branchUniqueOrNot($union_Id,$country,$state,$location,$minlocation){
   $sql="SELECT count(*) FROM unionprof_branch WHERE country='".$country."' AND state='".$state."' AND ";
   $sql.="location='".$location."' AND minlocation='".$minlocation."' AND union_Id='".$union_Id."';";
   return $sql;      
 }

 function query_get_branchRequestByRequestId($req_branch_Id){
 /* Used in controller.module.app.community.professional.branch.php at action = GET_DATA_REQUESTLOCALBRANCH */
   $sql="SELECT unionprof_branch_req.minlocation As branch_minlocation, ";
   $sql.="unionprof_branch_req.location As branch_location, unionprof_branch_req.state As branch_state, ";
   $sql.="unionprof_branch_req.country As branch_country, user_account.surName, user_account.name, ";
   $sql.="user_account.profile_pic, user_account.minlocation As user_minlocation, ";
   $sql.=" user_account.location As user_location, user_account.state As user_state, user_account.country As user_country ";
   $sql.=" FROM unionprof_branch_req, user_account WHERE req_branch_Id='".$req_branch_Id."' AND ";
   $sql.="unionprof_branch_req.reqBy = user_account.user_Id;";
   return $sql;
 }
 
 function query_add_localBranchRequest($req_branch_Id, $union_Id, $minlocation, $location, $state, $country, $reqOn, 
 $reqBy, $reqMessage, $notify, $watched){
  $sql="INSERT INTO unionprof_branch_req(req_branch_Id, union_Id, minlocation, location, state, country, reqOn, reqBy, ";
  $sql.="reqMessage, notify, watched) ";
  $sql.=" VALUES ('".$req_branch_Id."','".$union_Id."','".$minlocation."','".$location."','".$state."','".$country;
  $sql.="','".$reqOn."','".$reqBy."','".$reqMessage."','".$notify."','".$watched."');";
  return $sql;
 }
 
 function query_delete_localBranchReq($req_branch_Id){
  $sql="DELETE FROM unionprof_branch_req WHERE req_branch_Id='".$req_branch_Id."';";
  return $sql;
 }
}
?>