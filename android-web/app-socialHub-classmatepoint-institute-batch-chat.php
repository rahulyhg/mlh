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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-socialhub-classmatepoint-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <!--link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script-->
 <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" media="screen">
 <link rel="stylesheet" type="text/css" href="styles/api/emoji-stylesheet.css" media="screen">
 <link rel="stylesheet" type="text/css" href="styles/api/emojionearea.min.css" media="screen">
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" media="screen">
 <link rel="stylesheet" type="text/css" href="http://mervick.github.io/lib/google-code-prettify/skins/tomorrow.css" media="screen">
 <!--script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->
 <script type="text/javascript" src="http://mervick.github.io/lib/google-code-prettify/prettify.js"></script>
 <script type="text/javascript" src="js/api/emojionearea.js"></script>
 <link rel="stylesheet" type="text/css" href="styles/api/simple-chat-skeleton.css"/>
<script type="text/javascript">
$(document).ready(function(){
 bgstyle(2);
 layout_setup();
 $(".lang_"+USR_LANG).css('display','block');
});
function layout_setup() {
  var height=window.innerHeight;
  console.log(window.innerWidth+"px X "+window.innerHeight+"px");
  var topheight=(8/100)*height;
  var middleheight=(84/100)*height;
  var bottomheight=(8/100)*height;
  $('.topscreen').css("height",topheight+"px"); 
  $('.middlescreen').css("height",middleheight+"px");
  $('.bottomscreen').css("height",bottomheight+"px"); 
  var objDiv = document.getElementById("screen");
  objDiv.scrollTop = objDiv.scrollHeight;
}
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div class="topscreen">
   <?php include_once 'templates/api/api_header_simple.php'; ?>
 </div>
 <div id="screen" class="col-xs-12 middlescreen custom-lgt-bg">
  <!-- MESSAGE # 1 ::: START -->
  <div class="jumbotron jumbotron-red"> 
     <div class="container-fluid ">
	    <div class="row">
		  <div class="col-xs-2 col-md-4">
		    <img class="profile_pic_img2 imgb1" src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/logo.jpg"/>
		  </div>
		  <div class="col-xs-10 col-md-8">
		    <div><h5><b>Nellutla Laxmi Narasimha Rao</b></h5></div>
		  </div>
		</div>
		<div class="row pad-l5 pad-r5">
		  <div class="col-xs-12 col-md-12" style="width:100%;">
		  <span class="pull-right" style="text-align:justify;">
			Hi, how are you? I am fine. Hi, how are you?
			I am fine. Hi, how are you? I am fine. Hi, how are you? I am fine.
		  </span>
		  </div> 
		</div>	
		<div class="row">
		  <div align="right" class="jumbotron-time1 mbot10p">12:44 P.M.</div>
		</div>
	 </div>
  </div>
  <!-- MESSAGE # 1 ::: END -->
  <!-- MESSAGE # 2 ::: START -->
  <div class="jumbotron jumbotron-silver"> 
    <div class="container-fluid ">
	    <div class="row">
		  <div class="col-xs-2 col-md-4">
		    <img class="profile_pic_img2 imgb1" src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/logo.jpg"/>
		  </div>
		  <div class="col-xs-10 col-md-8">
		    <div><h5><b>Ajay Devarakonda</b></h5></div>
		  </div>
		</div>
		<div class="row pad-l5 pad-r5">
		  <div class="col-xs-12 col-md-12" style="width:100%;">
		  <span class="pull-right" style="text-align:justify;">
			Hi, how are you? I am fine. Hi, how are you?
			I am fine. Hi, how are you? I am fine. Hi, how are you? I am fine.
		  </span>
		  </div> 
		</div>	
		<div class="row">
		  <div align="right" class="jumbotron-time2 mbot10p">12:44 P.M.</div>
		</div>
	 </div>
  </div>
  <!-- MESSAGE # 2 ::: END -->
  <!-- MESSAGE # 3 ::: START -->
  <div class="jumbotron jumbotron-red"> 
     <div class="container-fluid ">
	    <div class="row">
		  <div class="col-xs-2 col-md-4">
		    <img class="profile_pic_img2 imgb1" src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/logo.jpg"/>
		  </div>
		  <div class="col-xs-10 col-md-8">
		    <div><h5><b>Nellutla Laxmi Narasimha Rao</b></h5></div>
		  </div>
		</div>
		<div class="row pad-l5 pad-r5">
		  <div class="col-xs-12 col-md-12" style="width:100%;">
		  <span class="pull-right" style="text-align:justify;">
			Hi, how are you? I am fine. Hi, how are you?
			I am fine. Hi, how are you? I am fine. Hi, how are you? I am fine.
		  </span>
		  </div> 
		</div>	
		<div class="row">
		  <div align="right" class="jumbotron-time1 mbot10p">12:44 P.M.</div>
		</div>
	 </div>
  </div>
  <!-- MESSAGE # 3 ::: END -->
  <!-- MESSAGE # 4 ::: START -->
  <div class="jumbotron jumbotron-silver"> 
    <div class="container-fluid ">
	    <div class="row">
		  <div class="col-xs-2 col-md-4">
		    <img class="profile_pic_img2 imgb1" src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/logo.jpg"/>
		  </div>
		  <div class="col-xs-10 col-md-8">
		    <div><h5><b>Ajay Devarakonda</b></h5></div>
		  </div>
		</div>
		<div class="row pad-l5 pad-r5">
		  <div class="col-xs-12 col-md-12" style="width:100%;">
		  <span class="pull-right" style="text-align:justify;">
			Hi, how are you? I am fine. Hi, how are you?
			I am fine. Hi, how are you? I am fine. Hi, how are you? I am fine.
		  </span>
		  </div> 
		</div>	
		<div class="row">
		  <div align="right" class="jumbotron-time2 mbot10p">12:44 P.M.</div>
		</div>
	 </div>
  </div>
  <!-- MESSAGE # 4 ::: END -->
  <!-- MESSAGE # 5 ::: START -->
  <div class="jumbotron jumbotron-me"> 
    <div class="container-fluid ">
	    <div class="row">
		  <div class="col-xs-2 col-md-4">
		    <img class="profile_pic_img2 imgb1" src="<?php echo $_SESSION["PROJECT_URL"]; ?>images/logo.jpg"/>
		  </div>
		  <div class="col-xs-10 col-md-8">
		    <div><h5><b>Me</b></h5></div>
		  </div>
		</div>
		<div class="row pad-l5 pad-r5">
		  <div class="col-xs-12 col-md-12" style="width:100%;">
		  <span class="pull-right" style="text-align:justify;">
			Hi, how are you? I am fine. Hi, how are you?
			I am fine. Hi, how are you? I am fine. Hi, how are you? I am fine.
		  </span>
		  </div> 
		</div>	
		<div class="row">
		  <div align="right" class="jumbotron-timeme mbot10p">12:44 P.M.</div>
		</div>
	 </div>
  </div>
  <!-- MESSAGE # 5 ::: END -->
 </div>
 <div class="bottomscreen chat-input-fixed-bottom" style="background-color:#fff;">
   <div class="col-md-12 col-xs-10 pad0">
   <textarea id="message" placeholder="Place your Text here"></textarea> 
<script type="text/javascript">
$(document).ready(function() {
 $("#message").emojioneArea({ useSprite: false});
});
</script>
    </div>
    <div class="col-md-12 col-xs-2 pad0">
	  <button id="send_msg" class="form-control btn custom-bg" style="height:54px;">
	    <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; <span class="font-size:18px;"><b>Send</b></span>
	  </button>
	</div>
 </div>

 <!-- END -->
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>