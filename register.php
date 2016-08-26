
<!DOCTYPE html>
<html>
<head>
	<title>Let's Connect: Donation Tool For Humanity</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="styles/theme.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		
</head>
<body class="body">

	<script>
		function validatePassword()
			{
				var pass1 = document.getElementById("pass1").value;
				var pass2 = document.getElementById("pass2").value;
				var check = true;
				if (pass1 != pass2)
				{
					alert("Passwords do not match");
					document.getElementById("pass1").style.borderColor = "#E34234";
					document.getElementById("pass2").style.borderColor = "#E34234";
					check = false;
				}
				
				
				return check;
			}
	</script> 




	<?php include('./header.php');  ?> 
	
	
	
	<div id="mainContent" class="mainContent">
		<div class="content"> 
			<div class="content1">
			<div class="register">
			
			
			
				<h1>Register</h1>
				<form action="userregister.php" onsubmit="return validatePassword()" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label>Your Profile Photo</label>
						<input id="profilePhoto" type="file" name="fileToUpload">
					</div>
					<p> 
						<label>Your First Name</label>
						<input id="firstname" name="firstname" required="required" type="text" placeholder="e.g. John" />
					</p>
					<p> 
						<label>Your Last Name</label>
						<input id="lastname" name="lastname" required="required" type="text" placeholder="e.g. Brian" />
					</p>
					<p> 
						<label>Your username</label>
						<input id="username" name="username" required="required" type="text" 
						placeholder="e.g. mysuperusername690" onkeyup="checkusername(this.value)"/>
						<div id="checkusername">				
					</p>
					<p> 
						<label> Your email</label>
						<input id="email" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
					</p>
					<p> 
						<label>Your password </label>
						<input id="pass1" name="pass1" required="required" type="password" placeholder="eg. X8df!90EO"/>
						
					</p>
					<p> 
						<label>Please confirm your password </label>
						<input id="pass2" required="required" type="password" placeholder="eg. X8df!90EO"/>
					</p>
					<p>
						<label>Address</label>
						<input type="text" id="address" name="address" size="40" required>
					</p>
					<div class="form-group">
						<div id="signup">
						<button type="submit" id="submit" class="button">Sign up</button>
						</div>
						<div>
							Already a member ?
							<a href="login.php" class="to_register"> Go and log in </a>
						</div>
					</div>
					</div>
				</form>
				
				
				
				
			</div>
			</div>
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>

	<?php	include('./footer.php'); ?>
</body>
</html>
