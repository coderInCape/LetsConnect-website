
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
				<span id="hamburgerMenuLeft"><img src="images/hamburger.png"/></span><h1>Users Dashboard</h1>
				<div class="userFunctions">
					<div class="dashboardUserImageDiv">
						<img src="<?php echo htmlspecialchars($_SESSION['userimage']); ?>"/>
						<h1><?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']?></h1>
						<p>Member since <?php echo $_SESSION['year']?></p> 
					</div>

					<ul class="userNav">
						<li><a href="clinetPanelPost.php">Add Post</a></li>
				
						<li><a href="editPosts.php">Edit Posts</a></li>
						<li><a href="approveDonations.php">Approve Donations</a></li>
						<li><a href="feedback.php">Leave Feedback</a></li>
						<li><a href="reportProblem.php">Report A Problem</a></li>
					</ul>
				</div>
				
				
				
				
				
				
				<!-- populate the post details, form the database, to the fields -->
				
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Add Post >> <span class="subtext">Wished Item Post</span></h2>
					</div>
					<div class="form-group">
						<div class="success">
								<h2>Your Wished Item Post has been successfully added</h2>
								<p>Your post is: <?php echo ($_SESSION['requestid'])?></p>
								<p>Item description: <?php echo ($_SESSION['wishedItemDescription'])?></p>
								<a class="button" href="editPosts.php" >Edit Another Wished Post</a>
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
