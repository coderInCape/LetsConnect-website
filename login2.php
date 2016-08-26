
<!DOCTYPE html>
<html>
<head>
	<title>Let's Connect: Donation Tool For Humanity</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="body">
		<?php include('./header.php');  ?> 
	
	
	
	<div id="mainContent" class="mainContent">
		<div class="content"> 
			<div class="content1">
			
			
				<h1>Login</h1>
				<form action="authenticate.php" method="POST">
					<?php
						//check if authentication failed
						
						if(isset($_SESSION['login']) && $_SESSION['login'] == 0)
						{
					?>
					<div class="error1">
						<p>Please enter a correct username and password. Note that both fields may be case-sensitive</p>
					</div>
					<?php
					   }
					?>
					<div class="div_id_username">
						<label>
							Username
						</label>
						<input name="username" type="text" required/>
					</div>
					<div class="div_id_password">
						<label>
							Password
						</label>
						<input type="password" name="password" required/>
					</div>
					
					<div class="form-group">
						<button type="submit" class="button">Sign in</button>
						<div>
							<a href="register.php">Don't have an account?</a>
						</div>
					</div>
				</form>
				
				
				
				
			</div>
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>

	
	
	<?php include('./footer.php')?>
</body>
</html>
