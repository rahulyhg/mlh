<?php
class user_authentication {
/* CLASS DESCRIPTION : This DAL Class is used by Controller (controller.module.app.user.authentication.php) */

  function query_getuserInfoByPhoneNumber($countrycode, $phoneNumber){
  /* PAGES UTILIZED : auth-part-02.php */
    $query="SELECT * FROM user_account WHERE mcountrycode='".$countrycode."' AND mobile='".$phoneNumber."';";
    return $query;
  }
  
  function query_checkUsernameAvailability($username){
  /* PAGES UTILIZED : auth-part-02.php */
    $sql="SELECT * FROM `user_account` WHERE username='".$username."';";
	return $sql;
  }
  
  function query_checkUsernameAvailabilityExceptcurrentUserId($user_Id,$username){
  /* PAGES UTILIZED : auth-part-02.php */
    $sql="SELECT * FROM `user_account` WHERE username='".$username."' AND NOT user_Id='".$user_Id."';";
	return $sql;
  }
  
  function query_updateUserInfo($user_Id,$username,$surName,$name,$mcountrycode,$mobile,$mob_val,$dob,$gender,
	    $profile_pic,$about_me,$minlocation,$location,$state,$country,$isAdmin,$user_tz,$acc_active){
  /* PAGES UTILIZED : auth-part-04.php, auth-part-05.php */
    $sql="UPDATE user_account SET ";
	if(strlen($username)>0){  $sql.=" username='".$username."', "; }
	if(strlen($surName)>0){  $sql.=" surName='".$surName."', "; }
	if(strlen($name)>0){  $sql.=" name='".$name."', "; }
	if(strlen($mcountrycode)>0){  $sql.=" mcountrycode='".$mcountrycode."', "; }
	if(strlen($mobile)>0){  $sql.=" mobile='".$mobile."', "; }
	if(strlen($mob_val)>0){  $sql.=" mob_val='".$mob_val."', "; }
	if(strlen($dob)>0){  $sql.=" dob='".$dob."', "; }
	if(strlen($gender)>0){  $sql.=" gender='".$gender."', "; }
	if(strlen($profile_pic)>0){  $sql.=" profile_pic='".$profile_pic."', "; }
	if(strlen($minlocation)>0){  $sql.=" minlocation='".$minlocation."', "; }
	if(strlen($location)>0){  $sql.=" location='".$location."', "; }
	if(strlen($state)>0){  $sql.=" state='".$state."', "; }
	if(strlen($country)>0){  $sql.=" country='".$country."', "; }
	if(strlen($isAdmin)>0){  $sql.=" isAdmin='".$isAdmin."', "; }
	if(strlen($user_tz)>0){  $sql.=" user_tz='".$user_tz."', "; }
	if(strlen($acc_active)>0){  $sql.=" acc_active='".$acc_active."', "; }
	$sql=chop($sql,", ");
	$sql.=" WHERE user_Id='".$user_Id."';";
	return $sql;
  }
  
  function query_addNewUser($user_Id,$username,$surName,$name,$mcountrycode,$mobile,$mob_val,$dob,$gender,
	  $profile_pic,$about_me,$minlocation,$location,$state,$country,$created_On,$isAdmin,$user_tz,$acc_active){
  /* PAGES UTILIZED : auth-part-05.php */
    $sql="INSERT INTO user_account(user_Id,username,surName,name,mcountrycode,mobile,mob_val,dob,gender,";
	$sql.="profile_pic,about_me,minlocation,location,state,country,created_On,isAdmin,user_tz,acc_active) ";
	$sql.="VALUES ('".$user_Id."','".$username."','".$surName."','".$name."','".$mcountrycode."','".$mobile."',";
	$sql.="'".$mob_val."','".$dob."','".$gender."','".$profile_pic."','".$about_me."','".$minlocation."','".$location."','".$state."',";
	$sql.="'".$country."','".$created_On."','".$isAdmin."','".$user_tz."','".$acc_active."')";
	return $sql;
  }
  
}

?>