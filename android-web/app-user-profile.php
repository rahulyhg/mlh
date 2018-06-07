<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
body { background-color:#eee; }
</style>
<script type="text/javascript">
var PROFILE_USER_ID='<?php if(isset($_GET["user_Id"])) { echo $_GET["user_Id"]; } ?>';
$(document).ready(function(){ hzTabSelection("usrSubscriptionPeopleHzTab"); });
function loadDataofUser(){
 
}
function hzTabSelection(id){     
 var arryHzTab=["usrSubscriptionPeopleHzTab","usrCommunityHzTab","usrMovementHzTab"];
 var arryTabDataViewer=["usrSubscriptionPeopleDisplayDivision","usrCommunityDisplayDivision","usrMovementDisplayDivision"];
 hzTabSelector(id,arryHzTab,arryTabDataViewer);
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
	  <?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content pad0">
		<div class="container-fluid pad0 custom-bg"></script>
		    <div class="mtop15p">
				<div class="col-xs-3">
					<div style="width:70px;height:70px;border-radius:50%;background-color:#efefef;"></div>
				</div>
				<div class="col-xs-9">
					<h5 style="color:#d0eaff;text-transform:uppercase;"><b>Kunaal Satija</b></h5>
					<span>Kukatpally, Hyderabad,<br/> Telangana, INDIA</span>
				</div>
				<div class="col-xs-12 mtop15p">
					<button class="btn btn-default pull-right"><b>Edit your Profile</b></button>
				</div>
			</div>
		</div>
		<div class="container-fluid custom-bg">
		   <div class="scroller-divison row white-bg mtop15p">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>
			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="usrSubscriptionPeopleHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>1. User Subscription</b></a></li>
					<li><a id="usrCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>2. Community</b></a></li>
					<li><a id="usrMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>3. Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		   </div>
		</div>
		
		 <div id="usrSubscriptionPeopleDisplayDivision" class="container-fluid mtop15p hide-block">
			<div class="col-xs-12 pad0">
				<div class="list-group" style="margin-bottom:0px;">
					<div class="list-group-item pad0">
						<div class="container-fluid pad0" style="border-bottom:2px solid #000;">
							<div align="center" class="col-xs-1" style="padding:10px;">
								<div class="dropdown">
									<i class="fa fa-ellipsis-h dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
									<ul class="dropdown-menu">
										<li><a href="#">UnSubscribe</a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-10" style="padding:10px;">
							   <b>Entertainments</b>
							</div>
						</div>
					</div>
					<div class="list-group-item pad0">
						<div class="container-fluid pad0">
							<div align="center" class="col-xs-1" style="padding:10px;">
								<div class="dropdown">
									<i class="fa fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
									<ul class="dropdown-menu">
										<li><a href="#">UnSubscribe</a></li>
									</ul>
								</div>
							</div>
							<div class="col-xs-10" style="padding:10px;">
								<b>Movie Cinema and Fun</b>
							</div>
							<div class="col-xs-12" style="padding:10px;">
								<div class="pull-right" style="color:#008000;">
									<i class="fa fa-check" aria-hidden="true"></i>&nbsp;<b>Subscribed</b>
								</div>
							</div>
						</div>
					</div>
				</div>
           </div>
		</div>
  
		<div id="usrCommunityDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
  
		<div id="usrMovementDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
  
	</div>
  </div>
		
  <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>