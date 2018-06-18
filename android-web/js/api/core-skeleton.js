function upload_picture_100X100(div_Id,img_src){ /* Profile pic - 100px X 100px */
IMG_URL='';
var content='<div align="center">';
    content+='<input type="file" id="p100X100_fileElem" accept="image/*" ';
	content+='onchange="handleFiles(this.id,\'p100X100_div_cropping\',\'p100X100-img-crop\'';
	content+=',this.files,\'p100X100_fileSelect\',\'p100X100_pic_done\',90,90,100,100,\'circle\')">';
	content+='<img id="p100X100_fileSelect" class="profile_pic_img1 mtop15p mbot15p" ';
	content+='src="'+img_src+'" ';
	content+='onclick="javascript:imgClick(\'p100X100_fileElem\');"/>';
	content+='<div id="p100X100-img-crop" class="mtop15px"></div>';
	content+='<div id="p100X100_div_cropping" align="center"></div>';
	content+='<button id="p100X100_pic_done" align="center" class="col-md-12 btn btn-default custom-font" ';
	content+=' style="background-color:#fff;color:'+CURRENT_DARK_COLOR+';font-weight: bold;';
	content+=' margin-top:15px;" ';
	content+='onclick="javascript:upload_picture_100X100(\''+div_Id+'\',\''+img_src+'\');">';
	content+='<b>Edit Picture</b></button>';
	content+='</div>';
 document.getElementById(div_Id).innerHTML=content;
}

function build_categoryOption(category_Id){
var industryElement=document.getElementById(category_Id);
// Delete previous Options 
 for(var index=industryElement.length;index>0;index--) { industryElement.remove(index); }
 var subscriptionList=JSON.parse(AUTH_USER_SUBSCRIPTIONS_LIST);
 // Add Industries
 for(var index=0;index<subscriptionList.domains.length;index++) {
  var option = document.createElement("option");
	 option.text = subscriptionList.domains[index].domainName;
	 option.value = subscriptionList.domains[index].domain_Id;
  industryElement.add(option);
 }
}

function build_subcategoryOption(category_Id,subCategory_Id){
 var industryValue=document.getElementById(category_Id).value;
 if(industryValue.length>0){
 var subscriptionList=JSON.parse(AUTH_USER_SUBSCRIPTIONS_LIST);
 var subIndustryElement=document.getElementById(subCategory_Id);
 // Delete previous Options 
 for(var index=subIndustryElement.length;index>0;index--) { subIndustryElement.remove(index); }
 // Add sub-Industries
 for(var i1=0;i1<subscriptionList.domains.length;i1++) {
   for(var i2=0;i2<subscriptionList.domains[i1].subdomains.length;i2++) {
    if(subscriptionList.domains[i1].domain_Id==industryValue){
	  var option = document.createElement("option");
	      option.text = subscriptionList.domains[i1].subdomains[i2].subdomainName;
	      option.value = subscriptionList.domains[i1].subdomains[i2].subdomain_Id;
      subIndustryElement.add(option);
	}
   }
  }
 }
}

function build_countryOption(country_Id){
 js_ajax("GET",PROJECT_URL+'/backend/config/'+USR_LANG+'/countries/countries.json',{},
 function(response){ 
   var countryElement=document.getElementById(country_Id);
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

function build_stateOption(country_Id,state_Id){ /* Build's Dynamic State Options */
 var country=document.getElementById(country_Id).value;
 js_ajax("GET",PROJECT_URL+'/backend/config/'+USR_LANG+'/countries/'+country+'/viewAllStates.json',{},
 function(response){ 
  var stateElement=document.getElementById(state_Id);
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

function build_locationOption(country_Id,state_Id,location_Id) { /* Build's Dynamic Location Options */ 
 var country=document.getElementById(country_Id).value;
 var state=document.getElementById(state_Id).value;
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+country+'/'+state+'/viewAllLocations.json',
 {},function(response){ 
  var locationElement=document.getElementById(location_Id);
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

function build_minlocationOption(country_Id,state_Id,location_Id,locality_Id){ /* Build's Dynamic Locality Options */	 
 var country=document.getElementById(country_Id).value;
 var state=document.getElementById(state_Id).value;
 var location=document.getElementById(location_Id).value;
 js_ajax("GET",PROJECT_URL+'backend/config/'+USR_LANG+'/countries/'+country+'/'+state+'/'+location+'/ViewAllMinLocations.json',
 {},function(response){ 
	var localityElement=document.getElementById(locality_Id);
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