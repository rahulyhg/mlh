package com.test;

import java.util.Calendar;

public class Cal {

	public static void main(String[] args) {
		Calendar calendar=Calendar.getInstance();
		         calendar.setTimeInMillis(System.currentTimeMillis());
	    System.out.println(calendar.getTime());
		         calendar.set(Calendar.MINUTE,calendar.get(Calendar.MINUTE)+1);
		System.out.println(calendar.getTime());

	}

}
