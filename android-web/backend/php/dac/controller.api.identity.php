<?php
/* Utilities */
require_once '../lal/logic.appIdentity.php';

$idObj=new identity();

if(isset($_GET["action"])) {
	/* App related Identities */
	if($_GET["action"]=='ID_APP_INFO') { /* Table - app_and_info ::: info_Id */
	    echo $idObj->app_info_id();
	}
	else if($_GET["action"]=='ID_FTP_PATH') { /* Table - app_ftp_path ::: path_Id */
		echo $idObj->ftp_path_id();
	}
	else if($_GET["action"]=='ID_AREA_HISTORY') { /* Table - area_history ::: area_Id */
		echo $idObj->area_history_id();
	}
	else if($_GET["action"]=='ID_AREA_STAT') { /* Table - area_stat ::: area_Id */
		echo $idObj->area_stat_id();
	}
	else if($_GET["action"]=='ID_CRONJOB_USERNOTIFY') { /* Table - cron_notify_user  ::: cnotify_Id */
		echo $idObj->cron_notify_user_id();
	}
	/* Biz related Identities */
	else if($_GET["action"]=='ID_BIZ_ACCOUNT') { /* Table - biz_account ::: biz_Id */
		echo $idObj->biz_account_id();
	}
	else if($_GET["action"]=='ID_BIZ_PAY') {  /* Table - biz_pay_history ::: pay_Id */
        echo $idObj->biz_pay_id();
	}
	else if($_GET["action"]=='ID_BIZ_SUBSCRIBE') {  /* Table - biz_subscribe ::: subscribe_Id  */
        echo $idObj->biz_subscribe_id();
	}
	/* Dash related Identities */
	else if($_GET["action"]=='ID_DASH_INFO') {  /* Table - dash_info ::: info_Id */
		echo $idObj->dash_info_id();
	}
	else if($_GET["action"]=='ID_DASH_UNION_INFO') {  /* Table - dash_info ::: info_Id */ 
		echo $idObj->dash_info_union_id();
	}
	else if($_GET["action"]=='ID_DASH_RESPHISTORY') { /* Table - dash_resp_history ::: resph_Id */
		echo $idObj->dash_resphistory_id();
	}
	else if($_GET["action"]=='ID_DASH_VIEW') {  /* Table - dash_view ::: view_Id */
		echo $idObj->dash_view_id();
	}
	else if($_GET["action"]=='ID_DASH_VIEWSTAT') {  /* Table - dash_view_stat ::: viewstat_Id */
		echo $idObj->dash_viewstat_id();
	}
	else if($_GET["action"]=='ID_DASH_VOTE') {  /* Table - dash_vote ::: vote_Id */
		echo $idObj->dash_vote_id();
	}
	else if($_GET["action"]=='ID_DASH_MOVE') {  /* Table - dash_move ::: dmove_Id */
		echo $idObj->dash_move_id();
	}
	else if($_GET["action"]=='ID_DASH_VOTESTAT') { /* Table - dash_vote_stat ::: votestat_Id */
		echo $idObj->dash_votestat_id();
	}
	/* Dom related Identities */
	else if($_GET["action"]=='ID_ROLE_HISTORY') {  /* Table - dom_role_history ::: rhistory_Id */
		echo $idObj->role_history_id();
	}
    else if($_GET["action"]=='ID_ROLE_STAT') { /* Table - dom_role_stat ::: rstat_Id */
		echo $idObj->role_stat_id();
	}
	else if($_GET["action"]=='ID_DOM_STAT') { /* Table - dom_stat ::: dstat_Id */
		echo $idObj->dom_stat_id();
	}
	/* Movement related Identites */
	else if($_GET["action"]=='ID_MOVE_INFO') { /* Table - move_info ::: move_Id */
		echo $idObj->move_info_id();
	}
	else if($_GET["action"]=='ID_MOVE_SIGN') {  /* Table - move_sign ::: sign_Id */
		echo $idObj->move_sign_id();
	}
	else if($_GET["action"]=='ID_MOVE_STATDEEP') { /* Table - move_stat_deep ::: mstatdeep_Id */
		echo $idObj->move_statdeep_id();
	}
	else if($_GET["action"]=='ID_MOVE_STATTOP') {  /* Table - move_stat_top ::: mstattop_Id */
		echo $idObj->move_stattop_id();
	}
	/* Survey related Identities */
	else if($_GET["action"]=='ID_SRVY_INFO') { /* Table - srvy_info ::: srvy_Id */
		echo $idObj->srvy_info_id();
	}
	else if($_GET["action"]=='ID_SRVY_STAT') {  /* Table - srvy_info_stat ::: sstat_Id */
		echo $idObj->srvy_stat_id();
	}
	else if($_GET["action"]=='ID_SRVY_PAY') { /* Table - srvy_pay_history ::: srvy_pay_Id */
		echo $idObj->srvy_pay_id();
	}
	else if($_GET["action"]=='ID_SRVY_OPTUSERS') { /* Table - srvy_q_optusers ::: optInfo_Id */
		echo $idObj->srvy_optusers_id();
	}
	/* Union related Identites */
	else if($_GET["action"]=='ID_UNION_ACCOUNT') { /* Table - union_account ::: union_Id */
		echo $idObj->union_account_id();
	}
	else if($_GET["action"]=='ID_UNION_BRANCH') { /* Table - union_branch ::: branch_Id */
		echo $idObj->union_branch_id();
	}
	else if($_GET["action"]=='ID_UNION_CALNDR') { /* Table - union_calndar ::: calendar_Id */
	    echo $idObj->union_calndar_id();
	}
	else if($_GET["action"]=='ID_UNION_MEM') {  /* Table - union_mem ::: member_Id */
		echo $idObj->union_mem_id();
	}
	else if($_GET["action"]=='ID_UNION_MEMCHAT') { /* Table - union_mem_chat ::: chat_Id */
		echo $idObj->union_memchat_id();
	}
	else if($_GET["action"]=='ID_UNION_MEMREQ') { /* Table - union_mem_req :::  request_Id */
		echo $idObj->union_memreq_id();
	}
	else if($_GET["action"]=='ID_UNION_MEMSTAT') { /* Table - union_mem_stat ::: memstat_Id */
		echo $idObj->union_memstat_id();
	}
	else if($_GET["action"]=='ID_UNION_SUP') { /* Table - union_sup ::: support_Id */
		echo $idObj->union_sup_id();
	}
	else if($_GET["action"]=='ID_UNION_SUPSTAT') { /* Table - union_sup_stat ::: supstat_Id */
		echo $idObj->union_supstat_id();
	}
	/* User related Identities */
	else if($_GET["action"]=='ID_USER_ACCOUNT') { /* Table - user_account ::: user_Id */
		echo $idObj->user_account_id();
	}
	else if($_GET["action"]=='ID_DASH_INFO_USER_FAV') { /* Table - user_fav ::: fav_Id */
		echo $idObj->dash_info_user_fav_id();
	}
	else if($_GET["action"]=='ID_USER_FRNDS') { /* Table - user_frnds ::: rel_Id */
		echo $idObj->user_frnds_id();
	}
	else if($_GET["action"]=='ID_USER_FRNDS_REQ') { /* Table - user_frnds_req ::: req_Id */
		echo $idObj->user_frnds_req_id();
	}
	else if($_GET["action"]=='ID_USER_MESSAGE') { /* Table - user_message ::: message_Id */
		echo $idObj->user_message_id();
	}
	/* Marketing related Identities */
	else if($_GET["action"]=='ID_USER_MKTSTAT') { /* Table - user_mkt_stat ::: mktstat_Id */
		echo $idObj->user_mktstat_id();
	} 
	else if($_GET["action"]=='ID_USER_NOTIFY') { /* Table - user_notify ::: notify_Id */
		echo $idObj->user_notify_id();
	}
	else if($_GET["action"]=='ID_USER_PHOOK_INFO') { /* Table - user_phook_info ::: phook_Id */
	    echo $idObj->user_phook_info_id();
	}
	else if($_GET["action"]=='ID_USER_PHOOK_VIEWS') { /* Table - user_phook_views ::: view_Id */
	    echo $idObj->user_phook_views_id();
	}
    else if($_GET["action"]=='ID_USER_SHOOK_FRNDS') { /* Table - user_shook_frnds ::: frnds_Id */
	    echo $idObj->user_shook_frnds_id();
	}
    else if($_GET["action"]=='ID_USER_SHOOK_INFO') { /* Table - user_shook_info ::: shook_Id */
	    echo $idObj->user_shook_info_id();
	}
	else {
		echo 'INVALID_INPUT';
	}
	
}
else {
 echo 'MISSING_ACTION_INPUT';
}

?>