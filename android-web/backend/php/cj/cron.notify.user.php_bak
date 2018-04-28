<?php 
session_start();
require_once '../../../templates/api/api_params.php';
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../lal/logic.appIdentity.php';

$projectURL=$_SESSION["PROJECT_URL"];
/* Global Variables */
/* cron_notify_user Table : Values to be recieved from cron_notify_user table */
$cron_user_cnotifyId=""; /* cron_notify_user : cnotify_Id */
$cron_user_notifyId=""; /* cron_notify_user : notify_Id */
$cron_user_notifyType=""; /* cron_notify_user : notifyType */
$cron_user_notifyTS=""; /* cron_notify_user : notify_ts */
/* Notify Table : Values to be Set in user_notify table */
$user_notify_notifyId="";  // user_notify: notify_Id
$user_notify_userIdList=[]; //  user_notify: user_Id
$user_notify_notifyHeader=""; //  user_notify: notifyHeader
$user_notify_notifyTitle=""; //  user_notify: notifyTitle
$user_notify_notifyMsg=""; //  user_notify: notifyMsg
$user_notify_notifyType=$cron_user_notifyType; //  user_notify: notifyType
$user_notify_notifyURL=""; //  user_notify: notifyURL
$user_notify_notifyts=$cron_user_notifyTS; //  user_notify: notify_ts
$user_notify_watched="N"; // user_notify: watched
$user_notify_popup="N"; // user_notify: popup
$user_notify_reqaccepted="N"; // user_notify: req_accepted
$user_notify_caleventstatus="OUT"; // user_notify: cal_event_status

/* Objects */
$dbObj=new Database();
$idObj=new identity();

/* Get First Row from the table cron_notify_user and set in Global Variables */
$cron_notify_squery="SELECT * FROM cron_notify_user ORDER BY notify_ts DESC  LIMIT 1";
$cron_notify_jsonData=$dbObj->getJSONData($cron_notify_squery);
$cron_notify_dejsonData=json_decode($cron_notify_jsonData);
if(count($cron_notify_dejsonData)>0){
  $cron_user_cnotifyId=$cron_notify_dejsonData[0]->{'cnotify_Id'};
  $cron_user_notifyId=$cron_notify_dejsonData[0]->{'notify_Id'};
  $cron_user_notifyType=$cron_notify_dejsonData[0]->{'notifyType'};
  $cron_user_notifyTS=$cron_notify_dejsonData[0]->{'notify_ts'};
}
/* Delete the Row that got the Data */
$cron_notify_dquery="DELETE FROM cron_notify_user WHERE cnotify_Id='".$cron_user_cnotifyId."'";
$dbObj->deleteData($cron_notify_dquery);

if($cron_user_notifyType=="UNION_NEWSFEED"){
/* Get Union Details and NewsFeed Details by NewsFeed info_Id */
 $notify_union_newsFeed="SELECT dash_info_union.info_Id, union_account.union_Id, union_account.unionName, ";
 $notify_union_newsFeed.="dash_info_union.artTitle, dash_info_union.artShrtDesc ";
 $notify_union_newsFeed.="FROM dash_info_union, union_account ";
 $notify_union_newsFeed.="WHERE dash_info_union.info_Id='".$cron_user_notifyId."' ";
 $notify_union_newsFeed.="AND dash_info_union.union_Id = union_account.union_Id;";
 $user_notify_jsonData=$dbObj->getJSONData($notify_union_newsFeed);
 $user_notify_dejsonData=json_decode($user_notify_jsonData);
 if(count($user_notify_dejsonData)>0){
  $notify_union_unionId=$user_notify_dejsonData[0]->{'union_Id'}; // union_Id
  $user_notify_notifyHeader=$user_notify_dejsonData[0]->{'unionName'}." posted in NewsFeed";
  $user_notify_notifyTitle=$user_notify_dejsonData[0]->{'artTitle'}; // artTitle
  $user_notify_notifyMsg=$user_notify_dejsonData[0]->{'artShrtDesc'}; // artShrtDesc
  $user_notify_notifyURL=$projectURL."news/union/".$user_notify_dejsonData[0]->{'info_Id'};
  /* Get Union Members List by union_Id */
  $notify_unionMem_squery="SELECT user_Id FROM union_mem WHERE union_Id='".$notify_union_unionId."'";
  $notify_unionMem_jsonData=$dbObj->getJSONData($notify_unionMem_squery);
  $notify_unionMem_dejsonData=json_decode($notify_unionMem_jsonData);
  if(count($notify_unionMem_dejsonData)>0){
   for($notify_unionMem_index=0;$notify_unionMem_index<count($notify_unionMem_dejsonData);$notify_unionMem_index++){
     $user_notify_userIdList[count($user_notify_userIdList)]=$notify_unionMem_dejsonData[$notify_unionMem_index]->{'user_Id'};
   }
  }
  /* Get Union Supporters List by union_Id */
  $notify_unionSup_squery="SELECT user_Id FROM union_sup WHERE union_Id='".$notify_union_unionId."'";
  $notify_unionSup_jsonData=$dbObj->getJSONData($notify_unionSup_squery);
  $notify_unionSup_dejsonData=json_decode($notify_unionSup_jsonData);
  if(count($notify_unionSup_dejsonData)>0){
   for($notify_unionSup_index=0;$notify_unionSup_index<count($notify_unionSup_dejsonData);$notify_unionSup_index++){
    /* Add User(Not Allowing Duplicate), if already added to $user_notify_userIdList array */
    $notify_unionSup_member=$notify_unionSup_dejsonData[$notify_unionSup_index]->{'user_Id'};
    $unionSup_user_recognizer=false;
    for($userId_index=0;$userId_index<count($user_notify_userIdList);$userId_index++){
      if($user_notify_userIdList[$userId_index]==$notify_unionSup_member) { $unionSup_user_recognizer=true; }
    }
    if(!$unionSup_user_recognizer){ $user_notify_userIdList[count($user_notify_userIdList)]=$notify_unionSup_member; }
   }
  }
 }
}
else if($cron_user_notifyType=="BUSINESS_NEWSFEED"){
/* Get Business Details and NewsFeed Details by NewsFeed info_Id */
 $notify_biz_newsFeed="SELECT dash_info_biz.info_Id, biz_account.biz_Id, biz_account.bizname, ";
 $notify_biz_newsFeed.="dash_info_biz.artTitle, dash_info_biz.artShrtDesc ";
 $notify_biz_newsFeed.="FROM dash_info_biz, biz_account ";
 $notify_biz_newsFeed.="WHERE dash_info_biz.info_Id='".$cron_user_notifyId."' ";
 $notify_biz_newsFeed.="AND dash_info_biz.biz_Id = biz_account.biz_Id;";
 $user_notify_jsonData=$dbObj->getJSONData($notify_biz_newsFeed);
 $user_notify_dejsonData=json_decode($user_notify_jsonData);
 if(count($user_notify_dejsonData)>0){
   $info_Id=$user_notify_dejsonData[0]->{'info_Id'}; // info_Id
   $biz_Id=$user_notify_dejsonData[0]->{'biz_Id'}; // biz_Id
   $user_notify_notifyHeader=$user_notify_dejsonData[0]->{'bizname'}." posted in NewsFeed";
   $user_notify_notifyTitle=$user_notify_dejsonData[0]->{'artTitle'}; // artTitle
   $user_notify_notifyMsg=$user_notify_dejsonData[0]->{'artShrtDesc'}; // artShrtDesc
   $user_notify_notifyURL=$projectURL."news/business/".$user_notify_dejsonData[0]->{'info_Id'};
   /* Get list of Subscribers */  
   $biz_subscribers_squery="SELECT user_Id FROM biz_subscribe WHERE biz_Id='".$biz_Id."';";
   $biz_subscribers_jsonData=$dbObj->getJSONData($biz_subscribers_squery);
   $biz_subscribers_dejsonData=json_decode($biz_subscribers_jsonData);
   if(count($biz_subscribers_dejsonData)>0){
     for($subscribeIndex=0;$subscribeIndex<count($biz_subscribers_dejsonData);$subscribeIndex++){
	   $user_notify_userIdList[count($user_notify_userIdList)]=$biz_subscribers_dejsonData[$subscribeIndex]->{'user_Id'};
	 }
   }
 }
}
else if($cron_user_notifyType=="MOVEMENT_PARTICIPATION_REQUEST"){
 $movement_squery="SELECT move_info.move_Id,move_info.union_Id, move_info.petitionTitle, move_info.issue_desc, ";
 $movement_squery.="union_account.unionName ";
 $movement_squery.="FROM move_info, union_account WHERE move_Id='".$cron_user_notifyId."' AND ";
 $movement_squery.=" move_info.union_Id=union_account.union_Id;";
 $movement_jsonData=$dbObj->getJSONData($movement_squery);
 $movement_dejsonData=json_decode($movement_jsonData);
 if(count($movement_dejsonData)>0){
   $union_Id=$movement_dejsonData[0]->{'union_Id'};
   $unionName=$movement_dejsonData[0]->{'unionName'};
   $user_notify_notifyHeader=$unionName." raised a Movement";
   $user_notify_notifyTitle=$movement_dejsonData[0]->{'petitionTitle'};
   $user_notify_notifyMsg=$movement_dejsonData[0]->{'issue_desc'};
   $user_notify_notifyURL=$projectURL."community/movement/".$movement_dejsonData[0]->{'move_Id'};
   /* Get Union Members List by union_Id */
   $notify_unionMem_squery="SELECT user_Id FROM union_mem WHERE union_Id='".$union_Id."'";
   $notify_unionMem_jsonData=$dbObj->getJSONData($notify_unionMem_squery);
   $notify_unionMem_dejsonData=json_decode($notify_unionMem_jsonData);
   if(count($notify_unionMem_dejsonData)>0){
    for($notify_unionMem_index=0;$notify_unionMem_index<count($notify_unionMem_dejsonData);$notify_unionMem_index++){
     $user_notify_userIdList[count($user_notify_userIdList)]=$notify_unionMem_dejsonData[$notify_unionMem_index]->{'user_Id'};
    }
   }
  /* Get Union Supporters List by union_Id */
  $notify_unionSup_squery="SELECT user_Id FROM union_sup WHERE union_Id='".$union_Id."'";
  $notify_unionSup_jsonData=$dbObj->getJSONData($notify_unionSup_squery);
  $notify_unionSup_dejsonData=json_decode($notify_unionSup_jsonData);
  if(count($notify_unionSup_dejsonData)>0){
   for($notify_unionSup_index=0;$notify_unionSup_index<count($notify_unionSup_dejsonData);$notify_unionSup_index++){
    /* Add User(Not Allowing Duplicate), if already added to $user_notify_userIdList array */
    $notify_unionSup_member=$notify_unionSup_dejsonData[$notify_unionSup_index]->{'user_Id'};
    $unionSup_user_recognizer=false;
    for($userId_index=0;$userId_index<count($user_notify_userIdList);$userId_index++){
      if($user_notify_userIdList[$userId_index]==$notify_unionSup_member) { $unionSup_user_recognizer=true; }
    }
    if(!$unionSup_user_recognizer){ $user_notify_userIdList[count($user_notify_userIdList)]=$notify_unionSup_member; }
   }
  }
 
 }
}
else if($cron_user_notifyType=="UNION_MESSAGE_RECEIVED"){
 $union_msg_squery="SELECT union_mem_chat.msg, union_account.union_Id, union_account.unionName, user_account.surName, ";
 $union_msg_squery.="user_account.name FROM union_mem_chat,union_account,user_account ";
 $union_msg_squery.="WHERE union_mem_chat.chat_Id='".$cron_user_notifyId."' AND union_account.union_Id=union_mem_chat.union_Id ";
 $union_msg_squery.="AND union_mem_chat.msg_by=user_account.user_Id;";
 $union_msg_jsonData=$dbObj->getJSONData($union_msg_squery);
 $union_msg_dejsonData=json_decode($union_msg_jsonData);
 if(count($union_msg_dejsonData)>0){
  $union_Id=$user_notify_dejsonData[0]->{'union_Id'};
  $user_notify_notifyHeader=$union_msg_dejsonData[0]->{'surName'}." ".$union_msg_dejsonData[0]->{'name'}." messaged in a Community";
  $user_notify_notifyTitle=$union_msg_dejsonData[0]->{'unionName'};
  $user_notify_notifyMsg=$union_msg_dejsonData[0]->{'msg'};
  $user_notify_notifyURL=$projectURL."community/message/".$union_Id;
  /* Get List of Memebers to Send Notifications */
  $union_mem_squery="SELECT user_Id FROM union_mem WHERE union_Id='".$union_Id."';";
  $union_mem_jsonData=$dbObj->getJSONData($union_mem_squery);
  $union_mem_dejsonData=json_decode($union_mem_jsonData);
  if(count($union_mem_dejsonData)>0){
    for($union_mem_index=0;$union_mem_index<count($union_mem_dejsonData);$union_mem_index++){
	  $user_notify_userIdList[count($user_notify_userIdList)]=$union_mem_dejsonData[$union_mem_index]->{'user_Id'};
	}
  }
 }
}
else if($cron_user_notifyType=="PERSONAL_MESSAGE_RECEIVED"){
   $user_msg_squery="SELECT user_message.from_Id, user_account.surName, user_account.name, ";
   $user_msg_squery.="user_message.to_Id, user_message.message FROM  user_message,user_account ";
   $user_msg_squery.="WHERE user_account.user_Id=user_message.from_Id AND user_message.message_Id='".$cron_user_notifyId."';";
   $user_msg_jsonData=$dbObj->getJSONData($user_msg_squery);
   $user_msg_dejsonData=json_decode($user_msg_jsonData);
   if(count($user_msg_dejsonData)>0){
	   $user_notify_userIdList[count($user_notify_userIdList)]=$user_msg_dejsonData[0]->{'from_Id'};
	   $user_notify_notifyHeader=$user_msg_dejsonData[0]->{'surName'}." ".$user_msg_dejsonData[0]->{'name'}." messaged you";
	   $user_notify_notifyMsg=$user_msg_dejsonData[0]->{'message'};
	   $user_notify_notifyURL=$projectURL."user/message/".$user_msg_dejsonData[0]->{'to_Id'};
   }
}
else if($cron_user_notifyType=="UNION_FROMMEMBER_REQUEST"){
/* UNION_FROMMEMBER_REQUEST : Request from the Union to the User, to be a member of the Union. */
$user_notify_notifyHeader="New Request Invitation from Community";
$union_req_squery="SELECT union_account.union_Id, union_account.unionName, union_account.unionURLName, ";
$union_req_squery.="user_account.surName, user_account.name, ";
$union_req_squery.="union_mem_req.req_from, union_mem_req.req_to  ";
$union_req_squery.="FROM union_mem_req, union_account, user_account ";
$union_req_squery.="WHERE union_mem_req.request_Id='".$cron_user_notifyId."' AND ";
$union_req_squery.="union_mem_req.union_Id=union_account.union_Id AND ";
$union_req_squery.="union_mem_req.req_from=user_account.user_Id; ";
$union_req_jsonData=$dbObj->getJSONData($union_req_squery);
$union_req_dejsonData=json_decode($union_req_jsonData);
if(count($union_req_dejsonData)>0){
  $user_notify_userIdList[count($user_notify_userIdList)]=$union_req_dejsonData[0]->{'req_to'};
  $user_notify_notifyMsg=$union_req_dejsonData[0]->{'surName'}." ".$union_req_dejsonData[0]->{'name'}." is requesting you to be a Member of ".$union_req_dejsonData[0]->{'unionName'};
  $user_notify_notifyURL=$projectURL."community/profile/".$union_req_dejsonData[0]->{'union_Id'};
}
}
else if($cron_user_notifyType=="USER_FROMFRIEND_REQUEST"){
/* USER_FROMFRIEND_REQUEST : Request from User-known-Person to the User,  to be the Friend */
$user_notify_notifyHeader="New Friend Request Invitation";
$user_req_squery="SELECT user_account.surName, user_account.name, user_frnds_req.from_userId, user_frnds_req.to_user_Id ";
$user_req_squery.="FROM user_frnds_req, user_account WHERE user_frnds_req.req_Id='".$cron_user_notifyId."' AND ";
$user_req_squery.="user_account.user_Id=user_frnds_req.from_userId;";
$user_req_jsonData=$dbObj->getJSONData($user_req_squery);
$user_req_dejsonData=json_decode($user_req_jsonData);
if(count($user_req_dejsonData)>0){
 $user_notify_userIdList[count($user_notify_userIdList)]=$user_req_dejsonData[0]->{'to_user_Id'};
 $user_notify_notifyMsg=$user_req_dejsonData[0]->{'surName'}." ".$user_req_dejsonData[0]->{'name'}." is requesting you to his/her friend.";
 $user_notify_notifyURL=$projectURL."user/profile/".$user_req_dejsonData[0]->{'from_userId'};
}
}
else if($cron_user_notifyType=="UNION_CALENDAR_EVENT_ALERT"){
$union_calndar_squery="SELECT union_calndar.sch_title, union_calndar.sch_desc, union_calndar.sch_ts, union_account.union_Id, ";
$union_calndar_squery.="union_account.unionName FROM union_calndar,union_account WHERE union_calndar.calendar_Id='".$cron_user_notifyId."' ";
$union_calndar_squery.="AND union_calndar.union_Id=union_account.union_Id;";
$union_calndar_jsonData=$dbObj->getJSONData($union_calndar_squery);
$union_calndar_dejsonData=json_decode($union_calndar_jsonData);
if(count($union_calndar_dejsonData)>0){
$user_notify_notifyHeader=$union_calndar_dejsonData[0]->{'unionName'}." planned an Event on ".$union_calndar_dejsonData[0]->{'sch_ts'};
$user_notify_notifyTitle=$union_calndar_dejsonData[0]->{'sch_title'};
$user_notify_notifyMsg=$union_calndar_dejsonData[0]->{'sch_desc'};
$notify_union_unionId=$union_calndar_dejsonData[0]->{'union_Id'};
$user_notify_notifyURL=$projectURL."community/calendar/".$union_calndar_dejsonData[0]->{'union_Id'};
/* Get Union Members List by union_Id */
  $notify_unionMem_squery="SELECT user_Id FROM union_mem WHERE union_Id='".$notify_union_unionId."'";
  $notify_unionMem_jsonData=$dbObj->getJSONData($notify_unionMem_squery);
  $notify_unionMem_dejsonData=json_decode($notify_unionMem_jsonData);
  if(count($notify_unionMem_dejsonData)>0){
   for($notify_unionMem_index=0;$notify_unionMem_index<count($notify_unionMem_dejsonData);$notify_unionMem_index++){
     $user_notify_userIdList[count($user_notify_userIdList)]=$notify_unionMem_dejsonData[$notify_unionMem_index]->{'user_Id'};
   }
  }
  /* Get Union Supporters List by union_Id */
  $notify_unionSup_squery="SELECT user_Id FROM union_sup WHERE union_Id='".$notify_union_unionId."'";
  $notify_unionSup_jsonData=$dbObj->getJSONData($notify_unionSup_squery);
  $notify_unionSup_dejsonData=json_decode($notify_unionSup_jsonData);
  if(count($notify_unionSup_dejsonData)>0){
   for($notify_unionSup_index=0;$notify_unionSup_index<count($notify_unionSup_dejsonData);$notify_unionSup_index++){
    /* Add User(Not Allowing Duplicate), if already added to $user_notify_userIdList array */
    $notify_unionSup_member=$notify_unionSup_dejsonData[$notify_unionSup_index]->{'user_Id'};
    $unionSup_user_recognizer=false;
    for($userId_index=0;$userId_index<count($user_notify_userIdList);$userId_index++){
      if($user_notify_userIdList[$userId_index]==$notify_unionSup_member) { $unionSup_user_recognizer=true; }
    }
    if(!$unionSup_user_recognizer){ $user_notify_userIdList[count($user_notify_userIdList)]=$notify_unionSup_member; }
   }
  }
}
 
}
else if($cron_user_notifyType=="STANDARD_HOOK_ALERT"){
/* Logic: 1) Get the row(Details: user_Id, hookTitle, hookdesc) from the table user_shook_info using shook_Id */
  $std_hook_squery="SELECT user_shook_info.user_Id, user_shook_info.hookTitle, user_shook_info.hookdesc, ";
  $std_hook_squery.="user_shook_info.pollquestion, user_account.surName, user_account.name FROM user_shook_info, user_account ";
  $std_hook_squery.="WHERE user_shook_info.shook_Id='".$cron_user_notifyId."' AND ";
  $std_hook_squery.="user_account.user_Id=user_shook_info.user_Id;";
  $std_hook_jsonData=$dbObj->getJSONData($std_hook_squery);
  $std_hook_dejsonData=json_decode($std_hook_jsonData);
  if(count($std_hook_dejsonData)>0){
	$user_notify_notifyHeader=$std_hook_dejsonData[0]->{'surName'}." ".$std_hook_dejsonData[0]->{'name'}." hooked you";
	$user_notify_notifyTitle=$std_hook_dejsonData[0]->{'hookTitle'};
	$user_notify_notifyMsg=$std_hook_dejsonData[0]->{'hookdesc'}."<br/>";
	if(strlen($std_hook_dejsonData[0]->{'pollquestion'})>0){ $user_notify_notifyMsg.='<span class="color:#ccc;">contains Question Poll</span>'; }
	$user_notify_notifyURL=$projectURL."standard/hook/".$cron_user_notifyId;
	/* Get list of Users tagged to be in Hook */
	$stdHook_frndList_squery="SELECT user_Id FROM user_shook_views WHERE shook_Id='".$cron_user_notifyId."';";
	$stdHook_frndList_jsonData=$dbObj->getJSONData($stdHook_frndList_squery);
    $stdHook_frndList_dejsonData=json_decode($stdHook_frndList_jsonData);
	if(count($stdHook_frndList_dejsonData)>0){
	  for($stdHookfrndListIndex=0;$stdHookfrndListIndex<count($stdHook_frndList_dejsonData);$stdHookfrndListIndex++){
	    $user_notify_userIdList[count($user_notify_userIdList)]=$stdHook_frndList_dejsonData[$stdHookfrndListIndex]->{'user_Id'};
	  }
	}
  }
}
else if($cron_user_notifyType=="PREMIUM_HOOK_ALERT"){
/* Logic: 1) Get the row(Details: user_Id, hookTitle, hookdesc) from the table user_phook_info using phook_Id */
  $prm_hook_squery="SELECT user_phook_info.user_Id, user_phook_info.hookTitle, user_phook_info.hookDesc, ";
  $prm_hook_squery.="user_phook_info.biz_union_Id, user_phook_info.idtype,";
  $prm_hook_squery.="user_phook_info.domain_Id, user_phook_info.subdomain_Id ";
  $prm_hook_squery.="user_phook_info.pollquestion, user_account.surName, user_account.name ";
  $prm_hook_squery.="FROM user_phook_info, user_account ";
  $prm_hook_squery.="WHERE user_phook_info.phook_Id='".$cron_user_notifyId."' AND ";
  $prm_hook_squery.="user_account.user_Id=user_phook_info.user_Id;";
  $prm_hook_jsonData=$dbObj->getJSONData($prm_hook_squery);
  $prm_hook_dejsonData=json_decode($prm_hook_jsonData);
  if(count($prm_hook_dejsonData)>0){
    /* Get Business Name or Community Name using idtype / biz_union_Id */
	
	 $prmhook_bizunionId=$prm_hook_dejsonData[$usrsubIndex]->{'biz_union_Id'};
	 $prmhook_idtype=$prm_hook_dejsonData[$usrsubIndex]->{'idtype'};
	 if($prmhook_idtype=='BUSINESS'){
	    $bizdata_squery="SELECT * FROM biz_account WHERE biz_Id='".$prmhook_bizunionId."';";
		$bizdata_jsonData=$dbObj->getJSONData($bizdata_squery);
        $bizdata_dejsonData=json_decode($bizdata_jsonData);
		if(count($bizdata_dejsonData)>0){
		 $user_notify_notifyHeader=$bizdata_dejsonData[0]->{'bizname'}." hooked you";
		}
	 }
	 else if($prmhook_idtype=='UNION'){
	    $uniondata_squery="SELECT * FROM union_account WHERE union_Id='".$prmhook_bizunionId."';";
		$uniondata_jsonData=$dbObj->getJSONData($uniondata_squery);
        $uniondata_dejsonData=json_decode($uniondata_jsonData);
		if(count($uniondata_dejsonData)>0){
		  $user_notify_notifyHeader=$bizdata_dejsonData[0]->{'unionName'}." hooked you";
		}
	 }
	 $user_notify_notifyTitle=$prm_hook_dejsonData[$usrsubIndex]->{'hookTitle'}; //  user_notify: notifyTitle
     $user_notify_notifyMsg=$prm_hook_dejsonData[$usrsubIndex]->{'hookdesc'};  //  user_notify: notifyMsg
	 $user_notify_notifyMsg.='<span class="color:#ccc;">contains Question Poll</span>';
	 $user_notify_notifyURL=$projectURL."premium/hook/".$cron_user_notifyId;
     /* Get List of Users Subscribed for respective SubDomain and add them to user_phook_views 
	  * and add them to 
	  */
	  $prmhook_domainId=$prm_hook_dejsonData[$usrsubIndex]->{'domain_Id'};
	  $prmhook_subdomainId=$prm_hook_dejsonData[$usrsubIndex]->{'subdomain_Id'};
	  $usr_sub_squery="SELECT user_Id FROM user_subscription WHERE domain_Id='".$prmhook_domainId."' ";
	  $usr_sub_squery.="AND subdomain_Id='".$prmhook_subdomainId."';";
	  $usr_sub_jsonData=$dbObj->getJSONData($usr_sub_squery);
      $usr_sub_dejsonData=json_decode($usr_sub_jsonData);
	  if(count($usr_sub_dejsonData)>0){
	    for($usrsubIndex=0;$usrsubIndex<count($usr_sub_dejsonData);$usrsubIndex++){
		  $usrsub_viewId=$idObj->user_shook_frnds_id();
		  $usrsub_userId=$usr_sub_dejsonData[$usrsubIndex]->{'user_Id'};
		  $user_notify_userIdList[count($user_notify_userIdList)]=$usrsub_userId; 
		  $phook_list_iquery="INSERT INTO user_phook_views(view_Id, user_Id, phook_Id, pollOpt01, pollOpt02, pollOpt03, pollOpt04,";
		  $phook_list_iquery.="pollOpt05, pollOpt06, pollOpt07, pollOpt08, pollOpt09, pollOpt10, pollOpt11, pollOpt12, pollOpt13, ";
		  $phook_list_iquery.="pollOpt14, pollOpt15, pollOpt16, pollOpt17, pollOpt18, pollOpt19, pollOpt20, pollOpt21, pollOpt22, ";
		  $phook_list_iquery.="pollOpt23,pollOpt24, pollOpt25) ";
		  $phook_list_iquery.="VALUES ('".$usrsub_viewId."','".$usrsub_userId."','".$cron_user_notifyId."',";
		  $phook_list_iquery.="'','','','','','','','','','','','','','','','','','','','','','','','','');";
		  $dbObj->addupdateData($phook_list_iquery);
		}
	  }
  }
}
/* Add to user_notify Table */
  for($usernotifyIndex=0;$usernotifyIndex<count($user_notify_userIdList);$usernotifyIndex++){
   $user_notify_notifyId=$idObj->cron_notify_user_id(); // 	user_notify: notify_Id (Dynamic Random Number)
   $user_notify_iquery="INSERT INTO user_notify(notify_Id, user_Id, notifyHeader, notifyTitle, notifyMsg, notifyType, ";
   $user_notify_iquery.="notifyURL, notify_ts,watched,popup,req_accepted,cal_event_status) ";
   $user_notify_iquery.="VALUES ('".$user_notify_notifyId."','".$user_notify_userIdList[$usernotifyIndex]."',";
   $user_notify_iquery.="'".$user_notify_notifyHeader."','".$user_notify_notifyTitle."','".$user_notify_notifyMsg."',";
   $user_notify_iquery.="'".$user_notify_notifyType."','".$user_notify_notifyURL."','".$cron_user_notifyTS."','";
   $user_notify_iquery.=$user_notify_watched."','".$user_notify_popup."','".$user_notify_reqaccepted."','".$user_notify_caleventstatus."');";
   $dbObj->addupdateData($user_notify_iquery);
  }
?>