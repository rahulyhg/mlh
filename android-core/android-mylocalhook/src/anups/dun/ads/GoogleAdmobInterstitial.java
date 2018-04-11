package anups.dun.ads;

import java.util.concurrent.Executors;
import java.util.concurrent.ScheduledExecutorService;
import java.util.concurrent.ScheduledFuture;
import java.util.concurrent.TimeUnit;

import com.google.android.gms.ads.AdListener;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.InterstitialAd;

import android.app.Activity;

public class GoogleAdmobInterstitial {
    public static final String TAG = GoogleAdmobInterstitial.class.getSimpleName();
    public static final String ID = "ca-app-pub-9032115287615251/7844041725";  
    private static ScheduledFuture loaderHandler;
    static boolean newAdInitimater;
    static Runnable loader;
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
                            	loaderHandler=scheduler.schedule(loader, 300, TimeUnit.SECONDS);
               			 }
               			
                        });
                    }
                });
            }
        }; 
 
        ScheduledExecutorService scheduler = Executors.newScheduledThreadPool(1);
    	loaderHandler=scheduler.schedule(loader, 5, TimeUnit.SECONDS);
	 
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