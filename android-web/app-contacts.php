<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'templates/api/api_params.php'; ?>
<?php include_once 'templates/api/api_js.php'; ?>
 <title>Authentication</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-contacts-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-contacts.js"></script>
 <script type="text/javascript">
 var AndroidSQLiteUsrFrndsInfo;
$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 alert(AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo());
});
function loadContacts(){
  var num=AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo();
  var content=AndroidSQLiteUsrFrndsInfo.data_get_UserFrndsInfo('0', num);
   var data=JSON.parse(content);
   alert(data.length);
  document.getElementById("loadData").innerHTML=content;
}
function loadUserProfileTbl(){
 document.getElementById("loadData").innerHTML=AndroidSQLiteUsrFrndsInfo.data_get_userFrndProfileList('0','0');
}
 </script>
 <style>
 .pad0 { padding:0px; }
 </style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 <div class="container-fluid">
   <div class="col-xs-12">
	<div class="list-group">
	  <div class="list-group-item pad0">
	    <div class="container-fluid mtop15p mbot15p">
		   <div class="col-xs-4">
		     <div style="width:50px;height:50px;border-radius:50%;background-color:#e7e7e7;"></div>
		   </div>
		   <div align="center" class="col-xs-8">
		     <h5 style="text-transform:uppercase;"><b>YOU CALL NAME</b></h5>
		   </div>
		</div>
	  </div>
	</div>
   </div>
 </div>
 <a href="http://192.168.1.4/mlh/android-web/app-contacts.php">
 <button class="btn btn-primary">Reload</button>
 </a>
 <button class="btn btn-primary" onclick="javascript:loadUserProfileTbl();">Tbl</button>
 <button class="btn btn-danger" onclick="javascript:alert(AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo());">Contacts</button>
 <button class="btn btn-success" onclick="javascript:loadContacts();">loadContacts</button>
 <div id="loadData">
 
 </div>
 </body>
</html>