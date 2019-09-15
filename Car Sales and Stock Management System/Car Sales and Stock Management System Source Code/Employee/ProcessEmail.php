<?php
session_start();
unset($_SESSION["isSent"]);
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
	
	if(isset($_POST["email"])){
		$recipient = $_POST["email"];
		SendEmail($recipient);
		if($recipient == ""){
			$_SESSION["empty"] = true;
			header("location:EFP.php");
		}
	}

	
		
function SendEmail($r){
	$INFO = "";
	$status = false;
	$newPass = "";
	$n = 0;
	while($n < 7){
		$newPass .= rand(0,9);
		$n++;
	}
	
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

	if(!$conn)
		die("Connection Failed".mysqli_connect_error);

	
	$sql = "SELECT * FROM employee WHERE Email = '$r'";		//Check the email
	echo $sql;
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) == 1){
		$row = mysqli_fetch_assoc($result);
		$ID = $row["ID"];
		
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

			$to = $r;
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
				$hash_password = password_hash($newPass,PASSWORD_DEFAULT);
				$reset_password = "UPDATE employee SET Password = '$hash_password' WHERE ID = '$ID'";
				if(mysqli_query($conn,$reset_password)){
					$_SESSION["isSent"] = true;
					header("location:EFP.php");
				}
			}
			
		} catch (Exception $e) {
			echo "Email could not be sent.";
		}
		
	}
	else{
		
		header("location:EFP.php");
		exit();
		
	}
			
	
}

?>