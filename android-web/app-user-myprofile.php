<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>My Profile</title>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-myprofile-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-myprofile.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
<script type="text/javascript">
function loadUserProfile(){
// load  
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
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
		 <div id="app-page-title" class="list-group pad0" style="margin-bottom:0px;">
			<div align="center" class="list-group-item custom-lgt-bg">
		       <span class="lang_english">
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>MY PROFILE</b>
			   </span>
			</div>
			<div align="center" class="list-group-item pad0">
				<img src="<?php echo $_SESSION["AUTH_USER_PROFILEPIC"]; ?>" style="width:100%;height:auto;"/>
			</div>
			<div align="center" class="list-group-item custom-bg">
				<i class="fa fa-edit"></i>&nbsp;<b>Edit Profile Picture</b>
			</div>
			
			<!-- Username -->
			<div class="list-group-item">
			   <label>Username</label>
			   <div class="input-group">
			    <div class="form-control">
			      <div><?php echo $_SESSION["AUTH_USER_USERNAME"]; ?></div>
			    </div>
				<span class="input-group-addon custom-bg"><i class="fa fa-edit"></i></span>
			   </div>
			</div>
			
			<div align="center" class="list-group-item custom-lgt-bg">GENERAL INFORMATION</div>
			
			<div class="list-group-item">
			  <div class="col-md-12 pad0">
				  <button class="mbot15p btn custom-bg pull-right"><i class="fa fa-edit"></i></button>
			  </div>
			  <!-- Surname -->
			  <div class="col-md-12 mtop15p">
			   <label>Surname</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_SURNAME"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- Fullname -->
			  <div class="col-md-12 mtop15p">
			   <label>Fullname</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_FULLNAME"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- Gender -->
			  <div class="col-md-12 mtop15p">
			   <label>Gender</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_GENDER"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- Mobile Number -->
			  <div class="col-md-12 mtop15p">
			   <label>Mobile Number</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_COUNTRYCODE"]."-".$_SESSION["AUTH_USER_PHONENUMBER"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- DOB -->
			  <div class="col-md-12 mtop15p">
			   <label>Date of Birth</label>
			   <div class="input-group form-control">
			      <div><?php echo date_format(date_create($_SESSION["AUTH_USER_DOB"]),"d F Y"); ?></div>
			   </div>
			  </div>
			  
			  <!-- COUNTRY -->
			  <div class="col-md-12 mtop15p">
			   <label>Country</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_COUNTRY"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- STATE -->
			  <div class="col-md-12 mtop15p">
			   <label>State</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_STATE"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- LOCATION -->
			  <div class="col-md-12 mtop15p">
			   <label>Location</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_LOCATION"]; ?></div>
			   </div>
			  </div>
			  
			  <!-- LOCALITY -->
			  <div class="col-md-12 mtop15p mbot15p">
			   <label>Locality</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_LOCALITY"]; ?></div>
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