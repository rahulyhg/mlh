package anups.dun.notify.ws;

import java.util.Timer;
import java.util.TimerTask;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import anups.dun.app.AndroidWebNotifications;
import anups.dun.js.AppSessionManagement;
import anups.dun.services.OnBootCompleted;
import anups.dun.util.AndroidLogger;
import anups.dun.util.AppAlarmManager;
import anups.dun.web.templates.URLGenerator;

public class AppNotificationAlarm extends BroadcastReceiver{
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppNotificationAlarm.class);
	
	@Override
	public void onReceive(Context context, Intent intent) {
		try {
		logger.info("AppNotificationAlarm Triggered");   				
		   AppSessionManagement appSessionManager = new AppSessionManagement(context);
		   String user_Id=appSessionManager.getAndroidSession("AUTH_USER_ID");
		   logger.info("user_Id: "+user_Id); 
		   if(user_Id!=null) {
		   URLGenerator urlGenerator=new URLGenerator();
		   String[] params=new String[1];
				    params[0]=urlGenerator.webservice_notify_appServices(user_Id);
		   new AppNotificationWebService(context).execute(params);
		   AppAlarmManager.scheduleAlarm(context);
		   }
		 } catch(Exception e){ logger.error("AppNotificationAlarm Exception: "+e.getMessage());}
		
	}

}
