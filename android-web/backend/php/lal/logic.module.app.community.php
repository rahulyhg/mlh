<?php
include_once '../api/app.initiator.php';
include_once '../api/app.database.php';
include_once '../dal/data.module.app.community.php';
class logic_union_newsfeed {
  function union_people_list($union_Id){
   /* Get List of people (Members and Supports - Unique) linked to a Community */
   $people='';
   $communityObj=new app_community();
   $dbObj=new Database();
   $query=$communityObj->query_getCommunityPeople_userIds($union_Id);
   echo $dbObj->getAColumnAsArray($query,"user_Id"); // For Javascript use - json_encode
  }
}

// $feedObj=new logic_union_newsfeed();
// $feedObj->union_people_list('UAI363543863775');
?>