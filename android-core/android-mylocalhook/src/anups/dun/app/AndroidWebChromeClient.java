package anups.dun.app;

import java.io.File;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.content.Intent;
import android.net.Uri;
import android.os.Build;
import android.os.Environment;
import android.os.Parcelable;
import android.provider.MediaStore;
import android.util.Log;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.widget.Toast;
import anups.dun.app.R;

@TargetApi(Build.VERSION_CODES.JELLY_BEAN_MR2)
@SuppressLint("SimpleDateFormat")
public class AndroidWebChromeClient extends WebChromeClient {

	AndroidWebScreen webscreenObject;
	
	public AndroidWebChromeClient(AndroidWebScreen webscreenObject){
		this.webscreenObject=webscreenObject;
	}
	
	
    public File createImageFile() {
        // Create an image file name
        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
        String imageFileName = "JPEG_" + timeStamp + "_";
        File storageDir = Environment.getExternalStoragePublicDirectory(
                Environment.DIRECTORY_PICTURES);
        File imageFile = null;
        try {
		        imageFile = File.createTempFile(imageFileName,".jpg",storageDir);
		        								/* prefix, suffix, directory */
        }
        catch(IOException ioe) {
        	
        }
        return imageFile;
    }
 
   
    // For Lollipop
    public boolean onShowFileChooser(ValueCallback<Uri[]> filePath, WebChromeClient.FileChooserParams fileChooserParams) throws IOException {
    	webscreenObject.FILE_CHOOSER_VERSION="ANDROID_LOLLIPOP";
    	// Toast.makeText(androidWebScreen.getBaseContext(), "Android Lollipop", Toast.LENGTH_LONG).show();
    	// Double check that we don't have any existing callbacks
        if (webscreenObject.mFilePathCallback != null) {
        	webscreenObject.mFilePathCallback.onReceiveValue(null);
        }
        webscreenObject.mFilePathCallback = filePath;
        Log.e("FileCooserParams => ", filePath.toString());

        Intent takePictureIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        if (takePictureIntent.resolveActivity(webscreenObject.getPackageManager()) != null) {
            // Create the File where the photo should go
            File photoFile = null;
            photoFile = createImageFile();
			takePictureIntent.putExtra("PhotoPath", webscreenObject.mCameraPhotoPath);

            // Continue only if the File was successfully created
            if (photoFile != null) {
            	webscreenObject.mCameraPhotoPath = "file:" + photoFile.getAbsolutePath();
                takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, Uri.fromFile(photoFile));
            } else {
                takePictureIntent = null;
            }
        }

        Intent contentSelectionIntent = new Intent(Intent.ACTION_GET_CONTENT);
        contentSelectionIntent.addCategory(Intent.CATEGORY_OPENABLE);
        contentSelectionIntent.putExtra(Intent.EXTRA_ALLOW_MULTIPLE, true);
        contentSelectionIntent.setType("image/*");

        Intent[] intentArray;
        if (takePictureIntent != null) {
            intentArray = new Intent[]{takePictureIntent};
        } else {
            intentArray = new Intent[0];
        }

        Intent chooserIntent = new Intent(Intent.ACTION_CHOOSER);
        chooserIntent.putExtra(Intent.EXTRA_INTENT, contentSelectionIntent);
        chooserIntent.putExtra(Intent.EXTRA_TITLE, "Image Chooser");
        chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, intentArray);
        webscreenObject.startActivityForResult(Intent.createChooser(chooserIntent, "Select images"), 1);

        return true;

    }


    // For Android 5.0+
    public boolean onShowFileChooser(WebView view, ValueCallback<Uri[]> filePath, WebChromeClient.FileChooserParams fileChooserParams) {
    	webscreenObject.FILE_CHOOSER_VERSION="ANDROID_5.0";
    	// Toast.makeText(androidWebScreen.getBaseContext(), "Android 5.0+", Toast.LENGTH_LONG).show();
    	// Double check that we don't have any existing callbacks
        if (webscreenObject.mFilePathCallback != null) {
        	webscreenObject.mFilePathCallback.onReceiveValue(null);
        }
        webscreenObject.mFilePathCallback = filePath;
        Toast.makeText(webscreenObject.getBaseContext(), "FileChooserParams: "+filePath.toString(), Toast.LENGTH_LONG).show();

        Intent takePictureIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        if (takePictureIntent.resolveActivity(webscreenObject.getPackageManager()) != null) {
            // Create the File where the photo should go
            File photoFile = null;
            photoFile = createImageFile();
			takePictureIntent.putExtra("PhotoPath", webscreenObject.mCameraPhotoPath);

            // Continue only if the File was successfully created
            if (photoFile != null) {
            	webscreenObject.mCameraPhotoPath = "file:" + photoFile.getAbsolutePath();
                takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, Uri.fromFile(photoFile));
            } else {
                takePictureIntent = null;
            }
        }

       // Toast.makeText(androidWebScreen.getBaseContext(), "takePictureIntent: "+takePictureIntent, Toast.LENGTH_LONG).show();
        
        Intent contentSelectionIntent = new Intent(Intent.ACTION_GET_CONTENT);
        contentSelectionIntent.addCategory(Intent.CATEGORY_OPENABLE);
        contentSelectionIntent.putExtra(Intent.EXTRA_ALLOW_MULTIPLE, true);
        contentSelectionIntent.setType("image/*");

        Intent[] intentArray;
        if (takePictureIntent != null) {
            intentArray = new Intent[]{takePictureIntent};
        } else {
            intentArray = new Intent[0];
        }

        Intent chooserIntent = new Intent(Intent.ACTION_CHOOSER);
        chooserIntent.putExtra(Intent.EXTRA_INTENT, contentSelectionIntent);
        chooserIntent.putExtra(Intent.EXTRA_TITLE, "Image Chooser");
        chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, intentArray);
       // androidWebScreen.startActivityForResult(Intent.createChooser(chooserIntent, "Select images"), 1);
        webscreenObject.startActivityForResult(chooserIntent, 1);
        return true;

    }

    
    // openFileChooser for Android 3.0+
    public void openFileChooser(ValueCallback<Uri> uploadMsg, String acceptType) {
    	webscreenObject.FILE_CHOOSER_VERSION="ANDROID_3.0";
    	// Toast.makeText(androidWebScreen.getBaseContext(), "Android 3.0+", Toast.LENGTH_LONG).show();
    	webscreenObject.mUploadMessage = uploadMsg;
    	// Toast.makeText(androidWebScreen.getBaseContext(), "mUploadMessage: "+androidWebScreen.mUploadMessage, Toast.LENGTH_LONG).show();
        try {
            File imageStorageDir = new File(Environment.getExternalStoragePublicDirectory(Environment.DIRECTORY_PICTURES), "DirectoryNameHere");

            if (!imageStorageDir.exists()) {
                imageStorageDir.mkdirs();
            }

            File file = null;
            if(acceptType.equalsIgnoreCase("image/*")) {
                file = new File(imageStorageDir + File.separator + "IMG_" + String.valueOf(System.currentTimeMillis()) + ".jpg");
            } else if(acceptType.equalsIgnoreCase("video/*")) {
            	 file = new File(imageStorageDir + File.separator + "IMG_" + String.valueOf(System.currentTimeMillis()) + ".3gp");
            }
            
            webscreenObject.mCapturedImageURI = Uri.fromFile(file); // save to the private variable

            
            if(acceptType.equalsIgnoreCase("image/*")) {
            	
            	webscreenObject.captureIntent = new Intent(android.provider.MediaStore.ACTION_IMAGE_CAPTURE);
             
            } else if(acceptType.equalsIgnoreCase("video/*")) {
            	
            	webscreenObject.captureIntent = new Intent(android.provider.MediaStore.ACTION_VIDEO_CAPTURE);
            	
            }
            webscreenObject.captureIntent.putExtra(MediaStore.EXTRA_OUTPUT, webscreenObject.mCapturedImageURI);
            // captureIntent.putExtra(MediaStore.EXTRA_SCREEN_ORIENTATION, ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

            Intent i = new Intent(Intent.ACTION_GET_CONTENT);
            i.addCategory(Intent.CATEGORY_OPENABLE);
            if(acceptType.equalsIgnoreCase("image/*")) {
                i.setType("image/*");
            } else if(acceptType.equalsIgnoreCase("video/*")) {
            	 i.setType("video/*");
            }
            
            Intent chooserIntent = Intent.createChooser(i, webscreenObject.getString(R.string.image_chooser));
            chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS, new Parcelable[]{webscreenObject.captureIntent});

            webscreenObject.startActivityForResult(chooserIntent, AndroidWebScreen.INPUT_FILE_REQUEST_CODE);
        } catch (Exception e) {
            Toast.makeText(webscreenObject.getBaseContext(), "Camera Exception:" + e, Toast.LENGTH_LONG).show();
        }

    }

    // openFileChooser for Android < 3.0
    public void openFileChooser(ValueCallback<Uri> uploadMsg) {
    	webscreenObject.FILE_CHOOSER_VERSION="ANDROID<3.0";
    	// Toast.makeText(androidWebScreen.getBaseContext(), "Android <3.0", Toast.LENGTH_LONG).show();
    	 openFileChooser(uploadMsg, "");
    }

    // openFileChooser for other Android versions
    /* may not work on KitKat due to lack of implementation of openFileChooser() or onShowFileChooser()
       https://code.google.com/p/android/issues/detail?id=62220
       however newer versions of KitKat fixed it on some devices */
    public void openFileChooser(ValueCallback<Uri> uploadMsg, String acceptType, String capture) {
    	// Toast.makeText(androidWebScreen.getBaseContext(), "Android Other Versions", Toast.LENGTH_LONG).show();
    	 openFileChooser(uploadMsg, acceptType);
    }


   
}
