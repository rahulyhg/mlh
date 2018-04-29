<?php
class app_notifications {
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
}
?>