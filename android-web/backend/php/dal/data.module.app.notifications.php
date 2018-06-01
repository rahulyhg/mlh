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
	$sql.="(SELECT count(*) FROM  dash_info_user_views WHERE user_Id='".$user_Id."') As newsFeedWatched, ";
	$sql.="(SELECT count(*) FROM user_notify WHERE user_Id='".$user_Id."' AND notifyType='NEWSFEED' AND ";
	$sql.="watched='N') As newsFeedUnWatched, ";
	$sql.="(SELECT count(*) FROM move_sign WHERE user_Id='".$user_Id."') As movementParticipated, ";
	$sql.="(SELECT count(*) FROM user_notify WHERE user_Id='".$user_Id."' AND notifyType='MOVEMENT' AND ";
	$sql.="watched='N') As movementUnParticipated ";
	return $sql;
  }
}
?>