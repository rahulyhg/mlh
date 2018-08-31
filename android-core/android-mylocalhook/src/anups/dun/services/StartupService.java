package anups.dun.services;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.widget.Toast;
import anups.dun.alarm.AlarmIntervalHour;
import anups.dun.alarm.AlarmOnceTrigger;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

public class StartupService extends BroadcastReceiver{

 org.apache.log4j.Logger logger = AndroidLogger.getLogger(StartupService.class);
 

 @Override
 public void onReceive(Context context, Intent intent) {
	 try {
	  if("android.intent.action.BOOT_COMPLETED".equalsIgnoreCase(intent.getAction())){ logger.info("ReBooted Device.."); }
	  logger.info("StartupService Initialized...");
	  /* Triggering Minute Service */
	   AppSessionManagement appSessionManager = new AppSessionManagement(context.getApplicationContext());
	                        appSessionManager.setAndroidSession(BusinessConstants.BGSERVICE_EXECUTION_STATUS,null);
       Intent bgIntent = new Intent(context, BGServiceMinute.class);
               context.startService(bgIntent);
      
      /* Triggering Hour Service */ 
         AlarmIntervalHour.getInstance(context);
         
     //   Intent serviceIntent = new Intent(context,BGServiceHour.class);
      //         context.startService(serviceIntent);
	  /* Hour Service */
	  // AlarmOnceTrigger.getInstance(context);
	   
	 
     } catch(Exception e){ logger.error("StartupService Exception: "+e.getMessage());}
 }
}
