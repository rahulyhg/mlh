<?php include_once 'templates/api/api_params.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
 ?>
<script type="text/javascript" src="js/api/jquery.min.js"></script>
<script type="text/javascript" src="js/api/db.identity.js"></script>
<script type="text/javascript">
$(document).ready(function(){
var url = 'https://api.cloudinary.com/v1_1/dbcyhclaw/image/upload';
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  xhr.open('DELETE', url, true);
 // xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.setRequestHeader("Access-Control-Allow-Methods", "GET, POST, OPTIONS, PUT, DELETE");
  xhr.onreadystatechange = function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
	 //  var response = JSON.parse(xhr.responseText);
	   console.log(xhr.responseText);
	}
  };
 // fd.append('upload_preset', 'tpk5kzrt');
 // fd.append('tags', 'browser_upload'); // Optional - add tag for image admin in Cloudinary
  fd.append('public_id', 'acratica-libertarian-font-ffp_v094lw.png');
//  fd.append('api_key', '139561371366184');
  xhr.send(fd);
 });
 // https://api.cloudinary.com/v1_1/dbcyhclaw/resources/image
</script>
<script type="text/javascript">
console.log("List of Ids:");
var i = 1;
console.log(i+") move_info_Id: "+move_info_Id());i++;
console.log(i+") move_sign_Id: "+move_sign_Id());i++;
console.log(i+") move_views_Id: "+move_views_Id());i++;
console.log(i+") newsfeed_info_Id: "+newsfeed_info_Id());i++;
console.log(i+") newsfeed_ishare_Id: "+newsfeed_ishare_Id());i++;
console.log(i+") newsfeed_rshare_Id: "+newsfeed_rshare_Id());i++;
console.log(i+") newsfeed_move_Id: "+newsfeed_move_Id());i++;
console.log(i+") newsfeed_user_fav_Id: "+newsfeed_user_fav_Id());i++;
console.log(i+") newsfeed_user_likes_Id: "+newsfeed_user_likes_Id());i++;
console.log(i+") newsfeed_user_views_Id: "+newsfeed_user_views_Id());i++;
console.log(i+") newsfeed_user_votes_Id: "+newsfeed_user_votes_Id());i++;
console.log(i+") unionprof_account_Id: "+unionprof_account_Id());i++;
console.log(i+") unionprof_branch_Id: "+unionprof_branch_Id());i++;
console.log(i+") unionprof_branch_req_Id: "+unionprof_branch_req_Id());i++;
console.log(i+") unionprof_calndar_union_Id: "+unionprof_calndar_union_Id());i++;
console.log(i+") unionprof_calndar_branch_Id: "+unionprof_calndar_branch_Id());i++;
console.log(i+") unionprof_faq_branch_Id: "+unionprof_faq_branch_Id());i++;
console.log(i+") unionprof_faq_union_Id: "+unionprof_faq_union_Id());i++;
console.log(i+") unionprof_mem_Id: "+unionprof_mem_Id());i++;
console.log(i+") unionprof_mem_chat_Id: "+unionprof_mem_chat_Id());i++;
console.log(i+") unionprof_mem_perm1_Id: "+unionprof_mem_perm1_Id());i++;
console.log(i+") unionprof_mem_perm2_Id: "+unionprof_mem_perm2_Id());i++;
console.log(i+") unionprof_mem_req_Id: "+unionprof_mem_req_Id());i++;
console.log(i+") unionprof_mem_roles_Id: "+unionprof_mem_roles_Id());i++;
console.log(i+") unionprof_sup_Id: "+unionprof_sup_Id());i++;
console.log(i+") user_account_Id: "+user_account_Id());i++;
console.log(i+") user_contact_Id: "+user_contact_Id());i++;
console.log(i+") user_frnds_Id: "+user_frnds_Id());i++;
console.log(i+") user_frnds_req_Id: "+user_frnds_req_Id());i++;
console.log(i+") user_message_Id: "+user_message_Id());i++;
console.log(i+") user_subscription_Id: "+user_subscription_Id());i++;
</script>