package anups.dun.app;

import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.Timer;
import java.util.TimerTask;

import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.Handler;
import android.os.SystemClock;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.ws.AppNotificationAlarm;
import anups.dun.notify.ws.AppNotificationWebService;
import anups.dun.util.AndroidLogger;
import anups.dun.web.templates.URLGenerator;

public class AndroidWebNotifications {

org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidWebNotifications.class);
	
private Context context;

private AlarmManager alarmManager;

public AndroidWebNotifications(Context context){ this.context=context; }

public void notify_appServices(){
//	logger.info(message);
	Calendar cur_cal = new GregorianCalendar();
	cur_cal.setTimeInMillis(System.currentTimeMillis());//set the current time and date for this calendar

	Calendar cal = new GregorianCalendar();
	cal.add(Calendar.DAY_OF_YEAR, cur_cal.get(Calendar.DAY_OF_YEAR));
	cal.set(Calendar.HOUR_OF_DAY, 18);
	cal.set(Calendar.MINUTE, 32);
	cal.set(Calendar.SECOND, cur_cal.get(Calendar.SECOND));
	cal.set(Calendar.MILLISECOND, cur_cal.get(Calendar.MILLISECOND));
	cal.set(Calendar.DATE, cur_cal.get(Calendar.DATE));
	cal.set(Calendar.MONTH, cur_cal.get(Calendar.MONTH));
	Intent intent = new Intent(context, AppNotificationAlarm.class);
	PendingIntent pintent = PendingIntent.getService(context, 0, intent, 0);
	AlarmManager alarm = (AlarmManager)context.getSystemService(Context.ALARM_SERVICE);
	alarm.setRepeating(AlarmManager.RTC_WAKEUP, cal.getTimeInMillis(), 30*1000, pintent);
}



}
