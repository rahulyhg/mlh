<?php
  class union {
	
	function query_unionaccount_checkunionIdOfAdmin($union_Id,$user_Id) {
	  $sql="SELECT * FROM union_account WHERE union_Id='".$union_Id."' AND 	admin_Id='".$user_Id."';";
	 return $sql;
	}
	
	function query_unionaccount_checkunionUnique($unionName) {
	  $sql="SELECT * FROM union_account WHERE unionName='".$unionName."';";
	 return $sql;
	}
	
	function query_unionaccount_getUnionDataByUnionURLName($unionURLName){
	  $sql="SELECT * FROM union_account WHERE unionURLName='".$unionURLName."';";
	 return $sql;
	}
	
	function query_unionaccount_createNewUnion($union_Id, $domain_Id, $subdomain_Id, $unionName,$unionURLName,$cover_pic,
    	$profile_pic, $minlocation, $location, $state, $country,
	  $created_On, $admin_Id, $members, $supporters){
	  $sql="INSERT INTO union_account(union_Id, domain_Id, subdomain_Id, unionName,unionURLName, cover_pic, profile_pic, minlocation, location, state, country, "; 
	  $sql.=" created_On, admin_Id, members, supporters) VALUES ('".$union_Id."','".$domain_Id."','".$subdomain_Id."','".$unionName."','".$unionURLName."',";
	  $sql.="'".$cover_pic."','".$profile_pic."','".$minlocation."','".$location."','".$state."','".$country."','".date('Y-m-d H:i:s')."','".$admin_Id."',";
	  $sql.=$members.",".$supporters.")";
	  return $sql;
	}
	
	function query_unionaccount_unionlang($union_Id, $eng, $tel){
	  $sql="INSERT INTO union_lang(union_Id, eng, tel) VALUES ('".$union_Id."','".$eng."','".$tel."')";
	  return $sql;
	}

	function query_unionaccount_addunionMember($member_Id, $union_Id, $user_Id, $roleName, $isAdmin){
	  $sql="INSERT INTO union_mem(member_Id, union_Id, user_Id, roleName, isAdmin, addedOn) ";
	  $sql.="VALUES ('".$member_Id."','".$union_Id."','".$user_Id."','".$roleName."','".$isAdmin."','".date('Y-m-d H:i:s')."')";
	  return $sql;
	}
	
	function query_unionaccount_byAdminId($user_Id){
	  $sql="SELECT * FROM union_account WHERE admin_Id =  '".$user_Id."'";
	 return $sql;
	}
 
    function query_unionaccount_userSupportUnionList($user_Id){
	/* This Query returns the List of Communities supporting by User */
	  $sql="SELECT * FROM union_account, union_sup WHERE ";
	  $sql.="union_account.union_Id=union_sup.union_Id and union_sup.user_Id='".$user_Id."';";
	  return $sql;
	}
	
	function query_select_listOfCommunites_count($domain_Id,$subdomain_Id,$country,$state,
	         $location,$minlocation){
	  $sql="SELECT count(DISTINCT union_Id) ";
	  $sql.="FROM union_account WHERE";
	  if(strlen($country)==0 && strlen($state)==0 && strlen($location)==0 && strlen($minlocation)==0 &&
	  strlen($domain_Id)==0 && strlen($subdomain_Id)==0){
	     $sql=chop($sql,"WHERE");
	  } else {
	  if(strlen($country)>0){ $sql.=" country = '".$country."' AND"; }
	  if(strlen($state)>0){ $sql.=" state =  '".$state."' AND"; }
      if(strlen($location)>0){ $sql.=" location =  '".$location."' AND"; }
      if(strlen($minlocation)>0){ $sql.=" minlocation =  '".$minlocation."' AND"; }
      if(strlen($domain_Id)>0){ $sql.=" domain_Id='".$domain_Id."' AND"; }
      if(strlen($subdomain_Id)>0){ $sql.=" subdomain_Id =  '".$subdomain_Id."' AND"; }
	  $sql=chop($sql,"AND");
	  }
	  return $sql; 
	}
	function query_select_listOfCommunities($domain_Id,$subdomain_Id,$country,$state,
	         $location,$minlocation,$limit_start,$limit_end){
	 $sql="SELECT DISTINCT union_Id, domain_Id, subdomain_Id, unionName, unionURLName, ";
	 $sql.="cover_pic, profile_pic, minlocation, location, state, country, created_On, admin_Id, ";
	 $sql.="members, supporters ";
     $sql.="FROM union_account WHERE";
     if(strlen($country)==0 && strlen($state)==0 && strlen($location)==0 && strlen($minlocation)==0 &&
	    strlen($domain_Id)==0 && strlen($subdomain_Id)==0){
	     $sql=chop($sql,"WHERE");
	  } else {
	  if(strlen($country)>0){ $sql.=" country = '".$country."' AND"; }
	  if(strlen($state)>0){ $sql.=" state =  '".$state."' AND"; }
      if(strlen($location)>0){ $sql.=" location =  '".$location."' AND"; }
      if(strlen($minlocation)>0){ $sql.=" minlocation =  '".$minlocation."' AND"; }
      if(strlen($domain_Id)>0){ $sql.=" domain_Id='".$domain_Id."' AND"; }
      if(strlen($subdomain_Id)>0){ $sql.=" subdomain_Id =  '".$subdomain_Id."' AND"; }
	  $sql=chop($sql,"AND");
	  }
     $sql.=" LIMIT ".$limit_start.",".$limit_end;
	 return $sql; 
	}
 }
?>