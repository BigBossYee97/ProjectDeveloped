<?php
$title = "Business Analysis";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$Top = "SELECT * FROM sales ORDER BY Quantity DESC LIMIT 13";
$result = mysqli_query($conn,$Top);



include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
	<head>
		
		<style>
			.chart-container {
				width: 800px;
				height: auto;	
				background-color:rgba(255, 255, 255,1);
			}
		</style>
		
	</head>
	<body style = "background-color:#bfbfbf">
		

		<div>
		<div class="chart-container" style = "position:absolute;margin-left:450px;margin-top:100px">
			<canvas id="mycanvas"></canvas>
		</div>
		<table  border = "2px solid black" style = "background-color:#4FEBF6;font-family:verdana;font-size:16px;width:200px;margin-left:1300px;margin-top:100px">
		<?php
		echo "<tr align = 'center'><th>Brands</th><th>Quantity</th></tr>";
		if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$Quantity = $row["Quantity"];
		echo $Quantity;
		if($Quantity == $Quantity){
		if($ID == 5)
		echo "<tr align = 'center'><td>Mitsubishi</td><td>$Quantity</td></tr>";
		if($ID == 4)
		echo "<tr align = 'center'><td>Ford</td><td>$Quantity</td></tr>";
		if($ID == 3)
		echo "<tr align = 'center'><td>Hyundai</td><td>$Quantity</td></tr>";
		if($ID == 1)
		echo "<tr align = 'center'><td>Toyota</td><td>$Quantity</td></tr>";
		if($ID == 2)
		echo "<tr align = 'center'><td>Honda</td><td>$Quantity</td></tr>";
	    if($ID == 13)
		echo "<tr align = 'center'><td>Perodua</td><td>$Quantity</td></tr>";
		if($ID == 12)
		echo "<tr align = 'center'><td>Proton</td><td>$Quantity</td></tr>";
		if($ID == 6)
		echo "<tr align = 'center'><td>Kia</td><td>$Quantity</td></tr>";
		if($ID == 7)
		echo "<tr align = 'center'><td>Nissan</td><td>$Quantity</td></tr>";
		if($ID == 8)
		echo "<tr align = 'center'><td>BMW</td><td>$Quantity</td></tr>";
		if($ID == 9)
		echo "<tr align = 'center'><td>Mercedes</td><td>$Quantity</td></tr>";
		if($ID == 10)
		echo "<tr align = 'center'><td>Citroen</td><td>$Quantity</td></tr>";
		if($ID == 11)
		echo "<tr align = 'center'><td>Volvo</td><td>$Quantity</td></tr>";

		}
		}}
		
		?>
		</table>
		</div>
		
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="Chart.min.js"></script>
		<script type="text/javascript" src="Business.js"></script>
		
	</body>
	
</html>
