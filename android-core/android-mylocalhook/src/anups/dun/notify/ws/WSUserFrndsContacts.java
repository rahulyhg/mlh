package anups.dun.notify.ws;

import java.util.ArrayList;
import android.content.ContentResolver;
import android.content.Context;
import android.database.Cursor;
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
	 ArrayList<String> phoneNumberList=new ArrayList<String>();
  try {
    Database database =Database.getInstance(context);
    
    UserFrndsInfo userFrndsInfo = new UserFrndsInfo();
    UserFrndsContacts userFrndsContacts = new UserFrndsContacts();
  
    /* GETS LIST OF CONTACTS */
    String phoneNumber = null;
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
		String contact_id = cursor.getString(cursor.getColumnIndex( _ID ));
		String name = cursor.getString(cursor.getColumnIndex( DISPLAY_NAME ));
		int hasPhoneNumber = Integer.parseInt(cursor.getString(cursor.getColumnIndex( HAS_PHONE_NUMBER )));
		 
		/* Check contact_id exists or not */
		// if(userFrndsInfo.data_count_usrFrndInfo(database, contact_id)>0){
			
			/* If Exists, UPDATE */
		//	String user_Id=null;String username=null;String surName=null;String fullName=null;String relationship=null;
		//	String country=null;String state=null;String location=null;String minlocation=null;String isContacts=null;String isFriend=null;String createdOn=null;
		//	boolean status = userFrndsInfo.data_update_usrFrndInfo(database, Long.parseLong(contact_id), user_Id, username, surName, fullName, name,
		//			relationship, country, state, location, minlocation, isContacts, isFriend, createdOn);
		// }
		// else { /* Else, ADD */
		//	long frnd_Id = userFrndsInfo.data_add_usrFrndInfo(database,contact_id,"","", "", name, "", "", "", "", "", "","YES","NO","");
		//}
		
		if(hasPhoneNumber > 0) {
			
		    // Query and loop for every phone number of the contact
			Cursor phoneCursor = contentResolver.query(PhoneCONTENT_URI, null, Phone_CONTACT_ID + " = ?", new String[] { contact_id }, null);
			ArrayList<String> phoneNumberDuplicateArray=new ArrayList<String>(); /* Check Non-Duplicate */
		    while (phoneCursor.moveToNext()) {
		      phoneNumber = phoneCursor.getString(phoneCursor.getColumnIndex(NUMBER)).replaceAll("[^\\d+]", "").replaceAll(" ", "");
		      boolean phoneNumberduplicateRecognizer=false;
		      for(int index=0;index<phoneNumberDuplicateArray.size();index++){
		    	if(phoneNumberDuplicateArray.get(index).equalsIgnoreCase(phoneNumber)){
		    		phoneNumberduplicateRecognizer=true;
		    	}
		      }
		      if(!phoneNumberduplicateRecognizer){
		        phoneNumberDuplicateArray.add(phoneNumber);
		        phoneNumberList.add(phoneNumber);
		      }
		      /*  Check Exists or not */
		     // if(userFrndsContacts.data_count_usrFrndContacts(database, Long.parseLong(contact_id), phoneNumber)>0){
		    	 /* If Exists, UPDATE */
		    //	  int status = userFrndsContacts.data_update_usrFrndContacts(database, contact_id, phoneNumber);
		    //  }
		     // else { /* Else, ADD */
		    //	 
		    	  
		    //  }
		      
		    }
		    phoneCursor.close();
		    logger.info(usrContactCounter+". (contact_id="+contact_id+")"+name+" "+phoneNumberDuplicateArray.toString());
		    
		    long status =  userFrndsContacts.data_add_userFrndsContacts(database, Long.parseLong(contact_id), phoneNumber);
		}
		usrContactCounter++;
	  }
    }
  
    database.close();
    
  } catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
   return phoneNumberList.toString();
 }

@Override
protected String doInBackground(String... arg0) {
	/* Drop Tables and Recreate Table */
	
	/* Dump Contacts */
	ContentResolver contentResolver = context.getContentResolver();
	String phoneNumberList = dumpContacts(contentResolver);
	String user_Id = null;

	logger.info("phoneNumberList: "+phoneNumberList);
	
	/* */
	String[] params = new URLGenerator().ws_userFrndInfoDetails(user_Id, phoneNumberList);
	 WSUtility wsUtility = new WSUtility();
	 return wsUtility.HttpURLPOSTResponse(params);
	
}

@Override  
protected void onPostExecute(String response) {
  logger.info("response: "+response);
  WSRUserFrndsContacts wsrUserFrndsContacts = new WSRUserFrndsContacts(response, context);
  wsrUserFrndsContacts.funcTrigger_usrFrndsContacts();
}

}
