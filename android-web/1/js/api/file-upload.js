/*************************************************************************************************************************/
/************************************* FILE UPLOAD ***********************************************************************/
/*************************************************************************************************************************/
/* First call cloudservers_auth() in the File upload page at document.ready */
var IMG_URL;
var CropbasicObj;
var FILE;
var IDENTITY; // 
var DONE_BTN;
var IMG_CROP_ID;
var CROPPING_DIV;
var cloudinary={};

function imgClick(sel_fileId){
 console.log("Image File pickup popup");
 document.getElementById(sel_fileId).click(); 
}

function cloudservers_auth(){ /* Call it during page load */
  var response;
  js_ajax('GET',PROJECT_URL+"backend/config/cloudinary.json",{},function(response){
  if(PROJECT_MODE==='DEBUG'){ 
     var t_cloudspace=response.cloudinary.debug.length;
     var cloudIndex = 0;
	 if(t_cloudspace>1) {  cloudIndex = Math.floor((Math.random()*(t_cloudspace-1)) + 1); }
     cloudinary.cloudName=response.cloudinary.debug[cloudIndex].cloudName;
     cloudinary.uploadpreset=response.cloudinary.debug[cloudIndex].uploadpreset;
  } else {
     var t_cloudspace=response.cloudinary.prod.length;
     var cloudIndex = 0;
	 if(t_cloudspace>1) {  cloudIndex = Math.floor((Math.random()*(t_cloudspace-1)) + 1); }
     cloudinary.cloudName=response.cloudinary.prod[cloudIndex].cloudName;
     cloudinary.uploadpreset=response.cloudinary.prod[cloudIndex].uploadpreset;
  }
  console.log("cloudName: "+cloudinary);
  });
  
}

function getFileSize(fSize){
 var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
  for(var i=0;fSize>900;i++){ fSize/=1024; }
  var fileSize=(Math.round(fSize*100)/100)+' '+fSExt[i];
  return fileSize;
}

// *********** Upload file to Cloudinary ******************** //
function uploadFile(file,parameter) {
  console.log("Uploading File to Server");
  var cloudName = cloudinary.cloudName;
  var unsignedUploadPreset = cloudinary.uploadpreset;
  console.log("cloudName: "+cloudName+"unsignedUploadPreset: "+unsignedUploadPreset);
  var url = 'https://api.cloudinary.com/v1_1/'+cloudName+'/image/upload';
  var xhr = new XMLHttpRequest();
  var fd = new FormData();
  xhr.open('POST', url, true);
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  xhr.onreadystatechange = function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // File uploaded successfully
      var response = JSON.parse(xhr.responseText);
      // https://res.cloudinary.com/cloudName/image/upload/v1483481128/public_id.jpg
      var url = response.secure_url;
      // Create a thumbnail of the uploaded image, with 150px width
      var tokens = url.split('/');
      tokens.splice(-2, 0, parameter);
      var img = new Image(); // HTML5 Constructor
	  var img_src=tokens.join('/');
      img.src = img_src;
      img.alt = response.public_id;
	  IMG_URL=img_src;
	  console.log("IMG_URL: "+IMG_URL);
	  
	  document.getElementById("fileupload-loader").style.display='none';
	  $('body').css("opacity","1");
	  document.getElementById(IDENTITY).style.display='block';
	  document.getElementById(IDENTITY).src=img_src;  //+'?'+new Date().getTime()
	  document.getElementById(IMG_CROP_ID).style.display='none';
	  document.getElementById(CROPPING_DIV).style.display='none';
	  document.getElementById(DONE_BTN).style.display='block';
	  document.getElementById(IDENTITY).onclick = function(){};
    }
  };

  fd.append('upload_preset', unsignedUploadPreset);
  fd.append('tags', 'browser_upload'); // Optional - add tag for image admin in Cloudinary
  fd.append('file', file);
  xhr.send(fd);
}
var FILE_ID;
// *********** Handle selected files ******************** //
var handleFiles = function(file_Id,crop_div,img_crop,files,id,doneBtn,w,h,c_w,c_h,c_type) {
console.log("Handling File");
FILE_ID=file_Id;
var fileSize=getFileSize(files[0].size);
if(files[0].size<=5242880) { // Less than or Equal to 5 MB
	var reader = new FileReader();
		 reader.onload = function(e) {
			document.getElementById(id).style.display='none';
			console.log("FileReader loaded");
			IMG_CROP_ID=img_crop;
			CROPPING_DIV=crop_div;
			FILE=files[0];
			IDENTITY=id;
			DONE_BTN=doneBtn;
			
			$("#"+IMG_CROP_ID).css("width",c_w+"px");
			$("#"+IMG_CROP_ID).css("height",c_h+"px"); 
			$("#"+CROPPING_DIV).css("margin-top","40px"); 

			var image_cls=Math.floor(Math.random() * 1000);
			document.getElementById(IMG_CROP_ID).innerHTML='<img class="'+image_cls+'" src="'+e.target.result+'"/>';
			CropbasicObj=$('.'+image_cls).croppie({ viewport: { width: w, height: h, type: c_type } });
			
            
			var htmlContent='<div class="btn-group">';
			    htmlContent+='<button align="center" id="'+IDENTITY+'_crop_done" ';
				htmlContent+='class="btn btn-default custom-font" style="color:'+CURRENT_DARK_COLOR+';background-color:#fff;" ';
				htmlContent+='onclick="javascript:profilepic_done();"><b>Crop</b></button>';
				htmlContent+='<button align="center" id="'+IDENTITY+'_reload_done" ';
				htmlContent+='class="btn custom-bg" style="color:#000;background-color:'+CURRENT_LIGHT_COLOR+';" ';
				htmlContent+='onclick="javascript:fu_reload();"><b>Back</b></button>';
				htmlContent+='</div>';
			document.getElementById(CROPPING_DIV).style.display='block';
			document.getElementById(CROPPING_DIV).innerHTML=htmlContent;
			//$(".cr-slider-wrap").after(htmlContent);
			
			// console.log("Class length: "+ $('.cr-slider-wrap').length);
			 $(".cr-slider-wrap").addClass('custom-lgt-bg');
			 $(".cr-slider-wrap").css("background-color",CURRENT_LIGHT_COLOR);
		 }
	 reader.readAsDataURL(files[0]);
 } else { // Greator than 5 MB
    document.getElementById("picImg_english_fileSize").innerHTML=fileSize;
    $('#img-popup').modal({backdrop: "static"});
 }
};

function profilepic_done(){
  document.getElementById("fileupload-loader").style.display='block';
  $('body').css("opacity","0.6");
/* Disable Button */
  document.getElementById(IDENTITY+"_crop_done").disabled=true;
  document.getElementById(IDENTITY+"_reload_done").disabled=true;
  var json=CropbasicObj.croppie('get');
  var x_a=json.points[0];
  var y_b=json.points[1];   //  [topLeftX, topLeftY, bottomRightX, bottomRightY]
  var w_c=json.points[2]-json.points[0];
  var h_d=json.points[3]-json.points[1];
  console.log(JSON.stringify(json));
  console.log("x_a:"+x_a);
  console.log("y_b:"+y_b);
  console.log("w_c:"+w_c);
  console.log("h_d:"+h_d);
  var parameter="x_"+x_a+",y_"+y_b+",w_"+w_c+",h_"+h_d+",z_"+json.zoom+",c_crop";
  
  uploadFile(FILE,parameter);
		// $('#gallery').croppie({ url: e.target.result });
}
function fu_reload() {
if($("#"+IMG_CROP_ID).length>0) { 
  document.getElementById(IMG_CROP_ID).innerHTML=""; 
  $("#"+IMG_CROP_ID).css("width","0px");
  $("#"+IMG_CROP_ID).css("height","0px");
}
if($("#"+IDENTITY).length>0) { document.getElementById(IDENTITY).style.display='block'; }
if($("#"+FILE_ID).length>0) {  $("#"+FILE_ID).val(''); }
 if($("#"+CROPPING_DIV).length>0) {  
 $("#"+CROPPING_DIV).css("margin-top","0px"); 
 document.getElementById(CROPPING_DIV).style.display='none';
 }
}