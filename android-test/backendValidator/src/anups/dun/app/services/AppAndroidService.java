/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.app.services;

import anups.dun.utils.URLRequestService;

/**
 *
 * @author N.L.N.Rao
 */
public class AppAndroidService {
 public static final String SERVICE_URL="http://localhost/mlh/android-web/backend/php/dac/controller.module.app.android.service.php";
 public String serviceIntervalMinute(String user_Id, String gps_latitude, String gps_longitude){
  StringBuilder urlParameters = new StringBuilder();
  urlParameters.append("action=SERVICE_INTERVALMINUTE&user_Id=").append(user_Id);
  urlParameters.append("&gps_latitude=").append(gps_latitude).append("&gps_longitude=").append(gps_longitude);
  String response = new URLRequestService().sendPostRequest(SERVICE_URL, urlParameters.toString());
  return response;
 }
 
 public static void main(String args[]){
   AppAndroidService appAndroidService = new AppAndroidService();
   System.out.println(appAndroidService.serviceIntervalMinute("USR255798352927", "17.29", "78.55"));
 }
}
