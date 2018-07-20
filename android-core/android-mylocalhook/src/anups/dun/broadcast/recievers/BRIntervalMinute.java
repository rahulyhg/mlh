package anups.dun.broadcast.recievers;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalMinute;
import anups.dun.util.AndroidLogger;
import anups.dun.util.GPSTracker;
import anups.dun.web.templates.URLGenerator;

public class BRIntervalMinute extends BroadcastReceiver {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalMinute.class);
	
 @Override
 public void onReceive(Context context, Intent intent) {
	 logger.info("Triggered BRIntervalMinute...");
	 AppSessionManagement appSessionManagement = new AppSessionManagement(context);
	 URLGenerator urlGenerator =new URLGenerator();
	 String user_Id=appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID);
	 
	 /* GPS System : Start */
	 GPSTracker gpsTracker = new GPSTracker(context);
	 String userLatitude = String.valueOf(gpsTracker.latitude);
	 String userLongitude = String.valueOf(gpsTracker.longitude);
	 logger.info("userLatitude: "+userLatitude+" userLongitude: "+userLongitude);
	 /* GPS System : Stop */
	 
	 String[] params = new String[1];
	 params[0]=urlGenerator.ws_intervalMinute(user_Id,userLatitude,userLongitude);
			 
	 new WSIntervalMinute(context).execute(params);
 }

 
}
