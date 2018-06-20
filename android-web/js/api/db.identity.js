/* Identities of Tables in Database */
function fn_identity(action){
  var num='';
  $.ajax({type: "GET", async: false, url: PROJECT_URL+'backend/php/dac/controller.api.identity.php', 
	      data:{action:action }, success: function(resp) { num=resp; } });
  return num;
}
/* Table - app_and_info ::: info_Id */
function app_info_Id() { // info_Id(5) in app_info table
  return fn_identity("ID_APP_INFO");
}

/* Table - app_ftp_path ::: path_Id */
function ftp_path_Id() { // path_Id(5) in ftp_path table
  return fn_identity("ID_FTP_PATH");
}

/* Table - area_history ::: area_Id */
function area_history_Id() { // area_Id(25) in area_history table
  return fn_identity("ID_AREA_HISTORY");
}

/* Table - area_stat ::: area_Id */
function area_stat_Id() { // area_Id(25) in area_stat table
  return fn_identity("ID_AREA_STAT");
}

/* Table - cron_notify_user  ::: cnotify_Id */
function cron_notify_user_Id(){ // cnotify_Id(15) in cron_notify_user table
 return fn_identity("ID_CRONJOB_USERNOTIFY");
}

/* BUSINESS RELATED TABLES */
/* Table - biz_account ::: biz_Id */
function biz_profile_Id() { // biz_Id(15) in biz_profile table
  return fn_identity("ID_BIZ_ACCOUNT");
}

/* Table - biz_pay_history ::: pay_Id */
function biz_pay_Id(){ // pay_Id(25) in biz_pay_history table
 return fn_identity("ID_BIZ_PAY");
}

/* Table - biz_subscribe ::: subscribe_Id  */
function biz_subscribe_Id(){ // subscribe_Id(15) in biz_subscribe table
 return fn_identity("ID_BIZ_SUBSCRIBE");
}

/* Table - dash_info ::: info_Id */
function dash_info_Id() {  // info_Id(25) in dash_info table
 return fn_identity("ID_DASH_INFO");
}

/* Table - dash_info_union ::: info_Id */
function dash_info_union_Id() {  // info_Id(25) in dash_info_union table
 return fn_identity("ID_DASH_UNION_INFO");
}

/* Table - dash_resp_history ::: resph_Id */
function dash_resp_history_Id(){ // resph_Id(25) in dash_resp_history table
 return fn_identity("ID_DASH_RESPHISTORY");
}

/* Table - dash_view ::: view_Id */
function dash_view_Id(){ // view_Id(25) in dash_view table
 return fn_identity("ID_DASH_VIEW");
}

/* Table - dash_view_stat ::: viewstat_Id */
function dash_view_stat_Id(){ // viewstat_Id(25) in dash_view_stat table
 return fn_identity("ID_DASH_VIEWSTAT");
}
/* Table - dash_vote ::: vote_Id */
function dash_vote_Id(){ // vote_Id(25) in dash_vote table
 return fn_identity("ID_DASH_VOTE");
}

/* Table - dash_vote_stat ::: votestat_Id */
function dash_vote_stat_Id(){ // votestat_Id(25) in dash_vote_stat table
 return fn_identity("ID_DASH_VOTESTAT");
}

/* Table - dom_role_history ::: rhistory_Id */
function dom_role_history_Id(){ // rhistory_Id(15) in dom_role_history table
 return fn_identity("ID_ROLE_HISTORY");
}

/* Table - dom_role_stat ::: rstat_Id */
function dom_role_stat_Id(){ // rstat_Id(25) in dom_role_stat table
 return fn_identity("ID_ROLE_STAT");
}

/* Table - dom_stat ::: dstat_Id */
function dom_stat_Id(){ // dstat_Id(25) in dom_stat table
 return fn_identity("ID_DOM_STAT");
}

/* Table - move_info ::: move_Id */
function move_info_Id(){ // move_Id(8) in move_info table
 return fn_identity("ID_MOVE_INFO");
}

/* Table - move_sign ::: sign_Id */
function move_sign_Id(){ // sign_Id(25) in move_sign table
 return fn_identity("ID_MOVE_SIGN");
}

/* Table - newsfeed_info ::: info_Id */    
function newsfeed_info_Id(){ // info_Id(25) in newsfeed_info table
 return fn_identity("ID_NEWSFEED_INFO");
}

/* Table - newsfeed_move ::: nf_move_Id */ 
function newsfeed_move_Id(){ // nf_move_Id(25) in newsfeed_move table
 return fn_identity("ID_NEWSFEED_MOVE");
}

/* Table - newsfeed_user_fav ::: nf_fav_Id */  
function newsfeed_user_fav_Id(){ // nf_fav_Id(15) in newsfeed_user_fav table
 return fn_identity("ID_NEWSFEED_USERFAV");
}

/* Table - newsfeed_user_likes ::: nf_like_Id */ 
function newsfeed_user_likes_Id(){ // nf_like_Id(15) in newsfeed_user_likes table
 return fn_identity("ID_NEWSFEED_USERLIKES");
}

/* Table - newsfeed_user_views ::: view_Id */  
function newsfeed_user_views_Id(){ // view_Id(15) in newsfeed_user_views table
 return fn_identity("ID_NEWSFEED_USERVIEWS");
}

/* Table - newsfeed_user_votes ::: vote_Id */ 
function newsfeed_user_votes_Id(){ // vote_Id(15) in newsfeed_user_votes table
 return fn_identity("ID_NEWSFEED_USERVOTES");
} 
  
/* Table - srvy_info ::: srvy_Id */
function srvy_info_Id(){ // srvy_Id(25) in srvy_info table
 return fn_identity("ID_SRVY_INFO");
}

/* Table - srvy_info_stat ::: sstat_Id */
function srvy_info_stat_Id(){ // sstat_Id(25) in srvy_info_stat table
 return fn_identity("ID_SRVY_STAT");
}

/* Table - srvy_pay_history ::: srvy_pay_Id */
function srvy_pay_history_Id(){ // srvy_pay_Id(25) in srvy_pay_history table
  return fn_identity("ID_SRVY_PAY");
}
/* Table - srvy_q_optusers ::: optInfo_Id */
function srvy_q_optusers_Id(){ // optInfo_Id(25) in srvy_q_optusers table
  return fn_identity("ID_SRVY_OPTUSERS");
}
/* Table - unionprof_account ::: union_Id */
function unionprof_account_Id() { // union_Id(15) in union_profile table
  return fn_identity("ID_UNIONPROF_ACCOUNT");
}
/* Table - unionprof_branch ::: branch_Id */
function unionprof_branch_Id() { // branch_Id(25) in union_profile table
  return fn_identity("ID_UNIONPROF_BRANCH");
}
/* Table - unionprof_calndar ::: calendar_Id */
function unionprof_calndar_Id(){ // calendar_Id(25) in union_calndar table
  return fn_identity("ID_UNIONPROF_CALNDR");
}
/* Table - unionprof_mem ::: member_Id */
function unionprof_members_Id() { // member_Id(15) in union_members table
  return fn_identity("ID_UNIONPROF_MEM");
}

/* Table - unionprof_mem_chat ::: chat_Id */
function unionprof_chat_Id() { // chat_Id(25) in union_chat table
 return fn_identity("ID_UNIONPROF_MEMCHAT");
}

/* Table - unionprof_mem_perm_branch ::: branch_permission_Id */
function unionprof_mem_perm_branch_Id(){ // branch_permission_Id(25) in unionprof_mem_perm_branch table
 return fn_identity("ID_UNIONPROF_PERMBRANCH");
}

/* Table - unionprof_mem_perm_union ::: union_permission_Id */
function unionprof_mem_perm_union_Id(){ // union_permission_Id(25) in unionprof_mem_perm_union table
 return fn_identity("ID_UNIONPROF_PERMUNION");
}

/* Table - unionprof_mem_req :::  request_Id */
function unionprof_requests_Id() { // request_Id(15) in union_requests table
 return fn_identity("ID_UNIONPROF_MEMREQ");
}

/* Table - unionprof_mem_roles ::: role_Id  */
function unionprof_mem_roles_Id(){ // role_Id(25) in unionprof_mem_roles table
 return fn_identity("ID_UNIONPROF_MEMROLES");
}

/* Table - unionprof_sup ::: support_Id */
function unionprof_sup_Id(){ // support_Id(15) in union_sup table
 return fn_identity("ID_UNIONPROF_SUP");
}

/* Table - user_account ::: user_Id */
function user_account_Id() { // user_Id(15) in user_profile table
 return fn_identity("ID_USER_ACCOUNT");
}

/* Table - user_fav ::: fav_Id */
function user_fav_Id() { // fav_Id(15) in user_fav table
 return fn_identity("ID_USER_FAV");
}

/* Table - user_frnds ::: rel_Id */
function user_frnds_Id() { // rel_Id(25) in user_frnds table
 return fn_identity("ID_USER_FRNDS");
}

/* Table - user_frnds_req ::: req_Id */
function user_frnds_req_Id() { // req_Id(25) in user_frnds_req table
 return fn_identity("ID_USER_FRNDS_REQ");
}

/* Table - user_message ::: message_Id */
function user_message_Id() { // message_Id(15) in user_message table
 return fn_identity("ID_USER_MESSAGE");
}

/* Table - user_mkt_stat ::: mktstat_Id */
function user_mkt_stat_Id(){ // mktstat_Id(25) in user_mkt_stat table
 return fn_identity("ID_USER_MKTSTAT");
}

/* Table - user_notify ::: notify_Id */
function user_notify_Id(){ // notify_Id(35) in user_notify table
 return fn_identity("ID_USER_NOTIFY");
}
/* Table - user_phook_info ::: phook_Id */
function user_phook_info_Id(){ // phook_Id(25) in user_phook_info table
 return fn_identity("ID_USER_PHOOK_INFO");
}

/* Table - user_phook_views ::: view_Id */
function user_phook_views_Id(){ // view_Id(35) in user_phook_views table
 return fn_identity("ID_USER_PHOOK_VIEWS");
}

/* Table - user_shook_frnds ::: frnds_Id */
function user_shook_frnds_Id(){ // frnds_Id(35) in user_shook_frnds table
 return fn_identity("ID_USER_SHOOK_FRNDS");
}

/* Table - user_shook_info ::: shook_Id */
function user_shook_info_Id(){ // shook_Id(25) in user_shook_info table
 return fn_identity("ID_USER_SHOOK_INFO");
}


