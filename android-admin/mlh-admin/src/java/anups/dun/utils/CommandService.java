/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package anups.dun.utils;

import java.io.IOException;
import java.io.UnsupportedEncodingException;

/**
 *
 * @author N.L.N.Rao
 */
public class CommandService {
   public void runBatchFile(String command) throws UnsupportedEncodingException, IOException, InterruptedException{
    String file="cmd.exe /c start "+command;
    System.out.println(file);
    Process proc = Runtime.getRuntime().exec(file); 
    proc.waitFor();
  } 
}
