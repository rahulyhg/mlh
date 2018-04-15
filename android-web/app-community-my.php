<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>My Community</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-my-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-my.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
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
	  
	    <div id="app-page-title" class="list-group pad0">
			<div align="center" class="list-group-item custom-lgt-bg">
		       <span class="lang_english">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>MY COMMUNITY</b>
			   </span>
			</div>
		</div>
		
		<div class="container-fluid">
		
		    <div class="row">
		     <div class="col-md-12">
		       <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/create-community">
		         <button class="btn custom-bg pull-right"><b>Create Community</b></button>
			   </a>
		     </div>
		    </div>
			
			<div class="row mtop15p">
			  <div class="col-md-12">
				<div class="list-group">
				  <div align="center" class="list-group-item custom-bg" style="text-transform:uppercase;font-size:12px;font-weight:bold;">Created Community List</div>
				  <div class="list-group-item"></div>
				  <div align="center" class="list-group-item custom-bg" style="text-transform:uppercase;font-size:12px;font-weight:bold;">Member of Community List</div>
				  <div class="list-group-item"></div>
				  <div align="center" class="list-group-item custom-bg" style="text-transform:uppercase;font-size:12px;font-weight:bold;">Supporting Community List</div>
				  <div class="list-group-item"></div>
				</div>
			  </div>
			</div>
			
		</div>
		
	   </div>
	</div>
	
 </div>
</body>
</html>
<?php } ?>