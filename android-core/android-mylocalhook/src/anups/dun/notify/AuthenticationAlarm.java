package anups.dun.notify;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import anups.dun.constants.Sessions;
import anups.dun.constants.UnclosedNotifications;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.PushNotification;

public class AuthenticationAlarm extends BroadcastReceiver {
@Override
public void onReceive(Context context, Intent intent) {
AppSessionManagement appsession=new AppSessionManagement(context);	
if(appsession.getAndroidSession("USER_REGISTERED")==null || 
   appsession.getAndroidSession("USER_REGISTERED").equalsIgnoreCase("NO")){
	String directURL="";
	boolean inapp=true;
	String contentTitle="SignIn/Register";
	String bigContentTitle="SignIn/Register"; // Big Title Details:
	String contentText="MyLocalHook is waiting for you."; // You have recieved new message
	String ticker="You've not logged into MyLocalHook"; // New Message Alert!
	String[] events = new String[3];
		     events[0] = new String("Connect to People around you");
		     events[1] = new String("Watch NewsFeed happening around you");
		     events[2] = new String("And Many More!");
	new PushNotification().display_unclosableNotification(UnclosedNotifications.UNCLOSEDNOTIFICATION_AUTHREMINDER,
			context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
}
}
}
