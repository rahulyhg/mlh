<?php session_start();
// if(isset($_SESSION["AUTH_USER_ID"])) {
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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-explore-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-explore.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
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
		<div id="app-page-title" class="list-group pad0">
			<div align="center" class="list-group-item custom-lgt-bg">
		       <span class="lang_english">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>EXPLORE</b>
			   </span>
			</div>
		</div>

		<div class="container-fluid">
		
		  <div class="col-xs-12">
		  
		    <div class="list-group">
				<div class="list-group-item custom-bg" style="padding:4px 1px;">
					<div class="container-fluid pad0">
					  <div class="col-xs-12">
					    <button class="btn btn-default pull-right" style="border-radius:25px;padding:1px 2px;">
						  <i class="fa fa-check"></i>
						</button>
						<span style="font-size:11px;"><b>ARTS, CULTURE AND ENTERTAINMENT</b></span>
					  </div>
					</div>
				</div>
				<div class="list-group-item" style="padding:5px 5px;">
					<div class="container-fluid pad0">
						<div align="center" class="col-xs-5">
						  <h5><b>BUSINESSES</b></h5>
						  <span>0</span>
						</div>
						<div align="center" class="col-xs-5">
						  <h5><b>COMMUNITIES</b></h5>
						  <span>0</span>
						</div>
						<div align="center" class="col-xs-2"><br/>
							<a href="#subcategories" data-toggle="collapse">
							<i class="fa fa-angle-double-down pull-right" style="font-size:21px;"></i>
							</a>
						</div>
					</div>
				</div>
			   <div id="subcategories" class="collapse">
				<div align="center" class="list-group-item custom-bg" style="padding:5px 5px;">
					<span style="font-size:11px;"><b>SUB-CATEGORIES</b></span>
				</div>
				<div class="list-group-item" style="padding:5px 5px;">
				  <div class="container-fluid pad0">
					  <div class="col-xs-12">
					    <button class="btn custom-bg pull-right" style="border-radius:25px;padding:1px 2px;">
						  <i class="fa fa-check"></i>
						</button>
						<span style="font-size:11px;"><b>ARTS, CULTURE AND ENTERTAINMENT</b></span>
					  </div>
					</div>
				</div>
			   </div>
			</div>
			
		  </div>
		
	  </div>
	</div>
 </div>
</body>
</html>
<?php // } ?>