package anups.dun.notify.ws.response;

import java.text.SimpleDateFormat;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import android.content.Context;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.BusinessConstants;
import anups.dun.js.AppSessionManagement;
import anups.dun.notify.minute.NotifiedUpdateOnCentralServer;
import anups.dun.util.AndroidLogger;
import anups.dun.util.DateAndTimeUtility;
import anups.dun.util.PushNotification;
import anups.dun.web.templates.URLGenerator;

public class WSRIntervalMinute {
	org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSRIntervalMinute.class);
/*
  RESPONSE:
 {"usrFrndReqRecieved":[{"from_userId":"USR113561617186","username":"Achuth","surName":"Achuytham","name":"Achuytham","req_on":"2018-06-01 16:29:12"}],
 "usrFrndReqAccepted":[{"rel_Id":"FREL113163289416289671228","rel_from":"2018-07-03 18:01:27","rel_tz":"Asia\/Kolkata",
 "requestSent":"[{\"frnd1\":\"USR255798352927\",\"surName\":Srirambhatla\",\"name\":\"Saiteja\",\"frnd1_call_frnd2\":\"My LocalHook Friend\"}]",
 "requestrecieved":"[{\"frnd2\":\"USR924357814934\",\"surName\":Nellutla\",\"name\":\"Anup Chakravarthi\",\"frnd2_call_frnd1\":\"My LocalHook Friend\"}]"}],
 "usrReqUnionLocalBranch":[{"requestedBy":"[{\"user_Id\":\"USR128879133554\",\"surName\":\"Santhu\",\"name\":\"Santo\"}]","unionName":"MyLocalHook",
 "minlocation":"Kukatpally","location":"Ranga Reddy District","state":"Telangana","country":"India","reqOn":"2018-07-04 14:38:46"}],
 "unionMemReqRecieved":[{"surName":"Achuytham","name":"Achuytham","union_Id":"UPA533731685151","unionName":"MyLocalHook","sent_On":"2018-07-04 13:57:59"}],
 "unionMemReqAccepted":[{"member_Id":"UMI743487279149","unionInfo":"[{\"union_Id\":\"UPA533731685151\",\"unionName\":\"MyLocalHook\",
 \"profile_pic\":\"https:\/\/res.cloudinary.com\/dbcyhclaw\/image\/upload\/x_856,y_436,w_208,h_208,z_0.4315,c_crop\/v1529503339\/Screenshot_20180619-135815_osobbt.png\"}]",
 "branchInfo":"[{\"minlocation\":\"L. B. Nagar\",\"location\":\"Ranga Reddy District\",\"state\":\"Telangana\",\"country\":\"India\"}]",
 "memberJoinedInfo":"[{\"user_Id\":\"USR924357814934\",\"username\":\"anups\",\"surName\":\"Nellutla\",\"name\":\"Anup Chakravarthi\",
 \"memAddedOn\":\"0000-00-00 00:00:00\"}]","roleName":"Founder and CEO","cur_role_Id":"PUR3123769563188899796114","memberJoinedByInfo":null}],
 "unionMemOnRoleChange":[{"unionInfo":"[{\"unionName\":\"MyLocalHook\",
 \"profile_pic\":\"https:\/\/res.cloudinary.com\/dbcyhclaw\/image\/upload\/x_856,y_436,w_208,h_208,z_0.4315,c_crop\/v1529503339\/Screenshot_20180619-135815_osobbt.png\"}]"
 ,"branchInfo":"[{\"minlocation\":\"L. B. Nagar\",\"location\":\"Ranga Reddy District\",\"state\":\"Telangana\",\"country\":\"India\"}]",
 "cur_role_Id":"PUR3123769563188899796114","curRoleName":"Founder and CEO","prev_role_Id":"","prevRoleName":null,"roleUpdatedOn":"0000-00-00 00:00:00"}],
 "unionMemRolePermUpdated":[{"union_Id":"UPA533731685151","unionName":"MyLocalHook","minlocation":"L. B. Nagar","location":"Ranga Reddy District","state":"Telangana",
 "country":"India","roleName":"Founder and CEO","createABranch":"","createABranchNotify":"Y","updateBranchInfo":"","updateBranchInfoNotify":"","deleteBranch":"",
 "deleteBranchNotify":"","shiftMainBranch":"","shiftMainBranchNotify":"","createRole":"Y","createRoleNotify":"","updateRole":"Y","updateRoleNotify":"","deleteRole":"Y",
 "deleteRoleNotify":"","requestUsersToBeMembers":"Y","requestUsersToBeMembersNotify":"","approveUsersToBeMembers":"Y","approveUsersToBeMembersNotify":"",
 "createNewsFeedBranchLevel":"Y","createNewsFeedBranchLevelNotify":"","approveNewsFeedBranchLevel":"Y","approveNewsFeedBranchLevelNotify":"","createNewsFeedUnionLevel":"Y",
 "createNewsFeedUnionLevelNotify":"","approveNewsFeedUnionLevel":"Y","approveNewsFeedUnionLevelNotify":"","createMovementBranchLevel":"Y",
 "createMovementBranchLevelNotify":"","approveMovementBranchLevel":"Y","approveMovementBranchLevelNotify":"","createMovementUnionLevel":"Y",
 "createMovementUnionLevelNotify":"","approveMovementUnionLevel":"Y","approveMovementUnionLevelNotify":"","createMovementSubDomainLevel":"Y",
 "createMovementSubDomainLevelNotify":"","approveMovementSubDomainLevel":"Y","approveMovementSubDomainLevelNotify":"","createMovementDomainLevel":"Y",
 "createMovementDomainLevelNotify":"","approveMovementDomainLevel":"Y","approveMovementDomainLevelNotify":"","updatedPermOn":"2018-07-04 14:03:10"}],
 "unionMemNewsFeed":[{"unionName":"MyLocalHook","minlocation":"L. B. Nagar","location":"Ranga Reddy District","state":"Telangana","country":"India","info_Id":"123455",
 "bizUnionId":"UPA533731685151","unionBranchId":"UB16594981664917248917333","artTitle":"NewsFeed Article Title","artShrtDesc":"NewsFeed Article Short Description",
 "artDesc":"NewsFeed Article Long Description","createdOn":"2018-07-04 10:34:13",
 "images":"https:\/\/encrypted-tbn0.gstatic.com\/images?q=tbn:ANd9GcQyFKrB7A-XT4LkxPTC41o4J2IpSBbdWqo0Njw-PdrPpCUb26gm","newsFeedType":"UNION","displayLevel":"UNION_LEVEL",
 "status":"ACTIVE"}],"unionSubscriberNewsFeed":[{"unionName":"MyLocalHook","minlocation":"L. B. Nagar","location":"Ranga Reddy District","state":"Telangana",
 "country":"India","info_Id":"123455","bizUnionId":"UPA533731685151","unionBranchId":"UB16594981664917248917333","artTitle":"NewsFeed Article Title",
 "artShrtDesc":"NewsFeed Article Short Description","artDesc":"NewsFeed Article Long Description","createdOn":"2018-07-04 10:34:13",
 "images":"https:\/\/encrypted-tbn0.gstatic.com\/images?q=tbn:ANd9GcQyFKrB7A-XT4LkxPTC41o4J2IpSBbdWqo0Njw-PdrPpCUb26gm","newsFeedType":"UNION",
 "displayLevel":"UNION_LEVEL","status":"ACTIVE"}],"unionMovements":[{"union_Id":"UPA533731685151","unionName":"MyLocalHook","move_Id":"12345","petitionTitle":"Petition",
 "createdOn":"2018-07-12 00:00:00","openOn":"0000-00-00 00:00:00"}]}
 */
	 private Context context;
	 private String response;
		
	 public WSRIntervalMinute(Context context,String response){
	  this.context=context;
	  this.response=response;
	 }
	 
	 public void funcTrigger_categoriesCookiesUpdate(){
	  try {
		AppSessionManagement appSessionManagement = new AppSessionManagement(context);
		JSONParser jsonParser = new JSONParser();
		JSONObject jsonObject = (JSONObject)jsonParser.parse(response);
		JSONArray jsonObjectArry = (JSONArray)jsonObject.get("cookies_CategoryUpdates");
		if(jsonObjectArry.size()>0){
	      JSONObject jobj = (JSONObject) jsonParser.parse(jsonObjectArry.get(0).toString());
		  String cookies_Id = (String) jobj.get("cookies_Id");
		  String cookie = (String) jobj.get("cookie");
		  String serverlastupdated = (String) jobj.get("lastupdated");
		  String appLastUpdated = (String) appSessionManagement.getAndroidSession(BusinessConstants.COOKIES_CATEGORIES_APPLASTUPDATED);
		  boolean downloadCategories = false;
		  if(appLastUpdated==null){ downloadCategories = true; }
		  else if("TS1_AFTER_TS2".equalsIgnoreCase(new DateAndTimeUtility().timestampComparator(serverlastupdated, appLastUpdated))){ downloadCategories = true; }
	      logger.info("serverlastupdated: "+serverlastupdated);
	      logger.info("appLastUpdated: "+appLastUpdated);
	      logger.info("downloadCategories: "+downloadCategories);
		  if(downloadCategories){ /* Call a Web-service to Download a File from Web Server */
			  
		  }
		}
	  } catch(Exception e){ logger.error("Exception: "+e);}
	 }
	 
	 public void funcTrigger_usrFrndReqRecieved(){
		 String notifyURL="";
		 
		 try {
		   JSONParser jsonParser = new JSONParser();
		   JSONObject jsonObject = (JSONObject)jsonParser.parse(response);
		   JSONArray jsonObjectArry = (JSONArray)jsonObject.get("usrFrndReqRecieved");
		   for(int index=0;index<jsonObjectArry.size();index++) {
			 JSONObject jobj = (JSONObject) jsonParser.parse(jsonObjectArry.get(index).toString());
			 String req_Id = (String) jobj.get("req_Id");
			 String from_userId = (String) jobj.get("from_userId");
			 String username = (String) jobj.get("username");
			 String surName = (String) jobj.get("surName");
			 String name = (String) jobj.get("name");
			 String req_on = new DateAndTimeUtility().dateFormatSetup((String) jobj.get("req_on"));
			 String notify = (String) jobj.get("notify");
			 String watched = (String) jobj.get("watched");

			 if(!"Y".equalsIgnoreCase(notify)){
			   boolean inapp = true;
			   String contentTitle = "You recieved a Friendship Request";
			   String bigContentTitle = "You recieved a Friendship Request"; // Big Title Details:
			   String contentText = surName+" "+name+" sent you Friendship Request on "+req_on; // You have recieved new message
			   String ticker = "New Friendship Request"; // New Message Alert!
			   String[] events = new String[1];
					     events[0] = new String(surName+" "+name+" sent you Friendship Request on "+req_on);
			   new PushNotification().display_closableNotification(context, notifyURL, inapp,
				    contentTitle, bigContentTitle,  contentText, ticker, events);
			   /* Mention It is Notified */
			   String[] params = new String[1];
			 		    params[0] = new URLGenerator(context).notified_frndRequestReceived(req_Id);
			   new NotifiedUpdateOnCentralServer().execute(params);
			 }
		   }
		  
		 }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	 }
	 
	 public void funcTrigger_usrFrndReqAccepted(){
		 /* "usrFrndReqAccepted":[{"rel_Id":"FREL113163289416289671228",
		 						"rel_from":"2018-07-03 18:01:27",
		 						"rel_tz":"Asia\/Kolkata",
		 						"requestSent":"[{\"frnd1\":\"USR255798352927\",\"surName\":Srirambhatla\",\"name\":\"Saiteja\",
		 						\"frnd1_call_frnd2\":\"My LocalHook Friend\"}]",
		 						"requestrecieved":"[{\"frnd2\":\"USR924357814934\",\"surName\":Nellutla\",\"name\":\"Anup Chakravarthi\",
		 						\"frnd2_call_frnd1\":\"My LocalHook Friend\"}]","notify":"Y"} 
		  
		   */
		 String notifyURL = "";
		 try {
			 JSONParser jsonParser = new JSONParser();
			 JSONObject jsonObject = (JSONObject)jsonParser.parse(response);
			 JSONArray jsonObjectArry = (JSONArray)jsonObject.get("usrFrndReqAccepted");
			 logger.info("jsonObjectArry(Size): "+jsonObjectArry.size());
			 for(int index=0;index<jsonObjectArry.size();index++) {
				JSONObject jobj = (JSONObject) jsonParser.parse(jsonObjectArry.get(index).toString());
				   
				   String rel_Id = (String) jobj.get("rel_Id");
				   String rel_from = (String) jobj.get("rel_from");
				   String rel_tz = (String) jobj.get("rel_tz");
				   
				   String requestSent = jobj.get("requestSent").toString().replaceAll("'", "\"");
				   JSONArray requestSentObjectArry = (JSONArray) jsonParser.parse(requestSent);
				   JSONObject requestSentObject = (JSONObject) requestSentObjectArry.get(0);
				   String frnd1_userId = (String) requestSentObject.get("frnd1");
				   String frnd1_surName = (String) requestSentObject.get("surName");
				   String frnd1_name = (String) requestSentObject.get("name");
				   String frnd1_call_frnd2 = (String) requestSentObject.get("frnd1_call_frnd2");
				   
				   String requestrecieved = jobj.get("requestrecieved").toString().replaceAll("'", "\"");
				   JSONArray requestrecievedObjectArry = (JSONArray) jsonParser.parse(requestrecieved);
				   JSONObject requestrecievedObject = (JSONObject) requestrecievedObjectArry.get(0);
				   String frnd2_userId = (String) requestrecievedObject.get("frnd2");
				   String frnd2_surName = (String) requestrecievedObject.get("surName");
				   String frnd2_name = (String) requestrecievedObject.get("name");
				   String frnd2_call_frnd1 = (String) requestrecievedObject.get("frnd2_call_frnd1");

			       String notify = (String) jobj.get("notify");
			   
			   if(!"Y".equalsIgnoreCase(notify)){
				   String contentTitle = "Now, ";
				   String contentText = "Now, ";
				   String bigContentTitle = "Now, ";
				   String ticker = "You had New Friend"; // New Message Alert!
				   String[] events = new String[2];
						    events[0] = new String("You had New Friend");
				   AppSessionManagement appSessionManagement = new AppSessionManagement(context);
				   if(appSessionManagement.getAndroidSession(BusinessConstants.AUTH_USER_ID).equalsIgnoreCase(frnd1_userId)){
					   contentTitle = "you and "+frnd2_surName+" "+frnd2_name+" are friends.";
					   contentText = "you and "+frnd2_surName+" "+frnd2_name+" are friends.";
					   bigContentTitle = "you and "+frnd2_surName+" "+frnd2_name+" are friends.";
					   events[1] = new String("you and "+frnd2_surName+" "+frnd2_name+" are friends.");
				   } else {
					   contentTitle = "you and "+frnd1_surName+" "+frnd1_name+" are friends.";
					   contentText = "you and "+frnd1_surName+" "+frnd1_name+" are friends.";
					   bigContentTitle = "you and "+frnd1_surName+" "+frnd1_name+" are friends.";
					   events[1] = new String("you and "+frnd1_surName+" "+frnd1_name+" are friends.");
				   }
				   boolean inapp = true;
				   new PushNotification().display_closableNotification(context, notifyURL, inapp,
					    contentTitle, bigContentTitle,  contentText, ticker, events);
				   /* Mention It is Notified */
				   String[] params = new String[1];
				 		    params[0] = new URLGenerator(context).notified_frndRequestAccepted(rel_Id);
				   new NotifiedUpdateOnCentralServer().execute(params);
			   }
		   }
		 }
		 catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
	  
	 }
	 
	 public void funcTrigger_usrReqUnionLocalBranch(){
	 /*
		 "usrReqUnionLocalBranch":[{"requestedBy":"[{\"user_Id\":\"USR128879133554\",\"surName\":\"Santhu\",\"name\":\"Santo\"}]",
		 "unionName":"MyLocalHook","minlocation":"Kukatpally","location":"Ranga Reddy District","state":"Telangana","country":"India",
		 "reqOn":"2018-07-04 14:38:46"}]
	  */
	 }
	 
	 public void funcTrigger_unionMemReqRecieved(){
	 /*
	   "unionMemReqRecieved":[{"surName":"Achuytham","name":"Achuytham","union_Id":"UPA533731685151","unionName":"MyLocalHook","sent_On":"2018-07-04 13:57:59"}],
	  */
	 }
	 
	 public void funcTrigger_unionMemReqAccepted(){
	 /*
	   "unionMemReqAccepted":[{"member_Id":"UMI743487279149","unionInfo":"[{\"union_Id\":\"UPA533731685151\",\"unionName\":\"MyLocalHook\",
	   \"profile_pic\":\"https:\/\/res.cloudinary.com\/dbcyhclaw\/image\/upload\/x_856,y_436,w_208,h_208,z_0.4315,c_crop\/v1529503339\/Screenshot_20180619-135815_osobbt.png\"}]",
	   "branchInfo":"[{\"minlocation\":\"L. B. Nagar\",\"location\":\"Ranga Reddy District\",\"state\":\"Telangana\",\"country\":\"India\"}]",
	   "memberJoinedInfo":"[{\"user_Id\":\"USR924357814934\",\"username\":\"anups\",\"surName\":\"Nellutla\",\"name\":\"Anup Chakravarthi\",
	   \"memAddedOn\":\"0000-00-00 00:00:00\"}]","roleName":"Founder and CEO","cur_role_Id":"PUR3123769563188899796114","memberJoinedByInfo":null}]
	  */
	 }
	 
     public void funcTrigger_unionMemOnRoleChange(){
	 /*
	   "unionMemOnRoleChange":[{"unionInfo":"[{\"unionName\":\"MyLocalHook\",
	   \"profile_pic\":\"https:\/\/res.cloudinary.com\/dbcyhclaw\/image\/upload\/x_856,y_436,w_208,h_208,z_0.4315,c_crop\/v1529503339\/Screenshot_20180619-135815_osobbt.png\"}]",
	   "branchInfo":"[{\"minlocation\":\"L. B. Nagar\",\"location\":\"Ranga Reddy District\",\"state\":\"Telangana\",\"country\":\"India\"}]",
	   "cur_role_Id":"PUR3123769563188899796114","curRoleName":"Founder and CEO","prev_role_Id":"","prevRoleName":null,"roleUpdatedOn":"0000-00-00 00:00:00"}]
	  */
	 }

     public void funcTrigger_unionMemRolePermUpdated(){
	 /*
	   ,"unionMemRolePermUpdated":[{"union_Id":"UPA533731685151","unionName":"MyLocalHook","minlocation":"L. B. Nagar","location":"Ranga Reddy District",
	   "state":"Telangana","country":"India","roleName":"Founder and CEO","createABranch":"","createABranchNotify":"Y","updateBranchInfo":"","updateBranchInfoNotify":"",
	   "deleteBranch":"","deleteBranchNotify":"","shiftMainBranch":"","shiftMainBranchNotify":"","createRole":"Y","createRoleNotify":"","updateRole":"Y",
	   "updateRoleNotify":"","deleteRole":"Y","deleteRoleNotify":"","requestUsersToBeMembers":"Y","requestUsersToBeMembersNotify":"","approveUsersToBeMembers":"Y",
	   "approveUsersToBeMembersNotify":"","createNewsFeedBranchLevel":"Y","createNewsFeedBranchLevelNotify":"","approveNewsFeedBranchLevel":"Y",
	   "approveNewsFeedBranchLevelNotify":"","createNewsFeedUnionLevel":"Y","createNewsFeedUnionLevelNotify":"","approveNewsFeedUnionLevel":"Y",
	   "approveNewsFeedUnionLevelNotify":"","createMovementBranchLevel":"Y","createMovementBranchLevelNotify":"","approveMovementBranchLevel":"Y",
	   "approveMovementBranchLevelNotify":"","createMovementUnionLevel":"Y","createMovementUnionLevelNotify":"","approveMovementUnionLevel":"Y",
	   "approveMovementUnionLevelNotify":"","createMovementSubDomainLevel":"Y","createMovementSubDomainLevelNotify":"","approveMovementSubDomainLevel":"Y",
	   "approveMovementSubDomainLevelNotify":"","createMovementDomainLevel":"Y","createMovementDomainLevelNotify":"","approveMovementDomainLevel":"Y",
	   "approveMovementDomainLevelNotify":"","updatedPermOn":"2018-07-04 14:03:10"}],
	  */
	 }
     
     public void funcTrigger_unionMemNewsFeed(){
	 /*
	  "unionMemNewsFeed":[{"unionName":"MyLocalHook","minlocation":"L. B. Nagar","location":"Ranga Reddy District","state":"Telangana","country":"India",
	  "info_Id":"123455","bizUnionId":"UPA533731685151","unionBranchId":"UB16594981664917248917333","artTitle":"NewsFeed Article Title",
	  "artShrtDesc":"NewsFeed Article Short Description","artDesc":"NewsFeed Article Long Description","createdOn":"2018-07-04 10:34:13",
	  "images":"https:\/\/encrypted-tbn0.gstatic.com\/images?q=tbn:ANd9GcQyFKrB7A-XT4LkxPTC41o4J2IpSBbdWqo0Njw-PdrPpCUb26gm","newsFeedType":"UNION",
	  "displayLevel":"UNION_LEVEL","status":"ACTIVE"}]
	  */
	 }

     public void funcTrigger_unionSubscriberNewsFeed(){
	 /*
	   ,"unionSubscriberNewsFeed":[{"unionName":"MyLocalHook","minlocation":"L. B. Nagar","location":"Ranga Reddy District","state":"Telangana","country":"India",
	   "info_Id":"123455","bizUnionId":"UPA533731685151","unionBranchId":"UB16594981664917248917333","artTitle":"NewsFeed Article Title",
	   "artShrtDesc":"NewsFeed Article Short Description","artDesc":"NewsFeed Article Long Description","createdOn":"2018-07-04 10:34:13",
	   "images":"https:\/\/encrypted-tbn0.gstatic.com\/images?q=tbn:ANd9GcQyFKrB7A-XT4LkxPTC41o4J2IpSBbdWqo0Njw-PdrPpCUb26gm","newsFeedType":"UNION",
	   "displayLevel":"UNION_LEVEL","status":"ACTIVE"}]
	  */
	 }
     
     public void funcTrigger_unionMovements(){
	 /*
	   "unionMovements":[{"union_Id":"UPA533731685151","unionName":"MyLocalHook","move_Id":"12345","petitionTitle":"Petition","createdOn":"2018-07-12 00:00:00","openOn":"0000-00-00 00:00:00"}]
	  */
	 }
     
}
