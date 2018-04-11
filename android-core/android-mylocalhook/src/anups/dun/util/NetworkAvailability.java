package anups.dun.util;

import android.content.Context;
import android.net.ConnectivityManager;

public class NetworkAvailability {
	Context context;
	public NetworkAvailability(Context context){
		this.context=context;
	}
	 public boolean checkInternetConnection() {   

		    ConnectivityManager con_manager = (ConnectivityManager) 
		      context.getSystemService(Context.CONNECTIVITY_SERVICE);

		    if (con_manager.getActiveNetworkInfo() != null
		        && con_manager.getActiveNetworkInfo().isAvailable()
		        && con_manager.getActiveNetworkInfo().isConnected()) {
		      return true;
		    } else {
		      return false;
		    }
		  }
}
