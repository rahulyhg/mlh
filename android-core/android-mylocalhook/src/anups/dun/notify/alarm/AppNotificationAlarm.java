package anups.dun.notify.alarm;

import java.util.ArrayList;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.AppNotificationWebService;
import anups.dun.util.AndroidLogger;
import anups.dun.web.templates.URLGenerator;

public class AppNotificationAlarm extends BroadcastReceiver {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppNotificationAlarm.class);
    ArrayList<AppNotificationWebService> arryList = new ArrayList<AppNotificationWebService>();
    
	@Override
	public void onReceive(Context context, Intent intent) {
		logger.info("AppNotificationAlarm is triggered..");
		logger.info("AppNotificationAlarm arryList: "+arryList);
		for(AppNotificationWebService appNotfyWebService : arryList){
			appNotfyWebService.cancel(true);
		}
		AppSessionManagement appSessionManager = new AppSessionManagement(context);
		URLGenerator urlGenerator=new URLGenerator();
		String user_Id=appSessionManager.getAndroidSession("AUTH_USER_ID");
		logger.info("user_Id: "+user_Id);
		String[] params=new String[1];
		params[0]=urlGenerator.webservice_notify_appServices(user_Id);
		try { 
		AppNotificationWebService webserviceExecute=new AppNotificationWebService(context);
		arryList.add(webserviceExecute);
		webserviceExecute.execute(params);
		 } catch(Exception e){ logger.error("Exception AppNotificationAlarm: "+e.getMessage()); }
	}

}
