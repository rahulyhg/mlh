<?php
class Newsfeed {
   
   /* Create NewsFeed Functions ::: START */
   function query_count_listOfCommunitiesWhereUserMember($user_Id){
    $sql="SELECT count(DISTINCT(unionprof_account.union_Id)) As total_data ";
	$sql.="FROM unionprof_account, unionprof_mem, unionprof_mem_perm1 ";
	$sql.="WHERE unionprof_mem.user_Id = '".$user_Id."' AND ";
	$sql.="unionprof_account.union_Id = unionprof_mem.union_Id AND ";
	$sql.="unionprof_mem.user_Id = unionprof_mem_perm1.member_Id AND ";
	$sql.="unionprof_mem_perm1.createNewsFeedUnionLevel='Y';";
	return $sql;
   }
   function query_data_listOfCommunitiesWhereUserMember($user_Id,$limit_start,$limit_end){
    $sql="SELECT DISTINCT(unionprof_account.union_Id), unionprof_account.unionName, unionprof_account.profile_pic, ";
	$sql.="unionprof_account.domain_Id, (SELECT domainName FROM subs_dom_info WHERE ";
	$sql.="unionprof_account.domain_Id = subs_dom_info.domain_Id) As domainName, ";
	$sql.="unionprof_account.subdomain_Id, (SELECT subdomainName FROM subs_subdom_info WHERE ";
	$sql.="unionprof_account.subdomain_Id = subs_subdom_info.subdomain_Id) As subdomainName, ";
	$sql.="unionprof_mem_perm1.createNewsFeedUnionLevel, unionprof_mem_perm1.approveNewsFeedUnionLevel ";
	$sql.="FROM unionprof_account, unionprof_mem, unionprof_mem_perm1  ";
	$sql.="WHERE unionprof_mem.user_Id = '".$user_Id."' AND ";
	$sql.="unionprof_account.union_Id = unionprof_mem.union_Id AND ";
	$sql.="unionprof_mem.user_Id = unionprof_mem_perm1.member_Id AND ";
	$sql.="unionprof_mem_perm1.createNewsFeedUnionLevel='Y' ";
	$sql.="LIMIT ".$limit_start.",".$limit_end;
	return $sql;
   }
   function query_count_listOfBranchesWhereUserMember($user_Id,$union_Id){
    $sql="SELECT count(DISTINCT(unionprof_mem_roles.branch_Id)) As total_data "; 
    $sql.="FROM unionprof_mem_roles, unionprof_branch, unionprof_mem, unionprof_mem_perm2  ";
    $sql.="WHERE unionprof_branch.union_Id = unionprof_mem_roles.union_Id AND  ";
    $sql.="unionprof_mem_roles.branch_Id = unionprof_branch.branch_Id AND  ";
    $sql.="unionprof_mem.cur_role_Id = unionprof_mem_roles.role_Id  AND ";
	$sql.="unionprof_mem_roles.role_Id = unionprof_mem_perm2.role_Id  ";
    $sql.="AND unionprof_branch.union_Id='".$union_Id."' AND unionprof_mem.user_Id='".$user_Id."' AND ";
	$sql.="unionprof_mem_perm2.createNewsFeedBranchLevel='Y';";
	return $sql;
   }
   function query_data_listOfBranchesWhereUserMember($user_Id,$union_Id,$limit_start,$limit_end){
    $sql="SELECT DISTINCT(unionprof_mem_roles.branch_Id), unionprof_mem_roles.union_Id, unionprof_branch.minlocation, ";
    $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
    $sql.="unionprof_mem_roles.role_Id, unionprof_mem_roles.roleName, unionprof_mem_perm2.createNewsFeedBranchLevel, ";  
	$sql.="unionprof_mem_perm2.approveNewsFeedBranchLevel ";
    $sql.="FROM unionprof_mem_roles, unionprof_branch, unionprof_mem, unionprof_mem_perm2  ";
    $sql.="WHERE unionprof_branch.union_Id = unionprof_mem_roles.union_Id AND  ";
    $sql.="unionprof_mem_roles.branch_Id = unionprof_branch.branch_Id AND  ";
    $sql.="unionprof_mem.cur_role_Id = unionprof_mem_roles.role_Id AND ";
	$sql.="unionprof_mem_roles.role_Id = unionprof_mem_perm2.role_Id  ";
    $sql.="AND unionprof_branch.union_Id='".$union_Id."' AND unionprof_mem.user_Id='".$user_Id."' AND ";
	$sql.="unionprof_mem_perm2.createNewsFeedBranchLevel='Y' ";
	$sql.="LIMIT ".$limit_start.",".$limit_end;
	return $sql;
   }
   function query_data_addNewsFeedInfo($info_Id, $artTitle, $artShrtDesc, $artDesc, $images, $mediaURL01,
	$mediaURL02, $mediaURL03, $status, $writtenBy){
    $sql="INSERT INTO newsfeed_info(info_Id, artTitle, artShrtDesc, artDesc, createdOn, images, mediaURL01, ";
	$sql.="mediaURL02, mediaURL03, status, writtenBy) ";
	$sql.="VALUES ('".$info_Id."','".$artTitle."','".$artShrtDesc."','".$artDesc."','".date('Y-m-d H:i:s');
	$sql.="','".$images."','".$mediaURL01."','".$mediaURL02."','".$mediaURL03."','".$status."','".$writtenBy."');";
	return $sql;
   }
   function query_data_addNewsFeedIShare($ishare_Id, $info_Id, $union_Id, $branch_Id, $view_members, $view_subscribers, 
		$biz_Id, $approvedBy){
    $sql="INSERT INTO newsfeed_share_i(ishare_Id, info_Id, union_Id, branch_Id, view_members, view_subscribers, ";
	$sql.="biz_Id, approvedBy, ts) ";
	$sql.="VALUES ('".$ishare_Id."','".$info_Id."','".$union_Id."','".$branch_Id."','".$view_members."','";
	$sql.=$view_subscribers."','".$biz_Id."','".$approvedBy."','".date('Y-m-d H:i:s')."');";
	return $sql;
   }
   function query_data_addNewsFeedRShare($rshare_Id, $info_Id, $union_Id, $branch_Id, $view_members, $view_subscribers, 
    $biz_Id){
    $sql="INSERT INTO newsfeed_share_r(rshare_Id, info_Id, union_Id, branch_Id, view_members, view_subscribers, biz_Id, ts) ";
	$sql.="VALUES ('".$rshare_Id."','".$info_Id."','".$union_Id."','".$branch_Id."','".$view_members."','";
	$sql.=$view_subscribers."','".$biz_Id."','".date('Y-m-d H:i:s')."');";
	return $sql;
   }
   /* Create NewsFeed Functions ::: END */

   /* MyNewsList Functions ::: START */
   function query_count_getMyPublishedNews($user_Id){
     $sql="SELECT count(*) FROM newsfeed_info WHERE newsfeed_info.writtenBy='".$user_Id."'";
     $sql.=" AND (SELECT count(*) FROM newsfeed_share_i WHERE newsfeed_share_i.info_Id=newsfeed_info.info_Id)>0;";
     return $sql;
   }
   function query_data_getMyPublishedNews($user_Id,$limit_start,$limit_end){
     $sql="SELECT newsfeed_info.info_Id, newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.images,";
     $sql.=" newsfeed_info.status, newsfeed_info.createdOn FROM newsfeed_info WHERE newsfeed_info.writtenBy='".$user_Id."'";
     $sql.=" AND (SELECT count(*) FROM newsfeed_share_i WHERE newsfeed_share_i.info_Id=newsfeed_info.info_Id)>0 ";
	 $sql.="LIMIT ".$limit_start.",".$limit_end.";";
     return $sql;
   }
   function query_count_getMyPendingNews($user_Id){
     $sql="SELECT count(*) FROM newsfeed_info WHERE newsfeed_info.writtenBy='".$user_Id."'";
     $sql.=" AND (SELECT count(*) FROM newsfeed_share_r WHERE newsfeed_share_r.info_Id=newsfeed_info.info_Id)>0;";
     return $sql;
   }
   function query_data_getMyPendingNews($user_Id,$limit_start,$limit_end){
     $sql="SELECT newsfeed_info.info_Id, newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.images,";
     $sql.=" newsfeed_info.status, newsfeed_info.createdOn FROM newsfeed_info WHERE newsfeed_info.writtenBy='".$user_Id."'";
     $sql.=" AND (SELECT count(*) FROM newsfeed_share_r WHERE newsfeed_share_r.info_Id=newsfeed_info.info_Id)>0 ";
	 $sql.="LIMIT ".$limit_start.",".$limit_end.";";
     return $sql;
   }
   /* MyNewsList Functions ::: END */ 
   
   /* NewsData ::: START */
   function query_data_getNewsData($info_Id){
    $sql="SELECT newsfeed_info.info_Id, newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.artDesc, ";
	$sql.="newsfeed_info.createdOn, newsfeed_info.images, newsfeed_info.mediaURL01, newsfeed_info.mediaURL02, ";
	$sql.="newsfeed_info.mediaURL03, newsfeed_info.status, newsfeed_info.writtenBy FROM newsfeed_info ";
	$sql.="WHERE newsfeed_info.info_Id='".$info_Id."';";
	return $sql;
   }
   function query_data_getPostedData($info_Id){
    $sql="(SELECT union_Id, branch_Id, view_members, view_subscribers, ";
	$sql.="(SELECT 'PUBLISHED' As type) FROM newsfeed_share_i) ";
	$sql.="UNION ";
	$sql.="(SELECT union_Id, branch_Id, view_members, view_subscribers, ";
	$sql.="(SELECT 'APPROVAL_PENDING' As type) FROM newsfeed_share_r) ";
	return $sql;
   }
   /* NewsData ::: END */
   
   
   /* Latest NewsFeed Display Functions: */
   function query_count_displayLatestNews($user_Id){
    
   }
   function query_data_displayLatestNews($user_Id,$limit_start,$limit_end){
   // SELECT * FROM newsfeed_info
   }
}
?>