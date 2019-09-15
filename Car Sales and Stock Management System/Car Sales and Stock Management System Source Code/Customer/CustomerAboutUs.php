<?php
$title = "About Us";
session_start();
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM companyprofile";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		$ID = $row["ID"];
		$Address = $row["Address"];
		$Email = $row["Email"];
		$HP = $row["HP"];
		$Whatsapp = $row["Whatsapp"];
		$Office = $row["Office"];
		$Instagram = $row["Instagram"];
		$Facebook = $row["Facebook"];
		$Twitter = $row["Twitter"];
		$Details = $row["Details"];
		
		}
}
include "CustomerNavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf" >
<div align = "center">
<div style = "border-radius:10px 10px;margin-top:20px;width:1000px;font-family:verdana;font-size:16px;color:white;background-color:#060463">
<pre style = "background-color:#2c3038;font-family:verdana;font-size:16px;color:white">
<h2>About Us</h2><hr>
<div style = "border-radius:10px 10px;margin-left:20px;float:left;background-color:grey;width:300px;height:500px">
Contact Us<hr>
<img class="img-responsive" style = "margin-right:250px;width:20px;height:20px;" src="pin.png"/>	<p style = "margin-top:-46px"><?php echo $Address; ?></p>

<img class="img-responsive" style = "margin-right:250px;width:20px;height:20px;" src="email.png"/>	<p style = "margin-top:-46px"><?php echo $Email; ?></p>

<img class="img-responsive" style = "margin-right:250px;width:20px;height:20px;" src="telephone.png"/>	<p style = "margin-top:-46px"><?php echo $HP ?></p>
<img class="img-responsive" style = "margin-right:250px;width:20px;height:20px;" src="whatsapp.png"/>	<p style = "margin-top:-46px"><?php echo $Whatsapp ?></p>
<img class="img-responsive" style = "margin-right:250px;width:20px;height:20px;" src="home.png"/>	  <p style = "margin-top:-46px"><?php echo $Office ?></p>
<a href = "<?php echo $Instagram; ?>"><img class="img-responsive" style = "float:left;margin-left:70px;width:40px;height:40px;" src="instagram.png"></a><a href = "<?php echo $Facebook; ?>"><img class="img-responsive" style = "margin-right:100px;width:40px;height:40px;" src="facebook.png"></a><a href = "<?php echo $Twitter; ?>"><img class="img-responsive" style = "float:right;margin-top:-40px;margin-right:60px;width:40px;height:40px;" src="twitter.png"></a>
</pre>
</div>
<div style = "font-family:verdana;font-size:16px;color:white;text-align:justify;margin-top:-520px;margin-left:340px;width:600px;height:500px;background-color:#2c3038">
<?php echo $Details; ?>
</div>
</div>
</div>
</form>
</body>
</html>