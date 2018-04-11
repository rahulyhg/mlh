$(document).ready(function(){ 
  bgstyle();
  $(".lang_"+USR_LANG).css('display','block');
  view_usernameCheckAvailabilityDivision(); /* Displays usernameCheckAvailabilityDivision */ 
  loadDataByPhoneNumberAndCountryCode(); /* Loads PhoneNumber and CountryCode */
});

function view_authFormRegisterDivision(){
   document.getElementById("authFormRegisterDivision").style.display='block';
   document.getElementById("usernameCheckAvailabilityDivision").style.display='none';
}

function view_usernameCheckAvailabilityDivision(){
   document.getElementById("authFormRegisterDivision").style.display='none';
   document.getElementById("usernameCheckAvailabilityDivision").style.display='block';
}

function loadDataByPhoneNumberAndCountryCode(){
/* Check PhoneNumber exists in Database 
 * IF EXISTS, collect surName, fullName, country, state, location, minlocation
 * ELSE, Empty Form
 */
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part02.php',
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
	  document.getElementById("reg_"+USR_LANG+"_surname").value=surName;
	  document.getElementById("reg_"+USR_LANG+"_name").value=name;
	  document.getElementById("reg_"+USR_LANG+"_dob").value=dob;
	  document.getElementById("reg_"+USR_LANG+"_gender").value=gender;
	  document.getElementById("reg_"+USR_LANG+"_userTz").value=user_tz;
	  
	  loadUserGeoLocation(country, state, location, minlocation);
	  
	  /* Setting in Session */                 
	  var sessionJSON='{"session_set":[{"key":"AUTH_USER_ID","value":"'+user_Id+'"},';
	      sessionJSON+='{"key":"AUTH_USER_USERNAME","value":"'+username+'"},';
	      sessionJSON+='{"key":"AUTH_USER_SURNAME","value":"'+surName+'"},';
		  sessionJSON+='{"key":"AUTH_USER_FULLNAME","value":"'+name+'"},';
		  sessionJSON+='{"key":"AUTH_USER_COUNTRYCODE","value":"'+mcountrycode+'"},';
		  sessionJSON+='{"key":"AUTH_USER_PHONENUMBER","value":"'+mobile+'"},';
		  sessionJSON+='{"key":"AUTH_USER_GENDER","value":"'+gender+'"},';
		  sessionJSON+='{"key":"AUTH_USER_DOB","value":"'+dob+'"},';
		  sessionJSON+='{"key":"AUTH_USER_COUNTRY","value":"'+country+'"},';
		  sessionJSON+='{"key":"AUTH_USER_STATE","value":"'+state+'"},';
		  sessionJSON+='{"key":"AUTH_USER_LOCATION","value":"'+location+'"},';
		  sessionJSON+='{"key":"AUTH_USER_LOCALITY","value":"'+minlocation+'"},';
		  sessionJSON+='{"key":"AUTH_USER_PROFILEPIC","value":"'+profile_pic+'"},';
		  sessionJSON+='{"key":"AUTH_USER_TIMEZONE","value":"'+user_tz+'"}],';
		  sessionJSON+='"session_get" : [ ';
		  sessionJSON+='"AUTH_USER_ID", "AUTH_USER_USERNAME", "AUTH_USER_SURNAME", ';
		  sessionJSON+='"AUTH_USER_FULLNAME", "AUTH_USER_COUNTRYCODE", "AUTH_USER_PHONENUMBER", ';
		  sessionJSON+='"AUTH_USER_GENDER", "AUTH_USER_COUNTRY", "AUTH_USER_STATE", ';
		  sessionJSON+='"AUTH_USER_LOCATION", "AUTH_USER_LOCALITY", "AUTH_USER_PROFILEPIC", "AUTH_USER_TIMEZONE" ';
		  sessionJSON+=']}';
	  js_session(sessionJSON,function(response){ });
	 }
      else {   loadUserGeoLocation_Country(); }
	});
 
}

function checkUserAvailability(){
// alert();
  var user_Id=document.getElementById("reg_"+USR_LANG+"_userId").value;
  var username=document.getElementById("reg_"+USR_LANG+"_username").value;
   js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.auth.part02.php',
   { action:'CHECK_USERNAME_AVAILABILITY',user_Id:user_Id, username:username },function(response){ 
  // alert(user_Id+" "+username+" "+response);
      if(response=='USERNAME_NOT_EXISTS') {   /* keep in Session and Move Forward  */
	     view_authFormRegisterDivision(); /* Division Views */
	  } else {
	    document.getElementById("alert_userCheckAvailability").style.display='block';
		if($('#'+USR_LANG+'_usernameAlreadyExists').hasClass('hide-block')){
		  $('#'+USR_LANG+'_usernameAlreadyExists').removeClass('hide-block');
		}
	 }
   });
}

function loadUserGeoLocation_Country(usr_country){
js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/countries.json',{},function(resp){ 
 var result=resp;
 var countryElement=document.getElementById("reg_"+USR_LANG+"_country");
 /* Delete previous Options */
 for(var index=countryElement.length;index>0;index--) { countryElement.remove(index); }
 /* Add States */
 for(var index=0;index<result.countries.length;index++) {
  var option = document.createElement("option");
      option.text = result.countries[index].countryName;
	  option.value = result.countries[index].countryValue;
    countryElement.add(option);
  }
  document.getElementById("reg_"+USR_LANG+"_country").value=usr_country;
});
}

function loadUserGeoLocation_State(usr_country,usr_state){
js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+usr_country+'/viewAllStates.json',{},function(resp){  
var result=resp;
var stateElement=document.getElementById("reg_"+USR_LANG+"_state");
/* Delete previous Options */
for(var index=stateElement.length;index>0;index--) { stateElement.remove(index); }
/* Add States */
for(var index=0;index<result.states.length;index++) {
 var option = document.createElement("option");
     option.text = result.states[index].stateName;
	 option.value = result.states[index].stateValue;
     stateElement.add(option);
}
  document.getElementById("reg_"+USR_LANG+"_state").value=usr_state;
});	
}

function loadUserGeoLocation_Location(usr_country,usr_state,usr_location){
js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+usr_country+'/'+usr_state+'/viewAllLocations.json',{},
function(resp){  var result=resp;
var locationElement=document.getElementById("reg_"+USR_LANG+"_location");
/* Delete previous Options */
for(var index=locationElement.length;index>0;index--) { locationElement.remove(index); }
/* Add Locations related to State Selected */
for(var index=0;index<result.location.length;index++) {
 var option = document.createElement("option");
     option.text = result.location[index].locationName;
	 option.value = result.location[index].locationValue;
 locationElement.add(option);
}
 document.getElementById("reg_"+USR_LANG+"_location").value=usr_location;
});
}

function loadUserGeoLocation_MinLocation(usr_country,usr_state,usr_location,usr_minlocation){
js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+usr_country+'/'+usr_state+'/'+usr_location+'/ViewAllMinLocations.json',{},
function(resp){  var result=resp;
 var localityElement=document.getElementById("reg_"+USR_LANG+"_locality");
 /* Delete previous Options */
 for(var index=localityElement.length;index>0;index--) { localityElement.remove(index); }
 /* Adding Locality related to Location Selected*/
 for(var index=0;index<result.minLocations.length;index++) {
  var option = document.createElement("option");
      option.text = result.minLocations[index].minlocationName;
	  option.value = result.minLocations[index].minlocationValue;
  localityElement.add(option);
 }
document.getElementById("reg_"+USR_LANG+"_locality").value=usr_minlocation;
});
}

function loadUserGeoLocation(usr_country, usr_state, usr_location, usr_minlocation){
/* Load Country */
  loadUserGeoLocation_Country(usr_country);
  
/* Load State */
  loadUserGeoLocation_State(usr_country,usr_state);
  
/* Load Location */
  loadUserGeoLocation_Location(usr_country,usr_state,usr_location);
  
/* Load Minlocation */
  loadUserGeoLocation_MinLocation(usr_country,usr_state,usr_location,usr_minlocation);
   
}

function userselected_country(){ /* Loads States */
 var usr_country=document.getElementById("reg_"+USR_LANG+"_country").value;
 var usr_state="";
 loadUserGeoLocation_State(usr_country,usr_state);
}

function userselected_state(){ /* Loads Location */
  var usr_country=document.getElementById("reg_"+USR_LANG+"_country").value;
  var usr_state=document.getElementById("reg_"+USR_LANG+"_state").value;
  var usr_location="";
  loadUserGeoLocation_Location(usr_country,usr_state,usr_location);
}

function userselected_location(){  /* Loads Minlocation */
  var usr_country=document.getElementById("reg_"+USR_LANG+"_country").value;
  var usr_state=document.getElementById("reg_"+USR_LANG+"_state").value;
  var usr_location=document.getElementById("reg_"+USR_LANG+"_location").value; 
  var usr_minlocation=""; 
  loadUserGeoLocation_MinLocation(usr_country,usr_state,usr_location,usr_minlocation);
}

