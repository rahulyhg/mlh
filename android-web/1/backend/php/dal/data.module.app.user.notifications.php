<?php
 class UserNotifications {
   function query_notified_friendRequestReceived($req_Id){
    $sql="UPDATE user_frnds_req SET notify='Y' WHERE req_Id='".$req_Id."';";
	return $sql;
   }
   function query_notified_friendRequestAccepted($rel_Id){
    $sql="UPDATE user_frnds SET notify='Y' WHERE rel_Id='".$rel_Id."';";
	return $sql;
   }
 }
?>