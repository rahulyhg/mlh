<?php
class ClassmatePortalAccount{
 /* ClassmatePortal Module ::: Institution */
  function query_add_institutionAccount($cmp_u_Id, $domain_Id, $subdomain_Id, $institutionName, 
           $institutionType, $institutionBoard, $aboutinstitution, $profile_pic, $establishedOn, 
           $foundedBy1, $foundedBy2, $foundedBy3, $foundedBy4, $foundedBy5,$web_url,$createdBy){
   $sql="INSERT INTO cmp_uni_account(cmp_u_Id, domain_Id, subdomain_Id, institutionName, ";
   $sql.="institutionType, institutionBoard, aboutinstitution, profile_pic, establishedOn, ";
   $sql.="foundedBy1, foundedBy2, foundedBy3, foundedBy4, foundedBy5, web_url, createdBy, approved) VALUES (";
   $sql.="'".$cmp_u_Id."', '".$domain_Id."', '".$subdomain_Id."', '".$institutionName."', '";
   $sql.=$institutionType."','".$institutionBoard."', '".$aboutinstitution."', '".$profile_pic."','";
   $sql.=$establishedOn."','".$foundedBy1."', '".$foundedBy2."', '".$foundedBy3."','";
   $sql.=$foundedBy4."', '".$foundedBy5."','".$web_url."','".$createdBy."','N');";
   return $sql;  
  }
  function query_count_getInstitutionList($institutionBoard){
    $sql="SELECT count(*) FROM cmp_uni_account WHERE institutionBoard='".$institutionBoard."' AND approved='Y';";
	return $sql;  
  }
  function query_data_getInstitutionList($institutionBoard,$limit_start,$limit_end){
    $sql="SELECT cmp_uni_account.cmp_u_Id, cmp_uni_account.domain_Id, ";
    $sql.="(SELECT domainName FROM subs_dom_info WHERE subs_dom_info.domain_Id=cmp_uni_account.domain_Id) As domainName, ";
    $sql.="cmp_uni_account.subdomain_Id, (SELECT subdomainName FROM subs_subdom_info WHERE ";
	$sql.="subs_subdom_info.subdomain_Id=cmp_uni_account.subdomain_Id) As subdomainName, cmp_uni_account.institutionName, ";
	$sql.="cmp_uni_account.institutionType, cmp_uni_account.institutionBoard, cmp_uni_account.aboutinstitution, ";
	$sql.="cmp_uni_account.profile_pic, cmp_uni_account.establishedOn, cmp_uni_account.foundedBy1, ";
	$sql.="cmp_uni_account.foundedBy2, cmp_uni_account.foundedBy3, cmp_uni_account.foundedBy4, cmp_uni_account.foundedBy5, ";
	$sql.="cmp_uni_account.web_url, (SELECT CONCAT('{\"user_Id\":\"',user_Id,'\",\"surName\":\"',surName,'\",";
	$sql.="\"name\":\"',name,'\",\"profile_pic\":\"',profile_pic,'\",\"minlocation\":\"',minlocation,'\",\"location\":\"',";
	$sql.="location,'\",\"state\":\"',state,'\",\"country\":\"',country,'\"}') FROM  user_account ";
    $sql.="WHERE user_account.user_Id=cmp_uni_account.createdBy ) As createdBy, ";
	$sql.="(SELECT count(*) FROM  cmp_batch_account, cmp_batch_members ";
    $sql.="WHERE cmp_batch_account.batch_Id = cmp_batch_members.batch_Id AND ";
    $sql.="cmp_batch_account.cmp_u_Id = cmp_uni_account.cmp_u_Id AND  cmp_batch_members.memType = 'STUDENT') As students, ";
	$sql.="(SELECT count(*) FROM  cmp_batch_account, cmp_batch_members ";
    $sql.="WHERE cmp_batch_account.batch_Id = cmp_batch_members.batch_Id AND ";
    $sql.="cmp_batch_account.cmp_u_Id = cmp_uni_account.cmp_u_Id AND  cmp_batch_members.memType = 'PROFESSOR') As professors ";
	$sql.="FROM cmp_uni_account WHERE cmp_uni_account.institutionBoard='".$institutionBoard."' AND cmp_uni_account.approved='Y' ";
	$sql.="LIMIT ".$limit_start.",".$limit_end.";";
	return $sql;  
  }
  function query_data_getInstitutionDataById($institutionId){
    $sql="SELECT cmp_uni_account.cmp_u_Id, cmp_uni_account.domain_Id, ";
    $sql.="(SELECT domainName FROM subs_dom_info WHERE subs_dom_info.domain_Id=cmp_uni_account.domain_Id) As domainName, ";
    $sql.="cmp_uni_account.subdomain_Id, (SELECT subdomainName FROM subs_subdom_info WHERE ";
	$sql.="subs_subdom_info.subdomain_Id=cmp_uni_account.subdomain_Id) As subdomainName, cmp_uni_account.institutionName, ";
	$sql.="cmp_uni_account.institutionType, cmp_uni_account.institutionBoard, cmp_uni_account.aboutinstitution, ";
	$sql.="cmp_uni_account.profile_pic, cmp_uni_account.establishedOn, cmp_uni_account.foundedBy1, ";
	$sql.="cmp_uni_account.foundedBy2, cmp_uni_account.foundedBy3, cmp_uni_account.foundedBy4, cmp_uni_account.foundedBy5, ";
	$sql.="cmp_uni_account.web_url, (SELECT CONCAT('{\"user_Id\":\"',user_Id,'\",\"surName\":\"',surName,'\",";
	$sql.="\"name\":\"',name,'\",\"profile_pic\":\"',profile_pic,'\",\"minlocation\":\"',minlocation,'\",\"location\":\"',";
	$sql.="location,'\",\"state\":\"',state,'\",\"country\":\"',country,'\"}') FROM  user_account ";
    $sql.="WHERE user_account.user_Id=cmp_uni_account.createdBy ) As createdBy, ";
	$sql.="(SELECT count(*) FROM  cmp_batch_account, cmp_batch_members ";
    $sql.="WHERE cmp_batch_account.batch_Id = cmp_batch_members.batch_Id AND ";
    $sql.="cmp_batch_account.cmp_u_Id = cmp_uni_account.cmp_u_Id AND  cmp_batch_members.memType = 'PROFESSOR') As students, ";
	$sql.="(SELECT count(*) FROM  cmp_batch_account, cmp_batch_members ";
    $sql.="WHERE cmp_batch_account.batch_Id = cmp_batch_members.batch_Id AND ";
    $sql.="cmp_batch_account.cmp_u_Id = cmp_uni_account.cmp_u_Id AND  cmp_batch_members.memType = 'PROFESSOR') As professors, ";
	$sql.="(SELECT count(*) FROM cmp_sch_account WHERE cmp_sch_account.cmp_u_Id=cmp_uni_account.cmp_u_Id ";
	$sql.=" AND cmp_sch_account.approved='Y') As colleges, ";
	$sql.="(SELECT count(DISTINCT cmp_course_Id) FROM cmp_uni_coursemap WHERE ";
	$sql.="(cmp_uni_coursemap.cmp_u_Id=cmp_uni_account.cmp_u_Id AND cmp_uni_coursemap.approved='Y')) As courses ";
	$sql.="FROM cmp_uni_account WHERE cmp_uni_account.cmp_u_Id='".$institutionId."' AND cmp_uni_account.approved='Y';";
	return $sql;  
  } 
  function query_data_getInstitutionNameById($institutionId){
    $sql="SELECT institutionName FROM cmp_uni_account WHERE cmp_u_Id='".$institutionId."';";
	return $sql;  
  }
  function query_data_getInstitutionBoardById($institutionId){
    $sql="SELECT institutionBoard FROM cmp_uni_account WHERE cmp_u_Id='".$institutionId."';";
	return $sql;  
  }
 /* ClassmatePortal Module ::: Institute */
  function query_add_instituteAccount($cmp_sch_Id, $instituteName, $instituteType, $cmp_u_Id, $profile_pic, $establishedOn, 
   $aboutInstitute, $foundedBy1, $foundedBy2, $foundedBy3, $foundedBy4, $foundedBy5, $web_url, $createdBy){
   $sql="INSERT INTO cmp_sch_account(cmp_sch_Id, instituteName, instituteType, cmp_u_Id, profile_pic, establishedOn, ";
   $sql.="aboutInstitute, foundedBy1, foundedBy2, foundedBy3, foundedBy4, foundedBy5, web_url, createdBy, approved) ";
   $sql.="VALUES ('".$cmp_sch_Id."','".$instituteName."','".$instituteType."','".$cmp_u_Id."','".$profile_pic."','";
   $sql.=$establishedOn."','".$aboutInstitute."','".$foundedBy1."','".$foundedBy2."','".$foundedBy3."','".$foundedBy4;
   $sql.="','".$foundedBy5."','".$web_url."','".$createdBy."','N');";
   return $sql;
  }
  function query_count_getInstituteList($cmp_u_Id){
    $sql="SELECT count(*) FROM cmp_sch_account WHERE cmp_u_Id='".$cmp_u_Id."' AND approved='Y';";
	return $sql;
  }
  function query_data_getSimpleInstituteList($cmp_u_Id,$limit_start,$limit_end){
    $sql="SELECT cmp_sch_account.cmp_sch_Id, cmp_sch_account.instituteName, cmp_sch_account.profile_pic, ";
	$sql.="(SELECT count(*) FROM  cmp_batch_account, cmp_batch_members ";
    $sql.="WHERE cmp_batch_account.batch_Id = cmp_batch_members.batch_Id AND ";
    $sql.="cmp_batch_account.cmp_u_Id = cmp_sch_account.cmp_u_Id AND  cmp_batch_members.memType = 'STUDENT') As students, ";
	$sql.="(SELECT count(*) FROM  cmp_batch_account, cmp_batch_members ";
    $sql.="WHERE cmp_batch_account.batch_Id = cmp_batch_members.batch_Id AND ";
    $sql.="cmp_batch_account.cmp_u_Id = cmp_sch_account.cmp_u_Id AND  cmp_batch_members.memType = 'PROFESSOR') As professors ";
    $sql.="FROM cmp_sch_account WHERE cmp_u_Id='".$cmp_u_Id."' AND approved='Y';";
	return $sql;
  }
  function query_data_getInstituteDataById($institute_Id){
    $sql="SELECT * FROM cmp_sch_account WHERE cmp_sch_Id='".$institute_Id."';";
	return $sql;
  }
  function query_add_instituteBatchAccount($batch_Id, $cmp_u_Id, $cmp_sch_Id, $cmp_course_Id, $batchFrom,
    $batchTo, $admin_Id){
   $sql="INSERT INTO cmp_batch_account(batch_Id, cmp_u_Id, cmp_sch_Id, cmp_course_Id, batchFrom,";
   $sql.="batchTo, admin_Id) SELECT * FROM (";
   $sql.="SELECT '".$batch_Id."', '".$cmp_u_Id."', '".$cmp_sch_Id."', '".$cmp_course_Id."', '";
   $sql.=$batchFrom."','".$batchTo."', '".$admin_Id."' ";
   $sql.=") As Tbl WHERE (SELECT count(*) FROM cmp_batch_account WHERE cmp_u_Id='".$cmp_u_Id."' AND ";
   $sql.="cmp_sch_Id='".$cmp_sch_Id."' AND  cmp_course_Id='".$cmp_course_Id."' )=0;";
   return $sql;
  }
  function query_add_institutionCourses($cmp_course_Id, $courseName, $duration, $begMonth, $endMonth, $institutionType){
   $sql="INSERT INTO cmp_uni_courses(cmp_course_Id,courseName, duration, begMonth, ";
   $sql.="endMonth, institutionType, approved) SELECT * FROM (";
   $sql.="SELECT '".$cmp_course_Id."' As cmp_course_Id, '".$courseName."' As courseName, '";
   $sql.=$duration."' As duration, '".$begMonth."' As begMonth, '";
   $sql.=$endMonth."' As endMonth, '".$institutionType."' As institutionType, 'N' As approved ";
   $sql.=") As Tbl WHERE (SELECT count(*) FROM cmp_uni_courses WHERE courseName='".$courseName."' AND ";
   $sql.="duration='".$duration."' )=0;";
   return $sql;  
  }
  function query_autocomplete_courses($searchQuery){
    $sql="SELECT cmp_course_Id, courseName, duration, begMonth, endMonth FROM cmp_uni_courses ";
	$sql.="WHERE courseName LIKE '%".$searchQuery."%' AND approved='Y';";
	return $sql;  
  }
  function query_count_institutionCourses($institution_Id){
    $sql="SELECT count(cmp_uni_courses.cmp_course_Id) FROM cmp_uni_coursemap, cmp_uni_courses ";
	$sql.="WHERE cmp_uni_coursemap.cmp_u_Id='".$institution_Id."' AND ";
	$sql.="cmp_uni_courses.cmp_course_Id=cmp_uni_coursemap.cmp_course_Id AND ";
	$sql.="cmp_uni_coursemap.approved='Y';";
	return $sql;
  }
  function query_data_institutionCourses($institution_Id,$limit_start,$limit_end){
	$sql="SELECT ";
	$sql.="cmp_uni_courses.cmp_course_Id, cmp_uni_courses.courseName, cmp_uni_courses.duration, ";
	$sql.="cmp_uni_courses.begMonth, cmp_uni_courses.endMonth, ";
	$sql.="(SELECT count(*) FROM cmp_batch_members WHERE ";
	$sql.="cmp_batch_members.memType='STUDENT' AND cmp_batch_members.batch_Id IN (SELECT batch_Id FROM "; 
	$sql.="cmp_batch_account WHERE cmp_batch_account.cmp_u_Id='".$institution_Id."' AND ";
	$sql.="cmp_batch_account.cmp_course_Id=cmp_uni_courses.cmp_course_Id)) As students, ";
	$sql.="(SELECT count(*) FROM cmp_batch_members WHERE ";
	$sql.="cmp_batch_members.memType='PROFESSOR' AND cmp_batch_members.batch_Id IN (SELECT batch_Id FROM "; 
	$sql.="cmp_batch_account WHERE cmp_batch_account.cmp_u_Id='".$institution_Id."' AND ";
	$sql.="cmp_batch_account.cmp_course_Id=cmp_uni_courses.cmp_course_Id)) As professors ";
	$sql.="FROM cmp_uni_coursemap, cmp_uni_courses WHERE cmp_uni_coursemap.cmp_u_Id='".$institution_Id."' ";
    $sql.="AND cmp_uni_courses.cmp_course_Id=cmp_uni_coursemap.cmp_course_Id AND cmp_uni_coursemap.approved='Y' ";
	$sql.=" LIMIT ".$limit_start.",".$limit_end;
	return $sql; // STUDENT  PROFESSOR
  }
  function query_add_institutionCourseMap($cmp_map_Id, $cmp_u_Id, $cmp_course_Id){
    $sql="INSERT INTO cmp_uni_coursemap(cmp_map_Id, cmp_u_Id, cmp_course_Id, approved) ";
	$sql.="VALUES ('".$cmp_map_Id."','".$cmp_u_Id."','".$cmp_course_Id."','N');";
	return $sql;  
  }
  function query_add_instituteBatchMembers($member_Id, $batch_Id, $user_Id, $memType, $isAdmin, $memAddedOn){
   $sql="INSERT INTO cmp_batch_members(member_Id,batch_Id, user_Id, memType, isAdmin, ";
   $sql.="memAddedOn) SELECT * FROM (";
   $sql.="SELECT '".$member_Id."', '".$batch_Id."', '".$user_Id."', '".$memType."','".$isAdmin."', '";
   $sql.=$memAddedOn."'";
   $sql.=") As Tbl WHERE (SELECT count(*) FROM cmp_batch_members WHERE user_Id='".$user_Id."' )=0; ";
   return $sql;  
  }
  function query_add_batchMemberChat($chat_Id, $batch_Id, $msg_by, $sent_On, $msg, $reply_reference, $notify, $watched){
   $sql="INSERT INTO cmp_batch_mem_chat(chat_Id, batch_Id, msg_by, sent_On, msg, reply_reference, notify,  ";
   $sql.="watched) ";
   $sql.="VALUES ( '".$chat_Id."', '".$batch_Id."', '".$msg_by."', '".$sent_On."','".$msg."', '";
   $sql.=$reply_reference."','".$notify."','".$watched."');";
   return $sql;  
  }
  
}










/*
$chat_Id='48758855';
$batch_Id='45789665';
$msg_by='47125896';
$sent_On='45896253';
$msg='74589632';
$reply_reference='7496358'; 
$notify='74196301';
$watched='yes';
$classmatePortalAccount = new ClassmatePortalAccount();
echo $classmatePortalAccount->query_add_batchMemberChat($chat_Id, $batch_Id, $msg_by, $sent_On, $msg, $reply_reference, $notify, $watched);
 */

 /* cmp_batch_members
$member_Id='123';
$batch_Id='134';
$user_Id='524';
$memType='7896';
$isAdmin='1452';
$memAddedOn='7854';
$classmatePortalAccount = new ClassmatePortalAccount();
echo $classmatePortalAccount->query_add_instituteBatchMembers($member_Id, $batch_Id, $user_Id, $memType, $isAdmin, $memAddedOn);

*/







/* institutionCourses
$cmp_course_Id='52489';
$courseName='CSE';
$duration='1';
$begMonth='05';
$endMonth='09';
$classmatePortalAccount = new ClassmatePortalAccount();
echo $classmatePortalAccount->query_add_institutionCourses($cmp_course_Id, $courseName, $duration, $begMonth, $endMonth);
*/

/* institutionAccount
$cmp_u_Id='12352';
$domain_Id = '58452';
$subdomain_Id ='47585';
$institutionName ="JNTU";
$institutionType="Private";
$institutionBoard="University Board";
$aboutinstitution="XYZ"; 
$profile_pic="http://192.168.1.4/mlh/android-web/images/logo.jpg";
$establishedOn="1992"; 
$foundedBy1="Kishore";
$foundedBy2="Nellutla";
$foundedBy3="Venkata";
$foundedBy4="Anup";
$foundedBy5="Chakravathi";
$classmatePortalAccount = new ClassmatePortalAccount();
echo $classmatePortalAccount->query_add_institutionAccount($cmp_u_Id, $domain_Id, $subdomain_Id, $institutionName, $institutionType, $institutionBoard, $aboutinstitution, $profile_pic, $establishedOn, $foundedBy1, $foundedBy2, $foundedBy3, $foundedBy4, $foundedBy5);

*/





/* query_add_instituteBatchAccount
$batch_Id = '5240';
$cmp_u_Id = '5250';
$cmp_sch_Id = '4785';
$cmp_course_Id = '75896';
$batchFrom ='2008';
$batchTo = '2012';
$admin_Id = '4578522';
$classmatePortalAccount = new ClassmatePortalAccount();
echo $classmatePortalAccount->query_add_instituteBatchAccount($batch_Id, $cmp_u_Id, $cmp_sch_Id, 
$cmp_course_Id, $batchFrom, $batchTo, $admin_Id); */
?>