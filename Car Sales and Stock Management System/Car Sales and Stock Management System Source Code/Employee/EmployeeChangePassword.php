<?php
session_start();
$title = "Change Password";
$id = $_SESSION["EmployeeUserID"];
$INFO = "";

define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM employee WHERE ID = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$currentpassword = $row["Password"];
	}}

if(isset($_POST["save"])){
$oldpassword = $_POST["oldpassword"];
$newpassword = $_POST["newpassword"];
$confirmpassword = $_POST["confirmpassword"];
if($oldpassword == "" || $newpassword == "" || $confirmpassword == ""){
$INFO = "Please Do Not Leave Any Blank Empty";
}
else{
	if(password_verify($oldpassword,$currentpassword)){
	if($newpassword == $confirmpassword){
	$hash_password = password_hash($newpassword,PASSWORD_DEFAULT);
	$updatepassword = "UPDATE employee SET Password = '$hash_password' WHERE ID = $id";
	if(mysqli_query($conn,$updatepassword)){
		$INFO = "Password Change Successfully";
	}else{
		$INFO = "Change Password Failed";
	}
	}else{
		$INFO = "New Password Do Not Match With Confirm New Password";
	}
	}else{
		$INFO = "Invalid Current Password";
	}
}

}

include "EmployeeNavigationBar.php";

					
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<div style = "font-size:18px;color:white;margin-top:100px;background-color:#2e353d;width:900px;height:450px;margin-left:320px;margin-bottom:20px">
<h1>Reset Password</h1><hr style = "border-color:white">
<pre style = "font-size:16px;font-family:verdana;color:white">
<label>Current Password		:</label>	<input type = "password" name = "oldpassword" size = "30" placeholder = "Current Password" style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>New Password			:</label>	<input type = "password" name = "newpassword" size = "30" placeholder = "New Password"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
<label>Confirm New Password	:</label>	<input type = "password" name = "confirmpassword" size = "30" placeholder = "Confirm New Password"  style = "border-radius:5px 5px;font-size:14px;font-family:verdana;border:none"></input><br>
</pre>
<p style = "color:red"><?php echo $INFO; ?></p>
<input type = "submit"  style = "margin-top:30px" align = "center" name = "save" class="btn btn-lg btn-primary" value = "Submit"></input>

</div>
</div>
</form>

</body>
</html>