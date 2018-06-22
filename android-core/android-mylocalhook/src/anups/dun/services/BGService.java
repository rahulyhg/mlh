package anups.dun.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.Intent;
import android.os.Handler;
import android.os.IBinder;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

@SuppressLint("NewApi")
public class BGService extends Service {
  
	 org.apache.log4j.Logger logger = AndroidLogger.getLogger(OnBootCompleted.class);
	 
	@Override
	public int onStartCommand(Intent intent, int flags, int startId) {
		AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
		String serviceExecutionStatus=appSessionManager.getAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS);
			if(serviceExecutionStatus==null) {
				
					logger.info("intent: "+intent+" flags: "+flags+" startId: "+startId);
					appSessionManager.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,"TRIGGERRED");
				    final Handler handler = new Handler();
					handler.postDelayed(new Runnable() {
				    @Override
					public void run() {
						logger.info("BGService Execution runs..");
						AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
					    appSessionManager.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,null);
						Intent triggerWS = new Intent();
						 	   triggerWS.setAction("anups.dun.notify.ws.AppNotificationAlarm");
						getApplicationContext().sendBroadcast(triggerWS);
					}
				   }, 60000);
		  }
		onTaskRemoved(intent);
		return Service.START_STICKY;
	}
	
	@Override
	public IBinder onBind(Intent intent) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void onTaskRemoved(Intent rootIntent) {
		Intent triggerWS = new Intent();
		       triggerWS.setAction("anups.dun.services.OnBootCompleted");
		sendBroadcast(triggerWS);
    }
	
}