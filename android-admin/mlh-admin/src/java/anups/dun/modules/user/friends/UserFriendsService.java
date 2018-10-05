/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.friends;

import anups.dun.modules.user.authentication.UserInformationURL;
import anups.dun.utils.WSUtility;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsService {
public static final Logger logger = Logger.getLogger(UserFriendsService.class); 
     
 public String service_recieveFriendrequestFromUser(String projectURL, 
         String from_userId, String to_userId){
   UserFriendsURL userFriendsURL = new UserFriendsURL();
   String url = userFriendsURL.url_recieveFriendrequestFromUser(projectURL, from_userId, to_userId);
   logger.info("URL: "+url);
   String response = new WSUtility().httpGETRequest(url);
   logger.info("response: "+response);
   return response;
 } 
 
 public String service_acceptFriendrequest(String from_userId, String to_userId){
   UserFriendsURL userFriendsURL = new UserFriendsURL();
   String url = userFriendsURL.url_addToFriendList(from_userId,to_userId);
      String response = new WSUtility().httpGETRequest(url);
      logger.info("response: "+response);
   return response;
 }
}
