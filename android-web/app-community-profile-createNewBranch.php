<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Create Community</title>
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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <style>
.pad0 { padding:0px; }
.mtop5p { margin-top: 5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot5p { margin-bottom:5px; }
.mbot10p { margin-bottom:10px; }
.mbot15p { margin-bottom:15px; }
</style>
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
 <div align="center" class="list-group-item" style="background-color:#f5f5f5;">
 <h5 class="uppercase"><b>Create New Branch</b></h5>
 </div>
 </div>
 <script type="text/javascript">
$(document).ready(function(){
 communityCreateNewBranch('communityNewBranch_branchInfo');
});
function communityCreateNewBranch(id){
 var arry_Id=["communityNewBranch_branchInfo","communityNewBranch_members"];
 var arry_Id_content=["communityNewBranch_branchInfo_content","communityNewBranch_members_content"];
 for(var index=0;index<arry_Id.length;index++){
    for(var index=0;index<arry_Id.length;index++){
   if(id===arry_Id[index]){
     $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR);
     $('#'+arry_Id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	 if($('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).removeClass('hide-block'); 
	 }
   } else {
     $('#'+arry_Id[index]).css('color','#000');
     $('#'+arry_Id[index]).css('border-bottom','0px');
	 if(!$('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).addClass('hide-block'); 
	 }
   }
 }
 }
} 
function setBranchInformation(){
 communityCreateNewBranch('communityNewBranch_members');
}
</script>	
<div class="list-group">
<div class="list-group-item">
<div class="container-fluid">
<div class="row">
<div class="col-xs-6"><span id="communityNewBranch_branchInfo" class="padbot10"><b>1. Branch Information</b></span></div>
<div class="col-xs-6"><span id="communityNewBranch_members" class="padbot10"><b>2. Members</b></span></div>
</div>
</div>
</div>
</div>

<div id="communityNewBranch_branchInfo_content" class="container-fluid hide-block">
<div class="row">
<div class="col-xs-12">
 <!-- Country -->
 <div class="form-group">
  <label>Country</label>
  <select id="communityNewBranch_branchInfo_country" class="form-control">
    <option value="">Select Country</option>
  </select>
 </div>
 <!-- State -->
 <div class="form-group">
  <label>State</label>
  <select id="communityNewBranch_branchInfo_state" class="form-control">
    <option value="">Select State</option>
  </select>
 </div>
 <!-- Location -->
 <div class="form-group">
  <label>Location</label>
  <select id="communityNewBranch_branchInfo_location" class="form-control">
    <option value="">Select Location</option>
  </select>
 </div>
 <!-- Locality -->
 <div class="form-group">
  <label>Locality</label>
  <select id="communityNewBranch_branchInfo_locality" class="form-control">
    <option value="">Select Locality</option>
  </select>
 </div>
 <!-- Button -->
 <div class="form-group">
  <button class="btn custom-bg form-control" onclick="javascript:setBranchInformation();"><b>Next</b></button>
 </div>
</div>
</div>
</div>
<div id="communityNewBranch_members_content" class="container-fluid hide-block">
<div class="row">
<div class="col-xs-12">
<!-- Name -->
 <div class="form-group">
  <label>Name</label>
  <input type="text" id="communityNewBranch_members_name" class="form-control" placeholder="Enter Member Name"/>
 </div>
</div>
</div>
</div>

 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>