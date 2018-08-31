<?php 
class user_friends {
  
  function query_sendUserFrndRequests($req_Id,$fromUserId,$toUserId,$usr_frm_call_to){
	$sql="INSERT INTO user_frnds_req(req_Id, from_userId,  to_userId,usr_frm_call_to, req_on) ";
    $sql.="SELECT * FROM ( ";
    $sql.="SELECT '".$req_Id."','".$fromUserId."','".$toUserId."','".$usr_frm_call_to."','".date("Y-m-d H:i:s")."') ";
	$sql.="As Tbl1 WHERE (SELECT count(*) FROM user_frnds_req WHERE (from_userId='".$fromUserId."' AND ";
	$sql.="to_userId='".$toUserId."') OR (from_userId='".$toUserId."' AND to_userId='".$fromUserId."'))=0 ";
	return $sql;
  }

  function query_addUserFrnds($rel_Id, $rel_from, $rel_tz, $frnd1, $frnd2, $frnd1_call_frnd2, $frnd2_call_frnd1){
    $sql="INSERT INTO user_frnds(rel_Id, rel_from, rel_tz, frnd1, frnd2, frnd1_call_frnd2, frnd2_call_frnd1,notify) ";
	$sql.="VALUES ('".$rel_Id."','".date("Y-m-d H:i:s")."','".$rel_tz."','".$frnd1."','".$frnd2."','".$frnd1_call_frnd2."','".$frnd2_call_frnd1."','Y');";
   return $sql;
  }
  
  function query_deleteFrndRequestToMe($from_userId,$to_userId){
   $sql="DELETE FROM user_frnds_req WHERE (from_userId='".$from_userId."' AND to_userId='".$to_userId."') ";
   $sql.=" OR (from_userId='".$to_userId."' AND to_userId='".$from_userId."'); ";
   return $sql;
  }
  
  function query_unfriendAperson($frnd1,$frnd2){
    $sql="DELETE FROM user_frnds WHERE ";
	$sql.="(frnd1='".$frnd1."' AND frnd2='".$frnd2."') OR (frnd1='".$frnd2."' AND frnd2='".$frnd1."');";
	return $sql;
  }  

  /* My Friends */
 
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
  
  function query_getUserFrndListByIds($user_Id){
    $sql="(SELECT frnd1 As frnd FROM user_frnds WHERE frnd2='".$user_Id."')";
	$sql.="UNION ";
	$sql.="(SELECT frnd2 As frnd FROM user_frnds WHERE frnd1='".$user_Id."');";
	return $sql;
  }

  /* List of Friends */
  function query_count_allFriendsOfUser($user_Id){
    $sql="SELECT count(*) FROM user_frnds WHERE frnd1='".$user_Id."' OR frnd2='".$user_Id."'; ";
	return $sql;
  }
  function query_data_allFriendsOfUser($user_Id){
    $sql="SELECT * FROM (";
    $sql.="(SELECT user_account.user_Id, user_account.username, user_account.surName, ";
	$sql.="user_account.name, user_account.profile_pic, user_account.about_me, user_account.minlocation, ";
	$sql.=" user_account.location, user_account.state, user_account.country, user_account.created_On ";
	$sql.="FROM user_frnds, user_account WHERE user_frnds.frnd1='".$user_Id."' AND ";
	$sql.=" user_frnds.frnd2=user_account.user_Id) UNION ";
	$sql.="(SELECT user_account.user_Id, user_account.username, user_account.surName, ";
	$sql.="user_account.name, user_account.profile_pic, user_account.about_me, user_account.minlocation, ";
	$sql.=" user_account.location, user_account.state, user_account.country, user_account.created_On ";
	$sql.=" FROM user_frnds, user_account WHERE user_frnds.frnd2='".$user_Id."' ";
	$sql.=" AND user_frnds.frnd1=user_account.user_Id)) As Tbl ORDER BY surName ASC; ";
	return $sql;
  }
    
  /* List of Pending FriendRequests */
  /* Recieved Friend Requests */
  function query_count_recievedFriendRequests($to_userId){
    $sql="SELECT count(*) FROM user_frnds_req, user_account WHERE user_frnds_req.to_userId='".$to_userId."' AND ";
	$sql.="user_account.user_Id=user_frnds_req.from_userId;";
	return $sql;
  }
  
  function query_data_recievedFriendRequests($to_userId,$limit_start,$limit_end){
    $sql="SELECT user_account.user_Id, user_account.username, user_account.surName, ";
	$sql.="user_account.name, user_account.profile_pic, user_account.about_me, user_account.minlocation, ";
	$sql.="user_account.location, user_account.state, user_account.country, user_account.created_On FROM ";
	$sql.="user_frnds_req, user_account WHERE user_frnds_req.to_userId='".$to_userId."' AND ";
	$sql.="user_account.user_Id=user_frnds_req.from_userId LIMIT ".$limit_start.", ".$limit_end;
	return $sql;
  }
  /* Sent Friend Requests */
  function query_count_sentFriendRequests($from_userId){
    $sql="SELECT count(*) FROM user_frnds_req, user_account WHERE user_frnds_req.from_userId='".$from_userId."' AND ";
	$sql.="user_account.user_Id=user_frnds_req.to_userId;";
  }
  
  function query_data_sentFriendRequests($from_userId,$limit_start,$limit_end){
    $sql="SELECT user_account.user_Id, user_account.username, user_account.surName, ";
	$sql.="user_account.name, user_account.profile_pic, user_account.about_me, user_account.minlocation, ";
	$sql.="user_account.location, user_account.state, user_account.country, user_account.created_On FROM ";
	$sql.="user_frnds_req, user_account WHERE user_frnds_req.from_userId='".$from_userId."' AND ";
	$sql.="user_account.user_Id=user_frnds_req.to_userId LIMIT ".$limit_start.", ".$limit_end;
	return $sql;
  }
  
}
?>