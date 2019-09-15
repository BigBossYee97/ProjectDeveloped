<?php
session_start();
$SelectedID = $_SESSION["id"];
$title = "UPDATE SIJIL PEMILIKAN KENDERAN";

$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM vehiclecard WHERE ID = $SelectedID ";
$result = mysqli_query($conn,$sql);

if(isset($_POST["owner"],$_POST["ic"],$_POST["address"],$_POST["regcard"],$_POST["plate"],$_POST["enjin"],$_POST["chasis"],$_POST["model"],$_POST["enjincapacity"],$_POST["color"],$_POST["year"],$_POST["body"],$_POST["seat"],$_POST["datecover"],$_POST["hirePurchaseC"],$_POST["dateEnd"])){
	$owner = $_POST["owner"];
	$ic = $_POST["ic"];
	$address = $_POST["address"];
	$regCard = $_POST["regcard"];
	$plate = $_POST["plate"];
	$enjin = $_POST["enjin"];
	$chasis = $_POST["chasis"];
	$model = $_POST["model"];
	$enjinCapacity = $_POST["enjincapacity"];
	$color = $_POST["color"];
	$year = $_POST["year"];
	$body = $_POST["body"];
	$seat = $_POST["seat"];
	$datecover = $_POST["datecover"];
	$hireCompany = $_POST["hirePurchaseC"];
	$dateend = $_POST["dateEnd"];
	if($owner == "" || $ic == "" || $address == "" || $regCard == "" || $plate == "" || $enjin == "" || $chasis == "" || $model == "" || $enjinCapacity == "" || $color == "" || $year == "" || $body == "" || $seat == "" || $datecover == "" || $hireCompany == "" || $dateend == ""){
		$INFO = "PLEASE DO NOT LEAVE ANY BLANKS EMPTY";
	}
	else{
		$update = "UPDATE vehiclecard SET Name = '$owner',IC = '$ic',Address = '$address', RegCardNo = '$regCard', Plate = '$plate', NoEnjin = '$enjin', NoChasis = '$chasis', Model = '$model', EngineCC = '$enjinCapacity', Colour = '$color', Year = '$year', BodyType = '$body', Seats = '$seat', CoverageDate = '$datecover', ExpiredDate = '$dateend', HirePCompany = '$hireCompany' WHERE ID = '$SelectedID' ";
		if(mysqli_query($conn,$update)){
			$INFO = "Details Updated Successfully";
			header("refresh:1;url = BuyerInfo.php");
		}
		else{
			$INFO = "Update Failed";
		}
	}
}
include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf" width = "100%" height = "100%">
<div align = "center">
<div style = "margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:420px">
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<pre style = "font-family:verdana">
<table border = '2px solid black' style = "width:100%">
<?php
echo '<tr align = "center"><th>SIJIL PEMILIKAN KENDERAAN</th></tr>';
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$owner = $row['Name'];
	$ic = $row["IC"];
	$address = $row["Address"];
	$RegCard = $row["RegCardNo"];
	$Plate = $row["Plate"];
	$NoEnjin = $row["NoEnjin"];
	$NoChasis = $row["NoChasis"];
	$Model = $row["Model"];
	$EngineCapacity = $row["EngineCC"];
	$Colour = $row["Colour"];
	$Year = $row["Year"];
	$Body = $row["BodyType"];
	$Seats = $row["Seats"];
	$DateCovered = $row["CoverageDate"];
	$EndCovered = $row["ExpiredDate"];
	$HirePurchaseCompany = $row["HirePCompany"];
	echo "<tr><td> Name				:	<input type = 'text' size = '80' name = 'owner' value = '$owner' style = 'border:none'></input></td></tr>";
	echo "<tr><td> IC Number			:	<input type = 'text' size = '80' name = 'ic' value = '$ic' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Address				:	<input type = 'text' size = '80' name = 'address' value = '$address' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Vehicle Reg. Card No.	:	<input type = 'text' size = '80' name = 'regcard' value = '$RegCard' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Plate Number			:	<input type = 'text' size = '80' name = 'plate' value = '$Plate' style = 'border:none'></input></td></tr>";
	echo "<tr><td> No. Enjin				:	<input type = 'text' size = '80' name = 'enjin' value = '$NoEnjin' style = 'border:none'></input></td></tr>";
	echo "<tr><td> No. Chasis			:	<input type = 'text' size = '80' name = 'chasis' value = '$NoChasis' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Model				:	<input type = 'text' size = '80' name = 'model' value = '$Model' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Engine Capacity		:	<input type = 'text' size = '2' name = 'enjincapacity' value = '$EngineCapacity' style = 'border:none'></input> cc</td></tr>";
	echo "<tr><td> Colour				:	<input type = 'text' size = '80' name = 'color' value = '$Colour' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Mfg. Year				:	<input type = 'text' size = '80' name = 'year' value = '$Year' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Body				:	<input type = 'text' size = '80' name = 'body' value = '$Body' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Seating Capacity		:	<input type = 'text' size = '80' name = 'seat' value = '$Seats' style = 'border:none'></input></td></tr>";
	echo "<tr><td> Policy Period of Cover	:	<input type = 'text' size = '8' name = 'datecover' value = '$DateCovered' style = 'border:none'></input>- <input type = 'text' size = '8' name = 'dateEnd' value = '$EndCovered' style = 'border:none'></td></tr>";
	echo "<tr><td> Hire Purchase Company	:	<input type = 'text' size = '80' name = 'hirePurchaseC' value = '$HirePurchaseCompany' style = 'border:none'></input></td></tr>";
	
	}
}
?>
</table>
</pre>
<p style = "font-family:verdana;font-size:16px;color:red"><?php echo $INFO; ?></p>
<input type = "submit"  align = "center" name = "update" class="btn btn-lg btn-primary" value = "Update"></input>
</form>
</div>
</div>
</body>
</html>