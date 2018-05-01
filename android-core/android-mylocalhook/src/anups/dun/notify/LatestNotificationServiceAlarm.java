package anups.dun.notify;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import anups.dun.app.AndroidWebScreen;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;
import anups.dun.util.PropertiesFile;

public class LatestNotificationServiceAlarm extends BroadcastReceiver {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(LatestNotificationServiceAlarm.class);
	
	@Override
	public void onReceive(Context context, Intent intent) {
		logger.info("LatestNotificationServiceAlarm Triggered..");
		LatestNotificationServiceWebService lnsws=new LatestNotificationServiceWebService(context); 
		String[] param={};
		try {
			if(Build.VERSION.SDK_INT >= 11) { /*HONEYCOMB*/
				lnsws.executeOnExecutor(LatestNotificationServiceWebService.THREAD_POOL_EXECUTOR,param);
		    } else {
			
		    	lnsws.execute(param);
		    }
		} catch(Exception e){ logger.error("LatestNotificationServiceAlarm Exception"); }
	}

}
