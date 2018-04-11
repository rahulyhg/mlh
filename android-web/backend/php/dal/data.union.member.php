<?php
 class union_member {
   function query_addMember($member_Id,$union_Id,$userIdList,$roleName,$isAdmin){
     $sql='';
     for($index=0;$index<count($userIdList);$index++) {
		$sql.="INSERT INTO union_mem(member_Id, union_Id, user_Id, roleName, isAdmin, addedOn) ";
		$sql.="VALUES ('".$member_Id."','".$union_Id."','".$userIdList[$index]."','".$roleName."','".$isAdmin."','";
		$sql.=date("Y-m-d H:i:s")."'); ";
	 }
	 return $sql;
   }
   
   function query_getUserIdByEmail($union_Id,$arry_email){
     $sql="SELECT user_Id FROM user_account WHERE ";
     for($index=0;$index<count($arry_email);$index++){
       $sql.=" email='".$arry_email[$index]."' OR";
	 }
	 $sql=chop($sql,"OR");
	 $sql.="AND user_Id NOT IN (SELECT union_mem_req.req_to FROM union_mem_req,user_account ";
	 $sql.="WHERE union_mem_req.req_to=user_account.user_Id AND union_mem_req.union_Id='".$union_Id."' ) ";
	 $sql.="AND user_Id NOT IN (SELECT union_mem.user_Id FROM union_mem,user_account ";
	 $sql.="WHERE union_mem.user_Id=user_account.user_Id AND union_mem.union_Id='".$union_Id."' ) ";
	return $sql;
   }
   function query_addMemberReqByEmail($idObj,$union_Id,$req_from,$arry_userId){
     $sql="";
	 for($index=0;$index<count($arry_userId);$index++){
		 $sql.="INSERT IGNORE INTO union_mem_req(request_Id, union_Id, req_from, req_to, sent_On)";
		 $sql.="VALUES ('".$idObj->union_memreq_id()."','".$union_Id."','";
		 $sql.=$req_from."','".$arry_userId[$index]["user_Id"]."','".date("Y-m-d H:i:s")."'); ";
	 }
	 return $sql;
   }
   
 }
?>