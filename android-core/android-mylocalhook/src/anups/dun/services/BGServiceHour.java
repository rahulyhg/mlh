package anups.dun.services;

import android.annotation.SuppressLint;
import android.app.Service;
import android.content.Intent;
import android.os.Handler;
import android.os.IBinder;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalHour;
import anups.dun.notify.ws.util.Notifications;
import anups.dun.util.AndroidLogger;
import anups.dun.util.UtilityServices;
import anups.dun.web.templates.URLGenerator;

@SuppressLint("NewApi")
public class BGServiceHour extends Service {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(BGServiceHour.class);
	
	@Override
	  public int onStartCommand(Intent intent, int flags, int startId) {
		 boolean bgService = new UtilityServices(getApplicationContext()).isServiceRunning(BGServiceMinute.class);
		   logger.info("IsServiceRunning (BGServiceMinute): "+bgService);
		   if(!bgService){
			   new Handler().postDelayed(new Runnable() {
			      @Override
			      public void run() {
			    	  logger.info("Called StartupService...");
			    	  Intent triggerWS = new Intent(getApplicationContext(), BGServiceMinute.class);
			    	         startService(triggerWS);
			      }
			    }, 1000);		
		    }
		   URLGenerator urlGenerator=new URLGenerator(this.getApplicationContext());
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
