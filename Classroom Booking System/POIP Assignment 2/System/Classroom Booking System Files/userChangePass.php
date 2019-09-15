<?php
session_start();
$employee = $_SESSION['employee'];
$info = "";

	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	$info = "";
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
		
	$sql = "SELECT * FROM userid";
	$result = mysqli_query($conn,$sql);
	$sql1 = "SELECT * FROM adminid";
	$result1 = mysqli_query($conn,$sql1);
		
if(isset($_POST['old'],$_POST['new'],$_POST['confirmNew'])){
	$oldPass = $_POST['old'];
	$newPass = $_POST['new'];
	$confirmPass = $_POST['confirmNew'];
	if($oldPass !== "" && $newPass !== "" & $confirmPass !== ""){
	if(strlen($newPass) < 7){
		$info = "NEW PASSWORD MUST CONTAINS AT LEAST  7 CHARACTERS";
	}
	else{
		if($newPass !== $confirmPass){
		$info = "NEW PASSWORD MUST BE SAME WITH CONFIRM NEW PASSWORD";
		}
		else{
			if(mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){
					$password = $row['Password'];
					$Usernew = "UPDATE userid SET Password = '$newPass' WHERE Username = '$employee'";
				if($oldPass == $password){
					if(mysqli_query($conn,$Usernew)){
					$info = "PASSWORD CHANGE SUCCESSFULLY";
					break;
					}
				}
				else{
					$info = "OLD PASSWORD DOEST NOT MATCH";
				}
				}
		}
			if(mysqli_num_rows($result1) > 0){
				while($row = mysqli_fetch_assoc($result1)){
					$password = $row['password'];
					$Adminnew = "UPDATE adminid SET Password = '$newPass' WHERE Username = '$employee'";
				if($oldPass == $password){
					if(mysqli_query($conn,$Adminnew)){
					$info = "PASSWORD CHANGE SUCCESSFULLY";
					break;
					}
				}
				else{
					$info = "OLD PASSWORD DOEST NOT MATCH";
				}
				}
		}
		
		}
		
	}
	}
	else{
		$info = "PLEASE FILL IN ALL THE BLANKS";
	}
}

?>
<!DOCTYPE html>
<html>
<head><title>Change Password</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Change Password</div>
<br>
<div>
<ul id = "menu">
<li><a href = "userHome.php">Home</a></li>
<li><a href = "BookClassroom.php">Request Classroom</a></li>
<li><a href = "CheckStatus.php">Check Status</a></li>
<li><a href = "userHistory.php">History of Booking</a></li>
<li><a href = "userChangePass.php" style = "margin-left:430px">Change Password</a></li>
<li><a href = "UserLoginPage.php" >Log Out</a></li>
</ul><br>
</div>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'] ?>" >
<div align = 'center'>
<div align = 'center' style = "background-color:black;width:800px;height:500px">
<div align = 'center' style = "background-color:#bd2626;width:100%;height:100px;font-family:Arial Black;font-size:45px;color:#29b4ff">Password</div>
<pre><p style = "font-family:Arial Black;font-size:16px;color:white">Old Password			: <input name = 'old' size = "30" placeholder = "Old Password" style = "font-family:Arial Black;font-size:14px"></input></p>
<p></p>
<p style = "font-family:Arial Black;font-size:16px;color:white">New Password		: <input name = 'new' size = "30" placeholder = "New Password" style = "font-family:Arial Black;font-size:14px"></input></p>
<p></p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Confirm New Password	: <input name = 'confirmNew' size = "30" placeholder = "Confirm New Password" style = "font-family:Arial Black;font-size:14px"></input></p>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info ?></p>
<p><input type = "submit" value = "Submit" name = "change" style = "font-family:Arial Black;font-size:16px;background-color:white;width:100px;height:40px"></input></p></pre>

</div>
</div>
</form>
</body>
</html>