package anups.dun.br;

import android.app.ActivityManager;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.Looper;
import android.widget.Toast;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.WSIntervalHour;
import anups.dun.notify.ws.util.Notifications;
import anups.dun.services.BGServiceHour;
import anups.dun.services.BGServiceMinute;
import anups.dun.util.AndroidLogger;
import anups.dun.web.templates.URLGenerator;

public class BRIntervalHour  extends BroadcastReceiver{
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalHour.class);

 
 
 @Override
 public void onReceive(Context context, Intent intent) {
	 logger.info("BRIntervalHour Started...");
    
	  // AlarmOnceTrigger.getInstance(context);
   
   
  
  }
 }
