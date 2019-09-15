<?php
	session_start();
	$first = $_SESSION['first'];
	$last = $_SESSION['last'];
	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	$info = "";
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
		
	$sql = "SELECT * FROM approvedrequest";
	$result = mysqli_query($conn,$sql);
	
	
?>
<!DOCTYPE HTML>
<html>
<head><title>History of Booking</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">History of Booking Classroom</div>
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
<div align = "center">
<div align = 'center' style = "width:70%;height:600px;background-color:black">
<div align = "center" style = "width:100%;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">History</div>
<form method = 'POST' action = "<?php $_SERVER['PHP_SELF'] ?>" >
<div align = 'center' style = "overflow-y:scroll;width:80%;height:400px;background-color:white;font-family:Arial Black;font-size:14px;color:blue">
<?php

$i = 1;
if(isset($_POST['approved'])){
echo "<table border = '1px'><th width = '50px'>ID</th><th width = '100px'>First Name</th><th width = '100px'>Last Name</th><th width = '150px'>Request To Book</th><th width = '100px'>Date</th><th width = '100px'>Time</th><th width = '200px'>Description</th><th width = '200px'>Status</th>";
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($first == $row['FirstName'] && $last == $row['LastName']){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$classroom = $row['classroom'];
			$date = $row['date'];
			$time = $row['time'];
			$description = $row['description'];
			
			$data = "<tr><td align = 'center'>$i</td><td>$firstname</td><td>$lastname</td><td align = 'center'>$classroom</td><td align = 'center'>$date</td><td align = 'center'>$time</td><td>$description</td><td align = 'center' style = 'color:red'>Approved</td></tr>";
			$i++;
			echo $data;
			
		}
		}
	}
	echo "</table>";
}
	
	if(isset($_POST['rejected'])){
		$reject = "SELECT * FROM rejectedrequest";
		$resultreject = mysqli_query($conn,$reject);
		echo "<table border = '1px'><th width = '50px'>ID</th><th width = '100px'>First Name</th><th width = '100px'>Last Name</th><th width = '150px'>Request To Book</th><th width = '100px'>Date</th><th width = '100px'>Time</th><th width = '200px'>Description</th><th width = '200px'>Status</th>";
	if(mysqli_num_rows($resultreject) > 0){
		while($row = mysqli_fetch_assoc($resultreject)){
			if($first == $row['FirstName'] && $last == $row['LastName']){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$classroom = $row['classroom'];
			$date = $row['date'];
			$time = $row['time'];
			$description = $row['description'];
			
			$data = "<tr><td align = 'center'>$i</td><td>$firstname</td><td>$lastname</td><td align = 'center'>$classroom</td><td align = 'center'>$date</td><td align = 'center'>$time</td><td>$description</td><td align = 'center' style = 'color:red'>Rejected</td></tr>";
			$i++;
			echo $data;
			
		}
		}
	}
	echo "</table>";
	}
	
	?>
</div><br>
<input type = 'submit' name = 'approved' value = "Approved" style = "width:120px;height:40px;font-family:Arial Black;font-size:18px;background-color:white"></input>
<input type = 'submit' name = 'rejected' value = "Rejected" style = "width:120px;height:40px;font-family:Arial Black;font-size:18px;background-color:white"></input>

<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info ?></p>
</form>
</div></div>


</body>
</html>