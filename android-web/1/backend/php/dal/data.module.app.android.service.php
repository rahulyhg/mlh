<?php
class AppAndroidService {

  function query_set_userGeoLocation($user_Id, $usr_latitude, $usr_longitude){
    $sql="INSERT INTO user_profile_geo(user_Id, cur_lat, cur_long, geoUpdatedOn) ";
	$sql.="VALUES ('".$user_Id."','".$usr_latitude."','".$usr_longitude."','".date('Y-m-d H:i:s')."') ";
	$sql.="ON DUPLICATE KEY UPDATE cur_lat='".$usr_latitude."', cur_long='".$usr_longitude."', ";
	$sql.="geoUpdatedOn='".date('Y-m-d H:i:s')."'; ";
    return $sql;
  }
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
	 $phoneNumbers=implode(",",$phoneNumbersArray);
	 $sql="SELECT ";
	 $sql.="tbl.user_Id, tbl.username, tbl.surName, tbl.name, tbl.phoneNumber, tbl.profile_pic, ";
	 $sql.="tbl.minlocation, tbl.location, tbl.state, tbl.country, tbl.IsFriend, tbl.created_On, ";
	 
	 $sql.="(SELECT IF (";
	 $sql.="(SELECT FIND_IN_SET((SELECT REPLACE(tbl.phoneNumber, ',', '')),('".$phoneNumbers."')) )>0  OR ";
	 $sql.="(SELECT FIND_IN_SET((SELECT REPLACE((SELECT REPLACE(tbl.phoneNumber, ',', '')),'+','')),('".$phoneNumbers."')) )>0  OR ";
	 $sql.="(SELECT FIND_IN_SET((SELECT SUBSTRING_INDEX(tbl.phoneNumber, ',', -1)),('".$phoneNumbers."'))) >0,'YES','NO')) ";
	 $sql.=" As IsContacts  ";
	 
	 $sql.="FROM (";
	 $sql.="(SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, ";
	 $sql.=" (SELECT CONCAT(user_contact.mcountrycode,',',user_contact.mobile) FROM user_contact  ";
	 $sql.=" WHERE user_contact.user_Id=user_account.user_Id) As phoneNumber, user_account.profile_pic, ";
	 $sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country, ";
	 $sql.="(SELECT IF(";
	 $sql.="(SELECT count(*) FROM user_frnds WHERE (user_frnds.frnd1 = user_account.user_Id ";
	 $sql.="AND user_frnds.frnd2 = '".$user_Id."') OR (user_frnds.frnd1 ='".$user_Id."'"; 
	 $sql.="AND user_frnds.frnd2 = user_account.user_Id))>0, 'YES', 'NO')) As IsFriend, user_account.created_On ";
	 $sql.=" FROM user_account, user_frnds WHERE (user_frnds.frnd1 = user_account.user_Id AND ";
	 $sql.=" user_frnds.frnd2 = '".$user_Id."') OR (user_frnds.frnd1 ='".$user_Id."' AND ";
	 $sql.=" user_frnds.frnd2 = user_account.user_Id))";
	 $sql.=" UNION "; 
     $sql.="(SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, ";
	 $sql.=" CONCAT(user_contact.mcountrycode,',',user_contact.mobile) As phoneNumber, user_account.profile_pic, ";
	 $sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country, ";
	 
	 $sql.="(SELECT IF(";
	 $sql.="(SELECT count(*) FROM user_frnds WHERE (user_frnds.frnd1 = user_account.user_Id ";
	 $sql.="AND user_frnds.frnd2 = '".$user_Id."') OR (user_frnds.frnd1 ='".$user_Id."'"; 
	 $sql.="AND user_frnds.frnd2 = user_account.user_Id))>0, 'YES', 'NO')) As IsFriend, user_account.created_On ";
	 $sql.="FROM user_account, user_contact ";
	 $sql.="WHERE user_account.user_Id=user_contact.user_Id AND ";
	 $sql.="(";
	 for($index=0;$index<count($phoneNumbersArray);$index++){
	   $sql.=" ((SELECT REPLACE(concat(user_contact.mcountrycode,user_contact.mobile), '+', '') ";
	   $sql.="As tmp)='".trim($phoneNumbersArray[$index])."' ";
	   $sql.="OR user_contact.mobile='".trim($phoneNumbersArray[$index])."') OR";
	  }
     $sql=chop($sql,"OR");
	 $sql.="))) As tbl WHERE phoneNumber IS NOT NULL;";
	return $sql;
   }
   
  /***************************************************************************************************************************
   ******************************************* USER FRIENDSHIP NOTIFICATIONS *************************************************
   ***************************************************************************************************************************/
  function query_cookies_categoriesUpdate(){
    $sql="SELECT * FROM app_cookies WHERE cookie='CATEGORIES';";
	return $sql;
  }
  
  function query_notify_usrFrndsReqReciever($user_Id){
  /* Notification Query to User recieved Friendship Request */
    $sql="SELECT ";
    $sql.=" user_frnds_req.req_Id, user_frnds_req.from_userId, user_account.username, user_account.surName, ";
    $sql.=" user_account.name, user_frnds_req.req_on, user_frnds_req.notify, user_frnds_req.watched ";
    $sql.=" FROM user_account, user_frnds_req WHERE user_account.user_Id=user_frnds_req.from_userId AND ";
    $sql.=" user_frnds_req.to_userId='".$user_Id."' AND user_frnds_req.notify='N' ORDER BY user_frnds_req.req_on ";
	$sql.="DESC LIMIT 0 , 10;";
	return $sql;
  }  
  
  function query_notify_onAcceptUserFrndReq($user_Id){
  /* Notification Query to Users(Sender/Reciever) as reciever accepts Friendship */
   $sql="SELECT DISTINCT user_frnds.rel_Id, user_frnds.rel_from, user_frnds.rel_tz, ";
   $sql.=" (SELECT CONCAT('[{\'frnd1\':\'',user_frnds.frnd1,'\',\'surName\':\'',user_account.surName,'\',";
   $sql.="\'name\':\'',user_account.name,'\',\'frnd1_call_frnd2\':\'',user_frnds.frnd1_call_frnd2,'\'}]') ";
   $sql.=" FROM user_account WHERE user_account.user_Id=user_frnds.frnd1) As requestSent, ";
   $sql.=" (SELECT CONCAT('[{\'frnd2\':\'',user_frnds.frnd2,'\',\'surName\':\'',user_account.surName,'\',\'name\':\'',";
   $sql.=" user_account.name,'\',\'frnd2_call_frnd1\':\'',user_frnds.frnd2_call_frnd1,'\'}]') FROM user_account WHERE ";
   $sql.=" user_account.user_Id=user_frnds.frnd2) As requestrecieved, user_frnds.notify FROM user_frnds ";
   $sql.=" WHERE (user_frnds.frnd1='".$user_Id."' OR user_frnds.frnd2='".$user_Id."') AND user_frnds.notify='N' ";
   $sql.="  ORDER BY user_frnds.rel_from DESC LIMIT 0 , 10; ";
   return $sql;
  }
  
  function query_notify_reqLocalBranch($user_Id){
  /* Request to Local Branch */
    $sql="SELECT CONCAT('[{\'user_Id\':\'',user_account.user_Id,'\',\'surName\':\'', user_account.surName, ";
    $sql.="'\',\'name\':\'', user_account.name,'\'}]') As requestedBy, unionprof_account.unionName, ";
    $sql.="unionprof_branch_req.minlocation, unionprof_branch_req.location, ";
    $sql.="unionprof_branch_req.state, unionprof_branch_req.country, unionprof_branch_req.reqOn ";
    $sql.="FROM unionprof_account, unionprof_branch_req, user_account ";
    $sql.="WHERE unionprof_account.union_Id=unionprof_branch_req.union_Id AND ";
    $sql.="unionprof_branch_req.reqBy=user_account.user_Id AND unionprof_account.admin_Id='".$user_Id."' ";
	$sql.=" ORDER BY reqOn DESC LIMIT 0,10 ";
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
    $sql.="unionprof_mem_roles.roleName, unionprof_mem_perm1.createABranch, unionprof_mem_perm1.createABranchNotify, ";
    $sql.="unionprof_mem_perm1.updateBranchInfo, unionprof_mem_perm1.updateBranchInfoNotify, unionprof_mem_perm1.deleteBranch, ";
	$sql.="unionprof_mem_perm1.deleteBranchNotify, unionprof_mem_perm1.shiftMainBranch, ";
	$sql.="unionprof_mem_perm1.shiftMainBranchNotify, unionprof_mem_perm1.createRole, unionprof_mem_perm1.createRoleNotify, ";
    $sql.="unionprof_mem_perm1.updateRole, unionprof_mem_perm1.updateRoleNotify, unionprof_mem_perm1.deleteRole, ";
	$sql.="unionprof_mem_perm1.deleteRoleNotify, unionprof_mem_perm1.requestUsersToBeMembers, ";
	$sql.="unionprof_mem_perm1.requestUsersToBeMembersNotify,unionprof_mem_perm1.approveUsersToBeMembers, ";
	$sql.="unionprof_mem_perm1.approveUsersToBeMembersNotify, unionprof_mem_perm1.createNewsFeedBranchLevel, ";
	$sql.="unionprof_mem_perm1.createNewsFeedBranchLevelNotify,unionprof_mem_perm1.approveNewsFeedBranchLevel, ";
	$sql.="unionprof_mem_perm1.approveNewsFeedBranchLevelNotify, unionprof_mem_perm1.createNewsFeedUnionLevel, ";
	$sql.="unionprof_mem_perm1.createNewsFeedUnionLevelNotify, unionprof_mem_perm1.approveNewsFeedUnionLevel, ";
	$sql.="unionprof_mem_perm1.approveNewsFeedUnionLevelNotify, unionprof_mem_perm1.createMovementBranchLevel, ";
	$sql.="unionprof_mem_perm1.createMovementBranchLevelNotify, unionprof_mem_perm1.approveMovementBranchLevel, ";
	$sql.="unionprof_mem_perm1.approveMovementBranchLevelNotify, unionprof_mem_perm1.createMovementUnionLevel, ";
	$sql.="unionprof_mem_perm1.createMovementUnionLevelNotify, unionprof_mem_perm1.approveMovementUnionLevel, ";
	$sql.="unionprof_mem_perm1.approveMovementUnionLevelNotify, unionprof_mem_perm1.createMovementSubDomainLevel, ";
	$sql.="unionprof_mem_perm1.createMovementSubDomainLevelNotify, unionprof_mem_perm1.approveMovementSubDomainLevel, ";
	$sql.="unionprof_mem_perm1.approveMovementSubDomainLevelNotify, unionprof_mem_perm1.createMovementDomainLevel, ";
	$sql.="unionprof_mem_perm1.createMovementDomainLevelNotify, unionprof_mem_perm1.approveMovementDomainLevel, ";
	$sql.="unionprof_mem_perm1.approveMovementDomainLevelNotify, unionprof_mem_perm1.updatedPermOn ";
    $sql.="FROM unionprof_account, unionprof_branch, unionprof_mem, unionprof_mem_roles, unionprof_mem_perm1 ";
    $sql.="WHERE ";
    $sql.="unionprof_account.union_Id=unionprof_mem.union_Id AND unionprof_branch.branch_Id=unionprof_mem.branch_Id AND ";
    $sql.="unionprof_mem.cur_role_Id=unionprof_mem_roles.role_Id AND unionprof_mem.user_Id='".$user_Id."' AND ";
    $sql.="(unionprof_mem_perm1.createABranchNotify='Y' OR unionprof_mem_perm1.updateBranchInfoNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.deleteBranchNotify='Y' OR unionprof_mem_perm1.shiftMainBranchNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.createRoleNotify='Y' OR  unionprof_mem_perm1.updateRoleNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.deleteRoleNotify='Y' OR unionprof_mem_perm1.requestUsersToBeMembersNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.approveUsersToBeMembersNotify='Y' OR unionprof_mem_perm1.createNewsFeedBranchLevelNotify='Y' ";
	$sql.="OR unionprof_mem_perm1.approveNewsFeedBranchLevelNotify='Y' OR ";
	$sql.="unionprof_mem_perm1.createNewsFeedUnionLevelNotify='Y' OR unionprof_mem_perm1.approveNewsFeedUnionLevelNotify='Y' ";
	$sql.="OR unionprof_mem_perm1.createMovementBranchLevelNotify='Y' OR ";
	$sql.="unionprof_mem_perm1.approveMovementBranchLevelNotify='Y' OR unionprof_mem_perm1.createMovementUnionLevelNotify='Y' ";
	$sql.="OR unionprof_mem_perm1.approveMovementUnionLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.createMovementSubDomainLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.approveMovementSubDomainLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.createMovementDomainLevelNotify='Y' OR ";
    $sql.="unionprof_mem_perm1.approveMovementDomainLevelNotify='Y') ";
	$sql.=" ORDER BY unionprof_mem_perm1.updatedPermOn DESC LIMIT 0 , 1; ";
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