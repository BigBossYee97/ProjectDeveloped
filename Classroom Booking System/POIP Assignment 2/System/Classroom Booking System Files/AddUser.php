<?php


	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	$info = "";
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
	
	
	
if(isset($_POST['FirstName'],$_POST['LastName'],$_POST['username'],$_POST['password'],$_POST['confirmPassword'],$_POST['email'])){
	$firstname = $_POST['FirstName'];
	$lastname = $_POST['LastName'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];
	$email = $_POST['email'];
	
	$sqlhome = "INSERT INTO home(employee)VALUES('$username')";
	$sql = "INSERT INTO userid(FirstName,LastName,Username,Password,Email) VALUES ('$firstname','$lastname','$username','$password','$email')";
	if($firstname !== "" && $lastname !== "" && $username !== "" && $password !== "" && $confirmPassword !== "" && $email !== ""){
		if($password == $confirmPassword){
	if(mysqli_query($conn,$sql)){
		$result = mysqli_query($conn,$sqlhome);
		$info = "User Added Successfully";
	}
	else{
		$info =  "User Added Fail";
		
	}
		}
		else{
		$info = "Password must be same as Confirm Password";
		}
	}
	else{
		$info = "Please Fill In The Blanks";
	}
	
	}

	
?>






<!DOCTYPE HTML>
<html>
<head><title>Add User</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" style = "width:100%;height:100%;background-size:cover">
<div align = "center" style = "Font-family:Arial Black;color:#29b4ff;Font-size:50px;width:100%;height:100px;background-color:black">Add User</div> 
<div align ="center">
<br>
<ul id ="menu">
<li><a href = "Home.php">Home</a></li>
<li><a href = "AddClassroom.php">Add Classroom</a></li>
<li><a href = "EditClassroom.php">Edit Classroom</a></li>
<li><a href = "AllocateClassroom.php">Allocate Classroom</a></li>
<li><a href = "AmendBooking.php">Amend Booking</a></li>
<li><a href = "AddUser.php">Add User</a></li>
<li><a href = "RemoveUser.php">Remove User</a></li>
<li><a href = "AdminLoginPage.php">Log Out</a></li>
</ul>
</div>
<div align = "center">
<div align = "center" style = "background-color:black;width:800px;height:800px;margin-top:50px">
<div align = "center" style = "background-color:#bd2626;width:800px;height:100px;font-family:Arial Black;Font-size:45px;color:#29b4ff">Register Form</div>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF']; ?>" >
<pre><br><p style = "font-family:Arial Black;font-size:16px;color:white">First Name		:	<input type = "text" name = "FirstName" placeholder = "First Name" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Last Name		:	<input type = "text" name = "LastName" placeholder = "Last Name" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Username		:	<input type = "text" name = "username" placeholder = "Username" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Password			:	<input type = "password" name = "password" placeholder = "Password" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white;float:bottom">Confirm Password	:	<input type = "password" name = "confirmPassword" placeholder = "Confirm Password" size = "30" Style = "font-family:Arial Black;font-size:14px"></input></p>
<p style = "font-family:Arial Black;font-size:16px;color:white;float:bottom">Email			:	<input type = "email" name = "email" placeholder = "Email Address" size = "30" Style = "font-family:Arial Black;font-size:14px"></input></p>
</pre>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info; ?></p>
<p><input type = "submit" id = "RegisterButton" value = "Register" style = "width:120px;height:40px;Font-family:Arial Black;Font-size:18px;color:black;background-color:white"></input></p>
</form>
</div>
</div>


</body>
</html>