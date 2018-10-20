<?php
class Movement {
  function query_count_getUserParticipatedMovements($user_Id){
	$sql="SELECT count(*) ";
	$sql.=" FROM move_info, unionprof_account, unionprof_branch ";
	$sql.="WHERE move_info.move_Id IN (SELECT DISTINCT move_Id FROM move_sign WHERE ";
	$sql.="user_Id='".$user_Id."') AND move_info.move_status = 'OPEN' AND unionprof_account.union_Id=move_info.union_Id AND ";
	$sql.=" unionprof_account.main_branch_Id=unionprof_branch.branch_Id; ";
    return $sql;
  }  
  
  function query_data_getUserParticipatedMovements($user_Id,$limit_start,$limit_end){
	$sql="SELECT move_info.move_Id, ";
	$sql.="unionprof_account.domain_Id, (SELECT domainName FROM subs_dom_info ";
	$sql.="WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id) As domainName, ";
	$sql.="unionprof_account.subdomain_Id, (SELECT 	subdomainName FROM subs_subdom_info ";
	$sql.="WHERE subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id) As 	subdomainName, ";
	$sql.="move_info.union_Id, unionprof_account.unionName, ";
	$sql.="unionprof_branch.minlocation, unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
	$sql.="move_info.branch_Id, move_info.createdOn, ";
	$sql.="move_info.petitionTitle, move_info.issue_desc, move_info.move_img, move_info.move_status, ";
	$sql.="move_info.openOn, move_info.displayLevel ";
	$sql.=" FROM move_info, unionprof_account, unionprof_branch ";
	$sql.="WHERE move_info.move_Id IN (SELECT DISTINCT move_Id FROM move_sign WHERE ";
	$sql.="user_Id='".$user_Id."') AND move_info.move_status = 'OPEN' AND unionprof_account.union_Id=move_info.union_Id AND ";
	$sql.=" unionprof_account.main_branch_Id=unionprof_branch.branch_Id ";
	$sql.=" LIMIT ".$limit_start.",".$limit_end;
    return $sql;
  }  
}
?>