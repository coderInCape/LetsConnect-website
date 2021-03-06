
<!DOCTYPE html>
<html>
<head>
	<title>Let's Connect: Donation Tool For Humanity</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>


<script type="text/javascript" src="styles/jquery-1.12.3.js"></script>
		<script>
	

		$(function(){
			
			
			$("#hamburgerMenuLeft").click(function(){
				
				$(".userFunctions").toggle();
				
			
			
			});

			$(window).resize(function() {
  windowsize = $(window).width();
  if (windowsize > 730) {  //you can put the size that you are working with
   	 $(".userFunctions").css("display","block");
  }else
   	 $(".userFunctions").css("display","none");
})
			
			
		}); 
		</script>





<body class="body">
<?php	include('./header.php'); ?>
	
	
	
	<div class="mainContent" id="mainContent">
		<div class="content"> 
			<div class="content1">
				<span id="hamburgerMenuLeft"><img src="images/hamburger.png"/></span><h1>Admin Dashboard</h1>
				<div class="userFunctions" id="userFunctions">
					<div class="dashboardUserImageDiv">
						<img src="<?php echo htmlspecialchars($_SESSION['userimage']); ?>"/>
						<h1><?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']?></h1>
						<p>Member since <?php echo $_SESSION['year']?></p> 
					</div>

					<ul class="userNav">
						<li class="checkedPostCanHover"><a href="manageUsers.php">Manage Users</a></li>
						<li ><a href="managePosts.php">Manage Posts</a></li>
						<li><a href="changeTheme.php">Change Theme</a></li>
						<li><a href="manageAdverts.php">Manage Adverts</a></li>
					</ul>
				</div>
				
				<?php
				
	$username7 = $_GET['username2'];
  $query = "SELECT * FROM USER where username='$username7'";	
  		//echo ($query);
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  //$result2 = mysql_query( $query2 );
  $db->close();

   while( $row = mysql_fetch_array( $result ))
  {
	 
	$email7 = $row['email'];
    $username7 = $row['username'];
	$firstname7 = $row['firstname'];
	$lastname7 = $row['lastname'];
	$imageurl7 = $row['image'];
	$address7 = $row['address'];
	$password7 = $row['password'];
	$userid7 = $row['userid'];
  }
	?>
				
				
				
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Manage Users >> <span class="subtext"><?php echo ($username7) ?></span></h2>
					</div>
					
					<div class="register">
					
						<form action="adminuserregister.php?userid=<?php echo ($userid7)?>" onsubmit="return validatePassword()" method="POST" enctype="multipart/form-data">
							<p>User Current Photo</p>
							<p><img src="<?php echo htmlspecialchars($imageurl7); ?>" /></p>
							<div class="form-group">
								<label>New Profile Photo</label>
								<input id="profilePhoto" type="file" name="fileToUpload" value="images/luffy.png" >
							</div>
							<p> 
								<label>Username</label>
								<input id="username"  name="username" required="required" type="text" value="<?php echo ($username7) ?>" />
							</p>
							<p> 
								<label>Email</label>
								<input id="email" name="email" required="required" type="email" value="<?php echo ($email7) ?>"/> 
							</p>
							<p> 
								<label>Password </label>
								<input id="pass1" name="pass1"  required="required" type="password" value="<?php echo ($password7) ?>"/>
							</p>
							<p>
								<label>Address</label>
								<input type="text" name="address" size="40" required value="<?php echo ($address7) ?>">
							</p>
							<div class="form-group">
								<p><button type="submit" id="update" class="button">Save Changes</button></p>							
							</div>
						</form>
						
						<form action="deleteuser.php?id=<?php echo ($userid7) ?>"  method="POST">
							<div class="form-group">
								
								<p><button type="submit" id="Delete" value="delete" class="button">Delete</button></p>
							</div>
						</form>	
					
					</div>
					
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
