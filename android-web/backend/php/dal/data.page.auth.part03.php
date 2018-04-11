<?php
class authpart03 {

	function query_updateUserDetailsByEmail($userDetArray,$email){
	  $query="UPDATE user_account SET ";
	  foreach($userDetArray as $x => $x_value) {
		 $query.=$x."='".$x_value."', ";
	  }
	  $query=chop($query,", ");
	  $query.="WHERE email='".$email."';";
	  return $query;
	}
	
	function query_addUser($user_Id,$username,$surName,$name,$email,$email_val,$mobile,$mob_val,
	   $dob,$gender,$path_Id,$profile_pic,$minlocation,$location,$state,$country,$created_On,$isAdmin,$user_tz,$acc_active,$and_app_v){
	  /* UserRegisterQuery */
	  $sql="INSERT INTO user_account(user_Id, username, surName, name, email, email_val, mobile, mob_val, dob, ";
	  $sql.="gender, path_Id, profile_pic, minlocation, location, state, country, created_On, isAdmin,user_tz,acc_active,and_app_v) ";
	  $sql.="VALUES ('".$user_Id."','".$username."','".$surName."','".$name."','".$email."','".$email_val."','".$mobile;
	  $sql.="','".$mob_val."','".$dob."','".$gender."',"."'".$path_Id."','".$profile_pic."','".$minlocation."','".$location;
	  $sql.="','".$state."','".$country."','".$created_On."','".$isAdmin."','";
	  $sql.=$user_tz."','".$acc_active."','".$and_app_v."')";
	  return $sql;
	}
}
?>