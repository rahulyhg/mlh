package anups.dun.ads;

import java.util.Calendar;
import java.util.concurrent.Executors;
import java.util.concurrent.ScheduledExecutorService;
import java.util.concurrent.ScheduledFuture;
import java.util.concurrent.TimeUnit;
import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.InterstitialAd;
import android.app.Activity;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;

public class GoogleAdmob {  // GoogleAdmobInterstitial
    public static final String TAG = GoogleAdmob.class.getSimpleName();
    // public static final String ID = "ca-app-pub-9032115287615251/7844041725";  // Original
    public static final String ID = "ca-app-pub-3940256099942544/1033173712";
     // Interstitial
    //	ca-app-pub-3940256099942544/8691691433 // Interstitial Video
    //	ca-app-pub-3940256099942544/5224354917 // Rewarded Video
    private static int scheduleTime=200;
    @SuppressWarnings("rawtypes")
	private static ScheduledFuture loaderHandler;
    static boolean newAdInitimater;
    static Runnable loader;
    @SuppressWarnings("unused")
	public static void loadInterstitial(final Activity activity) {
    	
    	 loader = new Runnable() {
            @Override
            public void run() {

                activity.runOnUiThread(new Runnable() {
                    @Override
                    public void run() {
                        final InterstitialAd interstitial = new InterstitialAd(activity);
                        interstitial.setAdUnitId(ID);
                        AdRequest adRequest = new AdRequest.Builder().build();
                       
                        interstitial.loadAd(adRequest);
                        interstitial.setAdListener(new AdListener() {
                        	 @Override
                            public void onAdLoaded() {
                                displayInterstitial(interstitial);
                            }
                            @Override
               		     public void onAdClosed() {
                            	ScheduledExecutorService scheduler = Executors.newScheduledThreadPool(1);
                            	loaderHandler=scheduler.schedule(loader, scheduleTime, TimeUnit.SECONDS);
               			 }
               			
                        });
                    }
                });
            }
        }; 
        boolean trigger = false;
        AppSessionManagement appSessionManager = new AppSessionManagement(activity);
        if(appSessionManager==null){
        	Calendar cal = Calendar.getInstance();
        	appSessionManager.setAndroidSession(BusinessConstants.GOOGLE_ADMOBINTERSTITIAL_STATUS,String.valueOf(cal.getTimeInMillis()));
        	trigger=true;
        } else if(Long.getLong(appSessionManager.getAndroidSession(BusinessConstants.GOOGLE_ADMOBINTERSTITIAL_STATUS))>0){
        	
        }
        
        if(trigger){
        	  ScheduledExecutorService scheduler = Executors.newScheduledThreadPool(1);
         	  loaderHandler=scheduler.schedule(loader, scheduleTime, TimeUnit.SECONDS);
        }
	 
    }
 
   

public static void requestNewInterstitial(final InterstitialAd interstitialAd) {
    AdRequest adRequest = new AdRequest.Builder().build();
    interstitialAd.loadAd(adRequest);
}


    private static void displayInterstitial(final InterstitialAd interstitialAd) {
        if (interstitialAd.isLoaded()) {
            interstitialAd.show();
        }
    }
    public static void cancelInterstitial() {
    	   if (loaderHandler != null) {
    	       loaderHandler.cancel(true);
    	   }
    	}
}