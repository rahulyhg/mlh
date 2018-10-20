<?php
include_once '../lal/logic.module.app.community.php';
class cron_notification {
  function generate_N_jsonData($userIds){
    $content='{"user_Id":'.json_encode($userIds).',';
    $content.='"user_notify":{ "from_Id":"", "notifyHeader":"", "notifyTitle":"", "notifyMsg":"", ';
    $content.='"notifyType":"", "notifyURL":"", "notify_ts":"", "watched":"", "popup":"", ';
    $content.='"req_accepted":"", "cal_event":"" }, ';
    $content.='"dash_info_union":{ "union_Id":"", "artTitle":"", "artShrtDesc":"","artDesc":"", "images":"", "status":"" }';
    $content.='}';
    $myfile = fopen("notify/N_".date("YmdHis").".json", "w") or die("Unable to open file!");
    fwrite($myfile, $content);
    fclose($myfile);
  }
  
  function generate_N_unionNewsFeed($union_Id,$from_Id,$notifyURL,$notify_ts){
	/* FUNCTION DESCRIPTION: This is called When a NewsFeed is created in the Community. This function
	 *                       creates Notification to the Members and Supporters of the Community.
 	 */
	$authObj=new logic_user_authentication();
	$feedObj=new logic_union_newsfeed();
    $fromUserName=$authObj->getUserNameByUserId($from_Id);
    $unionName=$feedObj->getUnionNameByUnionId($union_Id);
    $notifyHeader=$fromUserName." posted NewsFeed in ".$unionName;
    $content='{ "user_Id":'.json_encode($feedObj->union_people_list($union_Id)).',';
    $content.=' "user_notify":{ "from_Id":"'.$from_Id.'",';
	$content.=' "notifyHeader":"'.$notifyHeader.'", "notifyTitle":"'.$notifyTitle.'", "notifyMsg":"'.$notifyMsg.'",';
    $content.=' "notifyType":"UNION_NEWSFEED_CREATED", "notifyURL":"'.$notifyURL.'", "notify_ts":"'.$notify_ts.'",';
	$content.=' "watched":"N", "popup":"N", "req_accepted":"N", "cal_event":"N" } }';
    $myfile = fopen("notify/N_".date("YmdHis").".json", "w") or die("Unable to open file!");
    fwrite($myfile, $content);
    fclose($myfile);
  }
}

?>