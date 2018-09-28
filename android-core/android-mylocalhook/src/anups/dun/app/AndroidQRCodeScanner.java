package anups.dun.app;

import android.Manifest;
import android.content.Context;
import android.content.pm.PackageManager;
import android.os.Vibrator;
import android.support.v4.app.ActivityCompat;
import android.os.Bundle;
import android.util.SparseArray;
import android.view.SurfaceHolder;
import android.view.SurfaceView;
import android.widget.TextView;
import anups.dun.app.R;
import anups.dun.util.AndroidLogger;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.FileProvider;
import android.util.SparseArray;
import android.view.SurfaceView;
import android.view.View;
import android.view.Window;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.Button;
import android.widget.TextView;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;
/*
import com.google.android.gms.vision.CameraSource;
import com.google.android.gms.vision.Detector;
import com.google.android.gms.vision.Frame;
import com.google.android.gms.vision.barcode.Barcode;
import com.google.android.gms.vision.barcode.BarcodeDetector; */

public class AndroidQRCodeScanner extends Activity {
	/*
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(AndroidQRCodeScanner.class);
 SurfaceView cameraPreview;
 TextView txtResult;
 BarcodeDetector barcodeDetector;
 CameraSource cameraSource;
 final int RequestCameraPermissionID = 1001;
 
 @Override
 public void onRequestPermissionsResult(int requestCode, String[] permissions, int[] grantResults) {
     switch (requestCode) {
         case RequestCameraPermissionID: {
             if (grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                // if (AndroidQRCodeScanner.this.checkSelfPermission(Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED) {
                 //     return;
              //   }
                 try {
                     cameraSource.start(cameraPreview.getHolder());
                 } catch (IOException e) {
                     e.printStackTrace();
                 }
             }
        }
        break;
    }
 }
 
 @Override
 protected void onCreate(Bundle savedInstanceState) {
  super.onCreate(savedInstanceState);
  requestWindowFeature(Window.FEATURE_NO_TITLE);
  setContentView(R.layout.activity_androidqrcodescanner);
  
  cameraPreview = (SurfaceView) findViewById(R.id.cameraPreview);
  txtResult = (TextView) findViewById(R.id.txtResult);

  barcodeDetector = new BarcodeDetector.Builder(this)
          .setBarcodeFormats(Barcode.QR_CODE)
          .build();
  cameraSource = new CameraSource
          .Builder(this, barcodeDetector)
          .setRequestedPreviewSize(640, 480)
          .build();
  //Add Event
  cameraPreview.getHolder().addCallback(new SurfaceHolder.Callback() {
      @Override
      public void surfaceCreated(SurfaceHolder surfaceHolder) {
        //  if (checkSelfPermission(android.Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED) {
              //Request permission
         //     requestPermissions(
        //              new String[]{Manifest.permission.CAMERA},RequestCameraPermissionID);
        //      return;
        //  } 
    	  
          try {
              cameraSource.start(cameraPreview.getHolder());
          } catch (IOException e) {
              e.printStackTrace();
          }
      }

      @Override
      public void surfaceChanged(SurfaceHolder surfaceHolder, int i, int i1, int i2) {

      }

      @Override
      public void surfaceDestroyed(SurfaceHolder surfaceHolder) {
          cameraSource.stop();

      }
  });

  barcodeDetector.setProcessor(new Detector.Processor<Barcode>() {
      @Override
      public void release() {

      }

      @Override
      public void receiveDetections(Detector.Detections<Barcode> detections) {
          final SparseArray<Barcode> qrcodes = detections.getDetectedItems();
          if(qrcodes.size() != 0)
          {
              txtResult.post(new Runnable() {
                  @Override
                  public void run() {
                      //Create vibrate
                      Vibrator vibrator = (Vibrator)getApplicationContext().getSystemService(Context.VIBRATOR_SERVICE);
                      vibrator.vibrate(1000);
                      txtResult.setText(qrcodes.valueAt(0).displayValue);
                  }
              });
          }
      }
  });
 }
*/
}
