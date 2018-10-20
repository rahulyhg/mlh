<script type="text/javascript">
var APPBODYCONTENT_PROGRESSBAR;
function startAppProgressLoader(progressType){ // progressType=info,success,warning,danger
  document.body.style.backgroundColor=CURRENT_DARK_COLOR;
  if($('#app-progress-content').hasClass('hide-block')){ $('#app-progress-content').removeClass('hide-block'); }
  if(!$('#app-progress-content').hasClass('hide-block')){ $('#app-actual-content').addClass('hide-block'); }
  var count=1;
  var progress=false; /* true - 100 to 1 false - 1 to 100 */
  APPBODYCONTENT_PROGRESSBAR=setInterval(function(){ 
    var content='<div class="progress-bar ';
	     if(progressType==='info'){ content+='progress-bar-info '; }
	else if(progressType==='success'){ content+='progress-bar-success '; }
	else if(progressType==='warning'){ content+='progress-bar-warning '; }
	else if(progressType==='danger'){ content+='progress-bar-danger '; }
	    content+=' progress-bar-striped" ';
        content+='role="progressbar" aria-valuenow="'+count+'" ';
        content+='aria-valuemin="0" aria-valuemax="100" style="width:'+count+'%">';
        content+='<span class="sr-only">'+count+'% Complete</span>';
        content+='</div>';
    if(document.getElementById("appProgressDisplay") != null){
       document.getElementById("appProgressDisplay").innerHTML=content;
    }
    if(progress==false){ count++; }
    else {  count--; }
    if(count>1 && count>=100){ progress=true; }
    if(count==1) { progress=false; }
  }, 10);
}

function stopAppProgressLoader(){
 document.body.style.backgroundColor='#fff';
 if(!$('#app-progress-content').hasClass('hide-block')){ $('#app-progress-content').addClass('hide-block'); }
 if($('#app-progress-content').hasClass('hide-block')){ $('#app-actual-content').removeClass('hide-block'); }
 clearInterval(APPBODYCONTENT_PROGRESSBAR);
}
</script>
<div id="app-progress-content" class="hide-block">
	<div align="center" style="margin-top:60px;">
		<div align="center" style="margin-top:160px;">
			<div class="col-md-4 col-sm-3 col-xs-1"></div>
			<div class="col-md-4 col-sm-6 col-xs-10">
				<div style="margin-bottom:35px;">
				  <div id="appProgressDisplay" class="progress" style="height:5px;"></div>
				</div>
			</div>
			<div class="col-md-4 col-sm-3 col-xs-1"></div>
		</div>
	</div>
</div>