<div class="row">
<div class="col-xs-12">
<!-- Name -->
<script type="text/javascript">
var MEMBER_ID;
var MEMBER_DISPLAYCONTENT;
var MEMBERS_LIST={};
var MEMBER_ARRAY_ID=[];
function select_display_roles(div_Id,member_Id){
 if(ROLE_INFO!==undefined){
 var content='<select id="roles_select_'+member_Id+'" class="form-control" ';
     content+='onclick="javascript:setRoleToMember(\''+member_Id+'\');">';
     content+='<option value="">Select Role</option>';
 for(var role_Id in ROLE_INFO){
  roleName= ROLE_INFO[role_Id].roleName;
  content+='<option value="'+role_Id+'">'+roleName+'</option>';
 }
 content+='</select>';
 document.getElementById(div_Id).innerHTML=content;
 }
}
function setRoleToMember(member_Id){

}
function show_roles_seloption(member_Id){

}
function hide_roles_seloption(member_Id){

}
function load_form_addMembers(){
 hzTabSelection('addMembersHzTab');
 autocomplete_load_members();
}
var size=0;
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
			 displayTemplate_membersContent(MEMBER_ID,profile_pic, name, minlocation, location, state, country);
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
function displayTemplate_membersContent(member_Id, profile_pic, name, minlocation, location, state, country){
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
	MEMBER_DISPLAYCONTENT+='<div id="roles_div_'+member_Id+'" class="mtop5p">';
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
function autocomplete_roles(){
var options = {
    url: function(phrase) { return TEMP_ROLE_INFO; },
	getValue: "roleName",
 list: { match: { enabled: true },maxNumberOfElements: 10,
           onSelectItemEvent: function() { 
		    
		   },
		   onHideListEvent: function() {  }
	},
    template: { type: "custom",
				method: function(value, item) {
				return item.roleName;
			    } } };

$("#roleName_"+MEMBER_ID).easyAutocomplete(options);
}
function addToArray_members(){
 document.getElementById("communityNewBranch_members_name").value="";
 console.log(MEMBER_DISPLAYCONTENT);
 var duplicateRecognizer=false;
 if(MEMBERS_LIST[MEMBER_ID]===undefined){
   MEMBERS_LIST[MEMBER_ID]={ "member_Id":MEMBER_ID };
   MEMBER_DISPLAYCONTENT+='<div id="div_communityNewBranch_selectedMembers'+(size+1)+'"></div>';
   document.getElementById("div_communityNewBranch_selectedMembers"+size).innerHTML=MEMBER_DISPLAYCONTENT;
   select_display_roles('roles_div_'+MEMBER_ID,MEMBER_ID);  // Setting Select Options
   size++;
 }
 console.log("MEMBERS_LIST: "+JSON.stringify(MEMBERS_LIST));
 /* if(MEMBER_ARRAY_ID.length>0){
 for(var index=0;index<MEMBER_ARRAY_ID.length;index++){
  if(MEMBER_ID===MEMBER_ARRAY_ID[index].member_Id) { duplicateRecognizer=true;break; }
 }
 }
 if(MEMBER_DISPLAYCONTENT!==undefined && !duplicateRecognizer){
   var size=MEMBER_ARRAY_ID.length;
   MEMBER_ARRAY_ID[size]={ member_Id:MEMBER_ID };
   
   autocomplete_load_memberRole(MEMBER_ID);
 } */


/*
    $("#roleName_"+MEMBER_ID).autocomplete({        
        source: function(request, response) {
		    console.log("autocomplete_load_memberRole: "+JSON.stringify(ROLE_INFO));
		    response(ROLE_INFO);
        },
		focus: function( event, ui ) {
        console.log("autocomplete_load_memberRole: "+ui.item);
        return false;
      },
        select: function( event, ui ) {
           //   $("#roleName_"+MEMBER_ID).val( ui.item.roleName); //ui.item is your object from the array
          return false;
        }
    });
 */
}
function deleteFromArray_member(id){

}
function finish_AddMembersToBranch(){
 console.log("MEMBER_ARRAY_ID: "+JSON.stringify(MEMBER_ARRAY_ID));
 console.log("MEMBER_ROLE_ARRAY: "+JSON.stringify(MEMBER_ROLE_ARRAY));
}

function addRoleToMemberOfBranch(member_Id){
 var role_Id = unionprof_mem_roles_Id();
 var roleName = document.getElementById("roleName_"+member_Id).value;
 MEMBERS_LIST[MEMBER_ID].role_Id = role_Id;
 MEMBERS_LIST[MEMBER_ID].roleName = roleName;
 console.log(MEMBERS_LIST);
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