<?php
class AppSearch {
/* People */
function query_count_getSearchedUserList($user_Id,$searchQuery){
 $sql="SELECT ";
 $sql.="count(DISTINCT user_account.user_Id) As totalData ";
 $sql.=" FROM user_account WHERE user_account.acc_active='Y' AND ";
 $sql.="( surName LIKE '%".$searchQuery."%' OR 	";
 $sql.="name LIKE '%".$searchQuery."%' OR  minlocation LIKE '%".$searchQuery."%' OR location LIKE '%".$searchQuery."%' ";
 $sql.="OR state LIKE '%".$searchQuery."%' OR country LIKE '%".$searchQuery."%' ); ";
 return $sql;
}

function query_getSearchedUserList($user_Id,$searchQuery,$limit_start,$limit_end){
 $sql="SELECT ";
 $sql.="DISTINCT user_account.user_Id, ";
 $sql.="user_account.username, user_account.surName, user_account.name, user_account.profile_pic, ";
 $sql.="user_account.minlocation, user_account.location, user_account.state, user_account.country, ";
 $sql.="IF(user_Id in (SELECT frnd1 FROM `user_frnds` WHERE frnd2='".$user_Id."' UNION ";
 $sql.="SELECT frnd2 FROM user_frnds WHERE frnd1='".$user_Id."'),'YES','NO') As isFriend, ";
 $sql.="IF(user_Id in (SELECT from_userId FROM user_frnds_req WHERE to_userId='".$user_Id."'),'YES','NO') As youRecFrndRequest, ";
 $sql.="IF(user_Id in (SELECT to_userId FROM user_frnds_req WHERE from_userId='".$user_Id."'),'YES','NO') As youSentfrndRequest ";
 $sql.=" FROM user_account WHERE user_account.acc_active='Y' AND ";
 $sql.="( surName LIKE '%".$searchQuery."%' OR 	";
 $sql.="name LIKE '%".$searchQuery."%' OR  minlocation LIKE '%".$searchQuery."%' OR location LIKE '%".$searchQuery."%' ";
 $sql.="OR state LIKE '%".$searchQuery."%' OR country LIKE '%".$searchQuery."%' ) ";
 $sql.="LIMIT ".$limit_start.", ".$limit_end.";";
 return $sql;
}

/* Community */
function query_count_getSearchedCommunityList($searchQuery){
 $sql="SELECT count(*) FROM unionprof_account, unionprof_branch ";
 $sql.="WHERE ";
 $sql.="unionprof_account.main_branch_Id = unionprof_branch.branch_Id AND ";
 $sql.="unionprof_account.union_Id = unionprof_account.union_Id AND (unionprof_account.unionName LIKE '%".$searchQuery."%' ";
 $sql.="OR unionprof_branch.minlocation LIKE '%".$searchQuery."%' ";
 $sql.="OR unionprof_branch.location  LIKE '%".$searchQuery."%' OR unionprof_branch.state  LIKE '%".$searchQuery."%' OR ";
 $sql.="unionprof_branch.country LIKE '%".$searchQuery."%');";
 return $sql;
}

function query_getSearchedCommunityList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT * FROM unionprof_account, unionprof_branch ";
 $sql.="WHERE ";
 $sql.="unionprof_account.main_branch_Id = unionprof_branch.branch_Id AND ";
 $sql.="unionprof_account.union_Id = unionprof_account.union_Id AND (unionprof_account.unionName LIKE '%".$searchQuery."%' ";
 $sql.="OR unionprof_branch.minlocation LIKE '%".$searchQuery."%' ";
 $sql.="OR unionprof_branch.location  LIKE '%".$searchQuery."%' OR unionprof_branch.state  LIKE '%".$searchQuery."%' OR ";
 $sql.="unionprof_branch.country LIKE '%".$searchQuery."%') ";
 $sql.=" LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/* NewsFeed */
function query_count_getSearchedNewsFeedList($user_Id,$searchQuery){
 $sql="SELECT count(*) FROM (";
 $sql.="(SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, newsfeed_info.info_Id, newsfeed_info.bizUnionId, unionprof_account.unionName, ";
 $sql.="unionprof_account.profile_pic, newsfeed_info.unionBranchId, unionprof_branch.minlocation, ";
 $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
 $sql.="newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.artDesc, newsfeed_info.createdOn, ";
 $sql.="newsfeed_info.images, newsfeed_info.newsFeedType, newsfeed_info.displayLevel, newsfeed_info.status ";
 $sql.="FROM newsfeed_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info  ";
 $sql.="WHERE unionprof_account.domain_Id=subs_dom_info.domain_Id AND ";
 $sql.="unionprof_account.subdomain_Id=subs_subdom_info.subdomain_Id AND ";
 $sql.="newsfeed_info.bizUnionId = unionprof_account.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = newsfeed_info.unionBranchId ";
 $sql.="AND newsfeed_info.newsFeedType='UNION' AND ";
 $sql.="(newsfeed_info.displayLevel='UNION_LEVEL' OR newsfeed_info.displayLevel='SUBDOMAIN_LEVEL' OR ";
 $sql.="newsfeed_info.displayLevel='DOMAIN_LEVEL') AND newsfeed_info.status='ACTIVE' AND ";
 $sql.="(newsfeed_info.artTitle LIKE '%".$searchQuery."%' OR newsfeed_info.artShrtDesc LIKE '%".$searchQuery."%' OR ";
 $sql.="newsfeed_info.artDesc LIKE '%".$searchQuery."%')) ";
 $sql.="UNION ";
 $sql.="( SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, newsfeed_info.info_Id, newsfeed_info.bizUnionId, unionprof_account.unionName, ";
 $sql.="unionprof_account.profile_pic, newsfeed_info.unionBranchId, unionprof_branch.minlocation, ";
 $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
 $sql.="newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.artDesc, newsfeed_info.createdOn, ";
 $sql.="newsfeed_info.images, newsfeed_info.newsFeedType, newsfeed_info.displayLevel, newsfeed_info.status  ";
 $sql.="FROM newsfeed_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info  ";
 $sql.="WHERE unionprof_account.domain_Id=subs_dom_info.domain_Id AND ";
 $sql.="unionprof_account.subdomain_Id=subs_subdom_info.subdomain_Id AND ";
 $sql.="newsfeed_info.bizUnionId = unionprof_account.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = newsfeed_info.unionBranchId AND newsfeed_info.newsFeedType='UNION' AND ";
 $sql.="newsfeed_info.displayLevel='BRANCH_LEVEL' AND newsfeed_info.status='ACTIVE' AND ";
 $sql.="(newsfeed_info.artTitle LIKE '%".$searchQuery."%' OR newsfeed_info.artShrtDesc LIKE '%".$searchQuery."%' OR ";
 $sql.="newsfeed_info.artDesc LIKE '%".$searchQuery."%') AND ";
 $sql.="newsfeed_info.unionBranchId IN (SELECT branch_Id FROM unionprof_mem WHERE user_Id='".$user_Id."')";
 $sql.=")) As Tbl";
 return $sql;
}

function query_getSearchedNewsFeedList($user_Id,$searchQuery,$limit_start,$limit_end){
 $sql="(SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, newsfeed_info.info_Id, newsfeed_info.bizUnionId, unionprof_account.unionName, ";
 $sql.="unionprof_account.profile_pic, newsfeed_info.unionBranchId, unionprof_branch.minlocation, ";
 $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
 $sql.="newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.artDesc, newsfeed_info.createdOn, ";
 $sql.="newsfeed_info.images, newsfeed_info.newsFeedType, newsfeed_info.displayLevel, newsfeed_info.status ";
 $sql.="FROM newsfeed_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info  ";
 $sql.="WHERE unionprof_account.domain_Id=subs_dom_info.domain_Id AND ";
 $sql.="unionprof_account.subdomain_Id=subs_subdom_info.subdomain_Id AND ";
 $sql.="newsfeed_info.bizUnionId = unionprof_account.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = newsfeed_info.unionBranchId ";
 $sql.="AND newsfeed_info.newsFeedType='UNION' AND ";
 $sql.="(newsfeed_info.displayLevel='UNION_LEVEL' OR newsfeed_info.displayLevel='SUBDOMAIN_LEVEL' OR ";
 $sql.="newsfeed_info.displayLevel='DOMAIN_LEVEL') AND newsfeed_info.status='ACTIVE' AND ";
 $sql.="(newsfeed_info.artTitle LIKE '%".$searchQuery."%' OR newsfeed_info.artShrtDesc LIKE '%".$searchQuery."%' OR ";
 $sql.="newsfeed_info.artDesc LIKE '%".$searchQuery."%')) ";
 $sql.="UNION ";
 $sql.="( SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, newsfeed_info.info_Id, newsfeed_info.bizUnionId, unionprof_account.unionName, ";
 $sql.="unionprof_account.profile_pic, newsfeed_info.unionBranchId, unionprof_branch.minlocation, ";
 $sql.="unionprof_branch.location, unionprof_branch.state, unionprof_branch.country, ";
 $sql.="newsfeed_info.artTitle, newsfeed_info.artShrtDesc, newsfeed_info.artDesc, newsfeed_info.createdOn, ";
 $sql.="newsfeed_info.images, newsfeed_info.newsFeedType, newsfeed_info.displayLevel, newsfeed_info.status  ";
 $sql.="FROM newsfeed_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info  ";
 $sql.="WHERE unionprof_account.domain_Id=subs_dom_info.domain_Id AND ";
 $sql.="unionprof_account.subdomain_Id=subs_subdom_info.subdomain_Id AND ";
 $sql.="newsfeed_info.bizUnionId = unionprof_account.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = newsfeed_info.unionBranchId AND newsfeed_info.newsFeedType='UNION' AND ";
 $sql.="newsfeed_info.displayLevel='BRANCH_LEVEL' AND newsfeed_info.status='ACTIVE' AND ";
 $sql.="(newsfeed_info.artTitle LIKE '%".$searchQuery."%' OR newsfeed_info.artShrtDesc LIKE '%".$searchQuery."%' OR ";
 $sql.="newsfeed_info.artDesc LIKE '%".$searchQuery."%') AND ";
 $sql.="newsfeed_info.unionBranchId IN (SELECT branch_Id FROM unionprof_mem WHERE user_Id='".$user_Id."'))";
 $sql.="LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/* Movement */
function query_count_getSearchedMovementList($user_Id,$searchQuery){
 $sql="SELECT count(*) FROM (";
 $sql.="(SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, ";
 $sql.="unionprof_account.union_Id, unionprof_account.unionName, unionprof_branch.minlocation, unionprof_branch.location, ";
 $sql.="unionprof_branch.state, unionprof_branch.country, move_info.petitionTitle, move_info.issue_desc, move_info.move_img, "; 
 $sql.="move_info.move_status, move_info.openOn, move_info.displayLevel, move_info.createdOn ";
 $sql.="FROM move_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info ";
 $sql.="WHERE ";
 $sql.="subs_dom_info.domain_Id=unionprof_account.domain_Id AND ";
 $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id AND ";
 $sql.="unionprof_account.union_Id = move_info.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = move_info.branch_Id AND ";
 $sql.="(move_info.displayLevel='UNION_LEVEL' OR ";
 $sql.="move_info.displayLevel='SUBDOMAIN_LEVEL' OR move_info.displayLevel='DOMAIN_LEVEL') AND ";
 $sql.="(move_info.move_status='OPEN') AND ";
 $sql.="(petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR toA_dd1 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' OR toA_pName3 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' OR issue_facedby LIKE '%".$searchQuery."%' ";
 $sql.="OR expectedSolution LIKE '%".$searchQuery."%')) ";
 $sql.=" UNION  ";
 $sql.="(SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, ";
 $sql.="unionprof_account.union_Id, unionprof_account.unionName, unionprof_branch.minlocation, unionprof_branch.location, "; 
 $sql.="unionprof_branch.state, unionprof_branch.country, move_info.petitionTitle, move_info.issue_desc, move_info.move_img, ";
 $sql.="move_info.move_status, move_info.openOn, move_info.displayLevel, move_info.createdOn ";
 $sql.="FROM move_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info ";
 $sql.="WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id AND ";
 $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id AND ";
 $sql.="unionprof_account.union_Id = move_info.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = move_info.branch_Id AND move_info.displayLevel='BRANCH_LEVEL' AND ";
 $sql.=" move_info.branch_Id IN (SELECT branch_Id FROM unionprof_mem WHERE user_Id='".$user_Id."') AND ";
 $sql.="(move_info.move_status='OPEN') AND ";
 $sql.="(petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR toA_dd1 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' OR toA_pName3 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' OR issue_facedby LIKE '%".$searchQuery."%' ";
 $sql.="OR expectedSolution LIKE '%".$searchQuery."%'))) As Tbl ";
 return $sql;
}

function query_getSearchedMovementList($user_Id,$searchQuery,$limit_start,$limit_end){
 $sql="(SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, ";
 $sql.="unionprof_account.union_Id, unionprof_account.unionName, unionprof_branch.minlocation, unionprof_branch.location, ";
 $sql.="unionprof_branch.state, unionprof_branch.country, move_info.petitionTitle, move_info.issue_desc, move_info.move_img, "; 
 $sql.="move_info.move_status, move_info.openOn, move_info.displayLevel, move_info.createdOn ";
 $sql.="FROM move_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info ";
 $sql.="WHERE ";
 $sql.="subs_dom_info.domain_Id=unionprof_account.domain_Id AND ";
 $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id AND ";
 $sql.="unionprof_account.union_Id = move_info.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = move_info.branch_Id AND ";
 $sql.="(move_info.displayLevel='UNION_LEVEL' OR ";
 $sql.="move_info.displayLevel='SUBDOMAIN_LEVEL' OR move_info.displayLevel='DOMAIN_LEVEL') AND ";
 $sql.="(move_info.move_status='OPEN') AND ";
 $sql.="(petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR toA_dd1 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' OR toA_pName3 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' OR issue_facedby LIKE '%".$searchQuery."%' ";
 $sql.="OR expectedSolution LIKE '%".$searchQuery."%')) ";
 $sql.=" UNION  ";
 $sql.="(SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, subs_subdom_info.subdomain_Id, ";
 $sql.="subs_subdom_info.subdomainName, ";
 $sql.="unionprof_account.union_Id, unionprof_account.unionName, unionprof_branch.minlocation, unionprof_branch.location, "; 
 $sql.="unionprof_branch.state, unionprof_branch.country, move_info.petitionTitle, move_info.issue_desc, move_info.move_img, ";
 $sql.="move_info.move_status, move_info.openOn, move_info.displayLevel, move_info.createdOn ";
 $sql.="FROM move_info, unionprof_account, unionprof_branch, subs_dom_info, subs_subdom_info ";
 $sql.="WHERE subs_dom_info.domain_Id=unionprof_account.domain_Id AND ";
 $sql.="subs_subdom_info.subdomain_Id=unionprof_account.subdomain_Id AND ";
 $sql.="unionprof_account.union_Id = move_info.union_Id AND ";
 $sql.="unionprof_branch.branch_Id = move_info.branch_Id AND move_info.displayLevel='BRANCH_LEVEL' AND ";
 $sql.=" move_info.branch_Id IN (SELECT branch_Id FROM unionprof_mem WHERE user_Id='') AND ";
 $sql.="(move_info.move_status='OPEN') AND ";
 $sql.="(petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR toA_dd1 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' OR toA_pName3 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' OR issue_facedby LIKE '%".$searchQuery."%' ";
 $sql.="OR expectedSolution LIKE '%".$searchQuery."%')) ";
 $sql.="LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

}
?>