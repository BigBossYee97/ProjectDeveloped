<?php
session_start();
$id = $_SESSION["ViewTradeID"];
$title = "View Trade List";
$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM tradelist WHERE ID = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	$i = 1;
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
	$finalPrice = $row["LastPrice"];
	$commision = $row["Commission"];
	$soldby = $row["SoldBy"];
	$status = $row["Status"];
	$margin = $row["Margin"];
	
	}}
	if(isset($_POST["delete"])){
	$result = $_POST["result"];
	if($result == "1"){
		
		$delete = "DELETE FROM tradelist WHERE ID = $id";
		if(mysqli_query($conn,$delete)){
		$INFO = "Trade Deleted Successfully";
		header("refresh:1;url = TradeList.php");
		}
		else{
		$INFO = "Trade Deleted Fail";
		}
	}
	else{
		$INFO = "Canceled";
	}
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
<input disabled type = "text" name = "MAKE" value = "<?php echo $make; ?>" style = "border-radius:5px 5px;width:170px;margin-left:43px;font-size:14px;border:none"></input>
<label style = "margin-left:118px">Model:</label><input disabled type = "text" name = "model" value = "<?php echo $model; ?>" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:53px"></input>
<label style = "margin-left:68px">Transmission:</label><input disabled type = "text" name = "transmission" value = "<?php echo $transmission;?>" style = "border:none;font-size:14px;margin-left:16px;border-radius:5px 5px;width:170px"></input>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px"><label>Type:</label>
<input disabled type = "text" name = "type" value = "<?php echo $type; ?>" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:47px;">

<label style = "margin-left:118px">Mileage:</label><input disabled type = "text" name = "mileage" value = "<?php echo $mileage; ?>" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:41px">
<label style = "margin-left:69px">Mfg.Year:</label><input disabled type = "text" value = "<?php echo $year; ?>" name = "year" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:48px">

</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px"><label>No.of Seat: </label>
<input disabled value = "<?php echo $seat; ?>" style = "width:170px;border:0px;border-radius:5px 5px;font-size:14px;margin-right:0px" name = "seat" placeholder = "Seat Capacity"></input>
<label style = "margin-left:118px">Engine CC: </label><input disabled value = "<?php echo $engine ; ?>" style = "margin-left:20px;border:0px;border-radius:5px 5px;width:170px;font-size:14px;" name = "engine" placeholder = "Engine Capacity"></input>
<label style = "margin-left:68px">Plate Number:</label><input disabled value = "<?php echo $plate; ?>" style = "margin-left:9px;border:0px;border-radius:5px 5px;width:170px;font-size:14px;" name = "plate" placeholder = "Plate Number"></input>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
Color:<input disabled type = "text" value = "<?php echo $color; ?>" name = "color" style = "border:none;font-size:14px;border-radius:5px 5px;width:170px;margin-left:47px">

<label style = "margin-left:121px">Price:</label>
<input disabled value = "<?php echo $price; ?>"name = "price" placeholder = "Price" style = "margin-left:57px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>
<label style = "margin-left:69px">Margin:</label>
<input disabled value = "<?php echo $margin; ?>" name = "margin" placeholder = "Margin" style = "margin-left:56px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>

</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<label style = "margin-left:0px">Last Price: </label>
<input disabled name = "lastprice" style = "border:none;border-radius:5px 5px;width:170px;margin-left:5px;font-size:14px" value = "<?php echo $finalPrice; ?>" ></input>
<label style = "margin-left:122px">Commission: </label>
<input disabled name = "commission" value = "<?php echo $commision; ?>" style = "border:none;border-radius:5px 5px;width:170px;margin-left:0px;font-size:14px" value = "<?php echo $status; ?>"></input>
<label style = "margin-left:70px">Sold By: </label>
<input disabled name = "soldby" value = "<?php echo $soldby;?>"style = "border:none;border-radius:5px 5px;width:170px;margin-left:47px;font-size:14px" value = "<?php echo $status; ?>"></input>

</div>
<br>
<div>

<div align = "center" style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<hr>
<label>Description</label>
<hr>
<textarea disabled name = "Description" style = "overflow-y:scroll;width:1040px;height:200px"><?php echo $description; ?></textarea>
<p name = "info" style = "font-family:Arial Black;color:red;font-size:16px"><?php echo $INFO; ?></p>
<button id = "delete" style = "border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px" name = "delete" onclick = "confirmation()"  value = "unknown">Delete</button>
<input type = "hidden" id = "result" name = "result" value = "unknown"></input>
</div>
</form>
</div>
</div>

</body>
</html>  
<script>
function confirmation(){
var conf = confirm("Are you sure to delete this trade?");
if(conf == true)
	document.getElementById("result").value = "1";
else
	document.getElementById("result").value = "0";


}
</script>