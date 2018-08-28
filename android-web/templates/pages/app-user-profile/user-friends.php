<script type="text/javascript">
function user_count_myFriends(){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_COUNT_MYFRIENDSLIST', user_Id: AUTH_USER_ID },function(total_data){
    scroll_loadInitializer('loadUserFriends',10,user_data_myFriends,total_data);
  });
}
function user_data_myFriends(div_view, appendContent,limit_start,limit_end){
  js_ajax('GET',PROJECT_URL+'backend/php/dac/controller.module.app.user.friends.php',
  { action:'GET_DATA_MYFRIENDSLIST', user_Id: AUTH_USER_ID, limit_start:limit_start, 
    limit_end:limit_end },function(response){
     console.log(response);
	 response=JSON.parse(response);
	 var content='';
	 if(response.length>0){
	 for(var index=0;index<response.length;index++){
	 var user_Id=response[index].user_Id;
	 var username=response[index].username;
	 var surName=response[index].surName;
	 var name=response[index].name;
	 var profile_pic=response[index].profile_pic;
	 var about_me=response[index].about_me;
	 var minlocation=response[index].minlocation;
	 var location=response[index].location;
	 var state=response[index].state;
	 var country=response[index].country;
	 var created_On=response[index].created_On;
	   content+='<div class="col-xs-12">';
       content+='<div class="list-group">';
	   content+='<div class="list-group-item pad0">';
       content+='<div class="container-fluid mtop15p mbot15p">';
	   content+='<div class="row">';
	   content+='<div class="col-xs-12">';
	   content+='<i class="fa fa-close pull-right"></i>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-xs-5">';
	   content+='<img src="'+profile_pic+'" class="profile_pic_img"/>';
	   content+='</div>';
	   content+='<div class="col-xs-7">';
	   content+='<h5 style="line-height:22px;"><b>'+surName+' '+name+'</b></h5>';
	   content+='<div>'+minlocation+', '+location+', '+state+', '+country+'</div>';
	   content+='</div>';
	   content+='</div>';
	   content+='</div>';
       content+='</div>';
       content+='</div>';
       content+='</div>';
	 }
	 } else {
	   content+='<div align="center">';
	   content+='<span style="color:#ccc;">You have no Friends</span>';
	   content+='</div>';
	 }
	 content+=appendContent;
	 document.getElementById(div_view).innerHTML=content;
  });
}
</script>
<div id="loadUserFriends0">
 <div align="center" class="mtop15p">
  <img src="<?php echo $_SESSION["PROJECT_URL"]?>images/load.gif" class="profile_pic_img1"/>
 </div>
</div>