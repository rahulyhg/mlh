<?php
session_start();
/* Check Android Available or Not, 
   If Available -> Add Categories/ Subcategories from backend to SharedPreferences
   If NOT Available -> Add Categories/ Subcategories from backend to Cookies for 1 Month
 */
 echo file_get_contents($_SESSION["PROJECT_URL"]."/backend/config/english/domains/domain_list.json");
?>
<!--script type="text/javascript">
function setCookie(cname, cvalue, exdays) {
 var d = new Date();
     d.setTime(d.getTime() + (exdays*24*60*60*1000));
 var expires = "expires="+ d.toUTCString();
 document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
 var name = cname + "=";
 var decodedCookie = decodeURIComponent(document.cookie);
 var ca = decodedCookie.split(';');
 for(var i = 0; i <ca.length; i++) {
   var c = ca[i];
   while (c.charAt(0) == ' ') { c = c.substring(1); }
   if (c.indexOf(name) == 0) { return c.substring(name.length, c.length); }
 }
 return "";
}
if(Android===undefined){ /* Add to Cookies */
 js_ajax("",url,data,function());
} else { /* Add to SharedPreferences */

}
</script-->