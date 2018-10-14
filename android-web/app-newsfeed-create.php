<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>NewsFeed</title>
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
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-create-bg-styles.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/summernote.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <style>
 body { background-color:#f7f7f7; }
 </style>
 <script type="text/javascript">
 var BIZUNIONID ='<?php if(isset($_GET["1"])){ echo $_GET["1"]; } ?>';
   function getListOfAvailableCommunitiesToWriteNewsFeed(){
   js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
   { action : 'GETLIST_COUNT_WRITENEWSFEEDAVAILABLECOMMUNITIES', user_Id:AUTH_USER_ID+1 },function(totalData){
     if(totalData=='0'){
	    var content='<div align="center" class="mtop15p">';
			content+='<b>You don\'t have Permissions to write News in any of the Community.</b>';
			content+='</div>';
			content+='<div class="col-xs-2"></div>';
			content+='<div class="col-xs-7">';
			content+='<div class="mtop20p mbot20p">';
			content+='<ol>';
			content+='<li>Create a Community</li>';
			content+='<li>Join Members</li>';
			content+='<li>Start Writing NewsFeed</li>';
			content+='</ol>';
			content+='</div>';
			content+='</div>';
			content+='<div class="col-xs-3"></div>';
			content+='<div align="center" class="mtop20p f18">';
			content+='<a href="'+PROJECT_URL+'app/create-community">';
			content+='<button class="btn custom-bg" style="color:#fff;background-color:'+CURRENT_DARK_COLOR+';">';
			content+='<b>Start a Community</b>';
			content+='</button>';
			content+='</a>';
			content+='</div>';
	    document.getElementById("loadAvailableCommunityList0").innerHTML=content;
	 } else {
       scroll_loadInitializer('loadAvailableCommunityList',10,displayListOfAvailableCommunitiesToWriteNewsFeed,totalData); 
	 }
   });
   }
$(document).ready(function(){
// sideWrapperToggle();
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
//  getListOfAvailableCommunitiesToWriteNewsFeed();
});

function displayListOfAvailableCommunitiesToWriteNewsFeed(div_view, appendContent,limit_start,limit_end){
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
   { action : 'GETLIST_DATA_WRITENEWSFEEDAVAILABLECOMMUNITIES', user_Id:AUTH_USER_ID, 
     limit_start:limit_start, limit_end:limit_end },function(response){
    console.log(response);
   });
}
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
<script type="text/javascript">
$(document).ready(function(){
 sel_createNewsFeedTab('createNewsFeedTab_writeNewsFeed');
 upload_picture_900X300('createNewsFeedForm_newsImage',PROJECT_URL+'images/textures/upload900x300.png');
 cloudservers_auth();
});
function sel_createNewsFeedTab(id){
 var arry_id=["createNewsFeedTab_writeNewsFeed","createNewsFeedTab_Post"];
 var arry_content=["createNewsFeedContent_writeNewsFeed","createNewsFeedContent_Post"]; 
 for(var index=0;index<arry_id.length;index++){
  if(arry_id[index]===id){
    if($('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).removeClass('hide-block'); }
    if(!$('#'+arry_id[index]).hasClass('custom-font')){ $('#'+arry_id[index]).addClass('custom-font'); }
	if(!$('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){ $('#'+arry_id[index]).addClass('custom-bg-solid2pxbottomborder'); }
    $('#'+arry_id[index]).css("border-bottom","2px solid "+CURRENT_DARK_COLOR);
	$('#'+arry_id[index]).css("color",CURRENT_DARK_COLOR);
  } else {
    if(!$('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).addClass('hide-block'); }
    if($('#'+arry_id[index]).hasClass('custom-font')){ $('#'+arry_id[index]).removeClass('custom-font'); }
	if($('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){ $('#'+arry_id[index]).removeClass('custom-bg-solid2pxbottomborder'); }
    $('#'+arry_id[index]).css("border","0px");
	$('#'+arry_id[index]).css("color","#000");
  }
 } 
}

var ARTICLE_TITLE;
var ARTICLE_SHORTDESC;
var ARTICLE_DESCRIPTION;
var ARTICLE_POSTDATA={};
function finish_writeNewsFeedForm(){
  sel_createNewsFeedTab('createNewsFeedTab_Post');
  load_access_unionBranches();
}
function display_postSelOpt(union_Id,branch_Id){
 if($('#'+union_Id+'-select-'+branch_Id).hasClass('hide-block')){
   $('#'+union_Id+'-select-'+branch_Id).removeClass('hide-block');
 } else {
   $('#'+union_Id+'-select-'+branch_Id).addClass('hide-block');
 }
}
// input[name$='letter']  -> EndsWith
// [id^=a] -> StartsWith
function build_articlePostData(union_Id,branch_Id){
 if(ARTICLE_POSTDATA[union_Id]===undefined){
   ARTICLE_POSTDATA[union_Id] = { "branch_Id":[ branch_Id ] };
 } else {
   ARTICLE_POSTDATA[union_Id].branch_Id[ARTICLE_POSTDATA[union_Id].branch_Id.length]=branch_Id;
 }
 console.log(JSON.stringify(ARTICLE_POSTDATA));
}
function load_access_unionBranches(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php', 
 { action:'GET_COUNT_LISTOFUNIONBRANCHCREATENEWSFEED', user_Id: AUTH_USER_ID },
 function(total_data){ console.log("total_data: "+total_data); 
   scroll_loadInitializer('loadAvailableCommunityList',10,load_unionBranches_contentData,total_data);
 });
}
var UNIONBRANCHDATA =[];
function load_unionBranches_contentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php', 
      { action:'GET_DATA_LISTOFUNIONBRANCHCREATENEWSFEED', user_Id: AUTH_USER_ID, limit_start:limit_start, 
	    limit_end:limit_end }, function(response){
	console.log(response);
	response = JSON.parse(response);
	var content='';
	for(var index=0;index<response.length;index++){
	  var unionName = response[index].unionName;
	  var profile_pic = response[index].profile_pic;
	  var union_Id = response[index].union_Id;
	  var branch_Id = response[index].branch_Id;
	  var minlocation = response[index].minlocation;
	  var location = response[index].location;
	  var state = response[index].state;
	  var country = response[index].country; 
	  var createNewsFeedUnionLevel = response[index].createNewsFeedUnionLevel;
	  var createNewsFeedBranchLevel = response[index].createNewsFeedBranchLevel;
	  var approveNewsFeedUnionLevel = response[index].approveNewsFeedUnionLevel;
	  var approveNewsFeedBranchLevel = response[index].approveNewsFeedBranchLevel;
	  content+='<div id="'+union_Id+'-div-'+branch_Id+'" class="list-group-item">';
	  content+='<div class="container-fluid pad0">';
	  content+='<div class="row">';
	  content+='<div class="col-xs-2">';
	  content+='<input type="checkbox" style="width:25px;height:25px;" ';
	  content+='onclick="javascript:display_postSelOpt(\''+union_Id+'\',\''+branch_Id+'\');"/>';
	  content+='</div>';
	  content+='<div align="left" class="col-xs-4">';
	  content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	  content+='</div>';
	  content+='<div align="left" class="col-xs-6">';
	  content+='<h5 style="line-height:22px;"><b>'+unionName+'</b></h5>';
	  content+='<div style="line-height:22px;color:#9e9e9e;">';
	  content+=minlocation+', '+location+', '+state+', '+country;
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  
	  content+='<div class="row mtop10p">';
	  content+='<div class="col-xs-2">';
	  content+='</div>';
	  content+='<div align="left" class="col-xs-10" style="line-height:22px;color:#ccc;">';
	  content+='<select id="'+union_Id+'-select-'+branch_Id+'" class="form-control hide-block"';
	  content+=' onchange="javascript:build_articlePostData(\''+union_Id+'\',\''+branch_Id+'\');">';
	  content+='<option value="">Select your Publication</option>';
	  if(createNewsFeedUnionLevel==='Y' && approveNewsFeedUnionLevel==='Y'){
	  content+='<option value="ACTIVE">Publish to Community</option>';
	  } else if(createNewsFeedUnionLevel==='Y' && approveNewsFeedUnionLevel==='N'){
	  content+='<option value="INACTIVE">Approve to Publish to Community</option>';
	  }   
	  if(createNewsFeedBranchLevel==='Y' && approveNewsFeedBranchLevel==='Y'){
	  content+='<option value="ACTIVE">Publish within Branch</option>';
	  } else if(createNewsFeedBranchLevel==='Y' && approveNewsFeedBranchLevel==='N'){
	  content+='<option value="INACTIVE">Approve to Publish within Branch</option>';
	  } 
	  content+='</select>';
	  content+='</div>';
	  content+='</div>';
	 
	/*
	  content+='<div class="row mtop10p">';
	  content+='<div class="col-xs-2">';
	  content+='</div>';
	  content+='<div align="left" class="col-xs-10" style="line-height:22px;color:#ccc;">';
	  content+=' <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Write&nbsp;&nbsp;&nbsp;';
	  content+=' <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Publish&nbsp;&nbsp;&nbsp;';
	  content+=' <i class="fa fa-check" aria-hidden="true"></i>&nbsp;Approve';
	  content+='</div>';
	  content+='</div>'; */
	  
	  content+='</div>';
	  content+='</div>';
	}
    
	content+=appendContent;
    document.getElementById(div_view).innerHTML=content;
    
 });
}
</script>
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
		  <input type="text" class="form-control" placeholder="Enter Article Title"/>
		</div>
		<div class="form-group">
		  <label>Short Summary&nbsp;<span class="font-red">*</span></label>
		  <textarea class="form-control" style="height:60px;" placeholder="Provide Short Description"></textarea>
		</div>
		<div class="form-group">
		  <label>Description&nbsp;<span class="font-red">*</span></label>
		  <textarea class="form-control" style="height:100px;" placeholder="Provide Description"></textarea>
		</div>
		<div class="form-group">
		  <button class="btn custom-bg form-control mtop15p mbot15p" onclick="javascript:finish_writeNewsFeedForm();"><b>Next</b></button>
		</div>
	  </div>
	 </div>
   </div>
   <div id="createNewsFeedContent_Post" class="container-fluid hide-block">
     <div align="center" class="row">
	 <div align="center" class="col-xs-12 mtop15p">
	  <div align="center" class="list-group">
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
	 
</body>
</html>