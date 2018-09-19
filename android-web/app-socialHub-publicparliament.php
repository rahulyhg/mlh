<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Social Hub - Home</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-publicparliament-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
});
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 
 <div class="list-group" style="margin-bottom:0px;">
 <div class="list-group-item" style="background-color:#e7e7e7;border-radius:0px;">
   <div class="container-fluid">
   <div class="row">
    <div class="col-xs-12"><span style="font-size:16px;">
      <b>Public Parliament</b></span>&nbsp; is a point where the people can interact with Political Representatives.
    </div>
   </div>
  </div>
 </div>
 </div>
 
 <div class="container-fluid mtop15p">
 <div class="row">
 <div class="col-xs-12">
 <div class="list-group">
 <div class="list-group-item" style="background-color:#f8f8f8;">
  <h5><b>Unions and Associations</b></h5>
 </div>
 <div class="list-group-item pad0">
 <div class="container-fluid mtop15p">
 <div class="row">
 <div class="col-xs-12">
 Find Unions and Associations around you in various categories and sub-categories.
 </div>
 <div class="col-xs-12">
  <a href="<?php echo $_SESSION["PROJECT_URL"]; ?>app/socialHub/publicparliament/unionsAndAssociations/home">
   <button class="btn btn-default pull-right mtop15p mbot15p"><b>View Unions and Associations</b></button>
  </a>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 
 <div class="container-fluid mtop15p">
 <div class="row">
 <div class="col-xs-12">
 <div class="list-group">
 <div class="list-group-item" style="background-color:#f8f8f8;">
  <h5><b>Political Parties</b></h5>
 </div>
 <div class="list-group-item pad0">
 <div class="container-fluid mtop15p">
 <div class="row">
 <div class="col-xs-12">
 Find the Political Parties in different States and Nation participating in State Assemblies and National Parliament.
 </div>
 <div class="col-xs-12">
  <button class="btn btn-default pull-right mtop15p mbot15p"><b>View Political Parties</b></button>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 
 <div class="container-fluid mtop15p">
 <div class="row">
 <div class="col-xs-12">
 <div class="list-group">
 <div class="list-group-item" style="background-color:#f8f8f8;">
  <h5><b>Political Representatives</b></h5>
 </div>
 <div class="list-group-item pad0">
 <div class="container-fluid mtop15p">
 <div class="row">
 <div class="col-xs-12">
 Find Political Representatives particpating in State Assembly and National Parliament.
 </div>
 <div class="col-xs-12">
  <button class="btn btn-default pull-right mtop15p mbot15p"><b>View Political Representatives</b></button>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
	 
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>