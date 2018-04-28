<?php
include_once '../api/app.initiator.php';
include_once '../api/app.database.php';
include_once '../dal/data.module.user.authentication.php';
class logic_user_authentication {
  function getUserNameByUserId($user_Id){
    $authObj=new user_authentication();
	$dbObj=new Database();
	$query=$authObj->query_getNameById($user_Id);
	$jsonData=$dbObj->getJSONData($query);
	$dejsonData=json_decode($jsonData);
	return $dejsonData[0]->{'surName'}." ".$dejsonData[0]->{'name'};
  }
}

// $authObj=new logic_user_authentication();
// echo $authObj->getUserNameByUserId('USR113561617186');
?>