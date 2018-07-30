<?php
$user_Id='USR924357814934';
$phoneNumbersArray=array('+915345678191');
$appAndroidServiceObj = new AppAndroidService();
echo $appAndroidServiceObj->query_get_usrFrndsFromContactsData($user_Id, $phoneNumbersArray);
class AppAndroidService {

  /***************************************************************************************************************************
   ******************************************** SERVICE USR DUMP FRNDS *******************************************************
   ***************************************************************************************************************************/
   function query_get_usrFrndsFromContactsData($user_Id, $phoneNumbersArray){
   /*  If the Data not exists for a Mobile Number, then, it mean he is not registered in MyLocalHook.
    *  If the Data exists for a Mobile Number, then, it is registered in MyLocalHook.
    *  IsFriend = 0 and IsContact = 1, If MobileNumber is not a friend and exists in his Contacts.
    *  IsFriend = 1 and IsContact = 1, If MobileNumber is a friend and exists in his Contacts.
	*  IsFriend = 1 and IsContact = 0, The MobileNumber not exists in Contacts but, he is a Friend of User
    */
	 $sql="(SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, ";
	 $sql.=" (SELECT GROUP_CONCAT(user_contact.mcountrycode,user_contact.mobile) FROM user_contact  ";
	 $sql.=" WHERE user_contact.user_Id=user_account.user_Id) As phoneNumbers, ";
	 $sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country, ";
	 $sql.=" (SELECT count(*) FROM user_frnds WHERE (user_frnds.frnd1 = user_account.user_Id AND ";
	 $sql.=" user_frnds.frnd2 = '".$user_Id."') OR (user_frnds.frnd1 ='".$user_Id."' AND ";
	 $sql.=" user_frnds.frnd2 = user_account.user_Id)) As IsFriend ";
	 $sql.=" FROM user_account, user_frnds WHERE (user_frnds.frnd1 = user_account.user_Id AND ";
	 $sql.=" user_frnds.frnd2 = '".$user_Id."') OR (user_frnds.frnd1 ='".$user_Id."' AND ";
	 $sql.=" user_frnds.frnd2 = user_account.user_Id))";
	 $sql.=" UNION ";
     $sql.="(SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, ";
	 $sql.=" GROUP_CONCAT(user_contact.mcountrycode,user_contact.mobile) As phoneNumbers, ";
	 $sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country, ";
	 $sql.=" (SELECT count(*) FROM user_frnds WHERE (user_frnds.frnd1 = user_account.user_Id AND ";
	 $sql.=" user_frnds.frnd2 = '".$user_Id."') OR (user_frnds.frnd1 ='".$user_Id."' AND ";
	 $sql.=" user_frnds.frnd2 = user_account.user_Id)) As IsFriend ";
	 $sql.="FROM user_account, user_contact ";
	 $sql.="WHERE user_account.user_Id=user_contact.user_Id AND ";
	 $sql.="(";
	 for($index=0;$index<count($phoneNumbersArray);$index++){
	   $sql.=" ((SELECT REPLACE(concat(user_contact.mcountrycode,user_contact.mobile), '+', '') ";
	   $sql.="As tmp)='".trim($phoneNumbersArray[$index])."' ";
	   $sql.="OR user_contact.mobile='".trim($phoneNumbersArray[$index])."') OR";
	  }
	 $sql=chop($sql,"OR");
	 $sql.="));";
	return $sql;
   }
   
  /***************************************************************************************************************************
   ******************************************* USER FRIENDSHIP NOTIFICATIONS *************************************************
   ***************************************************************************************************************************/
  
  function query_notify_usrFrndsReqReciever($user_Id){
  /* Notification Query to User recieved Friendship Request */
    $sql="SELECT ";
    $sql.=" user_frnds_req.from_userId, user_account.username, user_account.surName, user_account.name,";
    $sql.="  user_frnds_req.req_on ";
    $sql.=" FROM user_account, user_frnds_req WHERE user_account.user_Id=user_frnds_req.from_userId AND ";
    $sql.=" user_frnds_req.to_userId='".$user_Id."' ORDER BY user_frnds_req.req_on DESC LIMIT 0 , 1;";
	return $sql;
  }  
  
  function query_notify_onAcceptUserFrndReq($user_Id){
  /* Notification Query to Users(Sender/Reciever) as reciever accepts Friendship */
   $sql="SELECT user_frnds.rel_Id, user_frnds.rel_from, user_frnds.rel_tz, ";
   $sql.=" (SELECT CONCAT('[{\"frnd1\":\"',user_frnds.frnd1,'\",\"surName\":',user_account.surName,'\",";
   $sql.="\"name\":\"',user_account.name,'\",\"frnd1_call_frnd2\":\"',user_frnds.frnd1_call_frnd2,'\"}]') ";
   $sql.=" FROM user_account WHERE user_account.user_Id=user_frnds.frnd1) As requestSent, ";
   $sql.=" (SELECT CONCAT('[{\"frnd2\":\"',user_frnds.frnd2,'\",\"surName\":',user_account.surName,'\",\"name\":\"',";
   $sql.=" user_account.name,'\",\"frnd2_call_frnd1\":\"',user_frnds.frnd2_call_frnd1,'\"}]') FROM user_account WHERE ";
   $sql.=" user_account.user_Id=user_frnds.frnd2) As requestrecieved FROM user_frnds ";
   $sql.=" WHERE (user_frnds.frnd1='".$user_Id."' OR user_frnds.frnd2='".$user_Id."') AND notify='Y' ";
   $sql.="  ORDER BY user_frnds.rel_from DESC LIMIT 0 , 1; ";
   return $sql;
  }
  
  function query_notify_reqLocalBranch($user_Id){
  /* Request to Local Branch */
    $sql="SELECT CONCAT('[{\"user_Id\":\"',user_account.user_Id,'\",\"surName\":\"', user_account.surName, ";
    $sql.="'\",\"name\":\"', user_account.name,'\"}]') As requestedBy, unionprof_account.unionName, ";
    $sql.="unionprof_branch_req.minlocation, unionprof_branch_req.location, ";
    $sql.="unionprof_branch_req.state, unionprof_branch_req.country, unionprof_branch_req.reqOn ";
    $sql.="FROM unionprof_account, unionprof_branch_req, user_account ";
    $sql.="WHERE unionprof_account.union_Id=unionprof_branch_req.union_Id AND ";
    $sql.="unionprof_branch_req.reqBy=user_account.user_Id AND unionprof_account.admin_Id='".$user_Id."' ";
	$sql.=" ORDER BY reqOn DESC LIMIT 0,1 ";
    return $sql;
  }

  function query_notify_unionMemberReqReciever($user_Id){
  /* Notification Query to User Recieved Membership Request for a Union */
    $sql="SELECT ";
	$sql.=" user_account.surName, user_account.name, unionprof_account.union_Id, unionprof_account.unionName, ";
	$sql.=" unionprof_mem_req.sent_On FROM ";
	$sql.=" user_account, unionprof_account, unionprof_branch, unionprof_mem_req WHERE ";
	$sql.=" unionprof_account.union_Id = unionprof_branch.union_Id AND ";
	$sql.=" unionprof_account.union_Id = unionprof_mem_req.union_Id AND ";
	$sql.=" unionprof_branch.branch_Id = unionprof_mem_req.branch_Id AND ";
	$sql.=" unionprof_mem_req.req_to='".$user_Id."' AND unionprof_mem_req.req_from=user_account.user_Id ";
	$sql.="  ORDER BY unionprof_mem_req.sent_On DESC LIMIT 0 , 1; ";
	return $sql;
  }
  
  function query_notify_onAcceptUnionMemberReq($user_Id){
  /* Notification Query to Union Member Joined and Added into Union */
   $sql="SELECT unionprof_mem.member_Id, ";
   $sql.="(SELECT ";
   $sql.="CONCAT('[{\"union_Id\":\"',unionprof_mem.union_Id,'\",\"unionName\":\"',unionprof_account.unionName, ";
   $sql.="'\",\"profile_pic\":\"',unionprof_account.profile_pic,'\"}]') ";
   $sql.="FROM unionprof_account WHERE unionprof_account.union_Id=unionprof_mem.union_Id)  As unionInfo, ";
   $sql.="(SELECT CONCAT('[{\"minlocation\":\"',unionprof_branch.minlocation,'\",\"location\":\"', ";
   $sql.="unionprof_branch.location,'\",\"state\":\"',unionprof_branch.state,'\",\"country\":\"',unionprof_branch.country,";
   $sql.="'\"}]') FROM unionprof_branch WHERE unionprof_branch.branch_Id=unionprof_mem.branch_Id) As branchInfo, ";
   $sql.="(SELECT CONCAT('[{\"user_Id\":\"',user_account.user_Id,'\",\"username\":\"',user_account.username, ";
   $sql.="'\",\"surName\":\"',user_account.surName,'\",\"name\":\"',user_account.name,'\",\"memAddedOn\":\"',";
   $sql.="unionprof_mem.memAddedOn,'\"}]') FROM user_account WHERE user_account.user_Id=unionprof_mem.user_Id) As ";
   $sql.="memberJoinedInfo, (SELECT unionprof_mem_roles.roleName FROM unionprof_mem_roles WHERE ";
   $sql.="unionprof_mem_roles.role_Id=unionprof_mem.cur_role_Id) As roleName, unionprof_mem.cur_role_Id, ";
   $sql.="(SELECT CONCAT('[{\"user_Id\":\"',user_account.user_Id,'\",\"username\":\"',user_account.username, ";
   $sql.="'\",\"surName\":\"',user_account.surName,'\",\"name\":\"',user_account.name,'\"}]') ";
   $sql.="FROM user_account WHERE user_account.user_Id=unionprof_mem.memAddedBy) As memberJoinedByInfo ";
   $sql.="FROM unionprof_mem WHERE unionprof_mem.user_Id='".$user_Id."' OR unionprof_mem.memAddedBy='".$user_Id."' ";
   $sql.="AND unionprof_mem.memNotify='Y' ";
   $sql.=" ORDER BY unionprof_mem.memAddedOn DESC LIMIT 0 , 1; ";
   return $sql;
  }
  
  function query_notify_unionMemberOnRoleChange($user_Id){
  /* Notification Query to Union Member When his role changes in Union */
    $sql="SELECT ";
    $sql.="(SELECT CONCAT('[{\"unionName\":\"',unionprof_account.unionName,'\",\"profile_pic\":\"',";
	$sql.="unionprof_account.profile_pic,'\"}]') FROM unionprof_account WHERE unionprof_account.union_Id=";
	$sql.="unionprof_mem.union_Id) As unionInfo,(SELECT CONCAT('[{\"minlocation\":\"',unionprof_branch.minlocation,";
	$sql.="'\",\"location\":\"',unionprof_branch.location,'\",\"state\":\"',unionprof_branch.state,'\",";
	$sql.="\"country\":\"',unionprof_branch.country,'\"}]') FROM unionprof_branch WHERE unionprof_branch.branch_Id=";
	$sql.="unionprof_mem.branch_Id) As branchInfo, unionprof_mem.cur_role_Id,(SELECT roleName FROM unionprof_mem_roles ";
	$sql.="WHERE unionprof_mem_roles.role_Id=unionprof_mem.cur_role_Id) As curRoleName, unionprof_mem.prev_role_Id, ";
    $sql.="(SELECT roleName FROM unionprof_mem_roles WHERE unionprof_mem_roles.role_Id=unionprof_mem.prev_role_Id) As ";
	$sql.="prevRoleName, unionprof_mem.roleUpdatedOn FROM unionprof_mem WHERE unionprof_mem.roleNotify='Y' AND ";
	$sql.="unionprof_mem.user_Id='".$user_Id."' ";
	$sql.=" ORDER BY unionprof_mem.roleUpdatedOn DESC LIMIT 0 , 1; ";
	return $sql;
  }

  function query_notify_unionMemberRolePermissionChange($user_Id){
  /* Notification Query to Union Member When his Role Permission has been Changed */
    $sql="SELECT ";
    $sql.="unionprof_account.union_Id, unionprof_account.unionName, ";
    $sql.="unionprof_branch.minlocation, unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
    $sql.="unionprof_mem_roles.roleName, unionprof_mem_perm.createABranch, unionprof_mem_perm.createABranchNotify, ";
    $sql.="unionprof_mem_perm.updateBranchInfo, unionprof_mem_perm.updateBranchInfoNotify, unionprof_mem_perm.deleteBranch, ";
	$sql.="unionprof_mem_perm.deleteBranchNotify, unionprof_mem_perm.shiftMainBranch, ";
	$sql.="unionprof_mem_perm.shiftMainBranchNotify, unionprof_mem_perm.createRole, unionprof_mem_perm.createRoleNotify, ";
    $sql.="unionprof_mem_perm.updateRole, unionprof_mem_perm.updateRoleNotify, unionprof_mem_perm.deleteRole, ";
	$sql.="unionprof_mem_perm.deleteRoleNotify, unionprof_mem_perm.requestUsersToBeMembers, ";
	$sql.="unionprof_mem_perm.requestUsersToBeMembersNotify,unionprof_mem_perm.approveUsersToBeMembers, ";
	$sql.="unionprof_mem_perm.approveUsersToBeMembersNotify, unionprof_mem_perm.createNewsFeedBranchLevel, ";
	$sql.="unionprof_mem_perm.createNewsFeedBranchLevelNotify,unionprof_mem_perm.approveNewsFeedBranchLevel, ";
	$sql.="unionprof_mem_perm.approveNewsFeedBranchLevelNotify, unionprof_mem_perm.createNewsFeedUnionLevel, ";
	$sql.="unionprof_mem_perm.createNewsFeedUnionLevelNotify, unionprof_mem_perm.approveNewsFeedUnionLevel, ";
	$sql.="unionprof_mem_perm.approveNewsFeedUnionLevelNotify, unionprof_mem_perm.createMovementBranchLevel, ";
	$sql.="unionprof_mem_perm.createMovementBranchLevelNotify, unionprof_mem_perm.approveMovementBranchLevel, ";
	$sql.="unionprof_mem_perm.approveMovementBranchLevelNotify, unionprof_mem_perm.createMovementUnionLevel, ";
	$sql.="unionprof_mem_perm.createMovementUnionLevelNotify, unionprof_mem_perm.approveMovementUnionLevel, ";
	$sql.="unionprof_mem_perm.approveMovementUnionLevelNotify, unionprof_mem_perm.createMovementSubDomainLevel, ";
	$sql.="unionprof_mem_perm.createMovementSubDomainLevelNotify, unionprof_mem_perm.approveMovementSubDomainLevel, ";
	$sql.="unionprof_mem_perm.approveMovementSubDomainLevelNotify, unionprof_mem_perm.createMovementDomainLevel, ";
	$sql.="unionprof_mem_perm.createMovementDomainLevelNotify, unionprof_mem_perm.approveMovementDomainLevel, ";
	$sql.="unionprof_mem_perm.approveMovementDomainLevelNotify, unionprof_mem_perm.updatedPermOn ";
    $sql.="FROM unionprof_account, unionprof_branch, unionprof_mem, unionprof_mem_roles, unionprof_mem_perm ";
    $sql.="WHERE ";
    $sql.="unionprof_account.union_Id=unionprof_mem.union_Id AND unionprof_branch.branch_Id=unionprof_mem.branch_Id AND ";
    $sql.="unionprof_mem.cur_role_Id=unionprof_mem_roles.role_Id AND unionprof_mem.user_Id='".$user_Id."' AND ";
    $sql.="(unionprof_mem_perm.createABranchNotify='Y' OR unionprof_mem_perm.updateBranchInfoNotify='Y' OR ";
    $sql.="unionprof_mem_perm.deleteBranchNotify='Y' OR unionprof_mem_perm.shiftMainBranchNotify='Y' OR ";
    $sql.="unionprof_mem_perm.createRoleNotify='Y' OR  unionprof_mem_perm.updateRoleNotify='Y' OR ";
    $sql.="unionprof_mem_perm.deleteRoleNotify='Y' OR unionprof_mem_perm.requestUsersToBeMembersNotify='Y' OR ";
    $sql.="unionprof_mem_perm.approveUsersToBeMembersNotify='Y' OR unionprof_mem_perm.createNewsFeedBranchLevelNotify='Y' ";
	$sql.="OR unionprof_mem_perm.approveNewsFeedBranchLevelNotify='Y' OR ";
	$sql.="unionprof_mem_perm.createNewsFeedUnionLevelNotify='Y' OR unionprof_mem_perm.approveNewsFeedUnionLevelNotify='Y' ";
	$sql.="OR unionprof_mem_perm.createMovementBranchLevelNotify='Y' OR ";
	$sql.="unionprof_mem_perm.approveMovementBranchLevelNotify='Y' OR unionprof_mem_perm.createMovementUnionLevelNotify='Y' ";
	$sql.="OR unionprof_mem_perm.approveMovementUnionLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm.createMovementSubDomainLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm.approveMovementSubDomainLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm.createMovementDomainLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm.approveMovementDomainLevelNotify='Y') ";
	$sql.=" ORDER BY unionprof_mem_perm.updatedPermOn DESC LIMIT 0 , 1; ";
    return $sql;
  }
  
  function query_notify_unionMemberNewsFeedNotification($user_Id){
  /* NewsFeed is displayed at displayLevel=BRANCH_LEVEL/UNION_LEVEL to User, 
     If user is a member of the Union and respective Branch  */
	 $sql="SELECT ";
	 $sql.=" unionprof_account.unionName, unionprof_branch.minlocation, unionprof_branch.location, ";
     $sql.=" unionprof_branch.state, unionprof_branch.country, ";
	 $sql.=" tmp.info_Id, tmp.bizUnionId, tmp.unionBranchId, tmp.artTitle, tmp.artShrtDesc, tmp.artDesc, tmp.createdOn, ";
     $sql.=" tmp.images, tmp.newsFeedType, tmp.displayLevel, tmp.status ";
	 $sql.=" FROM ";
     $sql.="(SELECT newsfeed_info.info_Id, newsfeed_info.bizUnionId, newsfeed_info.unionBranchId, newsfeed_info.artTitle, ";
     $sql.=" newsfeed_info.artShrtDesc, newsfeed_info.artDesc, newsfeed_info.createdOn, newsfeed_info.images, ";
     $sql.="newsfeed_info.newsFeedType, newsfeed_info.displayLevel, newsfeed_info.status, ";
     $sql.="(SELECT count(*) FROM  newsfeed_user_views WHERE newsfeed_user_views.info_Id=newsfeed_info.info_Id AND ";
	 $sql.="newsfeed_user_views.user_Id='".$user_Id."'>0) As Notify FROM newsfeed_info, unionprof_mem, ";
	 $sql.="unionprof_mem_roles WHERE unionprof_mem.user_Id='".$user_Id."' AND ";
     $sql.="unionprof_mem.cur_role_Id=unionprof_mem_roles.role_Id AND newsfeed_info.status='ACTIVE' ";
     $sql.="AND newsFeedType='UNION' AND ";
     $sql.="(displayLevel='BRANCH_LEVEL'OR displayLevel='UNION_LEVEL' OR displayLevel='SUBDOMAIN_LEVEL' OR ";
	 $sql.="displayLevel='DOMAIN_LEVEL') AND newsfeed_info.bizUnionId=unionprof_mem.union_Id AND ";
	 $sql.="newsfeed_info.unionBranchId=unionprof_mem.branch_Id ";
     $sql.="ORDER BY newsfeed_info.createdOn ASC) As tmp, unionprof_account, unionprof_branch ";
     $sql.="WHERE tmp.bizUnionId=unionprof_account.union_Id  AND unionprof_branch.branch_Id=tmp.unionBranchId AND ";
	 $sql.="tmp.Notify=0 LIMIT 0 , 1 ";
     return $sql;
  }
  
  function query_notify_unionSupporterNewsFeedNotification($user_Id){
  /* NewsFeed displayed at displayLevel=UNION_LEVEL to User If user is Subscribed to the Union */
    $sql="SELECT ";
	$sql.=" unionprof_account.unionName, unionprof_branch.minlocation, unionprof_branch.location, ";
    $sql.=" unionprof_branch.state, unionprof_branch.country, ";
	$sql.=" tmp.info_Id, tmp.bizUnionId, tmp.unionBranchId, tmp.artTitle, tmp.artShrtDesc, tmp.artDesc, tmp.createdOn, ";
    $sql.=" tmp.images, tmp.newsFeedType, tmp.displayLevel, tmp.status ";
	$sql.=" FROM ";
    $sql.="(SELECT newsfeed_info.info_Id, newsfeed_info.bizUnionId, newsfeed_info.unionBranchId, ";
    $sql.="newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.artDesc, newsfeed_info.createdOn, ";
    $sql.="newsfeed_info.images, newsfeed_info.newsFeedType, newsfeed_info.displayLevel, newsfeed_info.status, ";
    $sql.="(SELECT count(*) FROM  newsfeed_user_views WHERE newsfeed_user_views.info_Id=newsfeed_info.info_Id AND ";
	$sql.="newsfeed_user_views.user_Id='".$user_Id."'>0) As Notify ";
    $sql.="FROM  newsfeed_info, unionprof_sup WHERE ";
    $sql.="unionprof_sup.user_Id='".$user_Id."' AND unionprof_sup.union_Id=newsfeed_info.bizUnionId AND ";
    $sql.="newsfeed_info.status='ACTIVE' AND newsFeedType='UNION' AND ";
    $sql.="(displayLevel='UNION_LEVEL' OR displayLevel='SUBDOMAIN_LEVEL' OR displayLevel='DOMAIN_LEVEL') ";
    $sql.="ORDER BY newsfeed_info.createdOn ASC) As tmp, unionprof_account, unionprof_branch ";
    $sql.="WHERE tmp.bizUnionId=unionprof_account.union_Id  AND unionprof_branch.branch_Id=tmp.unionBranchId AND ";
	$sql.="tmp.Notify=0 LIMIT 0, 1 ";
    return $sql;
  }
  
  function query_notify_movementNotification($user_Id){
  /* Movement is displayed based on User_Subscription to Domain */
    $sql="SELECT tmp.union_Id, tmp.unionName, tmp.move_Id, tmp.petitionTitle, tmp.createdOn, tmp.openOn FROM ";
    $sql.="(SELECT move_info.union_Id, unionprof_account.unionName, move_info.move_Id, move_info.petitionTitle, ";
    $sql.="move_info.createdOn, move_info.openOn, ";
    $sql.="(SELECT count(*) FROM move_views WHERE move_views.move_Id=move_info.move_Id AND ";
	$sql.="move_views.user_Id='USR924357814934') As Notify ";
	$sql.="FROM unionprof_account, move_info WHERE unionprof_account.union_Id=move_info.union_Id AND ";
	$sql.="move_info.move_status='OPEN') As tmp WHERE tmp.Notify=0 ";
	$sql.=" ORDER BY tmp.openOn DESC LIMIT 0,1; ";
	return $sql;
  }

 
}
/*
$notifyObj=new app_notifications();
echo $notifyObj->query_notify_usrFrndsReqReciever('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_onAcceptUserFrndReq('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_unionMemberReqReciever('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_onAcceptUnionMemberReq('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_unionMemberOnRoleChange('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_unionMemberRolePermissionChange('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_unionMemberNewsFeedNotification('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_unionSupporterNewsFeedNotification('USR924357814934').'<br/><br/>';
echo $notifyObj->query_notify_movementNotification('USR924357814934');
*/
?>