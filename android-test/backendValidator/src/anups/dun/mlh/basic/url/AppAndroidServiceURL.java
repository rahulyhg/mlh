/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.mlh.basic.url;

import anups.dun.mlh.basic.data.AppAndroidServiceData;

/**
 *
 * @author N.L.N.Rao
 */
public class AppAndroidServiceURL {
  public static final String SERVICE_URL="http://localhost/mlh/android-web/backend/php/dac/controller.module.app.android.service.php";
  
  public String userDumpFriendsServiceParameters(){
     AppAndroidServiceData appAndroidServiceData = new AppAndroidServiceData();
     AppAndroidServiceData.UserDumpFriendsService userDumpFriendsService = appAndroidServiceData.new UserDumpFriendsService();
     StringBuilder params = new StringBuilder();
     params.append("action=").append("SERVICE_USRDUMPFRNDS").append("&");
     params.append("user_Id=").append(userDumpFriendsService.USER_ID).append("&");
     params.append("phoneNumbersList=[");
     for(int index=0;index<userDumpFriendsService.PHONENUMBERS.length;index++){
       params.append(userDumpFriendsService.PHONENUMBERS[index].toString()).append(",");
     }
     params.deleteCharAt(params.length()-1);
     params.append("]");
     return params.toString();
  }
  
  
}
