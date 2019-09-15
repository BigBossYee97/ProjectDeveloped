<?php
$title = "Loan Calculator";
session_start();
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);
include "CustomerNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<style>
.slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width:45%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}
</style>
<body>
<div align = "center">
<div style = "border-radius:10px 10px;margin-top:50px;width:800px;height:700px;background-color:white"> 
<pre style = "background-color:#2c3038;font-family:verdana;font-size:18px;color:white">
<h2>Car Loan Calculator</h2><hr>
Vehicle Price			: <input type = "text" id = "price" size = "30" placeholder = "Vehicle Price" style = "font-family:verdana;font-size:16px;border-radius:5px 5px;border:none" ></input></p>

Upfront Payment		: <input type = "text" id = "deposit" size = "30" placeholder = "Upfront Payment" style = "font-family:verdana;font-size:16px;border-radius:5px 5px;border:none"></input></p>

Installment Period By Year	: <input type = "text" id = "Year" size = "30" placeholder = "Installment Period By Year" style = "font-family:verdana;font-size:16px;border-radius:5px 5px;border:none"></input></p>

Interest Rate			: <input disabled type = "text" id = "interest" size = "30" value = "" placeholder = "Interest Rate" style = "font-family:verdana;font-size:16px;border-radius:5px 5px;border:none" ></input></p>

Lowest <input type = "range" id = "rate" min = "1.0" max = "5.0" value = "3.0" step = "0.1" onchange = "UpdateRate(this.value)" style = "width:300px">	Highest</input></p>

<p id = "Amount">Amount			:	RM0,000</p>
<p id = "Installment">Monthly Installment	:	RM0,000</p>

</pre>
</div>
<p id = "validation" style = "margin-top:30px;font-family:Arial Black;color:red;font-size:16px"></p>
<button id = "Calculate" style = 'margin-top:30px;margin-bottom:20px;width:150px;background-color:#45b9f7;border:none;border-radius:5px 5px;font-family:verdana;font-size:20px'>Calculate</button>

</div>
</body>
</html>
<script>
function UpdateRate(value){
document.getElementById("interest").value = value + "%";	
}

Calculate.onclick = function(event){
var priceTxt = document.getElementById("price").value;
var price = parseInt(priceTxt);
var depositTxt = document.getElementById("deposit").value;
var deposit = parseInt(depositTxt);
var yearTxt = document.getElementById("Year").value;
var year = parseInt(yearTxt);
var interestTxt = document.getElementById("rate").value/100;
var interest = parseFloat(interestTxt);
var totalAmount = ((price - deposit) * interest * year) + (price - deposit);
var InstallmentFloat = totalAmount / (year * 12);
var Installment = parseInt(InstallmentFloat);

if(!price || !deposit || !year || !interest ){
	document.getElementById("validation").innerHTML = "Please Fill In All Columns";
	document.getElementById("Amount").innerHTML = "Amount			:	RM0,000";
	document.getElementById("Installment").innerHTML = "Monthly Installment	:	RM0,000";
	}
else{
	if(year > 9){
	document.getElementById("validation").innerHTML = "The Maximum Period of Year For Installment is Only 9.<br>Please Reset The Installment Period";
	document.getElementById("Amount").innerHTML = "Amount			:	RM0,000";
	document.getElementById("Installment").innerHTML = "Monthly Installment	:	RM0,000";
	}
	else{
	document.getElementById("Amount").innerHTML = "Amount			:	RM" + totalAmount;
	document.getElementById("Installment").innerHTML = "Monthly Installment	:	RM " + Installment;
	document.getElementById("validation").innerHTML = "";
	}
}






}
</script>