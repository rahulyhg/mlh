package anups.dun.notify;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;

public class LatestNotificationServiceAlarm extends BroadcastReceiver {
	@Override
	public void onReceive(Context context, Intent intent) {
		String[] param={};
		new LatestNotificationServiceWebService(context).execute(param);	
	}

}
