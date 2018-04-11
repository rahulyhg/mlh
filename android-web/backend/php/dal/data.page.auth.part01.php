<?php
class authpart01 {
 function query_userUniqueEmailCheck($email){
   $sql="SELECT * FROM user_account WHERE email='".$email."'";
   return $sql;
 }
 function query_count_userSubscription($email){
   $sql="SELECT COUNT(*) FROM user_subscription ";
   $sql.="WHERE user_Id = ( SELECT user_Id FROM user_account WHERE email =  '".$email."' )";
   return $sql;
 }
 function query_getuserSubscription($email){
   $sql="SELECT * FROM user_subscription ";
   $sql.="WHERE user_Id = ( SELECT user_Id FROM user_account WHERE email =  '".$email."' )";
   return $sql;
 }
 function query_getuser_accountData($email){
   $query="SELECT * FROM user_account WHERE email='".$email."'";
   return $query;
 }
 function query_userUniqueUserNameCheck($username){
	 $sql="SELECT * FROM user_account WHERE username='".$username."'";
	 return $sql;
	}
}
?>