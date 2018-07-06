package anups.dun.js;

import android.content.Context;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;

import anups.dun.app.AndroidWebScreen;

public class AppPermissions extends ActionBarActivity {
	Context mContext;
	public AppPermissions(Context c) {  mContext = c; }
	
	
	final private int REQUEST_CODE_ASK_PERMISSIONS = 123;
	
	
}
