/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.mlh.basic.url;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsServiceURL {
 public static final String SERVICE_URL="http://localhost/mlh/android-web/backend/php/dac/controller.module.app.user.friends.php";
 public String sendUserFrndRequestsParameters(){
   StringBuilder params = new StringBuilder();
   params.append(SERVICE_URL).append("?action=SEND_USERFRND_REQUESTS&");
   params.append("projectURL=http://localhost/mlh/android-web/&");
   params.append("from_user_Id=USR255798352927&");
   params.append("to_user_Id=USR113561617186");
   return params.toString();
 }
         // SEND_USERFRND_REQUESTS
}
