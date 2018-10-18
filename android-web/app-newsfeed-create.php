<?php session_start(); 
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create NewsFeed</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/summernote.css" rel="stylesheet"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-create-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-create.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/summernote.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap-toggle.min.js"></script>
 <link href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/summernote.css" rel="stylesheet">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/summernote.js"></script>
 <script type="text/javascript">
 var BIZUNIONID ='<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
 </script>
</head>
<body>
   <?php include_once 'templates/api/api_loading.php'; ?>
   <?php include_once 'templates/api/api_header_simple.php'; ?>
   <div id="app-page-title" class="list-group pad0" style="margin-bottom:0px;">
     <div align="center" class="list-group-item custom-lgt-bg">
	   <span class="lang_english">
	      <i class="fa fa-hands" aria-hidden="true"></i>&nbsp; <b>CREATE NEWSFEED</b>
	   </span>
     </div>
   </div>

   <div class="list-group" style="margin-bottom:0px;">
   <div class="list-group-item">
     <div class="container-fluid pad0">
	   <div align="center" class="col-xs-6" onclick="javascript:sel_createNewsFeedTab('createNewsFeedTab_writeNewsFeed');">
	     <span id="createNewsFeedTab_writeNewsFeed" style="padding:10px;">
		  <b>Write NewsFeed</b>
		 </span>
	   </div>
	   <div align="center" class="col-xs-6">
	     <span id="createNewsFeedTab_Post" style="padding:10px;">
			<b>Post</b>
		 </span>
	   </div>
	 </div>
   </div>
   </div>
   <div id="createNewsFeedContent_writeNewsFeed" class="container-fluid hide-block">
	 <div class="row">
	  <div class="col-xs-12 custom-bg">
	    <div id= "createNewsFeedForm_newsImage" class="form-group">
		  
		</div>
	  </div>
	  </div>
	  <div class="row">
	  <div class="col-xs-12 mtop15p">
	    <div class="form-group">
		  <label>Article Title&nbsp;<span class="font-red">*</span></label>
		  <input id="createNewsFeedForm_artTitle" type="text" class="form-control" placeholder="Enter Article Title"/>
		</div>
		<div class="form-group">
		  <label>Short Summary&nbsp;<span class="font-red">*</span></label>
		  <textarea id="createNewsFeedForm_artShrtSummary" class="form-control" style="height:60px;" placeholder="Provide Short Description"></textarea>
		</div>
		<div class="form-group">
		  <label>Description&nbsp;<span class="font-red">*</span></label>
		  <div id="createNewsFeedForm_artDesc" class="summernote"></div>
		</div>
		<div class="form-group">
		  <h4><b>Other Media Links</b></h4><hr/>
		</div>
		<div class="form-group">
		  <label>YouTube Link - 01</label>
		  <div class = "input-group">
		   <input id="createNewsFeedForm_mediaURL01" type="text" class="form-control" placeholder="Enter youtube Link"/>
		   <span class = "input-group-addon custom-lgt-bg" onclick="javascript:view_preview_mediaURL01();">preview</span>
		  </div>
<script type="text/javascript">
function view_preview_mediaURL01(){
 var mediaURL01 = document.getElementById("createNewsFeedForm_mediaURL01").value;
 var video_Id = get_youtube_videoId(mediaURL01);
 if(video_Id==='INVALID'){ alert_display_warning('W048'); }
 else {
  var content = display_preview_content(video_Id);
  document.getElementById("createNewsFeedForm_preview_mediaURL01").innerHTML = content;  
 }
}
function view_preview_mediaURL02(){
 var mediaURL02 = document.getElementById("createNewsFeedForm_mediaURL02").value;
 var video_Id = get_youtube_videoId(mediaURL02);
 if(video_Id==='INVALID'){ alert_display_warning('W048'); }
 else {
  var content = display_preview_content(video_Id);
  document.getElementById("createNewsFeedForm_preview_mediaURL02").innerHTML = content;  
 }
}
function view_preview_mediaURL03(){
 var mediaURL03 = document.getElementById("createNewsFeedForm_mediaURL03").value;
 var video_Id = get_youtube_videoId(mediaURL03);
 if(video_Id==='INVALID'){ alert_display_warning('W048'); }
 else {
  var content = display_preview_content(video_Id);
  document.getElementById("createNewsFeedForm_preview_mediaURL03").innerHTML = content;  
 }
}
</script>

		  <div id="createNewsFeedForm_preview_mediaURL01"></div>
		</div>
		<div class="form-group">
		 <label>YouTube Link - 02</label>
		 <div class="input-group">
		  <input id="createNewsFeedForm_mediaURL02" type="text" class="form-control" placeholder="Enter youtube Link"/>
		  <span class = "input-group-addon custom-lgt-bg" onclick="javascript:view_preview_mediaURL02();">preview</span>
		 </div>
		 
		 <div id="createNewsFeedForm_preview_mediaURL02"></div>
		 
		</div>
		<div class="form-group">
		 <label>YouTube Link - 03</label>
		 <div class="input-group">
		  <input id="createNewsFeedForm_mediaURL03" type="text" class="form-control" placeholder="Enter youtube Link"/>
		  <span class = "input-group-addon custom-lgt-bg" onclick="javascript:view_preview_mediaURL03();">preview</span>
		 </div>
		 
		  <div id="createNewsFeedForm_preview_mediaURL03"></div>
		  
		</div>
		<div class="form-group">
		  <button class="btn custom-bg form-control mtop15p mbot15p" onclick="javascript:finish_writeNewsFeedForm();"><b>Next</b></button>
		</div>
	  </div>
	 </div>
   </div>
   
   <div id="createNewsFeedContent_Post" class="container-fluid hide-block">
     <div class="row">
	 <div class="col-xs-12 mtop15p">
	  <div class="list-group">
	   <div align="center" class="list-group-item">
	     <h5><b>List of Community with Branches</b></h5>
	   </div>
	   <div id="loadAvailableCommunityList0">
	     <div align="center" class="list-group-item">
		    <img src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/load.gif" class="profile_pic_img1"/>
		 </div>
	   </div>
	  </div>
	 </div>
	 </div>
	 <div class="row">
	  <div align="center" class="col-xs-12">
		<button class="btn custom-bg" onclick="javascript:newsFeedForm_saveAndPublish();"><b>Save and Publish</b></button>
	  </div>
	</div>
   </div> 
   
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]); } ?>