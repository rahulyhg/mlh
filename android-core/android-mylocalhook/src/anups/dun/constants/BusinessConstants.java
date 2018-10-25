package anups.dun.constants;

public class BusinessConstants {
 /* */
 public static final String INTERNALMEMORYPATH=System.getenv("EXTERNAL_STORAGE");
 public static final String EXTERNALMEMORYPATH=System.getenv("EXTERNAL_STORAGE2");
 public static final String ANDROID_PROJECTPATH="ANDROID_PROJECTPATH";
 
 /**/
 public static final String ANDROID_CURRENT_ACTIVITY="ANDROID_CURRENT_ACTIVITY";
 
 /* */
 public static final String AUTH_USER_ID = "AUTH_USER_ID";
 public static final String AUTH_USER_USERNAME = "AUTH_USER_USERNAME";
 public static final String AUTH_USER_SURNAME = "AUTH_USER_SURNAME";
 public static final String AUTH_USER_FULLNAME = "AUTH_USER_FULLNAME";
 public static final String AUTH_USER_COUNTRYCODE = "AUTH_USER_COUNTRYCODE";
 public static final String AUTH_USER_PHONENUMBER = "AUTH_USER_PHONENUMBER";
 public static final String AUTH_USER_GENDER = "AUTH_USER_GENDER";
 public static final String AUTH_USER_DOB = "AUTH_USER_DOB";
 public static final String AUTH_USER_COUNTRY = "AUTH_USER_COUNTRY";
 public static final String AUTH_USER_STATE = "AUTH_USER_STATE";
 public static final String AUTH_USER_LOCATION = "AUTH_USER_LOCATION";
 public static final String AUTH_USER_LOCALITY = "AUTH_USER_LOCALITY";
 public static final String AUTH_USER_PROFILEPIC = "AUTH_USER_PROFILEPIC";
 public static final String AUTH_USER_TIMEZONE = "AUTH_USER_TIMEZONE";
 public static final String AUTH_USER_ISADMIN = "AUTH_USER_ISADMIN";
 public static final String AUTHENTICATION_STATUS = "AUTHENTICATION_STATUS";
 
 /* SQLITE DATABASE */
 public static final String SQLITE_LASTUPDATED_USERFRNDSCONTACTS="SQLITE_LASTUPDATED_USERFRNDSCONTACTS"; // Time
 
 /* NOTIFICATIONS */
 public static final int UNCLOSEDNOTIFICATION_VERSIONUPGRADE=1;
 public static final int UNCLOSEDNOTIFICATION_AUTHREMINDER=2;
 
 public static final String GOOGLE_ADS_ACTIIVATION="GOOGLE_ADS_ACTIIVATION";
 /**/
 public static final String GOOGLE_ADMOBINTERSTITIAL_STATUS="GOOGLE_ADMOBINTERSTITIAL_STATUS"; // TRIGGERED/ null
 /**/
 public static final String BGSERVICEMINUTE_STATUS="BGSERVICEMINUTE_STATUS"; 
// public static final String BGSERVICE_EXECUTION_STATUS="BGSERVICE_EXECUTION_STATUS"; // TRIGGERRED/null(UNTRIGGERRED)
// public static final String BGSERVICE_EXECUTION_COUNTER="BGSERVICE_EXECUTION_COUNTER"; // 1 to 15
 
 /* GENERAL */
 public static final String VERSION_APP_STATUS="VERSION_APP_STATUS";
 public static final String VERSION_POPUP_TRIGGER="VERSION_POPUP_TRIGGER";
 public static final String VERSION_POPUP_DISPLAYED="VERSION_POPUP_DISPLAYED"; // TRIGGERRED/UNTRIGGERRED
 
 
 /* SESSION LIST */
 public static final String COOKIES_CATEGORIES_APPLASTUPDATED="COOKIES_CATEGORIES_APPLASTUPDATED";
 
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
