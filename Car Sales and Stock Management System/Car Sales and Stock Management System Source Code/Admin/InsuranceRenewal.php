<?php
$title = "Insurance Renewal";
$INFO = "";
session_start();

define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM vehiclecard";
$result = mysqli_query($conn,$sql);

 if(isset($_POST['renew'])){
	$_SESSION['id'] = $_POST['renew'];
	header("location:BuyerInfo.php");
	
}

if(isset($_POST['delete'])){
$delete_id = $_POST["delete"];
$conf = $_POST["result"];
if($conf == "1"){
	$delete_query = "DELETE FROM vehiclecard WHERE ID = '$delete_id'";
	if(mysqli_query($conn,$delete_query)){
	$INFO = "Deleted Successfully";
	header("refresh:0");
	}
	else{
	$INFO = "Deleted Fail"	;
	header("refresh:0");
	}
}else{
	$INFO = "Canceled";
	header("refresh:0");
}

	
}

include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf" width = "100%" height = "100%">
<div align = "center">
<div style = "overflow-y:scroll;margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:500px">
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<table border = '2px solid black' style = "width:100%">
<?php
echo '<tr align = "center"><th width = "auto">NO.</th><th width = "auto">Owner</th><th width = "auto">Model</th><th width = "auto">Plate Number</th><th width = "auto">Year</th><th width = "auto">HP Number</th><th align = "center">Expired Date</th><th align = "center" width = "auto">Action</th></tr>';
{	
if(isset($_POST["search"])){
		$text = $_POST["searchTxt"];
		if(mysqli_num_rows($result) > 0){
		$i = 1;
		while($row = mysqli_fetch_assoc($result)){
		$no = $row['ID'];
		$owner = $row['Name'];
		$model = $row['Model'];
		$plate = $row['Plate'];
		$year = $row['Year'];
		$hp = $row['HP'];
		$expired = $row["ExpiredDate"];
		
		if($text == ""){
		echo "<tr style = 'font-family:verdana;font-size:16px'><td align = 'center'>$i</td><td align = 'center'>$owner</td><td align = 'center'>$model</td><td align = 'center'>$plate</td><td align = 'center'>$year</td><td align = 'center'>$hp</td><td align = 'center'>$expired</td><td align = 'center'><button value =$no name = 'renew' style = 'text-decoration:underline;border:none;background-color:white;color:blue;'><b>Renew</b></button><button value ='$no' name = 'delete' style = 'text-decoration:underline;border:none;background-color:white;color:blue;' onclick = 'confirmation()'><b>Delete</b></button></td></tr>";
		$i++;
		}
		
		if($text == $owner){
		echo "<tr style = 'font-family:verdana;font-size:16px'><td align = 'center'>$i</td><td align = 'center'>$owner</td><td align = 'center'>$model</td><td align = 'center'>$plate</td><td align = 'center'>$year</td><td align = 'center'>$hp</td><td align = 'center'>$expired</td><td align = 'center'><button value =$no name = 'renew' style = 'text-decoration:underline;border:none;background-color:white;color:blue;'><b>Renew</b></button><button value ='$no' name = 'delete' style = 'text-decoration:underline;border:none;background-color:white;color:blue;' onclick = 'confirmation()' ><b>Delete</b></button></td></tr>";
		}
		if($text == $year){
		echo "<tr style = 'font-family:verdana;font-size:16px'><td align = 'center'>$i</td><td align = 'center'>$owner</td><td align = 'center'>$model</td><td align = 'center'>$plate</td><td align = 'center'>$year</td><td align = 'center'>$hp</td><td align = 'center'>$expired</td><td align = 'center'><button value =$no name = 'renew' style = 'text-decoration:underline;border:none;background-color:white;color:blue;'><b>Renew</b></button><button value ='$no' name = 'delete' style = 'text-decoration:underline;border:none;background-color:white;color:blue;' onclick = 'confirmation()'><b>Delete</b></button></td></tr>";
		
		}
		if($text == $plate){
		echo "<tr style = 'font-family:verdana;font-size:16px'><td align = 'center'>$i</td><td align = 'center'>$owner</td><td align = 'center'>$model</td><td align = 'center'>$plate</td><td align = 'center'>$year</td><td align = 'center'>$hp</td><td align = 'center'>$expired</td><td align = 'center'><button value =$no name = 'renew' style = 'text-decoration:underline;border:none;background-color:white;color:blue;'><b>Renew</b></button><button value ='$no' name = 'delete' style = 'text-decoration:underline;border:none;background-color:white;color:blue;' onclick = 'confirmation()'><b>Delete</b></button></td></tr>";
		
		}
	}
	
	}
}	
		}
		
if(mysqli_num_rows($result) > 0){
	$i = 1;
	while($row = mysqli_fetch_assoc($result)){
		$no = $row['ID'];
		$owner = $row['Name'];
		$model = $row['Model'];
		$plate = $row['Plate'];
		$year = $row['Year'];
		$hp = $row['HP'];
		$expired = $row["ExpiredDate"];
		
		echo "<tr style = 'font-family:verdana;font-size:16px'><td align = 'center'>$i</td><td align = 'center'>$owner</td><td align = 'center'>$model</td><td align = 'center'>$plate</td><td align = 'center'>$year</td><td align = 'center'>$hp</td><td align = 'center'>$expired</td><td align = 'center'><button value =$no name = 'renew' style = 'text-decoration:underline;border:none;background-color:white;color:blue;'><b>Renew</b></button><button value ='$no'  name = 'delete' style = 'text-decoration:underline;border:none;background-color:white;color:blue;' onclick = 'confirmation()'><b>Delete</b></button></td></tr>";
		$i++;
		
	}
	
	
}




?>
</table>

</div>
<a  href="NewCustomer.php" class="btn btn-lg btn-primary" style = "margin-top:20px;margin-right:530px"><span class="glyphicon glyphicon-check"></span>New Customer</a>
<p name = "info" style = "font-family:Arial Black;color:red;font-size:16px;margin-left:300px"><?php echo $INFO; ?></p>
<input type = 'hidden' value = "unknown"  id = "result" name = "result"></input>
</div>
</form>
</body>
</html>
<script>
function confirmation(){
var conf = confirm("Are you sure to delete this stock?");
if (conf == true){
	document.getElementById("result").value = "1";
}
else
	document.getElementById("result").value = "0";
}

</script>