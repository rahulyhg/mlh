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
<style>
body { background-color:#f7f7f7; }
.mystuff-tmp1 {     background-color: #e91e63;color:#fff; }
.mystuff-tmp2 {     background-color: #f39204;color:#fff; }
.mystuff-tmp3 {     background-color: #1daf23;color:#fff; }
.mystuff-tmp4 {     background-color: #607d8b;color:#fff; }
.mystuff-tmp5 {     background-color: #9c02b7;color:#fff; }
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
	<?php include_once 'templates/api/api_header_other.php'; ?>
	<!-- -->
	<div class="container-fluid mtop15p">
	  <div class="row">
	    <div class="col-xs-6">
		 <a href="#" class="a-custom">
		  <div class="list-group">
		  <div class="list-group-item pad0 mystuff-tmp1">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-3x fa-user" aria-hidden="true"></i>
		       </div>
		     </div>
			 <div class="row">
	           <div align="center" class="col-xs-12">
				 <h5><b>My Profile</b></h5>
		       </div>
		     </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  </div>
		 </a>
		</div>
		<div class="col-xs-6">
		 <a href="#" class="a-custom">
		  <div class="list-group">
		  <div class="list-group-item pad0 mystuff-tmp2">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-3x fa fa-users" aria-hidden="true"></i>
		       </div>
		     </div>
			 <div class="row">
	           <div align="center" class="col-xs-12">
			    <h5><b>My Friends</b></h5>
			   </div>
			 </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  </div>
		 </a>
		</div>
	  </div>
	  
	  <div class="row">
	    <div class="col-xs-6">
		 <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/news/mylist" class="a-custom">
		  <div class="list-group">
		  <div class="list-group-item pad0 mystuff-tmp3">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-3x fa-newspaper-o" aria-hidden="true"></i>
		       </div>
		     </div>
			 <div class="row">
	           <div align="center" class="col-xs-12">
			     <h5><b>My Articles</b></h5>
			   </div>
			 </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  </div>
		 </a>
		</div>
		<div class="col-xs-6">
		 <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/mycommunity" class="a-custom">
		  <div class="list-group">
		  <div class="list-group-item pad0 mystuff-tmp4">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-3x fa fa-university" aria-hidden="true"></i>
		       </div>
		     </div>
			 <div class="row">
	           <div align="center" class="col-xs-12">
			     <h5><b>My Community</b></h5>
			   </div>
			  </div>
		    </div>
			<!-- Content ::: END -->
		  </div> 
		  </div>
		 </a>
		</div>
	  </div>
	  <div class="row">
	    <div class="col-xs-6">
		 <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/mymovements" class="a-custom">
		  <div class="list-group">
		  <div class="list-group-item pad0 mystuff-tmp5">
		    <!-- Content ::: START -->
			<div class="container-fluid mtop15p mbot15p">
	         <div class="row">
	           <div align="center" class="col-xs-12">
				 <i class="fa fa-3x fa-hand-paper-o" aria-hidden="true"></i>
		       </div>
		     </div>
			 <div class="row">
	           <div align="center" class="col-xs-12">
			     <h5><b>My Movements</b></h5>
			   </div>
			 </div>
		    </div>
			<!-- Content ::: END -->
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