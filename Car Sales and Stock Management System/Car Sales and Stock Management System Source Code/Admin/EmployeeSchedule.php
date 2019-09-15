<?php
$title = "Employee Schedule";
session_start();
$INFO = "";
$id = $_SESSION["ScheduleID"];
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

$sql = "SELECT * FROM employee WHERE ID = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$ID = $row["ID"];
	$Position = $row["Position"];
	$WorkingHour = $row["WorkingHour"];
	$WorkingDay = $row["WorkingDays"];
	$Email = $row["Email"];
	}}

	if(isset($_POST["update"])){
	$position = $_POST["position"];
	$hours = $_POST["hours"];
	$days = $_POST["days"];
	if($position == "" || $hours == "" || $days == ""){
		$INFO = "Please Do Not Leave Any Blank Empty";
	}
	else{
	$update = "UPDATE employee SET Position = '$position',WorkingHour = '$hours', WorkingDays = '$days' WHERE ID = $id";
	if(mysqli_query($conn,$update)){
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
			$mail->Subject = "Schedule Changed";
			$mail->Body = "<h2>Reminder</h2><br> Your Schedule Has Been Changed.<br>Position: $position<br>Working Hours: $hours<br>Working Days: $days";
								

			if ($mail->send()) {
				$INFO = "Schedule Updated Successfully";
				header("refresh:1;url = EmployeeProfile.php");
				}
			
			
		} catch (Exception $e) {
			echo "Email could not be sent.";
		}
	
	
	}
	}
	
	}

include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<div style = "font-size:18px;color:white;margin-top:150px;background-color:#2e353d;width:900px;height:400px;margin-left:320px">
<h1>Schedule</h1><hr style = "border-color:white">
<pre style = "font-size:16px;font-family:verdana;color:white">
<label>Position		:</label>	<input type = "text" name = "position" size = "30" placeholder = "Position" value = "<?php echo $Position ?>" style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Working Days	:</label>	<input type = "text" name = "days" size = "30" placeholder = "Working Days" value = "<?php echo $WorkingDay ?>" style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Working Hours	:</label>	<input type = "text" name = "hours" size = "30" placeholder = "Working Hours" value = "<?php echo $WorkingHour ?>" style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
</pre>
<p style = "color:red"><?php echo $INFO; ?></p>
<input type = "submit"  style = "margin-top:30px" align = "center" name = "update" class="btn btn-lg btn-primary" value = "Update"></input>

</div>
</form>
</div>
</body>
</html>
