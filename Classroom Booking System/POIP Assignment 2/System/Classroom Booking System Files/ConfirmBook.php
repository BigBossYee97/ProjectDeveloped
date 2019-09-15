<?php
	session_start();
	$id = $_SESSION['book'];
	$employee = $_SESSION['employee'];
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
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($employee == $row['Username']){
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
		
			}
			
			
		}
		
	}
	
	$sql1 = "SELECT * FROM addclass";
	$result1 = mysqli_query($conn,$sql1);
	
	if(mysqli_num_rows($result1)>0){
		while($row = mysqli_fetch_assoc($result1)){
				if($id == $row['ID']){
					$class = $row['Name'];
				}
	}
	}
	
	if(isset($_POST['firstname'],$_POST['lastname'],$_POST['classroom'],$_POST['date'],$_POST['time'],$_POST['usage'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$class = $_POST['classroom'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$usage = $_POST['usage'];
	
	if($firstname !== "" && $lastname !== "" && $class !== "" && $date !== "" && $time !== "" && $usage !== ""){
		$request = "INSERT INTO request(FirstName,LastName,classroom,date,time,description) VALUES ('$firstname','$lastname','$class','$date','$time','$usage')";
		if(mysqli_query($conn,$request)){
			$info = "Classroom Requested Successfully";
			header("refresh:1;url = BookClassroom.php");
		}
		else{
			$info = "Classroom Requested Fail";
		}
	
	
	
	}
	else{
		$info = "Please Fill In All The Blanks";
	}
	}
	
	
	

?>


<!DOCTYPE html>
<html>
<head><title>Request to Book Classroom</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Booking Classroom</div>
<br>
<div>
<ul id = "menu">
<li><a href = "userHome.php">Home</a></li>
<li><a href = "BookClassroom.php">Request Classroom</a></li>
<li><a href = "CheckStatus.php">Check Status</a></li>
<li><a href = "userHistory.php">History of Booking</a></li>
<li><a href = "userChangePass.php" style = "margin-left:420px">Change Password</a></li>
<li><a href = "UserLoginPage.php" >Log Out</a></li>
</ul><br>
</div>
<div align = 'center'>
<div style = "background-color:black;width:850px;height:880px">
<div style = "background-color:#bd2626;font-family:Arial Black;font-size:45px;width:100%;height:100px;color:#29b4ff">Details</div>
<form action = "<?php $_SERVER['PHP_SELF']?>" method = "POST" >
<pre><br><p style = "font-family:Arial Black;font-size:16px;color:white">First Name		:	<input type = "text"  value = "<?php echo $firstname ?>" placeholder = "First Name" name = "firstname" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Last Name		:	<input type = "text"  placeholder = "Last Name" value = "<?php echo $lastname?>"size = "30" name = "lastname" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Classroom		:	<input type = "text"  placeholder = "Classroom" value = "<?php echo $class?>" name = "classroom" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Date				:	<input type = "text"  placeholder = "dd/mm/yy" name = "date" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Time			:	<input type = "text" name = "time" placeholder = "Time" size = "30"  style = "font-family:Arial Black;font-size:14px"></input></p>
<p style = "font-family:Arial Black;font-size:16px;color:white;float:bottom">Description		:	<textarea type = "text" placeholder = "Description..."  name = "usage" rows = "6" Style = "font-family:Arial Black;font-size:14px;width:280px;height:200px"></textarea> </p>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info ?></p>
<input type = "submit" value = "Book" name = "book" style = "font-family:Arial Black;font-size:16px;background-color:white;width:100px;height:40px"></input>
</form>
</div>
</div>
</body>
</html>



