<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Utils
{
    function randomNumber($size){
        $num="";
        for($index=0;$index<$size;$index++) {
            $num.=rand(1,9);
        }
        return $num;
    }
    
    function create_zip($files = array(),$destination = '',$overwrite = false) {
    /* FUNCTION DESCRIPTION : Creates a compressed zip file 
     * FUNCTION USAGE :  $files_to_zip = array('output/1.jpg','output/2.jpg','output/3.jpg', ... );
     *                   $result = create_zip($files_to_zip,'my-archive.zip'); //if true, good; if false, zip creation failed
     */
	if(file_exists($destination) && !$overwrite) { return false; } //if the zip file already exists and overwrite is false, return false

	$valid_files = array();
	
	if(is_array($files))  //if files were passed in...
        {
		
		foreach($files as $file) //cycle through each file
                {
			
			if(file_exists($file)) //make sure the file exists
                        {
				$valid_files[] = $file;
			}
		}
	}
	
	if(count($valid_files)) //if we have good files...
            {
		$zip = new ZipArchive(); //create the archive
		if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) 
                {
	           return false;
		}
		
		foreach($valid_files as $file) //add the files
                {
			$zip->addFile($file,$file);
		}
		
		$zip->close();
		
		return file_exists($destination); //check to make sure the file exists
	   }
	 else
	  {
		return false;
	  }
    }

	function keyPairDataComparator($primaryCompJson,$secondaryCompJson){
	/* This Function compares PrimaryArray and Secondary Array */
	  $val1=array("Volvo01", "BMW01", "Toyota01");
	  $val2=array("Volvo02", "BMW02", "Toyota02");

      $val3=array("BMW03", "Toyota03","Volvo01");
      $val4=array("BMW04", "Toyota04","Volvo02");


for($index1=0;$index1<count($val3);$index1++){
  $check=false;
  for($index2=0;$index2<count($val1);$index2++){
   if($val3[$index1]===$val1[$index2] && $val4[$index1]===$val2[$index2]){
      $check=true; 
   }
  }
  if(!$check){
    echo $val3[$index1]." ".$val4[$index1]." ";
  }
}
 
	}

function StringStartsWith($haystack, $needle){
  $status = false;
  if(strpos($haystack,$needle)==0){ $status = true; }
  return $status;
}
function StringEndsWith($haystack, $needle){
  $length = strlen($haystack) - strlen($needle);
  $status = false;
  if(strpos($haystack,$needle)===$length){ $status = true; }
  return $status;
}
}