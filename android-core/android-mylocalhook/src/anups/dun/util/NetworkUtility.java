package anups.dun.util;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.InetAddress;
import java.net.URL;
import android.annotation.SuppressLint;
import android.content.Context;
import android.net.ConnectivityManager;
import android.telephony.TelephonyManager;

public class NetworkUtility {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(NetworkUtility.class);
	Context context;
	public NetworkUtility(Context context){
		this.context=context;
	}
	
	@SuppressWarnings("deprecation")
	public boolean checkInternetConnection() {   
	  ConnectivityManager con_manager = (ConnectivityManager) 
      context.getSystemService(Context.CONNECTIVITY_SERVICE);
      if(con_manager.getActiveNetworkInfo() != null
		  && con_manager.getActiveNetworkInfo().isAvailable()
		  && con_manager.getActiveNetworkInfo().isConnected()) {
		     return true;
	   } else {  return false; }
	}
	
	public String getIPV4Address(){
		String systemipaddress = "";
	    try  {
	      URL url_name = new URL("http://bot.whatismyipaddress.com");
	      BufferedReader sc = new BufferedReader(new InputStreamReader(url_name.openStream()));
	      systemipaddress = sc.readLine().trim();
	      if(!(systemipaddress.length() > 0))  {
	         try  {
	            InetAddress localhost = InetAddress.getLocalHost();
	            System.out.println((localhost.getHostAddress()).trim());
	            systemipaddress = (localhost.getHostAddress()).trim();
	         }
	              catch(Exception e1)  {
	                  systemipaddress = "NOT_DETECTED";
	              }
	          }
	      } catch (Exception e2) { systemipaddress = "NOT_DETECTED"; }
	     return systemipaddress;
	}
	
	@SuppressLint("NewApi")
	public String getDeviceIMEI(){
		String imei = "";
		
		try {
		TelephonyManager telephonyManager = (TelephonyManager)context.getSystemService(Context.TELEPHONY_SERVICE);
		imei = telephonyManager.getImei(0)+" "+telephonyManager.getImei(1);
		} 
		catch(Exception e){ logger.info("IMEI Excepton : "+e.getMessage()); }
		return imei;
	}
}

