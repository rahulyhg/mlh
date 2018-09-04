package anups.dun.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.Intent;
import android.os.Handler;
import android.os.IBinder;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalMinute;
import anups.dun.notify.ws.response.WSRIntervalMinute;
import anups.dun.notify.ws.util.WSUtility;
import anups.dun.util.AndroidLogger;
import anups.dun.util.GPSTracker;
import anups.dun.util.UtilityServices;
import anups.dun.web.templates.URLGenerator;

@SuppressLint("NewApi")
public class BGServiceMinute extends Service {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(BGServiceMinute.class);
  Runnable serviceRunner;

  private void trigger_minuteService() {
    AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
    /* Regulates the Logger File Size upto 2 MB */
    // AndroidLogger.regulateLoggerFile();
    /* Minute Service */
	URLGenerator urlGenerator =new URLGenerator();
	String user_Id=appSessionManager.getAndroidSession(BusinessConstants.AUTH_USER_ID);
	logger.info("user_Id: "+user_Id);
	if(user_Id!=null){
	  /* GPS System : Start */
	  GPSTracker gpsTracker = new GPSTracker(getApplicationContext());
	  String userLatitude = String.valueOf(gpsTracker.latitude);
	  String userLongitude = String.valueOf(gpsTracker.longitude);
	  logger.info("userLatitude: "+userLatitude+" userLongitude: "+userLongitude);
      /* GPS System : Stop */
	
				 StringBuilder stringBuilder = new StringBuilder();
		            stringBuilder.append("action=SERVICE_INTERVALMINUTE");
		            stringBuilder.append("&user_Id=").append(user_Id);
		            stringBuilder.append("&gps_latitude=").append(userLatitude);
		            stringBuilder.append("&gps_longitude=").append(userLongitude);
	             String[] params = new String[2];
			              params[0]=urlGenerator.ws_intervalMinute();
			              params[1]=stringBuilder.toString();
	             new WSIntervalMinute(getApplicationContext()).execute(params);
	}
  }

  private int SERVICE_START_ID;
  private Intent SERVICE_INTENT;
  @Override
  public int onStartCommand(Intent intent, int flags, int startId) {
   SERVICE_START_ID=startId;
   SERVICE_INTENT=intent;
   logger.info("intent: "+intent+" flags: "+flags+" startId: "+startId);
   new Handler().postDelayed(new Runnable(){
		@Override
		public void run() { trigger_minuteService(); }
	  }, 1000);
   recallService();
   return Service.START_REDELIVER_INTENT;
  }

  private void recallService(){
	 
  }
  @Override
  public IBinder onBind(Intent intent) {
    return null;
  }
  

}