package com.test;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class CheckLessThan30Minutes {
 public boolean triggerEvery30Minutes(String fromTimestamp) throws ParseException{
   SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
   Date toTS = new Date();
   Date fromTS = formatter.parse(fromTimestamp);
   long diff = toTS.getTime() - fromTS.getTime();
   boolean status = false;
   if(((diff / (1000) )/ 60) % 30==0){ status = true; }
   return status;
  }
  public static void main(String args[]) throws ParseException{
	System.out.println(new CheckLessThan30Minutes().triggerEvery30Minutes("2018-09-04 20:10:10"));
  }
}
