<?php
$title = "Edit Stock List";

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
		$MAKE = $row["Make"];
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
		$boughtin = $row["BoughtIn"];
		$description = $row["Description"];
		}
}

$make = array("","Toyota","Honda","Hyundai","Ford","Mitsubishi","Kia","Nissan","BMW","Mercedes","Citroen","Volvo","Proton","Perodua");
$Toyota = array("Altis","Avanza","Camry","Estima","Hilux","Vellfire","Vios","Wish","Yaris");
$Honda = array("Accord","BRV","Civic","City","CR-V","Jazz","HR-V","Odyssey");
$Hyundai = array("Elantra","Elantra Sport","Veloster","IONIQ","Sonata","Tucson","Santafe","Starex");
$Ford = array("EcoSport","Everest","Fiesta","Focus","Kuga","S-Max","Mondeo","Mustang","Ranger","Ranger XL","Mustang");
$Mitsubishi = array("ASX","Lancer","Outlander","Triton 4x4","Triton 4x2","Pajero Sport");
$Kia = array("Rio Sedan","Rio Hatchback","Cerato","Cerato Koup","Optima","Sportage","Sorento","Carnival","Picanto");
$Nissan = array("Almera","Teana","Grand Livina","Serena","X-Gear","X-Trail","Navara");
$BMW = array("3 Series","4 Series","5 Series","6 Series","7 Series","X1","X3","X4","X5","X6","M2 Coupe","M4 Coupe","I8");
$Mercedes = array("A-Class","C-Class","E-Class","S-Class","CLA","CLS","GLC","GLE","GT");
$Citroen = array("C4 Picasso","DS5","C4","C5");
$Volvo = array("V40","V90","S60","S90","XC60","XC90","XC40");
$Proton = array("Ertiga","Waja","Wira","Inspira","Iriz","Persona","Perdana");
$Perodua = array("Axia","Alza","Bezza","Myvi","Kembara");
$Transmission = array("","Automatic","Manual");

		if(isset($_POST["update"])){
		$Sel_Make = $_POST["MAKE"];
		$Sel_Model = $_POST["model"];
		$Sel_Transmission = $_POST["transmission"];
		$Sel_Type = $_POST["type"];
		$Sel_Mileage = $_POST["mileage"];
		$Sel_Year = $_POST["year"];
		$Sel_Seat = $_POST["seat"];
		$Sel_Engine = $_POST["engine"];
		$Sel_Plate = $_POST["plate"];
		$Sel_Price = $_POST["price"];
		$Sel_Descrpt = $_POST["Description"];
		$Sel_Color = $_POST["color"];
		$Sel_Status = $_POST["status"];
		$Sel_BoughtIn = $_POST["BuyIn"];
		$Sel_Margin = $_POST["margin"];
		
		$name = $_FILES['image1']['name'];
		$temp = $_FILES['image1']['tmp_name'];
		$size = $_FILES['image1']['size'];
		$name1 = $_FILES['image2']['name'];
		$temp1 = $_FILES['image2']['tmp_name'];
		$size1 = $_FILES['image2']['size'];
		$name2 = $_FILES['image3']['name'];
		$temp2 = $_FILES['image3']['tmp_name'];
		$size2 = $_FILES['image3']['size'];
		$name3 = $_FILES['image4']['name'];
		$temp3 = $_FILES['image4']['tmp_name'];
		$size3 = $_FILES['image4']['size'];
		$name4 = $_FILES['image5']['name'];
		$temp4 = $_FILES['image5']['tmp_name'];
		$size4 = $_FILES['image5']['size'];
		
		$extension1 = pathinfo($name,PATHINFO_EXTENSION);
		$extension2 = pathinfo($name1,PATHINFO_EXTENSION);
		$extension3 = pathinfo($name2,PATHINFO_EXTENSION);
		$extension4 = pathinfo($name3,PATHINFO_EXTENSION);
		$extension5 = pathinfo($name4,PATHINFO_EXTENSION);
		if($Sel_Status == "Sold"){
		$_SESSION["TradeList"] = $id;
		header("location:FillTradeList.php");
		
		}
		if($name == "" && $name1 == "" && $name2 == "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$image3',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = StockList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 !== "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$name2',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 !== "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$name2',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 == "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$image3',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 == "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$image3',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 == "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$image3',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 == "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$image3',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 !== "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 == "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$image3',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 !== "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$name2',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 !== "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$name2',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 == "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$image3',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == !"" && $name1 !== "" && $name2 == "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$image3',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == !"" && $name1 !== "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == !"" && $name1 !== "" && $name2 !== "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 !== "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 !== "" && $name3 == "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$name2',Image4 = '$image4',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 !== "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$name2',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 !== "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$name2',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 == "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$image3',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 == "" && $name2 == "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$image2',Image3 = '$image3',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 == "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$image3',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 == "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$image3',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 == "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$image3',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 == "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$image3',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 == "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$image3',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 !== "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 == "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$image3',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 !== "" && $name3 !== "" && $name4 == ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$name2',Image4 = '$name3',Image5 = '$image5',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 == "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$image3',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 == "" && $name3 !== "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$image3',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 == "" && $name2 !== "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$image2',Image3 = '$name2',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name !== "" && $name1 !== "" && $name2 == "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$image3',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		elseif($name == "" && $name1 !== "" && $name2 !== "" && $name3 == "" && $name4 !== ""){
		if($Sel_Status == "Available" || $Sel_Status == "Booked"){
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$image1',Image2 = '$name1',Image3 = '$name2',Image4 = '$image4',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		header("refresh:2;url = FoodList.php");
		}
		}
		}
		}
		else{
		if($extension1 !== 'jpg' && $extension1 !== 'png' || $extension2 !== 'jpg' && $extension2 !== 'png' || $extension3 !== 'jpg' && $extension3 !== 'png' || $extension4 !== 'jpg' && $extension4 !== 'png' || $extension5 !== 'jpg' && $extension5 !== 'png'){
		$INFO = "Format Must Be JPG OR PNG";
		}
		else{
		if($size > 1000000){
		$INFO = "File Size Must Not Exceed 1MB";
		}
		else{
		try{
		move_uploaded_file($temp,$name);
		move_uploaded_file($temp1,$name1);
		move_uploaded_file($temp2,$name2);
		move_uploaded_file($temp3,$name3);
		move_uploaded_file($temp4,$name4);
		
		if($Sel_Model == "" || $Sel_Transmission == "" || $Sel_Type == "" || $Sel_Mileage == "" || $Sel_Year == "" || $Sel_Engine == "" || $Sel_Seat == "" || $Sel_Price == "" || $Sel_Plate == ""){
		$INFO = "Please Do Not Leave Any Blanks Empty";
		}
		else{
		$update = "UPDATE advertisement SET Image1 = '$name',Image2 = '$name1',Image3 = '$name2',Image4 = '$name3',Image5 = '$name4',Make = '$_POST[MAKE]',Model = '$Sel_Model',Transmission = '$Sel_Transmission',Type = '$Sel_Type',Mileage = '$Sel_Mileage',Year = '$Sel_Year',NoSeat = '$Sel_Seat',EngineCC = '$Sel_Engine',PlateNumber = '$Sel_Plate',Color = '$Sel_Color',Price = '$Sel_Price',Margin = '$Sel_Margin',BoughtIn = '$Sel_BoughtIn',Status = '$Sel_Status',Description = '$Sel_Descrpt' WHERE ID = $id";
		if(mysqli_query($conn,$update)){
		$INFO = "Updated Successfully";
		}
			}
		}
		catch(Exception $e){
			$INFO = "File updated failed";
		}
		
		
	}
		}
		}
		}
include "NavigationBar.php";
?>
<!DOCTYPE html>
<style>
.hide{display:none;}
.btn {

font-size: 14px;
vertical-align: middle;
cursor: pointer;
border: 1px solid #bbbbbb;
border-color: #e6e6e6 #e6e6e6 #bfbfbf;
border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
border-bottom-color: #a2a2a2;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
position:absolute;
}


</style>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center" >
<input type="hidden" name="selected_make" value="<?php echo !empty($_POST['MAKE']) ? strip_tags($_POST['MAKE']) : ''; ?>" />
  
<form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data">
<div style = "margin-left:300px;margin-top:100px;width:1040px;height:500px">

<div align = "center" style = "float:left;background-color:#23282e;width:200px;height:200px">
<input type="file" name="image1" id="imageUpload1" class="hide"></input>
<label for="imageUpload1" class="btn btn-large" style = "margin-left:15px;color:white;background-color:none;border:none;font-size:14px;font-family:Arial Black">Image 1</label>
<img src="<?php echo $image1; ?>" id="imagePreview1" alt="Preview Image" style = "width:200px;height:200px"></img></div>
<div style = "margin-left:10px;float:left;background-color:#23282e;width:200px;height:200px">
<input type="file" name="image2" id="imageUpload2" class="hide"></input>
<label for="imageUpload2" class="btn btn-large" style = "margin-left:15px;color:white;background-color:none;border:none;font-size:14px;font-family:Arial Black">Image 2</label>
<img src="<?php echo $image2; ?>" id="imagePreview2" alt="Preview Image" style = "width:200px;height:200px"></img></div>
<div style = "margin-left:10px;float:left;background-color:#23282e;width:200px;height:200px">
<input type="file"  name="image3" id="imageUpload3" class="hide"></input>
<label for="imageUpload3" class="btn btn-large" style = "margin-left:15px;color:white;background-color:none;border:none;font-size:14px;font-family:Arial Black">Image 3</label>
<img src="<?php echo $image3; ?>" id="imagePreview3" alt="Preview Image" style = "width:200px;height:200px"></img></div>
<div style = "margin-left:10px;float:left;background-color:#23282e;width:200px;height:200px">
<input type="file"  name="image4" id="imageUpload4" class="hide"></input>
<label for="imageUpload4" class="btn btn-large" style = "margin-left:15px;color:white;background-color:none;border:none;font-size:14px;font-family:Arial Black">Image 4</label>
<img src="<?php echo $image4; ?>" id="imagePreview4" alt="Preview Image" style = "width:200px;height:200px"></img></div>
<div style = "margin-left:10px;float:left;background-color:#23282e;width:200px;height:200px">
<input type="file"  name="image5" id="imageUpload5" class="hide"></input>
<label for="imageUpload5" class="btn btn-large" style = "margin-left:15px;color:white;background-color:none;border:none;font-size:14px;font-family:Arial Black">Image 5</label>
<img src="<?php echo $image5; ?>" id="imagePreview5" alt="Preview Image" style = "width:200px;height:200px"></img></div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<label>Specification</label>
<hr>
<label>Make:</label>
<select name = "MAKE" id = "Make" onchange="this.form.submit()" style = "border-radius:5px 5px;width:170px;margin-right:121px;margin-left:43px">
<?php
for($i = 0; $i < sizeof($make); $i++){
	if($MAKE == $make[$i]){
	echo "<option selected = 'selected' value = '$make[$i]' >$make[$i]</option>";
	}
	else{
	echo "<option value = '$make[$i]' >$make[$i]</option>";
	}
}
?>
</select >
<script>
document.getElementById('Make').value ="<?php if(! $_POST['MAKE']):?>"Sort"<?php  else:  echo $_POST['MAKE']; endif;?>";

</script>
<label>Model:</label><select name = "model" style = "border-radius:5px 5px;width:170px;margin-right:85px;margin-left:38px">
<?php
   if(isset($_POST["MAKE"])){
       $Sel_Make = $_POST["MAKE"];
       if($Sel_Make == "Toyota"){
		   for($n = 0; $n < sizeof($Toyota);$n++){
		   echo "<option value = '$Toyota[$n]' >$Toyota[$n]</option>";}
	   }
	   if($Sel_Make == "Honda"){
		   for($n = 0; $n < sizeof($Honda);$n++){
		   echo "<option value = '$Honda[$n]' >$Honda[$n]</option>";}
	   }
	   if($Sel_Make == "Hyundai"){
		   for($n = 0; $n < sizeof($Hyundai);$n++){
		   echo "<option value = '$Hyundai[$n]'>$Hyundai[$n]</option>";}
	   }
	   if($Sel_Make == "Ford"){
		   for($n = 0; $n < sizeof($Ford);$n++){
		   echo "<option value = '$Ford[$n]'>$Ford[$n]</option>";}
	   }
	   if($Sel_Make == "Mitsubishi"){
		   for($n = 0; $n < sizeof($Mitsubishi);$n++){
		   echo "<option value = '$Mitsubishi[$n]'>$Mitsubishi[$n]</option>";}
	   }
	   if($Sel_Make == "Hyundai"){
		   for($n = 0; $n < sizeof($Hyundai);$n++){
		   echo "<option value = '$Hyundai[$n]'>$Hyundai[$n]</option>";}
	   }
	   if($Sel_Make == "Kia"){
		   for($n = 0; $n < sizeof($Kia);$n++){
		   echo "<option value = '$Kia[$n]'>$Kia[$n]</option>";}
	   }
	   if($Sel_Make == "BMW"){
		   for($n = 0; $n < sizeof($BMW);$n++){
		   echo "<option value = '$BMW[$n]'>$BMW[$n]</option>";}
	   }
	   if($Sel_Make == "Mercedes"){
		   for($n = 0; $n < sizeof($Mercedes);$n++){
		   echo "<option value = '$Mercedes[$n]'>$Mercedes[$n]</option>";}
	   }
	   if($Sel_Make == "Nissan"){
		   for($n = 0; $n < sizeof($Nissan);$n++){
		   echo "<option value = '$Nissan[$n]'>$Nissan[$n]</option>";}
	   }
	    if($Sel_Make == "Citroen"){
		   for($n = 0; $n < sizeof($Citroen);$n++){
		   echo "<option value = '$Citroen[$n]'>$Citroen[$n]</option>";}
	   }
	    if($Sel_Make == "Volvo"){
		   for($n = 0; $n < sizeof($Volvo);$n++){
		   echo "<option value = '$Volvo[$n]'>$Volvo[$n]</option>";}
	   }
	    if($Sel_Make == "Proton"){
		   for($n = 0; $n < sizeof($Proton);$n++){
		   echo "<option value = '$Proton[$n]'>$Proton[$n]</option>";}
	   }
	    if($Sel_Make == "Perodua"){
		   for($n = 0; $n < sizeof($Perodua);$n++){
		   echo "<option value = '$Perodua[$n]'>$Perodua[$n]</option>";}
	   }
	   
   }
   else{
	  echo "<option selected = 'selected' value = '$model'>$model</option>"; 
   }
   ?>
</select>
Transmission:<select name = "transmission" style = "margin-left:11px;border-radius:5px 5px;width:170px">
<?php
for($i = 0; $i < sizeof($Transmission); $i++){
	if($transmission == $Transmission[$i]){
		echo "<option selected = 'selected' value = '$transmission'>$transmission</option>";
	}else{
	echo "<option value = '$Transmission[$i]'>$Transmission[$i]</option>";
	}
	}
?>
</select>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px"><label>Type:</label>
<select name = "type" style = "border-radius:5px 5px;width:170px;margin-left:47px;margin-right:121px;">
<?php
$Type = array("","Hatchback","Sedan","MPV","SUV","Crossover","Coupe","Convertible");
for($n = 0;$n < sizeof($Type);$n++){
	if($type == $Type[$n]){
	echo "<option selected = 'selected' value = '$type'>$type</option>";
	}
	else{
	echo "<option value = '$Type[$n]'>$Type[$n]</option>";
	}
}
?>
</select>
<label>Mileage:</label><select name = "mileage" style = "border-radius:5px 5px;width:170px;margin-right:85px;margin-left:25px">
<?php
$Mileage = array("","0 - 9999","10000 - 19999","20000 - 29999","30000 - 39999","40000 - 49999","50000 - 59999","60000 - 69999","70000 - 79999","80000 - 89999","90000 - 99999","100000 - 109999","110000 - 119999","120000 - 129999","130000 - 139999","140000 - 149999","150000 - 159999","160000 - 169999","170000 - 179999","180000 - 189999","190000 - 199999","Others");
for($i = 0; $i < sizeof($Mileage); $i++){
	if($mileage == $Mileage[$i]){
		echo "<option selected = 'selected' value = '$mileage'>$mileage</option>";
	}
	else{
	echo "<option value = '$Mileage[$i]'>$Mileage[$i]</option>";
	}
}

?>
</select>
Mfg.Year:<select name = "year" style = "border-radius:5px 5px;width:170px;margin-left:45px">
<?php
$Year = array("","1990","1991","1992","1993","1994","1995","1996","1997","1998","1999","2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018");
for($i = 0; $i < sizeof($Year);$i++){
	if($year == $Year[$i]){
		echo "<option selected = 'selected' value = '$year'>$year</option>";
	}
	else{
	echo "<option value = '$Year[$i]'>$Year[$i]</option>";
	}
}
?>
</select>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px"><label>No.of Seat: </label>
<input style = "width:170px;border:0px;border-radius:5px 5px;font-size:14px;margin-right:120px" name = "seat" placeholder = "Seat Capacity" value = "<?php echo $seat; ?>"></input>
Engine CC: <input style = "margin-right:83px;border:0px;border-radius:5px 5px;width:170px;font-size:14px;" name = "engine" placeholder = "Engine Capacity" value = "<?php echo $engine; ?>"></input>
Plate Number: <input style = "border:0px;border-radius:5px 5px;width:170px;font-size:14px;" name = "plate" placeholder = "Plate Number" value = "<?php echo $plate; ?>"></input>
</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
Color:<select name = "color" style = "border-radius:5px 5px;width:170px;margin-left:47px">
<?php
$Color = array("","White","Black","Blue","Red","Green","Grey","Silver","Purple","Brown","Yellow","Orange");
for($i = 0; $i < sizeof($Color); $i++){
	if($color == $Color[$i]){
	echo "<option selected = 'selected' value = '$color'>$color</option>";	
	}else{
	echo "<option value = '$Color[$i]'>$Color[$i]</option>";
	}
}
?>
</select>
<label style = "margin-left:121px">Price:</label>
<input value = "<?php echo $price; ?>" name = "price" placeholder = "Price" style = "margin-left:43px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>
<label style = "margin-left:84px">Margin:</label>
<input value = "<?php echo $margin; ?>" name = "margin" placeholder = "Margin" style = "margin-left:55px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>

</div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<label style = "margin-left:180px">Bought In:</label>
<input name = "BuyIn" value = "<?php echo $boughtin; ?>" placeholder = "Bought In Price" style = "margin-left:0px;font-size:14px;width:170px;border:0px;border-radius:5px 5px"></input>
<label style = "margin-left:100px">Status: </label><select name = "status" style = "border-radius:5px 5px;width:170px;margin-left:30px">
<?php
$Status = array("Available","Booked","Sold");
for($n = 0; $n < sizeof($Status);$n++){
if($status == $Status[$n]){
	echo "<option selected = 'selected' value = '$status'>$status</option>";
}else{
echo "<option value = '$Status[$n]'>$Status[$n]</option>";
}
}
?>
</select>
</div>
<br>
<div>
<div style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">

</div>
<div align = "center" style = "font-family:verdana;font-size:16px;float:left;margin-top:20px">
<hr>

<label>Description</label>
<hr>
<textarea name = "Description" style = "width:1040px;height:200px"><?php echo $description; ?></textarea>

<p style = "font-family:Arial Black;color:red;font-size:16px"><?php echo $INFO; ?></p>
<input type = "submit" style = "border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px" name = "update" value = "Save"></input>
</div>
</form>
</div>
</div>
</div>

</body>
</html>
<script>


$('#imageUpload1').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
			 if (input.files && input.files[0]) {		 
			            var reader = new FileReader();			
			            reader.onload = function (e) {		            	
			                $('#imagePreview1').attr('src', e.target.result);		
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
		});

$('#imageUpload2').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
			 if (input.files && input.files[0]) {		 
			            var reader = new FileReader();			
			            reader.onload = function (e) {		            	
			                $('#imagePreview2').attr('src', e.target.result);		
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
		});
		
$('#imageUpload3').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
			 if (input.files && input.files[0]) {		 
			            var reader = new FileReader();			
			            reader.onload = function (e) {		            	
			                $('#imagePreview3').attr('src', e.target.result);		
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
		});
		
$('#imageUpload4').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
			 if (input.files && input.files[0]) {		 
			            var reader = new FileReader();			
			            reader.onload = function (e) {		            	
			                $('#imagePreview4').attr('src', e.target.result);		
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
		});
		
$('#imageUpload5').change(function(){			
			readImgUrlAndPreview(this);
			function readImgUrlAndPreview(input){
			 if (input.files && input.files[0]) {		 
			            var reader = new FileReader();			
			            reader.onload = function (e) {		            	
			                $('#imagePreview5').attr('src', e.target.result);		
							}
			          };
			          reader.readAsDataURL(input.files[0]);
			     }	
		});
		

   

</script>