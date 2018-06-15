<?php 
class app_subscription {
 function query_geListOfSubscriptions($user_Id){
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
}

?>