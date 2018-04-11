package anups.dun.notify;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.widget.Toast;
import anups.dun.constants.Sessions;
import anups.dun.js.AppManagement;
import anups.dun.js.AppSessionManagement;

public class VersionUpgradeAlarm extends BroadcastReceiver {
 @Override
 public void onReceive(Context context, Intent intent) {
 // AppSessionManagement appSessionManager = new AppSessionManagement(context);
  // appSessionManager.setAndroidSession(Sessions.SESSION_ALARM_VERSIONUPGRADE,"ON");	
  String[] param={};
  new VersionUpgradeWebService(context).execute(param);		
 }
}
