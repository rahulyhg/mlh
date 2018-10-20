<div class="container-fluid mtop15p">
  <div class="col-xs-12 pad0">
    <div class="list-group">
	   <div class="list-group-item" style="border-bottom:3px solid #000;">
	      <h5><b>Send An Invitation Via WhatsApp</b></h5>
	   </div>
	   <div class="list-group-item">
	     It is a public Invitation where anyone can be join the Community as a Common Member.
	   </div>
	   <div class="list-group-item">
	    <div class="container-fluid pad0">
		  <div id="sendMemberInvitationDivision" class="col-xs-12 pad0">
		   
		  </div>
	     </div>
	   </div>
	</div>
  </div>
</div>
<script type="text/javascript">
function inviteMsg_public_AsMembers(){
  var whatsappMessage="*Free Membership Request:* \n";
      whatsappMessage+="I'm holding a title as a *\"roleTitle\"* in the Community *\"CommunityTitle\"*. ";
      whatsappMessage+="We created a platform to be close to the people who are suffering with the issues of \n ";
	  whatsappMessage+="1. Issue-01 \n ";
	  whatsappMessage+="2. Issue-02 \n ";
	  whatsappMessage+="3. Issue-03 \n ";
	  whatsappMessage+="4. Issue-04 \n ";
	  whatsappMessage+="5. Issue-05 \n ";
	  whatsappMessage+="6. Issue-06 \n ";
	  whatsappMessage+="7. Issue-07 \n ";
	  whatsappMessage+="8. Issue-08 \n ";
	  whatsappMessage+="9. Issue-09 \n ";
	  whatsappMessage+="10. Issue-10 \n ";
	  whatsappMessage+="And hoping you are also fighting against this issues. \n ";
	  whatsappMessage+="Therefore, we are inviting you to join in the Community on *MyLocalHook* Platform where we ";
	  whatsappMessage+="are able to connect you with chat, latest News updates and so on. ";
	  whatsappMessage+="So, let's join hands to resolve Issue. \n \n \n ";
	  whatsappMessage+="Install MyLocalHook App https://play.google.com/store/apps/details?id=anups.dun.app (If App is not installed). \n \n \n ";
	  whatsappMessage+="Once App is Installed, click on "+PROJECT_URL+" to be a part of Community. \n \n \n ";
	  whatsappMessage+="Please join to Stay Together. \n \n \n ";
	  whatsappMessage+="*Invitation From* \n ";
	  whatsappMessage+="PersonName \n ";
	  whatsappMessage+="PersonRoleInTheCommunity \n ";
	  whatsappMessage+="CommunityTitle";
  var content='<a href="whatsapp://send?text='+encodeURI(whatsappMessage)+'" data-action="share/whatsapp/share">';
	  content+='<button class="btn btn-default pull-right" ';
	  content+='onclick="javascript:sendUnionMemberRequestInvitation();">';
	  content+='<b>Send Invitation</b>';
	  content+='</button>';
	  content+='</a>';
  document.getElementById("sendMemberInvitationDivision").innerHTML=content; 
}
$(document).ready(function(){
 inviteMsg_public_AsMembers();
});
function sendUnionMemberRequestInvitation(){
 
}
</script>

<div class="container-fluid mtop15p">
  <div class="col-xs-12 pad0">
    <div class="list-group">
	   <div class="list-group-item" style="border-bottom:3px solid #000;">
	      <h5><b>Waiting for your Approval</b></h5>
	   </div>
	</div>
  </div>
</div>