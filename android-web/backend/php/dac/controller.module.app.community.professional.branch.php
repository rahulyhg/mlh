<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.community.professional.branch.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.community.professional.branch.php");

if(isset($_GET["action"])){
 if($_GET["action"]==='CREATE_PROFESSIONAL_BRANCH'){
   if(isset($_GET["union_Id"]) && isset($_GET["country"]) && isset($_GET["state"]) && isset($_GET["location"]) && 
      isset($_GET["minlocation"]) && isset($_GET["roleInfo"]) && isset($_GET["members"]) && isset($_GET["admin_Id"])){
	$identity = new Identity();
    $branch_Id = $identity->unionprof_branch_id();
	$union_Id = $_GET["union_Id"];
	$country = $_GET["country"];
	$state = $_GET["state"];
	$location = $_GET["location"];
	$minlocation = $_GET["minlocation"];
	$admin_Id = $_GET["admin_Id"];
    $publicInvitation = 'Y';
	/* Create Branch Information */
	$professionalCommunityBranch = new ProfessionalCommunityBranch();
	$query01 = $professionalCommunityBranch->query_add_createNewBranch($branch_Id, $union_Id, $minlocation, 
												$location, $state, $country, $admin_Id, $publicInvitation);
	$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
    echo $dbObj->addupdateData($query01);
	
	$roleInfoJson = $_GET["roleInfo"];
	$membersJson = $_GET["members"];
	
	foreach($roleInfoJson as $role_Id => $roleInObj) {
	 $roleName = $roleInObj["roleName"];
	 
	 /* Create New Roles within the Branch */
	 $query02 = $professionalCommunityBranch->query_add_createNewRole($role_Id, $union_Id, $branch_Id, $roleName);
	 echo $dbObj->addupdateData($query02);
	 
	 $permission_Id= $identity->unionprof_mem_perm1_id();
	 $createABranch = 'N';
	 $createABranchNotify = 'N';
	 $updateBranchInfo = 'N';
	 $updateBranchInfoNotify = 'N';
	 $deleteBranch = 'N';
	 $deleteBranchNotify = 'N';
	 $shiftMainBranch = 'N';
	 $shiftMainBranchNotify = 'N';
	 $createRole = 'N';
	 $createRoleNotify = 'N';
	 $viewRoles = 'N';
	 $viewRoleNotify = 'N';
	 $updateRole = 'N';
	 $updateRoleNotify = 'N';
	 $deleteRole = 'N';
	 $deleteRoleNotify = 'N';
	 $requestUsersToBeMembers = 'N'; 
	 $requestUsersToBeMembersNotify = 'N'; 
	 $approveUsersToBeMembers = 'N';
	 $approveUsersToBeMembersNotify = 'N';
	 $createNewsFeedBranchLevel = 'N'; 
	 $createNewsFeedBranchLevelNotify = 'N';
	 $approveNewsFeedBranchLevel = 'N';
	 $approveNewsFeedBranchLevelNotify = 'N';
	 $createNewsFeedUnionLevel = 'N';
	 $createNewsFeedUnionLevelNotify = 'N';
	 $approveNewsFeedUnionLevel = 'N';
	 $approveNewsFeedUnionLevelNotify = 'N';
	 $createMovementBranchLevel = 'N';
	 $createMovementBranchLevelNotify = 'N'; 
	 $approveMovementBranchLevel = 'N'; 
	 $approveMovementBranchLevelNotify = 'N';
	 $createMovementUnionLevel = 'N';
	 $createMovementUnionLevelNotify = 'N';
	 $approveMovementUnionLevel = 'N';
	 $approveMovementUnionLevelNotify = 'N'; 
	 $createMovementSubDomainLevel = 'N';
	 $createMovementSubDomainLevelNotify = 'N';
	 $approveMovementSubDomainLevel = 'N';
	 $approveMovementSubDomainLevelNotify = 'N';
	 $createMovementDomainLevel = 'N';
	 $createMovementDomainLevelNotify = 'N';
	 $approveMovementDomainLevel = 'N';
	 $approveMovementDomainLevelNotify = 'N'; 
	 $answerUnionFAQ = 'N';
	 $answerBranchFAQ = 'N';
	 
	 
	 
	 if(isset($roleInObj["createABranch"])){ $createABranch = $roleInObj["createABranch"]; }
	 if(isset($roleInObj["updateBranchInfo"])){ $updateBranchInfo = $roleInObj["updateBranchInfo"]; }
	 if(isset($roleInObj["deleteBranch"])){ $deleteBranch = $roleInObj["deleteBranch"]; }
	 if(isset($roleInObj["shiftMainBranch"])){ $shiftMainBranch = $roleInObj["shiftMainBranch"]; }
	 if(isset($roleInObj["createRole"])){ $createRole = $roleInObj["createRole"]; }
	 if(isset($roleInObj["viewRoles"])){ $viewRoles = $roleInObj["viewRoles"]; }
	 if(isset($roleInObj["updateRole"])){ $updateRole = $roleInObj["updateRole"]; }
	 if(isset($roleInObj["deleteRole"])){ $deleteRole = $roleInObj["deleteRole"]; }
	 if(isset($roleInObj["requestUsersToBeMembers"])){ $requestUsersToBeMembers = $roleInObj["requestUsersToBeMembers"]; }
	 if(isset($roleInObj["approveUsersToBeMembers"])){ $approveUsersToBeMembers = $roleInObj["approveUsersToBeMembers"]; }
	 if(isset($roleInObj["createNewsFeedBranchLevel"])){ $createNewsFeedBranchLevel = $roleInObj["createNewsFeedBranchLevel"]; }
	 if(isset($roleInObj["approveNewsFeedBranchLevel"])){ $approveNewsFeedBranchLevel = $roleInObj["approveNewsFeedBranchLevel"]; }
	 if(isset($roleInObj["createNewsFeedUnionLevel"])){ $createNewsFeedUnionLevel = $roleInObj["createNewsFeedUnionLevel"]; }
	 if(isset($roleInObj["approveNewsFeedUnionLevel"])){ $approveNewsFeedUnionLevel = $roleInObj["approveNewsFeedUnionLevel"]; }
	 if(isset($roleInObj["createMovementBranchLevel"])){ $createMovementBranchLevel = $roleInObj["createMovementBranchLevel"]; }
	 if(isset($roleInObj["approveMovementBranchLevel"])){ $approveMovementBranchLevel = $roleInObj["approveMovementBranchLevel"]; }
	 if(isset($roleInObj["createMovementUnionLevel"])){ $createMovementUnionLevel = $roleInObj["createMovementUnionLevel"]; }
	 if(isset($roleInObj["approveMovementUnionLevel"])){ $approveMovementUnionLevel = $roleInObj["approveMovementUnionLevel"]; }
	 if(isset($roleInObj["createMovementSubDomainLevel"])){ $createMovementSubDomainLevel = $roleInObj["createMovementSubDomainLevel"]; }
	 if(isset($roleInObj["approveMovementSubDomainLevel"])){ $approveMovementSubDomainLevel = $roleInObj["approveMovementSubDomainLevel"]; }
	 if(isset($roleInObj["createMovementDomainLevel"])){ $createMovementDomainLevel = $roleInObj["createMovementDomainLevel"]; }
	 if(isset($roleInObj["approveMovementDomainLevel"])){ $approveMovementDomainLevel = $roleInObj["approveMovementDomainLevel"]; }
	 
	 /* Add Permissions */
	 $query03 = $professionalCommunityBranch->query_add_createPermissions($permission_Id, $role_Id, $createABranch, 
					$createABranchNotify, $updateBranchInfo, $updateBranchInfoNotify, $deleteBranch, $deleteBranchNotify, 
					$shiftMainBranch, $shiftMainBranchNotify, $createRole, $createRoleNotify, $viewRoles, $viewRoleNotify, 
					$updateRole, $updateRoleNotify, $deleteRole, $deleteRoleNotify, $requestUsersToBeMembers, 
					$requestUsersToBeMembersNotify, $approveUsersToBeMembers, $approveUsersToBeMembersNotify,
					$createNewsFeedBranchLevel, $createNewsFeedBranchLevelNotify, $approveNewsFeedBranchLevel, 
					$approveNewsFeedBranchLevelNotify, $createNewsFeedUnionLevel, $createNewsFeedUnionLevelNotify, 
					$approveNewsFeedUnionLevel, $approveNewsFeedUnionLevelNotify, $createMovementBranchLevel, 
					$createMovementBranchLevelNotify, $approveMovementBranchLevel, $approveMovementBranchLevelNotify,
					$createMovementUnionLevel, $createMovementUnionLevelNotify, $approveMovementUnionLevel, 
					$approveMovementUnionLevelNotify, $createMovementSubDomainLevel, $createMovementSubDomainLevelNotify, 
					$approveMovementSubDomainLevel, $approveMovementSubDomainLevelNotify, $createMovementDomainLevel, 
					$createMovementDomainLevelNotify, $approveMovementDomainLevel, $approveMovementDomainLevelNotify, 
					$answerUnionFAQ, $answerBranchFAQ);
	 echo $dbObj->addupdateData($query03);
	}

	foreach($membersJson as $member_Id => $membersObj) {
	  $member_Id = $identity->unionprof_mem_id();
	  $user_Id = $membersObj["member_Id"];
	  $role_Id = $membersObj["role_Id"];
	  $roleName = $membersObj["roleName"];
	  $cur_role_Id = $role_Id;
	  $prev_role_Id = $role_Id;
	  $roleNotify = 'N';
	  $roleUpdatedOn = date('Y-m-d H:i:s');
	  $memNotify = 'N';
	  $memAddedOn = date('Y-m-d H:i:s'); 
	  $memAddedBy = $admin_Id;
	  $status = 'OFFLINE';
	  $query04 = $professionalCommunityBranch->query_add_MembersToBranch($member_Id, $union_Id, $branch_Id, $user_Id, 
					$cur_role_Id, $prev_role_Id, $roleNotify, $roleUpdatedOn, $memNotify, $memAddedOn, $memAddedBy, $status);
	  echo $dbObj->addupdateData($query04);
	}
   } 
   else { 
    $content='Missing';
	if(!isset($_GET["union_Id"])){ $content.=' union_Id,'; }
    if(!isset($_GET["country"])){ $content.=' country,'; }
	if(!isset($_GET["state"])){ $content.=' state,'; }
	if(!isset($_GET["location"])){ $content.=' location,'; }
	if(!isset($_GET["minlocation"])){ $content.=' minlocation,'; }
    if(!isset($_GET["roleInfo"])){ $content.=' roleInfo,'; }
	if(!isset($_GET["members"])){ $content.=' members,'; }
	if(!isset($_GET["admin_Id"])){ $content.=' admin_Id,'; } 
	$content=chop($content,',');
	echo $content;
   }
 }
 else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>