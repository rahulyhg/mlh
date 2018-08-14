package anups.dun.br;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalHour;
import anups.dun.notify.ws.util.Notifications;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PushNotification;
import anups.dun.web.templates.URLGenerator;

public class BRIntervalHour  extends BroadcastReceiver{
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalHour.class);

 @Override
 public void onReceive(Context context, Intent intent) {
   URLGenerator urlGenerator=new URLGenerator();
   AppSessionManagement appSessionManager = new AppSessionManagement(context);
   String user_Id=appSessionManager.getAndroidSession("AUTH_USER_ID");
   if(user_Id==null){
	 new Notifications(context).notify_show_signInRegister();
   }
   
   String[] params=new String[1];
			params[0]=urlGenerator.ws_intervalHour(user_Id);
   new WSIntervalHour(context).execute(params);
 }

}
