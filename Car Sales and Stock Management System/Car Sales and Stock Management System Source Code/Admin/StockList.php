<?php
$title = "Stock List";
session_start();
$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');
$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

$sql = "SELECT * FROM advertisement";
$result = mysqli_query($conn,$sql);

if(isset($_POST["view"])){
	$_SESSION["StockID"] = $_POST["view"];
	header("location:ViewStockList.php ");
}

if(isset($_POST["edit"])){
$_SESSION["StockID"] = $_POST["edit"];
header("location:EditStockList.php");
}

if(isset($_POST["delete"])){
$confirm = $_POST["result"];
$id = $_POST["delete"];
if($confirm == "1"){
	$delete = "DELETE FROM advertisement WHERE ID = '$id'";
	if(mysqli_query($conn,$delete)){
	$INFO = "Stock Deleted Successfully";
	header("refresh:1");
	}
	else{
	$INFO = "Stock Delete Failed";
	}
}
else{
$INFO = "Canceled";
}




}

include 'NavigationBar.php';
?>


<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<form action = "<?php $_SERVER['PHP_SELF'];?>" method = "POST">
<div align = "center" >
<div style = "overflow-y:scroll;margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:500px">

<table border = '2px solid black' style = "font-family:verdana;width:100%">
<tr align = "center"><th width = "auto">No.</th><th>Photo</th><th width = "auto">Make</th><th width = "auto">Model</th><th width = "auto">Plate No</th><th width = "auto">Mfg.Year</th><th width = "auto">Color</th><th width = "auto">Price</th><th width = "auto">Margin</th><th width = "auto" align = "center">Status</th><th align = "center" width = "auto">Action</th></tr>
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
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $model){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $plate){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $year){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $color){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == $status){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
		}
		if($text == ""){
		echo "<tr align = 'center'><td>$n</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' onclick = 'confirmation()' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
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
	
	echo "<tr align = 'center'><td>$i</td><td><img src = '$image' style = 'height:80px;width:100px'></img></td><td>$make</td><td>$model</td><td>$plate</td><td>$year</td><td>$color</td><td>RM $price</td><td>RM $margin</td><td>$status</td><td><button name = 'view' value = '$ID' style = 'width:70px;background-color:#45b9f7;border:none;border-radius:5px 5px'>View</button><button name = 'edit' value = '$ID' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Edit</button><button name = 'delete' value = '$ID' onclick = 'confirmation()' style = 'width:70px;margin-left:5px;background-color:#45b9f7;border:none;border-radius:5px 5px'>Delete</button></td></tr>";
	$i++;
	}}


?>
</table>
</div>
<p style = "margin-top:10px;margin-left:300px;font-family:Arial Black;color:red;font-size:16px;"><?php echo $INFO ?></p>
<a  href="InsertAdvertisement.php" class="btn btn-lg btn-primary" style = "margin-top:20px;margin-right:570px"><span class="glyphicon glyphicon-check"></span>New Stock</a>
<input type = "hidden" value = "unknown" id = "result" name = "result"></input>
</div>
</div>
</form>
</body>
</html>
<script>
function confirmation(){
var conf = confirm("Are you sure to delete this stock?");
if(conf == true){
document.getElementById("result").value = "1";
}
else{
document.getElementById("result").value = "0";
}
}
</script>
