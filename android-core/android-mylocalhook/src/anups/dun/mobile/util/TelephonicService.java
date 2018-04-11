package anups.dun.mobile.util;

import java.lang.reflect.Method;
import java.util.List;

import android.annotation.SuppressLint;
import android.content.Context;
import android.os.Build;
import android.support.v7.app.ActionBarActivity;
import android.telephony.SmsManager;
import android.telephony.SubscriptionInfo;
import android.telephony.SubscriptionManager;
import android.telephony.TelephonyManager;
import android.webkit.JavascriptInterface;
import android.widget.Toast;
import anups.dun.util.SIMUtil;

@SuppressLint("NewApi")
public class TelephonicService extends ActionBarActivity {
  private Context context;
  private String sim1Number;
  private String sim1carrierName;
  private String sim2Number;
  private String sim2carrierName;
  public TelephonicService(Context context){
	this.context=context;  
	try {
	if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP_MR1) {
		 SubscriptionManager subscriptionManager = SubscriptionManager.from(context);
		   List<SubscriptionInfo> subscriptionInfoList = subscriptionManager.getActiveSubscriptionInfoList();
		   
		   sim1carrierName=subscriptionInfoList.get(0).getCarrierName().toString();
		   sim1Number=subscriptionInfoList.get(0).getNumber().toString();
		   sim2carrierName=subscriptionInfoList.get(1).getCarrierName().toString();
		   sim2Number=subscriptionInfoList.get(1).getNumber().toString();
		   
		   Toast.makeText(context,"SIM-1 :"+sim1carrierName+" "+sim1Number, Toast.LENGTH_LONG).show();
		   Toast.makeText(context,"SIM-2 :"+sim2carrierName+" "+sim2Number, Toast.LENGTH_LONG).show();
		 
		   /*  for(SubscriptionInfo subscriptionInfo : subscriptionInfoList) {
		    	 subscriptionInfo.getCarrierName();
		    	 subscriptionInfo.getNumber();
		       if(subscriptionInfo.getCarrierName().toString().equalsIgnoreCase(carrierName)){
		    	 int subscriptionId = subscriptionInfo.getSubscriptionId();
		    	 SmsManager.getSmsManagerForSubscriptionId(subscriptionId).sendTextMessage(PhoneNumber, null, msg, null, null);
		    	 Toast.makeText(context," Message Sent From :"+carrierName, Toast.LENGTH_LONG).show();
		       } 
		     } */
       /* SubscriptionManager sManager = (SubscriptionManager) context.getSystemService(Context.TELEPHONY_SUBSCRIPTION_SERVICE);
        SubscriptionInfo infoSim1 = sManager.getActiveSubscriptionInfoForSimSlotIndex(0);
        SubscriptionInfo infoSim2 = sManager.getActiveSubscriptionInfoForSimSlotIndex(1);
        if(infoSim1 != null) { 
        	 sim1Number=infoSim1.getNumber();
        	 sim1carrierName=infoSim1.getCarrierName().toString();
        }
        if(infoSim2 != null){
        	 sim2Number=infoSim2.getNumber(); 
        	 sim2carrierName=infoSim2.getCarrierName().toString();
        } */
    }else{
        TelephonyManager telephonyManager = (TelephonyManager) context.getSystemService(Context.TELEPHONY_SERVICE);
        if (telephonyManager.getSimSerialNumber() != null){ sim1Number=telephonyManager.getLine1Number(); }
    }
  } catch(Exception e){ Toast.makeText(context,"TelephonicService Exception"+e.getMessage(), Toast.LENGTH_LONG).show(); }
  }
  
  @JavascriptInterface
  public String getsim1PhoneNumber(){  return this.sim1Number; }
  @JavascriptInterface
  public String getsim1carrierName(){  return this.sim1carrierName; }
  @JavascriptInterface
  public String getsim2PhoneNumber(){  return this.sim2Number; }
  @JavascriptInterface
  public String getsim2carrierName(){  return this.sim2carrierName; }
  @JavascriptInterface
  public void sendSMS(String carrierName, String msg,String PhoneNumber) { // sim=0 -> SIM-1, sim=1 -> SIM-2
   Toast.makeText(context, "Validating", Toast.LENGTH_LONG).show();
   try {
   if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP_MR1) {
   SubscriptionManager subscriptionManager = SubscriptionManager.from(context);
   List<SubscriptionInfo> subscriptionInfoList = subscriptionManager.getActiveSubscriptionInfoList();
     for(SubscriptionInfo subscriptionInfo : subscriptionInfoList) {
       if(subscriptionInfo.getCarrierName().toString().equalsIgnoreCase(carrierName)){
    	 int subscriptionId = subscriptionInfo.getSubscriptionId();
    	 SmsManager.getSmsManagerForSubscriptionId(subscriptionId).sendTextMessage(PhoneNumber, null, msg, null, null);
    	 Toast.makeText(context," Message Sent From :"+carrierName, Toast.LENGTH_LONG).show();
       } 
     }
   }
   else {
	   SmsManager smsManager = SmsManager.getDefault();
	   smsManager.sendTextMessage(PhoneNumber, null, msg, null, null);
	   
   }
   } catch(Exception e){ Toast.makeText(context,"Sent Message Exception"+e.getMessage(), Toast.LENGTH_LONG).show(); }
  }
}
