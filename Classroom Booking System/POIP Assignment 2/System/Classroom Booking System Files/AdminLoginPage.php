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
	
	
	$sql = "SELECT * FROM adminid";
	$result = mysqli_query($conn,$sql);
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['AdminID'],$_POST['AdminPass'])){
$adminID = $_POST['AdminID'];
$adminPass = $_POST['AdminPass'];	
	if($adminID == "" || $adminPass == "")
		$INFO = "PLEASE FILL IN ALL THE BLANKS";
	if($adminID !== "" && $adminPass !== ""){
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		
		$INFO = "";
		if ($row['username'] == $adminID && $row['password'] == $adminPass){
			$INFO = "LOG IN SUCCESSFULLY";
			$_SESSION['employee'] = $adminID;
			header("location:Home.php");
			
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
<head><title>Admin Login Page</title></head>
<body background = "Background.JPG" style = "background-size:cover" width = "100%" height = "100%">
<div align = "center" style = "Font-family:Arial Black;Font-size:50px;width:100%;height:180px;background-color:black;color:#29b4ff">CLASSROOM BOOKING SYSTEM<br>LOGIN PAGE</div>
<div align = "center">
<div align = "center" style = "background-color:black;width:500px;height:330px;margin-top:100px">
<div align = "center" style = "background-color:#420b05;width:500px;height:80px;color:#29b4ff;font-family:Arial Black;font-size:40px">ADMIN</div><br>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF']; ?>" >
<p style = "font-family:Arial Black;font-size:16px;color:white">Username: <input type = "text" size = "20" placeholder = "Username" name = "AdminID" style = "font-family:Arial Black;font-size:14px"></input><p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Password: <input type = "password" size = "20" placeholder = "Password" name = "AdminPass" style = "font-family:Arial Black;font-size:14px"></input></p>
<p style = "font-family:Arial;Font-size:10px;color:white"><a href = "ForgotPassword.php" style = "color:white">Forgot Your Password?</a></p>
<p style = "font-family:Arial Black;font-size:10px;color:yellow"><?php echo $INFO; ?></p>
<p><input type = "submit" value = "Log In"  name = "AdminLogIn" style = "width:100px;height:40px;font-family:Arial Black;Font-size:14px;background-color:#420b05;color:#29b4ff"></input></p>
<p style = "font-family:Arial;Font-size:10px;color:white">Not an admin? <a href = "UserLoginPage.php" style = "color:red">Click here!</a></p>
</form>
</div></div>


</body>
</html>