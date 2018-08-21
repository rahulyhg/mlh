<?php 
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.community.movement.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.community.movement.php");

if(isset($_GET["action"])){
  if($_GET["action"]==='GETCOUNT_USERPARTICIPATEDMOVEMENTS'){
    if(isset($_GET["user_Id"])){
	  $user_Id=$_GET["user_Id"];
	  $moveObj=new Movement();
	  $query=$moveObj->query_count_getUserParticipatedMovements($user_Id);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  $deJsonData=json_decode($jsonData);
	  echo $deJsonData[0]->{'count(*)'};
	}
	else { echo 'MISSING_USER_ID'; }
  }
  else if($_GET["action"]==='GETDATA_USERPARTICIPATEDMOVEMENTS'){
    if(isset($_GET["user_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	  $user_Id=$_GET["user_Id"];
	  $limit_start=$_GET["limit_start"];
	  $limit_end=$_GET["limit_end"];
	  $moveObj=new Movement();
	  $query=$moveObj->query_data_getUserParticipatedMovements($user_Id,$limit_start,$limit_end);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  echo $jsonData;
	}
	else { echo 'MISSING_USER_ID'; }
  }
  else { echo 'NO_ACTION'; }
}
else { echo 'MISSING_ACTION'; }
?>
