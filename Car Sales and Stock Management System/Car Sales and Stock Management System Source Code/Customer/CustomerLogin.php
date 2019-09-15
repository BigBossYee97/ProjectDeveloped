<?php
$title = "Login";
session_start();
$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

if(isset($_POST["login"])){
$email = $_POST["email"];
$password = $_POST["password"];
if($email == "" || $password == ""){
$INFO = "Please Do Not Leave Any Blanks Empty";
}else{
$sql = "SELECT * FROM customeraccount";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$cus_ID = $row["ID"];
		$cus_email = $row["Email"];
		$cus_pass = $row["Password"];
		
		if($email == $cus_email && password_verify($password,$cus_pass)){	
		$_SESSION["Status"] = $cus_email;
		
		header("location:CustomerAdvertisement.php");
		}else{
		
		$INFO = "Invalid Email or Password";	
		}
		
		
		}}
		
}

}
if(isset($_POST["register"])){
	header("location:CustomerSignUp.php");
	
}

include "CustomerNavigationBar.php";


?>
<!DOCTYPE html>
<html>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<body>
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>">
<div style = "font-family:verdana;font-size:16px;color:white;margin-top:100px;margin-bottom:30px;border-radius:20px 20px;width:800px;background-color:#bfbfbf;height:500px">
<div style = "border-radius:20px 20px;float:left;width:50%;height:100%;background-color:#2c3038">
<h1>Log In</h1><hr>
<pre style = "font-family:verdana;font-size:16px;color:white;background-color:#2c3038;border-color:#2c3038">

Email	:	<input name = "email" type = "text" size = "20" placeholder = "Email" style = "color:black;border-radius:5px 5px;border:none;font-family:verdana"></input>

Password	:	<input name = "password" type = "password" size = "20" placeholder = "Password" style = "color:black;border-radius:5px 5px;border:none;font-family:verdana"></input>

<label style = "font-family:verdana;font-size:12px">Forgot Password? </label><a href = "CustomerForgotPassword.php" style = "color:yellow;font-family:verdana;font-size:12px">Reset</a>

<p style = "color:red;font-size:14px;font-family:Arial Black"><?php echo $INFO; ?></p>
<button name= "login" style = 'height:30px;width:100px;background-color:#45b9f7;border:none;border-radius:5px 5px;font-family:verdana;font-size:16px'>Login</button>

</pre>
</div>
<div style = "border-radius:20px 20px;float:right;width:50%;height:100%;background-color:#212223">
<h1>Sign Up<h1><hr>
<pre style = "font-family:verdana;font-size:16px;color:white;background-color:#212223;border-color:#212223">

Without an Account? Sign up now!
<ul class="list-unstyled" style="line-height: 1">
     <li><span class="fa fa-check text-success"></span> Add to Wishlist</li>
	 <li><span class="fa fa-check text-success"></span> Extra Discount </li>
	 <li><span class="fa fa-check text-success"></span> Extra Free Gift</li>
	 </ul>
	 <button name = "register" style = 'width:150px;height:30px;background-color:#45b9f7;border:none;border-radius:5px 5px;font-family:verdana;font-size:16px'>Sign up now</button>
</pre>
</div>
</div>
</form>
</div>
</body>
</html>

