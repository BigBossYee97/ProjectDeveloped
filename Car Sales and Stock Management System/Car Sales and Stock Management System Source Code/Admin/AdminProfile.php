<?php
$title = "Admin Profile";
session_start();
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');
$id = $_SESSION["AdminID"];
$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM admin WHERE ID = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		
		$Name = $row["Name"];
		$HP = $row["HP"];
		$Email = $row["Email"];
		$Age = $row["Age"];
		$Position = $row["Position"];
		$Photo = $row["Photo"];
		}
}

if(isset($_POST["edit"])){
	
	header("location:EditAdminProfile.php");
	
}

if(isset($_POST["changepassword"])){
	
	header("location:AdminChangePassword.php");
	
}

include "NavigationBar.php";

?>
<!DOCTYPE html>

<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<div style = "position:absolute;;background-color:#2e353d;width:200px;height:200px;margin-left:350px">
<img src = "<?php echo $Photo; ?>" style = "width:200px;height:200px"><img>
</div>
<div style = "font-size:18px;color:white;margin-top:100px;background-color:#2e353d;width:900px;height:500px;margin-left:580px">
<pre style = "color:white;font-family:verdana">
<table style = "float:left;margin-left:30px;margin-top:20px">
<tr style = 'line-height:50px'><td>Name		:</td><td>	<?php echo $Name; ?></td></tr>	
<tr style = 'line-height:50px'><td>HP Number	:</td><td>	<?php echo $HP; ?></td></tr>
<tr style = 'line-height:50px'><td>Email		:</td><td>	<?php echo $Email; ?></td></tr>
<tr style = 'line-height:50px'><td>Age			:</td><td>	<?php echo $Age; ?></td></tr>
<tr style = 'line-height:50px'><td>Position		:</td><td>	<?php echo $Position; ?></td></tr>

</pre>
</table>
<p style = "float:right"><button name = "edit" value = "<?php echo $Name; ?>" style = "margin-left:0px;margin-top:450px;font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >Edit</button><button name = "changepassword" value = "<?php echo $ID; ?>" style = "margin-left:0px;margin-top:450px;font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >Change Password</button></p>

</div>

</form>
</div>
</body>
</html>