/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.mlh.basic.services;

import anups.dun.mlh.basic.url.AppAndroidServiceURL;
import anups.dun.utils.URLRequestService;

/**
 * POST SERVICE
 * @author N.L.N.Rao
 */
public class AppAndroidService {
  public String userDumpFriendsService(){ /* SERVICE_USRDUMPFRNDS*/
    AppAndroidServiceURL appAndroidServiceURL = new AppAndroidServiceURL();
    URLRequestService urlRequestService = new URLRequestService();
    String response = urlRequestService.sendPostRequest(AppAndroidServiceURL.SERVICE_URL, 
            appAndroidServiceURL.userDumpFriendsServiceParameters());
    return response;
  }
  
  public static void main(String args[]){
    System.out.println(new AppAndroidService().userDumpFriendsService());
  }
}
