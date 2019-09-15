<?php 
$title = "Forgot Password";
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

if(isset($_POST["email"])){
$Email = $_POST["email"];
$sql = "SELECT * FROM customeraccount";
$result = mysqli_query($conn,$sql);
if($Email == ""){
$INFO = "Please Fill In Your Email to Reset Password";
}else{
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$cus_email = $row["Email"];

		if($Email == $cus_email){
		$newPass = "";
		$n = 0;
		while($n < 7){
		$newPass .= rand(0,9);
		$n++;
		}
		$hash_password = password_hash($newPass,PASSWORD_DEFAULT);
		$reset = "UPDATE customeraccount SET Password = '$hash_password' WHERE Email = '$cus_email'";
		if(mysqli_query($conn,$reset)){
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

			$to = $Email;
			$name = "Yee";
			$mail->From = $sender_email;
			$mail->FromName = "Admin";
			$mail->AddAddress($to,$name);

			
			$mail->AddReplyTo($sender_email,"Admin");

			$mail->IsHTML(true);
			$mail->WordWrap = 50;
			$mail->Subject = "Password Reseted";
			$mail->Body = "Your Password is $newPass . Please change your password after log in.";
								

			if ($mail->send()) {
				
					$INFO = "New Password Has Been Sent To Your Email.<br>Please Check.";
				}
			
			
		} catch (Exception $e) {
			echo "Email could not be sent.";
		}
		
		break;
		}
		}else{
		$INFO = "Invalid Email";
		}
}}
}
}
include "CustomerNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body>
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>">
<div style = "margin-top:100px;font-family:verdana;font-size:16px;color:white;border-radius:20px 20px;width:450px;height:350px;background-color:#2c3038">
<h1>Reset Password</h1><hr>
<pre style = "font-family:verdana;font-size:16px;color:white;background-color:#2c3038;border-color:#2c3038">

Email	:	<input name = "email" type = "text" size = "20" placeholder = "Email" style = "border-radius:5px 5px;border:none;font-family:verdana"></input>

<p style = "color:red;font-size:14px;font-family:Arial Black"><?php echo $INFO; ?></p>
<button id = "reset" style = 'height:30px;width:100px;background-color:#45b9f7;border:none;border-radius:5px 5px;font-family:verdana;font-size:16px'>Reset</button>

</pre>
</div>
</form>
</div>
</body>
</html>