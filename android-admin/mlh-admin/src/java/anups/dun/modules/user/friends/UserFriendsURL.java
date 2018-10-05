/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.friends;

import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsURL {
 public static final Logger logger = Logger.getLogger(UserFriendsURL.class); 
  private static final String URL="http://192.168.1.4/mlh/android-web/backend/php/dac/controller.module.app.user.friends.php";

  public String url_recieveFriendrequestFromUser(String projectURL, String from_userId, String to_userId){
   StringBuilder sb = new StringBuilder(URL);
                 sb.append("?action=SEND_USERFRND_REQUESTS&projectURL=").append(projectURL);
                 sb.append("&from_user_Id=").append(from_userId).append("&to_user_Id=").append(to_userId);
   return sb.toString();
  }
  
  public String url_deleteFriendrequest(String from_userId, String to_userId){
     StringBuilder sb = new StringBuilder(URL);
     sb.append("?action=DELETE_A_REQUEST_SENT&from_userId=").append(from_userId);
     sb.append("&to_userId=").append(to_userId);
     return sb.toString();
  }
  
  public String url_addToFriendList(String from_userId, String to_userId){
     StringBuilder sb = new StringBuilder(URL);
     sb.append("?action=ACCEPT_FRNDREQUEST_TO_ME&requestFrom=").append(from_userId);
     sb.append("&user_Id=").append(to_userId);
     return sb.toString();
  } 
}
