<?php
	$newPass = " ";
	$n = 0;
	while($n < 7){
		$newPass .= rand(0,9);
		$n++;
	}

	
	
	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	$INFO = "";
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
	
	
	$sql = "SELECT * FROM adminid";
	$result = mysqli_query($conn,$sql);

	if(isset($_POST['Email'],$_POST['username'])){
	$e = $_POST['Email'];
	$u = $_POST['username'];
	if($e == "" || $u == "")
		$INFO = "PLEASE FILL IN THE BLANKS";
	if($e !== "" && $u !== ""){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$id = $row['username'];
		$email = $row['email'];
		
		if($email == $e && $id == $u){
		
		include("PHPMailer/PHPMailerAutoload.php");
	
		$mail = new PHPMailer();
	
		try{
		$mail ->Host = "smtp.gmail.com";
		$mail ->Port = 587;
		$mail ->SMTPSecure = "tls";
		$mail ->IsSMTP();
		$mail ->SMTPAuth = true;
		$mail ->IsHTML(true);
		$mail ->WordWrap = 50;
	
		$sender_email = "yee97917@gmail.com";
		$mail ->Username = $sender_email;
		$mail ->Password = "ctrpegviqwyzoebn";//App Password
		$mail ->From = $sender_email;
		$mail ->FromName = "Admin";//Sender's name
	
		$recipient_email = "$e";
		$recipient_name = "$u"; //Recipient name
	
		$mail ->AddAddress($recipient_email,$recipient_name);
	
		$mail ->AddReplyTo($sender_email, "Admin");
		$mail ->Subject = "Password Recovery"; //Email title
		$mail ->Body = "<h1>Hi $u,your New Password is $newPass<br>Please change your password after you log in</h1>";//HTML message box
	
		if($mail -> Send()){
		$INFO = "NEW PASSWORD GENERATED. PLEASE CHECK YOUR EMAIL";
		$new = "UPDATE adminid SET password = '$newPass' WHERE username = '$u'";
		$passwordnew = mysqli_query($conn,$new);
		break;
		}
		
	}
	catch(Exception $e){
	
	$INFO = "Email could not be sent";
	echo "Mailer Error: ", $mail -> ErrorInfo,"<br>";
	
	}
			
		}
		if($email == $e || $id == $u)
			$INFO = "INVALID USERNAME OR EMAIL";
		
		
		}	
	}
	}
	
	}

	
	$user = "SELECT * FROM userid";
	$userResult = mysqli_query($conn,$user);
	
	if(isset($_POST['Email'],$_POST['username'])){
	$e = $_POST['Email'];
	$u = $_POST['username'];
	if($e == "" || $u == "")
		$INFO = "PLEASE FILL IN THE BLANKS";
	if($e !== "" && $u !== ""){
	if(mysqli_num_rows($userResult) > 0){
		while($row = mysqli_fetch_assoc($userResult)){
		$id = $row['Username'];
		$email = $row['Email'];
		
		if($email == $e && $id == $u){
		
		include("PHPMailer/PHPMailerAutoload.php");
	
		$mail = new PHPMailer();
	
		try{
		$mail ->Host = "smtp.gmail.com";
		$mail ->Port = 587;
		$mail ->SMTPSecure = "tls";
		$mail ->IsSMTP();
		$mail ->SMTPAuth = true;
		$mail ->IsHTML(true);
		$mail ->WordWrap = 50;
	
		$sender_email = "yee97917@gmail.com";
		$mail ->Username = $sender_email;
		$mail ->Password = "ctrpegviqwyzoebn";//App Password
		$mail ->From = $sender_email;
		$mail ->FromName = "Admin";//Sender's name
	
		$recipient_email = "$e";
		$recipient_name = "$u"; //Recipient name
	
		$mail ->AddAddress($recipient_email,$recipient_name);
	
		$mail ->AddReplyTo($sender_email, "Admin");
		$mail ->Subject = "Password Recovery"; //Email title
		$mail ->Body = "<h1>Hi $u,your New Password is $newPass<br>Please change your password after you log in</h1>";//HTML message box
	
		if($mail -> Send()){
		$INFO = "NEW PASSWORD GENERATED. PLEASE CHECK YOUR EMAIL";
		$new = "UPDATE userid SET Password = '$newPass' WHERE Username = '$u'";
		$passwordnew = mysqli_query($conn,$new);
		
		}else{
			$INFO = "INVALID USERNAME OR EMAIL";
		}
	break;
	}
	catch(Exception $e){
	
	$INFO = "Email could not be sent";
	echo "Mailer Error: ", $mail -> ErrorInfo,"<br>";
	
	}
	
			break;
		}
		if($email == $e || $id == $u)
			$INFO = "INVALID USERNAME OR EMAIL";
		}	
	}
	}
	}
	
	
	
	
?>

<!DOCTYPE HTML>
<html>
<head><title>Password Recovery</title></head>
<body background = "Background.JPG" style = "background-size:cover" width = "100%" height = "100%">
<div align = "center" style = "Font-family:Arial Black;Font-size:50px;width:100%;height:180px;background-color:black;color:#29b4ff">CLASSROOM BOOKING SYSTEM<br>FORGOT PASSWORD</div>
<div align = "center">
<div align = "center" style = "background-color:black;width:500px;height:330px;margin-top:100px">
<div align = "center" style = "background-color:#420b05;width:500px;height:80px;color:#29b4ff;font-family:Arial Black;font-size:40px">Recovery</div><br>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF']; ?>" >
<pre><p style = "font-family:Arial Black;font-size:16px;color:white">Username : <input type = "text" size = "20" placeholder = "Username" name = "username" style = "font-family:Arial Black;font-size:14px"></input>
<p style = "font-family:Arial Black;font-size:16px;color:white">Email	 : <input type = "text" size = "20" placeholder = "Email" name = "Email" style = "font-family:Arial Black;font-size:14px"></input>
<p style = "font-family:Arial Black;font-size:10px;color:yellow"><?php echo $INFO; ?>
<p><input type = "submit" value = "Submit"  name = "recovery" style = "width:100px;height:40px;font-family:Arial Black;Font-size:14px;background-color:#420b05;color:#29b4ff"></input>
<p style = "font-family:Arial;font-size:10px;color:white">LOG IN NOW?<a href = "AdminLoginPage.php" style = "font-family:Arial;font-size:10px;color:red"> Click here!</p>
</pre></form>
</div></div>


</body>
</html>