package anups.dun.web.templates;

import android.content.Context;
import anups.dun.js.AppSessionManagement;

public class URLGenerator {
 public AppSessionManagement appSessionManagement;
 public String PROJECT_URL;

 public URLGenerator(Context context){
	 appSessionManagement =new AppSessionManagement(context);
	 PROJECT_URL= (String) appSessionManagement.getAndroidSession("PROPERTY_PROJECT_URL");
 }
 public String defaultPage(){
	 return PROJECT_URL+"default.php";
 }
 
 public String latestNews(String projectURL){
	 return projectURL+"newsfeed/latest-news"; 
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
 
 public String notified_frndRequestAccepted(String rel_Id){
	  StringBuilder stringBuilder=new StringBuilder(PROJECT_URL); 
	                stringBuilder.append("backend/php/dac/controller.module.app.user.notifications.php"); 
	                stringBuilder.append("?action=NOTIFY_FRIENDREQUESTACCEPTED&rel_Id=").append(rel_Id);
	  return stringBuilder.toString();          
	 }
 
 public String[] ws_userFrndInfoDetails(String user_Id, String phoneNumbersList){
   String[] params = new String[2];
   params[0] = PROJECT_URL + "backend/php/dac/controller.module.app.android.service.php";
   params[1] = "action=SERVICE_USRDUMPFRNDS&user_Id="+user_Id+"&phoneNumbersList="+phoneNumbersList;
   return params;
 }
 
}