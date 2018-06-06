package anups.dun.util;

import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.os.SystemClock;
import anups.dun.notify.ws.AppNotificationAlarm;

@SuppressLint("NewApi")
public class AppAlarmManager {

	static org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppAlarmManager.class);
	static PendingIntent pendingIntent;
	public static void scheduleAlarm(Context context){
		AlarmManager alarmManager = (AlarmManager) context.getSystemService(Context.ALARM_SERVICE);
		Intent myIntent = new Intent(context, AppNotificationAlarm.class);
		
		if(pendingIntent!=null){ alarmManager.cancel(pendingIntent); }

		pendingIntent =PendingIntent.getBroadcast(context, 0, myIntent, 0);
		alarmManager.set(AlarmManager.ELAPSED_REALTIME_WAKEUP,SystemClock.elapsedRealtime() + 10000, pendingIntent);
		
	}
}
