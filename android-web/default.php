<?php 
session_start();
if(!isset($_SESSION["USR_LANG"])) { $_SESSION["USR_LANG"]='english'; } 
if(!isset($_SESSION["AUTHENTICATION_STATUS"])){ $_SESSION["AUTHENTICATION_STATUS"]='INCOMPLETED'; }
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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <style>
 body { background-color:#0ba0da; }
 @font-face { font-family: "mlhfont001";src: url("fonts/BAUHS93.TTF"); }
 @font-face { font-family: "mlhfont002";src: url("fonts/Boogaloo-Regular.otf"); }
 </style>
<script type="text/javascript">
$(document).ready(function(){
 $(".lang_"+USR_LANG).css('display','block');
});
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <!--?php include_once 'templates/api/api_header_init.php'; ?-->
 <div id="auth-part01" class="container-fluid">
   <div align="center" class="col-md-12">
    <h3 style="font-family:'mlhfont001';color:#fff;line-height:50px;">
      <img src="images\logo-blue-flat.jpg" style="width:150px;height:auto;"/><br/>
	  Welcomes you<br/>
    </h3>
   </div>
   <div align="center" class="col-md-12" style="margin-top:100px;">
    <h4  style="font-family:'mlhfont002';color:#fff;line-height:35px;">
	  STAY CONNECTED TO YOUR LOCAL ENVIRONMENT BY CONNECTING TO PEOPLE AROUND YOU</h5>
   </div>
   <div align="center" class="col-md-12" style="margin-top:120px;">
     <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>initializer/start">
     <button class="btn btn-default">
	 <b>START MY JOURNEY</b>&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
	 </a>
   </div>
 </div>
</body>
</html>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); } ?>