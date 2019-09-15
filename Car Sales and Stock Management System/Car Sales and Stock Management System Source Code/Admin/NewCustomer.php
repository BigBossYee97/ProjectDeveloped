<?php
$title = "Add New Customer";
$INFO = "";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

if(isset($_POST["save"])){
$name = $_POST["name"];
$IC = $_POST["IC"];
$HP = $_POST["HP"];
$address = $_POST["address"];
$card = $_POST["regCard"];
$plate = $_POST["plate"];
$noenjin = $_POST["noenjin"];
$chassis = $_POST["chassis"];
$model = $_POST["model"];
$engineCC = $_POST["enginecc"];
$color = $_POST["color"];
$year = $_POST["year"];
$body = $_POST["body"];
$seat = $_POST["seat"];
$coverage = $_POST["CoverageDate"];
$expire = $_POST["ExpiredDate"];
$bank = $_POST["bank"];

if($name == "" || $IC == "" || $HP == "" || $address == "" || $card == "" || $plate == "" || $noenjin == "" || $chassis == "" || $model == "" || $engineCC == "" || $color == "" || $year == "" || $body == "" || $seat == "" || $expire == "" || $bank == ""){
$INFO = "Please Do Not Leave Any Blank Empty";
}
else{
$sql = "INSERT INTO vehiclecard(Name,IC,HP,Address,RegCardNo,Plate,NoEnjin,NoChasis,Model,EngineCC,Colour,Year,BodyType,Seats,CoverageDate,ExpiredDate,HirePCompany)VALUES('$name','$IC','$HP','$address','$card','$plate','$noenjin','$chassis','$model','$engineCC','$color','$year','$body','$seat','$coverage','$expire','$bank')";	
if(mysqli_query($conn,$sql)){
$INFO = "Customer Information Added Successfully";
header("refresh:1;url = InsuranceRenewal.php");
}
}
}

include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf" width = "100%" height = "100%">
<div align = "center">
<div style = "margin-left:300px;margin-top:100px;width:1000px;background-color:white;height:473px">
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" >
<pre style = "font-family:verdana">
<table border = '2px solid black' style = "width:100%">

<tr align = "center"><th>SIJIL PEMILIKAN KENDERAAN</th></tr>

	<tr><td> Name				:<input placeholder = "Name" type = 'text' size = '80' name = 'name' style = 'border:none'></input></td></tr>
	<tr><td> IC Number			:<input placeholder = "IC Number" type = 'text' size = '80' name = 'IC' style = 'border:none'></input></td></tr>
	<tr><td> HP Number			:<input placeholder = "HP Number" type = 'text' size = '80' name = 'HP' style = 'border:none'></input></td></tr>
	<tr><td> Address				:<input placeholder = "Address" type = 'text' size = '80' name = 'address' style = 'border:none'></input></td></tr>
	<tr><td> Vehicle Reg. Card No.	:<input placeholder = "Vehicle Register Card Number" type = 'text' size = '80' name = 'regCard' style = 'border:none'></input></td></tr>
	<tr><td> Plate Number			:<input placeholder = "Plate Number" type = 'text' size = '80' name = 'plate' style = 'border:none'></input></td></tr>
	<tr><td> No. Engine			:<input placeholder = "Engine Number" type = 'text' size = '80' name = 'noenjin' style = 'border:none'></input></td></tr>
	<tr><td> No. Chassis			:<input placeholder = "Chassis Number" type = 'text' size = '80' name = 'chassis' style = 'border:none'></input></td></tr>
	<tr><td> Model				:<input placeholder = "Model" type = 'text' size = '80' name = 'model' style = 'border:none'></input></td></tr>
	<tr><td> Engine Capacity		:<input placeholder = "Engine Capacity" type = 'text' size = '80' name = 'enginecc' style = 'border:none'></input></td></tr>
	<tr><td> Color				:<input placeholder = "Color" type = 'text' size = '80' name = 'color' style = 'border:none'></input></td></tr>
	<tr><td> Mfg. Year				:<input placeholder = "Manufacturer Year" type = 'text' size = '80' name = 'year' style = 'border:none'></input></td></tr>
	<tr><td> Body				:<input placeholder = "Body Type" type = 'text' size = '80' name = 'body' style = 'border:none'></input></td></tr>
	<tr><td> Seating Capacity		:<input placeholder = "Seating Capacity" type = 'text' size = '80' name = 'seat' style = 'border:none'></input></td></tr>
	<tr><td> Coverage Date			:<input placeholder = "dd/mm/yy" type = 'text' size = '80' name = 'CoverageDate' style = 'border:none'></input></td></tr>
	<tr><td> Expired Date			:<input placeholder = "dd/mm/yy" type = 'text' size = '80' name = 'ExpiredDate' style = 'border:none'></input></td></tr>
	<tr><td> Hire Purchase Company	:<input placeholder = "Hire Purchase Company" type = 'text' size = '80' name = 'bank' style = 'border:none'></input></td></tr>
	


</table>
</pre>

<div align = "center">
<p name = "info" style = "font-family:Arial Black;color:red;font-size:16px"><?php echo $INFO; ?></p>
<input type = "submit" name = "save" value = "Save" style = "width:100px;height:50px" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-check"></span></input>
</div>
</form>
</div>
</div>
</body>
</html>