package com.test;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.Inet6Address;
import java.net.InetAddress;
import java.net.NetworkInterface;
import java.net.SocketException;
import java.net.URL;
import java.util.Enumeration;

public class IPAddress {
  public String getMyPublicIPV4Address(){
	  String systemipaddress = "";
      try 
      {
          URL url_name = new URL("http://bot.whatismyipaddress.com");
          BufferedReader sc = new BufferedReader(new InputStreamReader(url_name.openStream()));
          systemipaddress = sc.readLine().trim();
          if (!(systemipaddress.length() > 0)) 
          {
              try 
              {
                  InetAddress localhost = InetAddress.getLocalHost();
                  System.out.println((localhost.getHostAddress()).trim());
                  systemipaddress = (localhost.getHostAddress()).trim();
              }
              catch(Exception e1) 
              {
                  systemipaddress = "Cannot Execute Properly";
              }
          }
      }    
      catch (Exception e2) 
      {
          systemipaddress = "Cannot Execute Properly";
      }
     return systemipaddress;
  }
  public void getPrivateIPAddress(){
	  String ip;
	  try {
	      Enumeration<NetworkInterface> interfaces = NetworkInterface.getNetworkInterfaces();
	      while (interfaces.hasMoreElements()) {
	          NetworkInterface iface = interfaces.nextElement();
	          // filters out 127.0.0.1 and inactive interfaces
	          if (iface.isLoopback() || !iface.isUp())
	              continue;

	          Enumeration<InetAddress> addresses = iface.getInetAddresses();
	          while(addresses.hasMoreElements()) {
	              InetAddress addr = addresses.nextElement();

	              // *EDIT*
	              if (addr instanceof Inet6Address) continue;

	              ip = addr.getHostAddress();
	              System.out.println(iface.getDisplayName() + " " + ip);
	          }
	      }
	  } catch (SocketException e) {
	      throw new RuntimeException(e);
	  }
  }
  public static void main(String args[]) {
	  IPAddress ipAddress = new IPAddress();
	  System.out.println(ipAddress.getMyPublicIPV4Address());

  }
}
