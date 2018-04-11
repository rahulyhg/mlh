<?php
class logic_user_subscription {

function subscriptionListBuilder($category,$content){
/* This function is used to collect the subcategories from categories and builds JSON Content and Send Back to 
 * buildUserSubscribingList($categories).
 */
  $url=$_SESSION["PROJECT_URL"]."backend/config/english/domains/".$category."/subdomain_list.json";
  $subcategoriesJSON=file_get_contents($url);
  
  $subcategoriesdeJSON=json_decode($subcategoriesJSON);
	for($ind=0;$ind<count($subcategoriesdeJSON->subdomains);$ind++){
	  $subdomain_Id=$subcategoriesdeJSON->{'subdomains'}[$ind]->{'subdomain_Id'};
	  $content.='{"domain_Id":"'.$category.'","subdomain_Id":"'.$subdomain_Id.'"},';
	}
  return $content;
}
function buildUserSubscribingList($categories){
 /* Get list of SubCategories */
  $logicSub=new logic_user_subscription();
  $content='[';
  $itCategory='09-ITS';
  $itRecognizer=false;
   for($index=0;$index<count($categories);$index++){
    $category=$categories[$index];
    if($category===$itCategory) { $itRecognizer=true; }
	$content=$logicSub->subscriptionListBuilder($category,$content);
   } 
  if(!$itRecognizer){ $content=$logicSub->subscriptionListBuilder($itCategory,$content); }
  $content=chop($content,',');
  $content.=']';
 return $content;
}

}
?>