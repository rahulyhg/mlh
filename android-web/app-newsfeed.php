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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
/* CSS : Start */
body { background-color:#f7f7f7; }
.socio-btn { padding:5px; color:#fff; }
.custom-silver { background-color:#6c7881; }
body,.f12 { font-size:12px; }
.f14 { font-size:14px; }
.f11 { font-size:11px; }
.fa-18px { font-size:18px; }
.fa-16px { font-size:16px; }
.fa-14px { font-size:14px; }
.fa-12px { font-size:12px; }
pad0 { padding:0px; }
.newsfeedlistgroup { padding-left:0px;padding-top:15px;padding-bottom:15px;padding-right:0px; }
a.newsfeed-content { color:#000; }
.label-newsfeed { font-size:10px;padding:5px; }
.txtunderline:hover { border-bottom:2px solid #ccc; }
.pad5 { padding:5%; }
.pad5px { padding:5px; }
.title>h5 { width:100%;line-height:22px; }
.padtop15px { padding-top:15px; }
.postedBy { color:#000;font-size:12px; }
.mbot15px { margin-bottom:15px; }
.dropdown-menu>li>a { padding:8px 12px;font-size:12px; }
.padleft0px { padding-left:0px; }
.bblack { border:1px solid #fff;}
/* CSS : End */	
</style>
<script type="text/javascript">
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
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	
		 <!-- Public NewsFeed -->
		 
		 <div id="publicNewsFeedlist" class="container-fluid mtop20p mbot15p" style="padding:0px;">
            <div id="publicNewsFeedlist0" align="center">
			   <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		 </div>
		 
		 <!-- User Favourites NewsFeed -->
		 <!--div id="userFavNewsFeedlist0" class="container-fluid mbot15p hide-block">
           <div align="center">
		     <img src="images/load.gif" style="width:150px;height:150px;"/>
		   </div>
		 </div-->
				
		 <!-- Search NewsFeed -->
		 <!--div id="searchNewsFeedlist0" class="container-fluid mbot15p hide-block">
            <div align="center">
			   <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		</div-->
		
	  </div>
	</div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>