package anups.dun.constants;

public class BusinessConstants {
 /* */
 public static final String INTERNALMEMORYPATH=System.getenv("EXTERNAL_STORAGE");
 public static final String EXTERNALMEMORYPATH=System.getenv("EXTERNAL_STORAGE2");
 /* NOTIFICATIONS */
 public static final int UNCLOSEDNOTIFICATION_VERSIONUPGRADE=1;
 public static final int UNCLOSEDNOTIFICATION_AUTHREMINDER=2;
 
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
}
