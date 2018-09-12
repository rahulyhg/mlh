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
  var data=JSON.stringify(window.history);
  document.getElementById("testDiv").innerHTML=data;
  console.log("cmp_batch_account_Id: "+cmp_batch_account_Id());
  console.log("cmp_batch_members_Id: "+cmp_batch_members_Id());
  console.log("cmp_batch_mem_chat_Id: "+cmp_batch_mem_chat_Id());
  console.log("cmp_batch_mem_req_Id: "+cmp_batch_mem_req_Id());
  console.log("cmp_sch_account_Id: "+cmp_sch_account_Id());
  console.log("cmp_sch_coursemap_Id: "+cmp_sch_coursemap_Id());
  console.log("cmp_uni_account_Id: "+cmp_uni_account_Id());
  console.log("cmp_uni_courses_Id: "+cmp_uni_courses_Id());
  console.log("ent_fc_account_Id: "+ent_fc_account_Id());
  console.log("ent_fc_aw_Id: "+ent_fc_aw_Id());
  console.log("ent_fc_occmap_Id: "+ent_fc_occmap_Id());
  console.log("ent_occupations_Id: "+ent_occupations_Id());
  console.log("move_info_Id: "+move_info_Id());
  console.log("move_sign_Id: "+move_sign_Id());
  console.log("move_views_Id: "+move_views_Id());
  console.log("newsfeed_info_Id: "+newsfeed_info_Id());
  console.log("newsfeed_move_Id: "+newsfeed_move_Id());
  console.log("newsfeed_user_fav_Id: "+newsfeed_user_fav_Id());
  console.log("newsfeed_user_likes_Id: "+newsfeed_user_likes_Id());
  console.log("newsfeed_user_views_Id: "+newsfeed_user_views_Id());
  console.log("newsfeed_user_votes_Id: "+newsfeed_user_votes_Id());
  console.log("unionprof_account_Id: "+unionprof_account_Id());
  console.log("unionprof_branch_Id: "+unionprof_branch_Id());
  console.log("unionprof_branch_req_Id: "+unionprof_branch_req_Id());
  console.log("unionprof_calndar_union_Id: "+unionprof_calndar_union_Id());
  console.log("unionprof_calndar_branch_Id: "+unionprof_calndar_branch_Id());
  console.log("unionprof_faq_branch_Id: "+unionprof_faq_branch_Id());
  console.log("unionprof_faq_union_Id: "+unionprof_faq_union_Id());
  console.log("unionprof_mem_Id: "+unionprof_mem_Id());
  console.log("unionprof_mem_chat_Id: "+unionprof_mem_chat_Id());
  console.log("unionprof_mem_perm1_Id: "+unionprof_mem_perm1_Id());
  console.log("unionprof_mem_req_Id: "+unionprof_mem_req_Id());
  console.log("unionprof_mem_roles_Id: "+unionprof_mem_roles_Id());
  console.log("unionprof_sup_Id: "+unionprof_sup_Id());
  console.log("user_account_Id: "+user_account_Id());
  console.log("user_contact_Id: "+user_contact_Id());
  console.log("user_frnds_Id: "+user_frnds_Id());
  console.log("user_frnds_req_Id: "+user_frnds_req_Id());
  console.log("user_message_Id: "+user_message_Id());
  console.log("user_subscription_Id: "+user_subscription_Id());
 });
 </script>
</head>
<body>
<a href="http://localhost/mlh/android-web/app-test-identity.php"><button>Test</button></a>
<div id="testDiv"></div>
</body>
</html>