/* Identities of Tables in Database */
function fn_identity(action){
  var num='';
  $.ajax({type: "GET", async: false, url: PROJECT_URL+'backend/php/dac/controller.api.identity.php', 
	      data:{action:action }, success: function(resp) { num=resp; } });
  return num;
}

/* DATABASE - mlh_basic
 * TABLES */
/* Table - (1) cmp_batch_account ::: batch_Id (25) */
 function cmp_batch_account_Id() { return fn_identity("CLSMTEPORT_BATCH_ACCOUNT"); }
/* Table - (2) cmp_batch_members ::: member_Id (15) */
 function cmp_batch_members_Id() { return fn_identity("CLSMTEPORT_BATCH_MEMBERS"); }
/* Table - (3) cmp_batch_mem_chat ::: chat_Id (25) */
 function cmp_batch_mem_chat_Id() { return fn_identity("CLSMTEPORT_BATCH_CHAT"); }
/* Table - (4) cmp_batch_mem_req ::: request_Id (15) */	
 function cmp_batch_mem_req_Id() { return fn_identity("CLSMTEPORT_BATCH_MEM_REQ"); }
/* Table - (5) cmp_sch_account ::: cmp_sch_Id (15) */
 function cmp_sch_account_Id() { return fn_identity("CLSMTEPORT_SCH_ACCOUNT"); }
/* Table - (6) cmp_sch_coursemap ::: cmp_map_Id (25) */
 function cmp_sch_coursemap_Id() { return fn_identity("CLSMTEPORT_SCH_COURSEMAP"); }
/* Table - (7) cmp_uni_account ::: cmp_u_Id (15) */
 function cmp_uni_account_Id() { return fn_identity("CLSMTEPORT_UNI_ACCOUNT"); }
/* Table - (8) cmp_uni_courses ::: cmp_course_Id (15) */
 function cmp_uni_courses_Id() { return fn_identity("CLSMTEPORT_UNI_COURSES"); }
/* Table - (8) cmp_uni_coursemap ::: cmp_map_Id (25) */
 function cmp_uni_coursemap_Id() { return fn_identity("CLSMTEPORT_UNI_COURSESMAP"); }
/* Table - (9) ent_fc_account ::: celeb_Id (15) */
 function ent_fc_account_Id() { return fn_identity("ENT_FANCLUB_ACCOUNT"); }
/* Table - (10) ent_fc_aw ::: 	artOfWork_Id (35) */
 function ent_fc_aw_Id() { return fn_identity("ENT_FANCLUB_ARTWORK"); }
/* Table - (11) ent_fc_occmap ::: occMap_Id (25) */
 function ent_fc_occmap_Id() { return fn_identity("ENT_FANCLUB_OCCMAP"); }
/* Table - (12) ent_occupations ::: occupation_Id (25) */
 function ent_occupations_Id() { return fn_identity("ENT_FANCLUB_OCCUPATIONS"); }
/* Table - (1) move_info ::: move_Id */
 function move_info_Id() { return fn_identity("MOVE_INFO"); }
/* Table - (2) move_sign ::: sign_Id */
 function move_sign_Id() { return fn_identity("MOVE_SIGN"); }
/* Table - (3) move_views ::: view_Id */
 function move_views_Id() { return fn_identity("MOVE_VIEWS"); }
/* Table - (4) newsfeed_info ::: info_Id */
 function newsfeed_info_Id() { return fn_identity("NEWSFEED_INFO"); }
/* Table - (4) newsfeed_ishare ::: ishare_Id */
 function newsfeed_ishare_Id() { return fn_identity("NEWSFEED_ISHARE"); }
/* Table - (4) newsfeed_ishare ::: ishare_Id */
 function newsfeed_rshare_Id() { return fn_identity("NEWSFEED_RSHARE"); }
/* Table - (5) newsfeed_move ::: nf_move_Id */
 function newsfeed_move_Id() { return fn_identity("NEWSFEED_MOVE"); }
/* Table - (6) newsfeed_user_fav ::: nf_fav_Id */
 function newsfeed_user_fav_Id() { return fn_identity("NEWSFEED_USER_FAV"); }
/* Table - (7) newsfeed_user_likes ::: nf_like_Id */
 function newsfeed_user_likes_Id() { return fn_identity("NEWSFEED_USER_LIKES"); }
/* Table - (8) newsfeed_user_views ::: view_Id */
 function newsfeed_user_views_Id() { return fn_identity("NEWSFEED_USER_VIEWS"); }
/* Table - (9) newsfeed_user_votes ::: vote_Id */
 function newsfeed_user_votes_Id() { return fn_identity("NEWSFEED_USER_VOTES"); }
/* Table - (10) subs_dom_info ::: domain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
/* Table - (11) subs_subdom_info ::: subdomain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
/* Table - (12) unionprof_account ::: union_Id */
 function unionprof_account_Id() { return fn_identity("UNIONPROF_ACCOUNT"); }
/* Table - (13) unionprof_branch ::: branch_Id */
 function unionprof_branch_Id() { return fn_identity("UNIONPROF_BRANCH"); }
/* Table - (14) unionprof_branch_req ::: req_branch_Id */
 function unionprof_branch_req_Id() { return fn_identity("UNIONPROF_BRANCH_REQ"); }
/* Table - (15) unionprof_calndar_union ::: calendar_Id */
 function unionprof_calndar_union_Id() { return fn_identity("UNIONPROF_UNION_CALENDAR"); }
/* Table - (15) unionprof_calndar_branch ::: calendar_Id */
 function unionprof_calndar_branch_Id() { return fn_identity("UNIONPROF_BRANCH_CALENDAR"); }
/* Table - (16) unionprof_faq_branch ::: faq_Id */
 function unionprof_faq_branch_Id() { return fn_identity("UNIONPROF_BRANCH_FAQ"); }
/* Table - (17) unionprof_faq_union ::: faq_Id */
 function unionprof_faq_union_Id() { return fn_identity("UNIONPROF_UNION_FAQ"); }
/* Table - (18) unionprof_lang ::: union_Id (SAME ID of unionprof_account is being used) */
/* Table - (19) unionprof_mem ::: member_Id */
 function unionprof_mem_Id() { return fn_identity("UNIONPROF_MEMBERS"); }
/* Table - (20) unionprof_mem_chat ::: chat_Id */
 function unionprof_mem_chat_Id() { return fn_identity("UNIONPROF_MEMBERS_CHAT"); }
/* Table - (21) unionprof_mem_perm1 ::: permission1_Id */
 function unionprof_mem_perm1_Id() { return fn_identity("UNIONPROF_MEMBERS_PERM1"); }
 /* Table - (21) unionprof_mem_perm2 ::: permission2_Id */
 function unionprof_mem_perm2_Id() { return fn_identity("UNIONPROF_MEMBERS_PERM2"); }
/* Table - (22) unionprof_mem_req ::: request_Id */
 function unionprof_mem_req_Id() { return fn_identity("UNIONPROF_MEMBERS_REQ"); }
/* Table - (23) unionprof_mem_roles ::: role_Id */
 function unionprof_mem_roles_Id() { return fn_identity("UNIONPROF_MEMBERS_ROLES"); }
/* Table - (24) unionprof_profile_geo ::: union_Id (SAME ID of unionprof_account is being used) */
/* Table - (25) unionprof_sup ::: support_Id */
 function unionprof_sup_Id() { return fn_identity("UNIONPROF_SUPPORTERS"); }
/* Table - (26) user_account ::: user_Id */
 function user_account_Id() { return fn_identity("USER_ACCOUNT"); }
/* Table - (27) user_contact ::: contact_Id */
 function user_contact_Id() { return fn_identity("USER_CONTACTS"); }
/* Table - (28) user_frnds ::: rel_Id */
 function user_frnds_Id() { return fn_identity("USER_FRNDS"); }
/* Table - (29) user_frnds_req ::: rel_Id */
 function user_frnds_req_Id() { return fn_identity("USER_FRNDS_REQ"); }
/* Table - (30) user_info ::: user_Id (SAME ID of user_account is being used) */
/* Table - (31) user_message ::: message_Id */
 function user_message_Id() { return fn_identity("USER_MESSAGE"); }
/* Table - (32) user_profile_geo ::: user_Id (SAME ID of user_account is being used) */
/* Table - (33) user_subscription ::: sub_Id */
 function user_subscription_Id() { return fn_identity("USER_SUBSCRIPTION"); }
