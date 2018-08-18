/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.mlh.basic.services;

import anups.dun.mlh.basic.url.UserFriendsServiceURL;
import anups.dun.utils.URLRequestService;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsService {
    
  public String sendUserFrndRequests(){ /* SEND_USERFRND_REQUESTS */
    UserFriendsServiceURL userFriendsServiceURL = new UserFriendsServiceURL();
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendGetRequest(userFriendsServiceURL.sendUserFrndRequestsParameters());
    return response;
  }
    
  public static void main(String args[]){
     System.out.println("sendUserFrndRequests: "+new UserFriendsService().sendUserFrndRequests());
  }
}
