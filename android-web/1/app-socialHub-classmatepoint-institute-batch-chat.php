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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/db.identity.js"></script>
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
var Android;
var BATCH_ID='<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
$(document).ready(function(){
 bgstyle(3);
 layout_setup();
 $(".lang_"+USR_LANG).css('display','block');
 $("#sendBatchMsg").emojioneArea({ useSprite: false});
 batchChatInitializer();
 var msg = "Hello";
 var cur_ts = getCurentTimestamp();
 var encrypt = Android.chatMasking_encryption(msg,cur_ts);
 Android.showToast('QCazpaHGSvHw7tcJDuKfmQ=='+" "+Android.chatMasking_decryption('WYCDZupOfNBMALG07bZY4w==','2018-10-01 12:14:38'));
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

function sendBatchMessages(){
 try {
   var chat_Id = cmp_batch_mem_chat_Id();
   var msg = document.getElementById("sendBatchMsg").value;
   $("#sendBatchMsg").data("emojioneArea").setText("");
   var cur_ts = getCurentTimestamp();
   var encrypted_msg = Android.chatMasking_encryption(msg,cur_ts);
   js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.batch.chat.php',
   { action:'CLASSMATEBATCH_CHAT_NEWMESSAGE', chat_Id:chat_Id, batch_Id:BATCH_ID, user_Id:AUTH_USER_ID,sent_On:cur_ts,
     msg:encrypted_msg, reply_reference:'' },function(response){ }); 
 } catch(err){ alert(err); }
}

function batchChatInitializer(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.socialhub.classmateportal.batch.chat.php',
 { action:'CLASSMATEBATCH_CHAT_ALL', batch_Id:BATCH_ID },function(response){ 
   console.log(response); 
   chat_content(response);
   batchChatInitializer();
 });
}

function chat_content(response){
 var response = JSON.parse(response);
 var content='';
 if(response.length>0){
 for(var index=0;index<response.length;index++){
   var chat_Id = response[index].chat_Id;
   var batch_Id = response[index].batch_Id;
   var msg_by = response[index].msg_by;
   var sent_On = response[index].sent_On;
   var msg = Android.chatMasking_decryption(response[index].msg.trim(),sent_On);
   var reply_reference = response[index].reply_reference;
   var user_Id = response[index].user_Id;
   var username = response[index].username;
   var surName = response[index].surName;
   var name = response[index].name;
   var profile_pic = response[index].profile_pic;
   
       content+='<div class="row">';
    if(msg_by===AUTH_USER_ID){
	    content+='<div class="col-xs-3 col-md-4">';
		content+='<img class="profile_pic_img3" src="'+profile_pic+'"/>';
		content+='</div>';
		content+='<div class="col-xs-9 col-md-8">';
		content+='<div class="jumbotron custom-bg-solid1pxfullborder" ';
		content+='style="border:1px solid '+CURRENT_DARK_COLOR+';background-color:#fff;color:'+CURRENT_DARK_COLOR+';">';
		content+='<div style="width:100%;text-align:justify;">'+msg+'</div>';
		content+='</div>';
		content+='<div align="right" class="mtop10p mbot10p">'+get_stdDateTimeFormat01(sent_On)+'<hr/></div>';
		content+='</div>';
	} else {
    
		content+='<div class="col-xs-3 col-md-4">';
		content+='<img class="profile_pic_img3" src="'+profile_pic+'"/>';
		content+='</div>';
		content+='<div class="col-xs-9 col-md-8">';
		content+='<div class="jumbotron custom-bg" style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;">';
		content+='<div style="width:100%;text-align:justify;">'+msg+'</div>';
		content+='</div>';
		content+='<div align="right" class="mtop10p mbot10p">'+get_stdDateTimeFormat01(sent_On)+'<hr/></div>';
		content+='</div>';
		
	}
	content+='</div>'; 
	content+='<div class="row">';
	content+='<div id="my_chat"></div>';
	content+='</div>';
  }
 } else {
   content+='<div align="center">';
   content+='<span style="color:#ccc;font-size:13px;">No Messages Found</span>';
   content+='</div>';
   content+='<div id="my_chat"></div>';
 }
 document.getElementById("current_chat").innerHTML=content;
}
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div class="topscreen">
   <?php include_once 'templates/api/api_header_simple.php'; ?>
 </div>
 <div id="screen" class="col-xs-12 middlescreen">
     <div id="current_chat" class="container-fluid mtop15p">
	 </div>
 </div>
 <div class="bottomscreen chat-input-fixed-bottom" style="background-color:#fff;">
   <div class="col-md-12 col-xs-10 pad0">
   <textarea id="sendBatchMsg" placeholder="Place your Text here"></textarea> 
<script type="text/javascript">


</script>
    </div>
    <div class="col-md-12 col-xs-2 pad0">
	  <button id="sendBatchMsgBtn" class="form-control btn custom-bg" style="height:54px;"
	    onclick="javascript:sendBatchMessages();">
	    <i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp; <span class="font-size:18px;"><b>Send</b></span>
	  </button>
	</div>
 </div>

 <!-- END -->
</body>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>