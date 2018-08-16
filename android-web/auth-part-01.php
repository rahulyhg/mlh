<?php session_start();
if(isset($_SESSION["AUTHENTICATION_STATUS"])){
if($_SESSION["AUTHENTICATION_STATUS"]=='INCOMPLETED'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-01-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-01.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <style>
 body { background-color:#0ba0da; }
 @font-face { font-family: "mlhfont001";src: url("fonts/BAUHS93.TTF"); }
 @font-face { font-family: "mlhfont002";src: url("fonts/Boogaloo-Regular.otf"); }
 .img-simcard { width:120px;height:auto; }
 .simslot:hover { border:3px solid #fff; }
 #authpart02_moverbtndiv { display:none; }
 </style>
<script type="text/javascript">
function moveto_authpart02(simcarrier,simphoneNumber){
document.getElementById("authpart02_moverbtndiv").style.display="block";
var sessionContent='{"session_set":[{"key":"AUTH_USER_PHONENUMBER","value":"'+simphoneNumber+'"}],';
	sessionContent+='"session_get":["AUTH_USER_PHONENUMBER"]}';
  js_session(sessionContent,function(response){
	//		alert(response);
	//
  });
}
</script>
<style>

</style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
  <!-- If user has two SIM, ask him to choose which to choose.
	     If user has One SIM, check exists in database or not.
	-->
 <div id="auth-part01" class="container-fluid">
   <div id="dualsim_selection" align="center" class="col-md-12 col-xs-12">
     
   </div>
   <div id="authpart02_moverbtndiv" align="center" class="col-md-12 col-xs-12" style="margin-top:120px;">
     <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>initializer/setup-username">
     <button class="btn btn-default"><b>NEXT</b>&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
	 </a>
   </div>
 </div>
 
</body>
</html>
<?php
} else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); }
} else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>