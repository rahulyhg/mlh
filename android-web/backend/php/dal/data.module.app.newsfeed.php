<?php
class app_newsfeed {
 /* UNION NEWSFEED */
  function query_count_union_newsfeed($user_Id){
    $sql="SELECT count(*) As union_count ";
	$sql.="FROM dash_info_union, union_account WHERE ";
	$sql.="dash_info_union.union_Id=union_account.union_Id AND";
	$sql.="(dash_info_union.union_Id IN ";
    $sql.="(SELECT union_sup.union_Id FROM user_account, union_sup ";
    $sql.="WHERE user_account.user_Id = union_sup.user_Id AND user_account.user_Id = '".$user_Id."') OR ";
	$sql.="(dash_info_union.union_Id IN ";
    $sql.="(SELECT union_mem.union_Id FROM user_account, union_mem ";
    $sql.="WHERE user_account.user_Id = union_mem.user_Id AND user_account.user_Id =  '".$user_Id."'))) ";
	return $sql;
  }

  function query_union_newsfeed($user_Id,$limit_start,$limit_end){
    $sql="SELECT ";
	$sql.="union_account.union_Id, union_account.unionName, union_account.domain_Id, union_account.subdomain_Id, union_account.unionURLName, ";
	$sql.="dash_info_union.info_Id, dash_info_union.artTitle,dash_info_union.artShrtDesc, ";
	$sql.="dash_info_union.artDesc, dash_info_union.createdOn, dash_info_union.path_Id, dash_info_union.images, ";
	$sql.=" dash_info_union.status ";
	$sql.="FROM dash_info_union, union_account WHERE ";
	$sql.="dash_info_union.union_Id=union_account.union_Id AND";
	$sql.="(dash_info_union.union_Id IN ";
    $sql.="(SELECT union_sup.union_Id FROM user_account, union_sup ";
    $sql.="WHERE user_account.user_Id = union_sup.user_Id AND user_account.user_Id = '".$user_Id."') OR ";
	$sql.="(dash_info_union.union_Id IN ";
    $sql.="(SELECT union_mem.union_Id FROM user_account, union_mem ";
    $sql.="WHERE user_account.user_Id = union_mem.user_Id AND user_account.user_Id =  '".$user_Id."'))) ";
	$sql.=" LIMIT ".$limit_start.",".$limit_end;
	return $sql;
  }
  
  function query_count_union_opts($user_Id,$info_Id){
   $sql="SELECT ";
   $sql.="COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_fav ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_fav.info_Id ";
   $sql.=" AND dash_info_union.info_Id='".$info_Id."')) AS favourites, ";
   $sql.="COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_votes ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_votes.info_Id AND dash_info_user_votes.info_Id='".$info_Id."' ";
   $sql.="AND vote='UP')) AS votes_up, ";
   $sql.="COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_votes ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_votes.info_Id AND dash_info_user_votes.info_Id='".$info_Id."' ";
   $sql.="AND vote='DOWN')) AS votes_down, ";
   $sql.="COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_likes ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_likes.info_Id ";
   $sql.="AND dash_info_union.info_Id='".$info_Id."')) As likes, ";
   $sql.="COALESCE((SELECT count(DISTINCT user_Id) FROM dash_info_union, dash_info_user_views ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_views.info_Id ";
   $sql.="AND dash_info_user_views.info_Id='".$info_Id."')) AS viewed, ";
   $sql.="CASE ";
   $sql.="WHEN (COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_fav ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_fav.info_Id ";
   $sql.="AND dash_info_user_fav.user_Id='".$user_Id."' AND dash_info_union.info_Id='".$info_Id."'))) = 0 THEN 'N' ELSE 'Y' END As usr_favourite, ";
   $sql.="CASE ";
   $sql.="WHEN (COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_likes ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_likes.info_Id ";
   $sql.="AND dash_info_user_likes.user_Id='".$user_Id."' AND dash_info_union.info_Id='".$info_Id."'))) = 0 THEN 'N' ELSE 'Y' END As usr_liked, ";
   $sql.="CASE ";
   $sql.="WHEN (SELECT count(*) FROM dash_info_union, dash_info_user_votes ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_votes.info_Id AND dash_info_user_votes.info_Id='".$info_Id."' AND ";
   $sql.="dash_info_user_votes.user_Id='".$user_Id."' AND vote='UP') = 0 THEN 'N' ELSE 'Y' END As usr_vote_up, ";
   $sql.="CASE ";
   $sql.="WHEN (SELECT count(*) FROM dash_info_union, dash_info_user_votes ";
   $sql.="WHERE dash_info_union.info_Id=dash_info_user_votes.info_Id AND dash_info_user_votes.info_Id='".$info_Id."' AND ";
   $sql.="dash_info_user_votes.user_Id='".$user_Id."' AND vote='DOWN') = 0 THEN 'N' ELSE 'Y' END As usr_vote_down;";
   return $sql;
  }
  
   /* BUSINESS NEWSFEED */
  function query_biz_newsfeed($user_Id,$minlocation,$location,$state,$country,$limit_start,$limit_end){
    $sql="SELECT biz_account.bizname,";
	$sql.="dash_info_biz.info_Id, "; 
	$sql.="dash_info_biz.biz_Id,   dash_info_biz.artTitle,  dash_info_biz.artShrtDesc,  dash_info_biz.artDesc, ";
	$sql.="dash_info_biz.createdOn, dash_info_biz.path_Id, dash_info_biz.status ";
	$sql.="FROM user_subscription, dash_info_biz, biz_account WHERE ";
	$sql.="biz_account.biz_Id=dash_info_biz.biz_Id AND ";
    $sql.=" (( user_subscription.domain_Id=biz_account.domain_Id AND ";
    $sql.="user_subscription.subdomain_Id=biz_account.subdomain_Id AND user_subscription.user_Id='".$user_Id."' ) AND";
	if(strlen($minlocation)>0){
    $sql.=" (dash_info_biz.minlocation='".$minlocation."') AND";
	}
	if(strlen($location)>0){
	$sql.="(dash_info_biz.location='".$location."') AND";
	}
	if(strlen($state)>0){
	$sql.="(dash_info_biz.state='".$state."') AND";
	}
	if(strlen($country)>0){
	$sql.="(dash_info_biz.country='".$country."') AND";
	}
	$sql=chop($sql,"AND");
	$sql.=") ";
	$sql.=" LIMIT ".$limit_start.",".$limit_end;
	return $sql;
  }
  
  function query_count_biz_opts($user_Id,$info_Id){
   $sql="SELECT ";
   
   $sql.="COALESCE((SELECT count(*) FROM dash_info_biz, dash_info_user_fav ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_fav.info_Id AND ";
   $sql.="dash_info_biz.info_Id='".$info_Id."')) AS favourites, ";

   $sql.="COALESCE((SELECT count(*) FROM dash_info_biz, dash_info_user_votes ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_votes.info_Id AND ";
   $sql.="dash_info_user_votes.info_Id='".$info_Id."' AND vote='UP')) AS votes_up, ";

   $sql.="COALESCE((SELECT count(*) FROM dash_info_biz, dash_info_user_votes ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_votes.info_Id ";
   $sql.="AND dash_info_user_votes.info_Id='".$info_Id."' AND vote='DOWN')) AS votes_down, ";

   $sql.="COALESCE((SELECT count(*) FROM dash_info_biz, dash_info_user_likes ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_likes.info_Id AND ";
   $sql.="dash_info_biz.info_Id='".$info_Id."')) As likes, ";

   $sql.="COALESCE((SELECT count(DISTINCT user_Id) FROM dash_info_biz, dash_info_user_views ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_views.info_Id ";
   $sql.="AND dash_info_user_views.info_Id='".$info_Id."')) AS viewed, ";

   $sql.="CASE WHEN (COALESCE((SELECT count(*) FROM dash_info_biz, dash_info_user_fav ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_fav.info_Id AND ";
   $sql.="dash_info_user_fav.user_Id='".$user_Id."' AND dash_info_biz.info_Id='".$info_Id."'))) = 0 ";
   $sql.="THEN 'N' ELSE 'Y' END As usr_favourite,";

   $sql.="CASE WHEN (COALESCE((SELECT count(*) FROM dash_info_biz, dash_info_user_likes ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_likes.info_Id AND ";
   $sql.="dash_info_user_likes.user_Id='".$user_Id."' AND dash_info_biz.info_Id='".$info_Id."'))) = 0 ";
   $sql.="THEN 'N' ELSE 'Y' END As usr_liked, ";

   $sql.="CASE WHEN (SELECT count(*) FROM dash_info_biz, dash_info_user_votes ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_votes.info_Id AND ";
   $sql.="dash_info_user_votes.info_Id='".$info_Id."' AND ";
   $sql.="dash_info_user_votes.user_Id='".$user_Id."' AND vote='UP') = 0 THEN 'N' ELSE 'Y' END As usr_vote_up, ";

   $sql.="CASE WHEN (SELECT count(*) FROM dash_info_biz, dash_info_user_votes ";
   $sql.="WHERE dash_info_biz.info_Id=dash_info_user_votes.info_Id AND ";
   $sql.="dash_info_user_votes.info_Id='".$info_Id."' AND ";

   $sql.="dash_info_user_votes.user_Id='".$user_Id."' AND vote='DOWN') = 0 THEN 'N' ELSE 'Y' END As usr_vote_down; ";
   
   return $sql;
 }

  /* controller.page.app.newsfeed.news.php: */
  function query_add_user_As_Viewed($view_Id, $info_Id, $user_Id, $newsType){
	$sql="INSERT INTO dash_info_user_views(view_Id, info_Id, user_Id, newsType, viewedAt) ";
	$sql.="VALUES ('".$view_Id."','".$info_Id."','".$user_Id."','".$newsType."','".date("Y-m-d H:i:s")."');";
	return $sql;
  }
  
  function query_view_union_article($info_Id){
    $sql="SELECT dash_info_union.info_Id, dash_info_union.union_Id, dash_info_union.artTitle, ";
	$sql.="dash_info_union.artShrtDesc, dash_info_union.artDesc, dash_info_union.createdOn, dash_info_union.images, ";
	$sql.="dash_info_union.status, ";
	$sql.="union_account.union_Id, union_account.domain_Id, union_account.subdomain_Id, union_account.unionName, ";
	$sql.="union_account.unionURLName, union_account.cover_pic, union_account.profile_pic, ";
	$sql.="union_account.minlocation, union_account.location, union_account.state, union_account.country, ";
	$sql.="union_account.created_On, union_account.admin_Id, union_account.members, union_account.supporters, ";
	$sql.="COALESCE((SELECT count(DISTINCT user_Id) FROM dash_info_union, dash_info_user_views ";
    $sql.="WHERE dash_info_union.info_Id=dash_info_user_views.info_Id ";
    $sql.="AND dash_info_user_views.info_Id='".$info_Id."')) As viewedPeople, ";
	$sql.="COALESCE((SELECT count(*) FROM dash_info_union, dash_info_user_views ";
    $sql.="WHERE dash_info_union.info_Id=dash_info_user_views.info_Id ";
    $sql.="AND dash_info_user_views.info_Id='".$info_Id."')) As viewedImpressions ";
	$sql.="FROM dash_info_union,union_account WHERE info_Id='".$info_Id."' AND dash_info_union.union_Id=union_account.union_Id;";
	return $sql;
  }

  function query_view_biz_article($info_Id){
    $sql="SELECT * FROM dash_info_biz,biz_account WHERE info_Id='".$info_Id."' AND dash_info_biz.biz_Id=biz_account.biz_Id;";
   return $sql;
  }

  function query_count_newsFeed_getListOfPeopleViewedNews($info_Id){
    $sql="SELECT COUNT(*) As ViewPeopleCount FROM ";
    $sql.="(SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, user_account.profile_pic, ";
	$sql.=" COUNT(*) AS viewedImpressions ";
    $sql.="FROM dash_info_user_views, user_account WHERE dash_info_user_views.info_Id='".$info_Id."' ";
    $sql.="AND user_account.user_Id=dash_info_user_views.user_Id GROUP BY dash_info_user_views.user_Id) As tbl";
    return $sql;
  }
  
  function query_newsFeed_getListOfPeopleViewedNews($info_Id,$limit_start,$limit_end){
  /* Function: Describes the People who viewed News and How many Impressions each People Viewed */
    $sql="SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, user_account.profile_pic, ";
	$sql.=" COUNT(*) AS viewedImpressions ";
    $sql.="FROM dash_info_user_views, user_account WHERE dash_info_user_views.info_Id='".$info_Id."' ";
    $sql.="AND user_account.user_Id=dash_info_user_views.user_Id GROUP BY dash_info_user_views.user_Id ";
	$sql.="LIMIT ".$limit_start.",".$limit_end."; ";
	return $sql;
  }
}
?>