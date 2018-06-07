package anups.dun.services;

import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.Timer;
import java.util.TimerTask;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.Looper;
import android.os.Message;
import android.os.SystemClock;
import anups.dun.notify.ws.AppNotificationAlarm;
import anups.dun.util.AndroidLogger;
import anups.dun.util.AppAlarmManager;

public class OnBootCompleted extends BroadcastReceiver{

 org.apache.log4j.Logger logger = AndroidLogger.getLogger(OnBootCompleted.class);
 

 @Override
 public void onReceive(Context context, Intent intent) {
	 try {
   /* Calling a Service */
   Intent bgIntent = new Intent(context, BGService.class);
   context.startService(bgIntent);
	 
   } catch(Exception e){ logger.error("OnBootCompleted Exception: "+e.getMessage());}
 }
}
