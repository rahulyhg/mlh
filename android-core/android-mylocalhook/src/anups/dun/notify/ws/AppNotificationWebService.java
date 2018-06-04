package anups.dun.notify.ws;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.content.Context;
import android.os.AsyncTask;
import android.os.Looper;
import anups.dun.constants.NotificationIdentity;
import anups.dun.js.AppManagement;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PushNotification;
import anups.dun.web.templates.URLGenerator;

public class AppNotificationWebService  extends AsyncTask<String, String, String> {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppNotificationWebService.class);
 Context context;
 public AppNotificationWebService(Context context){ this.context=context; }
 private final static String USER_AGENT = "Mozilla/5.0";
 
 @Override
 protected String doInBackground(String... params) {
  logger.info("doInBackground begins in AppNotificationWebService");
  logger.info("URL Recieved: "+params[0]);
  StringBuilder response = new StringBuilder();
  try {
	  
	 URL obj = new URL(params[0]);
	  HttpURLConnection con = (HttpURLConnection)obj.openConnection();
	                     con.setRequestMethod("GET");
	                     con.setRequestProperty("User-Agent", USER_AGENT);
	  BufferedReader in = new BufferedReader(new InputStreamReader(con.getInputStream()));
	 
	  for(String inputLine;(inputLine = in.readLine()) != null;) {
	    response.append(inputLine);
	  } 
	  in.close();
   } catch(Exception e){ logger.error("Exception AppNotificationWebService: "+e.getMessage()); }
	return response.toString();
 }
 
 @Override  
 protected void onPostExecute(String response) {
   logger.info("Response Recieved: "+response);
	 /* peopleRelationshipRequestData */
   try {
	 JSONParser jsonParser = new JSONParser();
	 JSONObject jsonObject = (JSONObject)jsonParser.parse(response.toString());
	 String playStoreAppVersion=(String) jsonObject.get("playStoreAppVersion");
	 
	 /* PlayStoreVersionCheck */
	 String status=new AppManagement(context).checkPlayStoreUpdate(playStoreAppVersion);
	 logger.info("App Status: "+status);
	 
	 if(status.equalsIgnoreCase("APP_TO_UPDATE")){  // APP_TO_UPDATE
		 String directURL="market://details?id=anups.dun.app";
		 boolean inapp=false;
		 String contentTitle="New Version Available";
		 String bigContentTitle="New Version Available"; // Big Title Details:
		 String contentText="You are using old Version"; // You have recieved new message
		 String ticker="New Version Available"; // New Message Alert!
		 	
		 String[] events = new String[3];
		 	     events[0] = new String("You are using old Version");
		 	     events[1] = new String("New Version is in Playstore");
		 	     events[2] = new String("Upgrade your App Now!");
		 new PushNotification().display_unclosableNotification(NotificationIdentity.UNCLOSEDNOTIFICATION_VERSIONUPGRADE,
		 		context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
	 }
	 
	 JSONArray jsonObjectArry = (JSONArray)jsonObject.get("peopleRelationshipRequestData");
	 logger.info("peopleRelationshipRequestData Size: "+jsonObjectArry.size());
	 for(int index=0;index<jsonObjectArry.size();index++) {
		 JSONObject jobj=(JSONObject) jsonParser.parse(jsonObjectArry.get(index).toString());
	     String notify_Id=(String) jobj.get("notify_Id");
	     String from_Id=(String) jobj.get("from_Id");
	     String notifyHeader=(String) jobj.get("notifyHeader");
	     String notifyMsg=(String) jobj.get("notifyMsg");
	     String notifyTitle=(String) jobj.get("notifyTitle");
	     String notifyURL=(String) jobj.get("notifyURL");
	     String notify_ts=(String) jobj.get("notify_ts");
	     String watched=(String) jobj.get("watched");
	     String surName=(String) jobj.get("surName");
	     String name=(String) jobj.get("name");
	     String profile_pic=(String) jobj.get("profile_pic");
	     logger.info("peopleRelationshipRequestData [notify_Id]: "+notify_Id);
	     logger.info("peopleRelationshipRequestData [from_Id]: "+from_Id);
	     logger.info("peopleRelationshipRequestData [notifyHeader]: "+notifyHeader);
	     logger.info("peopleRelationshipRequestData [notifyMsg]: "+notifyMsg);
	     logger.info("peopleRelationshipRequestData [notifyTitle]: "+notifyTitle);
	     logger.info("peopleRelationshipRequestData [notifyURL]: "+notifyURL);
	     logger.info("peopleRelationshipRequestData [notify_ts]: "+notify_ts);
	     logger.info("peopleRelationshipRequestData [watched]: "+watched);
	     logger.info("peopleRelationshipRequestData [surName]: "+surName);
	     logger.info("peopleRelationshipRequestData [name]: "+name);
	     logger.info("peopleRelationshipRequestData [profile_pic]: "+profile_pic);
		 boolean inapp=true;
		 String contentTitle="You recieved 1 Friendship Request";
			String bigContentTitle="You recieved 1 Friendship Request"; // Big Title Details:
			String contentText=surName+" "+name+" sent you Friendship Request"; // You have recieved new message
			String ticker="New Friendship Request"; // New Message Alert!
			String[] events = new String[1];
				     events[0] = new String(surName+" "+name+" sent you Friendship Request");
		 new PushNotification().display_closableNotification(context, notifyURL, inapp,
			 contentTitle, bigContentTitle,  contentText, ticker, events);
	 }
   } catch(Exception e){ logger.error("Exception onPostExecute: "+e.getMessage()); }

 }
}
