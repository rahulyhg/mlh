<?php
class ClassmatePortalAccount{
  function query_add_institutionAccount($cmp_u_Id, $domain_Id, $subdomain_Id, $institutionName, 
           $institutionType, $institutionBoard, $aboutinstitution, $profile_pic, $establishedOn, 
           $foundedBy1, $foundedBy2, $foundedBy3, $foundedBy4, $foundedBy5){
   $sql="INSERT INTO cmp_uni_account(cmp_u_Id, domain_Id, subdomain_Id, institutionName, ";
   $sql.="institutionType, institutionBoard, aboutinstitution, profile_pic, establishedOn, ";
   $sql.="foundedBy1, foundedBy2, foundedBy3, foundedBy4, foundedBy5 ) SELECT * FROM (";
   $sql.="SELECT '".$cmp_u_Id."', '".$domain_Id."', '".$subdomain_Id."', '".$institutionName."', '";
   $sql.=$institutionType."','".$institutionBoard."', '".$aboutinstitution."', '".$profile_pic."','";
   $sql.=$establishedOn."','".$foundedBy1."', '".$foundedBy2."', '".$foundedBy3."','";
   $sql.=$foundedBy4."', '".$foundedBy5."'";
   $sql.=") As Tbl WHERE (SELECT count(*) FROM cmp_uni_account WHERE institutionName='".$institutionName."' AND ";
   $sql.="institutionType='".$institutionType."' AND  institutionBoard='".$institutionBoard."' )=0;";
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
  

  
   function query_add_institutionCourses($cmp_course_Id, $courseName, $duration, $begMonth, $endMonth){
   $sql="INSERT INTO cmp_uni_courses(cmp_course_Id,courseName, duration, begMonth, ";
   $sql.="endMonth) SELECT * FROM (";
   $sql.="SELECT '".$cmp_course_Id."', '".$courseName."', '".$duration."', '".$begMonth."', '";
   $sql.=$endMonth."'";
   $sql.=") As Tbl WHERE (SELECT count(*) FROM cmp_uni_courses WHERE courseName='".$courseName."' AND ";
   $sql.="duration='".$duration."' )=0;";
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