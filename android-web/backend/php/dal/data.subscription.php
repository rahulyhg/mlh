<?php
require_once '../lal/lal.appIdentity.php';
require_once '../lal/lal.dom.php';
class tbl_usersubscription {
function query_knowUserSubscribedDomain($user_Id){
  $query="SELECT * FROM `user_subscription` WHERE user_Id='".$user_Id."'";
  return $query;
}
}
?>