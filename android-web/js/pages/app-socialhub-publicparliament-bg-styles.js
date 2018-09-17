function bgstyle1(){
 bgstyle_common1();
 bgstyle_appsocialhublogo1();
}
function bgstyle2(){
 bgstyle_common2();
 bgstyle_appsocialhublogo2();
}
function bgstyle3(){
 bgstyle_common3();
 bgstyle_appsocialhublogo3();
}

function bgstyle_appsocialhublogo1(){
 var content='<img src="'+PROJECT_URL+'images/logo-yellow-flat.jpg" class="dash_app_logo" style="float:left;"/>';
     content+='<div style="margin-top:5px;background-color:#fff;color:'+CURRENT_DARK_COLOR+';font-size:14px;';
	 content+='padding-top:2px;padding-bottom:2px;padding-right:10px;padding-left:10px;float:left;border-radius:6px;">';
     content+='<span style="font-family:\'mlhfont002\';">Public</span>&nbsp;';
     content+='<span style="font-family:\'mlhfont001\';">Parliament</span>';
	 content+='<div>';
 document.getElementById("div_app_logo").innerHTML=content;
}

function bgstyle_appsocialhublogo2(){
 var content='<img src="'+PROJECT_URL+'images/logo-orange-flat.jpg" class="dash_app_logo" style="float:left;"/>';
     content+='<div style="margin-top:5px;background-color:#fff;color:'+CURRENT_DARK_COLOR+';font-size:14px;';
	 content+='padding-top:2px;padding-bottom:2px;padding-right:10px;padding-left:10px;float:left;border-radius:6px;">';
     content+='<span style="font-family:\'mlhfont002\';letter-spacing:1px;">Public</span>&nbsp;';
     content+='<span style="font-family:\'mlhfont001\';letter-spacing:1px;">Parliament</span>';
	 content+='<div>';
 document.getElementById("div_app_logo").innerHTML=content;
}

function bgstyle_appsocialhublogo3(){
 var content='<img src="'+PROJECT_URL+'images/logo-blue-flat.jpg" class="dash_app_logo" style="float:left;"/>';
	 content+='<div style="margin-top:5px;background-color:#fff;color:'+CURRENT_DARK_COLOR+';font-size:14px;';
	 content+='padding-top:2px;padding-bottom:2px;padding-right:10px;padding-left:10px;float:left;border-radius:6px;">';
     content+='<span style="font-family:\'mlhfont002\';">Public</span>&nbsp;';
     content+='<span style="font-family:\'mlhfont001\';">Parliament</span>';
	 content+='<div>';
 document.getElementById("div_app_logo").innerHTML=content;
}


