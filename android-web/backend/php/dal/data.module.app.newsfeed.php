<?php
class Newsfeed {
  function query_count_listOfAvailCommunitiesAndBranchesToWriteNewsFeed($user_Id){
  /* FUNCTION DESCRIPTION : This Function is used to provide list of Available Communities and their Branches
   *						to Write NewsFeed.
   * PAGES UTILIZED :  
   */
   $sql="SELECT count(*) FROM subs_dom_info, subs_subdom_info, unionprof_account, unionprof_branch, unionprof_mem, "; 
   $sql.=" unionprof_mem_perm WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id AND ";
   $sql.=" subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id AND ";
   $sql.=" unionprof_mem.union_Id=unionprof_account.union_Id AND ";
   $sql.=" unionprof_mem.branch_Id=unionprof_branch.branch_Id AND ";
   $sql.=" unionprof_mem.user_Id='".$user_Id."' AND  unionprof_mem.role_Id=unionprof_mem_perm.role_Id AND ";
   $sql.="(unionprof_mem_perm.createNewsFeedBranchLevel='Y' OR unionprof_mem_perm.createNewsFeedUnionLevel='Y')";
   return $sql;
  }
  
  function query_data_listOfAvailCommunitiesAndBranchesToWriteNewsFeed($user_Id,$limit_start,$limit_end){
  /* FUNCTION DESCRIPTION : This Function is used to provide list of Available Communities and their Branches
   *						to Write NewsFeed.
   * PAGES UTILIZED :  
   */
   $sql="SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
   $sql.="subs_subdom_info.subdomainName, unionprof_account.union_Id, unionprof_account.unionName, ";
   $sql.="unionprof_branch.branch_Id, unionprof_branch.minlocation, unionprof_branch.location, unionprof_branch.state, ";
   $sql.="unionprof_branch.country, (SELECT IF(unionprof_account.main_branch_Id=unionprof_branch.branch_Id,'YES','NO')) ";
   $sql.="As isMainBranch FROM subs_dom_info, subs_subdom_info, unionprof_account, unionprof_branch, unionprof_mem, ";
   $sql.="unionprof_mem_perm WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id AND ";
   $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id AND ";
   $sql.="unionprof_mem.union_Id=unionprof_account.union_Id AND ";
   $sql.="unionprof_mem.branch_Id=unionprof_branch.branch_Id AND ";
   $sql.="unionprof_mem.user_Id='".$user_Id."' AND unionprof_mem.role_Id=unionprof_mem_perm.role_Id AND ";
   $sql.="(unionprof_mem_perm.createNewsFeedBranchLevel='Y' OR unionprof_mem_perm.createNewsFeedUnionLevel='Y') ";
   $sql.="LIMIT ".$limit_start.",".$limit_end;
   return $sql;
  }
  
  function query_writeNewsFeed($info_Id, $bizUnionId, $unionBranchId, $artTitle, $artShrtDesc, $artDesc,
						$createdOn, $images, $newsFeedType, $displayLevel, $status){
  /* FUNCTION DESCRIPTION : This Function is used to Write NewsFeed for a Professional Community
   * PAGES UTILIZED :  
   */
   $sql="INSERT INTO newsfeed_info(info_Id, bizUnionId, unionBranchId, artTitle, artShrtDesc, artDesc, ";
   $sql.="createdOn, images, newsFeedType, displayLevel, status) ";
   $sql.="VALUES ('".$info_Id."','".$bizUnionId."','".$unionBranchId."','";
   $sql.=$artTitle."','".$artShrtDesc."','".$artDesc."','".date('Y-m-d H:i:s')."','".$images."','";
   $sql.=$newsFeedType."','".$displayLevel."','".$status."');";
   return $sql;
  }
}
?>