/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.actions;

import anups.dun.modules.community.professional.CommunityInformationService;
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
public class CommunityProfessionalModule extends HttpServlet {
 public static final Logger logger = Logger.getLogger(CommunityProfessionalModule.class);
 @Override
 protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
  response.setContentType("text/html;charset=UTF-8");
  PrintWriter out = response.getWriter();
  String action = (String) request.getParameter("action");
   if("GETCOMMUNITYIDLIST".equalsIgnoreCase(action)) {
    out.println(new CommunityInformationService().service_getCommunityIdList());
   } else if("REQUEST_LOCAL_BRANCH".equalsIgnoreCase(action)){
        String union_Id = (String) request.getParameter("union_Id");
        String minlocation = (String) request.getParameter("minlocation");
        String location = (String) request.getParameter("location");
        String state = (String) request.getParameter("state");
        String country = (String) request.getParameter("country"); 
        String reqBy = (String) request.getParameter("reqBy");
        new CommunityInformationService().service_requestLocalBranch(union_Id, minlocation, location, 
                    state, country, reqBy);
   }
  out.close();
 }
}
