var AUTH_PROFILEPIC;
$(document).ready(function(){ 
  bgstyle();
  $(".lang_"+USR_LANG).css('display','block');
  loadDataByPhoneNumberAndCountryCode();
});


function loadDataByPhoneNumberAndCountryCode(){
/* Check PhoneNumber exists in Database 
 * IF EXISTS, collect surName, fullName, country, state, location, minlocation
 * ELSE, Empty Form
 */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
{action:'USERINFO_BY_PHONENUMBER',countrycode:AUTH_USER_COUNTRYCODE, phoneNumber:AUTH_USER_PHONENUMBER},function(response){
response=JSON.parse(response);
if(response.length>0){
  var user_Id=response[0].user_Id;
  var username=response[0].username;  
  var surName=response[0].surName;
  var name=response[0].name;
  var profile_pic=response[0].profile_pic;
  var dob=response[0].dob;
  var gender=response[0].gender;
  var mcountrycode=response[0].mcountrycode;
  var mobile=response[0].mobile;
  var country=response[0].country;
  var state=response[0].state;
  var location=response[0].location;
  var minlocation=response[0].minlocation;
  var user_tz=response[0].user_tz;
  document.getElementById("reg_"+USR_LANG+"_userId").value=user_Id;
  document.getElementById("reg_"+USR_LANG+"_username").value=username;
  var sessionJSON='{"session_set":[';
      sessionJSON+='{"key":"AUTH_USER_ID","value":"'+user_Id+'"},';
      sessionJSON+='{"key":"AUTH_USER_USERNAME","value":"'+username+'"},';
	  sessionJSON+='{"key":"AUTH_USER_TIMEZONE","value":"'+user_tz+'"},';
	  sessionJSON+='{"key":"AUTH_USER_SURNAME","value":"'+surName+'"},';
	  sessionJSON+='{"key":"AUTH_USER_FULLNAME","value":"'+name+'"},';
	  sessionJSON+='{"key":"AUTH_USER_GENDER","value":"'+gender+'"},';
	  sessionJSON+='{"key":"AUTH_USER_DOB","value":"'+dob+'"},';
	  sessionJSON+='{"key":"AUTH_USER_PROFILEPIC","value":"'+profile_pic+'"},';
	  sessionJSON+='{"key":"AUTH_USER_COUNTRY","value":"'+country+'"},';
	  sessionJSON+='{"key":"AUTH_USER_STATE","value":"'+state+'"},';
	  sessionJSON+='{"key":"AUTH_USER_LOCATION","value":"'+location+'"},';
	  sessionJSON+='{"key":"AUTH_USER_LOCALITY","value":"'+minlocation+'"}';
	  sessionJSON+='],';
	  sessionJSON+='"session_get":["AUTH_USER_ID","AUTH_USER_USERNAME",';
	  sessionJSON+='"AUTH_USER_TIMEZONE","AUTH_USER_SURNAME","AUTH_USER_FULLNAME","AUTH_USER_GENDER","AUTH_USER_DOB",';
	  sessionJSON+='"AUTH_USER_COUNTRY","AUTH_USER_STATE","AUTH_USER_LOCATION","AUTH_USER_LOCALITY",';
	  sessionJSON+='"AUTH_USER_COUNTRYCODE","AUTH_USER_PHONENUMBER" ]}';
     js_session(sessionJSON,function(response){ });
 }
});
}

function checkUserAvailability(){
  var user_Id=document.getElementById("reg_"+USR_LANG+"_userId").value;
  var username=document.getElementById("reg_"+USR_LANG+"_username").value;
  if(username.length>0){
   js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.module.app.user.authentication.php',
   { action:'CHECK_USERNAME_AVAILABILITY',user_Id:user_Id, username:username },function(response){ 
      if(response=='USERNAME_NOT_EXISTS') {   /* keep in Session and Move Forward  */
		display_availabilityMsg();
		document.getElementById("username_"+USR_LANG+"_setupDisplay").innerHTML=username;
	  }
   });
  } else { /* Alert Missing Username */ $('#auth02FormModal').modal(); }
}

function display_availabilityMsg(){
 document.getElementById("reg_"+USR_LANG+"_username").disabled=true;
 if(!$('#div_auth_checkAvailability').hasClass('hide-block')) { $('#div_auth_checkAvailability').addClass('hide-block'); }
 if($('#div_auth_availabilityMsg').hasClass('hide-block')) { $('#div_auth_availabilityMsg').removeClass('hide-block'); }
 if($('#div_auth_redirection').hasClass('hide-block')) { $('#div_auth_redirection').removeClass('hide-block'); }
}

function hide_availabilityMsg(){
 document.getElementById("reg_"+USR_LANG+"_username").disabled=false;
 if($('#div_auth_checkAvailability').hasClass('hide-block')) { $('#div_auth_checkAvailability').removeClass('hide-block'); }
 if(!$('#div_auth_availabilityMsg').hasClass('hide-block')) { $('#div_auth_availabilityMsg').addClass('hide-block'); }
 if(!$('#div_auth_redirection').hasClass('hide-block')) { $('#div_auth_redirection').addClass('hide-block'); }
}

function auth_forward(){
 var username=document.getElementById("reg_"+USR_LANG+"_username").value;
 var sessionJSON='{"session_set":[{"key":"AUTH_USER_USERNAME","value":"'+username+'"}],';
	 sessionJSON+='"session_get":[]}';
  js_session(sessionJSON,function(response){ window.location.href=PROJECT_URL+'initializer/register'; });
}