<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Create Community</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/easy-autocomplete.min.css"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/db.identity.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.easy-autocomplete.min.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-create-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <style>
.pad0 { padding:0px; }
.mtop5p { margin-top: 5px; }
.mtop10p { margin-top:10px; }
.mtop15p { margin-top:15px; }
.mbot5p { margin-bottom:5px; }
.mbot10p { margin-bottom:10px; }
.mbot15p { margin-bottom:15px; }
</style>
<script type="text/javascript">
$(document).ready(function(){
bgstyle(3);
$(".lang_"+USR_LANG).css('display','block');
});
</script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div class="list-group" style="margin-bottom:0px;">
 <div align="center" class="list-group-item" style="background-color:#f5f5f5;">
 <h5 class="uppercase"><b>Create New Branch</b></h5>
 </div>
 </div>
 <script type="text/javascript">
$(document).ready(function(){
 communityCreateNewBranch('communityNewBranch_branchInfo');
});
function communityCreateNewBranch(id){
 var arry_Id=["communityNewBranch_branchInfo","communityNewBranch_members"];
 var arry_Id_content=["communityNewBranch_branchInfo_content","communityNewBranch_members_content"];
 for(var index=0;index<arry_Id.length;index++){
    for(var index=0;index<arry_Id.length;index++){
   if(id===arry_Id[index]){
     $('#'+arry_Id[index]).css('color',CURRENT_DARK_COLOR);
     $('#'+arry_Id[index]).css('border-bottom','2px solid '+CURRENT_DARK_COLOR);
	 if($('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).removeClass('hide-block'); 
	 }
   } else {
     $('#'+arry_Id[index]).css('color','#000');
     $('#'+arry_Id[index]).css('border-bottom','0px');
	 if(!$('#'+arry_Id_content[index]).hasClass('hide-block')) { 
	    $('#'+arry_Id_content[index]).addClass('hide-block'); 
	 }
   }
 }
 }
} 
function setBranchInformation(){
 communityCreateNewBranch('communityNewBranch_members');
}
</script>	
<div class="list-group">
<div class="list-group-item">
<div class="container-fluid">
<div class="row">
<div class="col-xs-8"><span id="communityNewBranch_branchInfo" class="padbot10"><b>1. Branch Information</b></span></div>
<div class="col-xs-4"><span id="communityNewBranch_members" class="padbot10"><b>2. Members</b></span></div>
</div>
</div>
</div>
</div>

<div id="communityNewBranch_branchInfo_content" class="container-fluid hide-block">
<div class="row">
<div class="col-xs-12">
 <!-- Country -->
 <div class="form-group">
  <label>Country</label>
  <select id="communityNewBranch_branchInfo_country" class="form-control">
    <option value="">Select Country</option>
  </select>
 </div>
 <!-- State -->
 <div class="form-group">
  <label>State</label>
  <select id="communityNewBranch_branchInfo_state" class="form-control">
    <option value="">Select State</option>
  </select>
 </div>
 <!-- Location -->
 <div class="form-group">
  <label>Location</label>
  <select id="communityNewBranch_branchInfo_location" class="form-control">
    <option value="">Select Location</option>
  </select>
 </div>
 <!-- Locality -->
 <div class="form-group">
  <label>Locality</label>
  <select id="communityNewBranch_branchInfo_locality" class="form-control">
    <option value="">Select Locality</option>
  </select>
 </div>
 <!-- Button -->
 <div class="form-group">
  <button class="btn custom-bg form-control" onclick="javascript:setBranchInformation();"><b>Next</b></button>
 </div>
</div>
</div>
</div>
<div id="communityNewBranch_members_content" class="container-fluid hide-block">
<div class="row">
<div class="col-xs-12">
<!-- Name -->
<script type="text/javascript">
$(document).ready(function(){
autocomplete_load_members();
});
var MEMBER_ID;
var MEMBER_DISPLAYCONTENT;
var MEMBER_ARRAY_ID=[];
var MEMBER_ROLE_ARRAY=[];
function deleteFromArray_member(id){

}
function finish_AddMembersToBranch(){
 console.log("MEMBER_ARRAY_ID: "+JSON.stringify(MEMBER_ARRAY_ID));
 console.log("MEMBER_ROLE_ARRAY: "+JSON.stringify(MEMBER_ROLE_ARRAY));
}

function addRoleToMemberOfBranch(member_Id){
 var role_Id = unionprof_mem_roles_Id();
 var roleName = document.getElementById("roleName_"+member_Id).value;
 MEMBER_ROLE_ARRAY[MEMBER_ROLE_ARRAY.length] = { role_Id: role_Id, roleName: roleName };
 for(var index=0;index<MEMBER_ARRAY_ID.length;index++){
   if(member_Id===MEMBER_ARRAY_ID[index].member_Id){
    
   }
 }
 
}

function addToArray_members(){
 document.getElementById("communityNewBranch_members_name").value="";
 console.log(MEMBER_DISPLAYCONTENT);
 var duplicateRecognizer=false;
 if(MEMBER_ARRAY_ID.length>0){
 for(var index=0;index<MEMBER_ARRAY_ID.length;index++){
  if(MEMBER_ID===MEMBER_ARRAY_ID[index].member_Id) { duplicateRecognizer=true;break; }
 }
 }
 if(MEMBER_DISPLAYCONTENT!==undefined && !duplicateRecognizer){
   var size=MEMBER_ARRAY_ID.length;
   MEMBER_ARRAY_ID[size]={ member_Id:MEMBER_ID };
   MEMBER_DISPLAYCONTENT+='<div id="div_communityNewBranch_selectedMembers'+(size+1)+'"></div>';
   document.getElementById("div_communityNewBranch_selectedMembers"+size).innerHTML=MEMBER_DISPLAYCONTENT;
   autocomplete_load_memberRole(MEMBER_ID);
 }
 
}
function displayTemplate_membersContent(profile_pic, name, minlocation, location, state, country){
    MEMBER_DISPLAYCONTENT='<div class="list-group">';
	MEMBER_DISPLAYCONTENT+='<div class="list-group-item pad0">';
	MEMBER_DISPLAYCONTENT+='<div class="container-fluid mtop15p mbot15p">';
	MEMBER_DISPLAYCONTENT+='<div class="row">';
	MEMBER_DISPLAYCONTENT+='<div class="col-xs-12">';
	MEMBER_DISPLAYCONTENT+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
	MEMBER_DISPLAYCONTENT+='</div>';
    MEMBER_DISPLAYCONTENT+='</div>'
	MEMBER_DISPLAYCONTENT+='<div class="row">';
	MEMBER_DISPLAYCONTENT+='<div class="col-xs-4">';
	MEMBER_DISPLAYCONTENT+='<img src="' +profile_pic+ '" class="profile_pic_img3"/>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='<div class="col-xs-8">';
	MEMBER_DISPLAYCONTENT+='<div>'+name+'<div>';
	MEMBER_DISPLAYCONTENT+='<div class="mtop5p">';
	MEMBER_DISPLAYCONTENT+='<div class="input-group">';
	MEMBER_DISPLAYCONTENT+='<input id="roleName_'+MEMBER_ID+'" type="text" style="z-index:0;" class="form-control" placeholder="Enter Role">';
	MEMBER_DISPLAYCONTENT+='<span id="roleDone_'+MEMBER_ID+'" class="input-group-addon" ';
	MEMBER_DISPLAYCONTENT+='onclick="javascript:addRoleToMemberOfBranch(\''+MEMBER_ID+'\');"><b>Done</b></span>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='<div class="mtop5p" style="color:#929090;">'+minlocation+', '+location+', ';
	MEMBER_DISPLAYCONTENT+=state+', '+country+'</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
    MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
	MEMBER_DISPLAYCONTENT+='</div>';
}
function autocomplete_load_memberRole(MEMBER_ID){
    $("#roleName_"+MEMBER_ID).autocomplete({        
        source: function(request, response) {
		    console.log("autocomplete_load_memberRole: "+JSON.stringify(MEMBER_ROLE_ARRAY));
		    response(MEMBER_ROLE_ARRAY);
        },
        select: function( event, ui ) {
              $("#roleName_"+MEMBER_ID).val( ui.item.roleName); //ui.item is your object from the array
          return false;
        }
    });
}
function autocomplete_load_members(){
var options = { url: function(phrase) {
    var urlContent=PROJECT_URL+"backend/php/dac/controller.module.app.user.authentication.php";
	    urlContent+="?action=GET_AUTOCOMPLETE_USERS&searchTerm="+phrase;
        return urlContent;	
}, getValue: "name",
    list: { match: { enabled: true },maxNumberOfElements: 10,
           onSelectItemEvent: function() { 
		     MEMBER_ID = $("#communityNewBranch_members_name").getSelectedItemData().user_Id;
			 var profile_pic = $("#communityNewBranch_members_name").getSelectedItemData().profile_pic;
			 var name = $("#communityNewBranch_members_name").getSelectedItemData().name;
			 var minlocation = $("#communityNewBranch_members_name").getSelectedItemData().minlocation;
			 var location = $("#communityNewBranch_members_name").getSelectedItemData().location;
			 var state = $("#communityNewBranch_members_name").getSelectedItemData().state;
			 var country = $("#communityNewBranch_members_name").getSelectedItemData().country;
			 displayTemplate_membersContent(profile_pic, name, minlocation, location, state, country);
		   },
		   onHideListEvent: function() { console.log(MEMBER_ID); }
	},
    template: { type: "custom",
				method: function(value, item) {
				console.log("item: "+JSON.stringify(item)+" value: "+value);
				 var content='<div class="container-fluid mtop15p">';
				     content+='<div class="row">';
					 content+='<div class="col-xs-4">';
					 content+='<img src="' + (item.profile_pic)+ '" class="profile_pic_img3"/>';
					 content+='</div>';
					 content+='<div class="col-xs-8">';
					 content+='<span>'+value+'<span><br/>';
					 content+='<span style="color:#929090;">'+item.minlocation+', '+item.location+', ';
					 content+=item.state+', '+item.country+'</span>';
					 content+='</div>';
					 content+='</div>';
					 content+='</div>';
				return content;
			    } } };
$("#communityNewBranch_members_name").easyAutocomplete(options);
$(".easy-autocomplete").css('width','100%');
$(".easy-autocomplete-container").css('margin-top','30px');
}
</script>
 <div class="form-group">
  <label>Name</label>
  <div class="input-group">
    <input type="text" id="communityNewBranch_members_name" class="form-control" placeholder="Enter Member Name"/>
	<span class="input-group-addon custom-bg" onclick="javascript:addToArray_members();">Add</span>
  </div>
 </div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div id="div_communityNewBranch_selectedMembers0"></div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<button class="btn btn-default" onclick="javascript:finish_AddMembersToBranch();"><b>I'm done</b></button>
</div>
</div>
</div>

 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>