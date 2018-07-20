package anups.dun.alarm;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.SystemClock;
import anups.dun.broadcast.recievers.BRIntervalHour;
import anups.dun.util.AndroidLogger;

public class AlarmIntervalHour {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(AlarmIntervalHour.class);
	private AlarmManager alarmMgr;
	 private PendingIntent alarmIntent;
	 public static AlarmIntervalHour sInstance;
	 public static synchronized AlarmIntervalHour getInstance(Context context) {
	  if (sInstance == null) {  sInstance = new AlarmIntervalHour(context.getApplicationContext()); }
	  return sInstance;
	 }
		
	 private AlarmIntervalHour(Context context){
		 logger.info("");
		 alarmMgr = (AlarmManager)context.getSystemService(Context.ALARM_SERVICE);
		 Intent intent = new Intent(context, BRIntervalHour.class);
		 alarmIntent = PendingIntent.getBroadcast(context, 0, intent, 0);
		 alarmMgr.setInexactRepeating(AlarmManager.ELAPSED_REALTIME_WAKEUP,
			        SystemClock.elapsedRealtime() + AlarmManager.INTERVAL_HALF_HOUR,
			        AlarmManager.INTERVAL_HALF_HOUR, alarmIntent); 
	 }
}
