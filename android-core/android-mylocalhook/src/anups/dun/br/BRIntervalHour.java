package anups.dun.br;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalHour;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PushNotification;
import anups.dun.web.templates.URLGenerator;

public class BRIntervalHour  extends BroadcastReceiver{
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalHour.class);

 @Override
 public void onReceive(Context context, Intent intent) {
   URLGenerator urlGenerator=new URLGenerator();
   AppSessionManagement appSessionManager = new AppSessionManagement(context);
   String user_Id=appSessionManager.getAndroidSession("AUTH_USER_ID");
   if(user_Id==null){
	 String directURL=urlGenerator.defaultPage();
	 boolean inapp=false;
		 String contentTitle="MyLocalHook SignIn/Register";
		 String bigContentTitle="SignIn/Register App"; // Big Title Details:
		 String contentText="MyLocalHook is waiting for you."; // You have recieved new message
		 String ticker="MyLocalHook SignIn/Register"; // New Message Alert!
	 	
		 String[] events = new String[3];
	 	     events[0] = new String("You are not SignIn/Register");
	 	     events[1] = new String("MyLocalHook is waiting for you.");
	 	     events[2] = new String("SignIn/Register Right Now");
	 	 new PushNotification().display_unclosableNotification(BusinessConstants.UNCLOSEDNOTIFICATION_AUTHREMINDER,
	 		context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
   }
   
   String[] params=new String[1];
			params[0]=urlGenerator.ws_intervalHour(user_Id);
   new WSIntervalHour(context).execute(params);
 }

}
