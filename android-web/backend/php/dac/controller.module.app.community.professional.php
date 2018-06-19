<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.community.professional.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.community.professional.php");

if(isset($_GET["action"])){
  if($_GET["action"]==='CREATE_PROFESSIONAL_COMMUNITY'){
    $idObj=new identity();
	$union_Id=$idObj->union_account_id();
	$domain_Id=$_GET["category"];
	$subdomain_Id=$_GET["subcategory"];
	$main_branch_Id=$idObj->union_branch_id();
    $unionName=$_GET["unionName"];
	$unionURLName=$union_Id;
    $roleName=$_GET["designation"];
    $country=$_GET["country"];
	$state=$_GET["state"];
	$location=$_GET["location"];
	$minlocation=$_GET["locality"];
	$profile_pic=$_GET["communityProfilePicture"];
	$admin_Id=$_GET["admin_Id"];
	$role_Id;
	$profComObj=new professionalCommunity();
	$profComObj->query_createCommunity($union_Id,$domain_Id,$subdomain_Id,$main_branch_Id,$unionName,$unionURLName,
								$profile_pic, $admin_Id);
	$profComObj->query_createCommunityBranch($main_branch_Id, $union_Id, $minlocation, $location, $state, $country);
	$profComObj->query_createMemberRoles($role_Id, $union_Id, $main_branch_Id, $roleName);
	
	/* Add Permissions Query */
  }
  else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>