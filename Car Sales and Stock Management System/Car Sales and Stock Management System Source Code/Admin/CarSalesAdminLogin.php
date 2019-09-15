<?php
session_start();
$INFO = "";

define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM admin";
$result = mysqli_query($conn,$sql);

if(isset($_POST['login'])){
$Input_email = $_POST["email"];
$Input_password = $_POST["password"];

if($Input_email == "" || $Input_password == ""){
$INFO = "Please Fill In Your Email and Password to Login";
}
else{
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$email = $row["Email"];
		$password = $row["Password"];
		$id = $row["ID"];
		
		if($Input_email == $email && password_verify($Input_password,$password)){
		$YEAR = $_POST["dateofyear"];
		$_SESSION["AdminID"] = $id;
		$_SESSION["Year"] = $YEAR;
		header("location:AdminProfile.php");
		}
		else{
		$INFO = "Invalid Email or Password";
		}
		}}

	

	
}

}

?>
<!DOCTYPE html>
<html>
<head><title>Login Page</title></head>
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script><script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/fbrz/pen/obKle?limit=all&page=71&q=form" />
<style class="cp-pen-styles">@import url(https://fonts.googleapis.com/css?family=Raleway:400,700);
html, body {
  height: 100%;
  margin: 0;
}

body {
  font-family: 'Raleway', sans-serif;
  background: #bfbfbf;
  -webkit-font-smoothing: antialiased;
}

:focus {
  outline: 0;
}

#wrapper {
  -webkit-perspective: 500px;
          perspective: 500px;
  position: absolute;
  top: 50%;
  left: 50%;
  text-align: center;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0);
}

h1 {
  color: #000099;
  font-size: 43px;
  margin: 0;
}

h2 {
  color: #1a1aff;
  margin: 0;
}

form {
  margin: 35px 0;
}

#inputs {
  height: 127px;
  -webkit-transition: height .5s ease-in-out;
  transition: height .5s ease-in-out;
}
#inputs div {
  height: 41px;
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  -webkit-transition: -webkit-transform .5s ease-in-out;
  transition: -webkit-transform .5s ease-in-out;
  transition: transform .5s ease-in-out;
  transition: transform .5s ease-in-out, -webkit-transform .5s ease-in-out;
}
#inputs > div > div > div {
  -webkit-transform: rotateX(0deg);
          transform: rotateX(0deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}
#inputs > div > div > div input:nth-child(2),
#inputs > div > div > div > div input:nth-child(2) {
  -webkit-transform: translateZ(-1px) rotateX(180deg);
          transform: translateZ(-1px) rotateX(180deg);
}
#inputs > div > div > div > div {
  -webkit-transform: translateY(-41px) rotateX(0deg);
          transform: translateY(-41px) rotateX(0deg);
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}

input {
  background: #FFFEFC;
  border: 0;
  box-sizing: border-box;
  display: block;
  font-family: Raleway, sans-serif;
  font-weight: 600;
  font-size: 12px;
  margin: 0 auto;
  padding: 13px;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
  width: 300px;
  -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
  -webkit-font-smoothing: antialiased;
}
input:hover {
  background: #f3f3f3;
}
input:focus {
  background: #EAEAEA;
}
input[type=submit] {
  background: #43434C;
  color: #FFFEFC;
  cursor: pointer;
}
input[type=radio] {
  display: none;
}

input:checked[value=reset] ~ #inputs {
  height: 84px;
}
input:checked[value=reset] ~ #labels {
  margin-top: -10px;
}
input:checked[value=reset] ~ #inputs div > div > div {
  -webkit-transform: rotateX(180deg);
          transform: rotateX(180deg);
}
input:checked[value=reset] ~ #inputs div > div > div > div {
  -webkit-transform: translateY(-41px) rotateX(180deg);
          transform: translateY(-41px) rotateX(180deg);
}
input:checked[value=reset] ~ #labels label[for=reset],
input:checked[value=reset] ~ #labels label[for=register],
input:checked[value=reset] ~ #labels label[for=login]:first-child {
  -webkit-transition: opacity .5s;
  transition: opacity .5s;
  opacity: 0;
}
input:checked[value=register] ~ #inputs {
  height: 170px;
}
input:checked[value=register] ~ #labels {
  margin-top: -10px;
}
input:checked[value=register] ~ #labels label[for=reset],
input:checked[value=register] ~ #labels label[for=register],
input:checked[value=register] ~ #labels label[for=login]:nth-child(3) {
  -webkit-transition: opacity .5s;
  transition: opacity .5s;
  opacity: 0;
}
input:checked[value=login] ~ #labels {
  margin-top: 11px;
}
input:checked[value=login] ~ #inputs div > div > div > div {
  -webkit-transform: translateY(-41px) rotateX(180deg);
          transform: translateY(-41px) rotateX(180deg);
}
input:checked[value=login] ~ #labels label[for=login] {
  -webkit-transition: opacity .5s;
  transition: opacity .5s;
  opacity: 0;
}

#labels {
  -webkit-transition: margin .5s ease-in-out;
  transition: margin .5s ease-in-out;
}

label {
  display: block;
  font-size: 14px;
  color: #43434C;
  margin-top: 5px;
  font-weight: 600;
  height: 16px;
  -webkit-transition: opacity 1s .3s;
  transition: opacity 1s .3s;
  overflow: hidden;
}
label span {
  cursor: pointer;
  color: red;
  font-size: 12px;
}

#hint {
  position: absolute;
  bottom: 20px;
  opacity: .2;
  left: 50%;
  margin: 0 -62px;
  font-weight: 600;
}
</style>
</head>
<body>
<div align = "center" style = "background-color:#666666;width:100%;height:160px"><img src = "car.png" style = "background-size:cover;width:1000px;height:200px"></img>
</div>
<div id="wrapper" >
  <h1>Car Sales and Inventory Management System</h1>
  <h2>Access With Your Finger Only</h2>
  <form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >

    <input type = "email" placeholder = "Email" name = "email" style = "width:300px;font-family:verdana;font-size:14px;" ></input>
	<input type = "password" placeholder = "Password" name = "password" style = "width:300px;font-family:verdana;font-size:14px;"></input>
	<input type = "Submit" value = "Login" name = "login" style = "width:300px;font-family:verdana;font-size:14px;"></input>
	<p style = "font-family:verdana;font-size:12px;">Forgot Password?<a href = "AFP.php" style = "font-family:verdana;font-size:12px;color:red;text-decoration:none" >Reset</a></p>
	<p style = "font-family:verdana;font-size:12px;">Not An Admin?<a href = "EmployeeLogin.php" style = "font-family:verdana;font-size:12px;color:red;text-decoration:none">Click Here</a></p>
	<p style = "font-family:verdana;font-size:16px;color:red"><?php echo $INFO; ?></p>
	</div>

<input type = "hidden" value = "" id = "dateofyear" name = "dateofyear"></input>
</body>
  </form>
</html>
<script>
    var date = new Date();
    var year = date.getFullYear();
    var DateofYear = document.getElementById("dateofyear").value = year;
</script>