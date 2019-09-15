<?php

$title = "Advertisement";
$INFO = "";
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

$company = "SELECT * FROM companyprofile";
$CompanyResult = mysqli_query($conn,$company);

if(mysqli_num_rows($CompanyResult) > 0){
		while($row = mysqli_fetch_assoc($CompanyResult)){
		$hp = $row["HP"];
		$tel = $row["Office"];
		}
}
if(isset($_POST["Details"])){
$id = $_POST["Details"];
$_SESSION["CustomerAdsID"] = $id;
header("location:CustomerViewAds.php");
}

if(isset($_POST["wishlist"])){
	$wish_id = $_POST["wishlist"];
	if(isset($_SESSION["Status"])){
	$add_wish = "INSERT INTO wishlist (ID,Image1,Image2,Image3,Image4,Image5,Make,Model,Transmission,Type,Mileage,Year,NoSeat,EngineCC,PlateNumber,Color,Price,Status,Description) SELECT ID,Image1,Image2,Image3,Image4,Image5,Make,Model,Transmission,Type,Mileage,Year,NoSeat,EngineCC,PlateNumber,Color,Price,Status,Description FROM advertisement WHERE ID = $wish_id";
	if(mysqli_query($conn,$add_wish)){
		$cus_sql = "SELECT * FROM customeraccount WHERE Email = '$_SESSION[Status]'";
		$cus_result = mysqli_query($conn,$cus_sql);
		if(mysqli_num_rows($cus_result) > 0){
		while($row = mysqli_fetch_assoc($cus_result)){
			$Name = $row["Name"];
		}
		
		}
		$update_cusName = "UPDATE wishlist SET Name = '$Name' WHERE ID = $wish_id";
		if(mysqli_query($conn,$update_cusName)){
			$INFO = "<script>alert('Advertisement Added to Wishlist Successfully');</script>";
		}else{
			$INFO = "<script>alert('Advertisement Added to Wishlist Fail');</script>";
		}
	}else{
		
		$INFO = "<script>alert('Advertisement Is Already In Your Wishlist');</script>";
	}
	
}
}
include "CustomerNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body align = "center" width = "100%">
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div align = "center">
<div align = "center" style = "margin-top:20px">
<?php
if(isset($_POST["search"])){
	$text = $_POST["SearchText"];
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$image1 = $row["Image1"];	
		$make = $row["Make"];
		$model = $row["Model"];
		$transmission = $row["Transmission"];
		$type = $row["Type"];
		$mileage = $row["Mileage"];
		$year = $row["Year"];
		$seat = $row["NoSeat"];
		$engine = $row["EngineCC"];
		$plate = $row["PlateNumber"];
		$color = $row["Color"];
		$price = $row["Price"];
		$margin = $row["Margin"];
		$status = $row["Status"];
		$BoughtIn = $row["BoughtIn"];
		$description = $row["Description"];
		
		if($text == $make){
		echo "<div style = 'margin-bottom:10px;margin-top:5px;background-color:white;width:1100px;height:250px'>";
		echo "<div>";
		echo "<img src = '$image1' style = 'width:200px;height:250px;float:left'></img>";
		echo "</div>";
		echo "<div style = 'width:250px;height:250px;float:right;background-color:#14344f'>";
		echo "<div style = 'color:white;font-family:verdana;font-size:25px;width:100%;height:20%'>";
		echo "<table style = 'line-height:2'>";
		echo "<tr><td style = 'width:100%' colspan = '2'>RM $price</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>HP:</td><td width = '100px'>$hp</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>Tel:</td><td width = '100px'>$tel</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "<button name = 'Details' value = '$ID' style = 'margin-top:125px;color:white;font-family:verdana;font-size:20px;float:bottom;width:100%;height:30%;border:none;background-color:#0a65b2'>More Details</button>";
		echo "</div>";
		echo "<div>";
		echo "<table style = 'line-height:1.5;float:left;margin-left:10px;font-size:16px;font-family:verdana'>";
		echo "<tr><td><h3 style = 'color:#0b0bb7'>$make $model</h3></td></tr>";
		echo "<tr><td>Year Make	:</td><td>$year</td></tr>";
		echo "<tr><td>Transmission:</td><td>$transmission</td></tr>";
		echo "<tr><td>Type:</td><td>$type</td></tr>";
		echo "<tr><td>Engine Capacity :</td><td>$engine cc</td></tr>";
		echo "<tr><td>Mileage	:</td><td>$mileage km</td></tr>";
		echo "<tr><td>Description	:</td><td>$description</td></tr>";
		echo "</table>";
		echo "<div>";
		echo "<button name = 'wishlist' value = '$ID' style = 'margin-top:220px;margin-left:80px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Add to Wishlist</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		if($text == $model){
		echo "<div style = 'margin-bottom:10px;margin-top:5px;background-color:white;width:1100px;height:250px'>";
		echo "<div>";
		echo "<img src = '$image1' style = 'width:200px;height:250px;float:left'></img>";
		echo "</div>";
		echo "<div style = 'width:250px;height:250px;float:right;background-color:#14344f'>";
		echo "<div style = 'color:white;font-family:verdana;font-size:25px;width:100%;height:20%'>";
		echo "<table style = 'line-height:2'>";
		echo "<tr><td style = 'width:100%' colspan = '2'>RM $price</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>HP:</td><td width = '100px'>$hp</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>Tel:</td><td width = '100px'>$tel</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "<button name = 'Details' value = '$ID' style = 'margin-top:125px;color:white;font-family:verdana;font-size:20px;float:bottom;width:100%;height:30%;border:none;background-color:#0a65b2'>More Details</button>";
		echo "</div>";
		echo "<div>";
		echo "<table style = 'line-height:1.5;float:left;margin-left:10px;font-size:16px;font-family:verdana'>";
		echo "<tr><td><h3 style = 'color:#0b0bb7'>$make $model</h3></td></tr>";
		echo "<tr><td>Year Make	:</td><td>$year</td></tr>";
		echo "<tr><td>Transmission:</td><td>$transmission</td></tr>";
		echo "<tr><td>Type:</td><td>$type</td></tr>";		
		echo "<tr><td>Engine Capacity :</td><td>$engine cc</td></tr>";
		echo "<tr><td>Mileage	:</td><td>$mileage km</td></tr>";
		echo "<tr><td>Description	:</td><td>$description</td></tr>";
		echo "</table>";
		echo "<div>";
		echo "<button name = 'wishlist' value = '$ID' style = 'margin-top:220px;margin-left:80px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Add to Wishlist</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		if($text == $year){
		echo "<div style = 'margin-bottom:10px;margin-top:5px;background-color:white;width:1100px;height:250px'>";
		echo "<div>";
		echo "<img src = '$image1' style = 'width:200px;height:250px;float:left'></img>";
		echo "</div>";
		echo "<div style = 'width:250px;height:250px;float:right;background-color:#14344f'>";
		echo "<div style = 'color:white;font-family:verdana;font-size:25px;width:100%;height:20%'>";
		echo "<table style = 'line-height:2'>";
		echo "<tr><td style = 'width:100%' colspan = '2'>RM $price</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>HP:</td><td width = '100px'>$hp</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>Tel:</td><td width = '100px'>$tel</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "<button name = 'Details' value = '$ID' style = 'margin-top:125px;color:white;font-family:verdana;font-size:20px;float:bottom;width:100%;height:30%;border:none;background-color:#0a65b2'>More Details</button>";
		echo "</div>";
		echo "<div>";
		echo "<table style = 'line-height:1.5;float:left;margin-left:10px;font-size:16px;font-family:verdana'>";
		echo "<tr><td><h3 style = 'color:#0b0bb7'>$make $model</h3></td></tr>";
		echo "<tr><td>Year Make	:</td><td>$year</td></tr>";
		echo "<tr><td>Transmission:</td><td>$transmission</td></tr>";
		echo "<tr><td>Type:</td><td>$type</td></tr>";
		echo "<tr><td>Engine Capacity :</td><td>$engine cc</td></tr>";
		echo "<tr><td>Mileage	:</td><td>$mileage km</td></tr>";
		echo "<tr><td>Description	:</td><td>$description</td></tr>";
		echo "</table>";
		echo "<div>";
		echo "<button name = 'wishlist' value = '$ID' style = 'margin-top:220px;margin-left:80px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Add to Wishlist</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		if($text == $type){
		echo "<div style = 'margin-bottom:10px;margin-top:5px;background-color:white;width:1100px;height:250px'>";
		echo "<div>";
		echo "<img src = '$image1' style = 'width:200px;height:250px;float:left'></img>";
		echo "</div>";
		echo "<div style = 'width:250px;height:250px;float:right;background-color:#14344f'>";
		echo "<div style = 'color:white;font-family:verdana;font-size:25px;width:100%;height:20%'>";
		echo "<table style = 'line-height:2'>";
		echo "<tr><td style = 'width:100%' colspan = '2'>RM $price</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>HP:</td><td width = '100px'>$hp</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>Tel:</td><td width = '100px'>$tel</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "<button name = 'Details' value = '$ID' style = 'margin-top:125px;color:white;font-family:verdana;font-size:20px;float:bottom;width:100%;height:30%;border:none;background-color:#0a65b2'>More Details</button>";
		echo "</div>";
		echo "<div>";
		echo "<table style = 'line-height:1.5;float:left;margin-left:10px;font-size:16px;font-family:verdana'>";
		echo "<tr><td><h3 style = 'color:#0b0bb7'>$make $model</h3></td></tr>";
		echo "<tr><td>Year Make	:</td><td>$year</td></tr>";
		echo "<tr><td>Transmission:</td><td>$transmission</td></tr>";
		echo "<tr><td>Type:</td><td>$type</td></tr>";
		echo "<tr><td>Engine Capacity :</td><td>$engine cc</td></tr>";
		echo "<tr><td>Mileage	:</td><td>$mileage km</td></tr>";
		echo "<tr><td>Description	:</td><td>$description</td></tr>";
		echo "</table>";
		echo "<div>";
		echo "<button name = 'wishlist' value = '$ID' style = 'margin-top:220px;margin-left:80px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Add to Wishlist</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		if($text == ""){
		echo "<div style = 'margin-bottom:10px;margin-top:5px;background-color:white;width:1100px;height:250px'>";
		echo "<div>";
		echo "<img src = '$image1' style = 'width:200px;height:250px;float:left'></img>";
		echo "</div>";
		echo "<div style = 'width:250px;height:250px;float:right;background-color:#14344f'>";
		echo "<div style = 'color:white;font-family:verdana;font-size:25px;width:100%;height:20%'>";
		echo "<table style = 'line-height:2'>";
		echo "<tr><td style = 'width:100%' colspan = '2'>RM $price</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>HP:</td><td width = '100px'>$hp</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>Tel:</td><td width = '100px'>$tel</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "<button name = 'Details' value = '$ID' style = 'margin-top:125px;color:white;font-family:verdana;font-size:20px;float:bottom;width:100%;height:30%;border:none;background-color:#0a65b2'>More Details</button>";
		echo "</div>";
		echo "<div>";
		echo "<table style = 'line-height:1.5;float:left;margin-left:10px;font-size:16px;font-family:verdana'>";
		echo "<tr><td><h3 style = 'color:#0b0bb7'>$make $model</h3></td></tr>";
		echo "<tr><td>Year Make	:</td><td>$year</td></tr>";
		echo "<tr><td>Transmission:</td><td>$transmission</td></tr>";
		echo "<tr><td>Type:</td><td>$type</td></tr>";
		echo "<tr><td>Engine Capacity :</td><td>$engine cc</td></tr>";
		echo "<tr><td>Mileage	:</td><td>$mileage km</td></tr>";
		echo "<tr><td>Description	:</td><td>$description</td></tr>";
		echo "</table>";
		echo "<div>";
		echo "<button name = 'wishlist' value = '$ID' style = 'margin-top:220px;margin-left:80px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Add to Wishlist</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		}
		
		
		}
}
}


if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$image1 = $row["Image1"];	
		$make = $row["Make"];
		$model = $row["Model"];
		$transmission = $row["Transmission"];
		$type = $row["Type"];
		$mileage = $row["Mileage"];
		$year = $row["Year"];
		$seat = $row["NoSeat"];
		$engine = $row["EngineCC"];
		$plate = $row["PlateNumber"];
		$color = $row["Color"];
		$price = $row["Price"];
		$margin = $row["Margin"];
		$status = $row["Status"];
		$BoughtIn = $row["BoughtIn"];
		$description = $row["Description"];
		
		echo "<div style = 'margin-bottom:10px;margin-top:5px;background-color:white;width:1100px;height:250px'>";
		echo "<div>";
		echo "<img src = '$image1' style = 'width:200px;height:250px;float:left'></img>";
		echo "</div>";
		echo "<div style = 'width:250px;height:250px;float:right;background-color:#14344f'>";
		echo "<div style = 'color:white;font-family:verdana;font-size:25px;width:100%;height:20%'>";
		echo "<table style = 'line-height:2'>";
		echo "<tr><td style = 'width:100%' colspan = '2'>RM $price</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>HP:</td><td width = '100px'>$hp</td></tr>";
		echo "<tr style = 'font-size:15px'><td width = '50px'>Tel:</td><td width = '100px'>$tel</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "<button name = 'Details' value = '$ID' style = 'margin-top:125px;color:white;font-family:verdana;font-size:20px;float:bottom;width:100%;height:30%;border:none;background-color:#0a65b2'>More Details</button>";
		echo "</div>";
		echo "<div>";
		echo "<table style = 'line-height:1.5;float:left;margin-left:10px;font-size:16px;font-family:verdana'>";
		echo "<tr><td><h3 style = 'color:#0b0bb7'>$make $model</h3></td></tr>";
		echo "<tr><td>Year Make	:</td><td>$year</td></tr>";
		echo "<tr><td>Transmission:</td><td>$transmission</td></tr>";
		echo "<tr><td>Type:</td><td>$type</td></tr>";
		echo "<tr><td>Engine Capacity :</td><td>$engine cc</td></tr>";
		echo "<tr><td>Mileage	:</td><td>$mileage km</td></tr>";
		echo "<tr><td>Description	:</td><td>$description</td></tr>";
		echo "</table>";
		echo "<div>";
		echo "<button name = 'wishlist' value = '$ID' style = 'margin-top:220px;margin-left:80px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Add to Wishlist</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		
		
		}
}
?>


</div>
<p style = "color:red;font-size:14px;font-family:Arial Black"><?php echo $INFO; ?></p>
</div>
</form>
</body>
</html>
