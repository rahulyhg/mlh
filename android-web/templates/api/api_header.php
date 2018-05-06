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
function sideMenuToggle(){
  if($("#wrapper").hasClass("toggled")) {  $("#wrapper").removeClass("toggled"); } 
  else { $("#wrapper").addClass("toggled"); }
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
</script>
<nav id="header_bot" class="navbar" style="margin-bottom:0px;border-radius:0px;">
	
	<div id="applogo-header">
		<a class="navbar-brand a-custom" style="cursor:pointer;" onclick="javascript:sideMenuToggle();">
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

			  <!--div id="notify-icon-div" class="col-md-4 col-xs-12">
			     <div class="pull-right">
				     <a href="#" id="notify-hookrequest" data-toggle="tooltip" data-placement="bottom"  title="Hook Requests" onclick="javascript:notify_hookrequest_effect_stop();">
					     <i id="notify-hookrequest-icon" class="fa fa-anchor fa-notify-icon white-font" aria-hidden="true"></i>
					     <span id="notify-hookrequest-badge" class="badge badge-notify3">3</span>
					 </a>
					 
				     <a href="#" id="notify-friendrequest" data-toggle="tooltip" data-placement="bottom"  title="Friend Requests" onclick="javascript:notify_friendrequest_effect_stop();">
					     <i id="notify-friendrequest-icon" class="fa fa-user fa-notify-icon white-font" aria-hidden="true"></i>
					     <span id="notify-friendrequest-badge" class="badge badge-notify3">3</span>
					 </a>

					 <a href="#" id="notify-communityrequest" data-toggle="tooltip" data-placement="bottom"  title="Community Requests" onclick="javascript:notify_communityrequest_effect_stop();">
					     <i id="notify-communityrequest-icon" class="fa fa-users fa-notify-icon white-font" aria-hidden="true"></i>
					     <span id="notify-communityrequest-badge" class="badge badge-notify3">3</span>
					 </a>
					 
					 <a href="#" id="notify-movementrequest" data-toggle="tooltip" data-placement="bottom"  title="Movement Requests" onclick="javascript:notify_movementrequest_effect_stop();">
					     <i id="notify-movementrequest-icon" class="fa fa-hand-paper-o fa-notify-icon white-font" aria-hidden="true"></i>
					     <span id="notify-movementrequest-badge" class="badge badge-notify3">3</span>
					 </a>
					 
					 <a href="#" id="notify-messagesrequest" data-toggle="tooltip" data-placement="bottom"  title="Messages" onclick="javascript:notify_messagesrequest_effect_stop();">
						 <i id="notify-messagesrequest-icon" class="fa fa-envelope fa-notify-icon white-font" aria-hidden="true"></i>
						 <span id="notify-messagesrequest-badge" class="badge badge-notify2">3</span>
					 </a>
					 
					 <a href="#" id="notify-notificationsrequest" data-toggle="tooltip" data-placement="bottom"  title="Notifications" onclick="javascript:notify_notificationrequest_effect_stop();">
						 <i id="notify-notificationsrequest-icon" class="fa fa-bell fa-notify-icon white-font" aria-hidden="true"></i>
						 <span id="notify-notificationsrequest-badge" class="badge badge-notify1">3</span>
					 </a>
				 <div>
			  </div>
		   </div>
		   
		</div-->
	      <!--/div-->
		  
	  </div>
   </div>
   
</nav>
