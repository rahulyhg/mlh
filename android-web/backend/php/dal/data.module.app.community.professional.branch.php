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
 
 function query_add_createPermissions($permission_Id, $role_Id, $createABranch, $createABranchNotify, $updateBranchInfo,
        $updateBranchInfoNotify, $deleteBranch, $deleteBranchNotify, $shiftMainBranch, $shiftMainBranchNotify, $createRole,
		$createRoleNotify, $viewRoles, $viewRoleNotify, $updateRole, $updateRoleNotify, $deleteRole, $deleteRoleNotify,
		$requestUsersToBeMembers, $requestUsersToBeMembersNotify, $approveUsersToBeMembers, $approveUsersToBeMembersNotify,
		$createNewsFeedBranchLevel, $createNewsFeedBranchLevelNotify, $approveNewsFeedBranchLevel, $approveNewsFeedBranchLevelNotify, 
		$createNewsFeedUnionLevel, $createNewsFeedUnionLevelNotify, $approveNewsFeedUnionLevel, $approveNewsFeedUnionLevelNotify, 
		$createMovementBranchLevel, $createMovementBranchLevelNotify, $approveMovementBranchLevel, $approveMovementBranchLevelNotify,
		$createMovementUnionLevel, $createMovementUnionLevelNotify, $approveMovementUnionLevel, $approveMovementUnionLevelNotify, 
		$createMovementSubDomainLevel, $createMovementSubDomainLevelNotify, $approveMovementSubDomainLevel, 
		$approveMovementSubDomainLevelNotify, $createMovementDomainLevel, $createMovementDomainLevelNotify, 
		$approveMovementDomainLevel, $approveMovementDomainLevelNotify, $answerUnionFAQ, $answerBranchFAQ){
  $sql="INSERT INTO unionprof_mem_perm1(permission_Id, role_Id, createABranch, createABranchNotify, updateBranchInfo, ";
  $sql.="updateBranchInfoNotify, deleteBranch, deleteBranchNotify, shiftMainBranch, shiftMainBranchNotify, createRole, ";
  $sql.="createRoleNotify, viewRoles, viewRoleNotify, updateRole, updateRoleNotify, deleteRole, deleteRoleNotify, ";
  $sql.="requestUsersToBeMembers, requestUsersToBeMembersNotify, approveUsersToBeMembers, approveUsersToBeMembersNotify, ";
  $sql.="createNewsFeedBranchLevel, createNewsFeedBranchLevelNotify, approveNewsFeedBranchLevel, ";
  $sql.="approveNewsFeedBranchLevelNotify, createNewsFeedUnionLevel, createNewsFeedUnionLevelNotify, ";
  $sql.="approveNewsFeedUnionLevel, approveNewsFeedUnionLevelNotify, createMovementBranchLevel, ";
  $sql.="createMovementBranchLevelNotify, approveMovementBranchLevel, approveMovementBranchLevelNotify, ";
  $sql.="createMovementUnionLevel, createMovementUnionLevelNotify, approveMovementUnionLevel, ";
  $sql.="approveMovementUnionLevelNotify, createMovementSubDomainLevel, createMovementSubDomainLevelNotify, ";
  $sql.="approveMovementSubDomainLevel, approveMovementSubDomainLevelNotify, createMovementDomainLevel, ";
  $sql.="createMovementDomainLevelNotify, approveMovementDomainLevel, approveMovementDomainLevelNotify, answerUnionFAQ, ";
  $sql.="answerBranchFAQ, updatedPermOn) ";
  $sql.="VALUES ('".$permission_Id."','".$role_Id."','".$createABranch."','".$createABranchNotify."','".$updateBranchInfo;
  $sql.="','".$updateBranchInfoNotify."','".$deleteBranch."','".$deleteBranchNotify."','".$shiftMainBranch."','";
  $sql.=$shiftMainBranchNotify."','".$createRole."','".$createRoleNotify."','".$viewRoles."','".$viewRoleNotify;
  $sql.="','".$updateRole."','".$updateRoleNotify."','".$deleteRole."','".$deleteRoleNotify."','".$requestUsersToBeMembers;
  $sql.="','".$requestUsersToBeMembersNotify."','".$approveUsersToBeMembers."','".$approveUsersToBeMembersNotify."','";
  $sql.=$createNewsFeedBranchLevel."','".$createNewsFeedBranchLevelNotify."','".$approveNewsFeedBranchLevel;
  $sql.="','".$approveNewsFeedBranchLevelNotify."','".$createNewsFeedUnionLevel."','".$createNewsFeedUnionLevelNotify;
  $sql.="','".$approveNewsFeedUnionLevel."','".$approveNewsFeedUnionLevelNotify."','".$createMovementBranchLevel;
  $sql.="','".$createMovementBranchLevelNotify."','".$approveMovementBranchLevel."','".$approveMovementBranchLevelNotify;
  $sql.="','".$createMovementUnionLevel."','".$createMovementUnionLevelNotify."','".$approveMovementUnionLevel;
  $sql.="','".$approveMovementUnionLevelNotify."','".$createMovementSubDomainLevel."','".$createMovementSubDomainLevelNotify;
  $sql.="','".$approveMovementSubDomainLevel."','".$approveMovementSubDomainLevelNotify."','".$createMovementDomainLevel;
  $sql.="','".$createMovementDomainLevelNotify."','".$approveMovementDomainLevel."','".$approveMovementDomainLevelNotify;
  $sql.="','".$answerUnionFAQ."','".$answerBranchFAQ."','".date('Y-m-d H:i:s')."');";
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
}
?>