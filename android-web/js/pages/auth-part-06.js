$(document).ready(function(){
 bgstyle(3);
 $(".lang_"+USR_LANG).css('display','block');
 getListOfCategories('categories-list',AUTH_USER_ID,'UPDATE');
});