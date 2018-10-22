<?php session_start();
include_once 'templates/api/api_params.php';
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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-search-bg-styles.js"></script>
 <script type="text/javascript"><!-- GLOBAL VARIABLES -->
 var SEARCH_KEYWORD='<?php if(isset($_GET["searchKeyword"])) { echo $_GET["searchKeyword"]; } ?>';
 </script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-search.js"></script>
<style>
body{ background-color:#f7f7f7; }
.img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius: 50%; }
.label-newsfeed { font-size: 10px;padding: 5px; }
</style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	  
	    <div class="container-fluid">
		   <div class="scroller-divison row">
		    <div class="scroller scroller-left col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
			</div>

			<div class="scrollTabwrapper col-xs-10">
				<ul class="nav scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="searchPeopleHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>People</b></a></li>
					<li><a id="searchNewsFeedHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>NewsFeed</b></a></li>
					<li><a id="searchCommunityHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Community</b></a></li>
					<li><a id="searchMovementHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Movements</b></a></li>
				</ul>
			</div>
			<div class="scroller scroller-right col-xs-1" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-right"></i>
			</div>
		  </div>
		</div>

		<div class="container-fluid">
			<div id="searchPeopleDisplayDivision" align="center" class="mtop15p hide-block">
			  <div id="searchPeopleDataResults"></div>
			  <div id="searchPeopleDataload0">
			   <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			  </div>
			</div>
			<div id="searchNewsFeedDisplayDivision" align="center" class="mtop15p hide-block">
			   <div id="searchNewsFeedDataResults"></div>
			   <div id="searchNewsFeedDataload0">
			     <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			   </div>
			</div>
			<div id="searchCommunityDisplayDivision" align="center" class="mtop15p hide-block">
			   <div id="searchCommunityDataResults"></div>
			   <div id="searchCommunityDataload0">
			     <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			   </div>
			</div>
			<div id="searchMovementDisplayDivision" align="center" class="mtop15p hide-block">
			   <div id="searchMovementDataResults"></div>
			   <div id="searchMovementDataload0">
			     <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="margin-top:15px;width:150px;height:150px;"/>
			   </div>
			</div>
		</div>
		 
		 
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>