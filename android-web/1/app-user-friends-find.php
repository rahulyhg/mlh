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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-friends-find-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-friends-find.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
 <style>
 body,.f12 { font-size:12px; }
.navbar { margin-bottom:0px; }
.frnshipreqdiv { padding:1px;line-height:20px; }
.frnshipreqaddr { color:#777;font-size:12px; }
.fa-hl-circle { border:2px solid #000;padding:10px;border-radius:50%; }
.silver-font { color:#aaa; }
.hide-block { display:none; }
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
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	     <div id="app-page-title" class="list-group pad0">
			<div align="center" class="list-group-item custom-lgt-bg">
		       <span class="lang_english">
				  <i class="fa fa-users" aria-hidden="true"></i>&nbsp; <b>FIND FRIENDS</b>
			   </span>
			   <span class="lang_telugu">
				  <i class="fa fa-users" aria-hidden="true"></i>&nbsp; <b>స్నేహితుల అన్వేషణ</b>
			   </span>
		    </div>
		 </div>
		 
		 <div class="container-fluid">
			      <!-- First Row -->
			      <div class="col-md-4 col-xs-12 pad10">
				  
				     <!-- Search People By Location -->
					 <div class="panel panel-default">
					    <div class="panel-heading custom-lgt-bg"><b>Search people by Location</b></div>
						<div class="panel-body">
						   <div class="form-group">
							  <label>Country:</label>
							  <select id="search_english_ByCountry" class="form-control" onchange="javascript:build_stateOption();">
							     <option value="">Select your Country</option>
							  </select>
						   </div>
						   <div id="search_english_ByStateDiv" class="form-group hide-block">
							  <label>State:</label>
							  <select id="search_english_ByState" class="form-control" onchange="javascript:build_locationOption();">
							     <option value="">Select your State</option>
							  </select>
						   </div>
						   <div id="search_english_ByLocationDiv" class="form-group hide-block">
							  <label>Location:</label>
							  <select id="search_english_ByLocation" class="form-control" onchange="javascript:build_minlocationOption();">
							     <option value="">Select your Location</option>
							  </select>
						   </div>
						   <div id="search_english_ByLocalityDiv" class="form-group hide-block">
							  <label>Locality:</label>
							  <select id="search_english_ByLocality" class="form-control">
							     <option value="">Select your Locality</option>
							  </select>
						   </div>
						   <div class="form-group">
						      <button class="btn custom-bg white-font form-control" onclick="javascript:searchPeopleByLocation();"><b>Search</b></button>
						   </div>
						</div>
					 </div>

					 <!-- Search Heading -->
					   <div id="searchByLocation" >
						   <div class="list-group mtop10p mbot10p">
							 <div align="center" class="list-group-item">
								<b>Search <i class="fa fa-hl-circle fa-user" aria-hidden="true"></i> and Stay Connected</b>   
							 </div>
						   </div>
					   </div>
					   <!-- Search Results -->
					   
					 <!-- Respond to Friend Requests -->
				     <div class="panel panel-default">
					    <div class="panel-heading custom-lgt-bg curpoint" data-toggle="collapse" data-target="#div_friendsreqlist">
						      <b>Respond to My Friend Requests <span id="totalFrndReqToMeCount"></span></b>
							  <i class="fa fa-angle-double-down pull-right" aria-hidden="true"></i>
						</div>
						<div id="div_friendsreqlist" class="panel-body pad0 collapse in">
						   <div id="friendsreqlistToMe0" class="list-group mb0">
							  <div align="center" class="list-group-item">
							     <img src="images/load.gif" style="width:150px;height:150px;"/>
							  </div>
						   </div>
						</div>
					 </div>
					 
				     
				  </div>
			  
			      <div class="col-md-8 col-xs-12 pad10">
				      
					 <!-- Respond to Friend Requests -->
				     <!--div class="panel panel-default">
					    <div class="panel-heading custom-lgt-bg curpoint" data-toggle="collapse" data-target="#div_oursuggestions">
						      <b>Our Suggestions</b>
							  <i class="fa fa-angle-double-down pull-right" aria-hidden="true"></i>
						</div>
						<div id="div_oursuggestions" class="panel-body pad0 collapse in">
						   <div id="suggestpeople0" class="list-group mb0">
						      <div align="center" class="list-item-group">
							     <img src="images/load.gif" style="width:150px;height:150px;"/>
							  </div>
						   </div>
						</div>
					 </div-->
					 
				  </div>
			      <!-- Second Row -->
			  </div>
			
			
	  </div>
	</div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>