var STANDARDHOOKFORM_GENERAL_RECOGNIZER=true;
var STANDARDHOOKFORM_MEDIA_RECOGNIZER=false;
var STANDARDHOOKFORM_POLLS_RECOGNIZER=false;
var STANDARDHOOKFORM_PEOPLE_RECOGNIZER=false;
var STANDARDHOOKFORM_FINISH_RECOGNIZER=false;

var STANDARDHOOKFORM_TITLEHOOK; // Mandatory
var STANDARDHOOKFORM_HOOKDESC;  // Mandatory
var STANDARDHOOKFORM_MEDIAIMG;
var STANDARDHOOKFORM_ASKQUESTION;
var STANDARDHOOKFORM_POLLTYPE;
var STANDARDHOOKFORM_OPTIONSIZE;
var STANDARDHOOKFORM_PEOPLECHOOSE; // Mandatory
var STANDARDHOOKFORM_PEOPLE=[]; // Mandatory : If User chooses selected Friends
/*****************************************************************************************************************************/
/**************************************************  STANDARD HOOK FORM ******************************************************/
/*****************************************************************************************************************************/
/* StandardHookForm - Menu */
function selhook_pillTabs(id){  
var arry_title=["hookpillTabs-general","hookpillTabs-media","hookpillTabs-polls","hookpillTabs-people","hookpillTabs-finish"];
var arry_content=["stndHook-content-general","stndHook-content-media","stndHook-content-polls","stndHook-content-people","stndHook-content-finish"];
for(var index=0;index<arry_title.length;index++){
 if(arry_title[index]===id){ 
  if(!$('#'+arry_title[index]).hasClass('pill-sp-active')){ $('#'+arry_title[index]).addClass('pill-sp-active'); }
  if($('#'+arry_title[index]).hasClass('pill-sp')){ $('#'+arry_title[index]).removeClass('pill-sp'); }
   document.getElementById(arry_content[index]).style.display='block';
 } else { 
   if($('#'+arry_title[index]).hasClass('pill-sp-active')){ $('#'+arry_title[index]).removeClass('pill-sp-active'); }
   if(!$('#'+arry_title[index]).hasClass('pill-sp')){ $('#'+arry_title[index]).addClass('pill-sp'); }
   document.getElementById(arry_content[index]).style.display='none';
  }
 }
}
/* StandardHookForm - Alerts */
function set_StandardHookForm_alert(id, param){
if(param==='hide'){ if(!$('#'+id).hasClass('hide-block')){ $('#'+id).addClass('hide-block ');  } } 
else { if($('#'+id).hasClass('hide-block')){ $('#'+id).removeClass('hide-block');  } }
}

/* StandardHookForm - Enable Tabs */
/* General: */
function enabled_standardHookForm_tabs_general(id){
if(STANDARDHOOKFORM_GENERAL_RECOGNIZER){ selhook_pillTabs("hookpillTabs-general"); }
}
/* Media: */
function enabled_standardHookForm_tabs_media(id){
if(STANDARDHOOKFORM_GENERAL_RECOGNIZER && STANDARDHOOKFORM_MEDIA_RECOGNIZER){ 
   selhook_pillTabs("hookpillTabs-media"); 
}
}
/* Polls: */
function enabled_standardHookForm_tabs_polls(id){
if(STANDARDHOOKFORM_GENERAL_RECOGNIZER && STANDARDHOOKFORM_MEDIA_RECOGNIZER && STANDARDHOOKFORM_POLLS_RECOGNIZER){ 
  selhook_pillTabs("hookpillTabs-polls"); 
}
}
/* People: */
function enabled_standardHookForm_tabs_people(id){
 if(STANDARDHOOKFORM_GENERAL_RECOGNIZER && STANDARDHOOKFORM_MEDIA_RECOGNIZER 
   && STANDARDHOOKFORM_POLLS_RECOGNIZER && STANDARDHOOKFORM_PEOPLE_RECOGNIZER){ 
   selhook_pillTabs("hookpillTabs-people"); 
 }
}
/* Finish: */
function enabled_standardHookForm_tabs_finish(id){
 if(STANDARDHOOKFORM_GENERAL_RECOGNIZER && STANDARDHOOKFORM_MEDIA_RECOGNIZER 
   && STANDARDHOOKFORM_POLLS_RECOGNIZER && STANDARDHOOKFORM_PEOPLE_RECOGNIZER
   && STANDARDHOOKFORM_FINISH_RECOGNIZER){ 
   selhook_pillTabs("hookpillTabs-finish"); 
 }
}
/*****************************************************************************************************************************/
/***************************************  STANDARD HOOK FORM - GENERAL *******************************************************/
/*****************************************************************************************************************************/
/* StandardHookForm - General */
function stndHookForm_general_viewAlert(alert_id,alertDesc_Id,param){
 var alert_List=["stndHook-"+USR_LANG+"-alert-hookTitle","stndHook-"+USR_LANG+"-alert-hookDesc"];
 for(var index=0;index<alert_List.length;index++){
  if(alert_List[index]===alertDesc_Id){
    if($('#'+alert_List[index]).hasClass('hide-block')){ $('#'+alert_List[index]).removeClass('hide-block'); }
  } else {
    if(!$('#'+alert_List[index]).hasClass('hide-block')){ $('#'+alert_List[index]).addClass('hide-block'); }
  }
 }
 set_StandardHookForm_alert(alert_id, param); 
}

function store_StandardHookForm_general(){ /* Validations: Allow Next after valid Only */
STANDARDHOOKFORM_TITLEHOOK=document.getElementById("standardHookForm_titleHook").value;
STANDARDHOOKFORM_HOOKDESC=document.getElementById("standardHookForm_hookdesc").value;
 if(STANDARDHOOKFORM_TITLEHOOK.length>0){
 if(STANDARDHOOKFORM_HOOKDESC.length>0){
  STANDARDHOOKFORM_MEDIA_RECOGNIZER=true;
  enabled_standardHookForm_tabs_media("hookpillTabs-media");
 } else { stndHookForm_general_viewAlert('stndHook-alert-general','stndHook-'+USR_LANG+'-alert-hookDesc','show'); }
 } else { stndHookForm_general_viewAlert('stndHook-alert-general','stndHook-'+USR_LANG+'-alert-hookTitle','show'); }
}

function store_StandardHookForm_reset(){
document.getElementById("standardHookForm_titleHook").value='';
document.getElementById("standardHookForm_hookdesc").value='';
}
/*****************************************************************************************************************************/
/***************************************  STANDARD HOOK FORM - MEDIA *********************************************************/
/*****************************************************************************************************************************/
/* StandardHookForm - Media */
function store_StandardHookForm_media(){ /* Validations: Allow Next after valid Only */
STANDARDHOOKFORM_MEDIAIMG=IMG_URL;
STANDARDHOOKFORM_POLLS_RECOGNIZER=true;
enabled_standardHookForm_tabs_polls("hookpillTabs-polls");
}

function store_StandardHookForm_mediaSkip(){
IMG_URL='';
fu_reload();
STANDARDHOOKFORM_POLLS_RECOGNIZER=true;
enabled_standardHookForm_tabs_polls("hookpillTabs-polls");
}
/*****************************************************************************************************************************/
/****************************************  STANDARD HOOK FORM - POLLS ********************************************************/
/*****************************************************************************************************************************/
/* StandardHookForm - Polls */
function set_stndHookForm_polltype(){  
 if($('#standardHookForm_polltype').prop('checked')){  // PollType : One Option
   STANDARDHOOKFORM_POLLTYPE='ONE_OPTION';
 } else { // PollType : Many
   STANDARDHOOKFORM_POLLTYPE='MANY_OPTION';
 }
}
function set_stndHookForm_pollOptExtension(){
var lastInput=document.getElementById("stndHook-div-polloptions").getElementsByTagName("li").length+1;
console.log(lastInput);
var newElement='<input type="text" class="form-control" placeholder="option-'+lastInput+'"/>';
$('#stndHook-div-polloptions').append($('<li>').html(newElement));
}

function store_StandardHookForm_pollnext(){ /* Validations: Allow Next after valid Only */
STANDARDHOOKFORM_ASKQUESTION=document.getElementById("standardHookForm_askQuestion").value;
if(STANDARDHOOKFORM_ASKQUESTION.length>0){
  var total_options=document.getElementById("stndHook-div-polloptions").getElementsByTagName("li").length;
  for(var index=0;index<total_options.length;index++){

 }
}
STANDARDHOOKFORM_PEOPLE_RECOGNIZER=true;
enabled_standardHookForm_tabs_people("hookpillTabs-people");
}

function store_StandardHookForm_pollskip(){

}
/*****************************************************************************************************************************/
/****************************************  STANDARD HOOK FORM - PEOPLE *******************************************************/
/*****************************************************************************************************************************/
/* StandardHookForm - People */
var STANDARDHOOKFORM_FRNDSINFO=true; // Default : Choose All Friends
function set_stndHookForm_frndTagInfo(){
 STANDARDHOOKFORM_FRNDSINFO=$('#standardHookForm-frndsInfo').prop('checked');
 if(!STANDARDHOOKFORM_FRNDSINFO){
   if($("#stndHook-FrndtagDivision").hasClass('hide-block')){ $("#stndHook-FrndtagDivision").removeClass('hide-block'); }
   
 } else {
    if(!$("#stndHook-FrndtagDivision").hasClass('hide-block')){ $("#stndHook-FrndtagDivision").addClass('hide-block'); }
	
 }
}

function store_StandardHookForm_peopleNext(){ /* Validations: Allow Next after valid Only */
STANDARDHOOKFORM_FINISH_RECOGNIZER=true;
enabled_standardHookForm_tabs_finish("hookpillTabs-finish");
}

function store_StandardHookForm_peopleReset(){

}
/*****************************************************************************************************************************/
/****************************************  STANDARD HOOK FORM - FINISH *******************************************************/
/*****************************************************************************************************************************/
/* StandardHookForm - Finish */
function store_StandardHookForm(){
 console.log("STANDARDHOOKFORM_FRNDSINFO: "+STANDARDHOOKFORM_FRNDSINFO);
}