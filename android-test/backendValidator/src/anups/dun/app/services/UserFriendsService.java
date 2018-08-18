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
    
  public static void main(String args[]){
     System.out.println("sendUserFrndRequests: "+new UserFriendsService().sendUserFrndRequests());
  }
}
