<style>
.dropdown-menu { margin:40px 0 0; }
@media (min-width: 992px) {  .dropdown-menu { width:40%; }  }
@media (min-width: 200px) and (max-width: 991px) { 
.dropdown-menu { width:100%; } 
}
.badge-notify1{ background:red;position:relative;top: -15px;left: -10px; }
.badge-notify2{ background:red;position:relative;top: -15px;left: -4px; }
.badge-notify3{ background:red;position:relative;top: -15px;left: -6px; }
.badge { background-color:#fff;color:#000; }
.fa-notify-icon { font-size:20px;margin-bottom:15px;  }
#notify-icon-div { margin-top:18px; }
.badge-blink { animation-duration: 600ms;animation-name: blink;animation-iteration-count: infinite;
    animation-direction: alternate;-webkit-animation:blink 600ms infinite; /* Safari and Chrome */ }
@keyframes blink { from { color:#000; } to { color:#fff;  } }
@-webkit-keyframes blink { from { color:#000; } to { color:#fff;  } }
</style>
<!--script type="text/javascript" src="js/pages/api/header_notify.js"></script-->
<script type="text/javascript">
function goToByScroll(id){
  id = id.replace("link", "");
  $('html,body').animate({ scrollTop: $("#"+id).offset().top},'slow');
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   $('[data-toggle="tooltip"]').tooltip(); 
//  console.log("Timestamp: "+js_getTimeStamp());
//  notify_hookrequest();
//  notify_friendrequest();
//  notify_communityrequest();
//  notify_movementrequest();
//  notify_messagesrequest();
//  notify_notificationrequest();
});
function searchDataOnMLH(){
var searchKeywrd=document.getElementById("searchKeywrd").value;
window.location.href=PROJECT_URL+'app/search/'+searchKeywrd;
}
function logout(){
 var AndroidSession;
  if(AndroidSession!==undefined){
    AndroidSession.deleteAndroidSession("AUTH_USER_ID");
  }
  $.ajax({type: "POST", url: PROJECT_URL+'backend/php/api/app.session.php',
      data:{ action:'DestroySession' },success: function(resp) { 
      window.location.href=PROJECT_URL; } 
  });
		 
}
</script>
<nav id="header_bot" class="navbar" style="margin-bottom:0px;border-radius:0px;">
	
	<div id="applogo-header">
	    <div class="pad10 pull-right">
	      <button class="btn btn-default custom-font">
		    <b><i class="fa fa-anchor" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Make a Hook</b>
		  </button>
		</div>
		<a class="navbar-brand a-custom" style="cursor:pointer;" onclick="javascript:sideWrapperToggle();">
			<span class="glyphicon glyphicon-align-justify white-font"></span>
		</a>
		<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
		
		   <!--div class="row"--> 
			  <div id="div_app_logo" class="col-md-2 col-sm-4 col-xs-5" style="padding-left:0px;"></div>
			  
			  <div class="col-md-5 col-sm-12 col-xs-12 pad10">
			     <div class="input-group">
					<input id="searchKeywrd" type="text" class="form-control" placeholder="Enter your Search" value="<?php if(isset($_GET["searchKeyword"])) { echo $_GET["searchKeyword"]; } ?>">
					<span class="input-group-addon custom-lgt-bg curpoint" onclick="javascript:searchDataOnMLH();">
					 <b>Search</b></span>
				 </div>
			  </div>
	  </div>
   </div>
   
</nav>
