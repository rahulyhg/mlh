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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
.mtop55px { margin-top:55px; }
</style>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?> 
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12">
	   <button class="btn btn-primary" onclick="javascript:window.history.back();">
	    <b><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;Go Back to My Last Page</b>
	   </button>
	 </div>
   </div>
   <div class="row">
   <!-- Hook Definition -->
   <div class="col-md-4">
     <div class="row">
     <div class="col-md-12">
	     <div class="row">
		 <div class="col-md-3">
		   <div class="row">
			   <div align="center" class="col-md-12 mtop55px">
				 <i class="fa fa-5x fa-spin fa-anchor" aria-hidden="true"></i>
			   </div>
		   </div>
		 </div>
		 <div class="col-md-9">
		   <div class="row">
			 <div class="col-md-12"><br/><h5><b>WHAT IS AN HOOK?</b></h5></div>
			 <div class="col-md-12">
			 Tagging Something (Message / Media Content) to the people and bringing their attention 
			 and their opinion on it, we called it as <i>Hook</i>.<br/><br/>
			 <i>With this concept, We named the platform as MyLocalHook, to bring 
			 the attention of people on several things from local level.</i>
			 </div>
		   </div>
		 </div>
	     </div>
	 </div>
	 <div class="col-md-12">
	   <br/>On this Platform, Hook is available in two ways:
	   <ol type="1">
	     <li>Standard Hook</li>
	     <li>Premium Hook</li>
	   </ol>
	 </div>
	 <div class="col-md-12">
	   <br/><h5><b>How Hook works and helps Users?</b></h5><hr/>
	 </div>
	 <div class="col-md-12">
	   Hook is used to promote the topics, Messages and Issues and gets different Feedbacks from different people. 
	   This can be used by Individuals, Businesses and Communities.
	 </div>
     </div>
   </div>
   <!-- Standard Hook Definition -->
   <div class="col-md-4">
     <div class="col-md-12">
	  <hr/><h5><b>STANDARD HOOK</b></h5><hr/>
	 </div>
	 <div class="col-md-12">
	   Standard Hook is a promotion of Something among the Friends and get back their opinion through Comments.
	   This is available to individuals under Free Service.
	 </div>
	 <div class="col-md-12">
	   <br/>Standard Hook Form consists of<br/>
	   <ol type="1">
	     <li>
		   <b>Hook Title:</b> Title of the Topic that to be promoted on the platform.<br/>
		 </li>
		 <li>
		   <b>Hook Description:</b> Description on the Topic that to be promoted on the platform.<br/>
		 </li>
		 <li>
		   <b>Upload Picture<i> (Optional)</i>:</b> Attaching the Picture related to the Topic which is an <i>Optional</i>.<br/>
		 </li>
		  <li>
		   <b>Tagging Friends:</b> User can tag Standard Hook to <i>All Friends</i> or to few <i>Selected Friends</i>.<br/>
		 </li>
	   </ol>
	 </div>
   </div>
   <!-- Premium Hook Definition -->
   <div class="col-md-4">
     <div class="col-md-12">
	  <hr/><h5><b>PREMIUM HOOK</b></h5><hr/>
	 </div>
	 <div class="col-md-12">
	   Premium Hook is a promotion of Something among the People subscribed to a Particular Category
	   and get back their opinion through Comments. This is available to the Businesses and Communities 
	   under Premium Service. Only Businesses and Communities are allowed to tag the Premium Hook.
	 </div>
	 <div class="col-md-12">
	   <br/>Premium Hook Form consists of<br/>
	   <ol type="1">
	     <li>
		    <b>Choose your Business/Community Title:</b> User has to select one of the Title of his Business / Community.<br/>
		 </li>
		 <li>
		    <b>Hook Title:</b> Title of the Topic that to be promoted on the platform.<br/>
		 </li>
		 <li>
		    <b>Hook Description:</b> Description on the Topic that to be promoted on the platform.<br/>
		 </li>
		 <li>
		    <b>Upload Picture (Optional):</b> Attaching the Picture related to the Topic which is an Optional.<br/>
		 </li>
		 <li>
		    <b>Choose your Category:</b> Choose the Category where the Hook should be promoted.<br/>
		 </li>
		 <li>
		    <b>Choose your Sub-Category:</b> Choose the Sub-Category where the Hook should be promoted.<br/>
		 </li>
		 <li>
		    <b>Choose People:</b> Choose the Number of People where the Hook to reach. <br/>
		 </li>
		 <li>
		    <b>Your Premium Hook Price is</b> Displays the Premium Price of the Hook, based on the Number of People
			you Choose to promote the Hook.<br/>
		 </li>
	   </ol>
	 </div>
   </div>
   </div>
 </div>
 <div class="container-fluid">
  <div class="row">
    <div align="center" class="col-md-12">
	 <hr/><h5><b>OTHER LINKS</b></h5><hr/>
	</div>
  </div>
 </div>
 </body>
 </html>