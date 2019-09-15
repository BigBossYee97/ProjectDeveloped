<?php
$title = "View Stock";
session_start();
$id = $_SESSION["StockID"];
$INFO = "";


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

if(isset($_POST["delete"])){
if($_POST["delete"] == "1"){
$delete = "DELETE FROM advertisement WHERE ID = $id";
if(mysqli_query($conn,$delete)){
	header("location:StockList.php");
}
else{
	$INFO = "Delete Failed.Please Try Again.";
}
}
else{
	$INFO = "Canceled";
}
}

if(isset($_POST["edit"])){
header("location:EditStockList.php");
}
include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<style>

</style>
<body style = "background-color:#bfbfbf">
<div align = "center">
<div style = "margin-left:300px;margin-top:100px;width:1040px;height:500px">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<section class="intro carousel slide bg-overlay-light h-auto" id="carouselExampleCaptions">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
	  <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="3" class=""></li>
	  <li data-target="#carouselExampleCaptions" data-slide-to="4" class=""></li>
    
	</ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid" alt="First slide" src="<?php echo $image1 ?>" style = "width:100%;height:300px">
        
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" alt="First slide" src="<?php echo $image2 ?>" style = "width:100%;height:300px">
      </div>
	  <div class="carousel-item">
        <img class="d-block img-fluid" alt="First slide" src="<?php echo $image3 ?>" style = "width:100%;height:300px">
      </div>
	  <div class="carousel-item">
        <img class="d-block img-fluid" alt="First slide" src="<?php echo $image4 ?>" style = "width:100%;height:300px">
      </div>
	  <div class="carousel-item">
        <img class="d-block img-fluid" alt="First slide" src="<?php echo $image5 ?>" style = "width:100%;height:300px">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</section>
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data">
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<label>Specification</label>
<hr>
<label>Make:</label>
<input disabled type = "text" name = "MAKE" value = "<?php echo $make; ?>" style = "border-radius:5px 5px;width:170px;margin-right:121px;margin-left:43px;font-size:14px;border:none"></input>
<label>Model:</label><input disabled type = "text" name = "model" value = "<?php echo $model; ?>" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-right:85px;margin-left:38px"></input>
Transmission:<input disabled type = "text" name = "transmission" value = "<?php echo $transmission;?>" style = "border:none;font-size:14px;margin-left:11px;border-radius:5px 5px;width:170px"></input>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px"><label>Type:</label>
<input disabled type = "text" name = "type" value = "<?php echo $type; ?>" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:47px;margin-right:121px;">

<label>Mileage:</label><input disabled type = "text" name = "mileage" value = "<?php echo $mileage; ?>" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-right:85px;margin-left:25px">
Mfg.Year:<input disabled type = "text" value = "<?php echo $year; ?>" name = "year" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:45px">

</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px"><label>No.of Seat: </label>
<input disabled value = "<?php echo $seat; ?>" style = "width:170px;border:0px;border-radius:5px 5px;font-size:14px;margin-right:120px" name = "seat" placeholder = "Seat Capacity"></input>
Engine CC: <input disabled value = "<?php echo $engine ; ?>" style = "margin-right:83px;border:0px;border-radius:5px 5px;width:170px;font-size:14px;" name = "engine" placeholder = "Engine Capacity"></input>
Plate Number: <input disabled value = "<?php echo $plate; ?>" style = "border:0px;border-radius:5px 5px;width:170px;font-size:14px;" name = "plate" placeholder = "Plate Number"></input>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
Color:<input disabled type = "text" value = "<?php echo $color; ?>" name = "color" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:47px">

<label style = "margin-left:121px">Price:</label>
<input disabled value = "<?php echo $price; ?>"name = "price" placeholder = "Price" style = "margin-left:43px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>
<label style = "margin-left:84px">Margin:</label>
<input disabled value = "<?php echo $margin; ?>" name = "margin" placeholder = "Margin" style = "margin-left:55px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>

</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<label style = "margin-left:180px">Bought In:</label>
<input disabled name = "BuyIn" value = "<?php echo $BoughtIn; ?>" placeholder = "Bought In Price" style = "margin-left:0px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>
<label style = "margin-left:100px">Status: </label>
<input disabled name = "status" style = "border:none;border-radius:5px 5px;width:170px;margin-left:29px;font-size:14px" value = "<?php echo $status; ?>"></input>

</div>
<br>
<div>

<div align = "center" style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<hr>
<label>Description</label>
<hr>
<textarea disabled name = "Description" style = "overflow-y:scroll;width:1040px;height:200px"><?php echo $description; ?></textarea>
<p name = "info" style = "font-family:Arial Black;color:red;font-size:16px"><?php echo $INFO; ?></p>
<button  style = "border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px" name = "edit" >Edit</button>
<button id = "delete" style = "border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px" name = "delete" onclick = "confirmation()"  value = "unknown">Delete</button>

</div>
</form>
</div>
</div>

</body>
</html>  
<script>
function confirmation(){
var conf = confirm("Are you sure to delete this stock?");
if (conf == true){
	document.getElementById("delete").value = "1";
}
else
	document.getElementById("delete").value = "0";
}

</script>