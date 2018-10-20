<?php session_start(); 
if(isset($_SESSION["AUTHENTICATION_STATUS"])){
if($_SESSION["AUTHENTICATION_STATUS"]=='INCOMPLETED'){
 $_SESSION["AUTH_USER_ID"]='0';
 unset($_SESSION["AUTH_USER_USERNAME"]);
 unset($_SESSION["AUTH_USER_SURNAME"]);
 unset($_SESSION["AUTH_USER_FULLNAME"]);
 unset($_SESSION["AUTH_USER_GENDER"]);
 unset($_SESSION["AUTH_USER_DOB"]);
 unset($_SESSION["AUTH_USER_STATE"]);
 unset($_SESSION["AUTH_USER_LOCATION"]);
 unset($_SESSION["AUTH_USER_LOCALITY"]);
 unset($_SESSION["AUTH_USER_PROFILEPIC"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'templates/api/api_params.php'; ?>
<?php include_once 'templates/api/api_js.php'; ?>
 <title>Authentication</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-02-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-02.js"></script>
 <style>
  body { background-color:#0ba0da; }
 </style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 <div id="usernameCheckAvailabilityDivision" class="container-fluid">
 
   <!-- Username -->
   <div class="col-xs-12 mtop15p white-font">
     <input type="hidden" id="reg_english_userId" class="form-control" placeholder="Enter your UserId" value="0"/>
	 <input type="hidden" id="reg_english_userTz" class="form-control" placeholder="Enter your Timezone" value=""/>
	 <label>Set your Username</label>
     <input type="text" id="reg_english_username" class="form-control" placeholder="Enter your Username"/>
   </div> 
   <div align="center" id="alert_userCheckAvailability" class="col-xs-12 mtop15p">
      <span class="lang_english">
	     <div id="english_usernameAlreadyExists" class="hide-block white-font">
		   <b>Username already exists. Please try Other.</b>
		 </div>
	  </span>
   </div> 
   <div id="div_auth_checkAvailability" align="center" class="col-xs-12 mtop15p">
     <button class="btn btn-default form-control" onclick="javascript:checkUserAvailability();"><b>Check Availablity</b></button>
   </div>
   
   <div id="div_auth_availabilityMsg" align="center" class="col-xs-12 mtop15p white-font hide-block">
	 <span class="lang_english">
		<b>Congratulations ! <br/>Username "<span id="username_english_setupDisplay"></span>" is Available for you.</b>
	 </span>
   </div>
   
   <div id="div_auth_redirection" align="center" class="col-xs-12 mtop15p hide-block">
	  <div class="btn-group">
		 <button class="btn btn-default" onclick="javascript:hide_availabilityMsg();"><b>Change</b></button>
		 <button class="btn custom-lgt-bg" onclick="javascript:auth_forward();"><b>Continue</b></button>
	  </div>
   </div>
  </div>

</body>
</html>
<?php 
} else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); }
} else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>