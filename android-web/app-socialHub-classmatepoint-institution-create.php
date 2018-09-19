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
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-classmatepoint-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
var IMG_URL;
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 cloudservers_auth(); // Get CloudName from Cloudinary
 upload_picture_100X100('createInstitution_profilepic_div',PROJECT_URL+'images/icons/0.png');
 build_establishedYear();
});
</script>
<style>
.classmatepoint_div,.fansclub_div,.publicparliament_div { margin-top:5px;background-color:#fff;padding-top:2px;
 padding-bottom:2px;padding-right:10px;padding-left:10px;border-radius:6px; }
.classmatepoint_font01 { color:#E91E63;font-family:'mlhfont002';font-size:26px;letter-spacing:1px; }
.classmatepoint_font02 { color:#009688;font-family:'mlhfont001';font-size:24px;letter-spacing:1px; }
.fansclub_font02 { color:#9C27B0;font-family:'mlhfont003';font-weight:bold;font-size:26px;letter-spacing:1px; }
.fansclub_font01 { color:#118aea;font-family:'mlhfont004';font-size:30px;letter-spacing:2px; }
.publicparliament_font { font-family:'mlhfont006';font-size:26px;letter-spacing:2px; }
.publicparliament_color01 { color:#ec3427; }
.publicparliament_color02 { color:#04bd0c; }
</style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 
 <!-- START -->
 <script type="text/javascript">
 $(document).ready(function(){
   
 });
 function load_breadcrumb(){
   var content='<a href="'+PROJECT_URL+'app/socialHub/home" style="color:'+CURRENT_DARK_COLOR+';">Social Hub</a> / ';
       content+='<a href="#" class="active" style="color:#797777;">Classmate Point</a>';
   document.getElementById("load_page_breadcrumb").innerHTML=content;
   if($('#load_page_breadcrumb').hasClass('hide-block')){ $('#load_page_breadcrumb').removeClass('hide-block'); }
 }
 </script>
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div id="load_page_breadcrumb" class="custom-breadcrumb hide-block"></div>
 
 <div class="container-fluid mtop10p">
     <div class="col-xs-12">
	    <h4><b>Create Institution</b></h4><hr/>
	 </div>
	 
	 <div id="createInstitution_profilepic_div" align="center" class="col-xs-12 mbot50p"></div>
	 
	 <div class="col-xs-12">
	 
	   <div class="form-group">
	     <label>Institution Board <span class="red-font">*</span></label>
		 <select id="createInstitution_institutionBoard" class="form-control">
		   <option value="">Select Institution Board</option>
		   <option value="UNIVERSITY_BOARD">University Board</option>
		   <option value="COLLEGE_BOARD">College Board</option>
		   <option value="SSC_BOARD">SSC Board</option>
		 </select>
	   </div>
	   
	   <div class="form-group">
	     <label>Institution Type <span class="red-font">*</span></label>
		 <select id="createInstitution_institutionType" class="form-control">
		   <option value="">Select Institution Type</option>
		   <option value="Public">Public</option>
		   <option value="Private">Private</option>
		 </select>
	   </div>
	   
	   <div class="form-group">
	     <label>Institution Name <span class="red-font">*</span></label>
		 <input id="createInstitution_institutionName" type="text" class="form-control" placeholder="Enter Institution Name"/>
	   </div>
	   
	   <div class="form-group">
	     <label>Established Year <span class="red-font">*</span></label>
		 <select id="createInstitution_establishedYear" class="form-control">
		   <option value="">Select Established Year</option>
		 </select>
	   </div>
	   
	   <div class="form-group">
	     <label>About Institution <span class="red-font">*</span></label>
		 <textarea id="createInstitution_aboutInstitution" class="form-control" style="height:120px;" placeholder="Description on Institution"></textarea>
	   </div>
	   
	   <div class="form-group">
	     <label>Website</label>
		 <input id="createInstitution_web_url" class="form-control" placeholder="Enter Institute Website"/>
	   </div>
	   
<script type="text/javascript">
var foundersView=1;
function addFounder(){
 foundersView++;
 var content='<input id="createInstitution_founderName'+foundersView+'" class="form-control mtop10p" ';
     content+='placeholder="Enter Founder Name # '+foundersView+'"/>';
     content+='<div id="addFounders_div'+(foundersView+1)+'"></div>';
 document.getElementById("addFounders_div"+foundersView).innerHTML=content;
if(foundersView==5){ if(!$('#addFoundersBttn').hasClass('hide-block')){ $('#addFoundersBttn').addClass('hide-block'); } }
}
function build_establishedYear(){
 var year = new Date().getFullYear();
 var options='<option value="">Select Established Year</option>';
 for(var index=year;index>1500;index--){
   options+='<option value="'+index+'">'+index+'</option>';
 }
 document.getElementById("createInstitution_establishedYear").innerHTML=options;
}
function createInstitution(){
  var institutionBoard = document.getElementById("createInstitution_institutionBoard").value;
  var institutionType = document.getElementById("createInstitution_institutionType").value;
  var institutionName = document.getElementById("createInstitution_institutionName").value;
  var establishedYear = document.getElementById("createInstitution_establishedYear").value;
  var aboutInstitution = document.getElementById("createInstitution_aboutInstitution").value;
  var web_url = document.getElementById("createInstitution_web_url").value;
  console.log("createInstitution_founderName3: "+document.getElementById("createInstitution_founderName3"));
  var founderName1 = document.getElementById("createInstitution_founderName1").value;
  /* Optional ::: */
  var founderName2 = "";
  if(document.getElementById("createInstitution_founderName2")!==null) {
    founderName2 = document.getElementById("createInstitution_founderName2").value;
  }
  var founderName3 = "";
  if(document.getElementById("createInstitution_founderName3")!==null) {
    founderName3 = document.getElementById("createInstitution_founderName3").value;
  }
  var founderName4 = "";
  if(document.getElementById("createInstitution_founderName4")!==null) {
    founderName4 = document.getElementById("createInstitution_founderName4").value;
  }
  var founderName5 = "";
  if(document.getElementById("createInstitution_founderName5")!==null) {
    founderName5 = document.getElementById("createInstitution_founderName5").value;
  }
  /* Execution ::: */
  if(IMG_URL!=undefined && IMG_URL.length>0){
  if(institutionBoard.length>0){
  if(institutionType.length>0){
  if(institutionName.length>0){
  if(establishedYear.length>0){	 
  if(aboutInstitution.length>0){
  if(founderName1.length>0){
    js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
    { action:'CREATE_INSTITUTION', institutionName:institutionName, institutionType:institutionType, profile_pic:IMG_URL,
	 institutionBoard:institutionBoard ,aboutinstitution:aboutInstitution, establishedOn:establishedYear, 
	 foundedBy1:founderName1, foundedBy2:founderName2, foundedBy3:founderName3, foundedBy4:founderName4, 
	 foundedBy5:founderName5, web_url:web_url, createdBy:AUTH_USER_ID },function(response){ console.log(response);
       alert_display_success('S002',PROJECT_URL+'app/socialHub/classmatepoint/home');
	 });
  } else { alert_display_warning('W024'); } // Founder Name
  } else { alert_display_warning('W023'); }  // About Institution
  } else { alert_display_warning('W022'); } // Established Year
  } else { alert_display_warning('W021'); } // Institution Name
  } else { alert_display_warning('W020'); } // Institution Type
  } else { alert_display_warning('W019'); } // Institution Board
  } else { alert_display_warning('W018'); } // Profile Picture
}
</script>   
	   <div class="form-group">
	     <label>Founder Name <span class="red-font">*</span></label>
		 <input id="createInstitution_founderName1" class="form-control" placeholder="Enter Founder Name # 1"/>
		 <div id="addFounders_div2"></div>
		 <button id="addFoundersBttn" class="btn btn-default mtop15p mbot15p custom-font pull-right" 
		  onclick="javascript:addFounder();"><b>(+) Add Founder</b></button>
	   </div>
	   
	   <div class="form-group">
		   <button class="btn custom-bg form-control" onclick="javascript:createInstitution();"><b>Create Institution</b></button>
	   </div>
	 </div>
 </div>
 
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>