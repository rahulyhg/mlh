package anups.dun.js;

import android.content.Context;
import android.support.v7.app.ActionBarActivity;
import android.webkit.JavascriptInterface;
import anups.dun.app.AndroidWebScreen;
import anups.dun.util.AndroidLogger;

public class AppPermissions extends ActionBarActivity {
  org.apache.log4j.Logger logger = AndroidLogger.getLogger(AppPermissions.class);
  Context mContext;
  public AppPermissions(Context c) {  mContext = c; }
	
  @JavascriptInterface
  public boolean doesPermissionExist(String permission){ 
   boolean status=((AndroidWebScreen) mContext).doesPermissionExist(permission);
   return status;
  }
	
  @JavascriptInterface
  public void makeAPermission(String permissions){
	  String[] perm = permissions.split(",");
	  ((AndroidWebScreen) mContext).makeAPermission(perm);
	}
  
  
}
