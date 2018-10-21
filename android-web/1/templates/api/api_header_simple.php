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
});
var PREVIOUS_BACK_URL;
function goBackSetURL(url){ PREVIOUS_BACK_URL = url; }
function goBackPreviousURL(){
 if(PREVIOUS_BACK_URL===undefined){ window.history.back(); } 
 else { window.location.href=PREVIOUS_BACK_URL; }
}
// href="#load_page_breadcrumb"
</script>
<nav id="header_bot" class="navbar" style="margin-bottom:0px;border-radius:0px;">
	<div id="applogo-header" onclick="javascript:goBackPreviousURL();">
		<a class="navbar-brand a-custom" style="cursor:pointer;">
		  <i class="fa fa-arrow-left white-font" aria-hidden="true"></i>
		</a>
		<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
		  <div id="div_app_logo" class="col-md-2 col-sm-4 col-xs-10" style="padding-left:0px;"></div> 
		  
	    </div>
    </div>
</nav>
