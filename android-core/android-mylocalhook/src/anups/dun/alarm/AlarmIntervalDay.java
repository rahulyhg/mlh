package anups.dun.alarm;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.SystemClock;
import anups.dun.br.BRIntervalDay;
import anups.dun.util.AndroidLogger;

public class AlarmIntervalDay {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(AlarmIntervalDay.class);
 private AlarmManager alarmMgr;
 private PendingIntent alarmIntent;
 public static AlarmIntervalDay sInstance;
 public static synchronized AlarmIntervalDay getInstance(Context context) {
  if (sInstance == null) {  sInstance = new AlarmIntervalDay(context.getApplicationContext()); }
  return sInstance;
 }
	
 private AlarmIntervalDay(Context context){
	 alarmMgr = (AlarmManager)context.getSystemService(Context.ALARM_SERVICE);
	 Intent intent = new Intent(context, BRIntervalDay.class);
	 alarmIntent = PendingIntent.getBroadcast(context, 0, intent, 0);
	 alarmMgr.setInexactRepeating(AlarmManager.ELAPSED_REALTIME_WAKEUP,
		        SystemClock.elapsedRealtime() + AlarmManager.INTERVAL_HALF_HOUR,
		        AlarmManager.INTERVAL_HALF_HOUR, alarmIntent); 
 }
}
