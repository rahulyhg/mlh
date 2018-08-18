/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.app.services;

import anups.dun.mlh.basic.url.UserFriendsServiceURL;
import anups.dun.utils.URLRequestService;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsService {
  public static final String SERVICE_URL="http://localhost/mlh/android-web/backend/php/dac/controller.module.app.user.friends.php";
  
  public String sendUserFrndRequests(){ /* SEND_USERFRND_REQUESTS */
      StringBuilder urlWithparams = new StringBuilder();
                    urlWithparams.append(SERVICE_URL).append("?action=SEND_USERFRND_REQUESTS&");
                    urlWithparams.append("projectURL=http://localhost/mlh/android-web/&");
                    urlWithparams.append("from_user_Id=USR255798352927&");
                    urlWithparams.append("to_user_Id=USR113561617186");
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendGetRequest(urlWithparams.toString());
    return response;
  }
    
  public String acceptFrndRequestToMe(){
     StringBuilder urlWithparams = new StringBuilder();
                   urlWithparams.append(SERVICE_URL).append("?action=ACCEPT_FRNDREQUEST_TO_ME&");
                   urlWithparams.append("requestFrom=USR255798352927&");
                   urlWithparams.append("user_Id=USR113561617186");
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendGetRequest(urlWithparams.toString());
    return response;
  }
  
  public String deleteARequestSent(){
      StringBuilder urlWithparams = new StringBuilder();
                    urlWithparams.append(SERVICE_URL).append("?action=DELETE_A_REQUEST_SENT&");
                    urlWithparams.append("from_userId=USR255798352927&");
                    urlWithparams.append("to_userId=USR113561617186");
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendGetRequest(urlWithparams.toString());
    return response;
  }
  
  public String unFriendAPerson(){
      StringBuilder urlWithparams = new StringBuilder();
                    urlWithparams.append(SERVICE_URL).append("?action=UNFRIEND_A_PERSON&");
                    urlWithparams.append("frnd1=USR255798352927&");
                    urlWithparams.append("frnd2=USR113561617186");
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendGetRequest(urlWithparams.toString());
    return response;
  }
  
  public static void main(String args[]){
    // System.out.println("sendUserFrndRequests: "+new UserFriendsService().sendUserFrndRequests());
    // System.out.println("deleteARequestSent: "+new UserFriendsService().deleteARequestSent());
    // System.out.println("acceptFrndRequestToMe: "+new UserFriendsService().acceptFrndRequestToMe());
     System.out.println("unFriendAPerson: "+new UserFriendsService().unFriendAPerson());
  }
}
