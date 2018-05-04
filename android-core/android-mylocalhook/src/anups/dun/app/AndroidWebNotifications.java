package anups.dun.app;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.SystemClock;
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

public static PendingIntent latestNotifyService_pendingIntent; 
public static AlarmManager latestNotifyService_manager;

public static PendingIntent newsFeedInterval_pendingIntent; 
public static AlarmManager newsFeedInterval_manager;

public AndroidWebNotifications(Context c){ context = c; }

public void notify_authReminder(){
 if(auth_pendingIntent==null) { /* Alarm is triggered only if it is previously not triggered */
   Intent alarm_auth = new Intent(context, AuthenticationAlarm.class);
   auth_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_auth, auth_pendingIntent.FLAG_UPDATE_CURRENT);
   auth_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
   auth_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), AlarmManager.INTERVAL_HOUR, auth_pendingIntent); 
 }
}


public void notify_versionupgrade(){
 if(version_pendingIntent==null) { /* Alarm is triggered only if it is previously not triggered */
   Intent alarm_version = new Intent(context, VersionUpgradeAlarm.class);
   version_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_version, version_pendingIntent.FLAG_UPDATE_CURRENT);
   version_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
   version_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), AlarmManager.INTERVAL_HOUR, version_pendingIntent); // 60 minutes  
 }
}



public void notify_latestNotificationService(){
 if(latestNotifyService_pendingIntent==null) { /* Alarm is triggered only if it is previously not triggered */
   Intent alarm_nfi = new Intent(context, LatestNotificationServiceAlarm.class);
   latestNotifyService_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_nfi, latestNotifyService_pendingIntent.FLAG_UPDATE_CURRENT);
   latestNotifyService_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
   latestNotifyService_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(),  1 * 60 * 1000, latestNotifyService_pendingIntent);  
    context.startService(new Intent(context, LatestNotificationServiceAlarm.class));
   }
}

public void notify_newsFeedIntervalReminder(){
 if(newsFeedInterval_pendingIntent==null) { /* Alarm is triggered only if it is previously not triggered */
   Intent alarm_nfi = new Intent(context, NewsFeedIntervalAlarm.class);
   newsFeedInterval_pendingIntent = PendingIntent.getBroadcast(context, 0, alarm_nfi, newsFeedInterval_pendingIntent.FLAG_UPDATE_CURRENT);
   newsFeedInterval_manager = (AlarmManager)context.getSystemService(context.getApplicationContext().ALARM_SERVICE);
   newsFeedInterval_manager.setRepeating(AlarmManager.RTC_WAKEUP, System.currentTimeMillis(), AlarmManager.INTERVAL_HOUR, newsFeedInterval_pendingIntent);  	
 }
}


}
