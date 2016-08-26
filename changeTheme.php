
<!DOCTYPE html>
<html>
<head>
	<title>Let's Connect: Donation Tool For Humanity</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
	<META HTTP-EQUIV="Expires" CONTENT="-1">

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
						<li ><a href="managePosts.php">Manage Posts</a></li>
						<li class="checkedPostCanHover"><a href="changeTheme.php">Change Theme</a></li>
						<li><a href="manageAdverts.php">Manage Adverts</a></li>
					</ul>
				</div>
				
				
				
				<form action="change_theme.php" method="post" enctype="multipart/form-data">
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Choose theme color<span class="subtext"></span></h2>
					</div>
					<div class="form-group">
						<p> 
						<?php
							$myFile = "styles/body.css";
							$fh = fopen($myFile, 'r');
							$theData = fread($fh, filesize($myFile));
							fclose($fh);?>
							
							<label>background color</label>
							<input id="background-color" type="color" value="<?php echo $theData ?>" 
		onchange="javascript:document.getElementById('chosen-color').value = document.getElementById('background-color').value;"/>
							<input id="chosen-color"  name="color" type="text" value="<?php echo $theData ?>" required></input> 
						</p>
						<p> 
						<?php $myFile = "styles/header.css";
							$fh = fopen($myFile, 'r');
							$theData = fread($fh, filesize($myFile));
							fclose($fh);		?>
							<label>header color</label>
							<input id="header-color" type="color" value="<?php echo $theData ?>" 
		onchange="javascript:document.getElementById('chosen-color2').value = document.getElementById('header-color').value;"/>
							<input id="chosen-color2"  name="color2" type="text" value="<?php 
							echo $theData ?>" required></input> 
						</p>
	     
						<label >Or choose pre-defined theme</label>
						 <select name="theme">
							  <option value="">Select</option>
							  <option value="default">Default theme - The happiness of sharing</option>
							  <option value="facebook">Ocean Arms</option>							  
						</select>
						
						<p>
						<br>
							<button type="submit" class="button">Change</button>
						</p>
						

						
					</div>
				</div>
				</form>
				
			
			
				
				
				
				
				
			</div>
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>
<script type="text/javascript">
$(document).ready(function(){    
    //Check if the current URL contains '#'
    if(document.URL.indexOf("#")==-1){
        // Set the URL to whatever it was plus "#".
        url = document.URL+"#";
        location = "#";

        //Reload the page
        location.reload(true);
    }
});
</script>
	

	<?php	include('./footer.php'); ?>
</body>
</html>
