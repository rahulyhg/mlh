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
  
  /* auth-part-04.php */
  function query_getListOfDomainSubscriptions($user_Id){
   $sql="SELECT DISTINCT domain_Id FROM user_subscription WHERE user_Id='".$user_Id."';";
   return $sql;
  }
  
  /* auth-part-06.php */
  /* News : Start */
  function query_notifyDuplicateSubscriptionForUser($user_Id,$domain_Id,$subdomain_Id){
    $sql="SELECT count(*) FROM user_subscription WHERE user_Id='".$user_Id."' AND domain_Id='".$domain_Id."' ";
	$sql.="AND subdomain_Id='".$subdomain_Id."'";
	return $sql;
  }
  function query_insertUserSubscription($sub_Id, $user_Id, $domain_Id, $subdomain_Id){
	$sql="INSERT INTO user_subscription(sub_Id, user_Id, domain_Id, subdomain_Id, sub_on) ";
	$sql.="VALUES ('".$sub_Id."', '".$user_Id."', '".$domain_Id."', '".$subdomain_Id."', '".date("Y-m-d nH:i:s")."');";
	return $sql;
  }
  /* News : End */
  function query_getListOfSubscriptions($user_Id){
  /* Used in Controllers : 1) controller.page.app.myprofile.php?action=USER_PROFILE_GETBYID 
   */
   $sql="SELECT domain_Id, subdomain_Id FROM user_subscription WHERE user_Id='".$user_Id."';";
   return $sql;
  }
  
  function query_bulk_user_subscription($user_Id,$primaryJsonData,$secondaryJsonData){
  $query='';
  $primarydeJsonData=json_decode($primaryJsonData);
  $secondarydeJsonData=json_decode($secondaryJsonData);
  $idObj=new identity();
  for($index1=0;$index1<count($secondarydeJsonData);$index1++){
   $check=false;
   for($index2=0;$index2<count($primarydeJsonData);$index2++){
    if($primarydeJsonData[$index2]->{'domain_Id'}==$secondarydeJsonData[$index1]->{'domain_Id'} && 
	   $primarydeJsonData[$index2]->{'subdomain_Id'}==$secondarydeJsonData[$index1]->{'subdomain_Id'}){
		  $check=true; 
	}
   }
   if(!$check){
    $sub_Id=$idObj->user_subscribe_id();
    $category=$secondarydeJsonData[$index1]->{'domain_Id'};
    $subcategory=$secondarydeJsonData[$index1]->{'subdomain_Id'};
    $query.="INSERT INTO `user_subscription`(`sub_Id`, `user_Id`, `domain_Id`, `subdomain_Id`, `sub_on`) ";
    $query.="VALUES ('".$sub_Id."','".$user_Id."','".$category."','".$subcategory."','".date('Y-m-d H:i:s')."');";
   }
  }
  return $query;
 }

  /* My Profile */
  function query_updateProfilePicture($user_Id,$profilepic){
    $sql="UPDATE user_account SET profile_pic='".$profilepic."' WHERE user_Id='".$user_Id."';";
	return $sql;
  }
  
  function query_getNameById($user_Id){
    $sql="SELECT surName, name FROM user_account WHERE user_Id='".$user_Id."';";
	return $sql;
  }
  
  /* app-user-profile */
  function query_getUserProfileByUserId($user_Id){
	$sql="SELECT * FROM user_account WHERE user_Id='".$user_Id."';";
	return $sql;
  }
}

?>