<?php
session_start();
$title = "User Profile";
$INFO = "";
$id = $_SESSION["EmployeeUserID"];
define("MYSQL_HOST",'localhost');
define("MYSQL_USERNAME",'root');
define("MYSQL_PASSWORD",'');
define("MYSQL_DB",'fyp');

$conn = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if(!$conn)
	die("Connection Failed".mysqli_connect_error);

$sql = "SELECT * FROM employee WHERE ID = $id";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	$ID = $row["ID"];
	$Photo = $row["Photo"];
	$Name = $row["Name"];
	$HP = $row["HP"];
	$Email = $row["Email"];
	$Age = $row["Age"];
	$Position = $row["Position"];
	$WorkingHour = $row["WorkingHour"];
	$WorkingDay = $row["WorkingDays"];
	
	}}
	
	if(isset($_POST["save"])){
		$name = $_POST["name"];
		$hp = $_POST["hp"];
		$email = $_POST["email"];
		$age = $_POST["age"];
		
		$image= $_FILES['image1']['name'];
		$temp = $_FILES['image1']['tmp_name'];
		$size = $_FILES['image1']['size'];
		
		$extension1 = pathinfo($image,PATHINFO_EXTENSION);
		
		
		
		if($size > 1000000){
		$INFO = "File Size Must Not Exceed 1MB";
		}
		else{
		try{
		move_uploaded_file($temp,$image);
		
		if($name == "" || $hp == "" || $email == "" || $age == ""){
			$INFO = "Please Do Not Leave Any Blank Empty";
		}
		else{
		if($image !== ""){
		$update = "UPDATE employee SET Photo = '$image',Name = '$name',HP = '$hp',Email = '$email',Age = '$age' WHERE ID = $id";	
		if(mysqli_query($conn,$update)){
		$INFO = "Information Updated Successfully";
		header("location:EmployeeUser.php");
		}
		}
		else{
		$update = "UPDATE employee SET Name = '$name',HP = '$hp',Email = '$email',Age = '$age' WHERE ID = $id";	
		if(mysqli_query($conn,$update)){
		$INFO = "Information Updated Successfully";
		header("location:EmployeeUser.php");
		}
		}
		}
		}
		catch(Exception $e){
			$INFO = "Advertisement upload failed";
		}}}
		
	

include "EmployeeNavigationBar.php";
?>
<!DOCTYPE html>
<html>
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
<body style = "background-color:#bfbfbf">
<div align = "center"><form method = "POST" action = "<?php $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data">
<div style = "margin-top:100px;position:absolute;;background-color:#2e353d;width:200px;height:200px;margin-left:350px">
<input type="file" name="image1" id="imageUpload1" class="hide"></input>
<label for="imageUpload1" class="btn btn-large" style = "margin-left:15px;color:white;background-color:none;border:none;font-size:14px;font-family:Arial Black">Image 1</label>
<img src="" id="imagePreview1" alt="Preview Image" style = "width:200px;height:200px"></img></div>
</div>
<div style = "font-size:18px;color:white;margin-top:100px;background-color:#2e353d;width:900px;height:500px;margin-left:580px">
<pre style = "color:white;font-family:verdana">
<table style = "float:left;margin-left:30px;margin-top:20px">
<tr style = 'line-height:50px'><td>Name		:</td><td>	<input type = "text" name = "name" placeholder = "Name" style = "height:25px;width:300px;border-radius:5px 5px;font-family:verdana;font-size:14px" value = "<?php echo $Name; ?>"></input></td></tr>	
<tr style = 'line-height:50px'><td>HP Number	:</td><td>	<input type = "text" name = "hp" placeholder = "HP Number" style = "height:25px;width:300px;border-radius:5px 5px;font-family:verdana;font-size:14px" value = "<?php echo $HP; ?>"></input></td></tr>
<tr style = 'line-height:50px'><td>Email		:</td><td>	<input type = "text" name = "email" placeholder = "Email" style = "height:25px;width:300px;border-radius:5px 5px;font-family:verdana;font-size:14px" value = "<?php echo $Email; ?>"></input></td></tr>
<tr style = 'line-height:50px'><td>Age			:</td><td>	<input type = "text" name = "age" placeholder = "Age" style = "height:25px;width:300px;border-radius:5px 5px;font-family:verdana;font-size:14px" value = "<?php echo $Age; ?>"></input></td></tr>
</pre>
</table>

</div>
<p><input type = "submit" style = "width:100px;height:40px;margin-top:20px;margin-left:1000px;font-family:verdana;font-size:16px"  align = "center" name = "save" class="btn btn-lg btn-primary" value = "Save"></input></p>



</form>
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

</script>