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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-news-bg-styles.js"></script>
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_newsfeed");
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block');
load_topMenu_published("mynewslist-id-published");
});
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
	<?php include_once 'templates/api/api_header_other.php'; ?>
	<div class="list-group">
	  <div align="center" class="list-group-item custom-lgt-bg">
		<b>MY NEWS LIST</b>
	  </div>
<script type="text/javascript">
function sel_topMenu_myNewsList(id){
 var arry_id = ["mynewslist-id-published","mynewslist-id-pending"];
 var arry_content = ["mynewslist-content-published","mynewslist-content-pending"];
 for(var index=0;index<arry_id.length;index++){
  if(arry_id[index]===id){
    if(!$('#'+arry_id[index]).hasClass('custom-font')){ 
		$('#'+arry_id[index]).addClass('custom-font'); 
	}
	if(!$('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){
		$('#'+arry_id[index]).addClass('custom-bg-solid2pxbottomborder');
	}
	if($('#'+arry_content[index]).hasClass('hide-block')){
	   $('#'+arry_content[index]).removeClass('hide-block');
	}
    $('#'+arry_id[index]).css('color',CURRENT_DARK_COLOR);
	$('#'+arry_id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	
  } else {
    if($('#'+arry_id[index]).hasClass('custom-font')){ 
	   $('#'+arry_id[index]).removeClass('custom-font'); 
	}
	if($('#'+arry_id[index]).hasClass('custom-bg-solid2pxbottomborder')){ 
	   $('#'+arry_id[index]).removeClass('custom-bg-solid2pxbottomborder'); 
	}
	if(!$('#'+arry_content[index]).hasClass('hide-block')){
	   $('#'+arry_content[index]).addClass('hide-block');
	}
    $('#'+arry_id[index]).css('color','#000');
	$('#'+arry_id[index]).css('border-bottom','0px');
  }
 }
}
function load_topMenu_published(id){
 sel_topMenu_myNewsList(id);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_COUNT_MYPUBLISHEDNEWS', user_Id:AUTH_USER_ID },function(total_data){ 
	 total_data = parseInt(total_data);
	 if(total_data>0){
	    scroll_loadInitializer('mynewslist-news-published',10,load_topMenu_publishedcontentData,total_data);
	 } else {
	   var content='<div align="center" style="color:#aaa;">';
		   content+='No News has been published by you.';
		   content+='</div>';
	   document.getElementById("mynewslist-news-published0").innerHTML=content;   
	 }
   console.log(total_data); 
   
 });
}
function load_topMenu_publishedcontentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_DATA_MYPUBLISHEDNEWS', user_Id:AUTH_USER_ID, limit_start: limit_start,limit_end:limit_end },
 function(response){ 
  var content='';
  response = JSON.parse(response);
  for(var index=0;index<response.length;index++){
   var info_Id = response[index].info_Id;
   var artTitle = decodeURI(response[index].artTitle);
   var artShrtDesc = decodeURI(response[index].artShrtDesc);
   var images = response[index].images;
   var status = response[index].status;
   var createdOn = response[index].createdOn;
   content+=display_News_simple(info_Id,artTitle,artShrtDesc,images,status,createdOn);
  }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;  	
 });
}
function load_topMenu_pending(id){
 sel_topMenu_myNewsList(id);
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_COUNT_MYPENDINGNEWS', user_Id:AUTH_USER_ID },function(total_data){ 
	 total_data = parseInt(total_data);
	 if(total_data>0){
	    scroll_loadInitializer('mynewslist-news-pending',10,load_topMenu_pendingcontentData,total_data);
	 } else {
	   var content='<div align="center" style="color:#aaa;">';
		   content+='No News is pending to publish.';
		   content+='</div>';
	   document.getElementById("mynewslist-news-pending0").innerHTML=content;   
	 }
   console.log(total_data);   
 });
}
function load_topMenu_pendingcontentData(div_view, appendContent,limit_start,limit_end){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
     { action:'GET_DATA_MYPENDINGNEWS', user_Id:AUTH_USER_ID, limit_start: limit_start,limit_end:limit_end },
 function(response){ 
  var content='';
  response = JSON.parse(response);
  for(var index=0;index<response.length;index++){
   var info_Id = response[index].info_Id;
   var artTitle = decodeURI(response[index].artTitle);
   var artShrtDesc = decodeURI(response[index].artShrtDesc);
   var images = response[index].images;
   var status = response[index].status;
   var createdOn = response[index].createdOn;
   content+=display_News_simple(info_Id,artTitle,artShrtDesc,images,status,createdOn);
  }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;  	
 });
}

function display_News_simple(info_Id,artTitle,artShrtDesc,images,status,createdOn){
 var content='<a class="a-custom" href="'+PROJECT_URL+'newsfeed/news/'+info_Id+'">';
     content+='<div class="list-group">';
	 content+='<div class="list-group-item pad0">';
	 content+='<div class="container-fluid mtop15p mbot15p">';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<img style="width:100%;height:auto;" src="'+images+'"/>';
	 content+='</div>';
	 content+='</div>';
	 content+='<div class="row">';
	 content+='<div class="col-xs-12">';
	 content+='<h5 align="justify" style="line-height:22px;"><b>'+artTitle+'</b></h5>';
	 content+='</div>';
	 content+='<div class="col-xs-12" style="color:#aaa;">'+artShrtDesc.substring(0,140)+' ...</div>';
	 content+='<div align="right" class="col-xs-12">';
	 content+='<hr style="border-top: 1px solid #ccc;"/>';
	 content+='<span style="color:#000;"><b>News created on</b></span><br/>';
	 content+='<h5 style="color:#aaa;">'+get_stdDateTimeFormat01(createdOn)+'</h5>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</div>';
	 content+='</a>';
  return content;
}
// mynewslist-news-published
</script>
	  <div align="center" class="list-group-item">
		<div class="container-fluid">
		 <div class="row">
		   <div class="col-xs-6">
		      <span id="mynewslist-id-published" class="pad10" onclick="javascript:load_topMenu_published(this.id);">
			    <b>News Published</b>
			  </span>
		   </div>
		   <div class="col-xs-6">
		     <span id="mynewslist-id-pending" class="pad10" onclick="javascript:load_topMenu_pending(this.id);">
				<b>News Pending</b>
			 </span>
		   </div>
		 </div>
		</div>
	  </div>
	</div>
	
	<div id="app-page-content">
	  <div id="mynewslist-content-published" class="hide-block">
		<div class="container-fluid">
		 <div class="row">
		  <div id="mynewslist-news-published0" class="col-xs-12">
		    <div align="center">
		      <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		  </div>
		 </div>
		</div>
      </div>
	  <div id="mynewslist-content-pending" class="hide-block">
		<div class="container-fluid">
		 <div class="row">
		  <div id="mynewslist-news-pending0" class="col-xs-12">
		    <div align="center">
		      <img src="images/load.gif" style="width:150px;height:150px;"/>
		    </div>
		  </div>
		 </div>
		</div>
      </div>
	</div>
  </div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>