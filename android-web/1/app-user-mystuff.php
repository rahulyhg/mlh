<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>My Stuff</title>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-mystuff-bg-styles.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_mystuff");
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block');
});
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
	<?php include_once 'templates/api/api_header_other.php'; ?>
	<!-- -->
	<div class="container-fluid mtop15p">
	  <div class="row">
	    <div class="col-xs-6">
		 <a href="#">
		  <div class="list-group">
		  <div class="list-group-item pad0" style="background-color:#f9f9f9;">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-5x fa-user custom-font" aria-hidden="true"></i>
		       </div>
		     </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  <div align="center" class="list-group-item pad0 custom-bg">
		    <h5><b>My Profile</b></h5>
		  </div>
		  </div>
		 </a>
		</div>
		<div class="col-xs-6">
		 <a href="#">
		  <div class="list-group">
		  <div class="list-group-item pad0" style="background-color:#f9f9f9;">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-5x fa fa-users custom-font" aria-hidden="true"></i>
		       </div>
		     </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  <div align="center" class="list-group-item pad0 custom-bg">
		    <h5><b>My Friends</b></h5>
		  </div>
		  </div>
		 </a>
		</div>
	  </div>
	  
	  <div class="row">
	    <div class="col-xs-6">
		 <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/news/mylist">
		  <div class="list-group">
		  <div class="list-group-item pad0" style="background-color:#f9f9f9;">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-5x fa-newspaper-o custom-font" aria-hidden="true"></i>
		       </div>
		     </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  <div align="center" class="list-group-item pad0 custom-bg">
		    <h5><b>My Articles</b></h5>
		  </div>
		  </div>
		 </a>
		</div>
		<div class="col-xs-6">
		 <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/mycommunity">
		  <div class="list-group">
		  <div class="list-group-item pad0" style="background-color:#f9f9f9;">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-5x fa fa-university custom-font" aria-hidden="true"></i>
		       </div>
		     </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  <div align="center" class="list-group-item pad0 custom-bg">
		    <h5><b>My Community</b></h5>
		  </div>
		  </div>
		 </a>
		</div>
	  </div>
	  <div class="row">
	    <div class="col-xs-6">
		 <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/mymovements">
		  <div class="list-group">
		  <div class="list-group-item pad0" style="background-color:#f9f9f9;">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-5x fa-hand-paper-o custom-font" aria-hidden="true"></i>
		       </div>
		     </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  <div align="center" class="list-group-item pad0 custom-bg">
		    <h5><b>My Movements</b></h5>
		  </div>
		  </div>
		 </a>
		</div>
	   </div>
	</div>
	
  </div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>