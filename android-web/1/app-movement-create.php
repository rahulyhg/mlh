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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-movement-create-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-movement-create.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script type="text/javascript">
 $(document).ready(function(){
 /* Check User Created Union or Not */
 /* If User created Community, Display : Form */
  petitionForm_mediaContent();
  cloudservers_auth();
 /* Else Display :  You have not Created any Community */
 
 });
 </script>
 <style>
input[type="file"] { visibility:hidden; }
.petitionForm-uploadpic { width:100%;height:auto; }
#petitionForm_pic_done { display:none; }
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
				  <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>START A MOVEMENT</b>
			   </span>
			</div>
		</div>
		<div class="container-fluid">
		  <div class="row">
		    <div align="center" class="col-md-12"><h5><b>Write a Petition</b><hr/></h5></div>
		  </div>
		  <!-- Petition Title -->
		  <div class="row">
			<div class="col-md-12">
			  <div class="form-group">
			    <label>Petition Title</label>
				<input type="text" class="form-control" placeholder="Enter your Petition Title"/>
			  </div>
			</div>
		  </div>
		  <!-- Select your Community -->
		  <div class="row">
			<div class="col-md-12">
			  <div class="form-group">
				<label>Choose your Community</label>
				<select class="form-control">
				  <option value="">Select your Community</option>
				</select>
			  </div>
			</div>
		  </div>
		   
<script type="text/javascript">
function petitionForm_mediaContent(){
IMG_URL='';
var content='<div align="center" class="col-md-12">';
	content+='<input type="file" id="petitionForm_fileElem" accept="image/*" ';
	content+='onchange="handleFiles(this.id,\'petitionForm_div_cropping\',\'petitionForm-img-crop\'';
	content+=',this.files,\'petitionForm_fileSelect\',\'petitionForm_pic_done\',150,50,175,75,\'square\')">';
	content+='<img id="petitionForm_fileSelect" class="petitionForm-uploadpic" ';
	content+='src="'+PROJECT_URL+'images/textures/upload900x300.png" ';
	content+='onclick="javascript:imgClick(\'petitionForm_fileElem\');"/>';
	content+='<div id="petitionForm-img-crop" class="mtop15px"></div>';
	content+='<div id="petitionForm_div_cropping" align="center"></div>';
	content+='<button id="petitionForm_pic_done" align="center" class="col-md-12 btn custom-bg" ';
	content+=' style="background-color: rgb(11, 160, 218);color: rgb(255, 255, 255);font-weight: bold;';
	content+=' margin-top:15px;float:right!important;" ';
	content+='onclick="javascript:petitionForm_mediaContent();">';
	content+='<b>Edit Picture</b></button>';
	content+='</div>';
	
 document.getElementById("petition-content-media").innerHTML=content;
}
</script>
		  <!-- Petition - MEDIA -->
			<div id="petition-content-media" class="row">
				
			</div>
			
		  <!-- To the Authority -->
		  <div class="row mtop15p">
			<div class="col-md-12">
			  <div class="form-group">
			    <label>To </label>
				<input type="text" class="form-control mbot5p" placeholder="Person Name"/>
				<input type="text" class="form-control mbot5p" placeholder="Designation"/>
				<button class="btn custom-bg pull-right"><b>+</b></button>
			  </div>
			</div>
		  </div>
		  
		  <!-- Issue/Cause Description -->
		  <div class="row">
			<div class="col-md-12">
			  <div class="form-group">
				<label>Issue / Cause Description</label>
				<textarea class="form-control" placeholder="Describe What is the Issue / Cause facing?"></textarea>
			  </div>
			</div>
		   </div>
		   <!-- Describe who faces this Issue/Cause -->
		   <div class="row">
			<div class="col-md-12">
			  <div class="form-group">
				<label>Describe who are facing this Issue/Cause?</label>
				<textarea class="form-control" placeholder="Describe who are facing this Issue/Cause?"></textarea>
			  </div>
			</div>
		   </div>
		   <!-- Describe what are the demands / solutions expecting -->
		   <div class="row">
			<div class="col-md-12">
			  <div class="form-group">
				<label>Describe what are the demands / solutions Expecting?</label>
				<textarea class="form-control" placeholder="Describe what are the demands / solutions Expecting?"></textarea>
			  </div>
			</div>
		   </div>
		   
		   <div class="row mbot15p">
				<div class="col-md-12">
					<button class="btn btn-primary form-control"><b>Next</b></button>
				</div>
		   </div>
		</div>
	  </div>
	</div>
 </div>
</body>
</html>
<?php } ?>