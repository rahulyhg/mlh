<?php
class app_Search {
/* People */
function query_count_getSearchedUserList($user_Id,$searchQuery){
 $sql="SELECT ";
 $sql.="count(DISTINCT user_account.user_Id) As totalData ";
 $sql.=" FROM user_account WHERE user_account.acc_active='Y' AND ";
 $sql.="( username LIKE '%".$searchQuery."%' OR surName LIKE '%".$searchQuery."%' OR 	";
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
 $sql.="( username LIKE '%".$searchQuery."%' OR surName LIKE '%".$searchQuery."%' OR 	";
 $sql.="name LIKE '%".$searchQuery."%' OR  minlocation LIKE '%".$searchQuery."%' OR location LIKE '%".$searchQuery."%' ";
 $sql.="OR state LIKE '%".$searchQuery."%' OR country LIKE '%".$searchQuery."%' ) ";
 $sql.="LIMIT ".$limit_start.", ".$limit_end.";";
 return $sql;
}

/* Community */
function query_count_getSearchedCommunityList($searchQuery){
 $sql="SELECT count(*) FROM union_account WHERE unionName LIKE '%".$searchQuery."%' OR ";
 $sql.="minlocation LIKE '%".$searchQuery."%' ";
 $sql.=" OR location  LIKE '%".$searchQuery."%' OR state  LIKE '%".$searchQuery."%' OR ";
 $sql.="country LIKE '%".$searchQuery."%';";
 return $sql;
}

function query_getSearchedCommunityList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT * FROM union_account WHERE unionName LIKE '%".$searchQuery."%' ";
 $sql.="OR minlocation LIKE '%".$searchQuery."%' ";
 $sql.=" OR location  LIKE '%".$searchQuery."%' OR state  LIKE '%".$searchQuery."%' OR ";
 $sql.="country LIKE '%".$searchQuery."%' LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/* NewsFeed */
function query_count_getSearchedNewsFeedList($searchQuery){
 $sql="SELECT count(*) FROM dash_info_union, union_account WHERE (dash_info_union.artTitle LIKE '%".$searchQuery."%' OR ";
 $sql.=" dash_info_union.artShrtDesc LIKE  '%".$searchQuery."%' OR dash_info_union.artDesc LIKE '%".$searchQuery."%') ";
 $sql.=" AND dash_info_union.union_Id=union_account.union_Id; ";
 return $sql;
}

function query_getSearchedNewsFeedList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT dash_info_union.union_Id, union_account.domain_Id, union_account.subdomain_Id, union_account.unionName, ";
 $sql.="dash_info_union.info_Id, dash_info_union.artTitle, dash_info_union.artShrtDesc, dash_info_union.artDesc, ";
 $sql.="dash_info_union.createdOn, dash_info_union.images, dash_info_union.status ";
 $sql.="FROM dash_info_union, union_account WHERE (dash_info_union.artTitle LIKE '%".$searchQuery."%' OR ";
 $sql.=" dash_info_union.artShrtDesc LIKE  '%".$searchQuery."%' OR dash_info_union.artDesc LIKE '%".$searchQuery."%') ";
 $sql.=" AND dash_info_union.union_Id=union_account.union_Id ";
 $sql.="LIMIT ".$limit_start.",".$limit_end.";";
 return $sql;
}

/*
function query_getSearchedNewsFeedList_statistics($info_Id,$user_Id){
  $sql="SELECT ";
  $sql.="(SELECT count(*) FROM dash_info_user_votes WHERE info_Id='".$info_Id."' AND vote='UP') As voteUp, ";
  $sql.="(SELECT count(*) FROM dash_info_user_votes WHERE info_Id='".$info_Id."' AND user_Id='".$user_Id."' AND vote='UP') As userVoteUp, ";
  $sql.="(SELECT count(*) FROM dash_info_user_votes WHERE info_Id='".$info_Id."' AND vote='DOWN') As voteDown, ";
  $sql.="(SELECT count(*) FROM dash_info_user_votes WHERE info_Id='".$info_Id."' AND user_Id='".$user_Id."' AND vote='DOWN') As userVoteDown, ";
  $sql.="(SELECT count(*) FROM `dash_info_user_views` WHERE info_Id='".$info_Id."') As views, ";
  $sql.="(SELECT count(*) FROM `dash_info_user_likes` WHERE info_Id='".$info_Id."') As likes, ";
  $sql.="(SELECT count(*) FROM `dash_info_user_likes` WHERE info_Id='".$info_Id."' AND user_Id='".$user_Id."') As userLikes, ";
  $sql.="(SELECT count(*) FROM `dash_info_user_fav` WHERE info_Id='".$info_Id."') As favourites, ";
  $sql.="(SELECT count(*) FROM `dash_info_user_fav` WHERE info_Id='".$info_Id."' AND user_Id='".$user_Id."') As userFavourites; ";
  return $sql;
}
*/
/* Movement */
function query_count_getSearchedMovementList($searchQuery){
 $sql="SELECT count(DISTINCT move_info.move_Id) As totalData ";
 $sql.="FROM move_info, union_account WHERE union_account.union_Id=move_info.union_Id AND ";
 $sql.="(petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR toA_dd1 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' OR toA_pName3 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' OR issue_facedby LIKE '%".$searchQuery."%' ";
 $sql.="OR expectedSolution LIKE '%".$searchQuery."%');";
 return $sql;
}

function query_getSearchedMovementList($searchQuery,$limit_start,$limit_end){
 $sql="SELECT DISTINCT move_info.move_Id, move_info.createdOn, move_info.petitionTitle, ";
 $sql.="move_info.issue_facedby, move_info.move_img, ";
 $sql.="union_account.union_Id, union_account.domain_Id, union_account.subdomain_Id, union_account.unionName ";
 $sql.="FROM move_info, union_account WHERE union_account.union_Id=move_info.union_Id AND ";
 $sql.="(petitionTitle LIKE '%".$searchQuery."%' OR toA_pName1 LIKE '%".$searchQuery."%' OR toA_dd1 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_pName2 LIKE '%".$searchQuery."%' OR toA_dd2 LIKE '%".$searchQuery."%' OR toA_pName3 LIKE '%".$searchQuery."%' ";
 $sql.="OR toA_dd3 LIKE '%".$searchQuery."%' OR issue_desc LIKE '%".$searchQuery."%' OR issue_facedby LIKE '%".$searchQuery."%' ";
 $sql.="OR expectedSolution LIKE '%".$searchQuery."%') ";
 $sql.="LIMIT ".$limit_start.",".$limit_end.";";       	   
 return $sql;
}

}
?>