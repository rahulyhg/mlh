<?php
 class UserNotifications {
   function query_notified_friendRequestReceived($req_Id){
    $sql="UPDATE user_frnds_req SET notify='Y' WHERE req_Id='".$req_Id."';";
	return $sql;
   }
 }
?>