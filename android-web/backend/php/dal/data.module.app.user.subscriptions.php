<?php 
class app_subscription {
/* Execute SHOW VARIABLES; in Database and  SET SESSION group_concat_max_len = 1000000;
 */
 function query_getCategoriesSubscription(){
   $sql="SELECT domain_Id, domainName FROM subs_dom_info; ";
   return $sql;
 }
 
 function query_getSubCategoriesSubscription($user_Id,$domain_Id){
   $sql="SELECT subdomain_Id, subdomainName, ";
   $sql.="(SELECT IF((SELECT count(*) FROM user_subscription WHERE user_subscription.user_Id='".$user_Id."'";
   $sql.=" AND user_subscription.domain_Id='".$domain_Id."' AND ";
   $sql.="user_subscription.subdomain_Id=subs_subdom_info.subdomain_Id)>0, 'YES','NO')) As subscribed ";
   $sql.=" FROM subs_subdom_info WHERE domain_Id='".$domain_Id."';";
   return $sql;
 }
 
 function query_setUserSubscription($sub_Id,$user_Id,$domain_Id,$subdomain_Id){
 $sql="INSERT INTO user_subscription(sub_Id, user_Id, domain_Id, subdomain_Id, sub_on) ";
 $sql.="SELECT * FROM (SELECT '".$sub_Id."','".$user_Id."', '".$domain_Id."', '".$subdomain_Id."','";
 $sql.=date('Y-m-d H:i:s')."') As tmp ";
 $sql.="WHERE (( SELECT count(*) FROM user_subscription WHERE user_Id='".$user_Id."' AND domain_Id='".$domain_Id."' AND ";
 $sql.="subdomain_Id='".$subdomain_Id."')=0);";
 return $sql;
 }
 function query_removeUserSubscription($user_Id,$domain_Id,$subdomain_Id){
  $sql="DELETE FROM `user_subscription` WHERE user_Id='".$user_Id."' AND domain_Id='".$domain_Id."' AND ";
  $sql.="subdomain_Id='".$subdomain_Id."';";
  return $sql;
 }
}

?>