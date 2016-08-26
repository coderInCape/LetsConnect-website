
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
						<li><a href="clientPanelPost.php">Add Post</a></li>
						<li><a href="editPosts.php">Edit Posts</a></li>
						<li><a href="approveDonations.php">Approve Donations</a></li>
						<li><a href="feedback.php">Leave Feedback</a></li>
						<li><a href="reportProblem.php">Report A Problem</a></li>
					</ul>
				</div>
				
				
				
				
				
				
				
				
				
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Leave Feedback<span class="subtext"></span></h2>
					</div>
						<form action="leavefeedback.php?user=<?php echo 
						($user)?>&id=<?php echo ($_GET['id']) ?>&feedback=<?php echo ($_GET['feedback']) ?>" method="post" enctype="multipart/form-data">
						<div class="success">
							<p></p> 
							<h2>Please Rat The User Using The Stars Provided</h2>
							<p>Username: <?php $user =$_GET['user']; echo ($_GET['user'])?></p>
							<p>Profile Photo:</p>
							<img src="<?php echo htmlspecialchars($_GET['image']); ?>" width="200px"></img>
							<content>
								<p> </p> 
								<fieldset>
									<span class="rating">
											<input type="radio" class="rating-input"
										id="rating-input-1-5" name="rating-input-1" value="5"/>
											<label for="rating-input-1-5" class="rating-star"></label>
											<input type="radio" class="rating-input"
													id="rating-input-1-4" name="rating-input-1" value="4"/>
											<label for="rating-input-1-4" class="rating-star"></label>
											<input type="radio" class="rating-input"
													id="rating-input-1-3" name="rating-input-1" value="3"/>
											<label for="rating-input-1-3" class="rating-star" ></label>
											<input type="radio" class="rating-input"
													id="rating-input-1-2" name="rating-input-1" checked value="2"/>
											<label for="rating-input-1-2" class="rating-star"></label>
											<input type="radio" class="rating-input"
													id="rating-input-1-1" name="rating-input-1" value="1"/>
											<label for="rating-input-1-1" class="rating-star"></label>
									</span>
								</fieldset>
								<p></p>
								<p></p>
								<p>
									<label>Comment</label>
									<textarea name="comment" rows="10"></textarea>
								</p>
							</content>
							<div><button type="submit" id="update" class="button" required="required">Leave Feedback</button></div>
							
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
