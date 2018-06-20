<?php session_start(); ?>
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
 <script src="<?php echo $_SESSION["PROJECT_URL"]; ?>js/api/db.identity.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
      console.log("unionprof_account_Id : "+newsfeed_info_Id()+" length: "+newsfeed_info_Id().length);
	  console.log("newsfeed_move_Id : "+newsfeed_move_Id()+" length: "+newsfeed_move_Id().length);
	  console.log("newsfeed_user_fav_Id : "+newsfeed_user_fav_Id()+" length: "+newsfeed_user_fav_Id().length);
	  console.log("newsfeed_user_likes_Id : "+newsfeed_user_likes_Id()+" length: "+newsfeed_user_likes_Id().length);
	  console.log("newsfeed_user_views_Id : "+newsfeed_user_views_Id()+" length: "+newsfeed_user_views_Id().length);
	  console.log("newsfeed_user_votes_Id : "+newsfeed_user_votes_Id()+" length: "+newsfeed_user_votes_Id().length);
      console.log("unionprof_account_Id : "+unionprof_account_Id()+" length: "+unionprof_account_Id().length);
	  console.log("unionprof_branch_Id : "+unionprof_branch_Id()+" length: "+unionprof_branch_Id().length);
	  console.log("unionprof_calndar_Id : "+unionprof_calndar_Id()+" length: "+unionprof_calndar_Id().length);
	  console.log("unionprof_members_Id : "+unionprof_members_Id()+" length: "+unionprof_members_Id().length);
	  console.log("unionprof_chat_Id : "+unionprof_chat_Id()+" length: "+unionprof_chat_Id().length);
	  console.log("unionprof_mem_perm_Id : "+unionprof_mem_perm_Id()+" length: "+unionprof_mem_perm_Id().length);
	  console.log("unionprof_requests_Id : "+unionprof_requests_Id()+" length: "+unionprof_requests_Id().length);
	  console.log("unionprof_mem_roles_Id : "+unionprof_mem_roles_Id()+" length: "+unionprof_mem_roles_Id().length);
	  console.log("unionprof_sup_Id : "+unionprof_sup_Id()+" length: "+unionprof_sup_Id().length);
   });
 </script>
</head>
<body>

</body>
</html>