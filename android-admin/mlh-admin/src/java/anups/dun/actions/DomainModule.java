/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.actions;

import anups.dun.modules.domain.DomainService;
import anups.dun.modules.subscriptions.CRUDService;
import anups.dun.utils.CommandService;
import anups.dun.utils.FileUtility;
import anups.dun.utils.GeneralUtility;
import java.io.IOException;
import java.io.PrintWriter;
import static java.lang.System.out;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.apache.log4j.Logger;

/**
 *
 * @author N.L.N.Rao
 */
public class DomainModule extends HttpServlet {
public static final Logger logger = Logger.getLogger(DomainModule.class);
@Override
protected void doGet(HttpServletRequest request, HttpServletResponse response)
 throws ServletException, IOException {
  response.setContentType("text/html;charset=UTF-8");
  PrintWriter out = response.getWriter();
  String action= (String) request.getParameter("action");
  try {
      if("GETDOMAINLIST".equalsIgnoreCase(action)){ 
        out.println(new DomainService().service_getDomainList());
      }
   else if("ADD_NEW_CATEGORY".equalsIgnoreCase(action)){
    String category_Id = (String) request.getParameter("category_Id");
    String categoryName = (String) request.getParameter("categoryName");
    CRUDService crudService  = new CRUDService();
    out.println(crudService.createNewCategory(category_Id, categoryName));
   }
   else if("GENERATE_CATEGORIES_JSONFILE".equalsIgnoreCase(action)){
    String db_url = (String) request.getParameter("db_url");
    String username = (String) request.getParameter("username");
    String password = (String) request.getParameter("password");
    GeneralUtility generalUtility = new GeneralUtility();
    
    StringBuilder command = new StringBuilder();
    command.append("java -Xmx4G -Xms2G -jar ");
    command.append(generalUtility.getProjectPath());
    command.append("web/gen-build/build-JSON-categories/mlh-categories.jar ");
    command.append(db_url).append(" ").append(username).append(" ").append(password).append(" ");
    command.append(generalUtility.getProjectPath()).append("web/data/");
    command.append(" categories.json");
    out.println(command.toString());
    try {
    CommandService commandService = new CommandService();
    commandService.runBatchFile(command.toString());
    } catch(Exception e ){ e.printStackTrace(); }
   }
  } finally {  out.close();  }
  
  out.close();
}
}
