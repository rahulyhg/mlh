package anups.dun.app;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.SystemClock;
import anups.dun.notify.LatestNotificationServiceAlarm;
import anups.dun.notify.NewsFeedIntervalAlarm;
import anups.dun.notify.alarm.AppNotificationAlarm;
import anups.dun.notify.alarm.AuthenticationAlarm;
import anups.dun.util.AndroidLogger;

public class AndroidWebNotifications {

org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebNotifications.class);
	
private Context context;

private AlarmManager alarmMgr;
private PendingIntent alarmIntent;

public AndroidWebNotifications(Context context){ this.context=context; }

public void notify_appServices(){
 logger.info("Triggering notify_appServices Reminder Alarm...");
 alarmMgr = (AlarmManager)context.getSystemService(Context.ALARM_SERVICE);
 Intent intent = new Intent(context, AppNotificationAlarm.class);
 alarmIntent = PendingIntent.getBroadcast(context, 0, intent, alarmIntent.FLAG_UPDATE_CURRENT);
 alarmMgr.setRepeating(AlarmManager.ELAPSED_REALTIME_WAKEUP, SystemClock.elapsedRealtime(), 5*60*1000,  alarmIntent);
}




}
