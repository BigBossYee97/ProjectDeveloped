<?php
$title = "Advertisement";
session_start();
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM advertisement";
$result = mysqli_query($conn,$sql);

if(isset($_POST["details"])){
	$advertiseID = $_POST["details"];
	$_SESSION["AdvertisementID"] = $advertiseID;
	header("location:ViewAdvertisement.php");
}


include "NavigationBar.php";

?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<div style = "font-size:18px;color:white;margin-top:100px;background-color:#2e353d;width:1100px;height:800px;margin-left:350px">
<table border = '5px' style = "font-family:verdana;font-size:16px;color:black;background-color:white;width:100%;height:200px">
<?php
if(isset($_POST["search"])){
		$text = $_POST["searchTxt"];
		if(mysqli_num_rows($result) > 0){
		
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$image1 = $row["Image1"];
		$image2 = $row["Image2"];
		$image3 = $row["Image3"];
		$image4 = $row["Image4"];
		$image5 = $row["Image5"];
		$make = $row["Make"];
		$model = $row["Model"];
		$transmission = $row["Transmission"];
		$type = $row["Type"];
		$mileage = $row["Mileage"];
		$plate = $row["PlateNumber"];
		$year = $row["Year"];
		$seat = $row["NoSeat"];
		$engine = $row["EngineCC"];
		$color = $row["Color"];
		$price = $row["Price"];
		$description = $row["Description"];
	
		$status = $row["Status"];
		$margin = $row["Margin"];
	
		if($text == $make){
		echo "<tr align = 'center'>";
		echo "<td>";
		echo "<img src = '$image1' style = 'float:left;width:200px;height:200px'></img>";
		echo "<table style = 'font-family:verdana;font-size:16px;float:left;margin-left:20px;line-height:30px'>";
		echo "<tr width = '700px'><td align = 'center' style = 'font-size:20px;font-family:arial black'>$make $model</td></tr>";
		echo "<tr><td>Year Make</td><td> :$year </td></tr>";
		echo "<tr><td>Transmission</td><td>:$transmission</td></tr>";
		echo "<tr><td>Engine Capacity</td><td>:$engine cc</td></tr>";
		echo "<tr><td>Mileage</td><td> :$mileage km</td></tr>";
		echo "<tr><td>Description</td><td> :$description</td></tr>";
		echo "</table>";
	
		echo "<div style = 'color:white;float:right;width:200px;height:100%;background-color:#2e353d'>";
		echo "<br><br>";
		echo "<h2>RM $price</h2>";
		echo "<button name = 'details' value = '$ID' style = 'color:white;background-color:#6d7177;border:none;width:100%;height:50px;margin-top:56px;font-family:verdana'>More Details</button>";
	
		echo "</div>";
		echo "<div>";
		echo "</td>";
		echo "</tr>";
		}
		if($text == $model){
		echo "<tr align = 'center'>";
		echo "<td>";
		echo "<img src = '$image1' style = 'float:left;width:200px;height:200px'></img>";
		echo "<table style = 'font-family:verdana;font-size:16px;float:left;margin-left:20px;line-height:30px'>";
		echo "<tr width = '700px'><td align = 'center' style = 'font-size:20px;font-family:arial black'>$make $model</td></tr>";
		echo "<tr><td>Year Make</td><td> :$year </td></tr>";
		echo "<tr><td>Transmission</td><td>:$transmission</td></tr>";
		echo "<tr><td>Engine Capacity</td><td>:$engine cc</td></tr>";
		echo "<tr><td>Mileage</td><td> :$mileage km</td></tr>";
		echo "<tr><td>Description</td><td> :$description</td></tr>";
		echo "</table>";
	
		echo "<div style = 'color:white;float:right;width:200px;height:100%;background-color:#2e353d'>";
		echo "<br><br>";
		echo "<h2>RM $price</h2>";
		echo "<button name = 'details' value = '$ID' style = 'color:white;background-color:#6d7177;border:none;width:100%;height:50px;margin-top:56px;font-family:verdana'>More Details</button>";
	
		echo "</div>";
		echo "<div>";
		echo "</td>";
		echo "</tr>";
		}
		if($text == $plate){
		echo "<tr align = 'center'>";
		echo "<td>";
		echo "<img src = '$image1' style = 'float:left;width:200px;height:200px'></img>";
		echo "<table style = 'font-family:verdana;font-size:16px;float:left;margin-left:20px;line-height:30px'>";
		echo "<tr width = '700px'><td align = 'center' style = 'font-size:20px;font-family:arial black'>$make $model</td></tr>";
		echo "<tr><td>Year Make</td><td> :$year </td></tr>";
		echo "<tr><td>Transmission</td><td>:$transmission</td></tr>";
		echo "<tr><td>Engine Capacity</td><td>:$engine cc</td></tr>";
		echo "<tr><td>Mileage</td><td> :$mileage km</td></tr>";
		echo "<tr><td>Description</td><td> :$description</td></tr>";
		echo "</table>";
	
		echo "<div style = 'color:white;float:right;width:200px;height:100%;background-color:#2e353d'>";
		echo "<br><br>";
		echo "<h2>RM $price</h2>";
		echo "<button name = 'details' value = '$ID' style = 'color:white;background-color:#6d7177;border:none;width:100%;height:50px;margin-top:56px;font-family:verdana'>More Details</button>";
	
		echo "</div>";
		echo "<div>";
		echo "</td>";
		echo "</tr>";
		}
		if($text == $year){
		echo "<tr align = 'center'>";
		echo "<td>";
		echo "<img src = '$image1' style = 'float:left;width:200px;height:200px'></img>";
		echo "<table style = 'font-family:verdana;font-size:16px;float:left;margin-left:20px;line-height:30px'>";
		echo "<tr width = '700px'><td align = 'center' style = 'font-size:20px;font-family:arial black'>$make $model</td></tr>";
		echo "<tr><td>Year Make</td><td> :$year </td></tr>";
		echo "<tr><td>Transmission</td><td>:$transmission</td></tr>";
		echo "<tr><td>Engine Capacity</td><td>:$engine cc</td></tr>";
		echo "<tr><td>Mileage</td><td> :$mileage km</td></tr>";
		echo "<tr><td>Description</td><td> :$description</td></tr>";
		echo "</table>";
	
		echo "<div style = 'color:white;float:right;width:200px;height:100%;background-color:#2e353d'>";
		echo "<br><br>";
		echo "<h2>RM $price</h2>";
		echo "<button name = 'details' value = '$ID' style = 'color:white;background-color:#6d7177;border:none;width:100%;height:50px;margin-top:56px;font-family:verdana'>More Details</button>";
	
		echo "</div>";
		echo "<div>";
		echo "</td>";
		echo "</tr>";
		}
		if($text == ""){
		echo "<tr align = 'center'>";
		echo "<td>";
		echo "<img src = '$image1' style = 'float:left;width:200px;height:200px'></img>";
		echo "<table style = 'font-family:verdana;font-size:16px;float:left;margin-left:20px;line-height:30px'>";
		echo "<tr width = '700px'><td align = 'center' style = 'font-size:20px;font-family:arial black'>$make $model</td></tr>";
		echo "<tr><td>Year Make</td><td> :$year </td></tr>";
		echo "<tr><td>Transmission</td><td>:$transmission</td></tr>";
		echo "<tr><td>Engine Capacity</td><td>:$engine cc</td></tr>";
		echo "<tr><td>Mileage</td><td> :$mileage km</td></tr>";
		echo "<tr><td>Description</td><td> :$description</td></tr>";
		echo "</table>";
	
		echo "<div style = 'color:white;float:right;width:200px;height:100%;background-color:#2e353d'>";
		echo "<br><br>";
		echo "<h2>RM $price</h2>";
		echo "<button name = 'details' value = '$ID' style = 'color:white;background-color:#6d7177;border:none;width:100%;height:50px;margin-top:56px;font-family:verdana'>More Details</button>";
	
		echo "</div>";
		echo "<div>";
		echo "</td>";
		echo "</tr>";
		}
		}}}

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$ID = $row["ID"];
	$image1 = $row["Image1"];
	$image2 = $row["Image2"];
	$image3 = $row["Image3"];
	$image4 = $row["Image4"];
	$image5 = $row["Image5"];
	$make = $row["Make"];
	$model = $row["Model"];
	$transmission = $row["Transmission"];
	$type = $row["Type"];
	$mileage = $row["Mileage"];
	$plate = $row["PlateNumber"];
	$year = $row["Year"];
	$seat = $row["NoSeat"];
	$engine = $row["EngineCC"];
	$color = $row["Color"];
	$price = $row["Price"];
	$description = $row["Description"];

	$status = $row["Status"];
	$margin = $row["Margin"];
	echo "<tr align = 'center'>";
	echo "<td>";
	echo "<img src = '$image1' style = 'float:left;width:200px;height:200px'></img>";
	echo "<table style = 'font-family:verdana;font-size:16px;float:left;margin-left:20px;line-height:30px'>";
	echo "<tr width = '700px'><td align = 'center' style = 'font-size:20px;font-family:arial black'>$make $model</td></tr>";
	echo "<tr><td>Year Make</td><td> :$year </td></tr>";
	echo "<tr><td>Transmission</td><td>:$transmission</td></tr>";
	echo "<tr><td>Engine Capacity</td><td>:$engine cc</td></tr>";
	echo "<tr><td>Mileage</td><td> :$mileage km</td></tr>";
	echo "<tr><td>Description</td><td> :$description</td></tr>";
	echo "</table>";
	
	echo "<div style = 'color:white;float:right;width:200px;height:100%;background-color:#2e353d'>";
	echo "<br><br>";
	echo "<h2>RM $price</h2>";
	echo "<button name = 'details' value = '$ID' style = 'color:white;background-color:#6d7177;border:none;width:100%;height:50px;margin-top:56px;font-family:verdana'>More Details</button>";
	
	echo "</div>";
	echo "<div>";
	echo "</td>";
	echo "</tr>";
	
	
	}}
?>

</table>
</div>
</div>
</form>
</body>
</html>