<?php
class newsfeed {

  function query_articleNotificationpush() {
    $selectQuery="SELECT * FROM dash_resp_history WHERE NOT EXISTS (SELECT 1 FROM dash_info WHERE dash_resp_history.info_Id = dash_info.info_Id)";
   return $selectQuery;
  }

  function query_union_addNewsFeed($info_Id, $union_Id, $artTitle,$artShrtDesc, $artDesc, $path_Id,
                           $images, $status){
	$sql="INSERT INTO dash_info_union(info_Id, union_Id, artTitle, artShrtDesc, artDesc, ";
	$sql.="createdOn, path_Id, images, status) VALUES ('".$info_Id."','";
	$sql.=$union_Id."','".$artTitle."','".$artShrtDesc."','".$artDesc."','".date("Y-m-d H:i:s")."','".$path_Id."','".$images;
	$sql.=",'".$status."')";
   return $sql;
  }
  
  function query_count_communityAdminNewsFeedList($union_Id){
    $sql="SELECT count(*) FROM dash_info_union WHERE union_Id='".$union_Id."';";
    return $sql;
  }
  
  function query_union_communityAdminNewsFeedList($union_Id,$limit_start,$limit_end){
    $sql="SELECT * FROM dash_info_union WHERE union_Id='".$union_Id."'  ORDER BY createdOn DESC LIMIT ".$limit_start.", ".$limit_end.";";
    return $sql;
  }

 
  function query_count_union_newsfeed($user_Id){
    $sql="SELECT count(*) ";
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
  
  /* dash_info_union :: User_Votes  */
 
  
 
  
  /* dash_info_union :: Favourites */
  
  
  
 
 /* dash_info_user_views :: Views */
 function query_newsFeed_noteUserViewed($view_Id, $info_Id, $user_Id, $newsType){
  $sql="INSERT INTO dash_info_user_views(view_Id, info_Id, user_Id, newsType, viewedAt) ";
  $sql.="VALUES ('".$view_Id."','".$info_Id."','".$user_Id."','".$newsType."','".date('Y-m-d H:i:s')."');";
  return $sql;
 }
 
 /* dash_info_union :: Likes */
  
  

 
  /* */
 
  function query_count_biz_newsfeed($user_Id,$minlocation,$location,$state,$country){
    $sql="SELECT count(*) ";
	$sql.="FROM user_subscription, dash_info_biz, biz_account WHERE ";
	$sql.="biz_account.biz_Id=dash_info_biz.biz_Id AND ";
    $sql.=" (( user_subscription.domain_Id=dash_info_biz.domain_Id AND ";
    $sql.="user_subscription.subdomain_Id=dash_info_biz.subdomain_Id AND user_subscription.user_Id='".$user_Id."' ) AND";
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
	return $sql;
  }

  /* USER FAVOURITE NEWSFEED */
  /* UNION NEWSFEED: */
  function query_count_user_fav_unionNewsFeed($user_Id){
    $sql="SELECT count(*) FROM dash_info_user_fav, dash_info_union ";
	$sql.="WHERE (dash_info_user_fav.newsType='UNION' AND dash_info_user_fav.user_Id='".$user_Id."' ";
	$sql.="AND dash_info_user_fav.info_Id=dash_info_union.info_Id) ";
   return $sql;
  }
  
  function query_user_fav_unionNewsFeed($user_Id,$limit_start,$limit_end){
    $sql="SELECT ";
	$sql.="dash_info_union.info_Id, dash_info_union.union_Id, dash_info_union.artTitle, ";
	$sql.="dash_info_union.artShrtDesc, dash_info_union.artDesc, ";
	$sql.="dash_info_union.createdOn, dash_info_union.path_Id, dash_info_union.images, ";
	$sql.="dash_info_union.votes_up, dash_info_union.votes_down, dash_info_union.status, dash_info_union.viewed ";
	$sql.=" FROM dash_info_user_fav, dash_info_union ";
	$sql.="WHERE (dash_info_user_fav.newsType='UNION' AND dash_info_user_fav.user_Id='".$user_Id."' ";
	$sql.="AND dash_info_user_fav.info_Id=dash_info_union.info_Id) LIMIT ".$limit_start.", ".$limit_end;
   return $sql;
  }
  
 
  /* BUSINESS NEWSFEED: */
  function query_count_user_fav_bizNewsFeed($user_Id){
    $sql="SELECT count(*) FROM dash_info_user_fav, dash_info_biz ";
	$sql.="WHERE (dash_info_user_fav.newsType='BUSINESS' AND dash_info_user_fav.user_Id='".$user_Id."' ";
	$sql.="AND dash_info_user_fav.info_Id=dash_info_biz.info_Id) ";
   return $sql;
  }
  
  function query_user_fav_bizNewsFeed($user_Id,$limit_start,$limit_end){
    $sql="SELECT ";
	$sql.="dash_info_biz.info_Id, dash_info_biz.domain_Id, dash_info_biz.subdomain_Id, dash_info_biz.biz_Id, ";
	$sql.="dash_info_biz.artTitle, dash_info_biz.artShrtDesc, dash_info_biz.artDesc, dash_info_biz.createdOn, ";
	$sql.="dash_info_biz.path_Id, dash_info_biz.images, dash_info_biz.votes_up, dash_info_biz.votes_down, ";
	$sql.="dash_info_biz.status, dash_info_biz.viewed, dash_info_biz.minlocation, dash_info_biz.location, ";
	$sql.="dash_info_biz.state, dash_info_biz.country ";
	$sql.="FROM dash_info_user_fav, dash_info_biz ";
	$sql.="WHERE (dash_info_user_fav.newsType='BUSINESS' AND dash_info_user_fav.user_Id='".$user_Id."' ";
	$sql.="AND dash_info_user_fav.info_Id=dash_info_biz.info_Id) LIMIT ".$limit_start.", ".$limit_end;
   return $sql;
  }
  
  
  
  
  
}

?>