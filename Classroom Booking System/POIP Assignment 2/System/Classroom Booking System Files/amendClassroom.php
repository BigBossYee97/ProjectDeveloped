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
	$ID = $_SESSION['id'];
	$sql = "SELECT * FROM amend WHERE ID = $ID";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['ID'];
			$firstname = $row['FirstName'];
			$lastname = $row['LastName'];
			$classroom = $row['classroom'];
			$date = $row['date'];
			$time = $row['time'];
			$description = $row['description'];
			
			
		}
		
	}
	
	
	if(isset($_POST['classroom'],$_POST['firstname'],$_POST['lastname'],$_POST['date'],$_POST['time'],$_POST['usage'])){
	$class = $_POST['classroom'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$descrpt = $_POST['usage'];
	$insert = "INSERT INTO approvedrequest(FirstName,LastName,classroom,date,time,description) SELECT FirstName,LastName,'$class',date,time,description FROM amend WHERE ID = $ID";
	$delete = "DELETE FROM amend WHERE ID = $ID";
	if($class !== "" && $firstname !== "" && $lastname !== "" && $date !== "" && $time !== "" && $descrpt !== ""){
	if($class !== $classroom){
	if(isset($_POST['submitButton'])){
		if(mysqli_query($conn,$insert)){
			$info = "Classroom Amended";
			if(mysqli_query($conn,$delete)){
				$info = "Classroom Deleted From Rejected Database";
				header("refresh:0;url = AmendBooking.php");
			}
		}
	}
	}
	else{
		$info = "Please Amend A Valid Classroom";
	}
	}
	else{
		$info = "Please Fill In All The Blanks";
	}
	}
	
	
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
<div align = "center" style = "background-color:black;width:800px;height:850px;margin-top:50px">
<div align = "center" style = "background-color:#bd2626;width:800px;height:100px;font-family:Arial Black;Font-size:45px;color:#29b4ff">Amend Classroom</div>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF']; ?>" >
<pre><br><p style = "font-family:Arial Black;font-size:16px;color:white">First Name		:	<input type = "text" value = "<?php echo $firstname ?>" placeholder = "First Name" name = "firstname" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Last Name		:	<input type = "text"  placeholder = "Last Name" value = "<?php echo $lastname?>"size = "30" name = "lastname" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Classroom		:	<input type = "text"  placeholder = "Classroom" value = "<?php echo $classroom?>" name = "classroom" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Date				:	<input type = "text"  placeholder = "Date" name = "date" value = "<?php echo $date?>" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Time			:	<input type = "text" name = "time" placeholder = "Time" size = "30" value = "<?php echo $time?>" style = "font-family:Arial Black;font-size:14px"></input></p>
<p style = "font-family:Arial Black;font-size:16px;color:white;float:bottom">Description		:	<textarea type = "text" placeholder = "Description..."  name = "usage" rows = "6" Style = "font-family:Arial Black;font-size:14px;width:250px;height:200px"><?php echo $description?></textarea> </p>
</pre>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info; ?></p>

<p><input type = "submit" name = "submitButton" value = "Submit" style = "width:100px;height:40px;Font-family:Arial Black;Font-size:16px;background-color:white"></input></p>
</form>
</div>
</div>

</body>
</html>
