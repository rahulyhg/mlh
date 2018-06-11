<?php 
ini_set('display_errors', TRUE);
?>
<style>
@font-face { font-family: telugu;src: url('fonts/telugu_style01.ttf'); }
.lang_telugu { font-family: telugu;font-size:18px; }
body::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5; }         
body::-webkit-scrollbar { width: 6px;background-color: #F5F5F5; }        
body::-webkit-scrollbar-thumb { background-color: #000000; }
body { overflow-x:hidden; }
</style>
<script type="text/javascript">
/* Anchor Scrolling */
function core_anchorScrolling(){
  $("a").on('click', function(event) {
    if (this.hash !== "") { event.preventDefault(); var hash = this.hash;
	  $('html, body').animate({ scrollTop: $(hash).offset().top}, 100, function(){ window.location.hash = hash; });
    } 
  });
}
/* Select Option - Get Value By Text (Using ForLoop) */
function selectOpt_getValueByText(select_id,text){
var returnValue='';
 var selOpt=document.getElementById(select_id).options;
 for(var index=0;index<selOpt.length;index++){
   if(selOpt[index].text===text) {
     returnValue=selOpt[index].value;
   }
 }
 return returnValue;
}

/* TimeZones */
function get_stdDateTimeFormat01(ts_date){ 
/* Input : YYYY-MM-DD HH:ii:ss
 * OutputStandardFormat01 : Thursday, 26 February 2018 02:00 PM 
 */
var days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months=["January","February","March","April","May","June","July","August","September","October","November","December"];
 var d = new Date(ts_date);
 var day=days[d.getDay()];
 var date=d.getDate();
 var month=months[d.getMonth()];
 var year=d.getFullYear();
 var hours = d.getHours() > 12 ? d.getHours() - 12 : d.getHours();
 var am_pm = d.getHours() >= 12 ? "PM" : "AM";
 hours = hours < 10 ? "0" + hours : hours;
 var minutes = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
 var seconds = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
 return day+", "+date+" "+month+" "+year+" "+hours + ":"+minutes+" "+am_pm;
}

/* COLLECTIONS */
var arry_hm_key=[];
var arry_hm_value=[];
function js_setHashMap(key, value){
  /* Check Key and Value exists in Array */
  /* IF Exists */
  var already_exist_status=false;
  for(var index=0;index<arry_hm_key.length;index++){
    if(arry_hm_key[index]===key) { already_exist_status=true;arry_hm_value[index]=value;break; }
  }
  /* ELSE */
  if(!already_exist_status){ arry_hm_key[arry_hm_key.length]=key;arry_hm_value[arry_hm_value.length]=value; }
}
function js_getHashMap(key){
  var value='';
  for(var index=0;index<arry_hm_key.length;index++){
    if(arry_hm_key[index]===key) { value=arry_hm_value[index];break; }
  }
  return value;
}

function urlTransfer(url){
 window.location.href=url;
}
/* AJAX */
function js_ajax(method,url,data,fn_output){
 $.ajax({type: method, url: url,data:data,success: function(response) { fn_output(response); } }); 
}
/* SESSION MANAGEMENT */
/*
  { "session_set" : [ { "key" : "key-01" , "value" : "value-01" },
                      { "key" : "key-02" , "value" : "value-02" } ],
	"session_get" : [ "key-01", "key-02", "key-03" ]
  }
 */
function js_session(sessionJSON,fn_output) {
 var sessionData={action:'Session',SESSION_JSON: sessionJSON};
 js_ajax("GET",PROJECT_URL+'backend/php/dac/controller.session.php',sessionData,fn_output);
}
</script>