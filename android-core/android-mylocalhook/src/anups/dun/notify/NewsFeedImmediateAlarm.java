package anups.dun.notify;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;

public class NewsFeedImmediateAlarm extends BroadcastReceiver {
	@Override
	public void onReceive(Context context, Intent intent) {
		String[] param={};
		new NewsFeedImmediateWebService(context).execute(param);	
	}

}
