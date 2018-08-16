/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.mlh.basic.url;

import anups.dun.mlh.basic.services.UserSubscriptionsService;
import anups.dun.utils.URLRequestService;

/**
 *
 * @author N.L.N.Rao
 */
public class UserSubcriptionsServiceURL {
  public static final String SERVICE_URL="http://localhost/mlh/android-web/backend/php/dac/controller.module.app.user.subscriptions.php";  
  public String setUserSubscriptionService(){
    UserSubscriptionsService userSubscriptionsService=new UserSubscriptionsService();
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendPostRequest(UserSubcriptionsServiceURL.SERVICE_URL, 
            userSubscriptionsService.setUserSubscriptionServiceParameters());
    return response;
  }
  
}
