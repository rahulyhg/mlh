<?php
$SITE_ICON='http://mylocalhook.com/images/logo.jpg';
$ANUPS_ICON='http://mylocalhook.com/images/anups-logo.jpg';
if(isset($_GET["action"])) {
	if($_GET["action"]==='SENDPIN_TO_EMAIL') {
		if(isset($_GET["email_Id"]) && isset($_GET["pin"])) {
			$to = 'Reply-To:'.$_GET["email_Id"];
			$subject = "MylocalHook.com :: View your PIN Number";
			$message = "
						<html>
							<head>
								<title>MylocalHook.com</title>
							</head>
							<body>
								<div align='center'>
									<img style='height:75px;' src='".$SITE_ICON."'/>
								</div>
								<div align='center' style='margin-top:3%;height:20px;'>
									<h2><b>Welcome to MylocalHook.com Industry Community Platform,</b></h2>
								</div>
								<div align='center' style='line-height: 20px;margin-top:1%;'>
										Its a place where Community and many more build and move forward.<br/>
										Your Email Address is validated by our System and Forwarding you a Temporary PIN Number.
								</div>
								<div align='center' style='margin-top:3%;height:65px;'>
									<h1>Your PIN Number is <b>".$_GET["pin"]."</b></h1>
								</div>
								<div align='center'>
									<img style='height:30px;' src='".$ANUPS_ICON."'/>
								</div>
							</body>
						</html>
						";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Organization: MyLocalHook\r\n";
			//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= 'From: <assistance@mylocalhook.com>' . "\r\n";
			$headers .= "Return-Path: MyLocalHook <assistance@mylocalhook.com>\r\n";
			$headers .='X-Mailer: PHP/' . phpversion();
			
			$status=mail($to,$subject,$message,$headers);
			echo $status;
		}
		else {
			$content='Missing ';
			if(!isset($_GET["email_Id"])) { $content.='email_Id,'; }
			if(!isset($_GET["pin"])) { $content.='pin,'; }
			$content=chop($content,',');
			echo $content;
		}
		
	}	
	else if($_GET["action"]==='REGISTER_SUCCESS'){
		if(isset($_GET["email_Id"])) {
			$to = $_GET["email_Id"];
			$subject = "MylocalHook.com :: Your Registration Success";
			$message = "
						<html>
							<head>
								<title>MylocalHook.com</title>
							</head>
							<body>
								<div align='center'>
									<img style='height:75px;' src='".$SITE_ICON."'/>
								</div>
								<div align='center' style='margin-top:3%;height:20px;'>
									<h2><b>Thanks for Registering into MylocalHook.com,</b></h2>
								</div>
								<div align='center' style='line-height: 20px;margin-top:1%;'>
										Its a place where Community and many more build and move forward.<br/>
								</div>
								<div align='center' style='margin-top:3%;height:65px;'>
									<h3>STAY CONNECTED FOR MORE UPDATES ON TRANSPORTATION INDUSTRY</h3>
								</div>
								<div align='center'>
									<img style='height:30px;' src='".$ANUPS_ICON."'/>
								</div>
							</body>
						</html>
						";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <no-reply@mylocalhook.com>' . "\r\n";

			$status=mail($to,$subject,$message,$headers);
			echo $status;
		}
		else {
			echo 'MISSING_EMAIL';
		}
	}
	else if($_GET["action"]==='LOGIN_SUCCESS'){
		if(isset($_GET["email_Id"])) {
			$to = $_GET["email_Id"];
			$subject = "MylocalHook.com :: You have logged Successfully on ".date("Y-m-d H:i:s");
			$message = "
						<html>
							<head>
								<title>MylocalHook.com</title>
							</head>
							<body>
								<div align='center'>
									<img style='height:75px;' src='".$SITE_ICON."'/>
								</div>
								<div align='center' style='margin-top:3%;height:20px;'>
									<h2><b>Now, you have successfully signed in to your Account.</b></h2>
								</div>
								<div align='center' style='line-height: 20px;margin-top:1%;'>
										Its a place where Community and many more build and move forward.<br/>
								</div>
								<div align='center' style='margin-top:3%;height:65px;'>
									<h3>STAY CONNECTED FOR MORE UPDATES ON COMMUNITIES</h3>
								</div>
								<div align='center'>
									<img style='height:30px;' src='".$ANUPS_ICON."'/>
								</div>
							</body>
						</html>
						";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <assistance@mylocalhook.com>' . "\r\n";

			$status=mail($to,$subject,$message,$headers);
			echo $status;
		}
		else {
			echo 'MISSING_EMAIL';
		}
	}
}
else {
   echo 'MISSING_ACTION';
}
?>
