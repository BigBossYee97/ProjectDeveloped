<?php
session_start();
$title = "User Profile";
$INFO = "";
$id = $_SESSION["EmployeeUserID"];
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
	$ID = $row["ID"];
	$Photo = $row["Photo"];
	$Name = $row["Name"];
	$HP = $row["HP"];
	$Email = $row["Email"];
	$Age = $row["Age"];
	$Position = $row["Position"];
	$WorkingHour = $row["WorkingHour"];
	$WorkingDay = $row["WorkingDays"];
	
	}}

$EmployeeSalesofMonth = 0;
$sales = "SELECT * FROM tradelist";
$SalesResult = mysqli_query($conn,$sales);
if(mysqli_num_rows($SalesResult) > 0){
	while($row = mysqli_fetch_assoc($SalesResult)){
		$Salesman = $row["SoldBy"];
		if($Salesman == $Name){
		$commission = $row["Commission"];	
		$EmployeeSalesofMonth = $EmployeeSalesofMonth + $commission;
		}
	}
}
if(isset($_POST["checkin"])){
$CheckIn_time = $_POST["worktime"];
$CheckIn_Date = $_POST["workdate"];
$CheckIn_Day = $_POST["workday"];
$check_in = "INSERT INTO punchcard(Name,Date,Day,CheckIn,CheckOut)VALUES('$Name','$CheckIn_Date','$CheckIn_Day','$CheckIn_time','')";

if(mysqli_query($conn,$check_in)){
	$INFO = "Check In Successfully";
}
else{
	$INFO = "Check In Failed";
}

}

$checking = "SELECT * FROM punchcard";
$checkingResult = mysqli_query($conn,$checking);

if(mysqli_num_rows($checkingResult) > 0){
	while($row = mysqli_fetch_assoc($checkingResult)){
	$Check_name = $row["Name"];
	if($Check_name == $Name){
		$Check_ID = $row["ID"];
	}
	}
}

if(isset($_POST["checkout"])){
$CheckOut_time = $_POST["worktime"];
$check_out = "UPDATE punchcard SET CheckOut = '$CheckOut_time' WHERE ID = '$Check_ID'";
if(mysqli_query($conn,$check_out)){
$INFO = "Check Out Successfully";	
}
else{
$INFO = "Check Out Failed";
}
}

if(isset($_POST["edit"])){
header("location:EditEmployeeProfile.php");	
}

if(isset($_POST["changepassword"])){
header("location:EmployeeChangePassword.php");	
}
include "EmployeeNavigationBar.php";

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
<tr style = 'line-height:50px'><td>Working Days	:</td><td>	<?php echo $WorkingDay; ?></td></tr>
<tr style = 'line-height:50px'><td>Working Hours	:</td><td>	<?php echo $WorkingHour; ?></td></tr>
<tr style = 'line-height:50px'><td>Sales of Month	:</td><td>	<?php echo 'RM ', $EmployeeSalesofMonth; ?></td></tr>
</pre>
</table>
<p style = "float:right"><button name = "edit" value = "<?php echo $ID; ?>" style = "margin-left:0px;margin-top:450px;font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >Edit</button><button name = "changepassword" value = "<?php echo $ID; ?>" style = "margin-left:0px;margin-top:450px;font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >Change Password</button></p>
<p style = "font-family:Arial Black;font-size:16px;color:red;margin-top:480px"><?php echo $INFO; ?></p>
<input type = "submit" style = "float:left"  align = "center" name = "checkin" class="btn btn-lg btn-primary" value = "Check In"></input><input type = "submit" style = "float:left;margin-left:10px" align = "center" name = "checkout" class="btn btn-lg btn-primary" value = "Check Out"></input>
<input  type = "hidden" id = "worktime" name = "worktime" value = "unknown"></input>
<input  type = "hidden" id = "workdate" name = "workdate" value = "unknown"></input>
<input  type = "hidden" id = "workday" name = "workday" value = "unknown"></input>

</div>

</form>
</div>
</body>
</html>
<script>

var d = new Date(); 
var hour = d.getHours(); 
var minute = d.getMinutes(); 
var second = d.getSeconds(); 
var day = d.getDate();
var month = d.getMonth()+1; 
var year = d.getFullYear();

if(minute < 10){
minute = "0" + minute;
}

document.getElementById("worktime").value = hour + ":" + minute;

if(day < 10){
day = "0" + day;
}


if(month < 10){
month = "0" + month;
}
document.getElementById("workdate").value = day + "/" + month + "/" + year;


var d_names = ["Sunday","Monday", "Tuesday", "Wednesday", 
"Thursday", "Friday", "Saturday"];

var myDate = new Date();
var curr_day  = myDate.getDay();
document.getElementById("workday").value = (d_names[curr_day]);




</script>