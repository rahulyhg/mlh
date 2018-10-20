
var TOTAL_PUBLIC_NEWSFEED;
var TOTAL_FAV_NEWSFEED;
function getPublicNewsFeedByUnionId(){
 setTimeout(function(){
	$.ajax({type: "GET", url: PROJECT_URL+'backend/php/dac/controller.newsfeed.php', 
			  data:{ action:'PUBLIC_USERFAV_NEWSFEED_COUNT' }, 
			  success: function(totalData) {  
			  console.log(totalData);
			    totalData=JSON.parse(totalData);
			    TOTAL_PUBLIC_NEWSFEED=totalData.total_public_newsFeed;
				TOTAL_FAV_NEWSFEED=totalData.total_fav_newsFeed; 
				console.log("[function:getPublicNewsFeedByUnionId] TOTAL_PUBLIC_NEWSFEED: "+TOTAL_PUBLIC_NEWSFEED);
				console.log("[function:getPublicNewsFeedByUnionId] TOTAL_FAV_NEWSFEED: "+TOTAL_FAV_NEWSFEED);
				document.getElementById("newssource_count").innerHTML='('+TOTAL_PUBLIC_NEWSFEED+')';
				document.getElementById("newsfav_count").innerHTML='('+TOTAL_FAV_NEWSFEED+')';
				sel_newsfeed_content("nf-head-source");
			}});
  },1);
}

function sel_newsfeed_header(id) {
  var arry_nf_hd=["nf-head-source","nf-head-fav"];
  for(var index=0;index<arry_nf_hd.length;index++){
   if(arry_nf_hd[index]===id){ 
       $("#"+arry_nf_hd[index]).css('border','1px solid '+CURRENT_DARK_COLOR);
       $("#"+arry_nf_hd[index]).css('background-color',CURRENT_DARK_COLOR);
	   $("#"+arry_nf_hd[index]).css('color','#fff');
	   $("#"+arry_nf_hd[index]).removeClass('custom-lgt-bg custom-lgt-bg-solid1pxfullborder');
       $("#"+arry_nf_hd[index]).addClass('custom-bg white-font custom-bg-solid1pxfullborder'); 	   
   }
   else { 
      $("#"+arry_nf_hd[index]).css('border','1px solid '+CURRENT_LIGHT_COLOR);
      $("#"+arry_nf_hd[index]).css('background-color',CURRENT_LIGHT_COLOR);
	  $("#"+arry_nf_hd[index]).css('color','#000');
	  $("#"+arry_nf_hd[index]).addClass('custom-lgt-bg custom-lgt-bg-solid1pxfullborder'); 
      $("#"+arry_nf_hd[index]).removeClass('custom-bg white-font custom-bg-solid1pxfullborder'); 
   }
 }
}

function sel_newsfeed_content(id){
 sel_newsfeed_header(id);
 var arry_display=["publicNewsFeedlist0","userFavNewsFeedlist0","searchNewsFeedlist0"];
 var display_panel='';
 if(id==="nf-head-source"){  
 display_panel='publicNewsFeedlist0';
 scroll_loadInitializer('publicNewsFeedlist',10,getPublicNewsFeedBySource_data,TOTAL_PUBLIC_NEWSFEED);
 }
 else if(id==="nf-head-fav"){
 display_panel='userFavNewsFeedlist0'; 
 // scroll_loadInitializer('userFavNewsFeedlist',10,getPublicNewsFeedByFav_data,TOTAL_FAV_NEWSFEED); 
 }
 
 for(var index=0;index<arry_display.length;index++){
   if(arry_display[index]===display_panel){
     if($("#"+arry_display[index]).hasClass('hide-block')){ $("#"+arry_display[index]).removeClass('hide-block'); }
   } else {
     if(!$("#"+arry_display[index]).hasClass('hide-block')){ $("#"+arry_display[index]).addClass('hide-block'); }
   }
 }
 
}

function getPublicNewsFeedByFav_data(div_view, appendContent,limit_start,limit_end) {
  /*  */
setTimeout(function(){
$.ajax({type: "GET", url: PROJECT_URL+'backend/php/dac/controller.newsfeed.php', 
data:{action:'USER_FAV_NEWSFEED', limit_start:limit_start, limit_end:limit_end }, 
success: function(resp) { console.log(resp);resp=JSON.parse(resp);
var content='';
if(resp.FavUnionNewsFeed.length===0 && resp.FavBizNewsFeed.length===0){
  content+='<div align="center"><span style="color:#aaa;">You don\'t have any more Newsfeed.</span></div>';
} 
else { 
for(var index=0;index<resp.FavUnionNewsFeed.length;index++){
var info_Id=resp.FavUnionNewsFeed[index].info_Id; // info_Id
var union_Id=resp.FavUnionNewsFeed[index].union_Id; // union_Id
var artTitle=resp.FavUnionNewsFeed[index].artTitle; // artTitle
var artShrtDesc=resp.FavUnionNewsFeed[index].artShrtDesc; // artShrtDesc
var artDesc=resp.FavUnionNewsFeed[index].artDesc; // artDesc
var createdOn=resp.FavUnionNewsFeed[index].createdOn; // createdOn
var path_Id=resp.FavUnionNewsFeed[index].path_Id; // path_Id
var images=resp.FavUnionNewsFeed[index].images; // images
var votes_up=resp.FavUnionNewsFeed[index].votes_up; // votes_up
var votes_down=resp.FavUnionNewsFeed[index].votes_down; // votes_down
var status=resp.FavUnionNewsFeed[index].status; // status
var viewed=resp.FavUnionNewsFeed[index].viewed; // viewed
content+='<a href="'+PROJECT_URL+'app/newsfeed/'+info_Id+'" class="newsfeed-content">';
content+='<div class="col-xs-12 col-md-3">';
content+='<div class="news">';
content+='<div class="news-container container-fluid padtop15px">';
content+='<div class="col-xs-12 border1black mbot15p">';
content+='<span class="label label-newsfeed custom-bg" ';
content+='style="background-color:'+CURRENT_DARK_COLOR+';">'+unionName.toUpperCase()+'</span>';
content+='</div>';
content+='<img align="center" class="col-xs-12 mbot10p h200p"';
content+='src="'+images+'"/>';
content+='<div class="col-xs-12">';
content+='<span class="postedBy">By '+unionName.toUpperCase()+'</span>';
content+='</div>';
content+='<div align="center" class="col-xs-12 title">';
content+='<h5><b>'+artTitle+'</b></h5>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</a>';
}

for(var index=0;index<resp.FavBizNewsFeed.length;index++){
var info_Id=resp.FavBizNewsFeed[index].info_Id; // info_Id
var domain_Id=resp.FavBizNewsFeed[index].domain_Id; // domain_Id
var subdomain_Id=resp.FavBizNewsFeed[index].subdomain_Id; // subdomain_Id
var biz_Id=resp.FavBizNewsFeed[index].biz_Id; // biz_Id
var artTitle=resp.FavBizNewsFeed[index].artTitle; // artTitle
var artShrtDesc=resp.FavBizNewsFeed[index].artShrtDesc; // artShrtDesc
var artDesc=resp.FavBizNewsFeed[index].artDesc; // artDesc
var createdOn=resp.FavBizNewsFeed[index].createdOn; // createdOn            
var path_Id=resp.FavBizNewsFeed[index].path_Id; // path_Id       
var images=resp.FavBizNewsFeed[index].images; // images
var votes_up=resp.FavBizNewsFeed[index].votes_up; // votes_up
var votes_down=resp.FavBizNewsFeed[index].votes_down; // votes_down
var status=resp.FavBizNewsFeed[index].status; // status
var viewed=resp.FavBizNewsFeed[index].viewed; // viewed
var minlocation=resp.FavBizNewsFeed[index].minlocation; // minlocation
var location=resp.FavBizNewsFeed[index].location; // location
var state=resp.FavBizNewsFeed[index].state; // state
var country=resp.FavBizNewsFeed[index].country; // country
content+='<a href="'+PROJECT_URL+'app/newsfeed/'+info_Id+'" class="newsfeed-content">';
content+='<div class="col-xs-12 col-md-3">';
content+='<div class="news">';
content+='<div class="news-container container-fluid padtop15px">';
content+='<div class="col-xs-12 border1black mbot15p">';
content+='<span class="label label-newsfeed custom-bg" ';
content+='style="background-color:'+CURRENT_DARK_COLOR+';">'+unionName.toUpperCase()+'</span>';
content+='</div>';
content+='<img align="center" class="col-xs-12 mbot10p h200p"';
content+='src="'+images+'"/>';
content+='<div class="col-xs-12">';
content+='<span class="postedBy">By '+unionName.toUpperCase()+'</span>';
content+='</div>';
content+='<div align="center" class="col-xs-12 title">';
content+='<h5><b>'+artTitle+'</b></h5>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</div>';
content+='</a>';
}  
content+=appendContent;
}
document.getElementById(div_view).innerHTML=content; 
} });
},1);

}

