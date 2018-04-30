package anups.dun.js;

import android.app.NotificationManager;
import android.content.Context;
import android.support.v4.app.NotificationCompat;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.dun.app.AndroidWebNotifications;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.UnclosedNotifications;
import anups.dun.notify.LatestNotificationServiceWebService;
import anups.dun.notify.VersionUpgradeWebService;

public class AppNotifyManagement extends ActionBarActivity {
	Context mContext;
	public AppNotifyManagement(Context c) {  mContext = c; }
	@JavascriptInterface
	public void shutdownNotification_versionUpgrade() {
		NotificationCompat.Builder  mBuilder = new NotificationCompat.Builder(mContext);
		mBuilder.setOngoing(false);
		NotificationManager mNotificationManager = (NotificationManager) mContext.getSystemService(Context.NOTIFICATION_SERVICE);
		  mNotificationManager.notify(UnclosedNotifications.UNCLOSEDNOTIFICATION_VERSIONUPGRADE, mBuilder.build());  
		  mNotificationManager.cancel(UnclosedNotifications.UNCLOSEDNOTIFICATION_VERSIONUPGRADE);
    }
	@JavascriptInterface
	public void shutdownNotification_authReminder() {
		AppSessionManagement appSessionManager = new AppSessionManagement(mContext);
		appSessionManager.setAndroidSession("USER_REGISTERED","YES");
		NotificationCompat.Builder  mBuilder = new NotificationCompat.Builder(mContext);
		mBuilder.setOngoing(false);
		NotificationManager mNotificationManager = (NotificationManager) mContext.getSystemService(Context.NOTIFICATION_SERVICE);
		mNotificationManager.notify(UnclosedNotifications.UNCLOSEDNOTIFICATION_AUTHREMINDER, mBuilder.build());  
		mNotificationManager.cancel(UnclosedNotifications.UNCLOSEDNOTIFICATION_AUTHREMINDER);
    }
	@JavascriptInterface
	public void startNotification_authReminder(){
		AppSessionManagement appSessionManager = new AppSessionManagement(mContext);
		appSessionManager.setAndroidSession("USER_REGISTERED","NO");
		AndroidWebNotifications awn=new AndroidWebNotifications(mContext);
		awn.notify_authReminder();
	}
	@JavascriptInterface
	public void startNotification_latestNotifyService(){
		AndroidWebNotifications awn=new AndroidWebNotifications(mContext);
		awn.notify_latestNotificationService();	
	}
}
