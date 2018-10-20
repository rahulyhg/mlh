<?php session_start();
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>My Profile</title>
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
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-myprofile-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-user-myprofile.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
<style>
// .unselectHzTab { color:#fff; }
// .unselectHzTab:hover { color:#000; }
</style>
<script type="text/javascript">
function loadUserProfile(){
// load  
} 
$(document).ready(function(){
cloudservers_auth();
});
</script>
<script type="text/javascript">
function profilepicForm_mediaContent(){
IMG_URL='';
var content='<div class="modal-dialog">';
    content+='<div class="modal-content">';
    content+='<div class="modal-header">';
    content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
    content+='<h4 class="modal-title"><b>Edit Profile Picture</b></h4>';
    content+='</div>';
    content+='<div class="modal-body">';
    content+='<div id="profilepic-content-media" class="row">';
	content+='<div align="center" class="col-md-12">';
	content+='<input type="file" id="profilepicForm_fileElem" accept="image/*" ';
	content+='onchange="handleFiles(this.id,\'profilepicForm_div_cropping\',\'profilepicForm-img-crop\'';
	content+=',this.files,\'profilepicForm_fileSelect\',\'profilepicForm_pic_done\',150,50,175,75,\'square\')">';
	content+='<img id="profilepicForm_fileSelect" class="profilepicForm-uploadpic" ';
	content+='src="'+PROJECT_URL+'images/textures/upload900x300.png" ';
	content+='onclick="javascript:imgClick(\'profilepicForm_fileElem\');"/>';
	content+='<div id="profilepicForm-img-crop" class="mtop15px"></div>';
	content+='<div id="profilepicForm_div_cropping" align="center"></div>';
	content+='<div align="center" class="col-md-12 mtop15p" style="float:right!important;">';	
	content+='<div id="profilepicForm_pic_done" class="btn-group">';
	content+='<button align="center" class="btn custom-bg" ';
	content+=' style="background-color:'+CURRENT_DARK_COLOR+';color:#fff;" ';
	content+='onclick="javascript:profilepicForm_mediaContent();">';
	content+='<b>Edit Picture</b></button>';
	content+='<button class="btn custom-lgt-bg" ';
	content+=' style="background-color:'+CURRENT_LIGHT_COLOR+';color:#000;" ';
	content+=' onclick="javascript:updateProfilepic();"><b>Done</b></button>';
	content+='</div>';
	content+='</div>';	
	content+='</div>';			
    content+='</div>';
    content+='</div>';
    content+='</div>';
    content+='</div>';
 document.getElementById("profilepicModal").innerHTML=content;
}
function updateProfilepic(){
/* Set in Session */
sessionJSON='{"session_set":[{"key":"AUTH_USER_PROFILEPIC","value":"'+IMG_URL+'"}],';
sessionJSON+='"session_get":["AUTH_USER_PROFILEPIC"]}';
js_session(sessionJSON,function(response){});
/* Update profile Picture into Table */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.myprofile.php',
{ action:'UPDATE_USER_PROFILE', profile_pic:IMG_URL, user_Id:AUTH_USER_ID, profile_pic:IMG_URL },
function(response){ });
/* Reset on UI */
var img_pp_content='<img src="'+IMG_URL+'" style="width:100%;height:auto;"/>';
document.getElementById("display_user_profile").innerHTML=img_pp_content;
$('#profilepicModal').modal("hide");
/* SideWrapper */
var img_sw_pp_content='<a href="'+PROJECT_URL+'app/myprofile">';
	img_sw_pp_content+='<img src="'+IMG_URL+'" class="img-profilepic"/>';
	img_sw_pp_content+='</a>';
document.getElementById("sideWrapper-profilepic").innerHTML=img_sw_pp_content;				
}
</script>
 <style>
input[type="file"] { visibility:hidden; }
.profilepicForm-uploadpic { width:100%;height:auto; }
#profilepicForm_pic_done { display:none; }
 </style>
</head>
<body>
<!-- Modal -->
<div id="profilepicModal" class="modal fade" role="dialog">
  
</div>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="wrapper" class="toggled">
	<!-- Core Skeleton : Side and Top Menu -->
	<div id="sidebar-wrapper">
	  <?php include_once 'templates/api/api_sidewrapper.php'; ?>
	</div>
<style>
#tpMenu_myprofile_content,#tpMenu_other_content { display:none;cursor:pointer; }
</style>
<script type="text/javascript">
$(document).ready(function(){
sel_tpMenu("tpMenu_myprofile");
});
function sel_tpMenu(id){ 
var arr_id=["tpMenu_myprofile","tpMenu_other"];
var arr_id_c=["tpMenu_myprofile_content","tpMenu_other_content"];
 for(var index=0;index<arr_id.length;index++){
  if(arr_id[index]===id){
    if(!$('#'+arr_id[index]).hasClass('custom-bg')) { $('#'+arr_id[index]).addClass('custom-bg'); }
	if($('#'+arr_id[index]).hasClass('custom-lgt-bg')) { $('#'+arr_id[index]).removeClass('custom-lgt-bg'); }
	$('#'+arr_id[index]).css('background-color',CURRENT_DARK_COLOR);
	$('#'+arr_id[index]).css('color','#fff');
	document.getElementById(arr_id_c[index]).style.display='block';
  } else {
	if($('#'+arr_id[index]).hasClass('custom-bg')) { $('#'+arr_id[index]).removeClass('custom-bg'); }
	if(!$('#'+arr_id[index]).hasClass('custom-lgt-bg')) { $('#'+arr_id[index]).addClass('custom-lgt-bg'); }
	$('#'+arr_id[index]).css('background-color',CURRENT_LIGHT_COLOR);
	$('#'+arr_id[index]).css('color','#000');
	document.getElementById(arr_id_c[index]).style.display='none';
  }
 }
}
</script>
    <div id="page-content-wrapper">
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
		 <div id="app-page-title" class="" style="margin-bottom:0px;">
		  
		  <div id="tpMenu_myprofile_content">
		  
			<div id="display_user_profile" align="center" class="">
				<img src="<?php echo $_SESSION["AUTH_USER_PROFILEPIC"]; ?>" style="width:100%;height:auto;"/>
			</div>
			
			<div class="list-group pad0">
			  <div align="center" class="custom-bg list-group-item" data-toggle="modal" data-target="#profilepicModal" 
			     style="cursor:pointer;" onclick="javascript:profilepicForm_mediaContent();">
				   <i class="fa fa-edit"></i>&nbsp;<b>Edit Profile Picture</b>
			  </div>
			</div>
			
			<!-- Username -->
			<div class="list-group pad0">
			<div class="list-group-item" style="border:0px;">
			   <label>Username</label>
			   <div class="input-group">
			    <div class="form-control">
			      <div><?php echo $_SESSION["AUTH_USER_USERNAME"]; ?></div>
			    </div>
				<span class="input-group-addon custom-bg"><i class="fa fa-edit"></i></span>
			   </div>
			</div>
			</div>
			
<script type="text/javascript">
$(document).ready(function(){ 
loadSubscriptionTab();
hzTabSelection('generalInformationHzTab'); 
});
function hzTabSelection(id){        
 var arryHzTab=["generalInformationHzTab","yourSubscriptionHzTab"];
 var arryTabDataViewer=["generalInformationContent","yourSubscriptionContent"];
 for(var index=0;index<arryHzTab.length;index++){
 if(arryHzTab[index]===id){
   if(!$("#"+arryHzTab[index]).hasClass('custom-lgt-bg')){ $("#"+arryHzTab[index]).addClass('custom-lgt-bg'); }
   if($("#"+arryHzTab[index]).hasClass('unselectHzTab')){ $("#"+arryHzTab[index]).removeClass('unselectHzTab'); }
   if($("#"+arryTabDataViewer[index]).hasClass('hide-block')){ $("#"+arryTabDataViewer[index]).removeClass('hide-block'); }
   $("#"+arryHzTab[index]).css('border-radius','0px');
   $("#"+arryHzTab[index]).css('background-color',CURRENT_LIGHT_COLOR);
   $("#"+arryHzTab[index]).css('color','#000');
   
  } else {
   if($("#"+arryHzTab[index]).hasClass('custom-lgt-bg')){ $("#"+arryHzTab[index]).removeClass('custom-lgt-bg'); }
   if(!$("#"+arryHzTab[index]).hasClass('unselectHzTab')){ $("#"+arryHzTab[index]).addClass('unselectHzTab'); }
   if(!$("#"+arryTabDataViewer[index]).hasClass('hide-block')){ $("#"+arryTabDataViewer[index]).addClass('hide-block'); }
   $("#"+arryHzTab[index]).css('border-radius','0px');
   $("#"+arryHzTab[index]).css('background-color',CURRENT_DARK_COLOR);
   $("#"+arryHzTab[index]).css('color','#fff');
   
  }
 }
}
function loadSubscriptionTab(){
 var subscriptionJSON='<?php if(isset($_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"])) { echo $_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]; } ?>';
 console.log("subscriptionJSON: "+subscriptionJSON);
 subscriptionJSON=JSON.parse(subscriptionJSON);
}
</script>
			<div style="height:45px;">
			<div class="scroller scroller-left col-xs-1 custom-bg" style="height:41px;">
			   <i class="glyphicon glyphicon-chevron-left"></i>
		    </div>
		
			<div class="scrollTabwrapper custom-bg col-xs-10">
				<ul class="nav nav-tabs scrollTablist" id="myTab" style="border-bottom:0px;">
					<li><a id="generalInformationHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>General Information</b></a></li>
					<li><a id="yourSubscriptionHzTab" href="#" onclick="javascript:hzTabSelection(this.id);"><b>Your Subscriptions</b></a></li>
				</ul>
			</div>
			
			<div class="scroller scroller-right col-xs-1 custom-bg" style="height:41px;">
			  <i class="glyphicon glyphicon-chevron-right"></i>
		    </div>
			
			</div>

			<div class="container-fluid mtop15p">
			<div id="generalInformationContent" class="hide-block">
			  <div class="col-xs-12 pad0">
				  <button class="btn custom-bg pull-right"><i class="fa fa-edit"></i>&nbsp;<b>Edit</b></button>
			  </div>
			  <!-- Surname -->
			  <div class="col-xs-12 mtop15p">
			   <label>Surname</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_SURNAME"]; ?></div>
			   </div>
			  </div>
			  <!-- Fullname -->
			  <div class="col-xs-12 mtop15p">
			   <label>Fullname</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_FULLNAME"]; ?></div>
			   </div>
			  </div>
			  <!-- Gender -->
			  <div class="col-xs-12 mtop15p">
			   <label>Gender</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_GENDER"]; ?></div>
			   </div>
			  </div>
			  <!-- Mobile Number -->
			  <div class="col-xs-12 mtop15p">
			   <label>Mobile Number</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_COUNTRYCODE"]."-".$_SESSION["AUTH_USER_PHONENUMBER"]; ?></div>
			   </div>
			  </div>
			  <!-- DOB -->
			  <div class="col-xs-12 mtop15p">
			   <label>Date of Birth</label>
			   <div class="input-group form-control">
			      <div><?php echo date_format(date_create($_SESSION["AUTH_USER_DOB"]),"d F Y"); ?></div>
			   </div>
			  </div>
			  <!-- COUNTRY -->
			  <div class="col-xs-12 mtop15p">
			   <label>Country</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_COUNTRY"]; ?></div>
			   </div>
			  </div>
			  <!-- STATE -->
			  <div class="col-xs-12 mtop15p">
			   <label>State</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_STATE"]; ?></div>
			   </div>
			  </div>
			  <!-- LOCATION -->
			  <div class="col-xs-12 mtop15p">
			   <label>Location</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_LOCATION"]; ?></div>
			   </div>
			  </div>
			  <!-- LOCALITY -->
			  <div class="col-xs-12 mtop15p mbot15p">
			   <label>Locality</label>
			   <div class="input-group form-control">
			      <div><?php echo $_SESSION["AUTH_USER_LOCALITY"]; ?></div>
			   </div>
			  </div>
			</div>
			<div id="yourSubscriptionContent" class="hide-block"></div>
			
			</div>
		  </div>
		  
		  <div id="tpMenu_other_content">
		  
		  </div>
		  
		</div>
		
	  </div>
	</div>
 </div>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } ?>