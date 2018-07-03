package anups.dun.notify.ws.response;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;

import android.content.Context;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppManagement;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PushNotification;

public class WSRIntervalHour {
/*
 Response: 
 { "playStoreAppVersion" :"<playStoreAppVersion>" }
 */
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRIntervalHour.class);
 private Context context;
 private String response;
	
 public WSRIntervalHour(Context context,String response){
  this.context=context;
  this.response=response;
 }
 
 public void funcTrigger_playStoreAppVersion(){
  JSONParser jsonParser = new JSONParser();
  try {
    JSONObject jsonObject = (JSONObject)jsonParser.parse(response.toString());
    String playStoreAppVersion=(String) jsonObject.get("playStoreAppVersion");
    String status=new AppManagement(context).checkPlayStoreUpdate(playStoreAppVersion);
    if(status.equalsIgnoreCase("APP_TO_UPDATE")){  
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
 	 new PushNotification().display_unclosableNotification(BusinessConstants.UNCLOSEDNOTIFICATION_VERSIONUPGRADE,
 		context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
    }
  } 
  catch(Exception e){ logger.error("Exception funcTrigger_playStoreAppVersion: "+e.getMessage()); }
 }
}
