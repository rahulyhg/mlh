<?php
$CRON_SESSION_BINFOLDER="bin/";
$CRON_SESSION_FILE="cron.notification.service.filetracker.json";
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
foreach($gen_pickupList as $key => $value) { $vr=0; if($value=='.' || $value=='..'){ $vr=1; } 
 if($vr==0){ $pickFileList[$index]=$value;$index++; } }
$pickupFile=$pickFileList[rand(0,count($pickFileList)-1)];
echo date("Y-m-d H:i:s").": ".$pickupFile."\n";

//
/*
function cronJob_Session(){
$sessionJSON='';
$start = time();
echo "Started At ".$start."\n";
$filename = "C:\\wamp\\www\\mlh\\android-web\\backend\\php\\cj\\notifyFolder\\jsonFile.json";
$fp = fopen($filename, 'w+') or die("have no access to ".$filename);

if (flock($fp, LOCK_EX)) {
 echo "File was locked at ".time().". Granted exclusive access to write \n";
}
else {
    echo "File is locked by other user \n";
	cronJob_Session();
	sleep(3);
}
flock($fp, LOCK_UN);
echo "File lock was released at ".time()." \n";
fclose($fp);
$end = time();
echo "Finished at ".$end." \n";
echo "Proccessing time ".($end - $start)." \n";
return $sessionJSON;
} */
?>