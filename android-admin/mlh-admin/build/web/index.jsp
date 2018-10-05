<%-- 
    Document   : index
    Created on : Sep 3, 2018, 2:27:32 PM
    Author     : Kishore_Nellutla
--%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/api/core-skeleton.css">
<title>Administrator Dashboard</title>
<%@include file="templates/api_js.jsp" %>
<script type="text/javascript">
$(document).ready(function(){
 selopt_build_userIdList("notifyTesting_my_userId","");  // For User Module
});
function selopt_build_domainList(selOptId){
 js_ajax("GET",PROJECT_URL+"/domainModule",{ action:'GETDOMAINLIST' },function(response){
    console.log(response);
  response=JSON.parse(response);
  var selOptElement=document.getElementById(selOptId);
  selopt_reset_domainList(selOptId);
  for(var index=0;index<response.length;index++) {
  var option = document.createElement("option");
	 option.text = response[index].domainName;
	 option.value = response[index].domain_Id;
   selOptElement.add(option);
 }
 });
}
function selopt_reset_domainList(selOptId){
  var selOptElement=document.getElementById(selOptId);
  for(var index=selOptElement.length;index>0;index--) { selOptElement.remove(index); }
}
function selopt_build_userIdList(selOptId,expectionId){
 js_ajax("GET",PROJECT_URL+"/userAuthenticationModule",{ action:'GET_DATA_USERIDLIST',limit_start:'0', limit_end:'100' },
 function(response){
    console.log(response);
  response=JSON.parse(response);
  var selOptElement=document.getElementById(selOptId);
  selopt_reset_userIdList(selOptId);
  for(var index=0;index<response.length;index++) {
      var user_Id=response[index].user_Id;
  if(expectionId!==user_Id){
    var option = document.createElement("option");
        option.text = user_Id;
	option.value = user_Id;
    selOptElement.add(option);
  }
 }
 });
}
function selopt_reset_userIdList(selOptId){
 var selOptElement=document.getElementById(selOptId);
 for(var index=selOptElement.length;index>0;index--) { selOptElement.remove(index); }
}
function selopt_build_communityIdList(selOptId){
 js_ajax("GET",PROJECT_URL+"/communityProfessionalModule",{ action:'GETCOMMUNITYIDLIST' },function(response){
    console.log(response);
  response=JSON.parse(response);
  var selOptElement=document.getElementById(selOptId);
  selopt_reset_userIdList(selOptId);
  for(var index=0;index<response.length;index++) {
      var union_Id=response[index].union_Id;
    var option = document.createElement("option");
        option.text = union_Id;
	option.value = union_Id;
    selOptElement.add(option);
 }
 });
}
function selopt_reset_communityIdList(selOptId){
 var selOptElement=document.getElementById(selOptId);
 for(var index=selOptElement.length;index>0;index--) { selOptElement.remove(index); }
}
function selopt_build_country(selOptId){
 js_ajax("GET",PROJECT_URL+'config/countries/countries.json',{},
 function(response){ 
   var countryElement=document.getElementById(selOptId);
   for(var index=0;index<response.countries.length;index++) {
     var option = document.createElement("option");
	     option.text = response.countries[index].countryName;
	     option.value = response.countries[index].countryValue;
     countryElement.add(option);
   }
 });
}
function selopt_reset_country(selOptId){
 var countryElement=document.getElementById(selOptId);
 for(var index=countryElement.length;index>0;index--) { countryElement.remove(index); }
}
function selopt_build_state(selOptCountryId,selOptStateId){
 var country=document.getElementById(selOptCountryId).value;
 js_ajax("GET",PROJECT_URL+'config/countries/'+country+'/viewAllStates.json',{},
 function(response){ 
  var stateElement=document.getElementById(selOptStateId);
  selopt_reset_state(selOptStateId);
  for(var index=0;index<response.states.length;index++) {
    var option = document.createElement("option");
        option.text = response.states[index].stateName;
	option.value = response.states[index].stateValue;
    stateElement.add(option);
  }
 });
}
function selopt_reset_state(selOptStateId){
  var stateElement=document.getElementById(selOptStateId);
  for(var index=stateElement.length;index>0;index--) { stateElement.remove(index); }  
}
function selopt_build_locationOption(selOptCountryId,selOptStateId,selOptLocationId) { 
 var country=document.getElementById(selOptCountryId).value;
 var state=document.getElementById(selOptStateId).value;
 js_ajax("GET",PROJECT_URL+'config/countries/'+country+'/'+state+'/viewAllLocations.json',
 {},function(response){ 
  var locationElement=document.getElementById(selOptLocationId);
  selopt_reset_locationOption(selOptLocationId);
  for(var index=0;index<response.location.length;index++) {
    var option = document.createElement("option");
        option.text = response.location[index].locationName;
        option.value = response.location[index].locationValue;
    locationElement.add(option);
   }
 });
}
function selopt_reset_locationOption(selOptLocationId) {
  var locationElement=document.getElementById(selOptLocationId);
  for(var index=locationElement.length;index>0;index--) { locationElement.remove(index); } 
}
function selopt_build_minlocationOption(selOptCountryId,selOptStateId,selOptLocationId,selOptLocalityId){	 
 var country=document.getElementById(selOptCountryId).value;
 var state=document.getElementById(selOptStateId).value;
 var location=document.getElementById(selOptLocationId).value;
 js_ajax("GET",PROJECT_URL+'/config/countries/'+country+'/'+state+'/'+location+'/ViewAllMinLocations.json',
 {},function(response){ 
   var localityElement=document.getElementById(selOptLocalityId);
   selopt_reset_minlocationOption(selOptLocalityId);
   for(var index=0;index<response.minLocations.length;index++) {
    var option = document.createElement("option");
        option.text = response.minLocations[index].minlocationName;
	option.value = response.minLocations[index].minlocationValue;
    localityElement.add(option);
  }
 });
}
function selopt_reset_minlocationOption(selOptLocalityId){
  var localityElement=document.getElementById(selOptLocalityId);
  for(var index=localityElement.length;index>0;index--) { localityElement.remove(index); }
}
function redirectURL_userInformation(){
 var user_Id=document.getElementById("notifyTesting_my_userId").value;
 window.open(PROJECT_URL+'userInfo.jsp?AUTH_USER_ID='+user_Id);
}
/* NOTIFICATION TESTING MODULE */
var NOTIFY_MYUSERID;
function notify_myUserId_fix(){
 NOTIFY_MYUSERID=document.getElementById("notifyTesting_my_userId").value;
 document.getElementById("notifyTesting_my_userId").disabled=true;
 if($("#settings_userInfoBtn").hasClass('hide-block')){ $("#settings_userInfoBtn").removeClass('hide-block'); }
 notify_load_recieveFriendRequest();
 notify_load_acceptFrndRequest();
 notify_load_requestLocalBranch();
}
function notify_myUserId_release(){
 NOTIFY_MYUSERID=undefined;
 document.getElementById("notifyTesting_my_userId").disabled=false;
 if(!$("#settings_userInfoBtn").hasClass('hide-block')){ $("#settings_userInfoBtn").addClass('hide-block'); }
 notify_reset_recieveFriendRequest();
 notify_reset_acceptFrndRequest();
 notify_reset_requestLocalBranch();
}

/* Receive Friend Request */
function notify_load_recieveFriendRequest(){
 selopt_build_userIdList("notifyTesting_recieveFrndRequest_userId",NOTIFY_MYUSERID);
}
function notify_reset_recieveFriendRequest(){
  selopt_reset_userIdList("notifyTesting_recieveFrndRequest_userId"); 
}
function notify_recieveFrndRequest_modal(){
  var user_Id=document.getElementById("notifyTesting_recieveFrndRequest_userId").value;
  var content='<div class="modal-dialog">';
      content+='<div class="modal-content">';
      content+='<div class="modal-header">';
      content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
      content+='<h4 class="modal-title">Notification Alert</h4>';
      content+='</div>';
      content+='<div class="modal-body">';
      content+='<div class="container-fluid">';
      content+='<div class="row">';
      content+='<div class="col-xs-12">';
      content+='<p>You will received Notification from USER-ID ('+user_Id+')</p><br/>';
      content+='<a target="_blank" href="'+PROJECT_URL+'userInfo.jsp?AUTH_USER_ID='+user_Id+'">';
      content+='<button class="btn btn-default pull-right">View User Information</button>';
      content+='</a>';
      content+='</div>';
      content+='</div>';
      content+='</div>';
      content+='</div>';
      content+='</div>';
      content+='</div>';
  document.getElementById("indexModal").innerHTML=content;
  $('#indexModal').modal('show');
}
function notify_recieveFrndRequest_sendNotification(){
  notify_recieveFrndRequest_modal();
  var from_userId=document.getElementById("notifyTesting_recieveFrndRequest_userId").value;
  js_ajax("GET",PROJECT_URL+'/userFriendsModule',
  { action:'RECEIVE_USERFRIEND_REQUEST',projectURL:PROJECT_WS_URL, from_userId:from_userId, to_userId:NOTIFY_MYUSERID },
  function(response){
        console.log(response);
  });    
}

/* Accept Friend Request */
function notify_load_acceptFrndRequest(){
 selopt_build_userIdList("notifyTesting_acceptFrndRequest_userId",NOTIFY_MYUSERID);
}
function notify_reset_acceptFrndRequest(){
 selopt_reset_userIdList("notifyTesting_acceptFrndRequest_userId");  
}
function notify_acceptFrndRequest_sendNotification(){
 var from_userId=document.getElementById("notifyTesting_acceptFrndRequest_userId").value;  
 js_ajax("GET",PROJECT_URL+'/userFriendsModule',
  { action:'ACCEPT_USERFRIEND_REQUEST', from_userId:from_userId, 
      to_userId:NOTIFY_MYUSERID },function(response){
        console.log(response);
  });   
}
/* Request Local Branch */
function notify_load_requestLocalBranch(){
 selopt_build_communityIdList('notifyTesting_reqLocalBranch_communityId');
 selopt_build_country('notifyTesting_reqLocalBranch_country');
}
function notify_reset_requestLocalBranch(){
 selopt_reset_communityIdList('notifyTesting_reqLocalBranch_communityId');
 selopt_reset_minlocationOption('notifyTesting_reqLocalBranch_locality');
 selopt_reset_locationOption('notifyTesting_reqLocalBranch_location');
 selopt_reset_state('notifyTesting_reqLocalBranch_state');
 selopt_reset_country('notifyTesting_reqLocalBranch_country');
}
function notify_requestLocalBranch_sendNotification(){
   // notifyTesting_reqLocalBranch_userId
      //    notifyTesting_reqLocalBranch_country
      //    notifyTesting_reqLocalBranch_state
      //    notifyTesting_reqLocalBranch_location
      //    notifyTesting_reqLocalBranch_locality
}
</script>
<style>
.pad2-8 { padding:2px 8px; }
.mtop15p { margin-top:15px; }
</style>
</head>
<body>
<div id="indexModal" class="modal fade" role="dialog"></div>
    
 <div class="jumbotron text-center">
  <h1>My First Bootstrap Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
  
<div class="container-fluid">
  <div class="row">
    
    <div class="col-sm-9">
      <div class="panel panel-primary">
        <div class="panel-heading pad2-8">
            <div><h5><b>Notification Testing Module</b></h5></div>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-4">
                  <%@include file="templates/notifyTestingModule_01Settings.jsp" %>      
                  <%@include file="templates/notifyTestingModule_02ReceiveFrndRequest.jsp" %>  
                  <%@include file="templates/notifyTestingModule_03AcceptFrndRequest.jsp" %>    
                </div>
                <div class="col-sm-4">
                  <%@include file="templates/notifyTestingModule_04RequestLocalBranch.jsp" %>    
                  <%@include file="templates/notifyTestingModule_06UserReceivedMembershipRequest.jsp" %>
                  <%@include file="templates/notifyTestingModule_07MemberJoinedInCommunity.jsp" %>    
                  <%@include file="templates/notifyTestingModule_08YourRoleChangedInCommunity.jsp" %>
                  <%@include file="templates/notifyTestingModule_09YourRolePermissionsChanged.jsp" %>
                </div>
                <div class="col-sm-4">
                  <%@include file="templates/notifyTestingModule_05AcceptLocalBranch.jsp" %>
                  <%@include file="templates/notifyTestingModule_10DisplayNewsFeed.jsp" %> 
                  <%@include file="templates/notifyTestingModule_11DisplayMovement.jsp" %>     
                </div>
               </div>
             </div>
        </div>
      </div>   
    </div>
  </div>
</div>
</body>
</html>
