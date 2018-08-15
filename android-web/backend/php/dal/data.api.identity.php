<?php

class DataIdentity {
/* DATABASE - mlh_basic
 * TABLES */
 /* Table - (1) move_info ::: move_Id */
 function query_checkId_move_info($id) {
  $selectQuery="SELECT count(*) FROM move_info WHERE move_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (2) move_sign ::: sign_Id */
 function query_checkId_move_sign($id) {
  $selectQuery="SELECT count(*) FROM move_sign WHERE sign_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (3) move_views ::: view_Id */
 function query_checkId_move_views($id) {
  $selectQuery="SELECT count(*) FROM move_views WHERE view_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (4) newsfeed_info ::: info_Id */
 function query_checkId_newsfeed_info($id) {
  $selectQuery="SELECT count(*) FROM newsfeed_info WHERE info_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (5) newsfeed_move ::: nf_move_Id */
 function query_checkId_newsfeed_move($id) {
  $selectQuery="SELECT count(*) FROM newsfeed_move WHERE nf_move_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (6) newsfeed_user_fav ::: nf_fav_Id */
 function query_checkId_newsfeed_user_fav($id) {
  $selectQuery="SELECT count(*) FROM newsfeed_user_fav WHERE nf_fav_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (7) newsfeed_user_likes ::: nf_like_Id */
 function query_checkId_newsfeed_user_likes($id) {
  $selectQuery="SELECT count(*) FROM newsfeed_user_likes WHERE nf_like_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (8) newsfeed_user_views ::: view_Id */
 function query_checkId_newsfeed_user_views($id) {
  $selectQuery="SELECT count(*) FROM newsfeed_user_views WHERE view_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (9) newsfeed_user_votes ::: vote_Id */
 function query_checkId_newsfeed_user_votes($id) {
  $selectQuery="SELECT count(*) FROM newsfeed_user_votes WHERE vote_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (10) subs_dom_info ::: domain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
 /* Table - (11) subs_subdom_info ::: subdomain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
 /* Table - (12) unionprof_account ::: union_Id */
 function query_checkId_unionprof_account($id) {
  $selectQuery="SELECT count(*) FROM unionprof_account WHERE union_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (13) unionprof_branch ::: branch_Id */
 function query_checkId_unionprof_branch($id) {
  $selectQuery="SELECT count(*) FROM unionprof_branch WHERE branch_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (14) unionprof_branch_req ::: req_branch_Id */
 function query_checkId_unionprof_branch_req($id) {
  $selectQuery="SELECT count(*) FROM unionprof_branch_req WHERE req_branch_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (15) unionprof_calndar_union ::: calendar_Id */
 function query_checkId_unionprof_calndar_union($id) {
  $selectQuery="SELECT count(*) FROM unionprof_calndar_union WHERE calendar_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (15) unionprof_calndar_branch ::: calendar_Id */
 function query_checkId_unionprof_calndar_branch($id) {
  $selectQuery="SELECT count(*) FROM unionprof_calndar_branch WHERE calendar_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (16) unionprof_faq_branch ::: faq_Id */
 function query_checkId_unionprof_faq_branch($id) {
  $selectQuery="SELECT count(*) FROM unionprof_faq_branch WHERE faq_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (17) unionprof_faq_union ::: faq_Id */
 function query_checkId_unionprof_faq_union($id) {
  $selectQuery="SELECT count(*) FROM unionprof_faq_union WHERE faq_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (18) unionprof_lang ::: union_Id (SAME ID of unionprof_account is being used) */
 /* Table - (19) unionprof_mem ::: member_Id */
 function query_checkId_unionprof_mem($id) {
  $selectQuery="SELECT count(*) FROM unionprof_mem WHERE member_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (20) unionprof_mem_chat ::: chat_Id */
 function query_checkId_unionprof_mem_chat($id) {
  $selectQuery="SELECT count(*) FROM unionprof_mem_chat WHERE chat_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (21) unionprof_mem_perm1 ::: permission_Id */
 function query_checkId_unionprof_mem_perm1($id) {
  $selectQuery="SELECT count(*) FROM unionprof_mem_perm1 WHERE permission_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (22) unionprof_mem_req ::: request_Id */
 function query_checkId_unionprof_mem_req($id) {
  $selectQuery="SELECT count(*) FROM unionprof_mem_req WHERE request_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (23) unionprof_mem_roles ::: role_Id */
 function query_checkId_unionprof_mem_roles($id) {
  $selectQuery="SELECT count(*) FROM unionprof_mem_roles WHERE role_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (24) unionprof_profile_geo ::: union_Id (SAME ID of unionprof_account is being used) */
 
 /* Table - (25) unionprof_sup ::: support_Id */
 function query_checkId_unionprof_sup($id) {
  $selectQuery="SELECT count(*) FROM unionprof_sup WHERE support_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (26) user_account ::: user_Id */
 function query_checkId_user_account($id) {
  $selectQuery="SELECT count(*) FROM user_account WHERE user_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (27) user_contact ::: contact_Id */
 function query_checkId_user_contact($id) {
  $selectQuery="SELECT count(*) FROM user_contact WHERE contact_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (28) user_frnds ::: rel_Id */
 function query_checkId_user_frnds($id) {
  $selectQuery="SELECT count(*) FROM user_frnds WHERE rel_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (29) user_frnds_req ::: rel_Id */
 function query_checkId_user_frnds_req($id) {
  $selectQuery="SELECT count(*) FROM user_frnds_req WHERE req_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (30) user_info ::: user_Id (SAME ID of user_account is being used) */
 /* Table - (31) user_message ::: message_Id */
 function query_checkId_user_message($id) {
  $selectQuery="SELECT count(*) FROM user_message WHERE message_Id='".$id."';";
  return $selectQuery;
 }
 /* Table - (32) user_profile_geo ::: user_Id (SAME ID of user_account is being used) */
 /* Table - (33) user_subscription ::: sub_Id */
 function query_checkId_user_subscription($id) {
  $selectQuery="SELECT count(*) FROM user_subscription WHERE sub_Id='".$id."';";
  return $selectQuery;
 }
}

?>