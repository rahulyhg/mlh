package anups.dun.ads;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.InterstitialAd;
import android.app.Activity;
import android.content.Context;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.util.AndroidLogger;

public class GoogleAdmobInterstitial {
	
	public static final String TAG = GoogleAdmobInterstitial.class.getSimpleName();
    // public static final String ID = "ca-app-pub-9032115287615251/7844041725";  // Original
    // public static final String ID = "ca-app-pub-3940256099942544/1033173712"; // Debug
	private Context context;
    private String ID;
    private long duration;
    public static org.apache.log4j.Logger logger = AndroidLogger.getLogger(GoogleAdmobInterstitial.class);
	 
	public GoogleAdmobInterstitial(Context context, String id, long duration){
		this.context=context;
		this.ID=id;
		this.duration=duration;
	}
	
	public void loadInterstitial(final Activity activity) {
		
		AndroidWebScreen.googleAdMobRunnable=new Runnable() {
		    @Override
			public void run() {
		    	
		    	 AdRequest adRequest = new AdRequest.Builder().build();
		    	 final InterstitialAd interstitial = new InterstitialAd(activity);
		    	 interstitial.setAdUnitId(ID);
                 interstitial.loadAd(adRequest);
                 interstitial.setAdListener(new AdListener() {
                	 
                 	 @Override
                     public void onAdLoaded() {
                 		logger.info("Displayed Ad");
                 		displayInterstitial(interstitial);
                     }
                 	 
                     @Override
        		     public void onAdClosed() {
                    	 logger.info("Closed Ad");
                    	 AndroidWebScreen.googleAdMobInterstitialHandler.postDelayed(AndroidWebScreen.googleAdMobRunnable, duration * 1000);
        			 }
        			
                 });
		   }
		   
		 };

		 AppSessionManagement appSessionManagement = new AppSessionManagement(context);
		 logger.info("GOOGLE_ADMOBINTERSTITIAL_STATUS: "+appSessionManagement.getAndroidSession(BusinessConstants.GOOGLE_ADMOBINTERSTITIAL_STATUS));
		 if(appSessionManagement.getAndroidSession(BusinessConstants.GOOGLE_ADMOBINTERSTITIAL_STATUS)==null){
			appSessionManagement.setAndroidSession(BusinessConstants.GOOGLE_ADMOBINTERSTITIAL_STATUS,"TRIGGERED");
		    AndroidWebScreen.googleAdMobInterstitialHandler.postDelayed(AndroidWebScreen.googleAdMobRunnable, duration * 1000);
		 }
		
	}
	
	public static void requestNewInterstitial(final InterstitialAd interstitialAd) {
	    AdRequest adRequest = new AdRequest.Builder().build();
	    interstitialAd.loadAd(adRequest);
	}

	private static void displayInterstitial(final InterstitialAd interstitialAd) {
	    if(interstitialAd.isLoaded()) {  interstitialAd.show(); }
    }
	    
	public static void cancelInterstitial() {
	  
	}
}
