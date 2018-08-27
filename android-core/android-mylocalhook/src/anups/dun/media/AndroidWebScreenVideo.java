package anups.dun.media;

import android.media.MediaPlayer;
import android.media.MediaPlayer.OnPreparedListener;
import android.net.Uri;
import android.os.Bundle;
import android.app.Activity;
import android.app.ProgressDialog;
import android.util.Log;
import android.view.Window;
import android.widget.MediaController;
import android.widget.Toast;
import android.widget.VideoView;
import anups.dun.app.R;

public class AndroidWebScreenVideo extends Activity {

	// Declare variables
	@SuppressWarnings("deprecation")
	ProgressDialog pDialog;
	VideoView videoview;

	// Insert your Video URL
	String VideoURL = "http://www.androidbegin.com/tutorial/AndroidCommercial.3gp";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		requestWindowFeature(Window.FEATURE_NO_TITLE);
		// Get the layout from video_main.xml
		setContentView(R.layout.activity_androidwebscreenvideo);
		// Find your VideoView in your video_main.xml layout
		videoview = (VideoView) findViewById(R.id.VideoView);
		// Execute StreamVideo AsyncTask

		String videoURL = getIntent().getStringExtra("VIDEO_URL");
		Toast.makeText(this.getApplicationContext(), "VIDEO_URL"+videoURL, Toast.LENGTH_SHORT).show();
		
		if(videoURL.length()>0){ this.VideoURL=videoURL; }
		
		// Create a progressbar
		pDialog = new ProgressDialog(AndroidWebScreenVideo.this);
		// Set progressbar title
		pDialog.setTitle("Android Video Streaming Tutorial");
		// Set progressbar message
		pDialog.setMessage("Buffering...");
		pDialog.setIndeterminate(false);
		pDialog.setCancelable(false);
		// Show progressbar
		pDialog.show();

		try {
			// Start the MediaController
			MediaController mediacontroller = new MediaController(AndroidWebScreenVideo.this);
			mediacontroller.setAnchorView(videoview);
			// Get the URL from String VideoURL
			Uri video = Uri.parse(VideoURL);
			videoview.setMediaController(mediacontroller);
			videoview.setVideoURI(video);

		} catch (Exception e) {
			Log.e("Error", e.getMessage());
			e.printStackTrace();
		}

		videoview.requestFocus();
		videoview.setOnPreparedListener(new OnPreparedListener() {
			// Close the progress bar and play the video
			public void onPrepared(MediaPlayer mp) {
				pDialog.dismiss();
				videoview.start();
			}
		});

	}

}
