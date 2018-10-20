var CURRENT_DARK_COLOR;
var CURRENT_LIGHT_COLOR;
function bgstyle(number) {
 //var number=Math.floor((Math.random()*3)+1);
      if(number===1){ bgstyle1(); } /* Yellow */ /* This works as an Interface */
 else if(number===2){ bgstyle2(); } /* Red */  /* This works as an Interface */
 else if(number===3){ bgstyle3(); } /* Blue */  /* This works as an Interface */
}
function bgstyle_bodyBgDark1(){
 $("body").css("background-color","#e88800");
}
function bgstyle_bodyBgLight1(){
 $("body").css("background-color","#ffc068");
}
function bgstyle_common1() {
 CURRENT_DARK_COLOR="#e88800";
 CURRENT_LIGHT_COLOR="#ffc068";
 $("#header_bot").css("background-color",CURRENT_DARK_COLOR);
 $(".custom-font").css("color",CURRENT_DARK_COLOR);
 
 $(".custom-breadcrumb>a").css("color",CURRENT_DARK_COLOR);
  
 $(".custom-bg,.btn-custom-bg,.slider-handle").css("background-color",CURRENT_DARK_COLOR);
 $(".custom-bg,.btn-custom-bg").css("color","#fff");
 $(".custom-bg,.btn-custom-bg").css("font-weight","bold");
 
 $(".custom-bg-solid1pxfullborder").css("border","1px solid #e88800");
 $(".custom-bg-solid1pxtopborder").css("border-top","1px solid #e88800");
 $(".custom-bg-solid1pxbottomborder").css("border-bottom","1px solid #e88800");
 
 $(".custom-bg-solid2pxfullborder").css("border","2px solid #e88800");
 $(".custom-bg-solid2pxtopborder").css("border-top","2px solid #e88800");
 $(".custom-bg-solid2pxbottomborder").css("border-bottom","2px solid #e88800");
 
 $("#sidebar-wrapper").css("background-color","#ffc068");
 
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("background-color","#ffc068");
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("color","#000");
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("font-weight","bold");
 
 $(".btn-custom-lgt-bg").css("font-size","11px");
 $(".btn-custom-lgt-bg").css("padding","10px");
 
 $(".custom-lgt-font").css("color","#ffc068");
 
 $(".custom-lgt-bg-solid1pxfullborder").css("border","1px solid #ffc068");
 $(".custom-lgt-bg-solid1pxtopborder").css("border-top","1px solid #ffc068");
 $(".custom-lgt-bg-solid1pxbottomborder").css("border-bottom","1px solid #ffc068");
 
 $('.slider-selection').addClass('custom-lgt-bg');
 $('.slider-selection').css('background',CURRENT_LIGHT_COLOR);
}
function bgstyle_applogo1(){
 document.getElementById("div_app_logo").innerHTML='<img src="'+PROJECT_URL+'images/logo-yellow-flat.jpg" class="dash_app_logo"/>';
}
function bgstyle_anuplogo1(){
 document.getElementById("div_anups_logo").innerHTML='<img class="anups-logo" src="'+PROJECT_URL+'images/anups-logo-yellow.jpg"/>';
}
function bgstyle_bodyBgDark2(){
 $("body").css("background-color","#e72e10");
}
function bgstyle_bodyBgLight2(){
 $("body").css("background-color","#ffb0a3");
}
function bgstyle_common2() {
 CURRENT_DARK_COLOR="#e72e10";
 CURRENT_LIGHT_COLOR="#ffb0a3";
 $("#header_bot").css("background-color","#e72e10");
 $(".custom-font").css("color","#e72e10");
 
 $(".custom-breadcrumb>a").css("color",CURRENT_DARK_COLOR);
 
 $(".custom-bg,.btn-custom-bg,.slider-handle").css("background-color","#e72e10");
 $(".custom-bg,.btn-custom-bg").css("color","#fff");
  $(".custom-bg,.btn-custom-bg").css("font-weight","bold");
  
 $(".custom-bg-solid1pxfullborder").css("border","1px solid #e72e10");
 $(".custom-bg-solid1pxtopborder").css("border-top","1px solid #e72e10");
 $(".custom-bg-solid1pxbottomborder").css("border-bottom","1px solid #e72e10");
 
 $(".custom-bg-solid2pxfullborder").css("border","2px solid #e72e10");
 $(".custom-bg-solid2pxtopborder").css("border-top","2px solid #e72e10");
 $(".custom-bg-solid2pxbottomborder").css("border-bottom","2px solid #e72e10");
 
 $("#sidebar-wrapper").css("background-color","#ffb0a3");
 
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("background-color","#ffb0a3");
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("color","#000");
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("font-weight","bold");
 
 $(".btn-custom-lgt-bg").css("font-size","11px");
 $(".btn-custom-lgt-bg").css("padding","10px");
 
 $(".custom-lgt-font").css("color","#ffb0a3");	
 
 $(".custom-lgt-bg-solid1pxfullborder").css("border","1px solid #ffb0a3");
 $(".custom-lgt-bg-solid1pxtopborder").css("border-top","1px solid #ffb0a3");
 $(".custom-lgt-bg-solid1pxbottomborder").css("border-bottom","1px solid #ffb0a3");
 
 $('.slider-selection').addClass('custom-lgt-bg');
 $('.slider-selection').css('background',CURRENT_LIGHT_COLOR);
}
function bgstyle_applogo2(){
 document.getElementById("div_app_logo").innerHTML='<img src="'+PROJECT_URL+'images/logo-orange-flat.jpg" class="dash_app_logo"/>';
}
function bgstyle_anuplogo2(){
 document.getElementById("div_anups_logo").innerHTML='<img class="anups-logo" src="'+PROJECT_URL+'images/anups-logo-orange.jpg"/>';
}
function bgstyle_bodyBgDark3(){
 $("body").css("background-color","#0ba0da");
}
function bgstyle_bodyBgLight3(){
 $("body").css("background-color","#aad9ff");
}
function bgstyle_common3() {
 CURRENT_DARK_COLOR="#0ba0da";
 CURRENT_LIGHT_COLOR="#aad9ff";
 $("#header_bot").css("background-color","#0ba0da");
 $(".custom-font").css("color","#0ba0da");
 $(".custom-breadcrumb>a").css("color",CURRENT_DARK_COLOR);
 
 $(".custom-bg,.btn-custom-bg,.slider-handle").css("background-color","#0ba0da");
 $(".custom-bg,.btn-custom-bg").css("color","#fff");
 $(".custom-bg,.btn-custom-bg").css("font-weight","bold");
  
 $(".custom-bg-solid1pxfullborder").css("border","1px solid #0ba0da");
 $(".custom-bg-solid1pxtopborder").css("border-top","1px solid #0ba0da");
 $(".custom-bg-solid1pxbottomborder").css("border-bottom","1px solid #0ba0da");
 
 $(".custom-bg-solid2pxfullborder").css("border","2px solid #0ba0da");
 $(".custom-bg-solid2pxtopborder").css("border-top","2px solid #0ba0da");
 $(".custom-bg-solid2pxbottomborder").css("border-bottom","2px solid #0ba0da");
 
 $("#sidebar-wrapper").css("background-color","#aad9ff");
 
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("background-color","#aad9ff");
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("color","#000");
 $(".custom-lgt-bg,.btn-custom-lgt-bg").css("font-weight","bold");
 
 $(".btn-custom-lgt-bg").css("font-size","11px");
 $(".btn-custom-lgt-bg").css("padding","10px");
 
 $(".custom-lgt-font").css("color","#aad9ff");
 $(".custom-lgt-bg-solid1pxfullborder").css("border","1px solid #aad9ff");
 $(".custom-lgt-bg-solid1pxtopborder").css("border-top","1px solid #aad9ff");
 $(".custom-lgt-bg-solid1pxbottomborder").css("border-bottom","1px solid #aad9ff");
 
 $('.slider-selection').addClass('custom-lgt-bg');
 $('.slider-selection').css('background',CURRENT_LIGHT_COLOR);
}
function bgstyle_applogo3(){
 document.getElementById("div_app_logo").innerHTML='<img src="'+PROJECT_URL+'images/logo-blue-flat.jpg" class="dash_app_logo"/>';
}
function bgstyle_anuplogo3(){
 document.getElementById("div_anups_logo").innerHTML='<img class="anups-logo" src="'+PROJECT_URL+'images/anups-logo-blue.jpg"/>';
}