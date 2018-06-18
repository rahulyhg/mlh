<?php session_start();
 // if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Create Community</title>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create.js"></script>
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
				  <b>CREATE A COMMUNITY</b>
			   </span>
			</div>
			
			<div align="center" class="custom-bg">
			  <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/avatar/0.jpg" class="profile_pic_img mtop20p mbot20p"/>
			  <br/><button class="btn custom-lgt-bg mbot20p"><span class="f14"><b>Edit Profile Picture</b></span></button>
			</div>
			
		 </div>
		
		 <div class="container-fluid">
		   
		   <div class="form-group">
			  <label>Community Name:</label>
			  <input type="text" class="form-control" id="add_unionName" placeholder="Enter your Community Name">
		   </div>
		   
		   <div class="form-group">
			  <label>Choose a Category:</label>
			  <select class="form-control">
				<option value="">Select your Category</option>
			  </select>
		   </div>
		   
		   <div class="form-group">
			  <label>Choose a Sub-Category:</label>
			  <select class="form-control">
				<option value="">Select your Sub-Category</option>
			  </select>
		   </div>
		   
		   <div class="form-group">
			  <label>Your Designation in Community:</label>
			  <input type="text" class="form-control" id="add_designation" placeholder="Enter your Designation">
		   </div>
		   
		   <div class="form-group">
			  <label>Choose Country:</label>
			  <select class="form-control">
				<option value="">Select your Country</option>
			  </select>
		   </div>
		   
		   <div class="form-group">
			  <label>Choose State:</label>
			  <select class="form-control">
				<option value="">Select your State</option>
			  </select>
		   </div>
		   
		   <div class="form-group">
			  <label>Choose Location:</label>
			  <select class="form-control">
				<option value="">Select your Location</option>
			  </select>
		   </div>
		   
		   <div class="form-group">
			  <label>Choose Locality:</label>
			  <select class="form-control">
				<option value="">Select your Locality</option>
			  </select>
		   </div>
		   
		   <div class="form-group">
			  <button class="btn custom-bg form-control"><span class="f14"><b>Create Community</b></span></button>
		   </div>
		   
		 </div>
		  
	   </div>
	 </div>
 </div>
</body>
</html>
<?php // }?>