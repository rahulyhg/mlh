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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-news-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-news.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script type="text/javascript">
 var INPUT_PARAM01='<?php if(isset($_GET["1"])) { echo $_GET["1"]; }  ?>';
 var INPUT_PARAM02='<?php if(isset($_GET["1"])) { echo $_GET["2"]; }  ?>';
 </script>
 <style>
 body,.f12 { font-size:12px; }
 a,a:hover { color:#000; }
.viewReadPeopleAndImpressionsList { cursor:pointer; }

.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
/* @media screen and (min-width: 1200px) {  //lg

}
@media (min-width: 992px) and (max-width: 1199px) {  // col-md
.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
}
@media (min-width: 768px) and (max-width: 991px) { // col-sm
.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
}
@media (max-width: 767px) { // col-xs
.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
} */
.fa-22px { font-size:22px; } </style>
 </head>
<body>
<!-- Modal -->
<div id="appNewsFeedNewsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	    <div class="container-fluid mtop15p">
		  <div class="row">
				    <!-- News Feed -->
				    <div id="div-newsFeed-news" class="col-md-8 col-xs-12 pad10">  
					  <div align="center">
						<img src="images/load.gif" style="width:150px;height:150px;"/>
					  </div>
					</div>
			
			        <div align="center" class="col-md-4 col-xs-12 pad10" style="border-left:1px solid #ccc;">
					  <div class="list-group" style="margin-bottom:0px;">
					    <div class="list-group-item">
					     <div class="container-fluid pad0">
						  <div class="col-md-12 col-xs-12">
							<h4 style="line-height:25px;">Is this News, a Public Issue?<br/>
							Do you want to <i class="fa fa-22px fa-bullhorn" aria-hidden="true"></i> Raise a Voice against it?</h4>
						  </div>
						  <div class="col-md-12 col-xs-12">
						     <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/create-movement">
							   <button class="btn custom-bg"><b>Start a Movement</b></button>
							 </a>
						  </div>
						 </div>
						 </div>
					  </div>
					  <hr/>
					  <div class="list-group">
						 <div align="center" class="list-group-item pad0 custom-bg">
						     <h5><b>Movement related to News</b></h5>
						 </div>
						 <div class="list-group-item"></div>
					  </div>
					   
					</div>
					<!-- Friend Request -->
				    <!--div class="col-md-4 col-xs-12">
					   <div class="panel panel-default">
					      <div class="panel-heading custom-lgt-bg"><b>Related News Feed</b></div>
						  <div class="panel-body pad0">
						     <div class="list-group">
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
								
							 </div>
						  </div>
					   </div>
					</div-->
          </div>
		</div>
			
	   </div>
	</div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>