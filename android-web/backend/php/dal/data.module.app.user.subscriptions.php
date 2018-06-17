<?php 
class app_subscription {
 function query_getListOfSubscriptions($user_Id){
 /* Get List of Subscriptions from the Tables "subs_dom_info" and "subs_subdom_info" */
  $sql="SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, ";
  $sql.="GROUP_CONCAT(CONCAT('{\"subdomain_Id\":\"',subs_subdom_info.subdomain_Id,'\",\"subdomainName\":\"', ";
  $sql.="subs_subdom_info.subdomainName,'\",\"subscribed\":\"',";
  $sql.="(SELECT IF((SELECT count(*) FROM user_subscription WHERE ";
  $sql.=" user_subscription.domain_Id=subs_dom_info.domain_Id AND ";
  $sql.="user_subscription.subdomain_Id=subs_subdom_info.subdomain_Id AND ";
  $sql.="user_subscription.user_Id='".$user_Id."')>0,'YES','NO')), ";
  $sql.="'\"}')) As SubdomainList ";
  $sql.="FROM subs_dom_info, subs_subdom_info WHERE subs_dom_info.domain_Id=subs_subdom_info.domain_Id ";
  $sql.="GROUP BY subs_dom_info.domain_Id; ";
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