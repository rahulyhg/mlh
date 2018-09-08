/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.actions;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletConfig;
import javax.servlet.ServletContextEvent;
import javax.servlet.ServletContextListener;
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
public class ApplicationStartupModule implements ServletContextListener {
  public static final String LOG4JFILEPATH="C:\\wamp\\www\\mlh\\mlh-admin\\web\\WEB-INF\\log4j.xml";
  public static final Logger logger = Logger.getLogger(ApplicationStartupModule.class);
  
  @Override
  public void contextInitialized(ServletContextEvent sce) {
    DOMConfigurator.configure(LOG4JFILEPATH);
  }

  @Override
  public void contextDestroyed(ServletContextEvent sce) {
     
  }
 
}
