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
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap-toggle.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap-slider.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap-toggle.min.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap-slider.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/file-upload.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/croppie.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-hook-bg-styles.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-hook.js"></script>
 <?php include_once 'templates/api/api_js.php'; ?>
 <?php include_once 'templates/api/api_params.php'; ?>
 <script type="text/javascript">
 $(document).ready(function(){
 cloudservers_auth();
 });
 </script>
<style>
body,.f12 { font-size:12px; }
.hide-block { display:none; }
.m0px { margin:0px; }
.mtop15px {  margin-top:15px; }
.nav-tabs { border-bottom:0px;}
.nav-tabs>li>a { margin-right:0px;margin-left:0px; }
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover { border:0px; }
.hook-inputField { margin-top:15px;padding-right:0px; }
.btn-custom-bg { border:1px solid #ccc; }
.hook-uploadpic { width:150px;height:auto; }
.hook-panel { padding:10px 0px;}
.pad-left0 { padding-left:0px; }
.pad5 { padding:5px; }
.hide-block { display:none; }
.curpoint { cursor:pointer; }
#standardHook,#premiumHook { display:none; }
#modalTab-standardHook,#modalTab-premiumHook { font-size:12px; }
.pill-sp,.pill-sp-active { border:1px solid #ccc;color:#000;font-size:12px; }
.pill-sp-active { background-color:#eee;font-weight:bold;color:#000; }
.nav>li>a { padding:8px 8px; }
.nav-pills>li>a { border-radius:0px; }  
xs (for phones - screens less than 768px wide)
sm (for tablets - screens equal to or greater than 768px wide)
md (for small laptops - screens equal to or greater than 992px wide)
lg (for laptops and desktops - screens equal to or greater than 1200px wide)
@media (min-width: 1200px) { 

}
@media (min-width: 992px) and (max-width: 1199px) { 

}
@media (min-width: 768px) and (max-width: 991px) { 

}
@media (max-width: 768px) { 
.hookpillTabsTxt { display:none; }
}
</style>
<script type="text/javascript">
function createHook(){
$('#createHookModal').modal();
selHookTab("modalTab-standardHook");
}

$(document).ready(function(){

});



function selHookTab(id){ 
var arry=["modalTab-standardHook","modalTab-premiumHook"];
for(var index=0;index<arry.length;index++){
if(arry[index]===id){ 
  if($("#"+arry[index]).hasClass("custom-lgt-bg")) { $("#"+arry[index]).removeClass("custom-lgt-bg"); } 
  if(!$("#"+arry[index]).hasClass("custom-bg")) { $("#"+arry[index]).addClass("custom-bg"); } 
  $("#"+arry[index]).css('background-color',CURRENT_DARK_COLOR);
  $("#"+arry[index]).css('color','#fff');  // 
}
else { 
  if($("#"+arry[index]).hasClass("custom-bg")) { $("#"+arry[index]).removeClass("custom-bg"); } 
  if(!$("#"+arry[index]).hasClass("custom-lgt-bg")) { $("#"+arry[index]).addClass("custom-lgt-bg"); }  
  $("#"+arry[index]).css('background-color',CURRENT_LIGHT_COLOR);  
  $("#"+arry[index]).css('color','#000');
}
}
if(id==="modalTab-standardHook"){
document.getElementById("standardHook").style.display='block';
document.getElementById("premiumHook").style.display='none';
selhook_pillTabs("hookpillTabs-general");
} else {
document.getElementById("standardHook").style.display='none';
document.getElementById("premiumHook").style.display='block';
}
}
</script>
<script type="text/javascript">

</script>
 </head>
<body>
<!-- Standard Hook Form / Premium Hook Form -->
<div id="createHookModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <!-- -->
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<div class="container-fluid pad0">
		  <div class="col-md-12">
		    <ul class="nav nav-tabs">
			  <li class="active"><a href="#" id="modalTab-standardHook" class="custom-bg" onclick="javascript:selHookTab(this.id);" style="cursor:pointer;"><b>Standard</b></a></li>
			  <li class="active"><a href="#" id="modalTab-premiumHook" class="custom-lgt-bg" onclick="javascript:selHookTab(this.id);" style="cursor:pointer;"><b>Premium</b></a></li>
			</ul>
			<!-- Standard Hook -->
			<?php include_once 'templates/pages/app-mylocalhook-standardHook.php'; ?>
			<!-- Premium Hook -->
			<div id="premiumHook">
			  <div class="list-group">
			    <div class="list-group-item hook-panel">
				   
				   <div class="container-fluid pad-left0"> <!-- container-fluid :: Start -->
				     <div align="right" class="col-md-12 hook-inputField">
					   <div><a target="_blank" href="<?php echo $_SESSION["PROJECT_URL"]; ?>doc/hook-standard-premium"><b>What is Premium Hook and How it works?</b></a></div>
					 </div>
<script type="text/javascript">
function premiumHook_chooseBizCommunity(img,id,title){
 document.getElementById("chooseBizCommunity").innerHTML='<img src="https://thdoan.github.io/bootstrap-select/images/icon-chrome.png"/>&nbsp;<b>'+title+'</b>';
}
</script>
					 <div class="col-md-12 hook-inputField">
					   <div class="dropdown">
						 <button class="btn custom-lgt-bg dropdown-toggle" type="button" 
						   data-toggle="dropdown">
						      <span id="chooseBizCommunity"><b>Choose your Business / Community Title</b></span>&nbsp;<span class="caret"></span>
						 </button>
						<ul class="dropdown-menu" style="margin:0px;width: 100%;">
						  <li class="dropdown-header custom-bg">MY BUSINESS</li>
						  <li class="divider" style="margin:0px;"></li>
						  <li>
						    <a href="#" onclick="javascript:premiumHook_chooseBizCommunity('','id','HTML');">
						      <img src="https://thdoan.github.io/bootstrap-select/images/icon-chrome.png"/>&nbsp;HTML
							</a>
						   </li>
						  <li class="divider" style="margin:0px;"></li>
						  <li class="dropdown-header custom-bg">MY COMMUNITY</li>
						  <li class="divider" style="margin:0px;"></li>
						  <li>
						    <a href="#" onclick="javascript:premiumHook_chooseBizCommunity('','id','CSS');">
							  <img src="https://thdoan.github.io/bootstrap-select/images/icon-chrome.png"/>&nbsp;CSS
							</a>
					      </li>
						</ul>
                       </div>
					 </div>
					 
					 <div class="col-md-12 hook-inputField">
					   <input type="text" class="form-control" placeholder="Enter Title Hook"/>
					 </div>
					 
					 <div class="col-md-12 hook-inputField">
					   <textarea class="form-control" placeholder="Enter Hook Description"></textarea>
					 </div>
					 
					 <div align="right" class="col-md-12 hook-inputField">
					   <img class="hook-uploadpic" src="<?php if(isset($_SESSION["PROJECT_URL"])) { echo $_SESSION["PROJECT_URL"]; } ?>images/textures/hook-uploadpicture-icon.png"/>
					 </div>
		 
					
					 <div class="col-md-12 hook-inputField">
					   <select class="form-control">
					     <option value="">Choose a Category</option>
					   </select>
					 </div>
					 
					 <div class="col-md-12 hook-inputField">
					   <select class="form-control">
					     <option value="">Choose a Sub-Category</option>
					   </select>
					 </div>
					 
		             <div class="col-md-12 hook-inputField">
					   <label>Choose People</label>
				       <div class="input-group">
				       <span class="input-group-addon custom-bg">1000</span>
				       <input id="premiumHook-choosepeople" data-slider-id='premiumHook-choosepeopleSlider' type="text"
				        data-slider-min="1000" data-slider-max="100000" data-slider-step="200" data-slider-value="5000"/>
				       <span class="input-group-addon custom-bg">100000</span>
				      </div>
<script type="text/javascript"> 
var choosepeopleSlider=$('#premiumHook-choosepeople').slider({ formatter: function(value) { return  value+' People'; } });
choosepeopleSlider.on('slideStop', function(ev){
 document.getElementById("premiumHook-people").innerHTML=$('#premiumHook-choosepeople').data('slider').getValue();
 document.getElementById("premiumHook-price").innerHTML=$('#premiumHook-choosepeople').data('slider').getValue();
});
</script>       </div>
		 
		             <div class="col-md-12 hook-inputField">
                      <label>Your Premium Hook Price is</label>
				      <div align="center">
					    <h4><b>Rs. <span id="premiumHook-price" class="custom-font">5000</span>
						to reach <span id="premiumHook-people" class="custom-font">5000</span> People</b>
						</h4>
					  </div>
					 </div>
					 
					 <div class="col-md-12 hook-inputField">
					   <button class="btn custom-bg white-font form-control" onclick="javascript:store_PremiumHookForm();"><b>Hook It!</b></button>
					 </div>
					 
					</div> <!-- container-fluid :: End -->
					
				</div>
			  </div>
			</div>
			
	      </div>
			
		</div>
		<!-- -->
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
	  <?php include_once 'templates/api/api_header.php'; ?>
	  <div id="app-page-content">
	    <div class="container-fluid">
		  <div class="row">
		    <div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div align="right" class="col-md-4">
			  <div class="btn-group">
			    <button class="btn custom-bg white-font" onclick="javascript:createHook();"><b>Create a Hook</b></button>
			  </div>
			</div>
		  </div>
		  <div class="row" style="margin-top:15px;">
			<?php include_once 'templates/pages/app-mylocalhook-hookInfo.php'; ?>
		  </div>
		</div>
	  </div>
	</div>
</div>
</body>
</html>
<?php } else { header("location:".$_SESSION["PROJECT_URL"]."initializer/start"); } ?>