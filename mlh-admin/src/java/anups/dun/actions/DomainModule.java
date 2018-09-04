/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.actions;

import anups.dun.modules.domain.DomainService;
import java.io.IOException;
import java.io.PrintWriter;
import static java.lang.System.out;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author N.L.N.Rao
 */
public class DomainModule extends HttpServlet {
@Override
protected void doGet(HttpServletRequest request, HttpServletResponse response)
 throws ServletException, IOException {
  response.setContentType("text/html;charset=UTF-8");
  PrintWriter out = response.getWriter();
  String action= (String) request.getParameter("action");
  if("GETDOMAINLIST".equalsIgnoreCase(action)){ 
    out.println(new DomainService().service_getDomainList());
  }
  out.close();
}
}
