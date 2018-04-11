<?php
class app_community {
  /* Create Community */
  function query_createUnionAccount($union_Id, $domain_Id, $subdomain_Id, $unionName, $unionURLName, $profile_pic,
	$minlocation, $location, $state, $country, $admin_Id){
	$sql="INSERT INTO union_account(union_Id, domain_Id, subdomain_Id, unionName, unionURLName, profile_pic, ";
	$sql.="minlocation, location, state, country, created_On, admin_Id) ";
	$sql.=" VALUES ('".$union_Id."','".$domain_Id."','".$subdomain_Id."','".$unionName."','".$unionURLName."',";
	$sql.="'".$profile_pic."','".$minlocation."','".$location."','".$state."','".$country."','".date('Y-m-d H:i:s')."',";
	$sql.="'".$admin_Id."')";
	return $sql;
  }
  /* Add Languages to the Community */
  function query_addLangToCommunity($union_Id, $eng, $tel){
    $sql="INSERT INTO union_lang(union_Id, eng, tel) VALUES ('".$union_Id."','".$eng."','".$tel."');";
	return $sql;
  }
  
  /* Add Member Request to the Community */
  function query_addMemberRequest($request_Id, $union_Id, $req_from, $unionMem){
    $sql="";
    for($index=0;$index<count($unionMem);$index++){
	  $sql="INSERT INTO union_mem_req(request_Id, union_Id, req_from, req_to, sent_On) ";
	  $sql.="VALUES ('".$request_Id."','".$union_Id."','".$req_from."','".$req_to."','".date('Y-m-d H:i:s')."')";
	}
	return $sql;
  }
  
  /* Add NewsFeed of the Community */
  function query_addNewsFeed($info_Id, $union_Id, $artTitle, $artShrtDesc, $artDesc, $images, $status){
	$sql="INSERT INTO dash_info_union(info_Id, union_Id, artTitle, artShrtDesc, artDesc, createdOn, images, status) ";
	$sql.="VALUES ('".$info_Id."','".$union_Id."','".$artTitle."','".$artShrtDesc."','".$artDesc."',";
	$sql.="'".date('Y-m-d H:i:s')."','".$images."','".$status."')";
	return $sql;
  }
}
?>