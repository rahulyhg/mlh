package anups.dun.notify.ws;

import java.util.ArrayList;
import android.content.ContentResolver;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.os.AsyncTask;
import android.provider.ContactsContract;
import anups.dun.db.Database;
import anups.dun.db.tbl.UserFrndsContacts;
import anups.dun.db.tbl.UserFrndsInfo;
import anups.dun.notify.ws.response.WSRUserFrndsContacts;
import anups.dun.notify.ws.util.WSUtility;
import anups.dun.util.AndroidLogger;
import anups.dun.web.templates.URLGenerator;

public class WSUserFrndsContacts extends AsyncTask<String, String, String> {

 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSUserFrndsContacts.class);
 
 private Context context;
 
 public WSUserFrndsContacts(Context context){
	this.context=context;
 }
 
 public String dumpContacts(ContentResolver contentResolver) {
	 ArrayList<String> phoneNumberList = new ArrayList<String>();
	 Database database =Database.getInstance(context); 
	 SQLiteDatabase sqliteDatabase = database.connectDatabase();
  try {
	  
	  UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
	  UserFrndsContacts userFrndsContacts = new UserFrndsContacts();
	  
	  /* Drop Schemas and Create Schemas */
	  userFrndsInfo.drop_userFrndsInfoSchema(sqliteDatabase);
	  userFrndsInfo.schema_userFrndsInfo(sqliteDatabase);
    
    Uri CONTENT_URI = ContactsContract.Contacts.CONTENT_URI;
    String _ID = ContactsContract.Contacts._ID;
    String DISPLAY_NAME = ContactsContract.Contacts.DISPLAY_NAME;
    String HAS_PHONE_NUMBER = ContactsContract.Contacts.HAS_PHONE_NUMBER;
 
    Uri PhoneCONTENT_URI = ContactsContract.CommonDataKinds.Phone.CONTENT_URI;
    String Phone_CONTACT_ID = ContactsContract.CommonDataKinds.Phone.CONTACT_ID;
    String NUMBER = ContactsContract.CommonDataKinds.Phone.NUMBER;
    Cursor cursor = contentResolver.query(CONTENT_URI, null,null, null, null); 
	
    int usrContactCounter=1;
    if (cursor.getCount() > 0) { // Loop for every contact in the phone
      logger.info("Contacts");
	  while (cursor.moveToNext()) {
		String frnd_Id = cursor.getString(cursor.getColumnIndex( _ID ));
		String youCall = cursor.getString(cursor.getColumnIndex( DISPLAY_NAME ));
		int hasPhoneNumber = Integer.parseInt(cursor.getString(cursor.getColumnIndex( HAS_PHONE_NUMBER )));
		
		if(hasPhoneNumber > 0) {
		    // Query and loop for every phone number of the contact
			Cursor phoneCursor = contentResolver.query(PhoneCONTENT_URI, null, Phone_CONTACT_ID + " = ?", new String[] { frnd_Id }, null);
			ArrayList<String> phoneNumberDuplicateArray=new ArrayList<String>(); /* Check Non-Duplicate */
		    while (phoneCursor.moveToNext()) {
		    	String phoneNumber = phoneCursor.getString(phoneCursor.getColumnIndex(NUMBER)).replaceAll("[^\\d+]", "").replaceAll(" ", "").trim();
		      boolean phoneNumberduplicateRecognizer=false;
		      for(int index=0;index<phoneNumberDuplicateArray.size();index++){
		    	String phoneNumberToRecoginze=phoneNumberDuplicateArray.get(index).toString().trim();
		    	if(phoneNumber.contains(phoneNumberToRecoginze) || 
		    		  phoneNumberToRecoginze.contains(phoneNumber)){
		    		phoneNumberduplicateRecognizer=true;
		    	}
		      }
		      if(!phoneNumberduplicateRecognizer){
		        phoneNumberDuplicateArray.add(phoneNumber);
		        phoneNumberList.add(phoneNumber);
		      }
		      
		    }
		    phoneCursor.close();
		    
		    
		    
		    /* Add Data into UsrFrndsInfo Table */
		    String user_Id="";
		    long execution_Id = userFrndsInfo.data_add_userFrndsInfo(database, frnd_Id, youCall); /* */
		    logger.info(usrContactCounter+". (contact_id="+frnd_Id+",execution_Id="+execution_Id+") "+youCall+" "+phoneNumberDuplicateArray.toString());
		   
		    for(int index=0;index<phoneNumberDuplicateArray.size();index++){
		      userFrndsContacts.data_add_userFrndsContacts(database, frnd_Id, phoneNumberDuplicateArray.get(index).toString(), user_Id,"YES","NO");
		    }
		    
		    usrContactCounter++;
		}
		
	  }
    }
    
   } catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
   finally { database.close();sqliteDatabase.close(); }
   return phoneNumberList.toString();
 }

@Override
protected String doInBackground(String... arg0) {
	
	/* Dump Contacts */
	ContentResolver contentResolver = context.getContentResolver();
	String phoneNumberList = dumpContacts(contentResolver);
	String user_Id = null;

	logger.info("phoneNumberList: "+phoneNumberList);
	
	/* */
	String[] params = new URLGenerator(context).ws_userFrndInfoDetails(user_Id, phoneNumberList);
	 WSUtility wsUtility = new WSUtility();
	 String response = wsUtility.HttpURLPOSTResponse(params);
	 logger.info("response: "+response);
	 WSRUserFrndsContacts wsrUserFrndsContacts = new WSRUserFrndsContacts(response, context);
	  					   wsrUserFrndsContacts.funcTrigger_usrFrndsContacts();
  return null;
}

@Override  
protected void onPostExecute(String response) { }

}
