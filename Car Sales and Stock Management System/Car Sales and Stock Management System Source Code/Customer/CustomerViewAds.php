<?php
$title = "View Advertisement";
session_start();
$id = $_SESSION["CustomerAdsID"];

define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM advertisement WHERE ID = '$id'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
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

if(isset($_POST["back"])){
	header("location:CustomerAdvertisement.php");
}
include "CustomerNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<style>
/* Main carousel style */
.carousel {
    width: 600px;
}

/* Indicators list style */
.article-slide .carousel-indicators {
    bottom: 0;
    left: 0;
    margin-left: 5px;
    width: 100%;
}
/* Indicators list style */
.article-slide .carousel-indicators li {
    border: medium none;
    border-radius: 0;
    float: left;
    height: 54px;
    margin-bottom: 5px;
    margin-left: 0;
    margin-right: 5px !important;
    margin-top: 0;
    width: 100px;
}
/* Indicators images style */
.article-slide .carousel-indicators img {
    border: 2px solid #FFFFFF;
    float: left;
    height: 54px;
    left: 0;
    width: 100px;
}
/* Indicators active image style */
.article-slide .carousel-indicators .active img {
    border: 2px solid #428BCA;
    opacity: 0.7;
}
</style>
<body style = "background-color:#bfbfbf">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>">
<div align = "center">
<div style = "margin-top:20px" class="carousel slide article-slide" id="article-photo-carousel">

 <div class="carousel-inner cont-slider">

    <div class="item active">
      <img alt="" title="" src="<?php echo $image1; ?>" style = "height:400px" >
    </div>
    <div class="item">
      <img alt="" title="" src="<?php echo $image2; ?>" style = "height:400px">
    </div>
    <div class="item">
      <img alt="" title="" src="<?php echo $image3; ?>" style = "height:400px">
    </div>
    <div class="item">
      <img alt="" title="" src="<?php echo $image4; ?>" style = "height:400px">
    </div>
	<div class="item">
      <img alt="" title="" src="<?php echo $image5; ?>" style = "height:400px">
    </div>
  </div>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li class="active" data-slide-to="0" data-target="#article-photo-carousel">
      <img alt="" src="<?php echo $image1; ?>">
    </li>
    <li class="" data-slide-to="1" data-target="#article-photo-carousel">
      <img alt="" src="<?php echo $image2; ?>">
    </li>
    <li class="" data-slide-to="2" data-target="#article-photo-carousel">
      <img alt="" src="<?php echo $image3; ?>">
    </li>
    <li class="" data-slide-to="3" data-target="#article-photo-carousel">
      <img alt="" src="<?php echo $image4; ?>">
    </li>
	<li class="" data-slide-to="4" data-target="#article-photo-carousel">
      <img alt="" src="<?php echo $image5; ?>">
    </li>
  </ol>
</div>
<table   border = "2px" style = "line-height:2;font-size:16px;font-family:verdana;border-color:#041756;margin-top:20px;background-color:white;width:800px">
<tr ><td width = "200px">Make:</td><td width = "200px"><?php echo $make; ?></td><td width = "200px">Model:</td><td width = "200px"><?php echo $model; ?></td></tr>
<tr ><td width = "200px">Transmission:</td><td width = "200px"><?php echo $transmission; ?></td><td width = "200px">Type:</td><td width = "200px"><?php echo $type; ?></td></tr>
<tr ><td width = "200px">Mileage:</td><td width = "200px"><?php echo $mileage," km"; ?></td><td width = "200px">Manufacturer Year:</td><td width = "200px"><?php echo $year; ?></td></tr>
<tr ><td width = "200px">Seat Capacity:</td><td width = "200px"><?php echo $seat; ?></td><td width = "200px">Engine Capacity:</td><td width = "200px"><?php echo $engine," cc"; ?></td></tr>
<tr ><td width = "200px">Color:</td><td width = "200px"><?php echo $color; ?></td><td width = "200px">Status:</td><td width = "200px"><?php echo $status; ?></td></tr>
</table>
<div style = "margin-top:20px;width:800px;margin-bottom:20px;">
<div style = "float:left;width:200px;height:100px;background-color:black;color:white;font-family:verdana;font-size:16px">
HP: <br><?php echo "<h3>$hp</h3>"; ?>
</div>
<div style = "width:200px;height:100px;background-color:black;color:white;font-family:verdana;font-size:16px">
Price: <br><?php echo "<h2>RM $price</h2>"; ?>
</div>
<div style = "float:right;margin-top:-100px;width:200px;height:100px;background-color:black;color:white;font-family:verdana;font-size:16px">
Tel: <br><?php echo "<h3>$tel</h3>"; ?>
</div>
</div >
<div style = ";width:800px;font-family:verdana;font-size:16px"><h2 style = "float:left">Description</h2></div>
<div style = "width:800px;font-family:arial;font-size:16px">

<div style = "overflow-y:scroll;margin-bottom:20px;margin-top:100px;width:100%;height:500px;background-color:white">
<label style = "float:left"><?php echo $description; ?></label>
</div>
</div>
<button name = 'back' style = 'margin-bottom:20px;width:100px;background-color:#45b9f7;border:none;border-radius:5px 5px;font-family:verdana;font-size:20px'>Back</button>
</div>
</form>
</body>
</html>