<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../api/app.util.php';
require_once '../dal/data.api.identity.php';

class identity_check {
/* APP RELATED TABLES */
 /* Table - app_and_info ::: info_Id */
 function id_app_info($id) {
  $dataObj=new tbl_identity();
  $selectQuery=$dataObj->query_checkId_app_and_info($id);
  $dbObject=new Database(); 
  $jsonData=$dbObject->getJSONData($selectQuery);
  $dejsonData=json_decode($jsonData);
  if(count($dejsonData)>0) {  $output='ID_ALREADY_EXIST'; } 
  else { $output='ID_NOT_EXIST'; }
  return $output;
 }

 /* Table - app_ftp_path ::: path_Id */
 function id_ftp_path($id) {
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_app_ftp_path($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; } 
   return $output;
  }
  
 /* Table - area_history ::: area_Id */
 function id_area_history($id) {
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_area_history($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; } 
   return $output;
 }
 
 /* Table - area_stat ::: area_Id */
 function id_area_stat($id) { 
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_area_stat($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; } 
   return $output;
 }  

 /* BUSINESS RELATED TABLES */
 /* Table - biz_account ::: biz_Id */
 function id_biz_account($id) { 
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_biz_account($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
  return $output;
  }
  
 /* Table - biz_pay_history ::: pay_Id */
 function id_biz_pay($id) { 
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_biz_pay_history($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  } 

 /* Table - biz_subscribe ::: subscribe_Id */
 function id_biz_subscribe($id){
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_biz_subscribe($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
   return $output;
 }
 
/* CRONJOB RELATED TABLES */
 /* Table - cron_notify_user  ::: cnotify_Id */
 function id_cron_notify_user($id){
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_cron_notify_user($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
   return $output;
 }
 
 /* Table - dash_info_biz ::: info_Id */
 function id_dash_biz_info($id) {  
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_biz_info($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
  
  /* Table - dash_info_union ::: info_Id */
 function id_dash_union_info($id) {  
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_union_info($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
  
 /* Table - dash_info_user_fav ::: fav_Id */
 function id_dash_user_fav_info($id) {    
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_info_user_fav($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
 
 /* Table - dash_info_user_likes ::: like_Id */
 function id_dash_user_likes_info($id) {  
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_info_user_likes($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
 
 /* Table - dash_info_user_views  ::: view_Id */ 
 function id_dash_user_views_info($id) {  
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_info_user_views($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
    $dejsonData=json_decode($jsonData);
	if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
	else { $output='ID_NOT_EXIST'; }
   return $output;
  }
  
 /* Table - dash_info_user_votes ::: vote_Id */
 function id_dash_user_votes_info($id) {  
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_info_user_votes($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
  
 /* Table - dash_move ::: dmove_Id */
 function id_dash_move($id){
	$dataObj=new tbl_identity();
	$selectQuery=$dataObj->query_checkId_dash_move($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
	$dejsonData=json_decode($jsonData);
	if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
	else { $output='ID_NOT_EXIST'; }
    return $output;
 }
 
 /* Table - dash_resp_history ::: resph_Id */
 function id_dash_resphistory($id) {
	$dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_resp_history($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - dash_view ::: view_Id */
 function id_dash_view($id) {
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_view($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - dash_view_stat ::: viewstat_Id */
 function id_dash_viewstat($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_view_stat($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - dash_vote ::: vote_Id */
 function id_dash_vote($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_vote($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - dash_vote_stat ::: votestat_Id */
 function id_dash_votestat($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dash_vote_stat($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - dom_info ::: domain_Id */
 function id_dom($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dom_info($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - dom_role_info ::: domain_Id */
  function id_role_info($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dom_role_info($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - dom_role_history ::: rhistory_Id */
 function id_role_history($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dom_role_history($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - dom_role_stat ::: rstat_Id */
 function id_role_stat($id) { 
	$dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dom_role_stat($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - dom_stat ::: dstat_Id */
 function id_dom_stat($id) { 
	$dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_dom_stat($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
 
 /* Table - move_info ::: move_Id */
 function id_move_info($id) { 
    $dataObj=new tbl_identity();
    $selectQuery=$dataObj->query_checkId_move_info($id);
	$dbObject=new Database(); 
    $jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - move_sign ::: sign_Id */
 function id_move_sign($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_move_sign($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
 
 /* Table - move_stat_deep ::: mstatdeep_Id */
 function id_move_statdeep($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_move_stat_deep($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
 
 /* Table - move_stat_top ::: mstattop_Id */
 function id_move_stattop($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_move_stat_top($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
  
 /* Table - srvy_info ::: srvy_Id */
 function id_srvy_info($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_srvy_info($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
   return $output;
  }
  
 /* Table - srvy_info_stat ::: sstat_Id */
 function id_srvy_stat($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_srvy_info_stat($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
 
 /* Table - srvy_pay_history ::: srvy_pay_Id */
 function id_srvy_pay($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_srvy_pay_history($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - srvy_q_optusers ::: optInfo_Id */
 function id_srvy_optusers($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_srvy_q_optusers($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - unionprof_account ::: union_Id */
 function id_unionprof_account($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_unionprof_account($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - unionprof_branch ::: branch_Id */
 function id_unionprof_branch($id) { 
	$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_unionprof_branch($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
 
 /* Table - unionprof_calndar ::: calendar_Id */
 function id_unionprof_calndar($id) {
   $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_unionprof_calndar($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
 
 /* Table - unionprof_mem ::: member_Id */
 function id_unionprof_mem($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_unionprof_mem($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - unionprof_mem_chat ::: chat_Id */
 function id_unionprof_memchat($id) { 
	    $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_unionprof_mem_chat($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  /* Table - unionprof_mem_perm_branch ::: branch_permission_Id */
  function id_unionprof_mem_perm_branch($id){ 
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_perm_branch($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
	return $output;
  }
 
 /* Table - unionprof_mem_perm_union ::: union_permission_Id */
 function id_unionprof_mem_perm_union($id){
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_perm_union($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
	return $output;
 }
	  
 /* Table - unionprof_mem_req :::  request_Id */
 function id_unionprof_memreq($id) { 
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_req($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
	return $output;
  }
  
 /* Table - unionprof_mem_roles ::: role_Id */
 function id_unionprof_mem_roles($id) {
   $dataObj=new tbl_identity();
   $selectQuery=$dataObj->query_checkId_unionprof_mem_roles($id);
   $dbObject=new Database(); 
   $jsonData=$dbObject->getJSONData($selectQuery);
   $dejsonData=json_decode($jsonData);
   if(count($dejsonData)>0) { $output='ID_ALREADY_EXIST'; } 
   else { $output='ID_NOT_EXIST'; }
	return $output;
 }
  
 /* Table - unionprof_sup ::: support_Id */
 function id_unionprof_sup($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_unionprof_sup($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
    return $output;
  }
 
 /* Table - user_account ::: user_Id */
 function id_user_account($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_account($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }

 /* Table - user_fav ::: fav_Id */
 function id_dash_info_user_fav($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_dash_info_user_fav($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - user_frnds ::: rel_Id */
  function id_user_frnds($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_frnds($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - user_frnds_req ::: req_Id */
  function id_user_frnds_req($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_frnds_req($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - user_message ::: message_Id */
 function id_user_message($id){ 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_message($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
  
 /* Table - user_mkt_stat ::: mktstat_Id */
 function id_user_mktstat($id) { 
		$dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_mkt_stat($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
  }
 
 /* Table - user_notify ::: notify_Id */
 function id_user_notify($id) { 
    $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_notify($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
 
 /* Table - user_phook_info ::: phook_Id */
 function id_user_phook_info($id) {
   $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_phook_info($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
 
 /* Table - user_phook_views ::: view_Id */
 function id_user_phook_views($id) {
   $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_phook_views($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
 
 /* Table - user_shook_frnds ::: frnds_Id */
 function id_user_shook_frnds($id) {
   $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_shook_frnds($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
 
 /* Table - user_shook_info ::: shook_Id */
 function id_user_shook_info($id) {
   $dataObj=new tbl_identity();
		$selectQuery=$dataObj->query_checkId_user_shook_info($id);
		$dbObject=new Database(); 
		$jsonData=$dbObject->getJSONData($selectQuery);
		    $dejsonData=json_decode($jsonData);
		   if(count($dejsonData)>0) {
			 $output='ID_ALREADY_EXIST';
		   } else {
			 $output='ID_NOT_EXIST';
		   }
	return $output;
 }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class identity {
	/* APP RELATED TABLES */
	/* Table - app_and_info ::: info_Id */
    function app_info_id() { /* 5 */
        $num="AI";
        for($index=0;$index<3;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_app_info($num);
		if($output==='ID_ALREADY_EXIST') { app_info_id(); } 
		else { return $num; }   
    }
	
	/* Table - app_ftp_path ::: path_Id */
	function ftp_path_id() { /* 5 */
        $num="FI";
        for($index=0;$index<3;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_ftp_path($num);
		if($output==='ID_ALREADY_EXIST') { ftp_path_id(); } 
		else { return $num; }  
    }
	
	function area_history_id() { /* 25 */
		$num="AHI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_area_history($num);
		if($output==='ID_ALREADY_EXIST') { area_history_id(); } 
		else { return $num; }  
	}
	
	function area_stat_id() { /* 25 */
		$num="ASI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_area_stat($num);
		if($output==='ID_ALREADY_EXIST') { area_stat_id(); } 
		else { return $num; }  
	}
	
	/* BUSINESS RELATED TABLES */
	/* Table - biz_account ::: biz_Id */
	function biz_account_id() { /* 15 */
		$num="BIZ";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_biz_account($num);
		if($output==='ID_ALREADY_EXIST') { biz_account_id(); } 
		else { return $num; }  
	}
	
	/* Table - biz_pay_history ::: pay_Id */
	function biz_pay_id() { /* 25 */
		$num="BIZP";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_biz_pay($num);
		if($output==='ID_ALREADY_EXIST') { biz_pay_id(); } 
		else { return $num; }  
	}
	
	/* Table - biz_subscribe ::: subscribe_Id */
	function biz_subscribe_id(){  /* 15 */
	  $num="BSUB";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_biz_subscribe($num);
		if($output==='ID_ALREADY_EXIST') { biz_subscribe_id(); } 
		else { return $num; }  
	}
	
    /* CRONJOB RELATED TABLES */
    /* Table - cron_notify_user  ::: cnotify_Id */
	function cron_notify_user_id(){ /* 15 */
	  $num="CJUN";
      for($index=0;$index<11;$index++) { $num.=rand(1,9); }
	  /* Check Exists or not, If not exist return */
	  $checkObj=new identity_check();
	  $output=$checkObj->id_cron_notify_user($num);
	  if($output==='ID_ALREADY_EXIST') { cron_notify_user_id(); } 
	  else { return $num; }  
	}
	
	/* Table - dash_info ::: info_Id */
    function dash_info_id() { /* 25 */
        $num="DI";
        for($index=0;$index<23;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_info($num);
		if($output==='ID_ALREADY_EXIST') { dash_info_id(); } 
		else { return $num; }  
    }
	
	/* Table - dash_info_union ::: info_Id */
    function dash_info_union_id() { /* 25 */
        $num="DUI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_union_info($num);
		if($output==='ID_ALREADY_EXIST') { dash_info_union_id(); } 
		else { return $num; }  
    }

	/* Table - dash_info_user_fav ::: fav_Id */
    function dash_info_user_fav_id() { /* 15 */
        $num="DIUF";
        for($index=0;$index<11;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_user_fav_info($num);
		if($output==='ID_ALREADY_EXIST') { dash_info_user_fav_id(); } 
		else { return $num; }  
    }
	/* Table - dash_info_user_likes  ::: like_Id */
	function dash_info_user_likes_id(){ /* 15 */
	   $num="DIUL";
        for($index=0;$index<11;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_user_likes_info($num);
		if($output==='ID_ALREADY_EXIST') { dash_info_user_likes_id(); } 
		else { return $num; }  
	}
	/* Table - dash_info_user_views  ::: view_Id */
	function dash_info_user_views_id(){ /* 15 */
	    $num="DIVW";
        for($index=0;$index<11;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_user_views_info($num);
		if($output==='ID_ALREADY_EXIST') { dash_info_user_views_id(); } 
		else { return $num; }  
	}
	/* Table - dash_info_user_votes  ::: vote_Id */
	function dash_info_user_votes_id(){ /* 15 */
	    $num="DIVO";
        for($index=0;$index<11;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_user_votes_info($num);
		if($output==='ID_ALREADY_EXIST') { dash_info_user_votes_id(); } 
		else { return $num; }  
	}
	/* Table - dash_move ::: dmove_Id */
	function dash_move_id(){ /* 25 */
	  $num="DMI";
      for($index=0;$index<22;$index++) { $num.=rand(1,9); }
	  /* Check Exists or not, If not exist return */
	  $checkObj=new identity_check();
	  $output=$checkObj->id_dash_move($num);
	  if($output==='ID_ALREADY_EXIST') { dash_move_id(); } 
	  else { return $num; }  
	}
	/* Table - dash_resp_history ::: resph_Id */
	function dash_resphistory_id() {
		$num="DRHI";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_resphistory($num);
		if($output==='ID_ALREADY_EXIST') { dash_resphistory_id(); } 
		else { return $num; }  
	}
	
	/* Table - dash_view ::: view_Id */
	function dash_view_id() { /* 25 */
		$num="DVI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_view($num);
		if($output==='ID_ALREADY_EXIST') { dash_view_id(); } 
		else { return $num; }  
	}
	
	/* Table - dash_view_stat ::: viewstat_Id */
	function dash_viewstat_id() {  /* 25 */
		$num="DVSI";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_viewstat($num);
		if($output==='ID_ALREADY_EXIST') { dash_viewstat_id(); } 
		else { return $num; }  
	}
	
	/* Table - dash_vote ::: vote_Id */
	function dash_vote_id() { /* 25 */
		$num="DVOI";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_vote($num);
		if($output==='ID_ALREADY_EXIST') { dash_vote_id(); } 
		else { return $num; }  
	}
    
    /* Table - dash_vote_stat ::: votestat_Id */
	function dash_votestat_id() { /* 25 */
		$num="DVOSI";
        for($index=0;$index<20;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dash_votestat($num);
		if($output==='ID_ALREADY_EXIST') { dash_votestat_id(); } 
		else { return $num; }  
	}
	
	/* Table - dom_role_history ::: rhistory_Id */
	function role_history_id() { /* 15 */
		$num="RHI";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_role_history($num);
		if($output==='ID_ALREADY_EXIST') { role_history_id(); } 
		else { return $num; }  
	}
	
	/* Table - dom_role_stat ::: rstat_Id */
	function role_stat_id() { /* 25 */
		$num="DRSI";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_role_stat($num);
		if($output==='ID_ALREADY_EXIST') { dom_stat_id(); } 
		else { return $num; }  
	}
	  
	/* Table - dom_stat ::: dstat_Id */
	function dom_stat_id() { /* 25 */
		$num="DSI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_dom_stat($num);
		if($output==='ID_ALREADY_EXIST') { dom_stat_id(); } 
		else { return $num; }  
	}
	
	/* Table - move_info ::: move_Id */
	function move_info_id() { /* 8 */
		$num="MOV";
        for($index=0;$index<5;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_move_info($num);
		if($output==='ID_ALREADY_EXIST') { move_info_id(); } 
		else { return $num; }  
	}
	
	/* Table - move_sign ::: sign_Id */
	function move_sign_id() { /* 25 */
		$num="MSI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_move_sign($num);
		if($output==='ID_ALREADY_EXIST') { move_sign_id(); } 
		else { return $num; }  
	}
	
	/* Table - move_stat_deep ::: mstatdeep_Id */
	function move_statdeep_id() { /* 15 */
		$num="MSDI";
        for($index=0;$index<11;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_move_statdeep($num);
		if($output==='ID_ALREADY_EXIST') { move_statdeep_id(); } 
		else { return $num; }  
	}
	
	/* Table - move_stat_top ::: mstattop_Id */
	function move_stattop_id() { /* 15 */
		$num="MSTI";
        for($index=0;$index<11;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_move_stattop($num);
		if($output==='ID_ALREADY_EXIST') { move_stattop_id(); } 
		else { return $num; }  
	}
	
	/* Table - srvy_info ::: srvy_Id */
	function srvy_info_id() {  /* 25 */
		$num="SRVY";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_srvy_info($num);
		if($output==='ID_ALREADY_EXIST') { srvy_info_id(); } 
		else { return $num; }  
	}
	
	/* Table - srvy_info_stat ::: sstat_Id */
	function srvy_stat_id() {  /* 25 */
		$num="SSI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_srvy_stat($num);
		if($output==='ID_ALREADY_EXIST') { srvy_stat_id(); } 
		else { return $num; }  
	}
	
	/* Table - srvy_pay_history ::: srvy_pay_Id */
	function srvy_pay_id() { /* 25 */
		$num="SPI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_srvy_pay($num);
		if($output==='ID_ALREADY_EXIST') { srvy_pay_id(); } 
		else { return $num; }  
	}
	
	/* Table - srvy_q_optusers ::: optInfo_Id */
	function srvy_optusers_id() { /* 25 */
		$num="SOI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_srvy_optusers($num);
		if($output==='ID_ALREADY_EXIST') { srvy_optusers_id(); } 
		else { return $num; }  
	}
	
	/* Table - unionprof_account ::: union_Id */
	function unionprof_account_id() { /* 15 */
		$num="UPA";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_account($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_account_id(); } 
		else { return $num; }  
	}
	
	/* Table - unionprof_branch ::: branch_Id */
	function unionprof_branch_id() { /* 25 */
		$num="UB";
		for($index=0;$index<23;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_branch($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_branch_id(); } 
		else { return $num; }  
	}
	
	/* Table - unionprof_calndar ::: calendar_Id */
	function unionprof_calndar_id(){ /* 25 */
	   $num="UCAL";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
        return $num;
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_calndar($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_calndar_id(); } 
		else { return $num; }  
	}
	
	/* Table - unionprof_mem ::: member_Id */
	function unionprof_mem_id() { /* 15 */
		$num="UMI";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_mem($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_mem_id(); } 
		else { return $num; } 
	}
	
	/* Table - unionprof_mem_chat ::: chat_Id */
	function unionprof_memchat_id() { /* 25 */
		$num="UCI";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_memchat($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_memchat_id(); } 
		else { return $num; } 

	}
	/* Table - unionprof_mem_perm_branch ::: branch_permission_Id */
	function unionprof_mem_perm_branch_id(){ /* 25 */
	   $num="PUP";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_mem_perm_branch($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_mem_perm_branch_id(); } 
		else { return $num; } 
	}
	
	/* Table - unionprof_mem_perm_union ::: union_permission_Id */
	function unionprof_mem_perm_union_id(){ /* 25 */  
	    $num="PUP";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_mem_perm_union($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_mem_perm_union_id(); } 
		else { return $num; } 
	}
	
	/* Table - unionprof_mem_req :::  request_Id */
	function unionprof_memreq_id() { /* 15 */
		$num="URI";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_memreq($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_memreq_id(); } 
		else { return $num; } 
	}
	
	/* Table - unionprof_mem_roles ::: role_Id */
	function unionprof_mem_roles_id(){ /* 25 */
	  $num="PUR";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_mem_roles($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_mem_roles_id(); } 
		else { return $num; } 
	}
	
	/* Table - unionprof_sup ::: support_Id */
	function unionprof_sup_id(){ /* 15 */
		$num="USP";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_unionprof_sup($num);
		if($output==='ID_ALREADY_EXIST') { unionprof_sup_id(); } 
		else { return $num; } 
	}
	
	/* Table - user_account ::: user_Id */
	function user_account_id() {  /* 15 */
		$num="USR";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_user_account($num);
		if($output==='ID_ALREADY_EXIST') { user_account_id(); } 
		else { return $num; }  
	}
	
	/* Table - user_frnds ::: rel_Id */
	 function user_frnds_id() { /* 25 */
        $num="FREL";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_user_frnds($num);
		if($output==='ID_ALREADY_EXIST') { user_frnds_id(); } 
		else { return $num; }  
    }
	
    /* Table - user_frnds_req ::: req_Id */
	function user_frnds_req_id() { /* 25 */
        $num="FREQ";
        for($index=0;$index<21;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_user_frnds_req($num);
		if($output==='ID_ALREADY_EXIST') { user_frnds_req_id(); } 
		else { return $num; }  
    }
	
	/* Table - user_message ::: message_Id */
	function user_message_id() { /* 15 */
		$num="UMS";
        for($index=0;$index<12;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_user_message($num);
		if($output==='ID_ALREADY_EXIST') { user_message_id(); } 
		else { return $num; }  
	}
	
	/* Table - user_mkt_stat ::: mktstat_Id */
	function user_mktstat_id() { /* 25 */
		$num="UMK";
        for($index=0;$index<22;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_user_mktstat($num);
		if($output==='ID_ALREADY_EXIST') { user_mktstat_id(); } 
		else { return $num; }  
	}
	
	/* Table - user_notify ::: notify_Id */
    function user_notify_id() {  /*35 */
        $num="UNOT";
        for($index=0;$index<31;$index++) {
            $num.=rand(1,9);
        }
		/* Check Exists or not, If not exist return */
		$checkObj=new identity_check();
		$output=$checkObj->id_user_notify($num);
		if($output==='ID_ALREADY_EXIST') { user_notify_id(); } 
		else { return $num; }  
    }
	
	/* Table - user_phook_info ::: phook_Id */
    function user_phook_info_id(){ /* 25 */
	  $num="UPHI";
		for($index=0;$index<21;$index++) {
		 $num.=rand(1,9);
		}
		return $num;
		/* Check Exists or not, If not exist return */
		  $checkObj=new identity_check();
		  $output=$checkObj->id_user_phook_info($num);
		  if($output==='ID_ALREADY_EXIST') { user_phook_info_id(); } 
		  else { return $num; }
	}
	
    /* Table - user_phook_views ::: view_Id */
    function user_phook_views_id(){ /* 35 */
	   $num="UPVI";
		for($index=0;$index<31;$index++) {
		 $num.=rand(1,9);
		}
		return $num;
		/* Check Exists or not, If not exist return */
		  $checkObj=new identity_check();
		  $output=$checkObj->id_user_phook_views($num);
		  if($output==='ID_ALREADY_EXIST') { user_phook_views_id(); } 
		  else { return $num; }
	}
	
    /* Table - user_shook_frnds ::: frnds_Id */
	function user_shook_frnds_id(){ /* 35 */
	  $num="USFI";
		for($index=0;$index<31;$index++) {
		 $num.=rand(1,9);
		}
		return $num;
		/* Check Exists or not, If not exist return */
		  $checkObj=new identity_check();
		  $output=$checkObj->id_user_shook_frnds($num);
		  if($output==='ID_ALREADY_EXIST') { user_shook_frnds_id(); } 
		  else { return $num; }
	}
	
    /* Table - user_shook_info ::: shook_Id */
	function user_shook_info_id() { /* 25 */
	  $num="USII";
		for($index=0;$index<21;$index++) {
		 $num.=rand(1,9);
		}
		return $num;
		/* Check Exists or not, If not exist return */
		  $checkObj=new identity_check();
		  $output=$checkObj->id_user_shook_info($num);
		  if($output==='ID_ALREADY_EXIST') { user_shook_info_id(); } 
		  else { return $num; }
	}
}

?>