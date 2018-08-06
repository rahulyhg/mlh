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
 loadContacts();
});
function loadContacts(){
 if(AndroidSQLiteUsrFrndsInfo!==undefined){
  var num=AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo();
  var data=AndroidSQLiteUsrFrndsInfo.data_get_UserFrndsInfo('0', num);
 // document.getElementById("appContacts").innerHTML=data;
   data=JSON.parse(data);
   var content='';
   for(var index01=0;index01<data.length;index01++){
     var frnd_Id=data[index01].frnd_Id;
     var youCall=data[index01].youCall;
	     content+='<div class="list-group-item pad0">';
		 content+='<div class="container-fluid mtop10p mbot10p">';
		 content+='<div class="row">';
		 content+='<div align="center" class="col-xs-12 lineh22p">';
		 content+='<h5 class="uppercase"><b>'+youCall+'</b></h5>';
		 content+='</div>';
		 content+='</div>';
		 
	 for(var index02=0;index02<data[index01].accounts.length;index02++){
	   var contactId=data[index01].accounts[index02].contactId;
       var phoneNumber=data[index01].accounts[index02].phoneNumber;
       var isContacts=data[index01].accounts[index02].isContacts;
       var isFriend=data[index01].accounts[index02].isFriend;
       var user_Id=data[index01].accounts[index02].user_Id;
       var userName=data[index01].accounts[index02].userName;
       var surName=data[index01].accounts[index02].surName;
       var name=data[index01].accounts[index02].name;
       var country=data[index01].accounts[index02].country;
       var state=data[index01].accounts[index02].state;
       var location=data[index01].accounts[index02].location;
       var minlocation=data[index01].accounts[index02].minlocation;
       var createdOn=data[index01].accounts[index02].createdOn;
       var profile_pic=data[index01].accounts[index02].profile_pic;
	   
	     content+='<div class="row">';
		 content+='<div class="col-xs-3">';
		 if(profile_pic===undefined || profile_pic.length==0){
		 content+='<img src="'+PROJECT_URL+'images/avatar/0.jpg" class="img-rel-profile"/>';
		 } else {
		 content+='<img src="'+profile_pic+'" class="img-rel-profile"/>';
		 }
		 content+='</div>';
		 content+='<div class="col-xs-7 lineh22p">';
		 if(surName!=undefined && name!=undefined){
		 content+='<div class="uppercase"><b>'+surName+' '+name+'</b></div>';
		 }
		 if(minlocation!=undefined && location!=undefined && state!=undefined && country!=undefined){
		 content+='<div class="fs13 mtop2p mbot2p">'+minlocation+', '+location+', '+state+', '+country+'</div>';
		 }
		 if(phoneNumber!=undefined){
		 content+='<div>';
		 content+='<b>Phone: </b><span class="hgt-aapc01"><b>'+phoneNumber+'</b></span><br/>';
		 content+='</div>';
		 }
		 if(user_Id==undefined){
		 content+='<div class="mtop10p"><button class="btn btn-success">';
		 content+='<i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;Invite from Whatsapp</button></div>';
		 }
		 content+='</div>';
		 content+='<div class="col-xs-2">';
		 content+='<span class="pull-right lineh45p">';
		 if(isContacts=='YES'){
		 content+='<i class="fa fa-2x fa-book custom-font" style="color:'+CURRENT_DARK_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is in your Address Book" aria-hidden="true"></i><br/>';
		 } else {
		 content+='<i class="fa fa-2x fa-book custom-lgt-font" style="color:'+CURRENT_LIGHT_COLOR+'" data-toggle="tooltip"';
		 content+='title="Person is not In Address Book" aria-hidden="true"></i><br/>';
		 }
		 if(user_Id!=undefined){
		 content+='<i class="fa fa-2x fa-university custom-font" style="color:'+CURRENT_DARK_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is in MyLocalHook" aria-hidden="true"></i>';
		 } else {
		 content+='<i class="fa fa-2x fa-university custom-lgt-font" style="color:'+CURRENT_LIGHT_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is not in MyLocalHook" aria-hidden="true"></i>';
		 }
		 content+='</span>';
		 content+='</div>';
		 content+='</div>';
	 }
	 content+='</div>';
	 content+='</div>';
   }
   
  document.getElementById("loadData").innerHTML=content;
 }
}
function loadUserProfileTbl(){
 document.getElementById("loadData").innerHTML=AndroidSQLiteUsrFrndsInfo.data_get_userFrndProfileList('0','0');
}
 </script>
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
 <style>
.hgt-aapc01 { color:#989898; }
.img-rel-profile {  width:80px;height:80px;border-radius:50%;background-color:#e7e7e7; }
 </style>
</head>
<body>
<!-- {"data":[{"user_Id":"USR273782437846","username":"geetha","surName":"Nellutla","name":"Geetha Rani ",
	           "phoneNumber":"+91|9959633209","minlocation":"L. B. Nagar","location":"Ranga Reddy District",
	          "state":"Telangana","country":"India","IsFriend":"NO"},{...}]} -->
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 <!--a href="http://192.168.1.4/mlh/android-web/app-contacts.php">
 <button class="btn btn-primary">Reload</button>
 </a>
 <div id="appContacts"></div-->
	<div id="loadData" class="list-group pad0"></div>
 
 <!--button class="btn btn-primary" onclick="javascript:loadUserProfileTbl();">Tbl</button>
 <button class="btn btn-danger" onclick="javascript:alert(AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo());">Contacts</button>
 <button class="btn btn-success" onclick="javascript:loadContacts();">loadContacts</button>
 <div id="loadData">
 
 </div-->
 </body>
</html>