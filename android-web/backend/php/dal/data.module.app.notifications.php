<?php
class app_notifications {
  /*
  function query_getLatestNotification($user_Id){
    $sql="SELECT * FROM user_notify WHERE user_Id='".$user_Id."' AND popup='N' AND watched='N' ";
	$sql.="ORDER BY notify_ts DESC LIMIT 1;";
	return $sql;
  }
  function query_getLatestUnWatchedNotification($user_Id){
    $sql="SELECT * FROM user_notify WHERE user_Id='".$user_Id."' AND watched='N' ";
	$sql.="ORDER BY notify_ts DESC LIMIT 1;";
	return $sql;
  }
  function query_setNotificationWatched($notify_Id){
    $sql="UPDATE user_notify SET  watched='Y' WHERE notify_Id='".$notify_Id."';";
	return $sql;
  }
  function query_setNotificationPopup($notify_Id){
    $sql="UPDATE user_notify SET  popup='Y' WHERE notify_Id='".$notify_Id."';";
	return $sql;
  }
  */
  function query_count_getNotificationOverview($user_Id){
    $sql="SELECT ";
	$sql.="(SELECT count(*) FROM user_notify ";
	$sql.="WHERE user_Id='".$user_Id."' AND notifyType='PEOPLE_RELATIONSHIP_REQUEST' ";
	$sql.="AND req_accepted='N') As relationShipRequests , ";
	$sql.="(SELECT count(*) FROM user_notify ";
	$sql.="WHERE user_Id='".$user_Id."' AND notifyType='COMMUNITY_MEMBERSHIP_REQUEST' ";
	$sql.="AND req_accepted='N') As communityMembershipRequests, ";
	$sql.="(SELECT count(DISTINCT info_Id) FROM  dash_info_user_views WHERE user_Id='".$user_Id."') As newsFeedWatched, ";
	$sql.="(SELECT count(*) FROM user_notify WHERE user_Id='".$user_Id."' AND notifyType='NEWSFEED' AND ";
	$sql.="watched='N') As newsFeedUnWatched, ";
	$sql.="(SELECT count(*) FROM move_sign WHERE user_Id='".$user_Id."') As movementParticipated, ";
	$sql.="(SELECT count(*) FROM user_notify WHERE user_Id='".$user_Id."' AND notifyType='MOVEMENT' AND ";
	$sql.="watched='N') As movementUnParticipated ";
	return $sql;
  }
  
  function query_count_getPeopleRelationshipRequests($user_Id){
	$sql="SELECT count(*) As totalData FROM user_notify, user_account ";
	$sql.="WHERE user_notify.user_Id='".$user_Id."' AND ";
	$sql.="user_notify.from_Id=user_account.user_Id AND ";
	$sql.="user_notify.notifyType='PEOPLE_RELATIONSHIP_REQUEST'; ";
	return $sql;
  }
  
  function query_getPeopleRelationshipRequests($user_Id,$limit_start,$limit_end){
	$sql="SELECT user_notify.notify_Id, ";
	$sql.="user_notify.from_Id, user_notify.notifyHeader, user_notify.notifyMsg, user_notify.notifyTitle, ";
	$sql.="user_notify.notifyURL, user_notify.notify_ts, user_notify.watched, user_account.surName, ";
	$sql.="user_account.name, user_account.profile_pic FROM user_notify, user_account ";
	$sql.="WHERE user_notify.user_Id='".$user_Id."' AND ";
	$sql.="user_notify.from_Id=user_account.user_Id AND ";
	$sql.="user_notify.notifyType='PEOPLE_RELATIONSHIP_REQUEST' ";
	$sql.="LIMIT ".$limit_start.",".$limit_end;
	return $sql;
  }
  
  function query_deleteRelationshipRequestNotification($notify_Id){
    $sql="DELETE FROM `user_notify` WHERE notify_Id='".$notify_Id."';";
	return $sql;
  }
  
  function query_addNotify_sendFriendRequest($notify_Id,$user_Id,$from_Id,$notifyHeader,$notifyTitle,
        $notifyMsg,$notifyType,$notifyURL,$notify_ts,$watched,$popup,$req_accepted,$cal_event){
    $sql="INSERT INTO user_notify(notify_Id, user_Id, from_Id, notifyHeader, notifyTitle, ";
	$sql.="notifyMsg, notifyType, notifyURL, notify_ts, watched, popup, req_accepted, cal_event) ";
	$sql.="VALUES ('".$notify_Id."','".$user_Id."','".$from_Id."','".$notifyHeader."','".$notifyTitle."','";
	$sql.=$notifyMsg."','".$notifyType."','".$notifyURL."','".$notify_ts."','".$watched."','".$popup."','";
	$sql.=$req_accepted."','".$cal_event."');";
	return $sql;
  }
  
  function query_deleteNotify_acceptDeleteRequest($user_Id,$from_Id){
    $sql="DELETE FROM `user_notify` WHERE user_Id='".$user_Id."' AND from_Id='".$from_Id."'";
	return $sql;
  }
  
  /* COMMUNITY MEMBERSHIP REQUESTS */
  function query_count_getCommunityMembershipRequests($user_Id){
    $sql="SELECT count(*) As totalData FROM user_notify, union_account, user_account ";
	$sql.=" WHERE user_notify.from_Id=union_account.union_Id AND ";
	$sql.="union_account.admin_Id=user_account.user_Id AND user_notify.notifyType='COMMUNITY_MEMBERSHIP_REQUEST' ";
	$sql.="AND user_notify.user_Id='".$user_Id."' ";
	return $sql;
  }
  
  function query_getCommunityMembershipRequests($user_Id, $limit_start, $limit_end){
    $sql="SELECT union_account.unionName, union_account.unionURLName, user_account.surName, user_account.name, ";
	$sql.="user_notify.notify_ts, user_notify.watched, user_notify.popup, user_notify.req_accepted, user_notify.cal_event ";
	$sql.="FROM user_notify, union_account, user_account WHERE user_notify.from_Id=union_account.union_Id AND ";
	$sql.="union_account.admin_Id=user_account.user_Id AND user_notify.notifyType='COMMUNITY_MEMBERSHIP_REQUEST' ";
	$sql.="AND user_notify.user_Id='".$user_Id."' ";
	$sql.="LIMIT ".$limit_start.", ".$limit_end;
	return $sql;
  }
}
?>