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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-03-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/auth-part-03.js"></script>
 <style>
  body { background-color:#0ba0da; }
 </style>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
   <div id="authFormRegisterDivision" class="container-fluid white-font mbot30p">  
   <div class="col-xs-12">
     <h4><b>Enter your details</b></h4><hr/>
   </div>
   <!-- UserId -->
   <div class="col-xs-12">
     <input type="hidden" id="reg_english_userId" class="form-control"/>
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