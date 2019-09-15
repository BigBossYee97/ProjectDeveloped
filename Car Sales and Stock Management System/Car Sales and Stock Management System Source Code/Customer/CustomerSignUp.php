<?php
$title = "Sign Up";
$INFO = "";
session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require('PHPMailer/src/phpmailer.php');
	require('PHPMailer/src/exception.php');
	require('PHPMailer/src/SMTP.php');
	require('PHPMailer/vendor/autoload.php');
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

if(isset($_POST["register"])){
$email = $_POST["email"];
$password = $_POST["password"];
$conf_pass = $_POST["ConfirmPass"];	
$Name = $_POST["name"];
if($Name == "" || $email == "" || $password == "" || $conf_pass == ""){
	$INFO = "Please Do Not Leave Any Blank Empty";
}else{
	if($conf_pass == $password){
	$hash_password = password_hash($conf_pass,PASSWORD_DEFAULT);
	$sql = "INSERT INTO customeraccount(Email,Password,Photo,Name,Age,HP)VALUES('$email','$hash_password','','$Name','','')";
	if(mysqli_query($conn,$sql)){
		$mail = new PHPMailer();

		try {
			//$mail -> SMTPDebug = 2;
			$mail->Host= "smtp.gmail.com";
			$mail->Port = 587;
			$mail->SMTPDSecure = "tls";
			$mail->IsSMTP();
			$mail->SMTPAuth = true;

			//insecure connection via SMTPOptions 
			$mail->SMTPOptions = array(
				'ssl'=>array(
					'verify_peer'=>false,
					'verify_peer_name'=>false,
					'allow_self_signed'=>true
				)
			);

			$sender_email = "yee97917@gmail.com";
			$mail->Username = $sender_email;
			$mail->Password = "ctrpegviqwyzoebn";

			$to = $email;
			$name = "Yee";
			$mail->From = $sender_email;
			$mail->FromName = "Admin";
			$mail->AddAddress($to,$name);

			
			$mail->AddReplyTo($sender_email,"Admin");

			$mail->IsHTML(true);
			$mail->WordWrap = 50;
			$mail->Subject = "Account Created Successfully";
			$mail->Body = "Welcome $Name , Your account is successfully created. You may login now.";
								

			if ($mail->send()) {
				$INFO = "Sign Up Successfully";	
			}
			
		} catch (Exception $e) {
			echo "Email could not be sent.";
		}
		
	}
	else{
		$INFO = "Sign Up Failed";
	} 
	}
	else{
		$INFO = "Confirm Password Do Not Match With Password";
	}
}

	
}
include "CustomerNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body>
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>">
<div style = "margin-top:100px;font-family:verdana;font-size:16px;color:white;border-radius:20px 20px;width:50%;height:100%;background-color:#212223">
<h1>Sign Up<h1><hr>
<pre style = "font-family:verdana;font-size:16px;color:white;background-color:#212223;border-color:#212223">
Name			:	<input name = "name" type = "text" size = "20" placeholder = "Name" style = "border-radius:5px 5px;border:none;font-family:verdana"></input>

Email			:	<input name = "email" type = "text" size = "20" placeholder = "Email" style = "border-radius:5px 5px;border:none;font-family:verdana"></input>

Password			:	<input name = "password" type = "password" size = "20" placeholder = "Password" style = "border-radius:5px 5px;border:none;font-family:verdana"></input>

Confirm Password	:	<input name = "ConfirmPass" type = "password" size = "20" placeholder = "Confirm Password" style = "border-radius:5px 5px;border:none;font-family:verdana"></input>

<p style = "color:red;font-size:14px;font-family:Arial Black"><?php echo $INFO; ?></p>
<button name = "register" style = 'height:30px;width:100px;background-color:#45b9f7;border:none;border-radius:5px 5px;font-family:verdana;font-size:16px'>Sign Up</button>

</pre>
</div>
</form>
</div>
</body>
</html>