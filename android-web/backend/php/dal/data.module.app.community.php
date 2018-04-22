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
  
  /* List of Communities Created by User */
  function query_count_communitiesCreatedList($user_Id){
    $sql="SELECT count(*) FROM union_account WHERE admin_Id='".$user_Id."';";
	return $sql;
  }
  
  function query_communitiesCreatedList($user_Id,$limit_start,$limit_end){
    $sql="SELECT * FROM union_account WHERE admin_Id='".$user_Id."' LIMIT ".$limit_start.", ".$limit_end.";";
	return $sql;
  }
  
  function query_communityMembersCount($union_Id){
    $sql="SELECT count(*) FROM union_mem WHERE union_Id='".$union_Id."';";
	return $sql;
  }
  
  function query_communitySupportersCount($union_Id){
    $sql="SELECT count(*) FROM union_sup WHERE union_Id='".$union_Id."';";
	return $sql;
  }
  
  /* List of Communities Where User being Member */
  function query_count_communitiesUserBeingMember($user_Id){
   $sql="SELECT DISTINCT union_account.union_Id, count(*)";
   $sql.="FROM union_account INNER JOIN union_mem ON union_account.union_Id=union_mem.union_Id AND ";
   $sql.="union_mem.user_Id='".$user_Id."' ";
   return $sql;
  }
  
  function query_communitiesUserBeingMember($user_Id,$limit_start,$limit_end){
   $sql="SELECT DISTINCT union_account.union_Id, ";
   $sql.="union_account.domain_Id, union_account.subdomain_Id, union_account.unionName, union_account.unionURLName, ";
   $sql.="union_account.profile_pic, union_account.minlocation, union_account.location, union_account.state, ";
   $sql.="union_account.country, union_account.created_On, union_account.admin_Id, ";
   $sql.="union_mem.member_Id, union_mem.union_Id, union_mem.user_Id, union_mem.roleName, union_mem.isAdmin, ";
   $sql.="union_mem.addedOn, union_mem.status ";
   $sql.="FROM union_account INNER JOIN union_mem ON union_account.union_Id=union_mem.union_Id AND ";
   $sql.="union_mem.user_Id='".$user_Id."' ";
   $sql.="LIMIT ".$limit_start.", ".$limit_end.";";
   return $sql;
  }

  /* List of Communities Where User being Supporting */
  function query_count_communitiesUserBeingSupporting($user_Id){
   $sql="SELECT DISTINCT union_account.union_Id, count(*) ";
   $sql.="FROM union_account INNER JOIN union_sup ON union_account.union_Id=union_sup.union_Id AND ";
   $sql.="union_sup.user_Id='".$user_Id."' ";
   return $sql;
  }
  
  function query_communitiesUserBeingSupporting($user_Id,$limit_start,$limit_end){
   $sql="SELECT DISTINCT union_account.union_Id, ";
   $sql.="union_account.domain_Id, union_account.subdomain_Id, union_account.unionName, union_account.unionURLName, ";
   $sql.="union_account.profile_pic, union_account.minlocation, union_account.location, union_account.state, ";
   $sql.="union_account.country, union_account.created_On, union_account.admin_Id, ";
   $sql.="union_sup.supportOn ";
   $sql.="FROM union_account INNER JOIN union_sup ON union_account.union_Id=union_sup.union_Id AND ";
   $sql.="union_sup.user_Id='".$user_Id."' ";
   $sql.="LIMIT ".$limit_start.", ".$limit_end.";";
   return $sql;
   return $sql;
  }
  
}
?>