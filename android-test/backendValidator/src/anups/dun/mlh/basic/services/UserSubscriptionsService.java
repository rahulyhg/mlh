/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.mlh.basic.services;

/**
 *
 * @author Kishore_Nellutla
 */
public class UserSubscriptionsService {
    public String setUserSubscriptionServiceParameters(){
     StringBuilder params = new StringBuilder();
                   params.append("action=").append("SET_USER_SUBSCRIPTION").append("&");
                   params.append("user_Id=").append("").append("&");
                   params.append("AUTH_USER_SUBSCRIPTIONS_LIST=[");
        return null;
    }
}
