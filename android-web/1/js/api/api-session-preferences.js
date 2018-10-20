var AndroidSession;
function setCookie(cname, cvalue) {
 if(AndroidSession===undefined){
	var d = new Date();
		d.setTime(d.getTime() + (1*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
 } else {
    AndroidSession.setAndroidSession(cname, cvalue);
 }
}
function getCookie(cname) {
var cvalue='';
if(AndroidSession===undefined){
 var name = cname + "=";
 var decodedCookie = decodeURIComponent(document.cookie);
 var ca = decodedCookie.split(';');
 for(var i = 0; i <ca.length; i++) {
   var c = ca[i];
   while (c.charAt(0) == ' ') { c = c.substring(1); }
   if (c.indexOf(name) == 0) { cvalue= c.substring(name.length, c.length); }
 }
 } else {
   cvalue=AndroidSession.getAndroidSession(cname);
 }
 return cvalue;
}