<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.socialHub.classmateportal.batch.chat.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.user.authentication.php");

if(isset($_GET["action"])){
 if($_GET["action"]=='CLASSMATEBATCH_CHAT_LATEST20'){
   if(isset($_GET["batch_Id"])){
     $batch_Id=$_GET["batch_Id"];
     $classmateBatchChat = new ClassmateBatchChat();
     $query = $classmateBatchChat->query_data_getLatestTwentyMsgs($batch_Id);
     $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
     echo $database->getJSONData($query);
   } else { echo 'MISSING_BATCH_ID'; }
 }
 else if($_GET["action"]=='CLASSMATEBATCH_CHAT_ALL'){
   if(isset($_GET["batch_Id"])){
     $batch_Id=$_GET["batch_Id"];
     $classmateBatchChat = new ClassmateBatchChat();
     $query = $classmateBatchChat->query_data_getAllMsgs($batch_Id);
     $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
     echo $database->getJSONData($query);
   } else { echo 'MISSING_BATCH_ID'; }
 }
 else if($_GET["action"]=='CLASSMATEBATCH_CHAT_NEWMESSAGE'){
   if(isset($_GET["chat_Id"]) && isset($_GET["batch_Id"]) && isset($_GET["user_Id"]) && isset($_GET["sent_On"]) && isset($_GET["msg"]) && 
      isset($_GET["reply_reference"])){
     $chat_Id = $_GET["chat_Id"];
     $batch_Id = $_GET["batch_Id"];
	 $msg_by = $_GET["user_Id"];
	 $sent_On = $_GET["sent_On"];
	 $msg = $_GET["msg"];
	 $reply_reference = $_GET["reply_reference"];
	 $classmateBatchChat = new ClassmateBatchChat();
	 $query = $classmateBatchChat->query_add_newMessage($chat_Id, $batch_Id, $msg_by, $sent_On, $msg, $reply_reference);
	 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
     echo $database->addupdateData($query);
   } else {  $content='Missing'; 
       if(!isset($_GET["batch_Id"])){ $content=' batch_Id,'; }
	   if(!isset($_GET["user_Id"])){ $content=' user_Id,'; }
	   if(!isset($_GET["sent_On"])){ $content=' sent_On,'; }
	   if(!isset($_GET["msg"])){ $content=' msg,'; } 
       if(!isset($_GET["reply_reference"])){ $content=' reply_reference,'; }
	   $content=chop($content,',');
	   echo $content;
   }
 }
 else if($_GET["action"]=='CLASSMATEBATCH_CHAT_LATEST'){
   if(isset($_GET["batch_Id"]) && isset($_GET["afterTS"])){
     $batch_Id = $_GET["batch_Id"];
	 $afterTS = $_GET["afterTS"];
     $classmateBatchChat = new ClassmateBatchChat();
     $query = $classmateBatchChat->query_data_getLatestMsgs($batch_Id,$afterTS);
	 $logger->info($query);
     $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
     echo $database->getJSONData($query);
   } else { echo 'MISSING_BATCH_ID'; }
 }
 else { echo 'NO_ACTION'; }
} else { echo 'MISSING_ACTION'; }
?>