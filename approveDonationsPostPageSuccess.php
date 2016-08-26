
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
							
							$id3 = $_GET['itemid'];
							$username3 = $_GET['username2'];
							$requesteditemid4 = $_GET['requesteditemid3'];
							$approver = $_SESSION['username'];
							 $query3 = "insert into OFFEREDITEM (itemid,username,requesteditemid,approver) values ('$id3','$username3','$requesteditemid4','$approver')";	 
							//echo($query);
 $query4 = "delete from REQUESTEDITEM where requesteditemid = '$requesteditemid4'";		
 $query5 = "delete from ITEM where itemid = '$id3'" ;
 $query6 = "insert into WAITINGFEEDBACK (requester,approver,feedbackforrequester,feedbackforapprover) values ('$username3','$approver','waiting','waiting')";
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result3 = mysql_query( $query3 );
  $result4 = mysql_query( $query4 );
  $result5 = mysql_query( $query5 );
  $result6 = mysql_query( $query6 );
  
?>
						
				
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Approve Donations<span class="subtext"></span></h2>
					</div>
					<div class="form-group">
						<div class="success">
								<h2>Your Post has been successfully approved to <?php echo ($_GET['username2'])?>!</h2>
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
