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

		}
		
		
	}
	
	
	if(isset($_POST['upload'],$_FILES['image'])){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	$image = $_FILES['image']['name'];
	$temp = $_FILES['image']['tmp_name'];
	$size = $_FILES['image']['size'];
	
	
	try{
		move_uploaded_file($temp,$image);
		$sql1 = "UPDATE home SET Image = '$image' WHERE employee = '$employee'";
		$result = mysqli_query($conn,$sql1);
		
	}
	catch(Exception $e){
		echo "";
	}
	
	}
	}
?>






<!DOCTYPE HTML>
<html>
<head><title>Home</title></head>
<style>
ul#menu {padding :0;}
ul#menu li{display:inline;}
ul#menu li a {text-decoration:none;background-color:black;color:white;font-family:Arial Black;font-size:20px;padding:15px 45px;border-radius:5px 5px 5px 5px;}
ul#menu li a:hover {background-color:blue;}
</style>
<body background = "Background.JPG" width = "100%" height = "100%" style = "background-size:cover">
<div align = "center" style = "width:100%;height:100px;background-color:black;color:#29b4ff;font-family:Arial Black;font-size:50px">Home</div>
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
</div><br>
<div>
<form method = "POST" action = " <?php $_SERVER['PHP_SELF']?> " enctype = "multipart/form-data" >
<div align = 'center' style = "background-color:white;width:400px;height:500px;float:left;margin-left:50px"><?php echo "<img src = '$image' style = 'width:400px;height:500px'/>"  ?><input type = 'file' name = "image" ></input><input type = "submit" value = "Upload" name = "upload" ></input></div>
</form>
<div style = "background-color:black;width:1350px;height:500px;float:right;margin-right:50px"><pre style = "font-family:monospace;font-size:20px;color:white;margin-right:20px">	
<b>	Name			:<?php echo $name; ?><br>	
	Age			:<?php echo $age; ?><br>	
	Email			:<?php echo $email; ?><br>	
	Position		:<?php echo $position; ?><br>
	Office Location		:<?php echo $office; ?><br>
	Education Level		:<?php echo $level; ?><br>
	Consultation Hours	:<?php echo $consultation; ?></b></pre><p style = "float:right;margin-top:100px;margin-right:20px"><a href = "EditUser.php" style = "color:yellow;font-family:monospace;font-size:14px" >Edit>></a></p></div>
</div>


</body>
</html>