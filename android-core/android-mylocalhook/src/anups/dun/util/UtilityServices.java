package anups.dun.util;

import android.app.ActivityManager;
import android.content.Context;

public class UtilityServices {
 private Context context;
 public UtilityServices(Context context){
  this.context=context;
 }
 @SuppressWarnings("unused")
public boolean isServiceRunning(Class<?> serviceClass) {
  ActivityManager manager = (ActivityManager) context.getSystemService(Context.ACTIVITY_SERVICE);
  for(ActivityManager.RunningServiceInfo service : manager.getRunningServices(Integer.MAX_VALUE)) {
	if(serviceClass.getName().equals(service.service.getClassName())) { return true; }
  }
  return false;
 }
}
