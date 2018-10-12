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
   $sql="SELECT unionprof_branch_req.minlocation, unionprof_branch_req.location, unionprof_branch_req.state, ";
   $sql.="unionprof_branch_req.country, user_account.surName, user_account.name, user_account.profile_pic ";
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