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
   return $dbObj->getAColumnAsArray($query,"user_Id"); // For Javascript use - json_encode
  }
  function getUnionNameByUnionId($union_Id){
    $authObj=new app_community();
	$dbObj=new Database();
	$query=$authObj->query_getUnionNameByUnionId($union_Id);
	$jsonData=$dbObj->getJSONData($query);
	$dejsonData=json_decode($jsonData);
	return $dejsonData[0]->{'unionName'};
  }
}

// 
?>