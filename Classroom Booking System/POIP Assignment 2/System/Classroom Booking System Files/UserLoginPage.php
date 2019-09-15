<?php
	session_start();
	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	$INFO = "";
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
	
	
	$sql = "SELECT * FROM userid";
	$result = mysqli_query($conn,$sql);
	if(isset($_POST['UserID'],$_POST['UserPass'])){
	$userID = $_POST['UserID'];
	$userPass = $_POST['UserPass'];	
	if($userID == "" && $userPass == "")
	$INFO = "PLEASE FILL IN ALL THE BLANKS";
	if($userID !== "" && $userPass !== ""){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$username = $row['Username'];
		$password = $row['Password'];
		$firstname = $row['FirstName'];
		$lastname = $row['LastName'];
		
		if($userID == $username && $userPass == $password){
			$INFO = "LOG IN SUCCESSFULLY";
			$_SESSION['employee'] = $username;
			$_SESSION['first'] = $firstname;
			$_SESSION['last'] = $lastname;
			header("location:userHome.php");
		}
		else{
			$INFO = "INVALID USERNAME OR PASSWORD";
		}
			
		}
		
	}
	}
}

	

?>



<!DOCTYPE HTML>
<html>
<head><title>User Login Page</title></head>
<body background = "Background.JPG" style = "background-size:cover" width = "100%" height = "100%">
<div align = "center" style = "Font-family:Arial Black;Font-size:50px;width:100%;height:180px;background-color:black;color:#29b4ff">CLASSROOM BOOKING SYSTEM<br>LOGIN PAGE</div>
<div align = "center"><form action = "<?php $_SERVER['PHP_SELF']?>" method = "POST" >
<div align = "center" style = "background-color:black;width:500px;height:330px;margin-top:100px">
<div align = "center" style = "background-color:#420b05;width:500px;height:80px;color:#29b4ff;font-family:Arial Black;font-size:40px">USER</div><br>
<p style = "font-family:Arial Black;font-size:16px;color:white">Username: <input type = "text" size = "20" placeholder = "Username" name = "UserID" style = "font-family:Arial Black;font-size:14px"></input><p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Password: <input type = "password" size = "20" placeholder = "Password" name = "UserPass" style = "font-family:Arial Black;font-size:14px"></input></p>
<p style = "font-family:Arial;Font-size:10px;color:white"><a href = "ForgotPassword.php" style = "color:white">Forgot Your Password?</a></p>
<p id = "info" Style = "font-family:Arial Black;font-size:10px;color:yellow"><?php echo $INFO ?></p>
<p><input type = "submit" value = "Log In" id = "UserLogIn" style = "width:100px;height:40px;font-family:Arial Black;Font-size:14px;background-color:#420b05;color:#29b4ff"></input></p>
<p style = "font-family:Arial;Font-size:10px;color:white">Not an User? <a href = "AdminLoginPage.php" style = "color:Red">Click here!</a></p>
</div></div>
</form>
</body>
</html>