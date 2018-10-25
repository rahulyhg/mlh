<?php session_start();session_unset(); 
include_once 'templates/api/api_params.php';
if(!isset($_SESSION["USR_LANG"])) { $_SESSION["USR_LANG"]='english'; } 
if(!isset($_SESSION["AUTHENTICATION_STATUS"])){ $_SESSION["AUTHENTICATION_STATUS"]='INCOMPLETED'; }
if($_SESSION["AUTHENTICATION_STATUS"]=='INCOMPLETED'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
 <?php include_once 'templates/api/api_js.php'; ?>
<style> 
body { background-color:#0ba0da; } 
</style>
<script type="text/javascript">
var Android;
var AndroidPermissions;
var AndroidDatabase;
var AndroidSQLiteUsrFrndsInfo;
$(document).ready(function(){
 $(".lang_"+USR_LANG).css('display','block');
});
function goToNext(){
 var url=PROJECT_URL+'initializer/start';
 window.location.href=url;
}
function makeOutPermissions(){
 var url=PROJECT_URL+'initializer/start';
 if(Android!==undefined && AndroidPermissions!==undefined){
  if(Android.getAndroidVersion()>=23){
    var arryPerm=["android.permission.WRITE_EXTERNAL_STORAGE","android.permission.READ_EXTERNAL_STORAGE",
			      "android.permission.READ_CONTACTS","android.permission.WRITE_CONTACTS","android.permission.CAMERA",
			      "android.permission.INTERNET","android.permission.ACCESS_NETWORK_STATE",
		          "android.permission.ACCESS_WIFI_STATE","android.permission.ACCESS_COARSE_LOCATION",
			      "android.permission.ACCESS_FINE_LOCATION"]; 
	var permissionPage=false;
    for(var index=0;index<arryPerm.length;index++){
       try {
         if(AndroidPermissions.doesPermissionExist(arryPerm[index])===false){ 
	        permissionPage=true;break; 
	     }
	   } catch(err) { alert("DoesPermissionExist: "+err); }
    }
	Android.showToast("permissionPage: "+permissionPage);
	if(!permissionPage){ Android.loadAndroidWebScreen(url);  }
	else {  AndroidPermissions.makeAPermission(arryPerm.toString()); }
  }	 else { window.location.href=url; }		  
 } else { window.location.href=url; }	
}
</script>
 
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <div id="auth-part01" class="container-fluid">
   <div align="center" class="col-md-12">
    <h3 style="font-family:'mlhfont001';color:#fff;line-height:50px;">
      <img src="images\logo-blue-flat.jpg" style="width:150px;height:auto;"/><br/>
	  Welcomes you<br/>
    </h3>
   </div>
   <div align="center" class="col-md-12" style="margin-top:100px;">
    <h4  style="font-family:'mlhfont002';color:#fff;line-height:35px;">
	  STAY CONNECTED TO YOUR LOCAL ENVIRONMENT BY CONNECTING TO PEOPLE AROUND YOU</h5>
   </div>
   <div align="center" class="col-md-12" style="margin-top:120px;">
     <button class="btn btn-default" onclick="javascript:goToNext();">
	 <b>START MY JOURNEY</b>&nbsp;&nbsp;<i class="fa fa-arrow-right"></i></button>
   </div>
 </div>
</body>
</html>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); } ?>