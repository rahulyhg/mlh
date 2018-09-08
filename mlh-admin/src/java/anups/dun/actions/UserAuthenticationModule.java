/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.actions;

import anups.dun.modules.user.authentication.UserInformationService;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class UserAuthenticationModule extends HttpServlet {
 public static final Logger logger = Logger.getLogger(UserAuthenticationModule.class);
  @Override
  protected void doGet(HttpServletRequest request, HttpServletResponse response)
           throws ServletException, IOException {
   response.setContentType("text/html;charset=UTF-8");
  PrintWriter out = response.getWriter();
  String action= (String) request.getParameter("action");
  if("GET_COUNT_USERIDLIST".equalsIgnoreCase(action)){ 
    out.println(new UserInformationService().service_count_getUserIdList());
  } else if("GET_DATA_USERIDLIST".equalsIgnoreCase(action)){ 
    String limit_start = (String) request.getParameter("limit_start");
    String limit_end = (String) request.getParameter("limit_end");
    out.println(new UserInformationService().service_data_getUserIdList(limit_start, limit_end));
  } else if("GETUSERINFORMATIONBYID".equalsIgnoreCase(action)){
    String user_Id = (String) request.getParameter("user_Id");
    out.println(new UserInformationService().service_getUserInformation(user_Id));
  }
  out.close();
  }
}
