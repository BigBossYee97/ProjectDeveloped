<?php 
$title = "Favorite Advertisements";
$INFO = "";
error_reporting(0);
session_start();
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$customer = "SELECT * FROM customeraccount WHERE Email = '$_SESSION[Status]'";
$cus_result = mysqli_query($conn,$customer);

if(mysqli_num_rows($cus_result) > 0){
		while($row = mysqli_fetch_assoc($cus_result)){
		$name = $row["Name"];
		}
}

$company = "SELECT * FROM companyprofile";
$CompanyResult = mysqli_query($conn,$company);

if(mysqli_num_rows($CompanyResult) > 0){
		while($row = mysqli_fetch_assoc($CompanyResult)){
		$hp = $row["HP"];
		$tel = $row["Office"];
		}
}

$sql = "SELECT * FROM wishlist WHERE Name = '$name'";
$result = mysqli_query($conn,$sql);

if(isset($_POST["Details"])){
$id = $_POST["Details"];
$_SESSION["CustomerAdsID"] = $id;
header("location:CustomerViewAds.php");
}

if(isset($_POST["delete"])){
$delete_id = $_POST["delete"];
$delete = "DELETE FROM wishlist WHERE ID = $delete_id";
if(mysqli_query($conn,$delete))	{
	$INFO = "<script>alert('Advertisement Deleted From Wishlist');</script>";
	header("refresh:0");
	}else{
	$INFO = "<script>alert('Advertisement Failed to Delete From Wishlist');</script>";

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
		$status = $row["Status"];
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
		echo "<button name = 'delete' value = '$ID' style = 'margin-top:220px;margin-left:200px;background-color:#d8a50d;border:none;border-radius:5px 5px' >Delete</button>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		
		
		}
}
?>


</div>
<p style = "font-family:arial black;font-size:12px;color:red"><?php echo $INFO; ?></p>

</div>
</form>
</body>
</html>
