<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>User Profile</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-profile-bg-styles.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
 sideWrapperToggle();
 mainMenuSelection("dn_"+USR_LANG+"_adminDashboard");
 bgstyle(1);
 $(".lang_"+USR_LANG).css('display','block');
 loadSMSInfo();
});
function loadSMSInfo(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
  { action:'MOBILE_SMS_BALANCE'},function(response){
   console.log("response: "+response);
   response=JSON.parse(response);
   document.getElementById("div_smslanceBalance").innerHTML='<h2><b>'+response.bal_smslance+'</b></h2>'; 
 });
}
</script>
</head>
<body>
  <?php include_once 'templates/api/api_loading.php'; ?>
  <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header_other.php'; ?>
	  <div id="app-page-content">
	    <div class="list-group">
		  <div align="center" class="list-group-item custom-lgt-bg">
		    <h5><b>ADMINISTRATOR DASHBOARD</b></h5>
		  </div>
		</div>
	    <div class="container-fluid mtop15p">
		   <div class="col-xs-12">
		     <div class="list-group">
				<div align="center" class="list-group-item custom-bg">
			       <h5><b>SMS-LANCE MESSAGES</b></h5>
			    </div>
				<div id="div_smslanceBalance" align="center" class="list-group-item">
				   
				</div>
			 </div>
		   </div>
		</div>
	  </div>
	</div>
  </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>
