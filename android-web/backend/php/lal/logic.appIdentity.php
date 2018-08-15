<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
require_once '../dal/data.api.identity.php';

class Identity {
 function mlhbasic_tbl_PrimaryId_status($selectQuery){
   $dbObject=new Database($GLOBALS['DB_MLHBASIC_SERVERNAME'],$GLOBALS['DB_MLHBASIC_NAME'],
						  $GLOBALS['DB_MLHBASIC_USER'],$GLOBALS['DB_MLHBASIC_PASSWORD']);
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData)[0]->{'count(*)'};
   if($dejsonData>0) {  $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
   return $output;
 }
/* DATABASE - mlh_basic
 * TABLES */
 /* Table - (1) move_info ::: move_Id (8) */
 function id_move_info($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_move_info($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function move_info_id() {
  $num="MI";
  for($index=0;$index<6;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_move_info($num);
  if($output==='ID_ALREADY_EXIST') { move_info_id(); } 
  else { return $num; }
 }
 /* Table - (2) move_sign ::: sign_Id (25) */
 function id_move_sign($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_move_sign($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function move_sign_id() {
  $num="MS";
  for($index=0;$index<23;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_move_sign($num);
  if($output==='ID_ALREADY_EXIST') { move_sign_id(); } 
  else { return $num; }
 }
 /* Table - (3) move_views ::: view_Id (15) */
 function id_move_views($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_move_views($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function move_views_id() {
  $num="MV";
  for($index=0;$index<13;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_move_views($num);
  if($output==='ID_ALREADY_EXIST') { move_views_id(); } 
  else { return $num; }
 } 
 /* Table - (4) newsfeed_info ::: info_Id (25) */
 function id_newsfeed_info($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_newsfeed_info($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function newsfeed_info_id() {
  $num="NFI";
  for($index=0;$index<22;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_newsfeed_info($num);
  if($output==='ID_ALREADY_EXIST') { newsfeed_info_id(); } 
  else { return $num; }
 }
 /* Table - (5) newsfeed_move ::: nf_move_Id (25) */
 function id_newsfeed_move($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_newsfeed_move($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function newsfeed_move_id() {
  $num="NFM";
  for($index=0;$index<22;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_newsfeed_move($num);
  if($output==='ID_ALREADY_EXIST') { newsfeed_move_id(); } 
  else { return $num; }
 } 
 
 /* Table - (6) newsfeed_user_fav ::: nf_fav_Id (15) */
 function id_newsfeed_user_fav($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_newsfeed_user_fav($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function newsfeed_user_fav_id() {
  $num="NUF";
  for($index=0;$index<12;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_newsfeed_user_fav($num);
  if($output==='ID_ALREADY_EXIST') { newsfeed_user_fav_id(); } 
  else { return $num; }
 }
 
 /* Table - (7) newsfeed_user_likes ::: nf_like_Id (15) */
 function id_newsfeed_user_likes($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_newsfeed_user_likes($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function newsfeed_user_likes_id() {
  $num="NUL";
  for($index=0;$index<12;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_newsfeed_user_likes($num);
  if($output==='ID_ALREADY_EXIST') { newsfeed_user_likes_id(); } 
  else { return $num; }
 }
 
 /* Table - (8) newsfeed_user_views ::: view_Id (15) */
 function id_newsfeed_user_views($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_newsfeed_user_views($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function newsfeed_user_views_id() {
  $num="NUV";
  for($index=0;$index<12;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_newsfeed_user_views($num);
  if($output==='ID_ALREADY_EXIST') { newsfeed_user_views_id(); } 
  else { return $num; }
 }
 
 /* Table - (9) newsfeed_user_votes ::: vote_Id (15) */
 function id_newsfeed_user_votes($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_newsfeed_user_votes($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function newsfeed_user_votes_id() {
  $num="NVO";
  for($index=0;$index<12;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_newsfeed_user_votes($num);
  if($output==='ID_ALREADY_EXIST') { newsfeed_user_votes_id(); } 
  else { return $num; }
 }
 
 /* Table - (10) subs_dom_info ::: domain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
 /* Table - (11) subs_subdom_info ::: subdomain_Id (15) (AUTO-GENERATE DOMAIN KEY) */
 
 /* Table - (12) unionprof_account ::: union_Id (15) */ 
 function id_unionprof_account($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_account($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_account_id() {
  $num="UPA";
  for($index=0;$index<12;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_account($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_account_id(); } 
  else { return $num; }
 }
 /* Table - (13) unionprof_branch ::: branch_Id (25) */
 function id_unionprof_branch($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_branch($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_branch_id() {
  $num="UPB";
  for($index=0;$index<22;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_branch($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_branch_id(); } 
  else { return $num; }
 }
 
 /* Table - (14) unionprof_branch_req ::: req_branch_Id (25) */
 function id_unionprof_branch_req($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_branch_req($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_branch_req_id() {
  $num="UPBR";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_branch_req($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_branch_req_id(); } 
  else { return $num; }
 }
 
 /* Table - (15) unionprof_calndar_union ::: calendar_Id (25) */
 function id_unionprof_calndar_union($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_calndar_union($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_calndar_union_id() {
  $num="UPCU";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_calndar_union($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_calndar_union_id(); } 
  else { return $num; }
 }
 
 /* Table - (16) unionprof_calndar_branch ::: calendar_Id (25) */
 function id_unionprof_calndar_branch($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_calndar_branch($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_calndar_branch_id() {
  $num="UPCB";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_calndar_branch($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_calndar_branch_id(); } 
  else { return $num; }
 }
 
 /* Table - (16) unionprof_faq_branch ::: faq_Id (25) */
 function id_unionprof_faq_branch($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_faq_branch($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_faq_branch_id() {
  $num="UPFB";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_faq_branch($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_faq_branch_id(); } 
  else { return $num; }
 }
 
 /* Table - (17) unionprof_faq_union ::: faq_Id (25) */
 function id_unionprof_faq_union($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_faq_union($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_faq_union_id() {
  $num="UPFU";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_faq_union($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_faq_union_id(); } 
  else { return $num; }
 }
 /* Table - (18) unionprof_lang ::: union_Id (15) (SAME ID of unionprof_account is being used) */
 /* Table - (19) unionprof_mem ::: member_Id (15) */
 function id_unionprof_mem($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_mem_id() {
  $num="UPM";
  for($index=0;$index<12;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_mem($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_mem_id(); } 
  else { return $num; }
 }
 /* Table - (20) unionprof_mem_chat ::: chat_Id (25) */
 function id_unionprof_mem_chat($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_chat($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_mem_chat_id() {
  $num="UPMC";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_mem_chat($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_mem_chat_id(); } 
  else { return $num; }
 }
 /* Table - (21) unionprof_mem_perm1 ::: permission_Id (25) */
 function id_unionprof_mem_perm1($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_perm1($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_mem_perm1_id() {
  $num="UP1P";
  for($index=0;$index<21;$index++) { $num.=rand(1,9); }
  /* Check Exists or not, If not exist return */
  $checkObj=new Identity();
  $output=$checkObj->id_unionprof_mem_perm1($num);
  if($output==='ID_ALREADY_EXIST') { unionprof_mem_perm1_id(); } 
  else { return $num; }
 }
 /* Table - (22) unionprof_mem_req ::: request_Id (15) */
 function id_unionprof_mem_req($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_req($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_mem_req_id() {
   $num="UPMR";
   for($index=0;$index<21;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_unionprof_mem_req($num);
   if($output==='ID_ALREADY_EXIST') { unionprof_mem_req_id(); } 
   else { return $num; }
 }
 /* Table - (23) unionprof_mem_roles ::: role_Id (25) */
 function id_unionprof_mem_roles($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_roles($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_mem_roles_id() {
   $num="UPRO";
   for($index=0;$index<21;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_unionprof_mem_roles($num);
   if($output==='ID_ALREADY_EXIST') { unionprof_mem_roles_id(); } 
   else { return $num; }
 }
 /* Table - (24) unionprof_profile_geo ::: union_Id (15) (SAME ID of unionprof_account is being used) */
 /* Table - (25) unionprof_sup ::: support_Id (15) */
 function id_unionprof_sup($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_unionprof_sup($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function unionprof_sup_id() {
   $num="UPSI";
   for($index=0;$index<11;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_unionprof_sup($num);
   if($output==='ID_ALREADY_EXIST') { unionprof_sup_id(); } 
   else { return $num; }
 }
 /* Table - (26) user_account ::: user_Id (15) */
 function id_user_account($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_user_account($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function user_account_id() {
   $num="USR";
   for($index=0;$index<13;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_user_account($num);
   if($output==='ID_ALREADY_EXIST') { user_account_id(); } 
   else { return $num; }
 }
 /* Table - (27) user_contact ::: contact_Id (25) */
 function id_user_contact($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_user_contact($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function user_contact_id() {
   $num="USRC";
   for($index=0;$index<12;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_user_contact($num);
   if($output==='ID_ALREADY_EXIST') { user_contact_id(); } 
   else { return $num; }
 }
 /* Table - (28) user_frnds ::: rel_Id (25) */
 function id_user_frnds($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_user_frnds($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function user_frnds_id() {
   $num="USRF";
   for($index=0;$index<12;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_user_frnds($num);
   if($output==='ID_ALREADY_EXIST') { user_frnds_id(); } 
   else { return $num; }
 }
 /* Table - (29) user_frnds_req ::: rel_Id (25) */
 function id_user_frnds_req($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_user_frnds_req($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function user_frnds_req_id() {
   $num="UFRI";
   for($index=0;$index<12;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_user_frnds_req($num);
   if($output==='ID_ALREADY_EXIST') { user_frnds_req_id(); } 
   else { return $num; }
 }
 /* Table - (30) user_info ::: user_Id (15) (SAME ID of user_account is being used) */
 /* Table - (31) user_message ::: message_Id (15) */
 function id_user_message($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_user_message($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function user_message_id() {
   $num="USMI";
   for($index=0;$index<12;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_user_message($num);
   if($output==='ID_ALREADY_EXIST') { user_message_id(); } 
   else { return $num; }
 }
 /* Table - (32) user_profile_geo ::: user_Id (15) (SAME ID of user_account is being used) */
 /* Table - (33) user_subscription ::: sub_Id (25) */
 function id_user_subscription($id) {
   $dataObj=new DataIdentity();
   $selectQuery=$dataObj->query_checkId_user_subscription($id);
   $idObj = new Identity();
   return $idObj->mlhbasic_tbl_PrimaryId_status($selectQuery);
 }
 function user_subscription_id() {
   $num="USRS";
   for($index=0;$index<22;$index++) { $num.=rand(1,9); }
   /* Check Exists or not, If not exist return */
   $checkObj=new Identity();
   $output=$checkObj->id_user_subscription($num);
   if($output==='ID_ALREADY_EXIST') { user_subscription_id(); } 
   else { return $num; }
 }
 
}

?>