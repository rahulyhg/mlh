package anups.dun.notify;

import android.app.IntentService;
import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import anups.dun.app.AndroidWebScreen;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PropertiesFile;

public class LatestNotificationServiceAlarm extends IntentService/*extends BroadcastReceiver*/ {
	
	public LatestNotificationServiceAlarm(String name) {
		super(name);
		// TODO Auto-generated constructor stub
	}

	org.apache.log4j.Logger logger = AndroidLogger.getLogger(LatestNotificationServiceAlarm.class);
	
	// @Override
//	public void onReceive(Context context, Intent intent) {
	@Override
    public int onStartCommand(Intent intent, int flags, int startId) {
		logger.info("LatestNotificationServiceAlarm Triggered..");
		LatestNotificationServiceWebService lnsws=new LatestNotificationServiceWebService(LatestNotificationServiceAlarm.this); 
		logger.info("AsyncTask Status: "+lnsws .getStatus());
		String[] param={};
		try {
			if(Build.VERSION.SDK_INT >= 11) { /*HONEYCOMB*/
				lnsws.executeOnExecutor(LatestNotificationServiceWebService.THREAD_POOL_EXECUTOR,param);
		    } else {
			
		    	lnsws.execute(param);
		    }
		} catch(Exception e){ logger.error("LatestNotificationServiceAlarm Exception"); }
		return super.onStartCommand(intent, flags, startId);
	}
		
	@Override
	protected void onHandleIntent(Intent intent) {
	// TODO Auto-generated method stub
			
	}
}
