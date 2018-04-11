<?php
 class tbl_useraccount{
    
	function query_userUniqueUserIdCheck($user_Id){
	 $sql="SELECT * FROM user_account WHERE user_Id='".$user_Id."'";
	 return $sql;
	}
	
	
	
	
	
	
	
	function query_referencedunregisteredAddUser($arry_user_Id,$username,$surName,$name,$arry_email,$email_val,
	              $mobile,$mob_val,$dob,$gender,$path_Id,$profile_pic,$minlocation,$location,$state,$country,
				  $created_On,$isAdmin,$user_tz,$acc_active,$and_app_v){
	   // $email
	  /* UserRegisterQuery */
	  $sql='';
	  for($index=0;$index<count($arry_email);$index++){ 
		  $sql.="INSERT IGNORE INTO user_account(user_Id, username, surName, name, email, email_val, mobile, mob_val, dob, ";
		  $sql.="gender, path_Id, profile_pic, minlocation, location, state, country, created_On, isAdmin,user_tz,acc_active,and_app_v) ";
		  $sql.="VALUES ('".$arry_user_Id[$index]."','".$username."','".$surName."','".$name."','".$arry_email[$index]."','".$email_val."','".$mobile;
		  $sql.="','".$mob_val."','".$dob."','".$gender."',"."'".$path_Id."','".$profile_pic."','".$minlocation."','".$location;
		  $sql.="','".$state."','".$country."','".$created_On."','".$isAdmin."','";
		  $sql.=$user_tz."','".$acc_active."','".$and_app_v."'); ";
	  }
	  return $sql;
	}
	
	
 }
?>