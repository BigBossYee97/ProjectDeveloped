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
	
	
	
if(isset($_POST['classroom'],$_POST['venue'],$_POST['capacity'],$_POST['status'],$_POST['usage'])){
	$class = $_POST['classroom'];
	$venue = $_POST['venue'];
	$capacity = $_POST['capacity'];
	$status = $_POST['status'];
	$usage = $_POST['usage'];
	
	
	$sql = "INSERT INTO addclass(Name,Venue,Capacity,Status,Description) VALUES ('$class','$venue','$capacity','$status','$usage')";
	if($class !== "" && $venue !== "" && $capacity !== "" && $status !== "" && $usage !== ""){
	if(mysqli_query($conn,$sql)){
		$info = "Classroom Added Successfully";
	}
	else{
		$info =  "Classroom Added Fail";
		
		
	}
	}
	else{
		$info = "Please Fill In The Blanks";
	}
	
	}










?>

<!DOCTYPE HTML>
<html>
<head><title>Add a Classroom</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" style = "width:100%;height:100%;background-size:cover">
<div align = "center" style = "Font-family:Arial Black;color:#29b4ff;Font-size:50px;width:100%;height:100px;background-color:black">Add Classroom</div> 
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
<div align = "center" style = "background-color:black;width:800px;height:850px;margin-top:50px">
<div align = "center" style = "background-color:#bd2626;width:800px;height:100px;font-family:Arial Black;Font-size:45px;color:#29b4ff">Details</div>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF']; ?>" >
<pre><br><p style = "font-family:Arial Black;font-size:16px;color:white">Name		:	<input type = "text" id = "className" placeholder = "Classroom Name" name = "classroom" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Venue		:	<input type = "text" id = "classVenue" placeholder = "Venue" size = "30" name = "venue" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Capacity		:	<input type = "text" id = "classSize" placeholder = "Number of Student" name = "capacity" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Status		:	<input type = "text" id = "classStatus" placeholder = "Availble/Not Available" name = "status" size = "30" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white;float:bottom">Description	:	<textarea type = "text" id = "classUsage" placeholder = "Description..." name = "usage" rows = "6" Style = "font-family:Arial Black;font-size:14px;width:260px;height:200px"></textarea> </p>
</pre>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info; ?></p>

<p><input type = "submit" id = "submitButton" value = "Submit" style = "width:100px;height:40px;Font-family:Arial Black;Font-size:16px;background-color:white"></input></p>
</form>
</div>
</div>
</body>
</html>