<?php
	session_start();
	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	$info = "";
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
		
	$sql = "SELECT * FROM addclass";
	$result = mysqli_query($conn,$sql);

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
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Request Classroom</div>
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
<div align = "center" style = "width:100%;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">Available Classroom</div>
<form action = "<?php $_SERVER['PHP_SELF']?>"  method = "POST" >
<div align = 'center' style = "overflow-y:scroll;width:80%;height:400px;background-color:white;font-family:Arial Black;font-size:14px;color:blue">
<?php
$i = 1;
echo "<table border = 1px><th width = '50px'>ID</th><th width = '150px'>Classroom Name</th><th width = '150px'>Venue</th><th width = '100px'>Capacity</th><th width = '100px'>Status</th><th width = '400px'>Description</th><th width = '100px'>Action</th>";
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['ID'];
			$name = $row['Name'];
			$venue = $row['Venue'];
			$size = $row['Capacity'];
			$status = $row['Status'];
			$description = $row['Description'];
			
			echo "<tr><td align = 'center'>$i</td><td>$name</td><td>$venue</td><td align = 'center'>$size</td><td align = 'center'>$status</td><td>$description</td><td><button value = $id name = 'request' style = 'font-family:Arial Black;font-size:14px;color:blue;width:100px'>Request</button></td></tr>";
			$i ++;
			
		}
		echo "</table>";
		
	}
	
	if(isset($_POST['request'])){
		$_SESSION['book'] = $_POST['request'];
		header("location:ConfirmBook.php");
		
	}
	?>
</div><br>
</form>
</div></div>
</body>
</html>
