<?php 
class notifications {
  function query_sendUserFrndRequests($req_Id,$fromUserId,$toUserId,$usr_frm_call_to){
    $sql="INSERT INTO user_frnds_req(req_Id, from_userId,  to_userId,usr_frm_call_to, req_on) ";
	$sql.="VALUES ('".$req_Id."','".$fromUserId."','".$toUserId."','".$usr_frm_call_to."','".date("Y-m-d H:i:s")."')";
	return $sql;
  }
}
?>