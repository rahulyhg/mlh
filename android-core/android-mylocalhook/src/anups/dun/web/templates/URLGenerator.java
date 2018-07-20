package anups.dun.web.templates;

public class URLGenerator {
 public static final String PROJECT_URL="http://192.168.43.47/mlh/android-web/";
 
 public String defaultPage(){
	 return PROJECT_URL+"default.php";
 }
 
 public String ws_googleAds(){
	 StringBuilder stringBuilder = new StringBuilder(PROJECT_URL);
	 			   stringBuilder.append("backend/php/dac/controller.module.app.notifications.php");
	 			   stringBuilder.append("?action=SERVICE_GOOGLEADS");
	return stringBuilder.toString();
 }
 
 public String ws_intervalHour(String user_Id){
   StringBuilder stringBuilder=new StringBuilder(PROJECT_URL);
                 stringBuilder.append("backend/php/dac/controller.module.app.notifications.php");
                 stringBuilder.append("?action=SERVICE_INTERVALHOUR");
                 stringBuilder.append("&user_Id=").append(user_Id);
   return stringBuilder.toString();
 }
 
 public String ws_intervalMinute(String user_Id, String gps_latitude, String gps_longitude){
   StringBuilder stringBuilder=new StringBuilder(PROJECT_URL);
	             stringBuilder.append("backend/php/dac/controller.module.app.notifications.php");
	             stringBuilder.append("?action=SERVICE_INTERVALMINUTE");
	             stringBuilder.append("&user_Id=").append(user_Id);
	             stringBuilder.append("&gps_latitude=").append(gps_latitude);
	             stringBuilder.append("&gps_longitude=").append(gps_longitude);
   return stringBuilder.toString();
 }
}