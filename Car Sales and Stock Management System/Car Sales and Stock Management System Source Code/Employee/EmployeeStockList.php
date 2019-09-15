<?php
session_start();
$title = "Stock List";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');
$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

$sql = "SELECT * FROM advertisement";
$result = mysqli_query($conn,$sql);

if(isset($_POST["view"])){
	$_SESSION["EmployeeStockID"] = $_POST["view"];
	header("location:EmployeeViewStock.php");
}


include "EmployeeNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<form action = "<?php $_SERVER['PHP_SELF'];?>" method = "POST">
<div align = "center" >
<div style = "margin-bottom:20px;width:1000px;height:700px;background-color:white;margin-left:300px;margin-top:100px;">
<div align = "center" style = "width:100%;height:100px;background-color:#2e353d">
<label style = "color:white;font-family:verdana;margin-top:20px;font-size:36px">Stock List</label>
</div>
<div style = "overflow-y:scroll;width:1000px;background-color:white;height:600px">
<table border = '2px solid black' style = "font-family:verdana;width:100%">
<tr align = "center"><th width = "auto">No.</th><th>Photo</th><th width = "auto">Make</th><th width = "auto">Model</th><th width = "auto">Plate No</th><th width = "auto">Mfg.Year</th><th width = "auto">Color</th><th width = "auto">Price</th><th width = "auto">Margin</th><th width = "auto" align = "center">Status</th><th width = "auto">Action</th></tr>
<?php
if(isset($_POST["search"])){
		$text = $_POST["searchTxt"];
		if(mysqli_num_rows($result) > 0){
		$n = 1;
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$image = $row["Image1"];
		$make = $row["Make"];
		$model = $row["Model"];
		$plate = $row["PlateNumber"];
		$year = $row["Year"];
		$color = $row["Color"];
		$price = $row["Price"];
		$status = $row["Status"];
		$margin = $row["Margin"];
		if($text == $make){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		if($text == $model){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		if($text == $plate){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		if($text == $year){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		if($text == $color){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		if($text == $status){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		if($text == ""){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
		}
		
		$n++;
		}}}

if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){
	$ID = $row["ID"];
	$image = $row["Image1"];
	$make = $row["Make"];
	$model = $row["Model"];
	$plate = $row["PlateNumber"];
	$year = $row["Year"];
	$color = $row["Color"];
	$price = $row["Price"];
	$status = $row["Status"];
	$margin = $row["Margin"];
	
	echo "<tr align = 'center'><td>$i</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button></td></tr>";
	$i++;
	}}


?>
</table>
</div>
</div>
</div>
</form>
</body>
</html>