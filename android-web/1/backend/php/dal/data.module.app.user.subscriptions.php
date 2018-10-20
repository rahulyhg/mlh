<?php 
class Subscriptions {
/* Execute SHOW VARIABLES; in Database and  SET SESSION group_concat_max_len = 1000000;
 */
 function query_get_userSubscriptionList($user_Id){
  $sql="SELECT domain_Id, subdomain_Id FROM user_subscription WHERE user_Id='".$user_Id."' ORDER BY domain_Id ASC;";
  return $sql;
 }
 function query_add_userSubscriptionList($sub_Id,$user_Id,$domain_Id,$subdomain_Id){
  $sql="INSERT INTO user_subscription(sub_Id, user_Id, domain_Id, subdomain_Id, sub_on) ";
  $sql.="SELECT * FROM (SELECT '".$sub_Id."','".$user_Id."', '".$domain_Id."', '".$subdomain_Id."','";
  $sql.=date('Y-m-d H:i:s')."') As tmp ";
  $sql.="WHERE (( SELECT count(*) FROM user_subscription WHERE user_Id='".$user_Id."' AND domain_Id='".$domain_Id."' AND ";
  $sql.="subdomain_Id='".$subdomain_Id."')=0);";
  return $sql;
 }
 
 
 /*
 function query_getCategoriesList(){
   $sql="SELECT domain_Id, domainName FROM subs_dom_info; ";
   return $sql;
 }
 
 function query_getSubCategoriesList($domain_Id){
   $sql="SELECT subdomain_Id, domain_Id, subdomainName FROM subs_subdom_info WHERE domain_Id='".$domain_Id."';";
   return $sql;
 }*/
 
 function query_getSubCategoriesSubscription($user_Id,$domain_Id){
   $sql="SELECT subdomain_Id, subdomainName, ";
   $sql.="(SELECT IF((SELECT count(*) FROM user_subscription WHERE user_subscription.user_Id='".$user_Id."'";
   $sql.=" AND user_subscription.domain_Id='".$domain_Id."' AND ";
   $sql.="user_subscription.subdomain_Id=subs_subdom_info.subdomain_Id)>0, 'YES','NO')) As subscribed, ";
   $sql.="(SELECT count(*) FROM unionprof_account WHERE domain_Id='".$domain_Id."' AND ";
   $sql.="subdomain_Id=subs_subdom_info.subdomain_Id) As communities ";
   $sql.=" FROM subs_subdom_info WHERE domain_Id='".$domain_Id."';";
   return $sql;
 }
 
 
 
 function query_removeUserSubscription($user_Id,$domain_Id,$subdomain_Id){
  $sql="DELETE FROM user_subscription WHERE user_Id='".$user_Id."' AND domain_Id='".$domain_Id."' AND ";
  $sql.="subdomain_Id='".$subdomain_Id."';";
  return $sql;
 }

 function query_check_isDuplicateCategory($category_Id,$categoryName){
  $sql="SELECT count(*) FROM subs_dom_info WHERE domain_Id='".$category_Id."' OR domainName='".$categoryName."';";
  return $sql;
 }
 function query_addNewCategory($category_Id,$categoryName){
   $sql="INSERT INTO subs_dom_info(domain_Id, domainName) ";
   $sql.="VALUES('".$category_Id."','".$categoryName."');";
   return $sql;
 }
 
 function query_addNewSubCategory($subcategory_Id,$category_Id,$subcategoryName){
   $sql="INSERT INTO subs_subdom_info(subdomain_Id, domain_Id, subdomainName) ";
   $sql.="SELECT '".$subcategory_Id."','".$category_Id."','".$subcategoryName."' FROM subs_subdom_info ";
   $sql.="WHERE (SELECT count(*) FROM subs_subdom_info WHERE subdomain_Id='".$subdomain_Id."' AND ";
   $sql.="subdomainName='".$subcategoryName."')=0 ";
   return $sql;
 }
 
 function query_updateCategory($category_Id,$categoryName){
   $sql="UPDATE subs_dom_info SET domainName='".$categoryName."' WHERE domain_Id='".$category_Id."';";
   return $sql;
 }
 
 function query_updateSubCategory($subcategory_Id,$category_Id,$subcategoryName){
   $sql="UPDATE subs_subdom_info SET domain_Id='".$category_Id."',";
   $sql.="subdomainName='".$subcategoryName."' WHERE subdomain_Id='".$subcategory_Id."'; ";
   return $sql;
 }
}

?>