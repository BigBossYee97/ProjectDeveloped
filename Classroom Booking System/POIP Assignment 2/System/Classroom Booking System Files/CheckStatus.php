<?php
	session_start();
	$user = $_SESSION['employee'];
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
		
	$sql = "SELECT * FROM request ORDER BY ID DESC";
	$result = mysqli_query($conn,$sql);
	
	
	
	
	
?>
<!DOCTYPE html>
<html>
<head><title>Check Status</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Check Status of Booking</div>
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
<div align = "center" style = "width:100%;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">Status</div>
<form action = "<?php $_SERVER['PHP_SELF']?>"  method = "POST" >
<div align = 'center' style = "overflow-y:scroll;width:80%;height:400px;background-color:white;font-family:Arial Black;font-size:14px;color:blue">
<?php
$i = 1;
echo "<table border = 1px><th width = '50px'>ID</th><th width = '100px'>First Name</th><th width = '100px'>Last Name</th><th width = '130px'>Classroom</th><th width = '200px'>Date</th><th width = '150px'>Time</th><th width = '350px'>Description</th><th width = '100px'>Status</th>";
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($first == $row['FirstName'] && $last == $row['LastName']){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$class = $row['classroom'];
			$date = $row['date'];
			$time = $row['time'];
			$description = $row['description'];
			
			echo "<tr><td align = 'center'>$i</td><td>$firstname</td><td>$lastname</td><td align = 'center'>$class</td><td align = 'center'>$date</td><td align = 'center'>$time</td><td>$description</td><td align = 'center'>Pending</td></tr>";
			$i ++;
			}
		}	
}		echo "</table>";
		
		
	
	
	
	?>
	
</div><br>
</form>
</div></div>
</body>
</html>
