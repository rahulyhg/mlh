package anups.dun.alarm;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.SystemClock;
import anups.dun.services.BGServiceHour;
import anups.dun.services.StartupService;
import anups.dun.util.AndroidLogger;

public class AlarmOnceTrigger {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AlarmOnceTrigger.class);
	 private AlarmManager alarmMgr;
	 private PendingIntent alarmIntent;
	 public static AlarmOnceTrigger sInstance;
	 public static synchronized AlarmOnceTrigger getInstance(Context context) {
	  if (sInstance == null) {  sInstance = new AlarmOnceTrigger(context.getApplicationContext()); }
	  return sInstance;
	 }
		
	 private AlarmOnceTrigger(Context context){
		 logger.info("AlarmOnceTrigger invoked BGServiceMinute..");
		 alarmMgr = (AlarmManager) context.getSystemService(Context.ALARM_SERVICE);
		 Intent intent = new Intent(context, BGServiceHour.class);
		 alarmIntent = PendingIntent.getBroadcast(context, 0, intent, 0);
		 alarmMgr.set(AlarmManager.ELAPSED_REALTIME_WAKEUP,
			        SystemClock.elapsedRealtime() + 60 * 1000, alarmIntent);
	 }
}
