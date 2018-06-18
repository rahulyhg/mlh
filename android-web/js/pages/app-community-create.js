$(document).ready(function(){
 sideWrapperToggle();
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 mainMenuSelection("dn_"+USR_LANG+"_mycommunity");
 cloudservers_auth();
 build_categoryOption("add_"+USR_LANG+"_category");
 build_countryOption("add_"+USR_LANG+"_country");
 upload_picture_100X100('community-content-media',PROJECT_URL+'images/avatar/0.jpg');
});

function communityForm_mediaContent(){
IMG_URL='';
var content='';
	content+='<div align="center">';
	content+='<input type="file" id="communityForm_fileElem" accept="image/*" ';
	content+='onchange="handleFiles(this.id,\'communityForm_div_cropping\',\'communityForm-img-crop\'';
	content+=',this.files,\'communityForm_fileSelect\',\'communityForm_pic_done\',150,50,175,75,\'square\')">';
	content+='<img id="communityForm_fileSelect" class="communityForm-uploadpic" ';
	content+='src="'+PROJECT_URL+'images/textures/upload900x300.png" ';
	content+='onclick="javascript:imgClick(\'communityForm_fileElem\');"/>';
	content+='<div id="communityForm-img-crop" class="mtop15px"></div>';
	content+='<div id="communityForm_div_cropping" align="center"></div>';
	content+='<button id="communityForm_pic_done" align="center" class="col-md-12 btn custom-bg" ';
	content+=' style="background-color: rgb(11, 160, 218);color: rgb(255, 255, 255);font-weight: bold;';
	content+=' margin-top:15px;float:right!important;" ';
	content+='onclick="javascript:communityForm_mediaContent();">';
	content+='<b>Edit Picture</b></button>';
	content+='</div>';
	
 document.getElementById("community-content-media").innerHTML=content;
}


function communityForm_mediaContent(){
IMG_URL='';
var content='<b>Community Profile Picture</b>';
	content+='<div align="center">';
	content+='<input type="file" id="communityForm_fileElem" accept="image/*" ';
	content+='onchange="handleFiles(this.id,\'communityForm_div_cropping\',\'communityForm-img-crop\'';
	content+=',this.files,\'communityForm_fileSelect\',\'communityForm_pic_done\',150,50,175,75,\'square\')">';
	content+='<img id="communityForm_fileSelect" class="communityForm-uploadpic" ';
	content+='src="'+PROJECT_URL+'images/textures/upload900x300.png" ';
	content+='onclick="javascript:imgClick(\'communityForm_fileElem\');"/>';
	content+='<div id="communityForm-img-crop" class="mtop15px"></div>';
	content+='<div id="communityForm_div_cropping" align="center"></div>';
	content+='<button id="communityForm_pic_done" align="center" class="col-md-12 btn custom-bg" ';
	content+=' style="background-color: rgb(11, 160, 218);color: rgb(255, 255, 255);font-weight: bold;';
	content+=' margin-top:15px;float:right!important;" ';
	content+='onclick="javascript:communityForm_mediaContent();">';
	content+='<b>Edit Picture</b></button>';
	content+='</div>';
	
 document.getElementById("community-content-media").innerHTML=content;
}

function newsFeedForm_mediaContent(){
IMG_URL='';
var content='<b>NewsFeed Picture</b>';
	content+='<div align="center">';
	content+='<input type="file" id="writeNewsfeedForm_fileElem" accept="image/*" ';
	content+='onchange="handleFiles(this.id,\'writeNewsfeedForm_div_cropping\',\'writeNewsfeedForm-img-crop\'';
	content+=',this.files,\'writeNewsfeedForm_fileSelect\',\'writeNewsfeedForm_pic_done\',150,50,175,75,\'square\')">';
	content+='<img id="writeNewsfeedForm_fileSelect" class="writeNewsfeedForm-uploadpic" ';
	content+='src="'+PROJECT_URL+'images/textures/upload900x300.png" ';
	content+='onclick="javascript:imgClick(\'writeNewsfeedForm_fileElem\');"/>';
	content+='<div id="writeNewsfeedForm-img-crop" class="mtop15px"></div>';
	content+='<div id="writeNewsfeedForm_div_cropping" align="center"></div>';
	content+='<button id="writeNewsfeedForm_pic_done" align="center" class="col-md-12 btn custom-bg" ';
	content+=' style="background-color: rgb(11, 160, 218);color: rgb(255, 255, 255);font-weight: bold;';
	content+=' margin-top:15px;float:right!important;" ';
	content+='onclick="javascript:newsFeedForm_mediaContent();">';
	content+='<b>Edit Picture</b></button>';
	content+='</div>';
	
 document.getElementById("newsFeedForm-content-media").innerHTML=content;
}

function sel_offlang_eng(){
 var olang_eng=document.getElementById("regcom_"+USR_LANG+"_offlang_eng");
 if(olang_eng.checked) { olang_eng.checked=false; }
 else { olang_eng.checked=true; }
}

function sel_offlang_tel(){
 var olang_tel=document.getElementById("regcom_"+USR_LANG+"_offlang_tel");
 if(olang_tel.checked) { olang_tel.checked=false; }
 else { olang_tel.checked=true; }
}

function create_community(){
UNION_NAME=document.getElementById("regcom_"+USR_LANG+"_unionName").value;
UNION_ADMINDESIGNATION=document.getElementById("regcom_"+USR_LANG+"_unionDesignation").value;
UNION_PICTURE=IMG_URL;
UNION_INDUSTRY=document.getElementById("regcom_"+USR_LANG+"_industry").value;
UNION_SUBINDUSTRY=document.getElementById("regcom_"+USR_LANG+"_subindustry").value;
UNION_COUNTRY=document.getElementById("regcom_"+USR_LANG+"_country").value;
UNION_STATE=document.getElementById("regcom_"+USR_LANG+"_state").value;
UNION_LOCATION=document.getElementById("regcom_"+USR_LANG+"_location").value;
UNION_LOCALITY=document.getElementById("regcom_"+USR_LANG+"_locality").value;
UNION_LANG_ENG=document.getElementById("regcom_"+USR_LANG+"_offlang_eng").checked;
UNION_LANG_TEL=document.getElementById("regcom_"+USR_LANG+"_offlang_tel").checked;

if(UNION_NAME.length>0){
 if(UNION_ADMINDESIGNATION.length>0){
   if(UNION_PICTURE.length>0){
    if(UNION_INDUSTRY.length>0){
		if(UNION_SUBINDUSTRY.length>0){
			if(UNION_COUNTRY.length>0){
			  if(UNION_STATE.length>0){
			     if(UNION_LOCATION.length>0){
				   if(UNION_LOCALITY.length>0){ 
						FORM_LEVEL=2;
						createcommunity_form2();
					} else { 
					   createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionLocality");$("#communityModal").modal();
					}
				} else { 
					createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionLocation");$("#communityModal").modal();	
				 }
			   } else { 
			       createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionState");$("#communityModal").modal();	 
			   }
			 } else { 
				createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionCountry");$("#communityModal").modal();	 
		    }
		} else { 
			createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionSubCategory");$("#communityModal").modal();	 
		}
	 } else { 
		createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionCategory");$("#communityModal").modal();			 
	}
   } else { 
       createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingProfilePic");$("#communityModal").modal();
   }
  } else { 
	 createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingDesignation");$("#communityModal").modal();		 
  }
 } else {  
    createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingUnionName");$("#communityModal").modal();	 
 } 
}

function createcomAlert_display(id){
 var alertList=["createcomAlert_"+USR_LANG+"_MissingUnionName","createcomAlert_"+USR_LANG+"_MissingDesignation",
 "createcomAlert_"+USR_LANG+"_MissingProfilePic","createcomAlert_"+USR_LANG+"_MissingUnionCategory",
 "createcomAlert_"+USR_LANG+"_MissingUnionSubCategory","createcomAlert_"+USR_LANG+"_MissingUnionCountry",
 "createcomAlert_"+USR_LANG+"_MissingUnionState","createcomAlert_"+USR_LANG+"_MissingUnionLocation",
 "createcomAlert_"+USR_LANG+"_MissingUnionLocality", "createcomAlert_"+USR_LANG+"_MissingNewsFeedTitle",
  "createcomAlert_"+USR_LANG+"_MissingNewsFeedPicture", "createcomAlert_"+USR_LANG+"_MissingNewsFeedShrtSummary",
  "createcomAlert_"+USR_LANG+"_MissingNewsFeedDesc"];
 for(var index=0;index<alertList.length;index++){
	if(alertList[index]===id){
		if($('#'+alertList[index]).hasClass('hide-block')){ $('#'+alertList[index]).removeClass('hide-block'); }
	} else {
		if(!$('#'+alertList[index]).hasClass('hide-block')){ $('#'+alertList[index]).addClass('hide-block'); }
	}
 }
}

var arry_frndMemReqList=[];
var cur_inviteFrndMemCount=0;

function inviteFrndAsMember(){ //  focus:inviteFrndAsMember_updateTxtBox,
  $(".inviteFrndAsMember-item:hover").css('background-color',CURRENT_LIGHT_COLOR);
  $("#inviteFrndAsMember").autocomplete({ select:inviteFrndAsMember_updateTxtBox,
    source: function( request, response ) {
    $.ajax({url:PROJECT_URL+"backend/php/dac/controller.page.app.community.create.php",  
            dataType: "json",  
            data: { action:'INFO_INVITE_FRNDS', term: request.term, avoid:arry_frndMemReqList.toString(),
				user_Id: AUTH_USER_ID },  
            success: function( data ) { response(data); }  });  
    } }).data("ui-autocomplete")._renderItem = function(ul,item) {  // onclick=\"alert('"+item.user_Id+"');\"
         /*  console.log(item);	
	       var status=false; // ACCEPT=true / NOT_ACCEPT=false
	       for(var index=0;index<arry_frndMemReqList.length;index++){
		     if(arry_frndMemReqList[index]===item.user_Id){
			    status=true;
			 }
		   } 
		   if(!status){ */
             return $('<li class="inviteFrndAsMember-item"></li>')  
                   .data("item.autocomplete",item)  
                   .append("<a>").append("<img style='width:50px;height:50px;border-radius:50%;' src='"+item.profile_pic+"'/>")
			       .append("&nbsp;&nbsp;&nbsp;")
			       .append(item.surName).append(" ").append(item.name)
				   .append("</a>")  
                   .appendTo(ul);  
		//   }
       };  
}

function inviteFrndAsMember_updateTxtBox(event,ui){
 var user_Id=ui.item.user_Id;
 var username=ui.item.username;
 var surName=ui.item.surName;
 var name=ui.item.name;
 var mobile=ui.item.mobile;
 var profile_pic=ui.item.profile_pic;
 var minlocation=ui.item.minlocation;
 var location=ui.item.location;
 var state=ui.item.state;
 var country=ui.item.country;
 
 arry_frndMemReqList[arry_frndMemReqList.length]=user_Id;
 
 console.log("user_Id: "+user_Id);  // user_Id
 console.log("username: "+username); // username
 console.log("surName: "+surName); // surName
 console.log("name: "+name); // name
 console.log("mobile: "+mobile); // mobile
 console.log("profile_pic: "+profile_pic); // profile_pic
 console.log("minlocation: "+minlocation); // minlocation
 console.log("location: "+location); // location
 console.log("state: "+state); // state
 console.log("country: "+country); // country
 
 /* Add it to Inviting List */
 $(this).val("");
 
 /* Display in Members Layout */
 if(cur_inviteFrndMemCount==0){
	 var initialContent='<div class="list-group-item custom-bg white-font" style="background-color:'+CURRENT_DARK_COLOR+';">';
		 initialContent+='<b>You are inviting:</b>';
		 initialContent+='</div>';
		 initialContent+='<div id="inviteMemList0"></div>';
	 document.getElementById("inviteMemList").innerHTML=initialContent;	
	 
 }
 // inviteFrndMemCount
 /* First Value */
     var nxt_inviteFrndMemCount=cur_inviteFrndMemCount+1;
     var content='<div id="inviteMemList-'+user_Id+'" class="list-group-item">';
	     content+='<div class="container-fluid pad0">';
		 content+='<div class="col-xs-12">';
		 
		 content+='</div>';
		 content+='<div class="col-xs-4">';
		 content+='<img class="img-min-profilepic" src="'+profile_pic+'"/>';
		 content+='</div>';
		 content+='<div align="center" class="col-xs-8 frnshipreqdiv">';
		 content+='<i class="fa fa-times pull-right" aria-hidden="true" onclick="inviteFrndAsMember_remove(\''+user_Id+'\')"></i>';
		 content+='<h5><b>'+surName+' '+name+'</b></h5>';
		 content+='<span class="frnshipreqaddr">'+minlocation+', '+location+', '+state+', '+country+'</span>';
		 content+='</div>';
		 content+='</div>';     
		 content+='</div>';
         content+='<div id="inviteMemList'+nxt_inviteFrndMemCount+'"></div>';
     
	 document.getElementById("inviteMemList"+cur_inviteFrndMemCount).innerHTML=content;									     
	 document.getElementById("inviteMemListBtn").style.display='block';							   
	cur_inviteFrndMemCount++;								
											 
 return false;
}

function inviteFrndAsMember_remove(user_Id){
 for(var index=0;index<arry_frndMemReqList.length;index++){
   if(arry_frndMemReqList[index]===user_Id){
     arry_frndMemReqList.splice(index, 1); // At position of index, remove one item
   }
 }
 $("#inviteMemList-"+user_Id).hide(1000);
}

function inviteFrndAsMember_doneListing(){
  console.log(arry_frndMemReqList);
  UNION_MEMBERS=arry_frndMemReqList;
  FORM_LEVEL=3;
  createcommunity_form3();
}

function create_firstNewsFeed(){
UNION_FIRSTNEWS_TITLE=document.getElementById("firstNewsFeed_artTitle").value;
UNION_FIRSTNEWS_PICTURE=IMG_URL;     
UNION_FIRSTNEWS_SHORTSUMMARY=document.getElementById("firstNewsFeed_artShortSummary").value;
UNION_FIRSTNEWS_DESC=$('#firstNewsFeed_articleDesc').summernote('code');

if(UNION_FIRSTNEWS_TITLE.length>0){
  if(UNION_FIRSTNEWS_PICTURE.length>0){
    if(UNION_FIRSTNEWS_SHORTSUMMARY.length>0){
		if(UNION_FIRSTNEWS_SHORTSUMMARY.length>0){
			FORM_LEVEL=4;
			createcommunity_form4();
		} else { createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingNewsFeedDesc"); }
	} else { createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingNewsFeedShrtSummary"); }
  } else { createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingNewsFeedPicture"); }
} else {  createcomAlert_display("createcomAlert_"+USR_LANG+"_MissingNewsFeedTitle"); }

}

function community_creation_finish(){
var unionlangEng='N'; if(UNION_LANG_ENG) { unionlangEng='Y'; }
var unionlangTel='N'; if(UNION_LANG_TEL) { unionlangTel='Y'; }
console.log("unionName: "+UNION_NAME);
console.log("user_Id: "+AUTH_USER_ID);
console.log("designation: "+UNION_ADMINDESIGNATION);
console.log("unionPic: "+UNION_PICTURE);
console.log("category: "+UNION_INDUSTRY);
console.log("subcategory: "+UNION_SUBINDUSTRY);
console.log("unionCountry: "+UNION_COUNTRY);
console.log("unionState: "+UNION_STATE);
console.log("unionLocation: "+UNION_LOCATION);
console.log("unionLocality: "+UNION_LOCALITY);
console.log("unionlangEng: "+unionlangEng);
console.log("unionlangTel: "+unionlangTel);
console.log("unionMem: "+UNION_MEMBERS);
console.log("newsTitle: "+UNION_FIRSTNEWS_TITLE);
console.log("newsPic: "+UNION_FIRSTNEWS_PICTURE);
console.log("newsShortTitle: "+UNION_FIRSTNEWS_SHORTSUMMARY);
console.log("newsDesc: "+UNION_FIRSTNEWS_DESC);

 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.create.php',
 { action: 'COMMUNITY_CREATE_INITIAL', unionName: UNION_NAME, user_Id: AUTH_USER_ID, designation: UNION_ADMINDESIGNATION, 
 unionPic: UNION_PICTURE, category: UNION_INDUSTRY, subcategory: UNION_SUBINDUSTRY, unionCountry: UNION_COUNTRY, 
 unionState: UNION_STATE, unionLocation: UNION_LOCATION, unionLocality: UNION_LOCALITY, unionlangEng: unionlangEng,
 unionlangTel: unionlangTel, unionMem: UNION_MEMBERS.toString(), newsTitle: UNION_FIRSTNEWS_TITLE, 
 newsPic: UNION_FIRSTNEWS_PICTURE, newsShortTitle: UNION_FIRSTNEWS_SHORTSUMMARY, newsDesc: UNION_FIRSTNEWS_DESC },
 function(response){
	console.log(response);
 });

}