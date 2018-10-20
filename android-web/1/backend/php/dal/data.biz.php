<?php 
class biz {

	function query_addbiz_profile($biz_Id,$domain_Id,$subdomain_Id,$bizname,$path_Id,$profile_pic,$minlocation,
				$location,$state,$country,$created_On,$admin_Id,$biz_type,$status,$active_upto)  {
	/* FUNCTION DESCRIPTION : Used in controller.biz.php ( action = ADD_BIZPROFILE ) */
	   $insertQuery="INSERT INTO biz_account(biz_Id,domain_Id,subdomain_Id,bizname,path_Id,profile_pic,minlocation,location,state,country,created_On,admin_Id,biz_type,status,active_upto) ";
	   $insertQuery.="VALUES ('".$biz_Id."','".$domain_Id."','".$subdomain_Id."','".$bizname."','".$path_Id."','".$profile_pic."','".$minlocation."','".$location."','".$state."','".$country."','".$created_On."','".$admin_Id."','".$biz_type."','".$status."','".$active_upto."');"; 

	   $this->logger->info("[func - addbiz_accountData()] Query : ".$insertQuery);
	   return $insertQuery;
	}

}
?>