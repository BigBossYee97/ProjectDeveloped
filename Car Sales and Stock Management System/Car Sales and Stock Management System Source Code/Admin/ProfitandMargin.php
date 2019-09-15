<?php
$title = "Profit and Margin";
session_start();
$INFO = "";
$dateofyear = $_SESSION["Year"];

define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM tradelist";
$result = mysqli_query($conn,$sql);


include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>

<body style = "background-color:#bfbfbf">
<form action = "<?php $_SERVER['PHP_SELF'];?>" method = "POST">
<div align = "center" >
<div align = "center">
<div style = "overflow-y:scroll;margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:500px">
<table border = '2px solid black' style = "font-family:verdana;width:100%">
<tr align = "center" ><th width = "auto">No.</th><th width = "auto">Photo</th><th width = "auto">Make</th><th width = "auto">Model</th><th width = "auto">Plate Number</th><th width = "auto">Bought In Price</th><th width = "auto">Price Sold</th><th width = "auto">Commission</th><th width = "auto">Sold By</th><th width = "auto">Profit</th></tr>
<?php
$totalProfit = 0;
$PROFIT = 0;
if(isset($_POST["search"])){
		$text = $_POST["searchTxt"];
		if(mysqli_num_rows($result) > 0){
		$n = 1;
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$image = $row["Image1"];
		$make = $row["Make"];
		$model = $row["Model"];
		$color = $row["Color"];
		$plate = $row["PlateNumber"];
		$price = $row["Price"];
		$finalPrice = $row["LastPrice"];
		$commision = $row["Commission"];
		$soldby = $row["SoldBy"];
		$status = $row["Status"];
		$date = $row["Date"];
		$boughtin = $row["BoughtIn"];
		
		$profit = $finalPrice - $boughtin - $commision;
		$PROFIT = $PROFIT + $profit;
		if($text == $make){
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		if($text == $model){
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		if($text == $plate){
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		if($text == $color){
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		if($text == $soldby){
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		if($text == ""){
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		if($text == $date){	
	echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
		}
		
		$n++;
		}}
}
		
if(mysqli_num_rows($result) > 0){
	$i= 1;

	while($row = mysqli_fetch_assoc($result)){
	$ID = $row["ID"];
	$image = $row["Image1"];
	$make = $row["Make"];
	$model = $row["Model"];
	$plate = $row["PlateNumber"];
	$price = $row["Price"];
	$boughtin = $row["BoughtIn"];
	$finalPrice = $row["LastPrice"];
	$date = $row["Date"];
	$commision = $row["Commission"];
	$soldby = $row["SoldBy"];
	
	
	$profit = $finalPrice - $boughtin - $commision; 
	if($dateofyear == $date){
	$totalProfit = $totalProfit + $profit;
	echo "<tr align = 'center'><td>$i</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$boughtin</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td>$profit</td></tr>";
	}
	
	$i ++;
	
}
}
?>
</table>
</div>
<label style = 'margin-top:10px;margin-left:300px;font-family:verdana;font-size:24px;color:blue' >Profit of <?php echo $dateofyear;?>: <?php echo 'RM ',$totalProfit?></label>
</div>
</div>
</form>
</body>
</html>
