package anups.dun.app;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import anups.dun.notify.AuthenticationAlarm;
import anups.dun.notify.LatestNotificationServiceAlarm;
import anups.dun.notify.NewsFeedIntervalAlarm;
import anups.dun.notify.VersionUpgradeAlarm;

public class AndroidWebNotifications {
private Context context;
/* ALARM: */
public static PendingIntent auth_pendingIntent;
public static AlarmManager auth_manager;
public static PendingIntent version_pendingIntent; 
public static AlarmManager version_manager;
public static PendingIntent newsFeedImmediate_pendingIntent; 
public static AlarmManager newsFeedImmediate_manager;
public static PendingIntent newsFeedInterval_pendingIntent; 
public static AlarmManager newsFeedInterval_manager;

public AndroidWebNotifications(Context c){
	context = c; 
}

public void notify_versionupgrade(){
 Intent alarm_version = new Intent(context, VersionUpgradeAlarm.class);
 version_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_version, version_pendingIntent.FLAG_UPDATE_CURRENT);
 version_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
 version_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), AlarmManager.INTERVAL_HOUR, version_pendingIntent); // 60 minutes  
}

public void notify_authReminder(){
 Intent alarm_auth = new Intent(context, AuthenticationAlarm.class);
 auth_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_auth, auth_pendingIntent.FLAG_UPDATE_CURRENT);
 auth_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
 auth_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), AlarmManager.INTERVAL_HOUR, auth_pendingIntent); 
}

public void notify_newsFeedImmediateReminder(){
 Intent alarm_nfi = new Intent(context, LatestNotificationServiceAlarm.class);
 newsFeedImmediate_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_nfi, newsFeedImmediate_pendingIntent.FLAG_UPDATE_CURRENT);
 newsFeedImmediate_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
 newsFeedImmediate_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), 1 * 60 * 1000, newsFeedImmediate_pendingIntent);  
}

public void notify_newsFeedIntervalReminder(){
 Intent alarm_nfi = new Intent(context, NewsFeedIntervalAlarm.class);
 newsFeedInterval_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_nfi, newsFeedInterval_pendingIntent.FLAG_UPDATE_CURRENT);
 newsFeedInterval_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
 newsFeedInterval_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), AlarmManager.INTERVAL_HOUR, newsFeedInterval_pendingIntent);  	
}


}
