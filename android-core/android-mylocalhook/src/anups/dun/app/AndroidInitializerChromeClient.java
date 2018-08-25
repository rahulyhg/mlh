package anups.dun.app;

import android.content.Context;
import android.webkit.WebChromeClient;

public class AndroidInitializerChromeClient extends WebChromeClient {
 public Context context;
 public AndroidInitializerChromeClient(Context context){
   this.context=context;
 }
}
