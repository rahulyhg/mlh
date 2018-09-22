package anups.dun.services;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.alarm.AlarmIntervalHour;
import anups.dun.util.AndroidLogger;
import anups.dun.util.UtilityServices;

public class StartupService extends BroadcastReceiver{

 org.apache.log4j.Logger logger = AndroidLogger.getLogger(StartupService.class);
 
 @Override
 public void onReceive(Context context, Intent intent) {
	 try {
	  if("android.intent.action.BOOT_COMPLETED".equalsIgnoreCase(intent.getAction())){ logger.info("ReBooted Device.."); }
	  logger.info("StartupService Initialized...");
	  /* Triggering Minute Service */
	 boolean isServiceRunning = new UtilityServices(context.getApplicationContext()).isServiceRunning(BGServiceMinute.class);
     logger.info("BGServiceRunning(Status): "+isServiceRunning);
	  if(isServiceRunning){
		  context.stopService(new Intent(context, BGServiceMinute.class));
	  }
		  context.startService(new Intent(context, BGServiceMinute.class));
      /* Triggering Hour Service */ 
      AlarmIntervalHour.getInstance(context);
	   
     } catch(Exception e){ logger.error("StartupService Exception: "+e.getMessage());}
 }
}
