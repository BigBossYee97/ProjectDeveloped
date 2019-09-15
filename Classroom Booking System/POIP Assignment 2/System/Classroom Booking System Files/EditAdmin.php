<?php
	session_start();
	$employee = $_SESSION['employee'] ;
	$name = "";
	$age = "";
	$email = "";
	$position = "";
	$office = "";
	$level = "";
	$consultation = "";
	$image = "";
	define("MYSQL_HOST",'localhost');
	define("MYSQL_USERNAME",'root');
	define("MYSQL_PASSWORD",'');
	define("MYSQL_DB",'classroom');
	
	$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);
	if(!$conn){
		die("Connection Failed".mysqli_connect_error());
		}	
	

	$sql = "SELECT * FROM home";
	$result = mysqli_query($conn,$sql);

	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			if($employee == $row['employee']){
			$name = $row['Name'];
			$age = $row['Age'];
			$email = $row['Email'];
			$position = $row['Position'];
			$office = $row['Office'];
			$level = $row['Education'];
			$consultation = $row['Consultation'];
			$image = $row['Image'];
			}
			
			$info = "";
			
		}
		
		
	}
	
	
	if(isset($_POST['Name'],$_POST['Age'],$_POST['Email'],$_POST['Job'],$_POST['Office'],$_POST['Education'],$_POST['Consultation'])){
	$Name = $_POST['Name'];
	$Age = $_POST['Age'];
	$Email = $_POST['Email'];
	$Job = $_POST['Job'];
	$Office = $_POST['Office'];
	$Education = $_POST['Education'];
	$Consultation = $_POST['Consultation'];
	
	
	$update = "UPDATE home SET Name = '$Name', Age = '$Age', Email = '$Email', Position = '$Job', Office = '$Office', Education = '$Education', Consultation = '$Consultation' WHERE employee = '$employee' ";
	if(mysqli_query($conn,$update)){
		header("refresh:1; url = Home.php");
		$info = "Information Updated Successfully";
	}
	else{
		$info = "Not Updated";
	}
	}
	
	
		
?>

<!DOCTYPE HTML>
<html>
<head><title>Update Information</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Update Details</div>
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
<div align = "center" style = "background-color:#bd2626;width:800px;height:100px;font-family:Arial Black;Font-size:45px;color:#29b4ff">Admin Information</div>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF']; ?>" >
<pre><br><p style = "font-family:Arial Black;font-size:16px;color:white">Name			:	<input type = "text" id = "className" placeholder = "Name" name = "Name" size = "35" value = "<?php echo $name; ?>" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Age				:	<input type = "text" id = "classVenue" placeholder = "Age" size = "35" name = "Age" value = "<?php echo $age; ?>" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Email			:	<input type = "text" id = "classSize" placeholder = "Email Address" name = "Email" size = "35" value = "<?php echo $email; ?>" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Position			:	<input type = "text" id = "classStatus" placeholder = "Job Position" name = "Job" size = "35" value = "<?php echo $position; ?>" Style = "font-family:Arial Black;font-size:14px"></input> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Office Location	:	<input type = "text" id = "classUsage" placeholder = "Office Location" name = "Office" size = "35" value = "<?php echo $office; ?>" Style = "font-family:Arial Black;font-size:14px;"></textarea> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Education Level	:	<input type = "text" id = "classUsage" placeholder = "Education Level" name = "Education" size = "35" value = "<?php echo $level; ?>" Style = "font-family:Arial Black;font-size:14px;"></textarea> </p>
<p style = "font-family:Arial Black;font-size:16px;color:white">Consultation Hours:	<input type = "text" id = "classUsage" placeholder = "Consultation Hours" name = "Consultation" size = "35" value = "<?php echo $consultation; ?>" Style = "font-family:Arial Black;font-size:14px;"></textarea> </p>
</pre>
<p style = "font-family:Arial Black;font-size:12px;color:yellow"><?php echo $info; ?></p>
<p><input type = "submit" id = "submitButton" value = "Submit" style = "width:100px;height:50px;Font-family:Arial Black;Font-size:20px;background-color:white"></input></p>
</form>
</div>
</div>
</body>
</html>
