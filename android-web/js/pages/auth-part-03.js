$(document).ready(function(){ 
  bgstyle();
  $(".lang_"+USR_LANG).css('display','block');
  loadDataByPhoneNumberAndCountryCode(); /* Loads PhoneNumber and CountryCode */
});

function loadDataByPhoneNumberAndCountryCode(){
 document.getElementById("reg_"+USR_LANG+"_userId").value=AUTH_USER_ID;
 document.getElementById("reg_"+USR_LANG+"_surname").value=AUTH_USER_SURNAME;
 document.getElementById("reg_"+USR_LANG+"_name").value=AUTH_USER_FULLNAME;
 document.getElementById("reg_"+USR_LANG+"_gender").value=AUTH_USER_GENDER;
 document.getElementById("reg_"+USR_LANG+"_dob").value=AUTH_USER_DOB;
 loadUserGeoLocation(AUTH_USER_COUNTRY, AUTH_USER_STATE, AUTH_USER_LOCATION, AUTH_USER_LOCALITY);
}

function loadUserGeoLocation(usr_country, usr_state, usr_location, usr_minlocation){
/* Load Country */ loadUserGeoLocation_Country(usr_country); 
/* Load State */ loadUserGeoLocation_State(usr_country,usr_state);
/* Load Location */ loadUserGeoLocation_Location(usr_country,usr_state,usr_location);
/* Load Minlocation */ loadUserGeoLocation_MinLocation(usr_country,usr_state,usr_location,usr_minlocation); 
}

function loadUserGeoLocation_Country(usr_country){
js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/countries.json',{},function(resp){ 
 var result=resp;
 var countryElement=document.getElementById("reg_"+USR_LANG+"_country");
 /* Delete previous Options */ for(var index=countryElement.length;index>0;index--) { countryElement.remove(index); } 
 for(var index=0;index<result.countries.length;index++) { /* Add States */
  var option = document.createElement("option");
      option.text = result.countries[index].countryName;
	  option.value = result.countries[index].countryValue;
    countryElement.add(option);
  }
  document.getElementById("reg_"+USR_LANG+"_country").value=usr_country;
});
}

function loadUserGeoLocation_State(usr_country,usr_state){
if(usr_country.length>0){
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
}

function loadUserGeoLocation_Location(usr_country,usr_state,usr_location){
if(usr_country.length>0 && usr_state.length>0){
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
}

function loadUserGeoLocation_MinLocation(usr_country,usr_state,usr_location,usr_minlocation){
if(usr_country.length>0 && usr_state.length>0 && usr_location.length>0){
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

