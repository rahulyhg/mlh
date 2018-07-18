package anups.dun.ads;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.InterstitialAd;
import android.app.Activity;
import anups.dun.app.AndroidWebScreen;
import anups.dun.util.AndroidLogger;

public class GoogleAdmobInterstitial {
	
	public static final String TAG = GoogleAdmobInterstitial.class.getSimpleName();
    // public static final String ID = "ca-app-pub-9032115287615251/7844041725";  // Original
    // public static final String ID = "ca-app-pub-3940256099942544/1033173712"; // Debug
    private String ID;
    private int duration;
    public static org.apache.log4j.Logger logger = AndroidLogger.getLogger(GoogleAdmobInterstitial.class);
	 
	public GoogleAdmobInterstitial(String id, int duration){
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
                    	 GoogleAdmobInterstitial googleAdmobInterstitial = new GoogleAdmobInterstitial(ID,duration);
                    	 googleAdmobInterstitial.loadInterstitial(activity);
        			 }
        			
                 });
		    }
		 };

		 AndroidWebScreen.googleAdMobInterstitialHandler.postDelayed(AndroidWebScreen.googleAdMobRunnable, duration * 1000);
		
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
