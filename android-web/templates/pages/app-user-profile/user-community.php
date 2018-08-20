<script type="text/javascript">
// custom-bg-solid1pxfullborder
$(document).ready(function(){
 community_subMenuHgl('community_subMenu_userCreated');
});
function community_subMenuHgl(id){
 var arry=["community_subMenu_userCreated","community_subMenu_userBeingMember","community_subMenu_userSubscription"];
 for(var index=0;index<arry.length;index++){
   if(arry[index]===id) {
      if(!$('#'+arry[index]).hasClass('custom-bg-solid2pxfullborder')) {
	    $('#'+arry[index]).addClass('custom-bg-solid2pxfullborder');
		$('#'+arry[index]).css('border','2px solid '+CURRENT_DARK_COLOR);
		$('#'+arry[index]).css('color',CURRENT_DARK_COLOR);
	  }
   } else {
      if($('#'+arry[index]).hasClass('custom-bg-solid2pxfullborder')) {
	    $('#'+arry[index]).removeClass('custom-bg-solid2pxfullborder');
		$('#'+arry[index]).css('border','1px solid #ccc');
		$('#'+arry[index]).css('color','#000');
	  }
   }
 }
}
</script>
<style>

</style>
<div class="row">
 <div id="community_subMenu_userCreated" align="center" class="col-xs-4" 
 style="border:1px solid #ccc;height:54px;padding-top:5px;color:#000;"
 onclick="javascript:community_subMenuHgl(this.id);">
  <b>User Being Owner</b>
 </div>
 <div id="community_subMenu_userBeingMember" align="center" class="col-xs-4" 
 style="border:1px solid #ccc;height:54px;padding-top:5px;color:#000;"
 onclick="javascript:community_subMenuHgl(this.id);">
  <b>User Being Member</b>
 </div>
 <div id="community_subMenu_userSubscription" align="center" class="col-xs-4" 
 style="border:1px solid #ccc;height:54px;padding-top:5px;color:#000;"
 onclick="javascript:community_subMenuHgl(this.id);">
  <b>User Subscription</b>
 </div>
</div>
<div class="row">

</div>