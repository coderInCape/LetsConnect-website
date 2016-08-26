
<!DOCTYPE html>
<html>
<head>
	<title>Let's Connect: Donation Tool For Humanity</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0:>
</head>
<body class="body">
	<?php	include('./header.php'); ?>
		
	<div class="mainContent" id="mainContent">
		<div class="content"> 
			<div class="content1">
				<h1>Users Dashboard</h1>
				<div class="userFunctions" id="userFunctions">
					<div class="dashboardUserImageDiv">
						<img src="<?php echo htmlspecialchars($_SESSION['userimage']); ?>"/>
						<h1><?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']?></h1>
						<p>Member since <?php echo $_SESSION['year']?></p> 
					</div>

					<ul class="userNav" id="userNav">
						<li><a href="clientPanelPost.php">Add Post</a></li>
						<li><a href="editPosts.php">Edit Posts</a></li>
						<li class="checkedPostCanHover"><a href="approveDonations.php">Approve Donations</a></li>
						<li><a href="feedback.php">Leave Feedback</a></li>
						<li><a href="reportProblem.php">Report A Problem</a></li>
					</ul>
	
	
	
				</div>
				
				
				
	<?php
							
							$id = $_GET['itemid'];
							$requesteditemid2 = $_GET['requesteditemid'];
							 $query = "select * from USER where username IN (SELECT username FROM REQUESTEDITEM where itemid='$id')";	 
							//echo($query);		
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();
  $count = 0;
  //query the database
  $result = mysql_query( $query );
  $result2 = mysql_query( $query );  
	while( $row2 = mysql_fetch_array( $result2 ))
	{$count++;}
		?>	
				
				
				
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Approve Donations<span class="subtext"></span></h2>
					</div>
					<div class="form-group">
						<div class="success">
							<h2>A total of <?php if ($count <=1) echo ($count." user"); else echo ($count." users"); ?>  has requested your donation item</h2>
							<p>Photo:</p>
							<img src="<?php echo htmlspecialchars($_GET['itemimage']); ?>"></img>
							<p>Item description: <?php echo ($_GET['description'])?></p>
							<p>Price: <?php echo ($_GET['price'])?>$</p>
						</div>
						<div class="userTable">
							<p></p>
							
							
 <?php 
  
  $x=0;
  while( $row = mysql_fetch_array( $result ))
  {
	 
	$rows[] = $row;
	$username2 = $row['username'];
	$userimage2 = $row['image'];
	
?>
<form action="approveDonationsPostPageSuccess.php?username2=<?php echo ($username2)?>&itemid=<?php echo ($id)?>&requesteditemid3=<?php echo ($requesteditemid2)?>" method="post" enctype="multipart/form-data">
<div class="row">
								<span class="userImageCol">
									<img src="<?php echo htmlspecialchars($userimage2); ?>"/>
								</span>
								<span class="userNameCol">
									<?php echo ($username2)?>
								</span>
								<span class="btnCol">
									<button type="submit" class="button">Approve</button> 
								</span> 
							</div>
							</form>
<?php	
    $x++;
  }
    $db->close();  
   ?>
						
							
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
