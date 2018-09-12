package anups.dun.web.templates;

public class URLGenerator {
 public static final String PROJECT_URL="http://192.168.1.4/mlh/android-web/";
 // public static final String PROJECT_URL="http://192.168.43.47/mlh/android-web/";
 public String defaultPage(){
	 return PROJECT_URL+"default.php";
 }
 
 public String latestNews(){
	 return PROJECT_URL+"newsfeed/latest-news"; 
 }
 
 public String ws_googleAds(){
	 StringBuilder stringBuilder = new StringBuilder(PROJECT_URL);
	 			   stringBuilder.append("backend/php/dac/controller.module.app.android.service.php");
	 			   stringBuilder.append("?action=SERVICE_GOOGLEADS");
	return stringBuilder.toString();
 }
 
 public String ws_intervalHour(String user_Id){
   StringBuilder stringBuilder=new StringBuilder(PROJECT_URL);
                 stringBuilder.append("backend/php/dac/controller.module.app.android.service.php");
                 stringBuilder.append("?action=SERVICE_INTERVALHOUR");
                 stringBuilder.append("&user_Id=").append(user_Id);
   return stringBuilder.toString();
 }
 
 public String ws_intervalMinute(){
   StringBuilder stringBuilder=new StringBuilder(PROJECT_URL);
	             stringBuilder.append("backend/php/dac/controller.module.app.android.service.php");      
   return stringBuilder.toString();
 }
 
 public String notified_frndRequestReceived(String req_Id){
  StringBuilder stringBuilder=new StringBuilder(PROJECT_URL); 
                stringBuilder.append("backend/php/dac/controller.module.app.user.notifications.php"); 
                stringBuilder.append("?action=NOTIFY_FRIENDREQUESTRECEIVED&req_Id=").append(req_Id);
  return stringBuilder.toString();          
 }
 
 public String[] ws_userFrndInfoDetails(String user_Id, String phoneNumbersList){
   String[] params = new String[2];
   params[0] = PROJECT_URL + "backend/php/dac/controller.module.app.android.service.php";
   params[1] = "action=SERVICE_USRDUMPFRNDS&user_Id="+user_Id+"&phoneNumbersList="+phoneNumbersList;
   return params;
 }
 
}