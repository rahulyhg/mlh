/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.actions;

import anups.dun.modules.user.friends.UserFriendsService;
import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletConfig;
import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.log4j.Logger;
import org.apache.log4j.xml.DOMConfigurator;

/**
 *
 * @author N.L.N.Rao
 */
public class UserFriendsModule extends HttpServlet {
 public static final Logger logger = Logger.getLogger(UserFriendsModule.class);
  @Override
  protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
    response.setContentType("text/html;charset=UTF-8");
    PrintWriter out = response.getWriter();
    String action= (String) request.getParameter("action");
    if("RECEIVE_USERFRIEND_REQUEST".equalsIgnoreCase(action)){ 
      String projectURL = (String) request.getParameter("projectURL");
      String from_userId = (String) request.getParameter("from_userId");
      String to_userId = (String) request.getParameter("to_userId");
      new UserFriendsService().service_recieveFriendrequestFromUser(projectURL,from_userId, to_userId); 
     logger.info("Test");
    }
    else if("ACCEPT_USERFRIEND_REQUEST".equalsIgnoreCase(action)){ 
      String from_userId = (String) request.getParameter("from_userId");
      String to_userId = (String) request.getParameter("to_userId");
      new UserFriendsService().service_acceptFriendrequest(from_userId, to_userId);
    }
    out.close();
  }
}
