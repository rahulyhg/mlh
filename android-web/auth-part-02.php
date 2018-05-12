<?php session_start(); 
if(isset($_SESSION["AUTHENTICATION_STATUS"])){
if($_SESSION["AUTHENTICATION_STATUS"]=='INCOMPLETED'){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'templates/api/api_params.php'; ?>
<?php include_once 'templates/api/api_js.php'; ?>
 <title>Authentication</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-02-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-02.js"></script>
 <script type="text/javascript">
 function authAlert(id){
  var arryIds=["alert_english_surName","alert_english_fullName","alert_english_gender","alert_english_dob",
			  "alert_english_country","alert_english_state","alert_english_location","alert_english_locality"];
  for(var index=0;index<arryIds.length;index++){
	if(arryIds[index]===id){ $("#authFormModal").modal();$("#"+arryIds[index]).removeClass('hide-block'); }
	else { $("#"+arryIds[index]).addClass('hide-block'); }
  }
 }
 function authDone(){
   /* Set AUTHENTICATION_STATUS=DONE */
  var userId=document.getElementById("reg_"+USR_LANG+"_userId").value;
  var username=document.getElementById("reg_"+USR_LANG+"_username").value;
  var userTz=document.getElementById("reg_"+USR_LANG+"_userTz").value;
  var surname=document.getElementById("reg_"+USR_LANG+"_surname").value;
  var name=document.getElementById("reg_"+USR_LANG+"_name").value;
  var dob=document.getElementById("reg_"+USR_LANG+"_dob").value;
  var gender=document.getElementById("reg_"+USR_LANG+"_gender").value;
  var country=document.getElementById("reg_"+USR_LANG+"_country").value;
  var state=document.getElementById("reg_"+USR_LANG+"_state").value;
  var location=document.getElementById("reg_"+USR_LANG+"_location").value;
  var locality=document.getElementById("reg_"+USR_LANG+"_locality").value;
   
  if(surname.length>0){
  if(name.length>0){
  if(dob.length>0){
  if(gender.length>0){
  if(country.length>0){
  if(state.length>0){
  if(location.length>0){
  if(locality.length>0){
     var sessionJSON='{"session_set":[';
         sessionJSON+='{"key":"AUTH_USER_ID","value":"'+userId+'"},';
         sessionJSON+='{"key":"AUTH_USER_USERNAME","value":"'+username+'"},';
	     sessionJSON+='{"key":"AUTH_USER_TIMEZONE","value":"'+userTz+'"},';
	     sessionJSON+='{"key":"AUTH_USER_SURNAME","value":"'+surname+'"},';
	     sessionJSON+='{"key":"AUTH_USER_FULLNAME","value":"'+name+'"},';
	     sessionJSON+='{"key":"AUTH_USER_GENDER","value":"'+gender+'"},';
	     sessionJSON+='{"key":"AUTH_USER_DOB","value":"'+dob+'"},';
	     sessionJSON+='{"key":"AUTH_USER_COUNTRY","value":"'+country+'"},';
	     sessionJSON+='{"key":"AUTH_USER_STATE","value":"'+state+'"},';
	     sessionJSON+='{"key":"AUTH_USER_LOCATION","value":"'+location+'"},';
	     sessionJSON+='{"key":"AUTH_USER_LOCALITY","value":"'+locality+'"}';
	     sessionJSON+='],';
	     sessionJSON+='"session_get":["AUTH_USER_ID","AUTH_USER_USERNAME",';
	     sessionJSON+='"AUTH_USER_TIMEZONE","AUTH_USER_SURNAME","AUTH_USER_FULLNAME","AUTH_USER_GENDER","AUTH_USER_DOB",';
	     sessionJSON+='"AUTH_USER_COUNTRY","AUTH_USER_STATE","AUTH_USER_LOCATION","AUTH_USER_LOCALITY",';
	     sessionJSON+='"AUTH_USER_COUNTRYCODE","AUTH_USER_PHONENUMBER" ]}';
     js_session(sessionJSON,function(response){ window.location.href=PROJECT_URL+"initializer/profile-pic"; });
  } else { authAlert("alert_english_locality"); }
  } else { authAlert("alert_english_location"); }
  } else { authAlert("alert_english_state"); }
  } else { authAlert("alert_english_country"); }
  } else { authAlert("alert_english_gender"); }
  } else { authAlert("alert_english_dob"); }
  } else { authAlert("alert_english_fullName"); }
  } else { authAlert("alert_english_surName"); }

  /* Validations */	
  
  
  /* set in Session */
 // if(userId==='0'){ /* Add New Account*/
    
 // } else {  /* Update Existing Account */
  
 // }
 }
 
 
 </script>
 <style>
  body { background-color:#0ba0da; }
 #authFormRegisterDivision,#alert_userCheckAvailability { display:none; }
 </style>
</head>
<body>
 <div id="authFormModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body pad0">
		<div class="alert alert-warning alert-dismissible" style="margin-bottom:0px;">
			<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
			<span class="lang_english">
			  <div id="alert_english_surName" class="hide-block">
				<strong>Warning!</strong> Missing SurName.
			  </div>
			  <div id="alert_english_fullName" class="hide-block">
				<strong>Warning!</strong> Missing FullName.
			  </div>
			  <div id="alert_english_gender" class="hide-block">
				<strong>Warning!</strong> Missing Gender.
			  </div>
			  <div id="alert_english_dob" class="hide-block">
				<strong>Warning!</strong> Missing Date of Birth.
			  </div>
			  <div id="alert_english_country" class="hide-block">
				<strong>Warning!</strong> Missing Country.
			  </div>
			  <div id="alert_english_state" class="hide-block">
				<strong>Warning!</strong> Missing State.
			  </div>
			  <div id="alert_english_location" class="hide-block">
				<strong>Warning!</strong> Missing Location.
			  </div>
			  <div id="alert_english_locality" class="hide-block">
				<strong>Warning!</strong> Missing Locality.
			  </div>
			</span>
		</div>
      </div>
    </div>
  </div>
 </div>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 <div id="usernameCheckAvailabilityDivision" class="container-fluid">
 
   <!-- Username -->
   <div class="col-xs-12 mtop15p white-font">
     <input type="hidden" id="reg_english_userId" class="form-control" placeholder="Enter your UserId" value="0"/>
	 <input type="hidden" id="reg_english_userTz" class="form-control" placeholder="Enter your Timezone" value=""/>
	 <label>Set your Username</label>
     <input type="text" id="reg_english_username" class="form-control" placeholder="Enter your Username"/>
   </div> 
   <div align="center" id="alert_userCheckAvailability" class="col-xs-12 mtop15p">
      <span class="lang_english">
	     <div id="english_usernameAlreadyExists" class="hide-block white-font">
		   <b>Username already exists. Please try Other.</b>
		 </div>
	  </span>
   </div> 
   <div align="center" class="col-xs-12 mtop15p">
     <button class="btn btn-default form-control" onclick="javascript:checkUserAvailability();"><b>Check Availablity</b></button>
   </div>
   
  </div>

   <div id="authFormRegisterDivision" class="container-fluid white-font mbot30p">  
   <div class="col-xs-12">
     <h4><b>Enter your details</b></h4><hr/>
   </div>
   <!-- SurName -->
   <div class="col-xs-12">
     <label>SurName</label>
     <input type="text" id="reg_english_surname" class="form-control" placeholder="Enter your SurName"/>
   </div>
	
   <!-- name -->
   <div class="col-xs-12 mtop15p">
     <label>FullName</label>
     <input type="text" id="reg_english_name" class="form-control" placeholder="Enter your Name"/>
   </div>
   
   <!-- gender -->
   <div class="col-xs-12 mtop15p">
     <label>Gender</label>
     <select id="reg_english_gender" class="form-control">
		<option value=""> Select your Gender </option>
		<option value="MALE">Male</option>
		<option value="FEMALE">Female</option>
	 </select>
   </div>
   <!-- -->
   <div class="col-xs-12 mtop15p">
     <label>Date of Birth</label>
     <input type="date" id="reg_english_dob" class="form-control"/>
   </div>
   
   <!-- country -->
   <div class="col-xs-12 mtop15p">
      <label>Country</label>
      <select id="reg_english_country" class="form-control" onchange="javascript:userselected_country();">
	    <option value=""> Select your Country </option>
	  </select>
   </div>
   
   <!-- state -->
   <div class="col-xs-12 mtop15p">
      <label>State</label>
      <select id="reg_english_state" class="form-control" onchange="javascript:userselected_state();">
	    <option value=""> Select your State </option>
	  </select>
   </div>
   
   <!-- location -->
   <div class="col-xs-12 mtop15p">
      <label>Location</label>  
      <select id="reg_english_location" class="form-control" onchange="javascript:userselected_location();">
	    <option value=""> Select your Location </option>
	  </select>
   </div>
   
   <!-- locality -->
   <div class="col-xs-12 mtop15p">
      <label>Locality</label>
      <select id="reg_english_locality" class="form-control">
	    <option value=""> Select your Locality </option>
	  </select>
   </div>

   <div class="col-xs-12 mtop20p">
      <button class="btn btn-default form-control" onclick="javascript:authDone();">
	     <i class="fa fa-check"></i>&nbsp;<b>I'm done</b>
	  </button>
   </div>
   
   </div>
</body>
</html>
<?php 
} else { header("Location: ".$_SESSION["PROJECT_URL"]."newsfeed/latest-news"); }
} else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>