<?php
class app_notifications {

  /***************************************************************************************************************************
   ******************************************* USER FRIENDSHIP NOTIFICATIONS *************************************************
   ***************************************************************************************************************************/
  
  function query_notify_usrFrndsReqReciever($user_Id){
  /* Notification Query to User recieved Friendship Request */
    $sql="SELECT ";
    $sql.=" user_account.surName, user_account.name, user_account.profile_pic, user_account.minlocation,";
    $sql.=" user_account.location, user_account.state, user_account.country, user_frnds_req.req_on, user_frnds_req.req_tz ";
    $sql.=" FROM user_account, user_frnds_req WHERE user_account.user_Id=user_frnds_req.from_userId ";
    $sql.=" user_frnds_req.to_userId='".$user_Id."' ";
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
   $sql.=" WHERE (user_frnds.frnd1='".$user_Id."' OR user_frnds.frnd2='".$user_Id."') AND notify='Y';";
   return $sql;
  }
  
  function query_notify_unionMemberReqReciever($user_Id){
  /* Notification Query to User Recieved Membership Request for a Union */
    $sql="SELECT ";
	$sql.=" subs_dom_info.domainName, subs_subdom_info.subdomainName, ";
	$sql.=" user_account.surName, user_account.name, unionprof_account.union_Id, unionprof_account.unionName, ";
	$sql.=" unionprof_account.profile_pic, unionprof_account.created_On, unionprof_branch.minlocation, ";
	$sql.=" unionprof_branch.location, unionprof_branch.state, unionprof_branch.country FROM ";
	$sql.=" user_account, subs_dom_info, subs_subdom_info, unionprof_account, unionprof_branch, unionprof_mem_req WHERE ";
	$sql.=" unionprof_account.union_Id = unionprof_branch.union_Id AND ";
	$sql.=" unionprof_account.union_Id = unionprof_mem_req.union_Id AND ";
	$sql.=" unionprof_branch.branch_Id = unionprof_mem_req.branch_Id AND ";
	$sql.=" unionprof_account.domain_Id = subs_dom_info.domain_Id AND ";
	$sql.=" unionprof_account.subdomain_Id = subs_subdom_info.subdomain_Id AND ";
	$sql.=" unionprof_mem_req.req_to='".$user_Id."' AND unionprof_mem_req.req_from=user_account.user_Id; ";
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
   $sql.="memberJoinedInfo, (SELECT unionprof_mem_roles.cur_roleName FROM unionprof_mem_roles WHERE ";
   $sql.="unionprof_mem_roles.role_Id=unionprof_mem.cur_role_Id) As roleName, unionprof_mem.cur_role_Id, ";
   $sql.="(SELECT CONCAT('[{\"user_Id\":\"',user_account.user_Id,'\",\"username\":\"',user_account.username, ";
   $sql.="'\",\"surName\":\"',user_account.surName,'\",\"name\":\"',user_account.name,'\"}]') ";
   $sql.="FROM user_account WHERE user_account.user_Id=unionprof_mem.memAddedBy) As memberJoinedByInfo ";
   $sql.="FROM unionprof_mem WHERE unionprof_mem.user_Id='".$user_Id."' OR unionprof_mem.memAddedBy='".$user_Id."' ";
   $sql.="AND unionprof_mem.memNotify='Y';";
   return $sql;
  }
  
  function query_notify_unionMemberOnRoleChange($user_Id){
  /* Notification Query to User When his role changes in Union */
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
	$sql.="unionprof_mem.user_Id='".$user_Id."';";
	return $sql;
  }
  
}
?>