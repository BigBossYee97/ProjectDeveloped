<?php
$title = "Loan Calculator";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);
include "NavigationBar.php";
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
<body style = "background-color:#bfbfbf" width = "100%" height = "100%">
<div align = "center">
<div style = "margin-left:300px;margin-top:100px;width:1000px;background-color:#2e353d;height:630px">
<h1 style = "color:#0eaded">Loan Calculator</h1>
<hr style = "border-color:white">
<pre style = "color:white;font-family:verdana;font-size:16px">
<p></p>
<p>Vehicle Price			:	<input type = "text" id = "price" size = "50" placeholder = "Price" ></input></p>
<p>Upfront Payment		:	<input type = "text" size = "50" id = "deposit" placeholder = "Deposit Amount" ></input></p>
<p>Installment Period By Year	:	<input type = "text" size = "50" id = "Year" placeholder = "Installment Period" ></input></p>
<p>Interest Rate			:	<input disabled type = "text" value = "" id = "interest" size = "50" placeholder = "Interest Rate" ></input></p>
</pre>
<p style = "color:white;font-family:verdana;font-size:16px">Lowest <input type = "range" id = "rate" min = "1.0" max = "5.0" value = "3.0" step = "0.1" onchange = "UpdateRate(this.value)" style = "width:300px">	Highest</input></p>
<pre style = "color:white;font-family:verdana;font-size:16px">

<p id = "Amount">Amount			:	RM0,000</p>
<p id = "Installment">Monthly Installment	:	RM0,000</p>

</pre>
<p id = "validation" style = "font-family:Arial Black;color:red;font-size:16px"></p>
<button type = "button" id = "Calculate" style = "border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px">Calculate</button>
</div>
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