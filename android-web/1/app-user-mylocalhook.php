<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include_once 'templates/api/api_js.php'; ?>
 <title>MyLocalHook</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap-toggle.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap-slider.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap-toggle.min.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap-slider.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-mylocalhook-bg-styles.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
<style>
body { background-color: #f7f7f7; }
</style>
<script type="text/javascript">
$(document).ready(function(){
 sideWrapperToggle();
 bgstyle(3);
 mainMenuSelection("dn_"+USR_LANG+"_mylocalhook");
 $(".lang_"+USR_LANG).css('display','block');
 selMenu_hookTab('tab_buddyhook_Id');
});
</script>
<script type="text/javascript">
function selMenu_hookTab(id){
 var arry_Id=["tab_buddyhook_Id","tab_publichook_Id"];
 var arry_content=["tab_buddyhook_content","tab_publichook_content"];
 for(var index=0;index<arry_Id.length;index++){
  if(arry_Id[index]===id){
      if(!$('#'+arry_Id[index]).hasClass('custom-font')){ $('#'+arry_Id[index]).addClass('custom-font'); }
      $('#'+arry_Id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	  $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR);
	  if($('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).removeClass('hide-block'); }
  } else {
     if($('#'+arry_Id[index]).hasClass('custom-font')){ $('#'+arry_Id[index]).removeClass('custom-font'); }
	 $('#'+arry_Id[index]).css('border-bottom','0px ');
	 $('#'+arry_Id[index]).css('color','#000');
	 if(!$('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).addClass('hide-block'); }
  }
 }
}
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
	<?php include_once 'templates/api/api_header_hook.php'; ?>
	<div class="list-group">
	  <div class="list-group-item">
	    <div class="container-fluid">
		  <div class="row">
		    <div align="center" class="col-xs-6">
			   <span id="tab_buddyhook_Id" class="pad10" onclick="javascript:selMenu_hookTab(this.id);">
			      <b>Buddy Hook</b>
			   </span>
			</div>
			<div align="center" class="col-xs-6">
			   <span id="tab_publichook_Id" class="pad10" onclick="javascript:selMenu_hookTab(this.id);">
			      <b>Public Hook</b>
			   </span>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<div id="app-page-content">
	  <div id="tab_buddyhook_content" class="container-fluid hide-block">
	    <!--div align="center">
		  <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="width:150px;height:150px;">
		</div-->
		<?php include_once 'templates/pages/app-hook-buddy.php'; ?>
	  </div>
	  <div id="tab_publichook_content" class="container-fluid hide-block">
	    <div align="center">
		  <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" style="width:150px;height:150px;">
		</div>
	  </div>
	</div>
  </div>
</div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>