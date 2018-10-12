<?php session_start();
include_once 'templates/api/api_params.php';
if(isset($_SESSION["AUTH_USER_ID"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Create New Branch</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_SESSION["PROJECT_URL"]; ?>images/favicon.ico"/>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/core-skeleton.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/simple-sidebar.css"> 
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/fontawesome.min.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/croppie.css">
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/jquery-ui.css"> 
 <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/easy-autocomplete.min.css"/>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/db.identity.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/core-skeleton.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bootstrap.min.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery-ui.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/load-data-on-scroll.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/bg-styles-common.js"></script>
 <script type="text/javascript" src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/jquery.easy-autocomplete.min.js"></script>
 <link rel="stylesheet" href="<?php echo $_SESSION["PROJECT_URL"]; ?>styles/api/hz-scrollableTabs.css">
 <?php include_once 'templates/api/api_js.php'; ?>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-profile-createNewBranch.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/pages/app-community-profile-createNewBranch-bg-styles.js"></script>
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/ui-templates.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <script type="text/javascript">
 var MEMBER_OR_BRANCHREQ_ID='<?php if(isset($_GET["1"])) { echo $_GET["1"]; } ?>';
 var UNION_ID='<?php if(isset($_GET["2"])) { echo $_GET["2"]; } ?>';
 console.log("MEMBER_OR_BRANCHREQ_ID: "+MEMBER_OR_BRANCHREQ_ID);
 </script>
</head>
<body>
 <?php include_once 'templates/api/api_loading.php'; ?>
 <?php include_once 'templates/api/api_header_simple.php'; ?>
 <div class="list-group" style="margin-bottom:0px;">
 <div align="center" class="list-group-item" style="background-color:#f5f5f5;">
 <h5 class="uppercase"><b>Create New Branch</b></h5>
 </div>
 </div>

<div class="container-fluid mbot15p">
 <div class="scroller-divison row">
  <div class="scroller scroller-left col-xs-1" style="height:41px;">
    <i class="glyphicon glyphicon-chevron-left"></i>
  </div>
  <div id="communityProfileScrollableTab" class="scrollTabwrapper col-xs-10"></div>
  <div class="scroller scroller-right col-xs-1" style="height:41px;">
	<i class="glyphicon glyphicon-chevron-right"></i>
  </div>
 </div>
</div>

<div id="branchInformationDisplayDivision" class="container-fluid mtop15p hide-block">
<?php include_once 'templates/pages/app-community-profile/community-createNewBranch-branchInformation.php'; ?>
</div>

<div id="createRolesDisplayDivision" class="container-fluid mtop15p hide-block">
<?php include_once 'templates/pages/app-community-profile/community-createNewBranch-createRoles.php'; ?>
</div>
<div id="addMembersDisplayDivision" class="container-fluid mtop15p hide-block">
<?php include_once 'templates/pages/app-community-profile/community-createNewBranch-addMembers.php'; ?>
</div>

 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/hz-scrollableTabs.js"></script>
</body>
</html>
<?php } else { header("Location: ".$_SESSION["PROJECT_URL"]); } ?>