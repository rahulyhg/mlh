package anups.dun.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.Intent;
import android.os.Handler;
import android.os.IBinder;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSGoogleAds;
import anups.dun.notify.ws.WSIntervalMinute;
import anups.dun.util.AndroidLogger;
import anups.dun.util.GPSTracker;
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
	URLGenerator urlGenerator =new URLGenerator(this.getApplicationContext());
	String user_Id=appSessionManager.getAndroidSession(BusinessConstants.AUTH_USER_ID);
	
	logger.info("user_Id: "+user_Id);
	logger.info("Activity Status: "+appSessionManager.getAndroidSession(BusinessConstants.ANDROID_CURRENT_ACTIVITY));
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
	/* Google AdMob Ads */
	try {
	  logger.info("MyLocalHook is invoking GoogleAdmobInterstitial Service...");
	 	  String[] googleAdsParams = new String[1];
	 	           googleAdsParams[0]= urlGenerator.ws_googleAds();
	 	  WSGoogleAds wsGoogleAds = new WSGoogleAds(this);
	 	              wsGoogleAds.execute(googleAdsParams);
	}
	catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
  }

  private int SERVICE_START_ID;
  private Intent SERVICE_INTENT;
  @Override
  public int onStartCommand(Intent intent, int flags, int startId) {
   SERVICE_START_ID=startId;
   SERVICE_INTENT=intent;
   logger.info("intent: "+intent+" flags: "+flags+" startId: "+startId);
   trigger_minuteService();
   return Service.START_REDELIVER_INTENT;
  }

  @Override
  public IBinder onBind(Intent intent) {
    return null;
  }
  

}