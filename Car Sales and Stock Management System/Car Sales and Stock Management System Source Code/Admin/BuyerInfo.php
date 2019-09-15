<?php
session_start();
$SelectedID = $_SESSION["id"];
$title = "SIJIL PEMILIKAN KENDERAN";


define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM vehiclecard WHERE ID = $SelectedID ";
$result = mysqli_query($conn,$sql);
include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf" width = "100%" height = "100%">
<div align = "center">
<div style = "margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:385px">
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
	echo "<tr><td> Name				:	$owner</td></tr>";
	echo "<tr><td> IC Number			:	$ic</td></tr>";
	echo "<tr><td> Address				:	$address</td></tr>";
	echo "<tr><td> Vehicle Reg. Card No.	:	$RegCard</td></tr>";
	echo "<tr><td> Plate Number			:	$Plate</td></tr>";
	echo "<tr><td> No. Enjin				:	$NoEnjin</td></tr>";
	echo "<tr><td> No. Chasis			:	$NoChasis</td></tr>";
	echo "<tr><td> Model				:	$Model</td></tr>";
	echo "<tr><td> Engine Capacity		:	$EngineCapacity cc</td></tr>";
	echo "<tr><td> Colour				:	$Colour</td></tr>";
	echo "<tr><td> Mfg. Year				:	$Year</td></tr>";
	echo "<tr><td> Body				:	$Body</td></tr>";
	echo "<tr><td> Seating Capacity		:	$Seats</td></tr>";
	echo "<tr><td> Policy Period of Cover	:	$DateCovered - $EndCovered</td></tr>";
	echo "<tr><td> Hire Purchase Company	:	$HirePurchaseCompany</td></tr>";
	}
}
?>
</table>
</pre>
</form>
<a style = "float:left"  target = "_blank" href="https://www.mycarinfo.com.my/NCDCheck/Online" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-check"></span> Check NCD Percentage</a>
<a style = "float:right" href="UpdateBuyerInfo.php" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-check"></span> Update Details</a>

<a href = "https://w9.financial-link.com.my/Agency/loginPIB.jsp" target = "_blank"><img src = "pacificLogo.PNG" style = "margin-top:100px;width:100px;height:50px"></img></a>
<a href = "https://online.kurnia.com/amg/authenticate/loginnew.do" target = "_blank"><img src = "KurniaLogo.PNG" style = "margin-top:100px;margin-left:10px;width:100px;height:50px"></img></a>
<a href = "https://w10.financial-link.com.my/Agency/loginUAG.jsp" target = "_blank"><img src = "LibertyLogo.JPG" style = "margin-top:100px;margin-left:10px;width:100px;height:50px"></img></a>

</div>
</div>
</body>
</html>