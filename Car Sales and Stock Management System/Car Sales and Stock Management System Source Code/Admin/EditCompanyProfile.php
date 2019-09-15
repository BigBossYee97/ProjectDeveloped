<?php
$title = "Edit Company Profile";
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');
$INFO = "";
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

if(isset($_POST["save"])){
$address = $_POST["address"];
$email = $_POST["email"];
$hp = $_POST["hp"];
$whatsapp = $_POST["whatsapp"];
$office = $_POST["office"];
$insta = $_POST["insta"];
$facebook = $_POST["facebook"];
$twitter = $_POST["twitter"];
$intro = $_POST["intro"];
if($address == "" || $email == "" || $hp == "" || $whatsapp == "" || $office == "" || $insta == "" || $facebook == "" || $twitter == "" || $intro == ""){
	$INFO = "Please Do Not Leave Any Blanks Empty";
}
else{
	$update = "UPDATE companyprofile SET Address = '$address',Email = '$email',HP = '$hp',Whatsapp = '$whatsapp',Office = '$office',Instagram = '$insta',Facebook = '$facebook',Twitter = '$twitter',Details = '$intro'";
	if(mysqli_query($conn,$update)){
	$INFO = "Company Profile Updated Successfully";
	header("refresh:1;url = CompanyProfile.php");
	}
	else{
		$INFO = "Company Profile Updated Fail";
	}
}

}


include "NavigationBar.php";
?>
<!DOCTYPE html>
<html>
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data">
<div  align = "center" style = "margin-left:300px;margin-top:100px;width:1000px;background-color:#2e353d;height:750px">
<h1 style = "color:#0eaded">Company Profile</h1>
<hr style = "border-color:white">
<div style = "font-family:verdana;float:left;margin-left:20px;margin-top:20px;background-color:#d3ccc6;width:300px;height:600px">
<label style = "float:left;margin-left:10px">Address:</label>
<br>
<textarea name = "address" style = "float:left;margin-left:10px;width:280px;height:100px" placeholder = "Company Address.."><?php echo $Address; ?></textarea>
<br>
<label style = "float:left;margin-left:10px">Email:</label>
<br>
<input name = "email" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $Email; ?>" placeholder = "Email Address"></input>
<br>
<label style = "float:left;margin-left:10px">HP Number:</label>
<br>
<input name = "hp" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $HP; ?>" placeholder = "HP Number"></input>
<br>
<label style = "float:left;margin-left:10px">WhatsApp:</label>
<br>
<input name = "whatsapp" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $Whatsapp; ?>" placeholder = "WhatsApp"></input>
<br>
<label style = "float:left;margin-left:10px">Office:</label>
<br>
<input name = "office" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $Office; ?>" placeholder = "Office"></input>
<br>
<label style = "float:left;margin-left:10px">Instagram Link:</label>
<br>
<input name = "insta" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $Instagram; ?>" placeholder = "Instagram Link"></input>
<br>
<label style = "float:left;margin-left:10px">Facebook Link:</label>
<br>
<input name = "facebook" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $Facebook; ?>" placeholder = "Facebook Link"></input>
<br>
<label style = "float:left;margin-left:10px">Twitter Link:</label>
<br>
<input name = "twitter" style = "float:left;margin-left:10px;width:280px" value = "<?php echo $Twitter; ?>" placeholder = "Twitter Link"></input>
</div>
<div align = "center" style = "font-family:verdana;margin-left:320px;background-color:#d3ccc6;width:650px;height:600px;margin-top:35px">
<label style = "float:left;margin-left:10px">Introduction:</label>
<br>
<textarea name = "intro" style = "float:left;margin-left:10px;width:630px;height:550px" placeholder = "Company Details.."><?php echo $Details; ?></textarea>

</div>
<p name = "info" style = "margin-right:300px;font-family:Arial Black;color:red;font-size:16px"><?php echo $INFO; ?></p>

<input type = "submit" style = "margin-top:60px;border:0px;width:100px;height:30px;margin-bottom:10px;background-color:#0eaded;color:white;border-radius:5px 5px" name = "save" value = "Save"></input>

</div>

</div>
</form>
</body>
</html>
