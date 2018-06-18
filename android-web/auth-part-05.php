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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-05-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-05.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css" rel="stylesheet" type="text/css">
<style>
.pad0 { padding:0px; }
.mtop5pc { margin-top:5%; }
.mtop15pc { margin-top:15%; }
.mbot5pc { margin-bottom:5%; }
.mbot15pc { margin-bottom:15%; }
.mtop15px { margin-top:5px; }
.hide-block { display:none; }
.avatar { width:60px;height:60px;border-radius:50%; }
.avatar-selected { z-index:1000;width:50px;height:50px; } 
.avatar-container:hover { opacity:0.3;cursor:pointer; }
.avatar-centered { position:absolute;top:50%;left:50%;transform:translate(-50%, -50%); }
#tmpl_avatar { margin-bottom:20%; }
@media (min-width: 1281px) { #tmpl_button {  width:100%;margin-top:10%; } }
@media (min-width: 1025px) and (max-width: 1280px) { #tmpl_button { width:100%;margin-top:10%; } }
@media (min-width: 992px) and (max-width: 1024px) { #tmpl_button { width:100%;margin-top:10%; } }
@media (min-width: 768px) and (max-width: 991px) and (orientation: landscape) { #tmpl_button { width:60%;margin-top:8%; } }
@media (min-width: 481px) and (max-width: 767px) {  #tmpl_button { width:80%;margin-top:16%; }}
@media (min-width: 200px) and (max-width: 480px) { #tmpl_button { width:100%;margin-top:20%; } }
.profilepic { border-radius:50%;width:100px;height:100px; }
#fileElem { visibility:hidden; }
#pic_done,#avatar_done { display:none; }
</style>
<script type="text/javascript">

</script>
</head>
<body>
   <?php include_once 'templates/api/api_loading.php'; ?>
   <?php include_once 'templates/api/api_header_init.php'; ?>
   <!-- BUTTON TEMPLATE -->
   <div id="tmpl_button" class="container hide-block">
      <div class="col-md-3 col-xs-12"></div>
      <div class="col-md-6 col-xs-12">
		 <div class="list-group">
		   <div class="list-group-item">
		      <div class="container-fluid pad0">
				  <!-- Avatar -->
				  <div class="col-md-5 col-xs-12 pad0">
					 <button class="btn custom-bg white-font form-control" onclick="javascript:sel_tmpl('tmpl_avatar');">
					   <b>Choose your Avatar</b>
					 </button>
				  </div>
				  <div class="col-md-2 col-xs-12 pad0"></div>
				  <!-- Profile pic -->
				  <div class="col-md-5 col-xs-12 pad0">
					 <button class="btn custom-bg white-font form-control" onclick="javascript:sel_tmpl('tmpl_profilepic');">
					   <b>Choose your picture</b>
					 </button>
				  </div>
			  </div>
		   </div>
		 </div>
      </div>
	  <div class="col-md-3  col-xs-12"></div>
   </div>
   <!-- AVATAR TEMPLATE -->
   <div id="tmpl_avatar" class="container hide-block">
      <div class="col-md-3"></div>
      <div class="col-md-6">
		 <div class="list-group">
		   <div class="list-group-item">
		      
			      <div align="center">
				     <h5><b>Choose your Avatar</b></h5><hr/>
				  </div>
				  
				  <div align="center">
			          
					   <div align="center" class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('1');">
						  <img src="images/avatar/1.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-1" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					  
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('2');">
						  <img src="images/avatar/2.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-2" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
						
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('3');">
						  <img src="images/avatar/3.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-3" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('4');">
						  <img src="images/avatar/4.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-4" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					   
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('5');">
						  <img src="images/avatar/5.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-5" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
						
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('6');">
						  <img src="images/avatar/6.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-6" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('7');">
						  <img src="images/avatar/7.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-7" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					    
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('8');">
						  <img src="images/avatar/8.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-8" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
						
					   <div align="center"  class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('9');">
						  <img src="images/avatar/9.jpg" class="avatar">
						  <div class="avatar-centered">
							 <img id="avatar-select-9" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>

					   <div align="center" class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('10');">
						  <img src="images/avatar/10.jpg" class="avatar"/>
						  <div class="avatar-centered">
							 <img id="avatar-select-10" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					
					   <div align="center" class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('11');">
						  <img src="images/avatar/11.jpg" class="avatar"/>
						  <div class="avatar-centered">
							 <img id="avatar-select-11" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
					
					   <div align="center" class="avatar-container col-md-4 col-sm-4 col-xs-6 mtop5pc" onclick="javascript:avatarSelectImg('12');">
						  <img src="images/avatar/12.jpg" class="avatar"/>
						  <div class="avatar-centered">
							 <img id="avatar-select-12" src="images/textures/selected.png" class="avatar-selected hide-block"/>
						  </div>
					   </div>
			      </div>
				  
			      <div align="center">
				    <div class="btn-group mtop15pc">
					<button id="avatar_done" class="btn custom-bg white-font" onclick="javascript:reg_avatar_img();"><b>Done</b></button>
					<button id="avatar_back" class="btn custom-lgt-bg" onclick="javascript:sel_tmpl('tmpl_button');"><b>Back</b></button>
					</div>
				  </div>
				  
				  <!--a href="<?php echo $_SESSION["PROJECT_URL"]?>initializer/profile-pic"><button>Reload</button></a-->
		   </div>
		  
		 </div>
      </div>
	  <div class="col-md-3"></div>
   </div>
   <!-- PROFILE PIC TEMPLATE -->
   <div id="tmpl_profilepic" class="container hide-block">
      <div class="col-md-3"></div>
      <div class="col-md-6">
		 <div class="list-group">
		   <div class="list-group-item">
		      <div align="center">
				 <h5><b>Choose your Picture</b></h5><hr/>
		      </div>
			  <div id="userprofilepic-media-content" align="center" class="mbot15pc">
         
			  </div>
		   </div>
		 </div>
	  </div>
	  <div class="col-md-3"></div>
   </div>
   <?php include_once 'templates/api/api_bottom_doc.php'; ?>
</body>
</html>
<?php 
} else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); }
} else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>