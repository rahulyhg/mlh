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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
.custom-lgt-bg2 { background-color:#d9edf7;color:#000; }
.mtop15p { margin-top:15px; }
.mbot15p { margin-bottom:15px; }
.pad0 { padding:0px; }
.pad5 { padding:5px; }
.f12 { font-size:12px; }
.f24 { font-size:24px; }
.fa-icon-circle1 { border:3px solid #fff;padding:10px;border-radius:50%; }
.fa-icon-circle2 { border:2px solid #000;border-radius:50%;padding-right:12px;padding-left:12px;padding-top:7px;padding-bottom:7px; }
.fa-icon-circle3 { border:2px solid #000;border-radius:50%;padding:10px;padding-left:10px; }
.fa-icon-circle4 { border:2px solid #000;border-radius:50%;padding:7px; }
.fa-icon-circle5 { border:2px solid #000;border-radius:50%;padding-right:12px;padding-left:12px;padding-top:10px;padding-bottom:10px; }
</style>
<script type="text/javascript">
$(document).ready(function(){ hzTabSelection('notifyOverviewHzTab'); });
function hzTabSelection(id){
 var arryHzTab=["notifyOverviewHzTab","notifyRequestsHzTab","notifyNewsHzTab","notifyMovementsHzTab"];
 var arryTabDataViewer=["notifyOverviewDisplayDivision","notifyRequestsDisplayDivision","notifyNewsDisplayDivision","notifyMovementsDisplayDivision"];
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
		<div class="container-fluid custom-bg">
			<div align="center" class="col-xs-12">
			   <i class="fa fa-3x fa-bell fa-icon-circle1" aria-hidden="true"></i><br/>
			   <div class="mtop15p mbot15p"><b>NOTIFICATIONS</b></div>
			</div>
		</div>
		<div class="container-fluid">
		   <div class="scroller-divison row">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>

			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="notifyOverviewHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Overview</b></a></li>
					<li><a id="notifyRequestsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>1. Requests</b></a></li>
					<li><a id="notifyNewsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>2. News</b></a></li>
					<li><a id="notifyMovementsHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>3. Movements</b></a></li>
				</ul>
			</div>
			
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
			
		  </div>
		</div>
		
		<div id="notifyOverviewDisplayDivision" class="container-fluid mtop15p hide-block">
			<div class="col-xs-12">
				<div class="list-group">
					<div class="list-group-item pad0">
						<div class="container-fluid custom-bg pad0">
							<div align="center" class="f12 col-xs-12 pad5">
								<i class="fa fa-rotate-270 fa-paper-plane" aria-hidden="true"></i>&nbsp;
								<b>PENDING REQUESTS</b>
							</div>
						</div>
					</div>
					<div class="list-group-item custom-lgt-bg2 pad0">
						<div class="container-fluid pad0">
							<div align="center" class="col-xs-6 pad5">
								<div class="mtop15p">
									<i class="fa fa-2x fa-user fa-icon-circle2" aria-hidden="true"></i>
								</div>
								<div class="mtop15p">
									<div class="f12">You have</div>
									<div class="f24 custom-font"><b>100000</b></div>
									<div class="f12">Relationship Requests</div>
								</div>
							</div>
							<div align="center" class="col-xs-6 pad5" style="border-left:1px solid #ccc;">
								<div class="mtop15p">
									<i class="fa fa-2x fa-bank fa-icon-circle3" aria-hidden="true"></i>
								</div>
								<div class="mtop15p mbot15p">
									<div class="f12">You have</div>
									<div class="f24 custom-font"><b>100000</b></div>
									<div class="f12">Community<br/> Membership Requests</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="list-group">
					<div class="list-group-item pad0">
						<div class="container-fluid custom-bg pad0">
							<div align="center" class="col-xs-12 f12 pad5">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>NEWSFEED</b>
							</div>
						</div>
					</div>
					<div class="list-group-item pad0">
						<div class="container-fluid custom-lgt-bg2 pad0">
							<div align="center" class="col-xs-6 pad5">
								<div class="mtop15p">
									<i class="fa fa-2x fa-check fa-icon-circle4" aria-hidden="true"></i>
								</div>
								<div class="mtop15p">
									<div class="f12">You have watched</div>
									<div class="f24 custom-font"><b>100000</b></div>
									<div class="f12">News till Today</div>
								</div>
							</div>
							<div align="center" class="col-xs-6 pad5" style="border-left:1px solid #ccc;">
								<div class="mtop15p">
									<i class="fa fa-2x fa-crosshairs fa-icon-circle5" aria-hidden="true"></i>
								</div>
								<div class="mtop15p mbot15p">
									<div class="f12">You have</div>
									<div class="f24 custom-font"><b>100000</b></div>
									<div class="f12">News to Watch</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="list-group">
					<div class="list-group-item pad0">
						<div class="container-fluid custom-bg pad0">
							<div align="center" class="col-xs-12 f12 pad5">
								<i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;<b>MOVEMENT</b>
							</div>
						</div>
					</div>
					<div class="list-group-item pad0">
						<div class="container-fluid custom-lgt-bg2 pad0">
							<div align="center" class="col-xs-6 pad5">
								<div class="mtop15p">
									<i class="fa fa-2x fa-check fa-icon-circle4" aria-hidden="true"></i>
								</div>
								<div class="mtop15p">
									<div class="f12">You have supported</div>
									<div class="f24 custom-font"><b>100000</b></div>
									<div class="f12">Movements till Today</div>
								</div>
							</div>
							<div align="center" class="col-xs-6 pad5" style="border-left:1px solid #ccc;">
								<div class="mtop15p">
									<i class="fa fa-2x fa-crosshairs fa-icon-circle5" aria-hidden="true"></i>
								</div>
								<div class="mtop15p mbot15p">
									<div class="f12">You have</div>
									<div class="f24 custom-font"><b>100000</b></div>
									<div class="f12">Movements waiting for your participation</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  
		<div id="notifyRequestsDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
		
		<div id="notifyNewsDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
		
		<div id="notifyMovementsDisplayDivision" class="container-fluid mtop15p hide-block">
		
		</div>
		
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>
