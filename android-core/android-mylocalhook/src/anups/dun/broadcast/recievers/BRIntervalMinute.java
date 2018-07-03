package anups.dun.broadcast.recievers;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.notify.ws.WSIntervalMinute;
import anups.dun.util.AndroidLogger;

public class BRIntervalMinute extends BroadcastReceiver {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(BRIntervalMinute.class);
	
 @Override
 public void onReceive(Context context, Intent intent) {
	 
	 String[] params = new String[1];
	 params[0]="";
	 new WSIntervalMinute(context).execute(params);
 }

}
