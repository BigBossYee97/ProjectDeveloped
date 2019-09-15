<?php
session_start();
$INFO = "";
$id = $_SESSION["EmployeeID"];
$title = "Employee Profile";
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
		
}}

if(isset($_POST["schedule"])){
$_SESSION["ScheduleID"] = $id;
header("location:EmployeeSchedule.php");
}

if(isset($_POST["delete"])){
$ID = $_POST["delete"];
$confirm = $_POST["result"];
if($confirm == "1"){
$delete = "DELETE FROM employee WHERE ID = $ID";
if(mysqli_query($conn,$delete)){
	header("location:NewEmployee.php");
}
}
else{
$INFO = "Canceled";	
}

}

if(isset($_POST["name"])){
$name = $_POST["name"];	
$_SESSION["Attendance"] = $name;
header("location:ViewEmployeeAttendance.php");
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
<tr style = 'line-height:50px'><td>Working Days	:</td><td>	<?php echo $WorkingDay; ?></td></tr>
<tr style = 'line-height:50px'><td>Working Hours	:</td><td>	<?php echo $WorkingHour; ?></td></tr>
<tr style = 'line-height:50px'><td>Sales of Month	:</td><td>	<?php echo 'RM ', $EmployeeSalesofMonth; ?></td></tr>
</pre>
</table>
<p style = "float:right"><button name = "name" value = "<?php echo $Name; ?>" style = "margin-left:0px;margin-top:450px;font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >View Attendance</button><button name = "schedule" value = "<?php echo $ID; ?>" style = "margin-left:0px;margin-top:450px;font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >Edit Schedule</button><button name = "delete" onclick = "deleteEmployee()" value = "<?php echo $ID; ?>" style = "font-family:verdana;font-size:12px;color:yellow;text-decoration:underline;background-color:#2e353d;border:none" >Delete Employee</button></p>
<p style = "font-family:Arial Black;font-size:16px;color:red;margin-top:480px"><?php echo $INFO; ?></p>
<input type = "hidden" value = "unknown" name = "result" id = "result"></input>
</div>

</form>
</div>
</body>
</html>
<script>
function deleteEmployee(){
var conf = confirm("Are you sure to delete this employee?");
if(conf == true)
	document.getElementById("result").value = "1";
	else
		document.getElementById("result").value = "0";
		
}
</script>
