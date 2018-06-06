package anups.dun.web.templates;

public class URLGenerator {
 public static final String PROJECT_URL="http://192.168.1.4/mlh/android-web/";
 
 public String defaultPage(){
	 return PROJECT_URL+"default.php";
 }
 
 public String webservice_notify_appServices(String user_Id){
   StringBuilder stringBuilder=new StringBuilder(PROJECT_URL);
                 stringBuilder.append("backend/php/dac/controller.page.app.notifications.php");
                 stringBuilder.append("?action=NOTIFICATION_APPSERVICE");
                 stringBuilder.append("&user_Id=").append(user_Id);
   return stringBuilder.toString();
 }
 
}