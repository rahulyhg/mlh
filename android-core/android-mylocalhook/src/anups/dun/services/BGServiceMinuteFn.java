package anups.dun.services;

import android.content.Context;

public class BGServiceMinuteFn {
 private static BGServiceMinuteFn sInstance;
 public static synchronized BGServiceMinuteFn getInstance(Context context) {
  if(sInstance == null) {
    sInstance = new BGServiceMinuteFn(context.getApplicationContext()); 
  }
   return sInstance;
 }
 private BGServiceMinuteFn(Context context) {

 }
}
