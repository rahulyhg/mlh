<?php session_start(); ?>
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
 var CONTACTS_JSONDATA;
$(document).ready(function(){
try {
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 setTimeout(function(){ 
   CONTACTS_JSONDATA = loadContactsFromBG();
   displayContacts(CONTACTS_JSONDATA,'');
  },10);
 } catch(err) { alert(err.message); }
});

function loadContactsFromBG(){
 if(AndroidSQLiteUsrFrndsInfo!==undefined){
  var num=AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo();
  var jsonData=AndroidSQLiteUsrFrndsInfo.data_get_UserFrndsInfo();
  jsonData=JSON.parse(jsonData);
  return jsonData;
 }
}

function displayContacts(jsonData,searchText){  
   var content='';
   for(var index01=0;index01<jsonData.length;index01++){
     var frnd_Id=jsonData[index01].frnd_Id;
     var youCall=jsonData[index01].youCall;
	     content+='<div class="list-group-item pad0">';
		 content+='<div class="container-fluid" style="background-color:'+CURRENT_LIGHT_COLOR+';">';
		 content+='<div class="row">';
		 content+='<div align="center" class="col-xs-12 lineh22p">';
		 content+='<h5 class="uppercase mtop10p"><b>'+highlightLetterInAString(youCall,searchText)+'</b></h5>';
		 content+='</div>';
		 content+='</div>';
		 content+='</div>';
	 var accountData=jsonData[index01].data;
	 if(accountData!==undefined){
	 for(var index02=0;index02<accountData.length;index02++){
	   var contactId=accountData[index02].contactId;
       var phoneNumber=accountData[index02].phoneNumber;
       var isContacts=accountData[index02].isContacts;
       var isFriend=accountData[index02].isFriend;
       var user_Id=accountData[index02].user_Id;
       var userName=accountData[index02].userName;
       var surName=accountData[index02].surName;
       var name=accountData[index02].name;
       var country=accountData[index02].country;
       var state=accountData[index02].state;
       var location=accountData[index02].location;
       var minlocation=accountData[index02].minlocation;
       var createdOn=accountData[index02].createdOn;
       var profile_pic=accountData[index02].profile_pic;
	     content+='<div class="container-fluid mtop10p mbot10p">';
	     // content+='<div class="row">';
		 content+='<div class="col-xs-12" style="border:1px dotted '+CURRENT_DARK_COLOR+';padding-top:10px;padding-bottom:10px;">';
		 content+='<div class="col-xs-3 pad0">';
		 if(profile_pic===undefined || profile_pic.length==0){
		 content+='<img src="'+PROJECT_URL+'images/avatar/0.jpg" class="img-rel-profile"/>';
		 } else {
		 content+='<img src="'+profile_pic+'" class="img-rel-profile"/>';
		 }
		 content+='</div>';
		 content+='<div class="col-xs-6 pad0 lineh22p">';
		 if(surName!=undefined && name!=undefined){
		 content+='<div class="uppercase"><b>'+highlightLetterInAString(surName,searchText)+' '+highlightLetterInAString(name,searchText)+'</b></div>';
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
		 content+='<div class="mtop10p"><button class="btn btn-default">';
		 content+='<span class="fs12 custom-lgt-font" style="color:'+CURRENT_DARK_COLOR+'">';
		 content+='<i class="fa fa-whatsapp" aria-hidden="true"></i>&nbsp;<b>Invite from WhatsApp</b></button>';
		 content+='</span>';
		 content+='</div>';
		 } else {
		    if(isFriend=='NO'){
			   content+='<div class="mtop10p"><button class="btn btn-default">';
			   content+='<span class="fs12 custom-lgt-font" style="color:'+CURRENT_DARK_COLOR+'">';
		       content+='<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;<b>Send Friendship Request</b></button>';
		       content+='</span>';
		       content+='</div>';
			}
		 }
		 content+='</div>';
		 content+='<div class="col-xs-3 pad0">';
		 content+='<span class="pull-right lineh22p">';
		 if(isContacts=='YES'){
		 content+='<i class="fa fa-book custom-font" style="color:'+CURRENT_DARK_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is in your Address Book" aria-hidden="true"></i><br/>';
		 } else {
		 content+='<i class="fa fa-book custom-lgt-font" style="color:'+CURRENT_LIGHT_COLOR+'" data-toggle="tooltip"';
		 content+='title="Person is not In Address Book" aria-hidden="true"></i><br/>';
		 }
		 if(isFriend=='YES'){
		 content+='<i class="fa fa-user custom-font" style="color:'+CURRENT_DARK_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is your Friend on MyLocalHook" aria-hidden="true"></i><br/>';
		 } else {
		 content+='<i class="fa fa-user custom-lgt-font" style="color:'+CURRENT_LIGHT_COLOR+'" data-toggle="tooltip"';
		 content+='title="Person is not your Friend on MyLocalHook" aria-hidden="true"></i><br/>';
		 }
		 if(user_Id!=undefined){
		 content+='<i class="fa fa-university custom-font" style="color:'+CURRENT_DARK_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is in MyLocalHook" aria-hidden="true"></i><br/>';
		 } else {
		 content+='<i class="fa fa-university custom-lgt-font" style="color:'+CURRENT_LIGHT_COLOR+'" data-toggle="tooltip" ';
		 content+='title="Person is not in MyLocalHook" aria-hidden="true"></i><br/>';
		 }
		 
		
		 content+='</span>';
		 content+='</div>';
		 content+='</div>';
		// content+='</div>';
		content+='</div>';
	 }
	 } else {
	    content+='<div class="container-fluid">';
		content+='<div class="row">';
		content+='<div align="center" class="col-xs-12 lineh22p">';
		content+='<h4>No Data is Available</h4>';
		content+='</div>';
		content+='</div>';
		content+='</div>';
	 }
	 content+='</div>';
   }
  document.getElementById("loadData").innerHTML=content;
}

function searchDataInContacts(){
 setTimeout(function(){ 
 var search = document.getElementById("searchUserContacts").value;
 var jsonData = AndroidSQLiteUsrFrndsInfo.data_get_searchUserFrndsInfo(search);
 jsonData=JSON.parse(jsonData);
 displayContacts(jsonData,search);
 },10);
}
</script>
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
 <style>
.hgt-aapc01 { color:#989898; }
.img-rel-profile {  width:60px;height:60px;border-radius:50%;background-color:#e7e7e7; }
 </style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 
    <div class="container-fluid">
	  <div class="row">
	  <div class="col-xs-12 pad0">
	    <div class="input-group">
		  <span class="input-group-addon custom-bg" onclick="window.location.reload();"><i class="glyphicon glyphicon-refresh"></i></span>
		  <input id="searchUserContacts" type="text" class="form-control" placeholder="Search People"/>
		  <span class="input-group-addon custom-bg" onclick="javascript:searchDataInContacts();"><i class="glyphicon glyphicon-search"></i></span>
		</div>
	  </div>
	  </div>
	</div>
	<div id="loadData" class="list-group pad0"></div>
 
 <!--button class="btn btn-primary" onclick="javascript:loadUserProfileTbl();">Tbl</button>
 <button class="btn btn-danger" onclick="javascript:alert(AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo());">Contacts</button>
 <button class="btn btn-success" onclick="javascript:loadContacts();">loadContacts</button-->
 </body>
</html>