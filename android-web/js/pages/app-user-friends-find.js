$(document).ready(function(){
core_anchorScrolling();
sideWrapperToggle();
mainMenuSelection("dn_"+USR_LANG+"_findfriends");
bgstyle();
$(".lang_"+USR_LANG).css('display','block');
friendsRequestsToMeList(); /* Loading Friend Requests */
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

function searchPeopleByLocation(){
 /* Initial Search */
  var initial_content='<div class="list-group mtop10p mbot10p">';
      initial_content+='<div align="center" class="list-group-item">';
	  initial_content+='<img src="images/load.gif" style="width:150px;height:150px;"/>';
	  initial_content+='</div>';
	  initial_content+='</div>';
  document.getElementById("searchByLocation").innerHTML=initial_content;
  $('#div_friendsreqlist').collapse();
  
  var country=document.getElementById("search_"+USR_LANG+"_ByCountry").value;
  var state=document.getElementById("search_"+USR_LANG+"_ByState").value;
  var location=document.getElementById("search_"+USR_LANG+"_ByLocation").value; 
  var locality=document.getElementById("search_"+USR_LANG+"_ByLocality").value;
  
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
  { action: 'COUNT_SEARCH_PEOPLE_BYLOCATION',user_Id: AUTH_USER_ID, minlocation:locality, location:location,
	state:state, country:country },function(totalData){
   var content='<div class="panel panel-default">';
       content+='<div align="center" class="panel-heading custom-lgt-bg" style="background-color:'+CURRENT_LIGHT_COLOR+';">';
	   content+='<b>Your Search results in '+totalData+' people</b>';
	   content+='</div>';
	   content+='<div class="panel-body pad0">';
	   content+='<div class="list-group">';
	   content+='<div id="searchByLocation0">';
	   content+='<div align="center">';
	   content+='<img src="images/load.gif" style="width:150px;height:150px;"/>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
	document.getElementById("searchByLocation").innerHTML=content;
	scroll_loadInitializer('searchByLocation',10,searchPeopleByLocation_data,totalData);
  });
}

function searchPeopleByLocation_data(div_view,appendContent,limit_start,limit_end){
 console.log("Data display: "+limit_start+" "+limit_end);
  var country=document.getElementById("search_"+USR_LANG+"_ByCountry").value;
  var state=document.getElementById("search_"+USR_LANG+"_ByState").value;
  var location=document.getElementById("search_"+USR_LANG+"_ByLocation").value; 
  var locality=document.getElementById("search_"+USR_LANG+"_ByLocality").value;
  
  js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
  { action: 'SEARCH_PEOPLE_BYLOCATION',minlocation:locality, location:location, user_Id:AUTH_USER_ID,
  state:state, country:country,limit_start:limit_start,limit_end:limit_end },function(resp){ 
    console.log(resp);
    resp=JSON.parse(resp);
	var content='';
	if(resp.length>0) {
	   for(var index=0;index<resp.length;index++){
		 var param_userId=resp[index].user_Id;
		 var param_surName=resp[index].surName;
		 var param_name=resp[index].name;
		 var param_profilepic=resp[index].profile_pic;
		 var param_minlocation=resp[index].minlocation;
		 var param_location=resp[index].location;
		 var param_state=resp[index].state;
		 var param_country=resp[index].country;
		 var param_isFriend=resp[index].isFriend;
		 var param_youRecFrndRequest=resp[index].youRecFrndRequest;
		 var param_youSentfrndRequest=resp[index].youSentfrndRequest; 
		 content+=uiTemplate_displayPeople_WithFriendsNonFriendsDiff(param_userId, param_profilepic, param_surName, 
					param_name, param_minlocation,param_location,param_state,param_country,param_isFriend,
					param_youRecFrndRequest,param_youSentfrndRequest)
	   }
	} else {
		 content+='<div align="center" class="list-group-item">';
		 content+='<span class="silver-font">No People Available Now</span>';
		 content+='</div>';
	  }
		 content+=appendContent;
		 document.getElementById(div_view).innerHTML=content;
  });
}

function search_hide_currentPerson(id){
  if(!$('#'+id).hasClass('hide-block')){ $('#'+id).addClass('hide-block'); }
}

var FRNDREQUEST_TOTALCOUNT;
var FRNDREQUEST_CURCOUNT;
/* Friend Requests ::: */
function friendsRequestsToMeList(){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
  { action:'COUNT_FRNDREQUEST_TO_ME', user_Id:AUTH_USER_ID },function(totalData){
   FRNDREQUEST_TOTALCOUNT=totalData;
   FRNDREQUEST_CURCOUNT=totalData;
   document.getElementById("totalFrndReqToMeCount").innerHTML='('+FRNDREQUEST_TOTALCOUNT+')';
   scroll_loadInitializer('friendsreqlistToMe',10,friendsRequestsToMeList_data,totalData);
 });
}
function hide_frndReqToMe(user_Id){
  FRNDREQUEST_CURCOUNT=FRNDREQUEST_CURCOUNT-1;
  document.getElementById("totalFrndReqToMeCount").innerHTML='('+FRNDREQUEST_CURCOUNT+')';
  if(FRNDREQUEST_CURCOUNT===0){
     var content='<div align="center" class="list-group-item">';
	     content+='<span class="silver-font"><h5><i>You don\'t have any New Friend Requests.</i></h5></span>';
		 content+='</div>';
	 document.getElementById("friendsreqlistToMe0").innerHTML=content;
  }
  if(!$("#frndReqToMe"+user_Id).hasClass('hide-block')) { $("#frndReqToMe"+user_Id).addClass('hide-block'); }
}
function friendsRequestsToMeList_data(div_view,appendContent,limit_start,limit_end){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
{action:'FRNDREQUEST_TO_ME', user_Id:AUTH_USER_ID, limit_start:limit_start, limit_end:limit_end },function(resp){
console.log(resp);resp=JSON.parse(resp); 
		  var content='';
		  if(resp.length>0) {
			 for(var index=0;index<resp.length;index++){
				content+='<div id="frndReqToMe'+resp[index].user_Id+'" class="list-group-item" style="padding:5px 5px;">';
				content+='<div class="container-fluid pad0">';
				content+='<div class="col-xs-4">';
				content+='<img class="img-min-profilepic" src="'+resp[index].profile_pic+'"/>';
				content+='</div>';
				content+='<div align="center" class="col-xs-8 frnshipreqdiv">';
				content+='<h5><b>'+resp[index].surName+' '+resp[index].name+'</b></h5>';
				content+='<span class="frnshipreqaddr">'+resp[index].minlocation+', '+resp[index].location+', '+resp[index].state+', '+resp[index].country+'</span>';
				content+='<button class="btn custom-bg form-control white-font m1" onclick="javascript:acceptReqToMe(\''+resp[index].user_Id+'\');" style="background-color:'+CURRENT_DARK_COLOR+'" ><b>Accept Friendship</b></button>';
				content+='<button class="btn custom-lgt-bg form-control m1" style="background-color:'+CURRENT_LIGHT_COLOR+'" onclick="javascript:hide_frndReqToMe(\''+resp[index].user_Id+'\');"><b>Hide</b></button>';
				content+='</div>';
				content+='</div>';
			    content+='</div>';
			 }
		 } else {
		     content+='<div align="center" class="list-group-item">';
			 content+='<span class="silver-font"><h5><i>You don\'t have any New Friend Requests.</i></h5></span>';
			 content+='</div>';
		 }
		 content+=appendContent;
		 document.getElementById(div_view).innerHTML=content;
});

}

/* One User Sending Request to Other User */
function send_friend_request(user_Id){
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
 {action:'SEND_USERFRND_REQUESTS', from_user_Id:AUTH_USER_ID, to_user_Id:user_Id },function(resp){
 console.log(resp);
   if(!$('#searchpeople_'+user_Id).hasClass('hide-block')){ $('#searchpeople_'+user_Id).addClass('hide-block'); }
 });
}

/* Accept Request To Me */
function acceptReqToMe(user_Id){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
{action:'ACCEPT_FRNDREQUEST_TO_ME',requestFrom:user_Id, user_Id:AUTH_USER_ID },function(resp){ hide_frndReqToMe(user_Id); });
}

/* UnFriend a Person */
function unfriendAperson(user_Id){  
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
{action:'UNFRIEND_A_PERSON',frnd1:user_Id, frnd2:AUTH_USER_ID },function(resp){ console.log(resp);
if(!$('#searchpeople_'+user_Id).hasClass('hide-block')){ $('#searchpeople_'+user_Id).addClass('hide-block'); }
 });
}

/* Delete a Sent Friend Request */
function deleteARequestSent(user_Id){
js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.page.app.findfriends.php',
{action:'DELETE_A_REQUEST_SENT',from_userId:AUTH_USER_ID, to_userId:user_Id },function(resp){ console.log(resp);
if(!$('#searchpeople_'+user_Id).hasClass('hide-block')){ $('#searchpeople_'+user_Id).addClass('hide-block');}});
}
// //      