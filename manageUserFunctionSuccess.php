
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
 $userid2 = $_GET['userid'];

 	 
  $query = "SELECT * FROM USER where userid='$userid2'";	
  //$query2 = "SELECT * FROM REQUEST where username='$username'";	
  		
//	echo($query2);		
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
  $x=0;
   while( $row = mysql_fetch_array( $result ))
  {
	 
	$rows[] = $row;
	$itemid2[] = $row['itemid'];
    $username2 = $row['username'];
	$firstname2 = $row['firstname'];
	$lastname2 = $row['lastname'];
	$imageurl2 = $row['image'];
	$email2 = $row['email'];
	$password2 = $row['password'];
    $address2 =  $row['address'];	
  }
  ?>
				
				
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Manage Users >> <span class="subtext">Changes Saved</span></h2>
					</div>
					<div class="form-group">
						<div class="success">
							<h2>Changes to the user has been successfully saved</h2>
							<p>Changes are: </p>
							<p>User profile photo: </p>
							<img src="<?php echo htmlspecialchars($imageurl2) ?>"/></img>
							<p>Username: <?php echo ($username2) ?></p>
							<p>Email: <?php echo ($email2) ?></p>
							<p>Password: <?php echo ($password2) ?></p>
							<p>Address: <?php echo ($address2) ?></p>
						</div>
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
