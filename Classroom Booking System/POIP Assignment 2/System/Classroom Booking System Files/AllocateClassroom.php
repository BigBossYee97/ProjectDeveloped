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
		
	$sql = "SELECT * FROM request";
	$result = mysqli_query($conn,$sql);
	
	
?>
<!DOCTYPE HTML>
<html>
<head><title>Allocate Classroom</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Allocate Classroom</div>
<br>
<div align = "center">
<ul id = "menu">
<li><a href = "Home.php">Home</a></li>
<li><a href = "AddClassroom.php">Add Classroom</a></li>
<li><a href = "EditClassroom.php">Edit Classroom</a></li>
<li><a href = "AllocateClassroom.php">Allocate Classroom</a></li>
<li><a href = "AmendBooking.php">Amend Booking</a></li>
<li><a href = "AddUser.php">Add User</a></li>
<li><a href = "RemoveUser.php">Remove User</a></li>
<li><a href = "AdminLoginPage.php">Log Out</a></li>
</ul><br>
</div>
<div align = "center">
<div align = 'center' style = "width:70%;height:600px;background-color:black">
<div align = "center" style = "width:100%;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">Booking Request</div>
<form method = 'POST' action = "<?php $_SERVER['PHP_SELF'] ?>" >
<div align = 'center' style = "overflow-y:scroll;width:80%;height:400px;background-color:white;font-family:Arial Black;font-size:14px;color:blue">
<?php
$i = 1;
echo "<table border = '1px'><th width = '50px'>ID</th><th width = '100px'>First Name</th><th width = '100px'>Last Name</th><th width = '150px'>Request To Book</th><th width = '100px'>Date</th><th width = '100px'>Time</th><th width = '200px'>Description</th><th width = '200px'>Status</th>";
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$classroom = $row['classroom'];
			$date = $row['date'];
			$time = $row['time'];
			$description = $row['description'];
			
			$data = "<tr><td align = 'center'>$i</td><td>$firstname</td><td>$lastname</td><td align = 'center'>$classroom</td><td align = 'center'>$date</td><td align = 'center'>$time</td><td>$description</td><td><button value = $id name = 'approve' style = 'font-family:Arial Black;font-size:14px;color:blue;width:100px'>Approve</button><button value = $id name = 'decline' style = 'font-family:Arial Black;font-size:14px;color:red;width:100px'>Decline</button></td></tr>";
			$i++;
			echo $data;
			
		}
	}
	echo "</table>";
	
	if(isset($_POST['approve'])){
		$ID = $_POST['approve'];
		$store = "INSERT INTO approvedrequest(FirstName,LastName,classroom,date,time,description) SELECT FirstName,LastName,classroom,date,time,description FROM request WHERE ID = $ID";
		$delete = "DELETE FROM request WHERE ID = $ID";
		if(mysqli_query($conn,$store)){
			$info = "Success";
			if(mysqli_query($conn,$delete)){
				$info = "Deleted";
				header("refresh:0;url = AllocateClassroom.php");
			}
		}
	
	}
	
	if(isset($_POST['decline'])){
		$Id = $_POST['decline'];
		$Store = "INSERT INTO amend(FirstName,LastName,classroom,date,time,description) SELECT FirstName,LastName,classroom,date,time,description FROM request WHERE ID = $Id";
		$Delete = "DELETE FROM request WHERE ID = $Id";
		if(mysqli_query($conn,$Store)){
			$info = "Success";
			if(mysqli_query($conn,$Delete)){
				$info = "Deleted";
				header("refresh:0;url = AllocateClassroom.php");
			}
		}
	
	}
	
	if(isset($_POST['history'])){
		header("refresh:0;url = History.php");
	}
	
	?>
</div><br>
<input type = 'submit' name = 'history' value = "History" style = "width:120px;height:40px;font-family:Arial Black;font-size:18px;background-color:white"></input>

<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info ?></p>
</form>
</div></div>


</body>
</html>