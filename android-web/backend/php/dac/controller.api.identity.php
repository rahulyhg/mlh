<?php
/* Utilities */
require_once '../lal/logic.appIdentity.php';

$idObj=new Identity();

if(isset($_GET["action"])) {
/* DATABASE - mlh_basic
 * TABLES */
      /* Table - (1) cmp_batch_account ::: batch_Id (25) */
	  if($_GET["action"]=='CLSMTEPORT_BATCH_ACCOUNT') { echo $idObj->cmp_batch_account_id(); }
	  /* Table - (2) cmp_batch_members ::: member_Id (15) */
 else if($_GET["action"]=='CLSMTEPORT_BATCH_MEMBERS') { echo $idObj->cmp_batch_members_id(); }
      /* Table - (3) cmp_batch_mem_chat ::: chat_Id (25) */
 else if($_GET["action"]=='CLSMTEPORT_BATCH_CHAT') { echo $idObj->cmp_batch_mem_chat_id(); }
      /* Table - (4) cmp_batch_mem_req ::: request_Id (15) */	
 else if($_GET["action"]=='CLSMTEPORT_BATCH_MEM_REQ') { echo $idObj->cmp_batch_mem_req_id(); }
      /* Table - (5) cmp_sch_account ::: cmp_sch_Id (15) */
 else if($_GET["action"]=='CLSMTEPORT_SCH_ACCOUNT') { echo $idObj->cmp_sch_account_id(); }
      /* Table - (6) cmp_sch_coursemap ::: cmp_map_Id (25) */
 else if($_GET["action"]=='CLSMTEPORT_SCH_COURSEMAP') { echo $idObj->cmp_sch_coursemap_id(); }
	  /* Table - (7) cmp_uni_account ::: cmp_u_Id (15) */
 else if($_GET["action"]=='CLSMTEPORT_UNI_ACCOUNT') { echo $idObj->cmp_uni_account_id(); }
	  /* Table - (8) cmp_uni_courses ::: cmp_course_Id (15) */
 else if($_GET["action"]=='CLSMTEPORT_UNI_COURSES') { echo $idObj->cmp_uni_courses_id(); }
      /* Table - (8) cmp_uni_coursemap ::: cmp_map_Id (25) */
 else if($_GET["action"]=='CLSMTEPORT_UNI_COURSESMAP') { echo $idObj->cmp_uni_coursemap_id(); }
	  /* Table - (9) ent_fc_account ::: celeb_Id (15) */
 else if($_GET["action"]=='ENT_FANCLUB_ACCOUNT') { echo $idObj->ent_fc_account_id(); }
	  /* Table - (10) ent_fc_aw ::: 	artOfWork_Id (35) */
 else if($_GET["action"]=='ENT_FANCLUB_ARTWORK') { echo $idObj->ent_fc_aw_id(); }
	  /* Table - (11) ent_fc_occmap ::: occMap_Id (25) */
 else if($_GET["action"]=='ENT_FANCLUB_OCCMAP') { echo $idObj->ent_fc_occmap_id(); }
	  /* Table - (12) ent_occupations ::: occupation_Id (25) */
 else if($_GET["action"]=='ENT_FANCLUB_OCCUPATIONS') { echo $idObj->ent_occupations_id(); }
	  /* Table - (1) move_info ::: move_Id */
 else if($_GET["action"]=='MOVE_INFO') { echo $idObj->move_info_id(); } 
	  /* Table - (2) move_sign ::: sign_Id */
 else if($_GET["action"]=='MOVE_SIGN') { echo $idObj->move_sign_id(); }   
	  /* Table - (3) move_views ::: view_Id */
 else if($_GET["action"]=='MOVE_VIEWS') { echo $idObj->move_views_id(); } 
	  /* Table - (4) newsfeed_info ::: info_Id */
 else if($_GET["action"]=='NEWSFEED_INFO') { echo $idObj->newsfeed_info_id(); } 
      /* Table - (4) newsfeed_ishare ::: ishare_Id */
 else if($_GET["action"]=='NEWSFEED_ISHARE') { echo $idObj->newsfeed_ishare_id(); } 
	  /* Table - (4) newsfeed_ishare ::: ishare_Id */
 else if($_GET["action"]=='NEWSFEED_RSHARE') { echo $idObj->newsfeed_rshare_id(); } 
	  /* Table - (5) newsfeed_move ::: nf_move_Id */
 else if($_GET["action"]=='NEWSFEED_MOVE') { echo $idObj->newsfeed_move_id(); } 
	  /* Table - (6) newsfeed_user_fav ::: nf_fav_Id */
 else if($_GET["action"]=='NEWSFEED_USER_FAV') { echo $idObj->newsfeed_user_fav_id(); }
	  /* Table - (7) newsfeed_user_likes ::: nf_like_Id */
 else if($_GET["action"]=='NEWSFEED_USER_LIKES') { echo $idObj->newsfeed_user_likes_id(); }
	  /* Table - (8) newsfeed_user_views ::: view_Id */
 else if($_GET["action"]=='NEWSFEED_USER_VIEWS') { echo $idObj->newsfeed_user_views_id(); }
	  /* Table - (9) newsfeed_user_votes ::: vote_Id */
 else if($_GET["action"]=='NEWSFEED_USER_VOTES') { echo $idObj->newsfeed_user_votes_id(); }
	  /* Table - (10) subs_dom_info ::: domain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
	  /* Table - (11) subs_subdom_info ::: subdomain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
	  /* Table - (12) unionprof_account ::: union_Id */
 else if($_GET["action"]=='UNIONPROF_ACCOUNT') { echo $idObj->unionprof_account_id(); }
 /* Table - (13) unionprof_branch ::: branch_Id */
 else if($_GET["action"]=='UNIONPROF_BRANCH') { echo $idObj->unionprof_branch_id(); }
 /* Table - (14) unionprof_branch_req ::: req_branch_Id */
 else if($_GET["action"]=='UNIONPROF_BRANCH_REQ') { echo $idObj->unionprof_branch_req_id(); }
 /* Table - (15) unionprof_calndar_union ::: calendar_Id */
 else if($_GET["action"]=='UNIONPROF_UNION_CALENDAR') { echo $idObj->unionprof_calndar_union_id(); }
 /* Table - (15) unionprof_calndar_branch ::: calendar_Id */
 else if($_GET["action"]=='UNIONPROF_BRANCH_CALENDAR') { echo $idObj->unionprof_calndar_branch_id(); }
 /* Table - (16) unionprof_faq_branch ::: faq_Id */
 else if($_GET["action"]=='UNIONPROF_BRANCH_FAQ') { echo $idObj->unionprof_faq_branch_id(); }
 /* Table - (17) unionprof_faq_union ::: faq_Id */
 else if($_GET["action"]=='UNIONPROF_UNION_FAQ') { echo $idObj->unionprof_faq_union_id(); }
 /* Table - (18) unionprof_lang ::: union_Id (SAME ID of unionprof_account is being used) */
 /* Table - (19) unionprof_mem ::: member_Id */
 else if($_GET["action"]=='UNIONPROF_MEMBERS') { echo $idObj->unionprof_mem_id(); }
 /* Table - (20) unionprof_mem_chat ::: chat_Id */
 else if($_GET["action"]=='UNIONPROF_MEMBERS_CHAT') { echo $idObj->unionprof_mem_chat_id(); }
 /* Table - (21) unionprof_mem_perm1 ::: permission1_Id */
 else if($_GET["action"]=='UNIONPROF_MEMBERS_PERM1') { echo $idObj->unionprof_mem_perm1_id(); }
  /* Table - (21) unionprof_mem_perm2 ::: permission2_Id */
 else if($_GET["action"]=='UNIONPROF_MEMBERS_PERM2') { echo $idObj->unionprof_mem_perm2_id(); }
 /* Table - (22) unionprof_mem_req ::: request_Id */
 else if($_GET["action"]=='UNIONPROF_MEMBERS_REQ') { echo $idObj->unionprof_mem_req_id(); }
 /* Table - (23) unionprof_mem_roles ::: role_Id */
 else if($_GET["action"]=='UNIONPROF_MEMBERS_ROLES') { echo $idObj->unionprof_mem_roles_id(); }
 /* Table - (24) unionprof_profile_geo ::: union_Id (SAME ID of unionprof_account is being used) */
 /* Table - (25) unionprof_sup ::: support_Id */
 else if($_GET["action"]=='UNIONPROF_SUPPORTERS') { echo $idObj->unionprof_sup_id(); }
 /* Table - (26) user_account ::: user_Id */
 else if($_GET["action"]=='USER_ACCOUNT') { echo $idObj->user_account_id(); }
 /* Table - (27) user_contact ::: contact_Id */
 else if($_GET["action"]=='USER_CONTACTS') { echo $idObj->user_contacts_id(); }
 /* Table - (28) user_frnds ::: rel_Id */
 else if($_GET["action"]=='USER_FRNDS') { echo $idObj->user_frnds_id(); }
 /* Table - (29) user_frnds_req ::: rel_Id */
 else if($_GET["action"]=='USER_FRNDS_REQ') { echo $idObj->user_frnds_req_id(); }
 /* Table - (30) user_info ::: user_Id (SAME ID of user_account is being used) */
 /* Table - (31) user_message ::: message_Id */
 else if($_GET["action"]=='USER_MESSAGE') { echo $idObj->user_message_id(); }
 /* Table - (32) user_profile_geo ::: user_Id (SAME ID of user_account is being used) */
 /* Table - (33) user_subscription ::: sub_Id */
 else if($_GET["action"]=='USER_SUBSCRIPTION') { echo $idObj->user_subscription_id(); }
 else { echo 'INVALID_INPUT'; }
}
else {
 echo 'MISSING_ACTION_INPUT';
}

?>