/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.module.notifications;

import anups.dun.utils.WSUtility;

/**
 *
 * @author N.L.N.Rao
 */
public class AndroidService {
 public static final String url = "http://localhost/mlh/android-web/backend/php/dac/controller.module.app.android.service.php";
 public void serviceIntervalMinute(){
  StringBuilder urlParameters = new StringBuilder();
     urlParameters.append("action=SERVICE_INTERVALMINUTE").append("&user_Id=USR924357814934");
     urlParameters.append("&gps_latitude=0.00").append("&gps_longitude=0.00");
  WSUtility wsUtility = new WSUtility();
  String response = wsUtility.httpPOSTRequest(url, urlParameters.toString());
  System.out.println(response);
 }
 public static void main(String args[]){
   new AndroidService().serviceIntervalMinute();
 }
}
