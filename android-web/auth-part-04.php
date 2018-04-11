<?php session_start();
if(isset($_SESSION["AUTHENTICATION_STATUS"])){
if($_SESSION["AUTHENTICATION_STATUS"]=='INCOMPLETED'){
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'templates/api/api_params.php'; ?>
<?php include_once 'templates/api/api_js.php'; ?>
 <title>Authentication</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-04-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-04.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
.card-img-top { width:100px;height:100px;border:1px solid #ccc; }
.card:hover { background-color:#eee;cursor:pointer; }
#intrd-title { height:100px;padding:30px; }
</style>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 <div id="domain_body">
  <span class="lang_english">
	 <div id="intrd-title" class="col-md-12 custom-bg white-font">
	   <h4 align="center" class="uppercase"><b>Choose your Interest</b></h4>
	 </div>
	 <div id="intrd-subtitle" class="col-md-12">
	   <h5 align="center" class="lineh25p"><b>Select few Categories which you are interested to get updates in your NewsFeed</b></h5>
	 </div>
	 
	 <div align="center" id="categories-list" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:15px;width:100%;height:auto;">
	   
	 </div>
	 <div align="center" class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;margin-bottom:65px;width:100%;height:auto;">
	    <button class="btn custom-bg white-font" onclick="javascript:subscribe();"><b>I'm done</b></button>
	 </div>
   </span>
   <!--a href="<?php echo $_SESSION["PROJECT_URL"]?>subscribe/categories">
     <button><b>R</b></button>
   </a-->
</div>
 <!--?php include_once 'templates/api/api_bottom_doc.php'; ?-->
</body>
</html>
<?php 
} else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); }
} else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>
<?php // } ?>