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
	 final Handler handler = new Handler();
	boolean SERVICE_EXECUTION_BEGIN=true;
	@Override
	public int onStartCommand(Intent intent, int flags, int startId) {
		AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
		String serviceExecutionStatus=appSessionManager.getAndroidSession(BusinessConstants.SERVICE_EXECUTION_STATUS);
		if(serviceExecutionStatus==null) {
			appSessionManager.setAndroidSession(BusinessConstants.SERVICE_EXECUTION_STATUS,"TRIGGERRED");
			final Handler handler = new Handler();
			handler.postDelayed(new Runnable() {
				@Override
				public void run() {
					AppSessionManagement appSessionManager = new AppSessionManagement(getApplicationContext());
										 appSessionManager.setAndroidSession(BusinessConstants.SERVICE_EXECUTION_STATUS,null);
					Intent triggerWS = new Intent();
					 	   triggerWS.setAction("anups.dun.notify.ws.AppNotificationAlarm");
					getApplicationContext().sendBroadcast(triggerWS);
				}
			}, 60000);
		}
		onTaskRemoved(intent);
		return START_REDELIVER_INTENT;
	}
	
	@Override
	public IBinder onBind(Intent intent) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void onTaskRemoved(Intent rootIntent) {
	  Intent restartIntentService = new Intent(getApplicationContext(),this.getClass());
	  restartIntentService.setPackage(getPackageName());
	  startService(restartIntentService);
	  super.onTaskRemoved(rootIntent);
    }
}