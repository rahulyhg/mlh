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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-contacts-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-contacts.js"></script>
 <script type="text/javascript">
 var AndroidSQLiteUsrFrndsInfo;
$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 alert(AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo());
});
function loadContacts(){
  var num=AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo();
  var content=AndroidSQLiteUsrFrndsInfo.data_get_UserFrndsInfo('0', num);
  document.getElementById("loadData").innerHTML=content;
}
 </script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_init.php'; ?>
 <button class="btn btn-primary" onclick="javascript:alert(AndroidSQLiteUsrFrndsInfo.data_count_UserFrndsInfo());">Contacts</button>
 <button class="btn btn-primary" onclick="javascript:loadContacts();">loadContacts</button>
 <div id="loadData">
 
 </div>
 </body>
</html>