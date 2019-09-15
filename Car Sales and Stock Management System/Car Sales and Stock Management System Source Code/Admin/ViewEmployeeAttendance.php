<?php
session_start();
$INFO = "";
$title = "Employee Attendance";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);


$sql = "SELECT * FROM punchcard WHERE Name = '$_SESSION[Attendance]'";
$result = mysqli_query($conn,$sql);


include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<div style = "overflow-y:scroll;font-size:18px;color:white;margin-top:100px;background-color:#2e353d;width:900px;height:730px;margin-left:320px;margin-bottom:20px">
<h1>Attendance</h1><hr style = "border-color:white">
<table border = '1px' style = "border-color:white" width = "100%">
<tr align = "center"><th width = "225px">Date</th><th width = "225px">Day</th><th width = "225px">Check In</th><th width = "225px">Check Out</th></tr>
<?php
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$date = $row["Date"];
	$day = $row["Day"];
	$in = $row["CheckIn"];
	$out = $row["CheckOut"];
	
	echo "<tr align = center><td>$date</td><td>$day</td><td>$in</td><td>$out</td></tr>";
	}}
	?>
</table>
</div>
</div>






</body>
</html>
