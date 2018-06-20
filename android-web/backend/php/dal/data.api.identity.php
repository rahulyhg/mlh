<?php

class tbl_identity {
/* APP RELATED TABLES */

  /* Table - app_and_info ::: info_Id */
  function query_checkId_app_and_info($info_Id) {
	$selectQuery="SELECT * FROM app_and_info WHERE info_Id='".$info_Id."';";
	return $selectQuery;
  }
  
  /* Table - app_ftp_path ::: path_Id */
  function query_checkId_app_ftp_path($path_Id) {
	$selectQuery="SELECT * FROM app_ftp_path WHERE path_Id='".$path_Id."';";
	return $selectQuery;
  }
  
  /* Table - area_history ::: area_Id */
  function query_checkId_area_history($area_Id) {
	$selectQuery="SELECT * FROM area_history WHERE area_Id='".$area_Id."';";
	return $selectQuery;
  }
  
  /* Table - area_stat ::: area_Id */
  function query_checkId_area_stat($area_Id) {
	$selectQuery="SELECT * FROM area_stat WHERE area_Id='".$area_Id."';";
	return $selectQuery;
  }
  
/* BUSINESS RELATED TABLES */

  /* Table - biz_account ::: biz_Id */
  function query_checkId_biz_account($biz_Id) {
	$selectQuery="SELECT * FROM biz_account WHERE biz_Id='".$biz_Id."';";
	return $selectQuery;
  }
  
  /* Table - biz_pay_history ::: pay_Id */
  function query_checkId_biz_pay_history($pay_Id) {
	$selectQuery="SELECT * FROM biz_pay_history WHERE pay_Id='".$pay_Id."';";
	return $selectQuery;
  }
   
  /* Table - biz_subscribe ::: subscribe_Id */
  function query_checkId_biz_subscribe($subscribe_Id){
   $selectQuery="SELECT * FROM biz_subscribe WHERE subscribe_Id='".$subscribe_Id."';";
   return $selectQuery;
  }
/* CRONJOB RELATED TABLES */
  /* Table - cron_notify_user  ::: cnotify_Id */
  function query_checkId_cron_notify_user($cnotify_Id){
    $selectQuery="SELECT * FROM cron_notify_user WHERE cnotify_Id='".$cnotify_Id."'";
	return $selectQuery;
  }
  
  /* Table - dash_info_biz ::: info_Id */
  function query_checkId_dash_biz_info($info_Id) {
	$selectQuery="SELECT * FROM dash_info_biz WHERE info_Id='".$info_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_info_union ::: info_Id */
  function query_checkId_dash_union_info($info_Id) {
	$selectQuery="SELECT * FROM dash_info_union WHERE info_Id='".$info_Id."';";
	return $selectQuery;
  }
    
  /* Table - dash_info_user_fav ::: */
  function query_checkId_dash_info_user_fav($fav_Id){
    $selectQuery="SELECT * FROM dash_info_user_fav WHERE fav_Id='".$fav_Id."';";
	return $selectQuery;
  }
   
  /* Table - dash_info_user_likes ::: */
  function query_checkId_dash_info_user_likes($like_Id){
    $selectQuery="SELECT * FROM dash_info_user_likes WHERE like_Id='".$like_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_info_user_views ::: */
  function query_checkId_dash_info_user_views($view_Id){
    $selectQuery="SELECT * FROM dash_info_user_views WHERE view_Id='".$view_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_info_user_votes ::: */
  function query_checkId_dash_info_user_votes($vote_Id){
    $selectQuery="SELECT * FROM dash_info_user_votes WHERE vote_Id='".$vote_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_move ::: dmove_Id */
  function query_checkId_dash_move($dmove_Id){
	$selectQuery="SELECT * FROM dash_move WHERE dmove_Id='".$dmove_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_resp_history ::: resph_Id */
  function query_checkId_dash_resp_history($resphistory_Id) {
	$selectQuery="SELECT * FROM dash_resp_history WHERE resph_Id='".$resphistory_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_view ::: view_Id */
  function query_checkId_dash_view($view_Id) {
	$selectQuery="SELECT * FROM dash_view WHERE view_Id='".$view_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_view_stat ::: viewstat_Id */
  function query_checkId_dash_view_stat($viewstat_Id) {
	$selectQuery="SELECT * FROM dash_view_stat WHERE viewstat_Id='".$viewstat_Id."';";
	return $selectQuery;
  }
   
  /* Table - dash_vote ::: vote_Id */
  function query_checkId_dash_vote($vote_Id) {
	$selectQuery="SELECT * FROM dash_vote WHERE vote_Id='".$vote_Id."';";
	return $selectQuery;
  }
  
  /* Table - dash_vote_stat ::: votestat_Id */
  function query_checkId_dash_vote_stat($votestat_Id) {
	$selectQuery="SELECT * FROM dash_vote_stat WHERE votestat_Id='".$votestat_Id."';";
	return $selectQuery;
  }
  
  /* Table - dom_info ::: domain_Id */
  function query_checkId_dom_info($domain_Id) {
	$selectQuery="SELECT * FROM dom_info WHERE domain_Id='".$domain_Id."';";
	return $selectQuery;
  }
  
  /* Table - dom_role_info ::: domain_Id */
  function query_checkId_dom_role_info($role_Id) {
	$selectQuery="SELECT * FROM dom_role_info WHERE role_Id='".$role_Id."';";
	return $selectQuery;
  }
  
  /* Table - dom_role_history ::: rhistory_Id */
  function query_checkId_dom_role_history($rhistory_Id) {
	$selectQuery="SELECT * FROM dom_role_history WHERE rhistory_Id='".$rhistory_Id."';";
	return $selectQuery;
  }
  
  /* Table - dom_role_stat ::: rstat_Id */
  function query_checkId_dom_role_stat($rstat_Id) {
	$selectQuery="SELECT * FROM dom_role_stat WHERE rstat_Id='".$rstat_Id."';";
	return $selectQuery;
  }
  
  /* Table - dom_stat ::: dstat_Id */
  function query_checkId_dom_stat($dstat_Id) {
	$selectQuery="SELECT * FROM dom_stat WHERE dstat_Id='".$dstat_Id."';";
	return $selectQuery;
  }
  
  /* Table - move_info ::: move_Id */
  function query_checkId_move_info($move_Id) {
	$selectQuery="SELECT * FROM move_info WHERE move_Id='".$move_Id."';";
	return $selectQuery;
  }
  
  /* Table - move_sign ::: sign_Id */
  function query_checkId_move_sign($sign_Id) {
	$selectQuery="SELECT * FROM move_sign WHERE sign_Id='".$sign_Id."';";
	return $selectQuery;
  }
  
  /* Table - newsfeed_info ::: info_Id */
  function query_checkId_newsfeed_info($info_Id) {
	$selectQuery="SELECT * FROM newsfeed_info WHERE info_Id='".$info_Id."';";
	return $selectQuery;
  }
  
  /* Table - newsfeed_move ::: nf_move_Id */
  function query_checkId_newsfeed_move($nf_move_Id) {
	$selectQuery="SELECT * FROM newsfeed_move WHERE nf_move_Id='".$nf_move_Id."';";
	return $selectQuery;
  }
  
  /* Table - newsfeed_user_fav ::: nf_fav_Id */
  function query_checkId_newsfeed_user_fav($nf_fav_Id) {
	$selectQuery="SELECT * FROM newsfeed_user_fav WHERE nf_fav_Id='".$nf_fav_Id."';";
	return $selectQuery;
  }
  
  /* Table - newsfeed_user_likes ::: nf_like_Id */
  function query_checkId_newsfeed_user_likes($nf_like_Id) {
	$selectQuery="SELECT * FROM newsfeed_user_likes WHERE nf_like_Id='".$nf_like_Id."';";
	return $selectQuery;
  }
  
  /* Table - newsfeed_user_views ::: view_Id */
  function query_checkId_newsfeed_user_views($view_Id) {
	$selectQuery="SELECT * FROM newsfeed_user_views WHERE view_Id='".$view_Id."';";
	return $selectQuery;
  }
  
  /* Table - newsfeed_user_votes ::: vote_Id */
  function query_checkId_newsfeed_user_votes($vote_Id) {
	$selectQuery="SELECT * FROM newsfeed_user_votes WHERE vote_Id='".$vote_Id."';";
	return $selectQuery;
  }
  
  /* Table - srvy_info ::: srvy_Id */
  function query_checkId_srvy_info($srvy_Id) {
	$selectQuery="SELECT * FROM srvy_info WHERE srvy_Id='".$srvy_Id."';";
	return $selectQuery;
  }
  
  /* Table - srvy_info_stat ::: sstat_Id */
  function query_checkId_srvy_info_stat($sstat_Id) {
	$selectQuery="SELECT * FROM srvy_info_stat WHERE sstat_Id='".$sstat_Id."';";
	return $selectQuery;
  }
  
  /* Table - srvy_pay_history ::: srvy_pay_Id */
  function query_checkId_srvy_pay_history($srvy_pay_Id) {
	$selectQuery="SELECT * FROM srvy_pay_history WHERE srvy_pay_Id='".$srvy_pay_Id."';";
	return $selectQuery;
  }
  
  /* Table - srvy_q_optusers ::: optInfo_Id */
  function query_checkId_srvy_q_optusers($optInfo_Id) {
	$selectQuery="SELECT * FROM srvy_q_optusers WHERE optInfo_Id='".$optInfo_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_account ::: union_Id */
  function query_checkId_unionprof_account($union_Id) {
	$selectQuery="SELECT * FROM unionprof_account WHERE union_Id='".$union_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_branch ::: branch_Id */
  function query_checkId_unionprof_branch($branch_Id){
	$selectQuery="SELECT * FROM unionprof_branch WHERE branch_Id='".$branch_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_calndar ::: calendar_Id */
  function query_checkId_unionprof_calndar($calendar_Id){
    $selectQuery="SELECT * FROM unionprof_calndar WHERE calendar_Id='".$calendar_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_mem ::: member_Id */
  function query_checkId_unionprof_mem($member_Id) {
	$selectQuery="SELECT * FROM unionprof_mem WHERE member_Id='".$member_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_mem_chat ::: chat_Id */
  function query_checkId_unionprof_mem_chat($chat_Id) {
	$selectQuery="SELECT * FROM unionprof_mem_chat WHERE chat_Id='".$chat_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_mem_perm ::: permission_Id */
  function query_checkId_unionprof_mem_perm($permission_Id) {
	$selectQuery="SELECT * FROM unionprof_mem_perm WHERE permission_Id='".$permission_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_mem_perm_union ::: union_permission_Id */
  function query_checkId_unionprof_mem_perm_union($union_permission_Id) {
	$selectQuery="SELECT * FROM unionprof_mem_perm_union WHERE union_permission_Id='".$union_permission_Id."';";
	return $selectQuery;
  }
  
  /* Table - unionprof_mem_req :::  request_Id */
  function query_checkId_unionprof_mem_req($request_Id) {
	$selectQuery="SELECT * FROM unionprof_mem_req WHERE request_Id='".$request_Id."';";
	return $selectQuery;
  } 
  
  /* Table - unionprof_mem_roles ::: role_Id */
  function query_checkId_unionprof_mem_roles($role_Id) {
	$selectQuery="SELECT * FROM unionprof_mem_roles WHERE role_Id='".$role_Id."';";
	return $selectQuery;
  } 
  
  /* Table - unionprof_sup ::: support_Id */
  function query_checkId_unionprof_sup($support_Id) {
	$selectQuery="SELECT * FROM unionprof_sup WHERE support_Id='".$support_Id."';";
	return $selectQuery;
  }
  
  /* Table - user_account ::: user_Id */
  function query_checkId_user_account($user_Id) {
	$selectQuery="SELECT * FROM user_account WHERE user_Id='".$user_Id."';";
	return $selectQuery;
  }
  
  
  /* Table - user_frnds ::: rel_Id */
  function query_checkId_user_frnds($rel_Id){
    $selectQuery="SELECT * FROM user_frnds WHERE rel_Id='".$rel_Id."';";
	return $selectQuery;
  }
  
  /* Table - user_frnds_req ::: req_Id */
  function query_checkId_user_frnds_req($req_Id){
    $selectQuery="SELECT * FROM user_frnds_req WHERE req_Id='".$req_Id."';";
	return $selectQuery;
  }
  
  /* Table - user_message ::: message_Id */
  function query_checkId_user_message($message_Id) {
	$selectQuery="SELECT * FROM user_message WHERE message_Id='".$message_Id."';";
	return $selectQuery;
  } 
  
  /* Table - user_mkt_stat ::: mktstat_Id */
  function query_checkId_user_mkt_stat($mktstat_Id) {
	$selectQuery="SELECT * FROM user_mkt_stat WHERE mktstat_Id='".$mktstat_Id."';";
	return $selectQuery;
  } 
  
  /* Table - user_notify ::: notify_Id */
  function query_checkId_user_notify($notify_Id){
    $selectQuery="SELECT * FROM user_notify WHERE notify_Id='".$notify_Id."'";
	return $selectQuery;
  }
  
  /* Table - user_phook_info ::: phook_Id */
  function query_checkId_user_phook_info($phook_Id){
    $selectQuery="SELECT * FROM user_phook_info WHERE phook_Id='".$phook_Id."';";
	return $selectQuery;
  }
  
  /* Table - user_phook_views ::: view_Id */
  function query_checkId_user_phook_views($view_Id){
    $selectQuery="SELECT * FROM user_phook_views WHERE view_Id='".$view_Id."';";
	return $selectQuery;
  }
  
  /* Table - user_shook_views ::: frnds_Id */
  function query_checkId_user_shook_frnds($frnds_Id){
    $selectQuery="SELECT * FROM user_shook_views WHERE frnds_Id='".$frnds_Id."';";
	return $selectQuery;
  }
  
  /* Table - user_shook_info ::: shook_Id */
  function query_checkId_user_shook_info($shook_Id){
    $selectQuery="SELECT * FROM user_shook_info WHERE shook_Id='".$shook_Id."';";
	return $selectQuery;
  }
  
}

?>