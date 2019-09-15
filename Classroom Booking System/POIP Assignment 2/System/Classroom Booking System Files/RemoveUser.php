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
		
	$sql = "SELECT * FROM userid";
	$result = mysqli_query($conn,$sql);
	
	if(isset($_POST['IDtext'])){
		$id = $_POST['IDtext'];
		$delete = "DELETE FROM userid WHERE ID = $id";
		if($id !== ""){
		if(mysqli_query($conn,$delete)){
			header("refresh:1;url = RemoveUser.php");
			$info = "User Deleted Successfully";
		}
		else{
			$info = "User Not Deleted";
		}
		}
		else{
			$info = "Please Fill In The ID Of User To Delete";
		}

	}
	
?>
<!DOCTYPE HTML>
<html>
<head><title>Remove User</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" style = "width:100%;height:100%;background-size:cover">
<div align = "center" style = "Font-family:Arial Black;color:#29b4ff;Font-size:50px;width:100%;height:100px;background-color:black">Remove User</div> 
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
<div align = "center" style = "width:800px;height:650px;background-color:black;margin-top:50px">
<div align = "center" style = "width:800px;height:100px;background-color:#bd2626;font-family:Arial Black;font-size:45px;color:#29b4ff">Delete User</div>
<br>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'] ?>" >
<p><div id = "userList" placeholder = "All User Details Are Going To Show Here.."  style = "background-color:white;overflow-y:scroll;font-family:Arial Black;Font-size:14px;width:600px;height:300px;color:blue">
<?php
echo "<table border = '1px'><th width = '50px'>ID</th><th width = '100px'>First Name</th><th width = '100px'>Last Name</th><th width = '100px'>Username</th><th width = '200px'>Email</th>";
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$username = $row['Username'];
			$email = $row['Email'];
			$data = "<tr><td>$id</td><td>$firstname</td><td>$lastname</td><td>$username</td><td>$email</td></tr>";
			echo $data;
		}
	}
	echo "</table>";
?>
</div></p>
<p align = "center" style = "font-family:Arial Black;font-size:14px;color:white">Please enter the user's ID that you want to delete: <input type = "text" name = "IDtext" placeholder = "ID" size = "3" style = "Font-family:Arial Black;font-size:14px"></input></p>

<p id = "info" style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info ?></p>
<p><input type = "submit" name = "deleteButton" value = "Delete" style = "font-family:Arial Black;font-size:16px;background-color:white;width:130px;height:40px"></input></p>

</form>
</pre>
</div>
</div>
</body>
</html>
