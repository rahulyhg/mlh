<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../lal/logic.appIdentity.php';

$CRON_SESSION_BINFOLDER="bin/";
$CRON_SESSION_FILE="cron.notification.filetracker.json";
$CRON_SERVICE_NOTIFYFOLDER="notify";
$existence=0;
if(file_exists($CRON_SESSION_FILE)==0){ $existence=1; }
if($existence==1){ $myfile=fopen($CRON_SESSION_FILE, "w+") or die("Unable to open file!");
 if(flock($myfile,LOCK_EX)) { fwrite($myfile, '{ "files":[] }'); } flock($fp, LOCK_UN);fclose($myfile);
}
$jsonData=file_get_contents($CRON_SESSION_FILE);
$dejsonData=json_decode($jsonData);
$exceptionFiles=$dejsonData->{'files'};
$FilesListInFolder=scandir($CRON_SERVICE_NOTIFYFOLDER);
$gen_pickupList=array_diff($FilesListInFolder, $exceptionFiles);
$pickFileList=array();$index=0;
foreach($gen_pickupList as $key => $value) { 
  $vr=0; if($value=='.' || $value=='..'){ $vr=1; } 
  if($vr==0){ $pickFileList[$index]=$value;$index++; } 
}
$pickupFile=$pickFileList[rand(0,count($pickFileList)-1)];
$pickupFileJsonData=file_get_contents('notify/'.$pickupFile);
$pickupFileDeJsonData=json_decode($pickupFileJsonData);
$userIdList=$pickupFileDeJsonData->{'user_Id'};

$idObj=new identity();
$query="";
for($index=0;$index<count($userIdList);$index++){
 $notify_Id=$idObj->user_notify_id();
 $user_Id=$userIdList[$index];
 $from_Id=$pickupFileDeJsonData->{'user_notify'}->{'from_Id'};
 $notifyHeader=$pickupFileDeJsonData->{'user_notify'}->{'notifyHeader'};
 $notifyTitle=$pickupFileDeJsonData->{'user_notify'}->{'notifyTitle'};
 $notifyMsg=$pickupFileDeJsonData->{'user_notify'}->{'notifyMsg'};
 $notifyType=$pickupFileDeJsonData->{'user_notify'}->{'notifyType'};
 $notifyURL=$pickupFileDeJsonData->{'user_notify'}->{'notifyURL'};
 $notify_ts=$pickupFileDeJsonData->{'user_notify'}->{'notify_ts'};
 $watched=$pickupFileDeJsonData->{'user_notify'}->{'watched'};
 $popup=$pickupFileDeJsonData->{'user_notify'}->{'popup'};
 $req_accepted=$pickupFileDeJsonData->{'user_notify'}->{'req_accepted'};
 $cal_event=$pickupFileDeJsonData->{'user_notify'}->{'cal_event'};
 
 $query.="INSERT INTO user_notify(notify_Id, user_Id, from_Id, notifyHeader, notifyTitle, notifyMsg, ";
 $query.="notifyType, notifyURL, notify_ts, watched, popup, req_accepted, cal_event) ";
 $query.="VALUES ('".$notify_Id."','".$user_Id."','".$from_Id."','".$notifyHeader."','".$notifyTitle."',";
 $query.="'".$notifyMsg."','".$notifyType."','".$notifyURL."','".$notify_ts."','".$watched."','".$popup."'";
 $query.=",'".$req_accepted."','".$cal_event."');";
}
$dbObj=new Database();
echo $dbObj->addupdateData($query);

/* Delete File */
unlink('notify/'.$pickupFile);
?>