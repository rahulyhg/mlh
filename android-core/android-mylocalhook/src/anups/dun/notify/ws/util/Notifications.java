package anups.dun.notify.ws.util;

import android.app.NotificationManager;
import android.content.Context;
import android.support.v4.app.NotificationCompat;
import android.widget.Toast;
import anups.dun.constants.BusinessConstants;
import anups.dun.util.PushNotification;
import anups.dun.web.templates.URLGenerator;

public class Notifications {
 Context context;
 public Notifications(Context context){
   this.context=context; 
 }
 
 public void notify_show_versionStatus(){
	 String directURL="market://details?id=anups.dun.app";
	 boolean inapp=false;
	 String contentTitle="New Version Available";
	 String bigContentTitle="New Version Available"; // Big Title Details:
	 String contentText="You are using old Version"; // You have recieved new message
	 String ticker="New Version Available"; // New Message Alert!
 	
	 String[] events = new String[3];
 	     events[0] = new String("You are using old Version");
 	     events[1] = new String("New Version is in Playstore");
 	     events[2] = new String("Upgrade your App Now!");
 	 new PushNotification().display_unclosableNotification(BusinessConstants.UNCLOSEDNOTIFICATION_VERSIONUPGRADE,
 		context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
 }
 
 public void notify_hide_versionStatus(){
	 NotificationCompat.Builder  mBuilder = new NotificationCompat.Builder(context);
								 mBuilder.setOngoing(false);
	 NotificationManager mNotificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
	 					 mNotificationManager.notify(BusinessConstants.UNCLOSEDNOTIFICATION_VERSIONUPGRADE, mBuilder.build());  
	 					 mNotificationManager.cancel(BusinessConstants.UNCLOSEDNOTIFICATION_VERSIONUPGRADE);
 }
 
 public void notify_show_signInRegister(){
	 try {
	 URLGenerator urlGenerator = new URLGenerator(context);
	 String directURL=urlGenerator.defaultPage();
	 boolean inapp=false;
		 String contentTitle="MyLocalHook SignIn/Register";
		 String bigContentTitle="SignIn/Register App"; // Big Title Details:
		 String contentText="MyLocalHook is waiting for you."; // You have recieved new message
		 String ticker="MyLocalHook SignIn/Register"; // New Message Alert!
	 	
		 String[] events = new String[3];
	 	     events[0] = new String("You are not SignIn/Register");
	 	     events[1] = new String("MyLocalHook is waiting for you.");
	 	     events[2] = new String("SignIn/Register Right Now");
	 NotificationCompat.Builder  mBuilder= new PushNotification().display_unclosableNotification(BusinessConstants.UNCLOSEDNOTIFICATION_AUTHREMINDER,
	 		context, directURL, inapp, contentTitle, bigContentTitle, contentText, ticker, events);
	 }
	 catch(Exception e){
		 Toast.makeText(context, "Exception: "+e, Toast.LENGTH_LONG).show();
	 }
 }
 
 public void notify_hide_signInRegister(){
	 try {
	/*	 NotificationCompat.Builder  mBuilder = new NotificationCompat.Builder(context);
								mBuilder.setOngoing(false);
	NotificationManager mNotificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
						mNotificationManager.notify(BusinessConstants.UNCLOSEDNOTIFICATION_AUTHREMINDER, mBuilder.build());  
						mNotificationManager.cancel(BusinessConstants.UNCLOSEDNOTIFICATION_AUTHREMINDER);			
	*/
		 NotificationManager notificationManager = (NotificationManager)  context.getSystemService(Context.NOTIFICATION_SERVICE);
		                     notificationManager.cancel(BusinessConstants.UNCLOSEDNOTIFICATION_AUTHREMINDER);	
	 }
	 catch(Exception e){
		 Toast.makeText(context, "Exception: "+e, Toast.LENGTH_LONG).show();
	 }
 }
 
}
