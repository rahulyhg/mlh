<?php session_start();
 if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Find Community</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/summernote.css" rel="stylesheet"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-find-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-find.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/summernote.js"></script>
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
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>FIND A COMMUNITY</b>
			   </span>
			</div>
		</div>
		<div class="container-fluid">
		   <div class="row">
		      <div class="col-md-12">
			     <div class="panel panel-default">
				    <div class="panel-heading custom-lgt-bg"><b>Search by Location</b></div>
					<div class="panel-body">
					  <!-- Country -->
					  <div class="form-group">
						<label>Country</label>
						<select id="search_english_ByCountry" class="form-control" onchange="javascript:build_stateOption();">
						   <option value="">Select Country</option>
						</select>
					  </div>
					  <!-- State -->
					  <div id="search_english_ByStateDiv" class="form-group hide-block">
						<label>State</label>
						<select id="search_english_ByState" class="form-control" onchange="javascript:build_locationOption();">
						   <option value="">Select State</option>
						</select>
					  </div>
					  <!-- Location -->
					  <div id="search_english_ByLocationDiv" class="form-group hide-block">
						<label>Location</label>
						<select id="search_english_ByLocation" class="form-control" onchange="javascript:build_minlocationOption();">
						   <option value="">Select Location</option>
						</select>
					  </div>
					  <!-- Locality -->
					  <div id="search_english_ByLocalityDiv" class="form-group hide-block">
						<label>Locality</label>
						<select id="search_english_ByLocality" class="form-control">
						   <option value="">Select Locality</option>
						</select>
					  </div>
					  <div class="form-group">
					    <button class="form-control custom-bg"><b>Search</b></button>
					  </div>
					</div>
				 </div>
			  </div>
		   </div>
		   <div class="row">
		      <div class="col-md-12">
			    <div id="searchByLocation" style="margin-bottom:20px;">
			       <div class="list-group mtop10p mbot10p">
				      <div align="center" class="list-group-item">
						 <b>Search <i class="fa fa-hl-circle fa-user" aria-hidden="true"></i> and Stay Connected</b>   
					  </div>
				   </div>
				</div>
			  </div>
		   </div>
		   <div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading custom-lgt-bg"><b>Community Member Request</b></div>
						<div class="panel-body pad0">
						   <div id="comMemreqlistToMe0"class="list-group mb0">
							  <div align="center" class="list-group-item pad0">
							     <img src="images/load.gif" style="width:150px;height:150px;"/>
							  </div>
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
<?php } ?>