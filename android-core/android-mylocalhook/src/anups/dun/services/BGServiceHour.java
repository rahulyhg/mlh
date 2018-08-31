package anups.dun.services;

import android.annotation.SuppressLint;
import android.app.ActivityManager;
import android.app.Service;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.IBinder;
import android.os.Looper;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalHour;
import anups.dun.notify.ws.util.Notifications;
import anups.dun.util.AndroidLogger;
import anups.dun.web.templates.URLGenerator;

@SuppressLint("NewApi")
public class BGServiceHour extends Service {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(BGServiceHour.class);
	
	private boolean isServiceRunning(Context context, Class<?> serviceClass) {
	    ActivityManager manager = (ActivityManager) context.getSystemService(Context.ACTIVITY_SERVICE);
	    for(ActivityManager.RunningServiceInfo service : manager.getRunningServices(Integer.MAX_VALUE)) {
	      if(serviceClass.getName().equals(service.service.getClassName())) { return true; }
	    }
	   return false;
	}
	
	@Override
	  public int onStartCommand(Intent intent, int flags, int startId) {
		 boolean bgService = isServiceRunning(this, BGServiceMinute.class);
		   logger.info("IsServiceRunning (BGServiceMinute): "+bgService);
		   if(!bgService){
			   final Context context=this;
			   final Handler handler = new Handler(Looper.getMainLooper());
			    handler.postDelayed(new Runnable() {
			      @Override
			      public void run() {
			    	  logger.info("Called StartupService...");
			    	  AppSessionManagement appSessionManager = new AppSessionManagement(context.getApplicationContext());
                                           appSessionManager.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,null);
			    	  Intent triggerWS = new Intent(context, BGServiceMinute.class);
			    	         startService(triggerWS);
			      }
			    }, 1000);		
		    }
		   URLGenerator urlGenerator=new URLGenerator();
		   AppSessionManagement appSessionManager = new AppSessionManagement(this);
		   String user_Id=appSessionManager.getAndroidSession("AUTH_USER_ID");
		   if(user_Id==null){
			 new Notifications(this).notify_show_signInRegister();
		   }
		   
		   String[] params=new String[1];
					params[0]=urlGenerator.ws_intervalHour(user_Id);
		   new WSIntervalHour(this).execute(params);
		return START_NOT_STICKY;
	  }
	@Override
	public IBinder onBind(Intent arg0) {
		// TODO Auto-generated method stub
		return null;
	}
	
	@Override
	public void onTaskRemoved(Intent rootIntent) {
		super.onTaskRemoved(rootIntent);
	}

}
