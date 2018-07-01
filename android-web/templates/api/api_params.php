<?php
if(!isset($_SESSION["PROJECT_URL"])){ $_SESSION["PROJECT_URL"]="http://".$_SERVER["HTTP_HOST"]."/mlh/android-web/"; }
if(!isset($_SESSION["PROJECT_MODE"])){ $_SESSION["PROJECT_MODE"]='DEBUG'; }
?>
<script type="text/javascript">
 /* Android Javascript Interface Objects */
 var PROJECT_MODE='<?php  if(isset($_SESSION["PROJECT_MODE"])) { echo $_SESSION["PROJECT_MODE"]; } ?>';
 var PROJECT_URL='<?php  if(isset($_SESSION["PROJECT_URL"])) { echo $_SESSION["PROJECT_URL"]; } ?>';
 /* AUTHENTICATION_STATUS - COMPLETED/INCOMPLETED */
 var AUTHENTICATION_STATUS='<?php  if(isset($_SESSION["AUTHENTICATION_STATUS"])) { echo $_SESSION["AUTHENTICATION_STATUS"]; } ?>'; 
 /* USER DATA */
 var USR_LANG='<?php if(isset($_SESSION["USR_LANG"])) { echo $_SESSION["USR_LANG"]; } ?>';
 var AUTH_USER_ID='<?php if(isset($_SESSION["AUTH_USER_ID"])) { echo $_SESSION["AUTH_USER_ID"]; } else { echo "0"; } ?>';
 var AUTH_USER_USERNAME='<?php if(isset($_SESSION["AUTH_USER_USERNAME"])) { echo $_SESSION["AUTH_USER_USERNAME"]; } ?>';
 var AUTH_USER_SURNAME='<?php if(isset($_SESSION["AUTH_USER_SURNAME"])) { echo $_SESSION["AUTH_USER_SURNAME"]; } ?>';
 var AUTH_USER_FULLNAME='<?php if(isset($_SESSION["AUTH_USER_FULLNAME"])) { echo $_SESSION["AUTH_USER_FULLNAME"]; } ?>';
 var AUTH_USER_COUNTRYCODE='<?php if(isset($_SESSION["AUTH_USER_COUNTRYCODE"])) { echo $_SESSION["AUTH_USER_COUNTRYCODE"]; } ?>';
 var AUTH_USER_PHONENUMBER='<?php if(isset($_SESSION["AUTH_USER_PHONENUMBER"])) { echo $_SESSION["AUTH_USER_PHONENUMBER"]; } ?>';
 var AUTH_USER_GENDER='<?php if(isset($_SESSION["AUTH_USER_GENDER"])) { echo $_SESSION["AUTH_USER_GENDER"]; } ?>';
 var AUTH_USER_DOB='<?php if(isset($_SESSION["AUTH_USER_DOB"])) { echo $_SESSION["AUTH_USER_DOB"]; } ?>';
 var AUTH_USER_COUNTRY='<?php if(isset($_SESSION["AUTH_USER_COUNTRY"])) { echo $_SESSION["AUTH_USER_COUNTRY"]; } ?>'; 
 var AUTH_USER_STATE='<?php if(isset($_SESSION["AUTH_USER_STATE"])) { echo $_SESSION["AUTH_USER_STATE"]; } ?>';
 var AUTH_USER_LOCATION='<?php if(isset($_SESSION["AUTH_USER_LOCATION"])) { echo $_SESSION["AUTH_USER_LOCATION"]; } ?>';
 var AUTH_USER_LOCALITY='<?php if(isset($_SESSION["AUTH_USER_LOCALITY"])) { echo $_SESSION["AUTH_USER_LOCALITY"]; } ?>';
 var AUTH_USER_PROFILEPIC='<?php if(isset($_SESSION["AUTH_USER_PROFILEPIC"])) { echo $_SESSION["AUTH_USER_PROFILEPIC"]; } ?>';
 var AUTH_USER_TIMEZONE='<?php if(isset($_SESSION["AUTH_USER_TIMEZONE"])) { echo $_SESSION["AUTH_USER_TIMEZONE"]; } ?>';
 var AUTH_USER_SUBSCRIPTIONS_LIST='<?php if(isset($_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"])) { echo $_SESSION["AUTH_USER_SUBSCRIPTIONS_LIST"]; } ?>';
/* New Things to Add */
 var AUTH_USER_FRIENDS='<?php if(isset($_SESSION["AUTH_USER_FRIENDS"])) { echo $_SESSION["AUTH_USER_FRIENDS"]; } ?>';
/* User created Community List */
var AUTH_USER_COMMUNITIES_CREATED='<?php if(isset($_SESSION["AUTH_USER_COMMUNITIES_CREATED"])) { echo $_SESSION["AUTH_USER_COMMUNITIES_CREATED"]; } ?>';

console.log("[api_params] PROJECT_URL: "+PROJECT_URL);
console.log("[api_params] USR_LANG: "+USR_LANG);
console.log("[api_params] AUTHENTICATION_STATUS: "+AUTHENTICATION_STATUS);
console.log("[api_params] AUTH_USER_ID: "+AUTH_USER_ID);
console.log("[api_params] AUTH_USER_USERNAME: "+AUTH_USER_USERNAME);
console.log("[api_params] AUTH_USER_SURNAME: "+AUTH_USER_SURNAME);
console.log("[api_params] AUTH_USER_FULLNAME: "+AUTH_USER_FULLNAME);
console.log("[api_params] AUTH_USER_COUNTRYCODE: "+AUTH_USER_COUNTRYCODE);
console.log("[api_params] AUTH_USER_PHONENUMBER: "+AUTH_USER_PHONENUMBER);
console.log("[api_params] AUTH_USER_GENDER: "+AUTH_USER_GENDER);
console.log("[api_params] AUTH_USER_DOB: "+AUTH_USER_DOB);
console.log("[api_params] AUTH_USER_COUNTRY: "+AUTH_USER_COUNTRY);
console.log("[api_params] AUTH_USER_STATE: "+AUTH_USER_STATE);
console.log("[api_params] AUTH_USER_LOCATION: "+AUTH_USER_LOCATION);
console.log("[api_params] AUTH_USER_PROFILEPIC: "+AUTH_USER_PROFILEPIC);
console.log("[api_params] AUTH_USER_TIMEZONE: "+AUTH_USER_TIMEZONE);
console.log("[api_params] AUTH_USER_SUBSCRIPTIONS_LIST: "+AUTH_USER_SUBSCRIPTIONS_LIST);
console.log("[api_params] AUTH_USER_FRIENDS: "+AUTH_USER_FRIENDS);
console.log("[api_params] AUTH_USER_COMMUNITIES_CREATED: "+AUTH_USER_COMMUNITIES_CREATED);
// alert(AUTH_USER_SUBSCRIPTIONS+" "+AUTH_USER_SUBSCRIPTIONS_LIST);
 </script>