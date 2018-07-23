var AndroidSQLiteUsrFrndsInfo;
$(document).ready(function(){
 bgstyle();
 $(".lang_"+USR_LANG).css('display','block');
 var jsonData = AndroidSQLiteUsrFrndsInfo.data_get_UsrFrndsContact('0', AndroidSQLiteUsrFrndsInfo.data_count_UsrFrndsContact());
 alert(jsonData);
});
