<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.community.professional.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.community.professional.php");

if(isset($_GET["action"])){
  if($_GET["action"]==='CREATE_PROFESSIONALCOMMUNITY'){
    $idObj=new identity();
	$profComObj=new ProfessionalCommunity();
	$dbObj=new Database();
	
	$union_Id=$idObj->unionprof_account_id();
	$main_branch_Id=$idObj->unionprof_branch_id();
	$member_Id=$idObj->unionprof_mem_id();
	$role_Id=$idObj->unionprof_mem_roles_id();
	$permission_Id=$idObj->unionprof_mem_perm_id();
	
	$domain_Id=$_GET["category"];
	$subdomain_Id=$_GET["subcategory"];
    $unionName=$_GET["unionName"];
	$unionURLName=$union_Id;
	$aboutUnion=$_GET["aboutUnion"];
    $roleName=$_GET["designation"];
    $country=$_GET["country"];
	$state=$_GET["state"];
	$location=$_GET["location"];
	$minlocation=$_GET["locality"];
	$profile_pic=$_GET["communityProfilePicture"];
	$admin_Id=$_GET["admin_Id"];
	/* Creates Union */ 
	$queryBuilder=$profComObj->query_createCommunity($union_Id,$domain_Id,$subdomain_Id,$main_branch_Id,$unionName,$unionURLName,$aboutUnion,$profile_pic,$admin_Id);
	/* Creates Union Branch (Default Main Branch) */
	$queryBuilder.=$profComObj->query_createCommunityBranch($main_branch_Id, $union_Id, $minlocation, $location, 
									$state, $country);
	/* Creates Member Role */
	$queryBuilder.=$profComObj->query_createMemberRoles($role_Id, $union_Id, $main_branch_Id, $roleName);
	
	/* Creates Member */
	$queryBuilder.=$profComObj->query_createCommunityMember($member_Id, $union_Id, $main_branch_Id, $admin_Id, $role_Id,'OFFLINE', 'Y', 'Y');
	
	/* Creates Union Permissions */
	$queryBuilder.=$profComObj->query_createProfUnionPermissions($permission_Id, $role_Id, 'Y', 
				'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y');

    echo $dbObj->addupdateData($queryBuilder);
	/* Add Permissions Query */
  }
  else if($_GET["action"]==='GETDATA_PROFESSIONALCOMMUNITY'){
    if(isset($_GET["union_Id"])){
	   $union_Id=$_GET["union_Id"];
	   $comObj=new ProfessionalCommunity();
	   $dbObj=new Database();
	   $query=$comObj->query_getCommunityProfileData($union_Id);
	   echo $dbObj->getJSONData($query);
	} else { echo 'MISSING_UNION_ID'; }
  }
  else if($_GET["action"]=='GETCOUNT_PROFESSIONALCOMMUNITY_USERBEINGOWNER'){
   if(isset($_GET["user_Id"])){
     $user_Id=$_GET["user_Id"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_count_userBeingOwner($user_Id);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 $jsonData=$dbObj->getJSONData($query);
	 $dejsonData=json_decode($jsonData);
	 echo $dejsonData[0]->{'count(*)'};
   } else {
     echo 'MISSING_USER_ID';
   }
   
  }
  else if($_GET["action"]=='GETDATA_PROFESSIONALCOMMUNITY_USERBEINGOWNER'){
   if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
     $user_Id=$_GET["user_Id"];
	 $limit_start=$_GET["limit_start"];
	 $limit_end=$_GET["limit_end"];
     $profComObj = new ProfessionalCommunity();
     $query=$profComObj->query_listOfCommunity_data_userBeingOwner($user_Id,$limit_start,$limit_end);
	 $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $dbObj->getJSONData($query);
   } else {
     echo 'MISSING_USER_ID';
   }
   
  }
  else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>