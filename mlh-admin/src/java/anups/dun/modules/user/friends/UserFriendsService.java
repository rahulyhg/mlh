/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.friends;

import anups.dun.uils.WSUtility;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsService {
    
 public String service_recieveFriendrequestFromUser(String projectURL, 
         String from_userId, String to_userId){
   UserFriendsURL userFriendsURL = new UserFriendsURL();
   String url = userFriendsURL.url_recieveFriendrequestFromUser(projectURL, from_userId, to_userId);
   return new WSUtility().httpGETRequest(url);
 } 
 
 public String service_acceptFriendrequest(String from_userId, String to_userId){
   UserFriendsURL userFriendsURL = new UserFriendsURL();
   String url = userFriendsURL.url_addToFriendList(from_userId,to_userId);
   return new WSUtility().httpGETRequest(url);
 }
}
