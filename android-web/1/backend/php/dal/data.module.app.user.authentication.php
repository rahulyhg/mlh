<?php
class user_authentication {
/* CLASS DESCRIPTION : This DAL Class is used by Controller (controller.module.app.user.authentication.php) */

  function query_getuserInfoByPhoneNumber($countrycode, $phoneNumber){
  /* PAGES UTILIZED : auth-part-02.php */
    $query01="SELECT user_Id FROM user_contacts WHERE mcountrycode=\"".$countrycode."\" AND mobile=\"".$phoneNumber."\"";
    $query02="SELECT user_account.user_Id, user_account.username, user_account.surName, user_account.name, user_account.dob,";
	$query02.="user_account.gender, user_account.profile_pic, user_account.about_me, user_account.minlocation, ";
	$query02.="user_account.location, user_account.state, user_account.country, user_account.created_On, ";
	$query02.="user_account.isAdmin, user_account.user_tz, user_account.acc_active, ";
	$query02.="(SELECT GROUP_CONCAT('{\"mcountrycode\":\"',".$countrycode.",'\",\"mobile\":\"',".$phoneNumber.",'\"') ";
	$query02.="FROM user_contacts WHERE user_contacts.user_Id=(".$query01.")) As contactData ";
	$query02.="FROM user_account WHERE user_account.user_Id=(".$query01.");";
    return $query02;
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
  
  function query_updateUserInfo($user_Id,$username,$surName,$name,$dob,$gender,
	    $profile_pic,$about_me,$minlocation,$location,$state,$country,$isAdmin,$user_tz,$acc_active){
  /* PAGES UTILIZED : auth-part-04.php, auth-part-05.php */
    $sql="UPDATE user_account SET ";
	if(strlen($username)>0){  $sql.=" username='".$username."', "; }
	if(strlen($surName)>0){  $sql.=" surName='".$surName."', "; }
	if(strlen($name)>0){  $sql.=" name='".$name."', "; }
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
  
  function query_addNewUser($contact_Id,$user_Id,$username,$surName,$name,$mcountrycode,$mobile,$mob_val,$dob,$gender,
	  $profile_pic,$about_me,$minlocation,$location,$state,$country,$created_On,$isAdmin,$user_tz,$acc_active){
  /* PAGES UTILIZED : auth-part-05.php ,,, */
    $sql="INSERT INTO user_account(user_Id,username,surName,name,dob,gender,";
	$sql.="profile_pic,about_me,minlocation,location,state,country,created_On,isAdmin,user_tz,acc_active) ";
	$sql.="VALUES ('".$user_Id."','".$username."','".$surName."','".$name."','";
	$sql.=$dob."','".$gender."','".$profile_pic."','".$about_me."','".$minlocation."','".$location."','".$state."',";
	$sql.="'".$country."','".$created_On."','".$isAdmin."','".$user_tz."','".$acc_active."');";
	$sql.="INSERT INTO user_contacts(contact_Id, user_Id, mcountrycode, mobile, mob_val) ";
	$sql.="VALUES ('".$contact_Id."','".$user_Id."','".$mcountrycode."','".$mobile."','".$mob_val."');";
	return $sql;
  }
 
  function query_getUserInfoByUserId($profile_user_Id,$user_Id){
    $sql="SELECT user_Id, username, surName, name, dob, gender, profile_pic, about_me, minlocation, ";
	$sql.="location, state, country, created_On, isAdmin, user_tz, acc_active, ";
	$sql.="(SELECT IF((SELECT count(*) FROM user_frnds WHERE (frnd1='".$profile_user_Id."' AND frnd2 ='".$user_Id."') ";
	$sql.="OR (frnd1='".$user_Id."' AND frnd2 ='".$profile_user_Id."'))>0,'YES','NO')) As isFriend, ";
	$sql.="(SELECT IF((SELECT count(*) FROM user_frnds_req WHERE (from_userId='".$profile_user_Id."' AND to_userId ='".$user_Id."') ";
	$sql.="OR (from_userId='".$user_Id."' AND to_userId ='".$profile_user_Id."'))>0,'YES','NO')) As frndRequest ";
	$sql.="FROM user_account WHERE user_Id='".$profile_user_Id."';";
	return $sql;
  }

  function query_getUserGeoLocation($user_Id){
    $sql="SELECT * FROM user_profile_geo WHERE user_Id='".$user_Id."';";
	return $sql;
  }
    
  function query_count_getUserIdList(){
    $sql="SELECT count(*) FROM user_account;";
	return $sql;
  }
  
  function query_data_getUserIdList($limit_start,$limit_end){
    $sql="SELECT user_Id FROM user_account LIMIT ".$limit_start.",".$limit_end.";";
	return $sql;
  }
  
  function query_getUserAccountInformation($user_Id){
   $sql="SELECT user_Id, username, surName, name, dob, gender, profile_pic, about_me, minlocation, ";
   $sql.="location, state, country, created_On, isAdmin, user_tz, acc_active, ";
   $sql.="(SELECT CONCAT('[',GROUP_CONCAT('{\"mcountrycode\":\"',mcountrycode,'\",\"mobile\":\"',mobile,'\"}'),']') ";
   $sql.="As contacts ";
   $sql.="FROM user_contacts WHERE user_Id='".$user_Id."') As user_contacts ";
   $sql.=" FROM user_account WHERE user_Id='".$user_Id."';";
   return $sql;
  }
  
  function query_autoComplete_getAllUsers($searchTerm){
    $sql="SELECT user_Id, CONCAT(surName,' ', name) As name, profile_pic, minlocation, location, state, country ";
	$sql.="FROM user_account WHERE surName LIKE '%".$searchTerm."5' OR ";
	$sql.="name LIKE '%".$searchTerm."%';";
	return $sql;
  }
}

?>