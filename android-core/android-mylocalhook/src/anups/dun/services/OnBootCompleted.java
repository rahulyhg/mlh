package anups.dun.services;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.alarm.AlarmIntervalDay;
import anups.dun.util.AndroidLogger;

public class OnBootCompleted extends BroadcastReceiver{

 org.apache.log4j.Logger logger = AndroidLogger.getLogger(OnBootCompleted.class);
 

 @Override
 public void onReceive(Context context, Intent intent) {
	 try {
   /* Alarm Services: */
		 AlarmIntervalDay.getInstance(context);
   /* Calling a Service */
      Intent bgIntent = new Intent(context, BGService.class);
      context.startService(bgIntent);
   } catch(Exception e){ logger.error("OnBootCompleted Exception: "+e.getMessage());}
 }
}
