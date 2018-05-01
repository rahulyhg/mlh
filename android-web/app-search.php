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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-search-bg-styles.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
   sideWrapperToggle();
   mainMenuSelection("dn_"+USR_LANG+"_newsfeed");
   bgstyle();
   $(".lang_"+USR_LANG).css('display','block');
 });
</script>
 <?php include_once 'templates/api/api_params.php'; ?>
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
	     <div id="app-page-title" class="list-group pad0" style="margin-bottom:0px;">
			<div align="center" class="list-group-item pad0">
			  <span class="lang_english">
			  <div class="container-fluid pad0">
			    <div class="col-xs-12" style="height:50px;overflow-x:scroll;overflow-y:hidden;">
				  assdddefefwefwefwef we ewe we we ew ewk w we wev wevwe v wev ewvwev wv wevewve
				</div>
			   <!--div id="tpMenu_myprofile" class="col-xs-6" style="padding:10px 8px;" onclick="javascript:sel_tpMenu('tpMenu_myprofile');">
		          <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>MY PROFILE</b>
			   </div>
			   <div id="tpMenu_other" class="col-xs-6"  style="padding:10px 8px;" onclick="javascript:sel_tpMenu('tpMenu_other');">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>OTHER</b>
			   </div-->
			  </div>
			  </span>
			</div>
		</div>
		 
		 
		 
	  </div>
	</div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>