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
		
	$sql = "SELECT * FROM amend";
	$result = mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html>
<head><title>Amend Booking</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Amend Booking</div>
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
<div align = "center" style = "width:100%;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">Amend Classroom</div>
<form action = "<?php $_SERVER['PHP_SELF']?>"  method = "POST" >
<div align = 'center' style = "overflow-y:scroll;width:88%;height:400px;background-color:white;font-family:Arial Black;font-size:14px;color:blue">
<?php
$i = 1;
echo "<table border = '1px'><th width = '50px'>ID</th><th width = '100px'>First Name</th><th width = '100px'>Last Name</th><th width = '150px'>Request To Book</th><th width = '100px'>Date</th><th width = '100px'>Time</th><th width = '200px'>Description</th><th width = '100px'>Status</th><th width = '200px'>Action</th>";
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$classroom = $row['classroom'];
			$date = $row['date'];
			$time = $row['time'];
			$description = $row['description'];
			
			$data = "<tr><td align = 'center'>$i</td><td>$firstname</td><td>$lastname</td><td align = 'center'>$classroom</td><td align = 'center'>$date</td><td align = 'center'>$time</td><td>$description</td><td align = 'center' style = 'color:red'>Rejected</td><td><button value = $id name = 'amend' style='font-family:Arial Black;font-size:14px;color:blue;width:100px'>Amend</button><button value = $id name = 'cancel' style='font-family:Arial Black;font-size:14px;color:blue;width:100px'>Cancel</button></td></tr>";
			$i++;
			echo $data;
			
		}
	
		
	}
	echo "</table>";
	if(isset($_POST['amend'])){
		$_SESSION['id'] = $_POST['amend'];
		header("refresh:0;url = amendClassroom.php");
	}	
	if(isset($_POST['cancel'])){
		$ID = $_POST['cancel'];
		$delete = "DELETE FROM amend WHERE ID = $ID";
		$store = "INSERT INTO rejectedrequest(FirstName,LastName,classroom,date,time,description) SELECT FirstName,LastName,classroom,date,time,description FROM amend WHERE ID = $ID";
		if(mysqli_query($conn,$store)){
			$info = "Rejected";
			if(mysqli_query($conn,$delete)){
			$info = "Deleted From Amend";
			header("refresh:0;url = AmendBooking.php");
			}
	
	}
	}
	
	
	

?>

</div><br>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info ?></p>
</form>
</div></div></div>





</body>
</html>
