<?php
$title = "New Employee";
$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('PHPMailer/src/phpmailer.php');
require('PHPMailer/src/exception.php');
require('PHPMailer/src/SMTP.php');
require('PHPMailer/vendor/autoload.php');
$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

if(isset($_POST["save"])){
$Name = $_POST["Name"];
$HP = $_POST["HP"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$Confirm_Password = $_POST["ConfirmPassword"];
$Age = $_POST["Age"];
$Position = $_POST["position"];
$hours = $_POST["hours"];
$days = $_POST["days"];

if($Name == "" || $HP == "" || $Email == "" || $Password == "" || $Confirm_Password == "" || $Age == "" || $Position == "" || $days == "" || $hours == ""){
$INFO = "Please Do Not Leave Any Blank Empty";
}else{
if($Password == $Confirm_Password){
$hash_password = password_hash($Confirm_Password,PASSWORD_DEFAULT);
$save = "INSERT INTO employee (Name,HP,Email,Password,Age,Position,WorkingHour,WorkingDays)VALUES('$Name','$HP','$Email','$hash_password','$Age','$Position','$hours','$days')";
if(mysqli_query($conn,$save)){
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
			$mail->Subject = "Account Created";
			$mail->Body = "Here is your account.<br><h2>Email : $Email</h2><br><h2>Password: $Password</h2>";
								

			if ($mail->send()) {
					$INFO = "Employee Added Successfully";
				}
			
			
		} catch (Exception $e) {
			echo "Email could not be sent.";
		}

}
}
else{
$INFO = "Password Do Not Match With Confirm Password";	
}
}

}

include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<div style = "font-size:18px;color:white;margin-top:100px;background-color:#2e353d;width:900px;height:730px;margin-left:320px;margin-bottom:20px">
<h1>New Employee</h1><hr style = "border-color:white">
<pre style = "font-size:16px;font-family:verdana;color:white">
<label>Name			:</label>	<input type = "text" name = "Name" size = "30" placeholder = "Name" style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>HP Number		:</label>	<input type = "text" name = "HP" size = "30" placeholder = "HP Number"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Email			:</label>	<input type = "text" name = "Email" size = "30" placeholder = "Email"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Password			:</label>	<input type = "password" name = "Password" size = "30" placeholder = "Password"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Confirm Password	:</label>	<input type = "password" name = "ConfirmPassword" size = "30" placeholder = "Confirm Password"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Age				:</label>	<input type = "text" name = "Age" size = "30" placeholder = "Age"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Position			:</label>	<input type = "text" name = "position" size = "30" placeholder = "Position"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Working Days		:</label>	<input type = "text" name = "days" size = "30" placeholder = "Working Days"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Working Hours		:</label>	<input type = "text" name = "hours" size = "30" placeholder = "Working Hours"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
</pre>
<p style = "color:red"><?php echo $INFO; ?></p>
<input type = "submit"  style = "margin-top:30px" align = "center" name = "save" class="btn btn-lg btn-primary" value = "Submit"></input>

</div>
</div>
</form>
</body>
</html>