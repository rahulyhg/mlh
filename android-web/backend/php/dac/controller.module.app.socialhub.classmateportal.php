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
  else if($_GET["action"]==='GET_DATA_INSTITUTIONBYID'){
    if($_GET["institutionId"]){
	  $institutionId = $_GET["institutionId"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query=$classmatePortalAccount->query_data_getInstitutionDataById($institutionId);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else {  echo 'MISSING_INSTITUTIONID'; }
  }
  else if($_GET["action"]==='GET_DATA_INSTITUTIONNAMEBYID'){
    if($_GET["institutionId"]){
	  $institutionId = $_GET["institutionId"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query=$classmatePortalAccount->query_data_getInstitutionNameById($institutionId);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else {  echo 'MISSING_INSTITUTIONID'; }
  }
  else if($_GET["action"]==='GET_DATA_INSTITUTIONBOARDBYID'){
    if($_GET["institutionId"]){
	  $institutionId = $_GET["institutionId"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query=$classmatePortalAccount->query_data_getInstitutionBoardById($institutionId);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData = $dbObj->getJSONData($query);
	  $dejsonData = json_decode($jsonData);
	  echo $dejsonData[0]->{'institutionBoard'};
	} else {  echo 'MISSING_INSTITUTIONID'; }
  }
  else if($_GET["action"]==='CREATE_INSTITUTE'){
   if(isset($_GET["instituteName"]) && isset($_GET["instituteType"]) && isset($_GET["cmp_u_Id"]) &&
    isset($_GET["profile_pic"]) && isset($_GET["establishedOn"]) && isset($_GET["aboutInstitute"]) &&
	isset($_GET["foundedBy1"]) && isset($_GET["foundedBy2"]) && isset($_GET["foundedBy3"]) &&
	isset($_GET["foundedBy4"]) && isset($_GET["foundedBy5"]) && isset($_GET["web_url"]) && 
	isset($_GET["createdBy"])){
    $idObj = new Identity();
    $cmp_sch_Id = $idObj->cmp_sch_account_id();
	$instituteName=$_GET["instituteName"];
	$instituteType=$_GET["instituteType"];
	$cmp_u_Id=$_GET["cmp_u_Id"];
	$profile_pic=$_GET["profile_pic"];
	$establishedOn=$_GET["establishedOn"]; 
    $aboutInstitute=$_GET["aboutInstitute"];
    $foundedBy1=$_GET["foundedBy1"];
    $foundedBy2=$_GET["foundedBy2"];
    $foundedBy3=$_GET["foundedBy3"];
    $foundedBy4=$_GET["foundedBy4"];
    $foundedBy5=$_GET["foundedBy5"];
    $web_url=$_GET["web_url"];
    $createdBy=$_GET["createdBy"];
	$classmatePortalAccount = new ClassmatePortalAccount();
	$query=$classmatePortalAccount->query_add_instituteAccount($cmp_sch_Id, $instituteName, $instituteType, 
	   $cmp_u_Id, $profile_pic, $establishedOn,  $aboutInstitute, $foundedBy1, $foundedBy2, $foundedBy3, 
	   $foundedBy4, $foundedBy5, $web_url, $createdBy);
	$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	echo $dbObj->addupdateData($query);
	} else {  $content='Missing';
	   if(!isset($_GET["instituteName"])){ $content.=' instituteName,'; }
	   if(!isset($_GET["instituteType"])){ $content.=' instituteType,'; }
	   if(!isset($_GET["cmp_u_Id"])){ $content.=' cmp_u_Id,'; }
       if(!isset($_GET["profile_pic"])){ $content.=' profile_pic,'; }
	   if(!isset($_GET["establishedOn"])){ $content.=' establishedOn,'; }
	   if(!isset($_GET["aboutInstitute"])){ $content.=' aboutInstitute,'; }
	   if(!isset($_GET["foundedBy1"])){ $content.=' foundedBy1,'; }
	   if(!isset($_GET["foundedBy2"])){ $content.=' foundedBy2,'; }
	   if(!isset($_GET["foundedBy3"])){ $content.=' foundedBy3,'; }
	   if(!isset($_GET["foundedBy4"])){ $content.=' foundedBy4,'; }
	   if(!isset($_GET["foundedBy5"])){ $content.=' foundedBy5,'; } 
	   if(!isset($_GET["web_url"])){ $content.=' web_url,'; }
	   if(!isset($_GET["createdBy"])){ $content.=' createdBy,'; }
	   $content=chop($content,',');
	   echo $content;
	}
  }
  else if($_GET["action"]==='GET_COUNT_INSTITUTES'){
    if(isset($_GET["institutionId"])){
	  $institutionId = $_GET["institutionId"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query=$classmatePortalAccount->query_count_getInstituteList($institutionId);;
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  $jsonData=$dbObj->getJSONData($query);
	  $dejsonData=json_decode($jsonData);
	  echo $dejsonData[0]->{'count(*)'};
	} else {  echo 'MISSING_INSTITUTIONID'; }
    
  }
  else if($_GET["action"]==='GET_DATA_INSTITUTES'){
    if(isset($_GET["institutionId"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	  $cmp_u_Id = $_GET["institutionId"];
	  $limit_start = $_GET["limit_start"];
	  $limit_end = $_GET["limit_end"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query = $classmatePortalAccount->query_data_getSimpleInstituteList($cmp_u_Id,$limit_start,$limit_end);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else { echo 'MISSING_INSTITUTIONID'; }
  }
  else if($_GET["action"]==='GET_DATA_INSTITUTEBYID'){ 
    if($_GET["institute_Id"]){
      $institute_Id = $_GET["institute_Id"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query = $classmatePortalAccount->query_data_getInstituteDataById($institute_Id);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else { echo 'MISSING_INSTITUTE_ID'; }
  }
  else if($_GET["action"]==='CREATE_COURSE'){
    if(isset($_GET["course_Id"]) && isset($_GET["courseName"]) && isset($_GET["institution_Id"]) &&
	  isset($_GET["institutionType"]) && isset($_GET["duration"]) &&
	 isset($_GET["begMonth"]) && isset($_GET["endMonth"]) ){
	  $identity = new Identity();
	  $cmp_course_Id = $_GET["course_Id"];
	  $cmp_map_Id = $identity ->cmp_uni_coursemap_id();
	  $courseName = $_GET["courseName"];
	  $duration = $_GET["duration"];
	  $begMonth = $_GET["begMonth"];
	  $endMonth = $_GET["endMonth"];
	  $cmp_u_Id = $_GET["institution_Id"];
	  $institutionType = $_GET["institutionType"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $updateCoursesList = false;
	  if($identity->id_cmp_uni_courses($cmp_course_Id)=='ID_ALREADY_EXIST'){ $updateCoursesList = true; }
	  $query1  = '';
	  if(!$updateCoursesList){
	  $query1 = $classmatePortalAccount->query_add_institutionCourses($cmp_course_Id, $courseName, $duration, 
				 $begMonth, $endMonth, $institutionType);
	  }
	  $query2 = $classmatePortalAccount->query_add_institutionCourseMap($cmp_map_Id, $cmp_u_Id, $cmp_course_Id);
	  $query=$query1.$query2;
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->addupdateData($query);
	} else { $content='Missing';
	   if(isset($_GET["course_Id"])){ $content.=' course_Id,'; }
	   if(isset($_GET["courseName"])){ $content.=' courseName,'; }
	   if(isset($_GET["duration"])){ $content.=' duration,'; }
	   if(isset($_GET["duration"])){ $content.=' begMonth,'; }
	   if(isset($_GET["duration"])){ $content.=' endMonth,'; }
	   if(isset($_GET["institution_Id"])){ $content.=' institution_Id,'; }
	   $content=chop($content,',');
	   echo $content;
	}
  }
  else if($_GET["action"]==='GET_AUTOCOMPLETE_COURSES'){ 
    if(isset($_GET["searchQuery"])){
	  $searchQuery=$_GET["searchQuery"];
	  $classmatePortalAccount = new ClassmatePortalAccount();
	  $query = $classmatePortalAccount->query_autocomplete_courses($searchQuery);
	  $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $dbObj->getJSONData($query);
	} else { echo 'MISSING_SEARCHQUERY'; }
   
  }
  else if($_GET["action"]==='GET_COUNT_COURSES'){ 
   if(isset($_GET["institution_Id"])){
    $institution_Id = $_GET["institution_Id"];
    $classmatePortalAccount = new ClassmatePortalAccount();
    $query = $classmatePortalAccount->query_count_institutionCourses($institution_Id);
	$dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	$jsonData = $dbObj->getJSONData($query);
	$dejsonData = json_decode($jsonData);
	echo $dejsonData[0]->{'count(cmp_uni_courses.cmp_course_Id)'};
   }
  }
  else if($_GET["action"]==='GET_DATA_COURSES'){ 
    if(isset($_GET["institution_Id"]) && isset($_GET["limit_start"]) && isset($_GET["limit_end"])){
	    $institution_Id = $_GET["institution_Id"];
	    $limit_start = $_GET["limit_start"];
	    $limit_end = $_GET["limit_end"];
	    $classmatePortalAccount = new ClassmatePortalAccount();
        $query = $classmatePortalAccount->query_data_institutionCourses($institution_Id,$limit_start,$limit_end);
        $dbObj=new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	    echo $dbObj->getJSONData($query);
	} else { 
	   $content='Missing ';
	   if(!isset($_GET["limit_start"])){ $content.=' limit_start,'; }
	   if(!isset($_GET["limit_end"])){ $content.=' limit_end,'; }
	   $content=chop($content,',');
	   echo $content;
	}
  }
  
}
else { echo 'MISSING_ACTION'; }
?>