/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.friends;

import anups.dun.uils.Database;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsService {
    
 public void service_recieveFriendrequestFromUser(String from_userId, String to_userId){
  String query=new UserFriendsQueries().query_recieveFriendrequestFromUser(from_userId, to_userId);
  new Database().insertUpdateDeleteDataFromQuery(query);  
 } 
 
 public void service_acceptFriendrequest(String from_userId, String to_userId){
     UserFriendsQueries userFriendsQueries = new UserFriendsQueries();
     Database database = new Database();
     String query1=userFriendsQueries.query_deleteFriendrequest(from_userId, to_userId);
     database.insertUpdateDeleteDataFromQuery(query1);
     String query2=userFriendsQueries.query_addToFriendList(from_userId, to_userId);
     database.insertUpdateDeleteDataFromQuery(query2);
 }
}
