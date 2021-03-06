<?php
include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from form 
	
	$myusername = mysqli_real_escape_string($db,$_POST['username']);
	$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	
	$sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$active = $row['active'];
	
	$count = mysqli_num_rows($result);
	
	// If result matched $myusername and $mypassword, table row must be 1 row
	  
	if($count == 1) {
	   session_register("myusername");
	   $_SESSION['login_user'] = $myusername;
	   
	   header("location: welcome.php");
	}else {
	   $error = "Your Login Name or Password is invalid";
	}
 }
    $conn = mysqli_connect('localhost','root','','industry') or die ("Could not connect to Database!");
	$user=$_POST['User'];
	$password=$_POST['Pass'];

	if(empty($user)||empty($password)){
		header("location:admin.php?EmptyFields");
		exit();
	}
	else{
		$db= mysqli_select_db($conn, "industry");
		$query=mysqli_query($conn, "Select * from user where username='$user' && password='$password'");
		$row=mysqli_num_rows($query);
		if($row==1)
		{
		   $_SESSION['username'] = $user;
		   header("Location:change.php");
		}
		else
		{
		  $error="username or password Invalid!";
		  header("admin.php?Invalid");
		}
	} 
?>


<!DOCTYPE html> 
<html> 
<style> 
	
	/*assign full width inputs*/ 
	input[type=text], 
	input[type=password] { 
		width: 100%; 
		padding: 12px 20px; 
		margin: 8px 0; 
		display: inline-block; 
		border: 1px solid #ccc; 
		box-sizing: border-box; 
	} 
	
	/*set a style for the buttons*/ 
	button { 
		background-color: #4CAF50; 
		color: white; 
		padding: 14px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
		width: 100%; 
	} 
	
	/* set a hover effect for the button*/ 
	button:hover { 
		opacity: 0.8; 
	} 
	
	/*set extra style for the cancel button*/ 
	.cancelbtn { 
		width: auto; 
		padding: 10px 18px; 
		background-color: #f44336; 
	} 
	
	/*centre the display image inside the container*/ 
	.imgcontainer { 
		text-align: center; 
		margin: 24px 0 12px 0; 
		position: relative; 
	} 
	
	/*set image properties*/ 
	img.avatar { 
		width: 40%; 
		border-radius: 50%; 
	} 
	
	/*set padding to the container*/ 
	.container { 
		padding: 16px; 
	} 
	
	/*set the forgot password text*/ 
	span.psw { 
		float: right; 
		padding-top: 16px; 
	} 
	
	/*set the Modal background*/ 
	.modal { 
		display: none; 
		position: fixed; 
		z-index: 1; 
		left: 0; 
		top: 0; 
		width: 100%; 
		height: 100%; 
		overflow: auto; 
		background-color: rgb(0, 0, 0); 
		background-color: rgba(0, 0, 0, 0.4); 
		padding-top: 60px; 
	} 
	
	/*style the model content box*/ 
	.modal-content { 
		background-color: #fefefe; 
		margin: 5% auto 15% auto; 
		border: 1px solid #888; 
		width: 80%; 
	} 
	
	/*style the close button*/ 
	.close { 
		position: absolute; 
		right: 25px; 
		top: 0; 
		color: #000; 
		font-size: 35px; 
		font-weight: bold; 
	} 
	
	.close:hover, 
	.close:focus { 
		color: red; 
		cursor: pointer; 
	} 
	
	/* add zoom animation*/ 
	.animate { 
		-webkit-animation: animatezoom 0.6s; 
		animation: animatezoom 0.6s 
	} 
	
	@-webkit-keyframes animatezoom { 
		from { 
			-webkit-transform: scale(0) 
		} 
		to { 
			-webkit-transform: scale(1) 
		} 
	} 
	
	@keyframes animatezoom { 
		from { 
			transform: scale(0) 
		} 
		to { 
			transform: scale(1) 
		} 
	} 
	
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
		.cancelbtn { 
			width: 100%; 
		} 
	} 
</style> 

<body> 

	<h2>Click Admin for admin Login</h2> 
	<!--Step 1 : Adding HTML-->
	<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Admin</button> 

	<div id="id01" class="modal"> 

		<form class="modal-content animate" action="login.php" method="post"> 
			<div class="imgcontainer"> 
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span> 
				<i class="fas fa-user-lock"></i>

				<alt="Avatar" class="avatar"> 
			</div> 

			<div class="container"> 
				<label><b>Username</b></label> 
				<input type="text" name="User" placeholder="Enter User-Name" id="username1" value="">
				<!-- <input type="text" placeholder="Enter Username" name="uname" required>  -->

				<label><b>Password</b></label> 
				<input type="password" name="Pass" placeholder="Enter Password" id="password1" value=""><span id="message3" style="color:yellow"></span>
            <input type="submit" name="login-submit" value="login">
			</div> 

			<div class="container" style="background-color:#f1f1f1"> 
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> 
				<span class="psw">Forgot <a href="#">password?</a></span> 
			</div> 
		</form> 
	</div> 

	<script> 
		var modal = document.getElementById('id01'); 
		window.onclick = function(event) { 
			if (event.target == modal) { 
				modal.style.display = "none"; 
			} 
		} 
	</script> 
</body> 
<script src="https://kit.fontawesome.com/8e6e2de13f.js" crossorigin="anonymous"></script>


</html> 
