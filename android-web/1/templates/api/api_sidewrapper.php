<style>
.f14 { font-size:14px; }
.div-w215px { width:215px; }
.img-profilepic { margin-top:4%;margin-bottom:4%;width:100px;height:100px;border-radius:50%;border:px solid #fff; }
.img-min-profilepic { margin-top:4%;margin-bottom:4%;width:70px;height:70px;border-radius:50%;border:px solid #fff; }
.stop-vertificalScroll { position:fixed;overflow:hidden; }
</style>
<script type="text/javascript">
function sideWrapperToggle(){
if($("#wrapper").hasClass('toggled')) { 
 $("#wrapper").removeClass('toggled'); // hides SideMenu
 $('html').removeClass("stop-vertificalScroll");
 $("#page-content-wrapper").css("position","absolute");
}
else { 
 $("#wrapper").addClass("toggled");  // adds SideMenu
 $("#page-content-wrapper").css("position","fixed");
 setTimeout(function(){ $("html").addClass("stop-vertificalScroll"); },400);
}
// sidebar-wrapper
// 
}
/*
function sideMenuToggle(){
  if($("#wrapper").hasClass("toggled")) {  $("#wrapper").removeClass("toggled"); } 
  
} */
function mainMenuSelection(id){
var arr_id=["dn_"+USR_LANG+"_adminDashboard","dn_"+USR_LANG+"_search","dn_"+USR_LANG+"_notifications",
"dn_"+USR_LANG+"_explore","dn_"+USR_LANG+"_newsfeed","dn_"+USR_LANG+"_mystuff","dn_"+USR_LANG+"_mylocalhook",
"dn_"+USR_LANG+"_logout"];
/*
  var arr_id=["dn_"+USR_LANG+"_adminDashboard","dn_"+USR_LANG+"_search","dn_"+USR_LANG+"_notifications",
  "dn_"+USR_LANG+"_explore","dn_"+USR_LANG+"_newsfeed",
			  "dn_"+USR_LANG+"_mylocalhook","dn_"+USR_LANG+"_platform","dn_"+USR_LANG+"_socialHub","dn_"+USR_LANG+"_mymessages",
			  "dn_"+USR_LANG+"_mycalendar","dn_"+USR_LANG+"_myfriends",
			  "dn_"+USR_LANG+"_findfriends","dn_"+USR_LANG+"_findcommunity","dn_"+USR_LANG+"_findmovements",];
  */
  // "dn_settings"
  console.log("mainMenuSelection: "+id);
  for(var index=0;index<arr_id.length;index++){
	if(arr_id[index]===id) { $('#'+arr_id[index]).addClass('active'); }
	else { $('#'+arr_id[index]).removeClass('active');  }
  }
  if(id==='dn_'+USR_LANG+'_logout'){ logout(); }
}
</script>
<span class="lang_english">
<ul class="sidebar-nav">
 <div id="sideWrapper-profilepic" align="center" class="div-w215px">
  <a href="<?php echo $_SESSION["PROJECT_URL"]?>app/myprofile">
	<img src="<?php echo $_SESSION["AUTH_USER_PROFILEPIC"]; ?>" class="img-profilepic"/>
  </a>
 </div>
 <!-- Admin Dashboard ::: START -->
 <?php if(isset($_SESSION["AUTH_USER_ISADMIN"]) && $_SESSION["AUTH_USER_ISADMIN"]=='Y'){	 ?>
 <li>
	<a id="dn_english_adminDashboard" href="<?php echo $_SESSION["PROJECT_URL"]?>app/adminDashBoard" 
	onclick="javascript:mainMenuSelection(this.id);">
	 <div class="f14">
		<i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>Admin Dashboard</b></span>
	 </div>
	</a>
 </li>	
 <?php } ?>
 <!-- Admin Dashboard ::: END -->
 <!-- Search ::: START -->
 <li>
	<a id="dn_english_search" href="<?php echo $_SESSION["PROJECT_URL"]?>app/search" 
	onclick="javascript:mainMenuSelection(this.id);">
	 <div class="f14">
	   <i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>Search</b></span>
	 </div>
	</a>
 </li>
 <!-- Search ::: END -->
 <!-- Notifictions ::: START -->
 <li>
	<a id="dn_english_notifications" href="<?php echo $_SESSION["PROJECT_URL"]?>app/notifications" 
	onclick="javascript:mainMenuSelection(this.id);">
	 <div class="f14">
	   <i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>Notifications</b></span>
	 </div>
	</a>
 </li>
 <!-- Notifictions ::: END -->
 <!-- NewsFeed ::: START -->
 <li>
    <a id="dn_english_newsfeed" href="<?php echo $_SESSION["PROJECT_URL"]?>newsfeed/latest-news" 
	onclick="javascript:mainMenuSelection(this.id);">
	  <div class="f14">
	    <i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>NewsFeed</b></span>
	  </div>
	</a>
 </li>
 <!-- NewsFeed ::: END -->
 <!-- MyLocalHook ::: START -->
 <li>
  <a id="dn_english_mylocalhook" href="<?php echo $_SESSION["PROJECT_URL"]?>app/hooks" 
  onclick="javascript:mainMenuSelection(this.id);">
	<div class="f14">
		<i class="fa fa-anchor" aria-hidden="true"></i>&nbsp;&nbsp;<b>MyLocalHook</b>
	</div>
  </a>
</li>
<!-- MyLocalHook ::: END -->
 <!-- Explore ::: START -->
 <li>
   <a id="dn_english_explore" href="<?php echo $_SESSION["PROJECT_URL"]?>app/explore" 
   onclick="javascript:mainMenuSelection(this.id);">
	<div class="f14">
	  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>Explore</b></span>
	</div>
   </a>
 </li>
 <!-- Explore ::: END -->
 <!-- MyStuff ::: START -->
 <li>
    <a id="dn_english_mystuff" href="<?php echo $_SESSION["PROJECT_URL"]?>app/mystuff" 
	onclick="javascript:mainMenuSelection(this.id);">
	  <div class="f14">
	    <i class="fa fa-folder" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>My Stuff</b></span>
	  </div>
	</a>
 </li>
 <!-- MyStuff ::: END -->
 <!-- Logout ::: START -->
 <li>
    <a id="dn_english_logout" href="#" onclick="javascript:mainMenuSelection(this.id);">
	  <div class="f14">
		<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;<b>Log out</b>
	  </div>
	</a>
 </li>
  <!-- Logout ::: END -->
		
		<!--li>
			<a id="dn_english_socialHub" href="<?php echo $_SESSION["PROJECT_URL"]?>app/socialHub/home" onclick="javascript:mainMenuSelection(this.id);">
				<div class="f14">
				   <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<b>Social Hub</b>
				</div>
			</a>
		</li-->
		<!--li>
			<a id="dn_english_platform" href="<!--?php echo $_SESSION["PROJECT_URL"]--?>app/explore" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-at" aria-hidden="true"></i>&nbsp;&nbsp;<b>Explore</b>
				</div>
			</a>
		</li-->
		<!--li>
			<a id="dn_english_myprofile" href="<!--?php echo $_SESSION["PROJECT_URL"]?>app/myprofile" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;<b>View Me</b>
				</div>
			</a>
		</li-->
		<!--li>
			<a id="dn_english_mymessages" href="<!--?php echo $_SESSION["PROJECT_URL"]?>app/mymessages" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>My Messages</b>
				</div>
			</a>
		</li-->
		<!--li>
			<a id="dn_english_mycalendar" href="<!--?php echo $_SESSION["PROJECT_URL"]?>app/mycalendar" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>My Calendar</b>
				</div>
			</a> 
		</li--> 
		
		<!--li>
			<a id="dn_english_myfriends" href="<?php echo $_SESSION["PROJECT_URL"]?>app/myfriends" onclick="javascript:mainMenuSelection(this.id);">
				<div class="f14">
				   <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;<b>My Friends</b>
				</div>
			</a>
		</li>
		
		
		<li>
			<a id="dn_english_findfriends" href="<?php echo $_SESSION["PROJECT_URL"]?>app/findfriends" onclick="javascript:mainMenuSelection(this.id);">
				<div class="f14">
				   <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;<b>Find Friends</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_english_findcommunity" href="<?php echo $_SESSION["PROJECT_URL"]?>app/findcommunity" onclick="javascript:mainMenuSelection(this.id);">
				<div class="f14">
				   <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;<b>Find Community</b>
				</div>
			</a>
		</li-->
		<!--li>
			<a id="dn_english_findmovements" href="<!--?php echo $_SESSION["PROJECT_URL"]?>app/findmovements" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>Find Movements</b>
				</div>
			</a>
		</li-->
		<!--li>
			<a class="dn_settings" href="<!--?php echo $_SESSION["PROJECT_URL"]?>app/settings" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;<b>Settings</b>
				</div>
			</a>
		</li-->
		
	</ul>
</span>
<span class="lang_telugu">
	<ul class="sidebar-nav">
			<div align="center" class="div-w215px">
					<img src="<?php echo $_SESSION["AUTH_USER_PROFILEPIC"]; ?>" class="img-profilepic"/>
			</div>
		<li>
			<a id="dn_telugu_home" href="<?php echo $_SESSION["PROJECT_URL"]?>app/newsfeed" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp;<span><b>న్యూస్ ఫీడ్</b></span>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_mylocalhook" href="<?php echo $_SESSION["PROJECT_URL"]?>app/mylocalhook" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-anchor" aria-hidden="true"></i>&nbsp;&nbsp;<b>మై లోకల్ హుక్</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_platform" href="<?php echo $_SESSION["PROJECT_URL"]?>app/platform" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-at" aria-hidden="true"></i>&nbsp;&nbsp;<b>శౌదన</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_myprofile" href="<?php echo $_SESSION["PROJECT_URL"]?>app/myprofile" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;<b>నా జీవన వివరణ</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_mymessages" href="<?php echo $_SESSION["PROJECT_URL"]?>app/mymessages" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>నా మెసేజెస్</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_mycalendar" href="<?php echo $_SESSION["PROJECT_URL"]?>app/mycalendar" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>నా క్యాలెండర్</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_findfriends" href="<?php echo $_SESSION["PROJECT_URL"]?>app/findfriends" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;<b>స్నేహితుల అన్వేషణ</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_mycommunity" href="<?php echo $_SESSION["PROJECT_URL"]?>app/mycommunity" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;<b>నా సంఘాలు</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_findfriends" href="<?php echo $_SESSION["PROJECT_URL"]?>app/findcommunity" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;&nbsp;<b>సంఘాల అన్వేషణ</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_mymovements" href="<?php echo $_SESSION["PROJECT_URL"]?>app/mymovements" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>నా ఉద్యమాలు</b>
				</div>
			</a>
		</li>
		<li>
			<a id="dn_telugu_findmovements" href="<?php echo $_SESSION["PROJECT_URL"]?>app/findmovements" onclick="javascript:mainMenuSelection(this.id);">
				<div>
				   <i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>ఉద్యమాల  అన్వేషణ</b>
				</div>
			</a>
		</li>
		<!--li>
			<a class="dn_settings" href="<!--?php echo $_SESSION["PROJECT_URL"]?>app/settings" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;<b>సెట్టింగ్స్</b>
				</div>
			</a>
		</li-->
		<li>
			<a id="dn_telugu_logout" href="#" onclick="javascript:mainMenuSelection(this.id);">
				<div>
					<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;<b>లాగౌట్</b>
				</div>
			</a>
		</li>
	</ul>
</span>