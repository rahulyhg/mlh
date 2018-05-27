$(document).ready(function(){
sideWrapperToggle();
bgstyle();
mainMenuSelection("dn_"+USR_LANG+"_mycommunity");
$(".lang_"+USR_LANG).css('display','block');
build_categories(); // Browse Community
build_countryOption(); // Browse Community
});

/* ==========================================================================================================================
 *  COMMUNITY MEMBER REQUEST JS
 * ==========================================================================================================================
 */
function get_community_myMemberRequests(){


}
/* ==========================================================================================================================
 * BROWSE COMMUNITY JS
 * ==========================================================================================================================
 */
function build_categories(){
js_ajax("GET",PROJECT_URL+'/backend/config/'+USR_LANG+'/domains/domain_list.json',{},
function(response){
 var categoryElement=document.getElementById("search_"+USR_LANG+"_ByCategory");
 for(var index=0;index<response.domains.length;index++) {
   var option = document.createElement("option");
       option.text = response.domains[index].domainName;
	   option.value = response.domains[index].domain_Id;
   categoryElement.add(option);
 }
});
}

function build_subCategories(){
 $("#search_"+USR_LANG+"_BySubCategoryDiv").removeClass('hide-block');
 var category=document.getElementById("search_"+USR_LANG+"_ByCategory").value;
 js_ajax("GET",PROJECT_URL+'/backend/config/'+USR_LANG+'/domains/'+category+'/subdomain_list.json',{},
 function(response){
	var subCategoryElement=document.getElementById("search_"+USR_LANG+"_BySubCategory");
	for(var index=0;index<response.subdomains.length;index++) {
      var option = document.createElement("option");
          option.text = response.subdomains[index].subdomainName;
	      option.value = response.subdomains[index].subdomain_Id;
       subCategoryElement.add(option);
    }
 });
}

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

var BROWSECOMMUNITY_CATEGORY, BROWSECOMMUNITY_SUBCATEGORY, BROWSECOMMUNITY_COUNTRY, 
BROWSECOMMUNITY_STATE, BROWSECOMMUNITY_LOCATION, BROWSECOMMUNITY_LOCALITY;
function searchCommunity(){
 BROWSECOMMUNITY_CATEGORY=document.getElementById("search_"+USR_LANG+"_ByCategory").value;
 BROWSECOMMUNITY_SUBCATEGORY=document.getElementById("search_"+USR_LANG+"_BySubCategory").value;
 BROWSECOMMUNITY_COUNTRY=document.getElementById("search_"+USR_LANG+"_ByCountry").value;
 BROWSECOMMUNITY_STATE=document.getElementById("search_"+USR_LANG+"_ByState").value;
 BROWSECOMMUNITY_LOCATION=document.getElementById("search_"+USR_LANG+"_ByLocation").value;
 BROWSECOMMUNITY_LOCALITY=document.getElementById("search_"+USR_LANG+"_ByLocality").value;
 
 /* Loading Symbol */
 var content='<div align="center" class="list-group-item pad0">';
	 content+='<img src="images/load.gif" style="width:150px;height:150px;"/>';
	 content+='</div>';
 document.getElementById("browseCommunityData0").innerHTML=content;
 
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
 { action:'BROWSE_COMMUNITIES_COUNT', browse_category:BROWSECOMMUNITY_CATEGORY, browse_subCategory:BROWSECOMMUNITY_SUBCATEGORY, 
   browse_country:BROWSECOMMUNITY_COUNTRY, browse_state:BROWSECOMMUNITY_STATE, browse_location:BROWSECOMMUNITY_LOCATION, 
   browse_minlocation:BROWSECOMMUNITY_LOCALITY },function(total_data){
    if(total_data=='0'){
	  var noContent='<div align="center" class="list-group-item">';
		  noContent+='<span style="font-size:12px;color:#6b6a6a;">Your Search has <b>0</b> results</span>';
		  noContent+='</div>';
	  document.getElementById("browseCommunityData0").innerHTML=noContent;
	} else {
	  scroll_loadInitializer('browseCommunityData',10,loadsearchCommunityData,total_data);
	}
   });
}

function loadsearchCommunityData(div_view, appendContent,limit_start,limit_end){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.community.my.php',
 { action:'BROWSE_COMMUNITIES', projectURL:PROJECT_URL, lang: USR_LANG, browse_category:BROWSECOMMUNITY_CATEGORY, 
   browse_subCategory:BROWSECOMMUNITY_SUBCATEGORY, browse_country:BROWSECOMMUNITY_COUNTRY, 
   browse_state:BROWSECOMMUNITY_STATE, browse_location:BROWSECOMMUNITY_LOCATION, 
   browse_minlocation:BROWSECOMMUNITY_LOCALITY, limit_start:limit_start, limit_end:limit_end },function(response){ 
   console.log("BROWSE_COMMUNITIES: "+response);  
   response=JSON.parse(response);
   var content='';
   for(index=0;index<response.length;index++) {
     var param_unionName=response[index].unionName;
	 var param_domainName=response[index].domainName;
	 var param_subdomainName=response[index].subdomainName;
	 var param_profilepic=response[index].profile_pic;
	 var param_createdOn=response[index].created_On;
	 var param_minlocation=response[index].minlocation;
	 var param_location=response[index].location;
	 var param_state=response[index].state;
	 var param_country=response[index].country;
	 var param_membersCount=response[index].memberCount;
	 var param_supportersCount=response[index].supportersCount;
	 content+=uiTemplate_communityDisplay(param_unionName,param_domainName,param_subdomainName,param_profilepic,param_createdOn,
           param_minlocation, param_location, param_state, param_country, param_membersCount, param_supportersCount);
   }
  content+=appendContent;
  document.getElementById(div_view).innerHTML=content;
 });
}