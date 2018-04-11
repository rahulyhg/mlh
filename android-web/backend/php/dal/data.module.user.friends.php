<?php 
class user_friends {
  
  /* Find Friends */
  function query_count_searchPeopleByLocation($user_Id,$minlocation,$location,$state,$country){
    $sql="SELECT ";
 	$sql.="count(DISTINCT user_account.user_Id) As searchResult ";
 	$sql.=" FROM user_account WHERE user_account.acc_active='Y' AND";
	
		if(strlen($minlocation)>0) { $sql.=" minlocation='".$minlocation."' AND"; }
		if(strlen($location)>0) { $sql.=" location='".$location."' AND"; }
		if(strlen($state)>0) { $sql.=" state='".$state."' AND"; }
		if(strlen($country)>0) { $sql.=" country='".$country."' AND"; }
		$sql=chop($sql,'AND');
	return $sql;
 }
 
  function query_searchPeopleByLocation($user_Id,$minlocation,$location,$state,$country,$limit_start,$limit_end){
    $sql="SELECT ";
 	$sql.="DISTINCT user_account.user_Id, ";
	$sql.="user_account.username, user_account.surName, user_account.name, user_account.profile_pic, ";
	$sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country, ";
    $sql.="IF(user_Id in (SELECT frnd1 FROM `user_frnds` WHERE frnd2='".$user_Id."' UNION ";
    $sql.="SELECT frnd2 FROM user_frnds WHERE frnd1='".$user_Id."'),'YES','NO') As isFriend, ";
	$sql.="IF(user_Id in (SELECT from_userId FROM user_frnds_req WHERE to_userId='".$user_Id."'),'YES','NO') As youRecFrndRequest, ";
    $sql.="IF(user_Id in (SELECT to_userId FROM user_frnds_req WHERE from_userId='".$user_Id."'),'YES','NO') As youSentfrndRequest ";
 	$sql.=" FROM user_account WHERE user_account.acc_active='Y' AND";
	
	if(strlen($minlocation)>0) { $sql.=" user_account.minlocation='".$minlocation."' AND"; } 
	if(strlen($location)>0) { $sql.=" user_account.location='".$location."' AND"; }
	if(strlen($state)>0) { $sql.=" user_account.state='".$state."' AND"; }
	if(strlen($country)>0) { $sql.=" user_account.country='".$country."' AND"; }
	$sql=chop($sql,'AND');
	$sql.="LIMIT ".$limit_start.", ".$limit_end.";";
    return $sql;
  }

  function query_count_frndrequestsToMe($user_Id){
    $sql="SELECT count(*) ";
    $sql.="FROM user_account, user_frnds_req ";
    $sql.="WHERE user_frnds_req.to_userId='".$user_Id."' ";
    $sql.="AND user_account.user_Id=user_frnds_req.from_userId ";
    $sql.="ORDER BY req_on ASC ";
	return $sql;
  }

  function query_frndrequestsToMe($user_Id,$limit_start,$limit_end){
    $sql="SELECT ";
    $sql.="user_frnds_req.from_userId, user_account.user_Id, user_account.surName, user_account.name, ";
    $sql.="user_account.profile_pic, user_account.minlocation, user_account.location, user_account.state, ";
    $sql.="user_account.country, user_frnds_req.req_on, user_frnds_req.req_tz ";
    $sql.="FROM user_account, user_frnds_req ";
    $sql.="WHERE user_frnds_req.to_userId='".$user_Id."' ";
    $sql.="AND user_account.user_Id=user_frnds_req.from_userId ";
    $sql.="ORDER BY req_on ASC LIMIT ".$limit_start.", ".$limit_end;
	return $sql;
  }
  
  function query_sendUserFrndRequests($req_Id,$fromUserId,$toUserId,$usr_frm_call_to){
    $sql="INSERT INTO user_frnds_req(req_Id, from_userId,  to_userId,usr_frm_call_to, req_on) ";
	$sql.="VALUES ('".$req_Id."','".$fromUserId."','".$toUserId."','".$usr_frm_call_to."','".date("Y-m-d H:i:s")."')";
	return $sql;
  }

  function query_addUserFrnds($rel_Id, $rel_from, $rel_tz, $frnd1, $frnd2, $frnd1_call_frnd2, $frnd2_call_frnd1){
    $sql="INSERT INTO user_frnds(rel_Id, rel_from, rel_tz, frnd1, frnd2, frnd1_call_frnd2, frnd2_call_frnd1) ";
	$sql.="VALUES ('".$rel_Id."','".date("Y-m-d H:i:s")."','".$rel_tz."','".$frnd1."','".$frnd2."','".$frnd1_call_frnd2."','".$frnd2_call_frnd1."');";
   return $sql;
  }
  
  function query_deleteFrndRequestToMe($from_userId,$to_userId){
   $sql="DELETE FROM `user_frnds_req` WHERE from_userId='".$from_userId."' AND to_userId='".$to_userId."'";
   return $sql;
  }
  
  function query_unfriendAperson($frnd1,$frnd2){
    $sql="DELETE FROM user_frnds WHERE ";
	$sql.="(frnd1='".$frnd1."' AND frnd2='".$frnd2."') OR (frnd1='".$frnd2."' AND frnd2='".$frnd1."');";
	echo $sql;
	return $sql;
  }  

  /* My Friends */
  function query_count_userFrndsList_acceptedByMe($user_Id){
  /* controller: controller.page.app.myfriends.php, action: FRNDS_LIST_COUNT */
    $sql="SELECT count(*) FROM user_frnds,user_account ";
	$sql.="WHERE user_frnds.frnd1=user_account.user_Id AND user_frnds.frnd2='".$user_Id."';";
	return $sql;
  }
  
  function query_count_userFrndsList_acceptedByFrnds($user_Id){
  /* controller: controller.page.app.myfriends.php, action: FRNDS_LIST_COUNT */
    $sql="SELECT count(*) FROM user_frnds,user_account ";
	$sql.="WHERE user_frnds.frnd2=user_account.user_Id AND user_frnds.frnd1='".$user_Id."';";
    return $sql;
  }
  
  function query_userFrndsList_acceptedByMe($user_Id,$limit_start,$limit_end){
  /* controller: controller.page.app.myfriends.php, action: FRNDS_LIST */
    $sql="SELECT ";
	$sql.="user_frnds.frnd1, user_account.user_Id, user_account.surName,";
	$sql.="user_account.name, user_account.profile_pic, user_account.minlocation, ";
	$sql.="user_account.location, user_account.state, user_account.country ";
	$sql.="FROM user_frnds,user_account ";
	$sql.="WHERE user_frnds.frnd1=user_account.user_Id AND user_frnds.frnd2='".$user_Id."' ";
	$sql.="LIMIT ".$limit_start.",".$limit_end.";";
	return $sql;
  }
  
  function query_userFrndsList_acceptedByFrnds($user_Id,$limit_start,$limit_end){
  /* controller: controller.page.app.myfriends.php, action: FRNDS_LIST */
    $sql="SELECT ";
	$sql.="user_frnds.frnd2, user_account.user_Id, user_account.surName,";
	$sql.="user_account.name, user_account.profile_pic, user_account.minlocation, ";
	$sql.="user_account.location, user_account.state, user_account.country ";
	$sql.="FROM user_frnds,user_account ";
	$sql.="WHERE user_frnds.frnd2=user_account.user_Id AND user_frnds.frnd1='".$user_Id."' ";
	$sql.="LIMIT ".$limit_start.",".$limit_end.";";
    return $sql;
  }

  function query_deleteFrnd($myUser_Id, $frnd_Id){
  /* controller: controller.page.app.myfriends.php, action: DELETE_FRND */
    $sql="DELETE FROM user_frnds ";
	$sql.="WHERE (frnd1='".$myUser_Id."' AND frnd2='".$frnd_Id."') ";
	$sql.="OR (frnd1='".$frnd_Id."' AND frnd2='".$myUser_Id."')";
	return $sql;
  }

  /* Add Friends through AutoComplete */
  function query_invite_frnds($user_Id,$term,$avoid){
   $sql="SELECT user_account.user_Id,";
   $sql.="user_account.username,user_account.surName,user_account.name,user_account.mobile,user_account.profile_pic,";
   $sql.="user_account.minlocation,user_account.location,user_account.state,user_account.country ";
   $sql.="FROM user_frnds,user_account ";
   $sql.="WHERE ((user_frnds.frnd1=user_account.user_Id and user_frnds.frnd2='".$user_Id."') ";
   $sql.="OR (user_frnds.frnd2=user_account.user_Id and user_frnds.frnd1='".$user_Id."')) ";
   $sql.="AND (surName LIKE '%".$term."%' OR name LIKE '%".$term."%') ";
   for($index=0;$index<count($avoid);$index++){
      $sql.="AND NOT user_account.user_Id='".$avoid[$index]."' ";
   }
   
  // $sql.="LIMIT 0,5";
   return $sql;
  }
}

?>