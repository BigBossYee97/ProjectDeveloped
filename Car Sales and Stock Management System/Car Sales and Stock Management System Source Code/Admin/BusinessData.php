<?php
//ID 1 = "Toyota" ID 2 = "Honda" ID 3 = "Hyundai" ID 4 = "Ford"
//ID 5 = "Mitsubishi" ID 6 = "Kia" ID 7 = "Nissan" ID 8 = "BMW"
//ID 9 = "Mercedes" ID 10 = "Citroen" ID 11 = "Volvo" ID 12 = "Proton"
//ID 13 = "Perodua"
header("Content-Type: application/json");
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM tradelist";
$result = mysqli_query($conn,$sql);
$Toyota = 0;
$Honda = 0;
$Hyundai = 0; 
$Ford = 0;
$Mitsubishi = 0;
$Kia = 0;
$Nissan = 0;
$BMW = 0;
$Mercedes = 0;
$Citroen = 0;
$Volvo = 0;
$Proton = 0;
$Perodua = 0;
if(mysqli_num_rows($result) > 0){

	while($row = mysqli_fetch_assoc($result)){
	$make = $row["Make"];
	
	if($make == "Toyota"){
	$Toyota = $Toyota + 1;
	$updateToyota = "UPDATE sales SET Quantity = '$Toyota' WHERE ID = 1";
	$updateSuccess = mysqli_query($conn,$updateToyota);
	}
	
	if($make == "Honda"){
	$Honda = $Honda + 1;
	$updateHonda = "UPDATE sales SET Quantity = '$Honda' WHERE ID = 2";
	$updateSuccess = mysqli_query($conn,$updateHonda);
	}
	
	if($make == "Hyundai"){
	$Hyundai = $Hyundai + 1;
	$updateHyundai = "UPDATE sales SET Quantity = '$Hyundai' WHERE ID = 3";
	$updateSuccess = mysqli_query($conn,$updateHyundai);
	}
	
	if($make == "Ford"){
	$Ford = $Ford + 1;
	$updateFord = "UPDATE sales SET Quantity = '$Ford' WHERE ID = 4";
	$updateSuccess = mysqli_query($conn,$updateFord);
	}
	
	if($make == "Mitsubishi"){
	$Mitsubishi = $Mitsubishi + 1;
	$updateMitsubishi = "UPDATE sales SET Quantity = '$Mitsubishi' WHERE ID = 5";
	$updateSuccess = mysqli_query($conn,$updateMitsubishi);
	}
	
	if($make == "Kia"){
	$Kia = $Kia + 1;
	$updateKia = "UPDATE sales SET Quantity = '$Kia' WHERE ID = 6";
	$updateSuccess = mysqli_query($conn,$updateKia);
	}
	
	if($make == "Nissan"){
	$Nissan = $Nissan + 1;
	$updateNissan = "UPDATE sales SET Quantity = '$Nissan' WHERE ID = 7";
	$updateSuccess = mysqli_query($conn,$updateNissan);
	}
	
	if($make == "BMW"){
	$BMW = $BMW + 1;
	$updateBMW = "UPDATE sales SET Quantity = '$BMW' WHERE ID = 8";
	$updateSuccess = mysqli_query($conn,$updateBMW);
	}
	
	if($make == "Mercedes"){
	$Mercedes = $Mercedes + 1;
	$updateMercedes = "UPDATE sales SET Quantity = '$Mercedes' WHERE ID = 9";
	$updateSuccess = mysqli_query($conn,$updateMercedes);
	}
	
	if($make == "Citroen"){
	$Citroen = $Citroen + 1;
	$updateCitroen = "UPDATE sales SET Quantity = '$Citroen' WHERE ID = 10";
	$updateSuccess = mysqli_query($conn,$updateCitroen);
	
	}
	
	if($make == "Volvo"){
	$Volvo = $Volvo + 1;
	$updateVolvo = "UPDATE sales SET Quantity = '$Volvo' WHERE ID = 11";
	$updateSuccess = mysqli_query($conn,$updateVolvo);
	
	}
	
	if($make == "Proton"){
	$Proton = $Proton + 1;
	$updateProton = "UPDATE sales SET Quantity = '$Proton' WHERE ID = 12";
	$updateSuccess = mysqli_query($conn,$updateProton);
	
	}
	
	if($make == "Perodua"){
	$Perodua = $Perodua + 1;
	$updatePerodua = "UPDATE sales SET Quantity = '$Perodua' WHERE ID = 5";
	$updateSuccess = mysqli_query($conn,$updatePerodua);
	}
	
	

	}}
 
$Sales = "SELECT * FROM sales";
$SalesResult = mysqli_query($conn,$Sales);

$data = array();
foreach($SalesResult as $row["Quantity"]){
	$data[] = $row["Quantity"];
}

print json_encode($data);
?>