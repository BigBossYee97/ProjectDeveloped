<?php
$title = "Trade List";
session_start();
$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM tradelist";
$result = mysqli_query($conn,$sql);
if(isset($_POST["view"])){
$id = $_POST["view"];
$_SESSION["ViewTradeID"] = $id; 
header("location:ViewTradeList.php");
}
if(isset($_POST["delete"])){
$confirmation = $_POST["result"];
$id = $_POST["delete"];
if($confirmation == "1"){
 $delete = "DELETE FROM tradelist WHERE ID = $id";
 if(mysqli_query($conn,$delete)){

 $INFO = "Trade Deleted Successfully";
 header("refresh:1");
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

<body style = "background-color:#bfbfbf">
<form action = "<?php $_SERVER['PHP_SELF'];?>" method = "POST">
<div align = "center" >
<div style = "overflow-y:scroll;margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:500px">
<table border = '2px solid black' style = "font-family:verdana;width:100%">
<tr align = "center"><th width = "auto">No.</th><th>Photo</th><th width = "auto">Make</th><th width = "auto">Model</th><th width = "auto">Plate No</th><th width = "auto">Mfg.Year</th><th width = "auto">Color</th><th width = "auto">Final Price</th><th width = "auto">Commission</th><th width = "auto" align = "center">Sold By</th><th align = "center" width = "auto">Action</th></tr>
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
		$finalPrice = $row["LastPrice"];
		$commision = $row["Commission"];
		$soldby = $row["SoldBy"];
		$status = $row["Status"];
		$date = $row["Date"];
		$margin = $row["Margin"];
		if($text == $make){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $model){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $plate){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $year){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $color){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $soldby){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == ""){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $date){	
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
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
	$finalPrice = $row["LastPrice"];
	$commision = $row["Commission"];
	$soldby = $row["SoldBy"];
	$status = $row["Status"];
	$margin = $row["Margin"];
	
	echo "<tr align = 'center'><td>$i</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $finalPrice</td><td>RM $commision</td><td>$soldby</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
	$i++;
	}}
?>
</table>
</div>
<p style = "margin-top:10px;margin-left:300px;font-family:Arial Black;color:red;font-size:16px;"><?php echo $INFO ?></p>
<input type = "hidden" value = "unknown" id = "result" name = "result"></input>
</div>
</div>
</form>
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