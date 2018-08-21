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
 <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBLYTwBBtnRDyew0qLZTjCJp0mgR5koP5A"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
body { background-color:#eee; }
</style>
<script type="text/javascript">
var APP_USERPROFILE_ID='<?php  if(isset($_GET["user_Id"])) { echo $_GET["user_Id"]; } ?>';
$(document).ready(function(){ 
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
  startAppProgressLoader();
  hzTabSelection("usrProfileHzTab");
});
function hzTabSelection(id){     
 var arryHzTab=["usrProfileHzTab","usrSubscriptionHzTab","usrFriendsHzTab","usrCommunityHzTab","usrMovementHzTab"];
 var arryTabDataViewer=["usrProfileDisplayDivision","usrSubscriptionDisplayDivision","usrFriendsDisplayDivision","usrCommunityDisplayDivision","usrMovementDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
}
</script>
</head>
<body>
  <?php include_once 'templates/api/api_loading.php'; ?>
  <?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content pad0">
	   <!-- AppBody Content -->
	   <?php include_once 'templates/api/api_progressbar.php'; ?>
	   
	   <div id="app-actual-content" class="hide-block">
		<div class="container-fluid">
		   <div class="scroller-divison row white-bg">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>
			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
				  <li><a id="usrProfileHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>User Profile</b></a></li>
				  <li><a id="usrSubscriptionHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>User Subscriptions</b></a></li>
				 <?php if(isset($_GET["user_Id"]) && isset($_SESSION["AUTH_USER_ID"])){
				   if($_GET["user_Id"]==$_SESSION["AUTH_USER_ID"]){
				 ?>
 				  <li><a id="usrFriendsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>User Friends</b></a></li>
				 <?php } } ?>
  				  <li><a id="usrCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Community</b></a></li>
				  <li><a id="usrMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		   </div>
		</div>
		
		<div id="usrProfileDisplayDivision" class="container-fluid mtop15p mbot15p hide-block">
		  <?php include_once 'templates/pages/app-user-profile/user-profile.php'; ?>
		</div>
		<div id="usrSubscriptionDisplayDivision" class="container-fluid mtop15p mbot15p hide-block">
		  <?php include_once 'templates/pages/app-user-profile/user-subscription.php'; ?>
		</div>
		<div id="usrFriendsDisplayDivision" class="container-fluid mtop15p mbot15p hide-block">
		  
		</div>
		<div id="usrCommunityDisplayDivision" class="container-fluid hide-block">
		  <?php include_once 'templates/pages/app-user-profile/user-community.php'; ?>
		</div>
		<div id="usrMovementDisplayDivision" class="container-fluid mtop15p hide-block">
		  <?php include_once 'templates/pages/app-user-profile/user-movement.php'; ?>
		</div>
		
	   </div>
	</div>
 
		
  <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>