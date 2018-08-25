package anups.dun.js;

import android.content.Context;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import anups.dun.notify.ws.util.Notifications;

public class AppNotifyManagement extends ActionBarActivity {
	Context mContext;
	public AppNotifyManagement(Context c) {  mContext = c; }
	@JavascriptInterface
	public void shutdownNotification_versionUpgrade() {
		new Notifications(mContext).notify_hide_versionStatus();
    }
	@JavascriptInterface
	public void startNotification_authReminder() {
		new Notifications(mContext).notify_show_signInRegister();
    }
	@JavascriptInterface
	public void shutdownNotification_authReminder() {
		new Notifications(mContext).notify_hide_signInRegister();
    }
	
}
