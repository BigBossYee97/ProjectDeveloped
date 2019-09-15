<?php
$title = "Company Profile";

$INFO = "";
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
if(isset($_POST["edit"])){
	header("location:EditCompanyProfile.php");
}

include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf" width = "100%" height = "100%">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data">
<div align = "center" style = "margin-left:300px;margin-top:100px;width:1000px;background-color:#2e353d;height:600px">
<h1 style = "color:#0eaded">About Us</h1>
<hr style = "border-color:white"></hr>
<div align = "center" style = "float:left;margin-left:20px;margin-top:20px;background-color:#d3ccc6;width:300px;height:400px">
<h3>Contact Us</h3><hr style = "border-color:black"></hr>
<pre style = "font-family:verdana">
<div style = "text-align:justify;float:left;margin-left:20px">
<img class="img-responsive" style = "width:20px;height:20px;" src="pin.png"/>	<?php echo $Address; ?>	

<img class="img-responsive" style = "width:20px;height:20px;" src="email.png"/>	<?php echo $Email; ?>	

<img class="img-responsive" style = "width:20px;height:20px;" src="telephone.png"/>	<?php echo $HP ?><BR>
<img class="img-responsive" style = "width:20px;height:20px;" src="whatsapp.png"/>	<?php echo $Whatsapp ?><br>
<img class="img-responsive" style = "width:20px;height:20px;" src="home.png"/>	  <?php echo $Office ?>


</pre>
<a href = "<?php echo $Instagram; ?>"><img class="img-responsive" style = "width:40px;height:40px;" src="instagram.png"></a>
<a href = "<?php echo $Facebook; ?>"><img class="img-responsive" style = "margin-left:10px;width:40px;height:40px;" src="facebook.png"></a>
<a href = "<?php echo $Twitter; ?>"><img class="img-responsive" style = "margin-left:10px;width:40px;height:40px;" src="twitter.png"></a>
</div>
<div style = "text-align:justify;color:white;font-family:verdana;line-height:2.5;margin-left:320px;background-color:#2e353d;width:650px;height:500px">
<?php echo $Details ?>

</div>
<p style = "font-family:Arial Black;color:red;font-size:16px"><?php echo $INFO; ?></p>
<input type = "submit" style = "margin-top:40px;border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px" name = "edit" value = "Edit"></input>
</div>

</div>

</div>
</form>
</body>
</html>