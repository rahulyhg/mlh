/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.modules.user.friends;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Random;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsQueries {
 public String query_recieveFriendrequestFromUser(String from_userId, String to_userId){
  StringBuilder query=new StringBuilder();
  String req_Id="TEST"+new Random().nextInt(50);
  String timeStamp = new SimpleDateFormat("yyyy.MM.dd.HH.mm.ss").format(new Date());
  query.append("INSERT INTO user_frnds_req(req_Id, from_userId, to_userId,");
  query.append("usr_frm_call_to, usr_to_call_from, req_on, req_tz, notify) ");
  query.append("VALUES ('").append(req_Id).append("','").append(from_userId);
  query.append("','").append(to_userId).append("','TEST_FRIEND','TEST_FRIEND','");
  query.append(timeStamp).append("','Asia/Kolkata','N');");
   return query.toString();
 }
 /* Accept Friend Request by Any one of the User */
 public String query_deleteFriendrequest(String from_userId, String to_userId){
  StringBuilder query=new StringBuilder();
   query.append("DELETE FROM user_frnds_req WHERE ");
   query.append("(from_userId='").append(from_userId).append("' AND to_userId='").append(to_userId).append("') OR ");
   query.append("(from_userId='").append(to_userId).append("' AND to_userId='").append(from_userId).append("'); ");
  return query.toString();
 }
 
 public String query_addToFriendList(String from_userId, String to_userId){
  StringBuilder query=new StringBuilder(); 
  String rel_Id="TEST"+new Random().nextInt(50);
  String rel_from=new SimpleDateFormat("yyyy.MM.dd.HH.mm.ss").format(new Date());
  query.append("INSERT INTO user_frnds(rel_Id, rel_from, rel_tz, frnd1, frnd2, frnd1_call_frnd2, frnd2_call_frnd1, ");
  query.append("notify) VALUES ('").append(rel_Id).append("','").append(rel_from).append("','Asia/Kolkata','");
  query.append(from_userId).append("','").append(to_userId).append("','TEST_FRIEND','TEST_FRIEND','N');");
  return query.toString();      
 }
 
}
