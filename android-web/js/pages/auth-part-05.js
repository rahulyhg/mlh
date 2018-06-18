var AVATAR_URL;
var IMG_URL;

$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 sel_tmpl('tmpl_button');
 cloudservers_auth(); // Get CloudName from Cloudinary
 upload_picture_100X100('userprofilepic-media-content',PROJECT_URL+'images/avatar/0.jpg');
});
function sel_tmpl(id){
var arry=["tmpl_button","tmpl_avatar","tmpl_profilepic"];
for(var index=0;index<arry.length;index++){
  if(id===arry[index]){
    if($('#'+arry[index]).hasClass('hide-block')){ $('#'+arry[index]).removeClass('hide-block'); }
  } else {
    if(!$('#'+arry[index]).hasClass('hide-block')){ $('#'+arry[index]).addClass('hide-block'); }
  }
}
}

function authpart03_Completed(){
 var init_session_data='{"session_set":[{ "key":"AUTH_PART_03" , "value" : "COMPLETED" }],"session_get":[""]}';
 js_session(init_session_data,function(response){
     toggleMLHLoader('body');
	 window.location.href=PROJECT_URL+'subscribe/categories'; 
 });
}

function reg_data_store(profile_pic){
if(AUTH_USER_ID==='0'){ /* New User Account */
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
     { action:'ADD_NEW_USERACCOUNT', username: AUTH_USER_USERNAME, surName:AUTH_USER_SURNAME, name: AUTH_USER_FULLNAME,
       mcountrycode: AUTH_USER_COUNTRYCODE, mobile:AUTH_USER_PHONENUMBER, dob: AUTH_USER_DOB, gender: AUTH_USER_GENDER,
       profile_pic: profile_pic, minlocation: AUTH_USER_LOCALITY, location: AUTH_USER_LOCATION, 
	   state: AUTH_USER_STATE, country: AUTH_USER_COUNTRY, user_tz: AUTH_USER_TIMEZONE },
	   function(resp){  console.log(resp);window.location.href=PROJECT_URL+"subscribe/categories";  });
}
else {  /* Update Existing Account */
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
     { action:'UPDATE_EXISTING_USERACCOUNT', user_Id: AUTH_USER_ID, username: AUTH_USER_USERNAME, 
       surName: AUTH_USER_SURNAME, name: AUTH_USER_FULLNAME, mcountrycode: AUTH_USER_COUNTRYCODE,
	   mobile:AUTH_USER_PHONENUMBER, mob_val:'Y',  dob: AUTH_USER_DOB, gender: AUTH_USER_GENDER, 
	   profile_pic: profile_pic, about_me:'', minlocation: AUTH_USER_LOCALITY, location: AUTH_USER_LOCATION, 
	   state: AUTH_USER_STATE, country: AUTH_USER_COUNTRY, isAdmin:'N', user_tz: AUTH_USER_TIMEZONE, 
	   acc_active:'Y' },function(resp){  console.log(resp);window.location.href=PROJECT_URL+"subscribe/categories";  });
   }
}

/****************************************************************************************************************************/
/*********************************************** AVATAR *********************************************************************/
/****************************************************************************************************************************/
function avatarSelectImg(imgId){
 var arry_avatar=["1","2","3","4","5","6","7","8","9","10","11","12"];
 for(var index=0;index<arry_avatar.length;index++){
   if(arry_avatar[index]===imgId) {
	 if($('#avatar-select-'+arry_avatar[index]).hasClass("hide-block")){
		$('#avatar-select-'+arry_avatar[index]).removeClass("hide-block");
	 } 
	 AVATAR_URL=PROJECT_URL+"images/avatar/"+arry_avatar[index]+".jpg";
     console.log("img: "+AVATAR_URL);
   } 
   else {
	if(!$('#avatar-select-'+arry_avatar[index]).hasClass("hide-block")){
		$('#avatar-select-'+arry_avatar[index]).addClass("hide-block");
	 }
   }
 }
 if(AVATAR_URL!==undefined){ 
   document.getElementById("avatar_done").style.display='block'; 
 } 
 else { document.getElementById("avatar_done").style.display='none'; }
}

function reg_avatar_img(){
 var init_session_data='{"session_set":[{"key":"AUTH_USER_PROFILEPIC","value":"'+AVATAR_URL+'"}],';
       init_session_data+='"session_get":["AUTH_USER_PROFILEPIC"]}';
   js_session(init_session_data,function(response){
        response=JSON.parse(response);
		console.log("AUTH_USER_PROFILEPIC: "+response.AUTH_USER_PROFILEPIC);
		reg_data_store(response.AUTH_USER_PROFILEPIC);
	});
}
/*****************************************************************************************************************************/
/************************************************* PICTURE *******************************************************************/
/*****************************************************************************************************************************/
function reg_profile_img(){
 if(IMG_URL!==undefined){
   var init_session_data='{"session_set":[{"key":"AUTH_USER_PROFILEPIC","value":"'+IMG_URL+'"}],';
       init_session_data+='"session_get":["AUTH_USER_PROFILEPIC"]}';
   js_session(init_session_data,function(response){
	   response=JSON.parse(response);
       reg_data_store(response.AUTH_USER_PROFILEPIC);
	   if(!$("#alert_"+USR_LANG+"_profilepic").hasClass("hide-block")){ 
		   $("#alert_"+USR_LANG+"_profilepic").addClass("hide-block");
		}
	   if(!$("#alert_"+USR_LANG+"_missingprofilepic").hasClass("hide-block")){
		   $("#alert_"+USR_LANG+"_missingprofilepic").addClass("hide-block");
		}
   });
 } else {
    if($("#alert_"+USR_LANG+"_profilepic").hasClass("hide-block")){
	   $("#alert_"+USR_LANG+"_profilepic").removeClass("hide-block");
	}
	if($("#alert_"+USR_LANG+"_missingprofilepic").hasClass("hide-block")){
	   $("#alert_"+USR_LANG+"_missingprofilepic").removeClass("hide-block");
	}
 }
}