package anups.dun.services;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.widget.Toast;
import anups.dun.constants.Sessions;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.AuthenticationAlarm;
import anups.dun.notify.VersionUpgradeAlarm;
import anups.dun.app.AndroidWebNotifications;
import anups.dun.app.AndroidWebScreen;

public class OnBootCompleted extends BroadcastReceiver{
 @Override
 public void onReceive(Context context, Intent intent) {
	 AndroidWebNotifications  awn = new AndroidWebNotifications(context);
  /* VERSION UPGRADE : */
	 awn.notify_versionupgrade();
  /* AUTHENTICATION REMINIDER : */
	 awn.notify_authReminder();
	 
	 AppSessionManagement appSessionManager = new AppSessionManagement(context);
	 String USER_ID=appSessionManager.getAndroidSession("AUTH_USER_ID");
	 if(USER_ID!=null){ awn.notify_latestNotificationService(); }
 }
}
