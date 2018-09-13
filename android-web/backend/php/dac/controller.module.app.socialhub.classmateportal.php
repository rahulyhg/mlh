<?php
session_start();
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.module.app.socialhub.classmateportal.account.php';
require_once '../lal/logic.appIdentity.php';

$logger=Logger::getLogger("controller.module.app.socialhub.classmateportal.php");

if(isset($_GET["action"])){
  if($_GET["action"]==='CREATE_INSTITUTION'){
    if(isset($_GET["institutionName"]) && isset($_GET["institutionType"]) && isset($_GET["institutionBoard"]) &&
	isset($_GET["aboutinstitution"]) && isset($_GET["profile_pic"]) && isset($_GET["establishedOn"]) && 
	isset($_GET["foundedBy1"]) && isset($_GET["foundedBy2"]) && isset($_GET["foundedBy3"]) && 
	isset($_GET["foundedBy4"]) && isset($_GET["foundedBy5"]) && isset($_GET["web_url"])){
	$idObj = new Identity();
    $cmp_u_Id = $idObj->cmp_uni_account_id();
    $domain_Id="02-EDU";
    $subdomain_Id="EDU-01-STUDTCHR";
	$institutionName=$_GET["institutionName"];
	$institutionType=$_GET["institutionType"];
	$institutionBoard=$_GET["institutionBoard"];
	$aboutinstitution=$_GET["aboutinstitution"];
	$profile_pic=$_GET["profile_pic"];
	$establishedOn=$_GET["establishedOn"];
	$foundedBy1=$_GET["foundedBy1"];
	$foundedBy2=$_GET["foundedBy2"];
	$foundedBy3=$_GET["foundedBy3"];
	$foundedBy4=$_GET["foundedBy4"];
	$foundedBy5=$_GET["foundedBy5"];
    $web_url=$_GET["web_url"];
	$createdBy=$_GET["createdBy"];
    $classmatePortalAccount = new ClassmatePortalAccount();
	$query=$classmatePortalAccount->query_add_institutionAccount($cmp_u_Id, $domain_Id, $subdomain_Id, $institutionName, 
           $institutionType, $institutionBoard, $aboutinstitution, $profile_pic, $establishedOn, 
           $foundedBy1, $foundedBy2, $foundedBy3, $foundedBy4, $foundedBy5, $web_url, $createdBy);
    $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	echo $dbObj->addupdateData($query);
    } else { $content='Missing';
	   if(isset($_GET["institutionName"])){ $content.=' institutionName,'; }
	   if(isset($_GET["institutionType"])){ $content.=' institutionType,'; }
	   if(isset($_GET["institutionBoard"])){ $content.=' institutionBoard,'; }
	   if(isset($_GET["aboutinstitution"])){ $content.=' aboutinstitution,'; }
	   if(isset($_GET["profile_pic"])){ $content.=' profile_pic,'; }
	   if(isset($_GET["establishedOn"])){ $content.=' establishedOn,'; }
	   if(isset($_GET["foundedBy1"])){ $content.=' foundedBy1,'; }
	   if(isset($_GET["foundedBy2"])){ $content.=' foundedBy2,'; }
	   if(isset($_GET["foundedBy3"])){ $content.=' foundedBy3,'; } 
	   if(isset($_GET["foundedBy4"])){ $content.=' foundedBy4,'; }
	   if(isset($_GET["foundedBy5"])){ $content.=' foundedBy5,'; }
	   if(isset($_GET["web_url"])){  $content.=' web_url,'; }
	   $content=chop($content,',');
	   echo $content;
	}
  }
  else if($_GET["action"]==='GET_COUNT_INSTITUTIONS'){
    if(isset($_GET["institutionBoard"])){
	  $institutionBoard = $_GET["institutionBoard"];
      $classmatePortalAccount = new ClassmatePortalAccount();
	  $query=$classmatePortalAccount->query_count_getInstitutionList($institutionBoard);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  $dejsonData=json_decode($jsonData);
	  echo $dejsonData[0]->{'count(*)'};
	} else { echo 'MISSING_INSTITUTIONBOARD'; }
  }
  else if($_GET["action"]==='GET_DATA_INSTITUTIONS'){
    if(isset($_GET["institutionBoard"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	  $institutionBoard = $_GET["institutionBoard"];
	  $limit_start = $_GET["limit_start"];
	  $limit_end = $_GET["limit_end"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query=$classmatePortalAccount->query_data_getInstitutionList($institutionBoard,$limit_start,$limit_end);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else { echo 'MISSING_INSTITUTIONBOARD'; }
  }

}
else { echo 'MISSING_ACTION'; }
?>