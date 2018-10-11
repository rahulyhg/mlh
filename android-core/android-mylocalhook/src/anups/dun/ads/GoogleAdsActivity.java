package anups.dun.ads;

import android.app.Activity;
import android.os.Bundle;
import android.view.Window;
import anups.dun.app.R;

public class GoogleAdsActivity extends Activity {
 @Override
 public void onCreate(Bundle savedInstanceState) {
  super.onCreate(savedInstanceState);
  requestWindowFeature(Window.FEATURE_NO_TITLE);
  setContentView(R.layout.activity_googleads);
 }
}
	