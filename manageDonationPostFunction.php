
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
				<div class="userFunctions">
					<div class="dashboardUserImageDiv">
						<img src="<?php echo htmlspecialchars($_SESSION['userimage']); ?>"/>
						<h1><?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']?></h1>
						<p>Member since <?php echo $_SESSION['year']?></p> 
					</div>

					

					<ul class="userNav">
						<li><a href="manageUsers.php">Manage Users</a></li>
						<li class="checkedPostCanHover"><a href="managePosts.php">Manage Posts</a></li>
						<li><a href="changeTheme.php">Change Theme</a></li>
						<li><a href="manageAdverts.php">Manage Adverts</a></li>
					</ul>
				</div>
				
				
				
				<?php	
  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $x= $_GET['x'];
  $query = "SELECT * FROM ITEM where itemid='$x'";	

  		
 // echo ($query);
			
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $db->close();
  
  while( $row = mysql_fetch_array( $result ))
  {
	  
	$rows[] = $row;
	$itemid = $row['itemid'];
    $itemname = $row['itemname'];
	$description = $row['description'];
	$price = $row['price'];
	$image = $row['image'];
	
	
?>
	<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Manage Posts >><span class="subtext"> Donation Post</span></h2>
					</div>
					<form action="upload_editpost.php?itemid=<?php echo ($itemid)?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Your Donation Item Photo</label>
						<div class="success"><img src="<?php echo htmlspecialchars($row['image']); ?>"/> </img></div>
						<label>Change Your Donation Item Photo</label>
						<input id="itemPhoto" type="file" name="fileToUpload"  required="required">
						<label>Your item name</label>
						<input id="itemname" name="itemname" required="required" type="text" value="<?php echo ($itemname) ?>"/>
						<label>Your item Description</label>
						<input  id="itemDescription" name="itemDescription"  required="required" type="text" value="<?php echo ($description) ?>"/>
						<label>Your item Price in AU$</label>
						<input type="number" id="price" name="price" min="0" max="999" value="<?php echo ($price) ?>">
						<div><button type="submit" id="update" class="button" required="required">Save Edited Post</button></div>
					</form>	
						
						<form action="deletepost.php?itemid=<?php echo ($itemid)?>" method="post" enctype="multipart/form-data">
						<div><button type="submit" id="delete" class="button" required="required">Delete Post</button></div>
					</div>
					</form>
				</div>
<?php	
    
  }
				
				<!-- populate the post details, form the database, to the fields -->
				
				
				
				
				
				
				
			</div>
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>

	
	
	<?php	include('./footer.php'); ?>
</body>
</html>
