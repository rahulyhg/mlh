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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-notifications.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
<style>
.fa-notification-icon { font-size:18px;border:1px solid #2196F3;border-radius:50%;padding:5px;background-color:#2196F3;color:#fff; }
.notification-title { color:#2196F3;font-weight:bold; }
.notification-silver { color:#73879C; }
.list-group { margin-bottom:0px; }
</style>
<script type="text/javascript">
$(document).ready(function(){
js_ajax("GET",PROJECT_URL+"backend/php/dac/controller.page.notifications.php",
{action :'DisplayNotifications',subscriptionList:AUTH_USER_SUBSCRIPTIONS_LIST},function(response){
console.log(response);
});
});

</script>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content pad0">
	    <div class="container-fluid pad0">
		   <div class="col-md-12 pad0">
	        <div class="list-group">
			  <div align="center" class="list-group-item" style="background-color:#aad9ff;border:1px solid #aad9ff;border-radius:0px;">
			    <i class="fa fa-bell" aria-hidden="true"></i>&nbsp;<b>NOTIFICATIONS</b>
			  </div>
			</div>
		   </div>
		</div>
	    <div class="container-fluid pad0">
		  <div class="col-md-6 pad0">
	        <div class="list-group">
			  <!-- Hook Message : LeftSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-anchor" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone hooked you</div>
					 <div><h5><b>DISPLAY HOOK TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">Today, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Hook Message : RightSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone hooked you</div>
					 <div><h5><b>DISPLAY HOOK TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">Today, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-anchor" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-12 col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- NewsFeed : LeftSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-newspaper-o" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone posted in NewsFeed</div>
					 <div><h5><b>NEWSFEED TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- NewsFeed : RightSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone posted in NewsFeed</div>
					 <div><h5><b>NEWSFEED TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-newspaper-o" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Movement : LeftSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-hand-grab-o" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone raised a Movement</div>
					 <div><h5><b>MOVEMENT TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Movement : RightSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone raised a Movement</div>
					 <div><h5><b>MOVEMENT TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-hand-grab-o" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Community Message : LeftSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-envelope" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone messaged in a Community</div>
					 <div><h5><b>COMMUNITY TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Community Message : RightSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone messaged in a Community</div>
					 <div><h5><b>COMMUNITY TITLE</b></h5></div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-2 col-xs-2">
				     <i class="fa fa-notification-icon fa-envelope" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Personal Message : LeftSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-2 col-xs-2">
				    <i class="fa fa-notification-icon fa-envelope" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone messaged you</div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- Personal Message : RightSideIcon -->
			  <div class="list-group-item">
			    <div class="container-fluid pad0">
				  <div class="col-md-10 col-xs-10">
				     <div class="notification-title">Someone messaged you</div>
					 <div align="right"><span class="notification-silver">02 March 2018, 10:35 PM</span></div>
				  </div>
				  <div class="col-md-2 col-xs-2">
				     <i class="fa fa-notification-icon fa-envelope" aria-hidden="true"></i>
				  </div>
				  <div class="col-md-12  col-xs-12">
					   Film festivals used to be do-or-die moments for movie makers. 
					   They were where you met the producers that could fund your project.
			      </div>
				  <div align="right" class="col-md-12 col-xs-12 mtop5p">
				    <span class="notification-silver">
					  <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Watched</span>
				  </div>
				</div>
			  </div>
			  <!-- No More Notifications -->
			  <div align="center" class="list-group-item">
			     <div class="notification-title"> NO MORE NOTIFICATIONS</div>
			  </div>
			</div>
		  </div>
		  <div class="col-md-6">
		  
		  </div>
		</div>
	  </div>
	</div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>