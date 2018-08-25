package anups.dun.util;

import java.io.File;
import java.util.Random;
import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.app.TaskStackBuilder;
import android.content.Context;
import android.content.Intent;
import android.media.RingtoneManager;
import android.net.Uri;
import android.os.Build;
import android.support.v4.app.NotificationCompat;
import android.widget.Toast;
import anups.dun.app.AndroidWebScreen;
import anups.dun.app.R;

@TargetApi(Build.VERSION_CODES.JELLY_BEAN)
@SuppressLint("NewApi")
public class PushNotification {
	public int numMessages=0;
	
	public void display_closableNotification(Context context,String directURL, boolean inapp,
			String contentTitle, String bigContentTitle, String contentText, String ticker,String[] events) {
		
		/* Invoking the default notification service */
		   NotificationCompat.Builder  mBuilder = new NotificationCompat.Builder(context);
		   
		   mBuilder.setContentTitle(contentTitle);
		   mBuilder.setContentText(contentText);
		   mBuilder.setTicker(ticker);
		   mBuilder.setSmallIcon(R.drawable.ic_launcher);
		   
		   /* Increase notification number every time a new notification arrives */
		   mBuilder.setNumber(1);
		   
		   /* Add Big View Specific Configuration */
		   NotificationCompat.InboxStyle inboxStyle = new NotificationCompat.InboxStyle();
		   
		   
		   // Sets a title for the Inbox style big view
		   inboxStyle.setBigContentTitle(bigContentTitle);
		   
		   // Moves events into the big view
		   for (int i=0; i < events.length; i++) {
		      inboxStyle.addLine(events[i]);
		   }
		   
		   mBuilder.setStyle(inboxStyle);
		   
		   /* Creates an explicit intent for an Activity in your app */
		   Intent resultIntent=null;
		   if(inapp) {
		       resultIntent = new Intent(context, AndroidWebScreen.class);
		       resultIntent.setData(Uri.parse(directURL));
		         // resultIntent.putExtra("DIRECT_URL",directURL.toString());
		   }  else {
			   resultIntent = new Intent(Intent.ACTION_VIEW, Uri.parse(directURL.toString()));
		   }
		          
		   TaskStackBuilder stackBuilder = TaskStackBuilder.create(context);
		   stackBuilder.addParentStack(AndroidWebScreen.class);

		   /* Adds the Intent that starts the Activity to the top of the stack */
		   stackBuilder.addNextIntent(resultIntent);
		   PendingIntent resultPendingIntent =stackBuilder.getPendingIntent(0,PendingIntent.FLAG_UPDATE_CURRENT);
		   
		   mBuilder.setContentIntent(resultPendingIntent);
		   NotificationManager mNotificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
		   
		   
		   Uri uri = Uri.parse("android.resource://"+ context.getPackageName() + "/" + R.raw.ring01);
		   mBuilder.setSound(uri);

		   long[] v = {500,1000};
		   mBuilder.setVibrate(v);

		   
		   mBuilder.setAutoCancel(true);
		   int notifyId=new Random().nextInt((100- 1) + 1) + 1;
		   /* notificationID allows you to update the notification later on. */
		   mNotificationManager.notify(notifyId, mBuilder.build());
		}
	
	public NotificationCompat.Builder display_unclosableNotification(int notifyId,Context context,String directURL, boolean inapp,
			String contentTitle, String bigContentTitle, String contentText, String ticker,String[] events) {
		
		/* Invoking the default notification service */
		   NotificationCompat.Builder  mBuilder = new NotificationCompat.Builder(context);
		   
		   mBuilder.setContentTitle(contentTitle);
		   mBuilder.setContentText(contentText);
		   mBuilder.setTicker(ticker);
		   mBuilder.setSmallIcon(R.drawable.ic_launcher);
		   
		   /* Increase notification number every time a new notification arrives */
		   mBuilder.setNumber(++numMessages);
		   
		   /* Add Big View Specific Configuration */
		   NotificationCompat.InboxStyle inboxStyle = new NotificationCompat.InboxStyle();
		   
		   
		   // Sets a title for the Inbox style big view
		   inboxStyle.setBigContentTitle(bigContentTitle);
		   
		   // Moves events into the big view
		   for (int i=0; i < events.length; i++) {
		      inboxStyle.addLine(events[i]);
		   }
		   
		   mBuilder.setStyle(inboxStyle);
		   
		   /* Creates an explicit intent for an Activity in your app */
		   Intent resultIntent=null;
		   if(inapp) {
		       resultIntent = new Intent(context, AndroidWebScreen.class);
		       resultIntent.setData(Uri.parse(directURL));
		      //    resultIntent.putExtra("DIRECT_URL",directURL.toString());
		   }  else {
			   resultIntent = new Intent(Intent.ACTION_VIEW, Uri.parse(directURL.toString()));
		   }
		          
		   TaskStackBuilder stackBuilder = TaskStackBuilder.create(context);
		   stackBuilder.addParentStack(AndroidWebScreen.class);

		   /* Adds the Intent that starts the Activity to the top of the stack */
		   stackBuilder.addNextIntent(resultIntent);
		   PendingIntent resultPendingIntent =stackBuilder.getPendingIntent(0,PendingIntent.FLAG_UPDATE_CURRENT);
		   
		   mBuilder.setContentIntent(resultPendingIntent);
		   NotificationManager mNotificationManager = (NotificationManager) context.getSystemService(Context.NOTIFICATION_SERVICE);
		   
		   
		   Uri uri = Uri.parse("android.resource://"+ context.getPackageName() + "/" + R.raw.ring01);
		   mBuilder.setSound(uri);

		   long[] v = {500,1000};
		   mBuilder.setVibrate(v);
		   mBuilder.setOngoing(true);
		  // int notifyId=new Random().nextInt(10 - 1 + 1) + 1;
		   /* notificationID allows you to update the notification later on. */
		   mNotificationManager.notify(notifyId, mBuilder.build());
		   return mBuilder;
		}
	
}
