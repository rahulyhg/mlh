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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-classmatepoint-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
<script type="text/javascript">
var INSTITUTION_ID='<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 build_establishedYear();
 build_countryOption('createInstitute_country');
 cloudservers_auth(); // Get CloudName from Cloudinary
 upload_picture_100X100('createInstitute_profilepic_div',PROJECT_URL+'images/icons/0.png');
 getInstitutionName();
});
function getInstitutionName(){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
    { action:'GET_DATA_INSTITUTIONNAMEBYID', institutionId:INSTITUTION_ID },
	function(response){ console.log(response);
       response=JSON.parse(response);
	   document.getElementById("createInstitute_viewInstitutionName").innerHTML='Institute is under '+response[0].institutionName;
	 });
}
function build_establishedYear(){
 var year = new Date().getFullYear();
 var options='<option value="">Select Established Year</option>';
 for(var index=year;index>1500;index--){
   options+='<option value="'+index+'">'+index+'</option>';
 }
 document.getElementById("createInstitute_estYear").innerHTML=options;
}
function createInstitute(){
var instituteName = document.getElementById("createInstitute_instituteName").value;
var instituteType = document.getElementById("createInstitute_instituteType").value;
var estYear = document.getElementById("createInstitute_estYear").value;
var country = document.getElementById("createInstitute_country").value;
var state = document.getElementById("createInstitute_state").value;
var location = document.getElementById("createInstitute_location").value;
var locality = document.getElementById("createInstitute_locality").value;
var aboutInstitute = document.getElementById("createInstitute_aboutInstitute").value; 
var webURL = document.getElementById("createInstitute_webURL").value; 
var founderName1 = document.getElementById("createInstitute_founderName1").value;
var founderName2 = "";
if(document.getElementById("createInstitute_founderName2")!==null) { 
    founderName2 = document.getElementById("createInstitute_founderName2").value;
}
var founderName3 = "";
if(document.getElementById("createInstitute_founderName3")!==null) { 
   founderName3 = document.getElementById("createInstitute_founderName3").value;
}
var founderName4 = "";
if(document.getElementById("createInstitute_founderName4")!==null) { 
    founderName4 = document.getElementById("createInstitute_founderName4").value;
}
var founderName5 = "";
if(document.getElementById("createInstitute_founderName5")!==null) { 
    founderName5 = document.getElementById("createInstitute_founderName5").value;
}
if(IMG_URL!==undefined && IMG_URL.length>0){
if(instituteName.length>0){
if(instituteType.length>0){
if(estYear.length>0){
if(country.length>0){
if(state.length>0){
if(location.length>0){
if(locality.length>0){
if(aboutInstitute.length>0){
if(founderName1.length>0){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.php',
{ action:'CREATE_INSTITUTE', instituteName:instituteName, instituteType:instituteType, cmp_u_Id:INSTITUTION_ID, 
profile_pic:IMG_URL, establishedOn:estYear, aboutInstitute:aboutInstitute, foundedBy1:founderName1, foundedBy2:founderName2, 
foundedBy3:founderName3, foundedBy4:founderName4, foundedBy5:founderName5, web_url:webURL, createdBy:AUTH_USER_ID }, 
function(response){
  console.log(response);
  alert_display_success('S003',PROJECT_URL+'app/socialHub/classmatepoint/institution/home/listOfColleges/'+INSTITUTION_ID);
});
} else { alert_display_warning('W030'); } // founderName1 
} else { alert_display_warning('W029'); } // aboutInstitute 
} else { alert_display_warning('W010'); } // locality 
} else { alert_display_warning('W009'); } // location 
} else { alert_display_warning('W008'); } // state 
} else { alert_display_warning('W007'); } // country 
} else { alert_display_warning('W028'); } // estYear 
} else { alert_display_warning('W027'); } // InstituteType 
} else { alert_display_warning('W026'); } // InstituteName 
} else { alert_display_warning('W025'); } // Institute Profile Picture 
}
</script>
<style>
#createInstitute_viewInstitutionName { line-height:22px; }
</style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 
 <!-- START -->
 <script type="text/javascript">
 $(document).ready(function(){
  // load_breadcrumb();
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
 
 <div class="container-fluid mtop15p">
   <div class="row">
     <div class="col-xs-12"><h4><b>Create Institute</b></h4><hr/></div>
   </div>
   <div class="row">
    <div id="createInstitute_profilepic_div" align="center" class="col-xs-12 mbot50p"></div>
    <div class="col-xs-12">
	  <div class="form-group">
	    <label>Institute Name</label>
		<input type="text" id="createInstitute_instituteName" class="form-control" placeholder="Enter your Institute Name"/>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="grey-lgt-font pull-right">
	    <label><div align="right" id="createInstitute_viewInstitutionName"></div></label>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>Institute Type</label>
		<select id="createInstitute_instituteType" class="form-control">
		  <option value="">Select Institute Type</option>
		  <option value="Public">Public</option>
		  <option value="Private">Private</option>
		</select>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>Established Year</label>
		<select id="createInstitute_estYear" class="form-control">
		   <option value="">Select Established Year</option>
		</select>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>Country</label>
		<select id="createInstitute_country" class="form-control" 
		onchange="javascript:build_stateOption('createInstitute_country','createInstitute_state');">
		  <option value="">Select your Country</option>
		</select>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>State</label>
		<select id="createInstitute_state" class="form-control" 
		onchange="javascript:build_locationOption('createInstitute_country','createInstitute_state','createInstitute_location');">
		  <option value="">Select your State</option>
		</select>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>Location</label>
		<select id="createInstitute_location" class="form-control" 
		onchange="javascript:build_minlocationOption('createInstitute_country','createInstitute_state','createInstitute_location','createInstitute_locality');">
		  <option value="">Select your Location</option>
		</select>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>Locality</label>
		<select id="createInstitute_locality" class="form-control">
		  <option value="">Select your Locality</option>
		</select>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>About Institute</label>
		<textarea id="createInstitute_aboutInstitute" class="form-control" placeholder="Describe about your Institute"></textarea>
	  </div>
	</div>
	<div class="col-xs-12">
	  <div class="form-group">
	    <label>Web URL</label>
		<input id="createInstitute_webURL" type="text" class="form-control" placeholder="Enter your Web URL"/>
	  </div>
	</div>
<script type="text/javascript">
var INSTITUTE_FOUNDER=1;
function createInstituteAddFounder(){
if(INSTITUTE_FOUNDER<5){
INSTITUTE_FOUNDER++;
var content='<input id="createInstitute_founderName'+INSTITUTE_FOUNDER+'" type="text" class="form-control" ';
    content+='placeholder="Enter your Founder Name # '+INSTITUTE_FOUNDER+'"/>';
	content+='<div id="createInstitute_div_founder'+(INSTITUTE_FOUNDER+1)+'" class="mtop10p"></div>';
document.getElementById("createInstitute_div_founder"+INSTITUTE_FOUNDER).innerHTML=content;
} else { document.getElementById("createInstitute_founderBtn").style.display='none'; }
}
</script>
    <div class="col-xs-12">
	  <div class="form-group">
	    <label>Founders</label>
		<input id="createInstitute_founderName1" type="text" class="form-control" placeholder="Enter your Founder Name # 1"/>
		<div id="createInstitute_div_founder2" class="mtop10p"></div>
		<button id="createInstitute_founderBtn" class="mtop15p btn btn-default pull-right custom-font" onclick="javascript:createInstituteAddFounder();"><b>Add Founder</b></button>
		
	    </div>
	</div>
	<div class="col-xs-12">
	  <button class="btn custom-bg mtop15p mbot15p form-control" onclick="javascript:createInstitute();"><b>Create Institute</b></button>
   </div>
 </div>
 
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>