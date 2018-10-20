<style>
.a-header-font { color:#fff; }
@media (min-width: 1281px) {
#bot_doc_links { display:block; }
}
@media (min-width: 1025px) and (max-width: 1280px) {
#bot_doc_links { display:block; }
}
@media (min-width: 992px) and (max-width: 1024px) {
#bot_doc_links { display:block; }
}
@media (min-width: 768px) and (max-width: 991px) and (orientation: landscape) {
#bot_doc_links { display:none; }
}
@media (min-width: 481px) and (max-width: 767px) {
#bot_doc_links { display:none; }
}
@media (min-width: 200px) and (max-width: 480px) {
#bot_doc_links { display:none; }
}
</style>
<div id="div_logo_bottom"> 
  <nav class="navbar navbar-fixed-bottom custom-bg">
	<div class="container-fluid">
    <div class="navbar-header pull-right">
      <div id="div_anups_logo"></div>
    </div>
	 <ul id="bot_doc_links" class="nav navbar-nav pull-left">
		  <li><a href="<?php echo $_SESSION["PROJECT_URL"]; ?>docs/user-agreement" class="a-header-font"><b>User Agreement</b></span></a></li>
		  <li><a href="<?php echo $_SESSION["PROJECT_URL"]; ?>docs/privacy-policy" class="a-header-font"><b>Privacy Policy</b></a></li>
		  <li><a href="<?php echo $_SESSION["PROJECT_URL"]; ?>docs/community-guidelines" class="a-header-font"><b>Community Guidelines</b></a></li>
		  <li><a href="<?php echo $_SESSION["PROJECT_URL"]; ?>docs/cookie-policy" class="a-header-font"><b>Cookie Policy</b></a></li>
		  <li><a href="<?php echo $_SESSION["PROJECT_URL"]; ?>docs/copyright-policy" class="a-header-font"><b>Copyright Policy</b></a></li>
	  </ul>
  </div>
  </nav>
</div>