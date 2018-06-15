<?php 
class app_subscription {
 function query_geListOfSubscriptions(){
 /* Get List of Subscriptions from the Tables "subs_dom_info" and "subs_subdom_info" */
  $sql="SELECT subs_dom_info.domain_Id, subs_dom_info.domainName, ";
  $sql.="GROUP_CONCAT(CONCAT('{\"subdomain_Id\":\"',subs_subdom_info.subdomain_Id,'\",\"subdomainName\":\"', ";
  $sql.="subs_subdom_info.subdomainName,'\"}')) As SubdomainList ";
  $sql.="FROM subs_dom_info, subs_subdom_info WHERE subs_dom_info.domain_Id=subs_subdom_info.domain_Id ";
  $sql.="GROUP BY subs_dom_info.domain_Id; ";
  return $sql;
 }

}
?>