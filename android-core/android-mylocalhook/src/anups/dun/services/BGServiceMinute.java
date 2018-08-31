package anups.dun.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.Intent;
import android.os.Handler;
import android.os.IBinder;
import android.os.Looper;
import android.widget.Toast;
import anups.dun.br.BRIntervalMinute;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalMinute;
import anups.dun.util.AndroidLogger;
import anups.dun.util.GPSTracker;
import anups.dun.web.templates.URLGenerator;

@SuppressLint("NewApi")
public class BGServiceMinute extends Service {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(BGServiceMinute.class);
  Runnable serviceRunner;

  private void trigger_minuteService() {
	  final Handler handler = new Handler(Looper.getMainLooper());
	    handler.postDelayed(new Runnable() {
	      @Override
	      public void run() {
	       logger.info("BGServiceMinute Execution runs..");
			AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
		    appSessionManager.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,null);
			
		    /********************************************************************************************************/
		    /*********************************** MINUTE SERVICE ::: START *******************************************/
		    /********************************************************************************************************/
		    /* Minute Service */
			 URLGenerator urlGenerator =new URLGenerator();
			 String user_Id=appSessionManager.getAndroidSession(BusinessConstants.AUTH_USER_ID);
			    
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
			   
			   /*********************************************************************************************************/
			   /************************************ MINUTE SERVICE ::: END *********************************************/
			   /*********************************************************************************************************/
			 }
	      }
	    }, 60000);
  }
  @Override
  public int onStartCommand(Intent intent, int flags, int startId) {
    AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
    String serviceExecutionStatus=appSessionManager.getAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS);
    if(serviceExecutionStatus==null) {
	  logger.info("intent: "+intent+" flags: "+flags+" startId: "+startId);
	  appSessionManager.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,"TRIGGERRED");
	  trigger_minuteService();
	}
   onTaskRemoved(intent);
   return Service.START_REDELIVER_INTENT;
  }
	
  @Override
  public IBinder onBind(Intent intent) {
	return null;
  }

  @Override
  public void onTaskRemoved(Intent rootIntent) {
	  Intent triggerWS = new Intent(this.getApplicationContext(), BGServiceMinute.class);
	  this.getApplicationContext().startService(triggerWS);
  /*  Intent triggerWS = new Intent();
   * 
	       triggerWS.setAction("anups.dun.services.StartupService");
    sendBroadcast(triggerWS); */
  }
	
}