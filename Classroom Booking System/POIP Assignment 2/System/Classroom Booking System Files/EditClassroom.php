<?php
	session_start();
	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
		
	$sql = "SELECT * FROM addclass";
	$result = mysqli_query($conn,$sql);
	
?>

	



<!DOCTYPE html>
<html>
<head><title>Edit Classroom</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" style = "width:100%;height:100%;background-size:cover">
<div align = "center" style = "Font-family:Arial Black;color:#29b4ff;Font-size:50px;width:100%;height:100px;background-color:black">Edit Classroom</div> 
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
<br>
<div align = 'center'><form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "POST" >
<div align = 'center' style = "width:70%;height:650px;background-color:black;font-family:Arial Black;font-size:15px;color:#29b4ff;overflow-y:scroll">
<div align = 'center' style = "width:100%;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">Classroom</div>
<div align = 'center' style = "overflow-y:scroll;width:90%;height:450px;background-color:white;font-family:Arial Black;font-size:14px;color:blue">
<?php
$i = 1;
echo "<table border = '1px'><th width = '50px'>ID</th><th width = '200px'>Classroom Name</th><th width = '250px'>Venue</th><th width = '100px'>Capacity</th><th width = '100px'>Status</th><th width = '350px'>Description</th><th width = '100px'>Action</th>";
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['ID'];
			$name = $row['Name'];
			$venue = $row['Venue'];
			$capacity = $row['Capacity'];
			$status = $row['Status'];
			$description = $row['Description'];
			$data = "<tr><td align = 'center'>$i</td><td>$name</td><td>$venue</td><td align = 'center'>$capacity</td><td align = 'center'>$status</td><td>$description</td><td align = 'center' ><button value = $id name = 'edit' style ='font-family:Arial Black;font-size:14px;color:blue;width:100px'>EDIT</button></td></tr>";
			echo $data;
			$i++;
		}
		if(isset($_POST['edit'])){
			$_SESSION['edit'] = $_POST['edit'];
			header("refresh:0;url = editclass.php");
		}
	}
	echo "</table>";
	?>
</div>
</div>
</form>
</div>


</body>
</html>