package anups.dun.constants;

public class BusinessConstants {
 /* */
 public static final String INTERNALMEMORYPATH=System.getenv("EXTERNAL_STORAGE");
 public static final String EXTERNALMEMORYPATH=System.getenv("EXTERNAL_STORAGE2");
 /* NOTIFICATIONS */
 public static final int UNCLOSEDNOTIFICATION_VERSIONUPGRADE=1;
 public static final int UNCLOSEDNOTIFICATION_AUTHREMINDER=2;
 
 public static final String GOOGLE_ADS_ACTIIVATION="GOOGLE_ADS_ACTIIVATION";
 /**/
 public static final String GOOGLE_ADMOBINTERSTITIAL_STATUS="GOOGLE_ADMOBINTERSTITIAL_STATUS"; // TRIGGERED/ null
 /**/
 public static final String BGSERVICE_EXECUTION_STATUS="BGSERVICE_EXECUTION_STATUS"; // TRIGGERRED/null(UNTRIGGERRED)
 public static final String BGSERVICE_EXECUTION_COUNTER="BGSERVICE_EXECUTION_COUNTER"; // 1 to 15
 
 /* GENERAL */
 public static final String VERSION_APP_STATUS="VERSION_APP_STATUS";
 public static final String VERSION_POPUP_TRIGGER="VERSION_POPUP_TRIGGER";
 public static final String VERSION_POPUP_DISPLAYED="VERSION_POPUP_DISPLAYED"; // TRIGGERRED/UNTRIGGERRED
 
 
 /* SESSION LIST */
 public static final String AUTH_USER_ID="AUTH_USER_ID";
 
 /* PERMISSIONS LIST */
 
 /* SET_ALARM_PERMISSION: */
 public static final String PERMISSION_ACCESS_SETALARM="com.android.alarm.permission.SET_ALARM"; 
 
 /* BATTERY_OPTIMIZATIONS_PERMISSION:  */
 public static final String PERMISSION_ACCESS_BATTERYOPTIMIZATIONS="android.permission.REQUEST_IGNORE_BATTERY_OPTIMIZATIONS";
 
 /* READ_CONTACTS_PERMISSION:  */
 public static final String PERMISSION_ACCESS_READCONTACTS="android.permission.READ_CONTACTS";
 
 /* WRITE_CONTACTS_PERMISSION: */
 public static final String PERMISSION_ACCESS_WRITECONTACTS="android.permission.WRITE_CONTACTS";
 
 /* INTERNET_PERMISSION:  */
 public static final String PERMISSION_ACCESS_INTERNET="android.permission.INTERNET";
 
 /* ACCESS_NETWORK_STATE_PERMISSION:  */
 public static final String PERMISSION_ACCESS_ACCESSNETWORKSTATE="android.permission.ACCESS_NETWORK_STATE";
 
 /* ACCESS_WIFI_STATE_PERMISSION:  */
 public static final String PERMISSION_ACCESS_ACCESSWIFISTATE="android.permission.ACCESS_WIFI_STATE";
 
 /* ACCESS_COARSE_LOCATION_PERMISSION:  */
 public static final String PERMISSION_ACCESS_ACCESSCOARSELOCATION="android.permission.ACCESS_COARSE_LOCATION";
 
 /* ACCESS_FINE_LOCATION_PERMISSION:  */
 public static final String PERMISSION_ACCESS_ACCESSFINELOCATION="android.permission.ACCESS_FINE_LOCATION";
 
 /* BLUETOOTH_PERMISSION:  */
 public static final String PERMISSION_ACCESS_BLUETOOTH="android.permission.BLUETOOTH";
 
 /* WRITE_EXTERNAL_STORAGE_PERMISSION:  */
 public static final String PERMISSION_ACCESS_WRITEEXTERNALSTORAGE="android.permission.WRITE_EXTERNAL_STORAGE";
 
 /* READ_EXTERNAL_STORAGE_PERMISSION:  */
 public static final String PERMISSION_ACCESS_READEXTERNALSTORAGE="android.permission.READ_EXTERNAL_STORAGE";
 
 /* CAMERA_PERMISSION:  */
 public static final String PERMISSION_ACCESS_CAMERA="android.permission.CAMERA";
 
 /* VIBRATE_PERMISSION:  */
 public static final String PERMISSION_ACCESS_VIBRATE="android.permission.VIBRATE";
 
 /* READ_PHONE_STATE_PERMISSION:  */
 public static final String PERMISSION_ACCESS_READPHONESTATE="android.permission.READ_PHONE_STATE";
 
 /* WAKE_LOCK_PERMISSION:  */
 public static final String PERMISSION_ACCESS_WAKELOCK="android.permission.WAKE_LOCK";
 
 /* BIND_JOB_SERVICE_PERMISSION: */
 public static final String PERMISSION_ACCESS_BINDJOBSERVICE="android.permission.BIND_JOB_SERVICE";
 
 /* SEND_SMS_PERMISSION:  */
 public static final String PERMISSION_ACCESS_SENDSMS="android.permission.SEND_SMS";
 
 /* RECEIVE_BOOT_COMPLETED:  */
 public static final String PERMISSION_ACCESS_RECEIVEBOOTCOMPLETED="android.permission.RECEIVE_BOOT_COMPLETED";
}
