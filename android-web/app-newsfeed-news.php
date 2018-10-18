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
 <!--script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-newsfeed-news.js"></script-->
 <?php include_once 'templates/api/api_params.php'; ?>
<script type="text/javascript">
var INFO_ID='<?php if(isset($_GET["1"])) { echo $_GET["1"]; }  ?>';
</script>
<script type="text/javascript">
$(document).ready(function(){
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_newsfeed");
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block'); 
load_data_news();
});
function load_topmenu_news(id){
 var arry_id=["id_news_preview","id_news_edit","id_news_posted"];
 var arry_content=["content_news_preview","content_news_edit","content_news_posted"];
 for(var index=0;index<arry_id.length;index++){
  if(arry_id[index]===id){
   if($('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).removeClass('hide-block'); }
   $('#'+arry_id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
   $('#'+arry_id[index]).css('color',CURRENT_DARK_COLOR);
  }
  else {
   if(!$('#'+arry_content[index]).hasClass('hide-block')){ $('#'+arry_content[index]).addClass('hide-block'); }
   $('#'+arry_id[index]).css('border-bottom','0px');
   $('#'+arry_id[index]).css('color','#000');
  }
 }
}

function load_data_news(){
 js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.newsfeed.php',
 { action:'GET_DATA_NEWSDATA', info_Id:INFO_ID },function(response){
  console.log(response);
  response = JSON.parse(response);
  var info_Id = response[0].info_Id;
  var artTitle = response[0].artTitle;
  var artShrtDesc = response[0].artShrtDesc;
  var artDesc = response[0].artDesc;
  var createdOn = response[0].createdOn;
  var images = response[0].images;
  var mediaURL01 = response[0].mediaURL01;
  var mediaURL01_videoId = get_youtube_videoId(mediaURL01);
  var mediaURL02 = response[0].mediaURL02;
  var mediaURL02_videoId = get_youtube_videoId(mediaURL02);
  var mediaURL03 = response[0].mediaURL03;
  var mediaURL03_videoId = get_youtube_videoId(mediaURL03);
  var status = response[0].status;
  var writtenBy = response[0].writtenBy;
  
  var topMenuContent='<div class="list-group">';
      if(writtenBy===AUTH_USER_ID){
	  topMenuContent+='<div class="list-group-item pad0">';
	  topMenuContent+='<div class="container-fluid">';
	  topMenuContent+='<div class="row">';
	  topMenuContent+='<div class="col-xs-4">';
	  topMenuContent+='<h5><span id="id_news_preview" class="pad10" ';
	  topMenuContent+='onclick="javascript:load_topmenu_news(this.id);">';
	  topMenuContent+='<b>Preview</b></span></h5>';
	  topMenuContent+='</div>';
	  topMenuContent+='<div class="col-xs-4">';
	  topMenuContent+='<h5><span id="id_news_edit" class="pad10" ';
	  topMenuContent+='onclick="javascript:load_topmenu_news(this.id);">';
	  topMenuContent+='<b>Edit News</b></span></h5>';
	  topMenuContent+='</div>';
	  topMenuContent+='<div class="col-xs-4">';
	  topMenuContent+='<h5><span id="id_news_posted" class="pad10" ';
	  topMenuContent+='onclick="javascript:load_topmenu_news(this.id);">';
	  topMenuContent+='<b>Posted Info</b></span></h5>';
	  topMenuContent+='</div>';
	  topMenuContent+='</div>';
	  topMenuContent+='</div>';
	  topMenuContent+='</div>';
	  }
	  topMenuContent+='</div>';
	document.getElementById("app-newsfeed-topMenu").innerHTML=topMenuContent;
	  
 var  content='<div class="pad10">';
	  content+='<div class="container-fluid">';
      content+='<div class="row">';
	  content+='<div class="col-xs-12"><h4><b>'+decodeURI(artTitle)+'</b></h4><hr/></div>';
	  content+='</div>';
	  content+='<div class="row">';
	  content+='<div class="col-xs-12"><img src="'+images+'" style="width:100%;height:auto;"/></div>';
	  content+='</div>';
	  content+='<div class="row">';
	  content+='<div align="right" class="col-xs-12 mtop15p">';
	  content+='<div><h5><b>News created on</b></h5></div>';
	  content+='<div style="color:#aaa;"><h5>'+get_stdDateTimeFormat01(createdOn)+'</h5></div>';
	  content+='</div>';
	  content+='</div>';
	  content+='<div class="row">';
	  content+='<div align="justify" class="col-xs-12">';
	  content+='<h4 style="line-height:25px;"><i>'+decodeURI(artShrtDesc)+'</i></h4><hr/>';
	  content+='</div>';
	  content+='</div>';
	  
	  content+='<div class="row">';
	  content+='<div align="justify" class="col-xs-12">';
	  content+='<h4 style="line-height:25px;"><i>'+decodeURI(artDesc)+'</i></h4><hr/>';
	  content+='</div>';
	  content+='</div>';
	  
	  content+='<div class="row">';
	  content+='<div align="justify" class="col-xs-12 pad0">';
	  content+='<h4><b>Other Media Links</b></h4><hr/>';
	  content+='</div>';
	  content+='<div class="col-xs-12">';
	  content+='<a href="'+mediaURL01+'" target="_blank">';
	  content+=display_preview_content(mediaURL01_videoId);
	  content+='</a>';
	  content+='</div>';
	  content+='<div class="col-xs-12">';
	  content+='<a href="'+mediaURL02+'" target="_blank">';
	  content+=display_preview_content(mediaURL02_videoId);
	  content+='</a>';
	  content+='</div>';
	  content+='<div class="col-xs-12">';
	  content+='<a href="'+mediaURL03+'" target="_blank">';
	  content+=display_preview_content(mediaURL03_videoId);
	  content+='</a>';
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
	  content+='</div>';
  document.getElementById("content_news_preview").innerHTML = content;
  load_topmenu_news('id_news_preview');
 });
}
</script>
 <style>
 body,.f12 { font-size:12px; }
 a,a:hover { color:#000; }
.viewReadPeopleAndImpressionsList { cursor:pointer; }

.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
/* @media screen and (min-width: 1200px) {  //lg

}
@media (min-width: 992px) and (max-width: 1199px) {  // col-md
.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
}
@media (min-width: 768px) and (max-width: 991px) { // col-sm
.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
}
@media (max-width: 767px) { // col-xs
.viewReadPeople-profilepic { width:50px;height:50px;border-radius:50%; }
} */
.fa-22px { font-size:22px; } </style>
 </head>
<body>
<!-- Modal -->
<div id="appNewsFeedNewsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header_simple.php'; ?>
	  <div id="app-page-content">
	    <div id="app-newsfeed-topMenu"></div>
	    <!-- News Feed -->
		<div id="div-newsFeed-news">
		  <div id="content_news_preview" class="hide-block">
		   <div align="center">
			<img src="images/load.gif" style="width:150px;height:150px;"/>
		   </div>
		  </div>
		  <div id="content_news_edit" class="hide-block">
		   <div align="center">
			<img src="images/load.gif" style="width:150px;height:150px;"/>
		   </div>
		  </div>
		  <div id="content_news_posted" class="hide-block">
		   <div align="center">
			<img src="images/load.gif" style="width:150px;height:150px;"/>
		   </div>
		  </div>
		</div>
	    <div class="container-fluid">
		  <div class="row">
				    
			
			        <div align="center" class="col-md-4 col-xs-12 pad10" style="border-left:1px solid #ccc;">
					  <div class="list-group" style="margin-bottom:0px;">
					    <div class="list-group-item">
					     <div class="container-fluid pad0">
						  <div class="col-md-12 col-xs-12">
							<h4 style="line-height:25px;">Is this News, a Public Issue?<br/>
							Do you want to <i class="fa fa-22px fa-bullhorn" aria-hidden="true"></i> Raise a Voice against it?</h4>
						  </div>
						  <div class="col-md-12 col-xs-12">
						     <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/create-movement">
							   <button class="btn custom-bg"><b>Start a Movement</b></button>
							 </a>
						  </div>
						 </div>
						 </div>
					  </div>
					  <hr/>
					  <div class="list-group">
						 <div align="center" class="list-group-item pad0 custom-bg">
						     <h5><b>Movement related to News</b></h5>
						 </div>
						 <div class="list-group-item"></div>
					  </div>
					   
					</div>
					<!-- Friend Request -->
				    <!--div class="col-md-4 col-xs-12">
					   <div class="panel panel-default">
					      <div class="panel-heading custom-lgt-bg"><b>Related News Feed</b></div>
						  <div class="panel-body pad0">
						     <div class="list-group">
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
							    <div class="list-group-item">
									<div class="container-fluid pad0">
									   <div class="col-md-4 col-xs-4 pad10">
									     <img src="http://placehold.it/500x300" class="img-min-profilepic"/>
									   </div>
									   <div class="col-md-8 col-xs-8">
									      <h5 style="line-height:20px;">
										    How to increase life validity of a Vehicle Tyre?
										    Why RTC buses coded with Z in all number plates?
											In Hyderabad, why are they no double-decker buses now?
										  </h5>
										  <button class="btn custom-bg white-font pull-right"><b>View More</b></button>
									   </div>
									</div>
								</div>
								
							 </div>
						  </div>
					   </div>
					</div-->
          </div>
		</div>
			
	   </div>
	</div>
 </div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>