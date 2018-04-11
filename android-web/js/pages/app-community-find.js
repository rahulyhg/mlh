$(document).ready(function(){
 sideWrapperToggle();
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 mainMenuSelection("dn_"+USR_LANG+"_findcommunity");
 build_countryOption();
});


function build_countryOption(){
js_ajax("GET",PROJECT_URL+'/backend/config/'+USR_LANG+'/countries/countries.json',{},
function(response){ 
 var countryElement=document.getElementById("search_"+USR_LANG+"_ByCountry");
 // Delete previous Options 
 for(var index=countryElement.length;index>0;index--) { countryElement.remove(index); }
 // Add Countries
 for(var index=0;index<response.countries.length;index++) {
  var option = document.createElement("option");
	 option.text = response.countries[index].countryName;
	 option.value = response.countries[index].countryValue;
  countryElement.add(option);
 }
});
}


function build_stateOption(){ /* Build's Dynamic State Options */
 $("#search_"+USR_LANG+"_ByStateDiv").removeClass('hide-block');
 var country=document.getElementById("search_"+USR_LANG+"_ByCountry").value;
 js_ajax("GET",PROJECT_URL+'/backend/config/'+USR_LANG+'/countries/'+country+'/viewAllStates.json',{},
 function(response){ 
  var stateElement=document.getElementById("search_"+USR_LANG+"_ByState");
  /* Delete previous Options */
   for(var index=stateElement.length;index>0;index--) { stateElement.remove(index); }
  /* Add States */
  for(var index=0;index<response.states.length;index++) {
	var option = document.createElement("option");
		option.text = response.states[index].stateName;
		option.value = response.states[index].stateValue;
	stateElement.add(option);
  }
 });
}

function build_locationOption() { /* Build's Dynamic Location Options */ 
 $("#search_"+USR_LANG+"_ByLocationDiv").removeClass('hide-block');
 var country=document.getElementById("search_"+USR_LANG+"_ByCountry").value;
 var state=document.getElementById("search_"+USR_LANG+"_ByState").value;
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+country+'/'+state+'/viewAllLocations.json',
 {},function(response){ 
  var locationElement=document.getElementById("search_"+USR_LANG+"_ByLocation");
  /* Delete previous Options */
  for(var index=locationElement.length;index>0;index--) { locationElement.remove(index); }
  /* Add Locations related to State Selected */
  for(var index=0;index<response.location.length;index++) {
	  var option = document.createElement("option");
		  option.text = response.location[index].locationName;
		  option.value = response.location[index].locationValue;
	  locationElement.add(option);
   }
 });
}

function build_minlocationOption(){ /* Build's Dynamic Locality Options */ 
 $("#search_"+USR_LANG+"_ByLocalityDiv").removeClass('hide-block');
 var country=document.getElementById("search_"+USR_LANG+"_ByCountry").value;
 var state=document.getElementById("search_"+USR_LANG+"_ByState").value;
 var location=document.getElementById("search_"+USR_LANG+"_ByLocation").value;
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+country+'/'+state+'/'+location+'/ViewAllMinLocations.json',
 {},function(response){ 
	var localityElement=document.getElementById("search_"+USR_LANG+"_ByLocality");
	/* Delete previous Options */
	  for(var index=localityElement.length;index>0;index--) { localityElement.remove(index); }
	/* Adding Locality related to Location Selected*/
	  for(var index=0;index<response.minLocations.length;index++) {
		 var option = document.createElement("option");
			 option.text = response.minLocations[index].minlocationName;
			 option.value = response.minLocations[index].minlocationValue;
		 localityElement.add(option);
	  }
 });
}
