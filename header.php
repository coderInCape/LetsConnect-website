<?php	 	
    session_start();
    if ($_SESSION['login'] == 1) {
		
	?>
	  
<html>

<header class="mainHeader">
		<script src="ajax.js"></script>
		
		<script type="text/javascript" src="styles/jquery-1.12.3.js"></script>
		<script>
	

		$(function(){
			
			
			$(".dropdownContent").click(function(){
				
				windowsize = $(window).width();
  if (windowsize < 730) {  //you can put the size that you are working with
   	 $(".mainHeader nav").toggle();
  }
				
				
				
			
			
			});
			
			
			$("#hamburgerMenu").click(function(){
				
				$(".mainHeader nav").toggle();
				
			
			
			});

			$(window).resize(function() {
  windowsize = $(window).width();
  if (windowsize > 730) {  //you can put the size that you are working with
   	 $(".mainHeader nav").css("display","block");
  }else
   	 $(".mainHeader nav").css("display","none");
})
			
			
		}); 
		</script>
	
		<div id="logo">
		<h1><a href="check_session.php">Let's<span id="boldLogo">Connect</span></a><span id="hamburgerMenu"><img src="images/hamburger.png"/></span></h1>
		</div>
		<nav>
			<ul>
				<li class="dropdown">
					<a class="dropdownBtn" href="#">Browse <i class="fa fa-caret-down"></i></a>
					<div class="dropdownContent">
						<a href="#" onclick="listitem()">Donation Items</a>
						<a href="#"onclick="listrequest()">Wished Items</a>
						<a href="#" onclick="itemlocation()">Show item on Map</a>
					</div>
				</li>
				<li><a class="link" href="aboutUs.php">About Us</a></li>
				<li><a class="link" href="contactUs.php">Contact Us</a></li>
				<li><a class="link" href="usage_policy.php">Usage Policy</a></li>
				<li class="dropdown">				
					<a href="#"><img id="login" src="<?php 
					      // if ($_SESSION['userimage'] == null) 
							//	echo ("images/avatar.png")
						   //else 
							   echo htmlspecialchars($_SESSION['userimage']); ?>"></img></a>
					<div class="dropdownContent2" style="right:0;">						
						<h2>Welcome <?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']?></h2>
						
						
					<?php if ($_SESSION['usertype'] == "administrator"){ ?>	
						<a id="manage" href="adminPanel.php"><img src="images\Settings-02-128.png" width="17px"/> Manage Your Account</a>
					<?php } else { ?>	
						<p>Donation Items Requested: <?php echo $_SESSION['requested'] ?></p>
						<p>Donation Items offered: <?php echo $_SESSION['offered'] ?></p>
						<p>Wished items: <?php echo $_SESSION['wished'] ?></p>
						<a id="manage" href="clientPanel.php"><img src="images\Settings-02-128.png" width="17px"/> Manage Your Account</a>
					<?php }?>
						<center><a href="logout.php">Logout</a></center>
					</div>
				</li>
			</ul>
		</nav>
	</header>
<html>	
	<?php } 
	else {
		?>
<html>
<header class="mainHeader">
<script src="ajax.js"></script> 
	<script type="text/javascript" src="styles/jquery-1.12.3.js"></script>
	<script>
	

		$(function(){
			
			
			$(".dropdownContent").click(function(){
				
				windowsize = $(window).width();
  if (windowsize < 730) {  //you can put the size that you are working with
   	 $(".mainHeader nav").toggle();
  }
				
				
				
			
			
			});
			
			
			$("#hamburgerMenu").click(function(){
				
				$(".mainHeader nav").toggle();
				
			
			
			});

			$(window).resize(function() {
  windowsize = $(window).width();
  if (windowsize > 730) {  //you can put the size that you are working with
   	 $(".mainHeader nav").css("display","block");
  }else
   	 $(".mainHeader nav").css("display","none");
})
			
			
		}); 
		</script>
		<div id="logo">
		<h1><a href="check_session.php">Let's<span id="boldLogo">Connect</span></a><span id="hamburgerMenu"><img src="images/hamburger.png"/></span></h1>
		
		</div>
		
		<nav>
			<ul>
				<li class="dropdown">
					<a class="dropdownBtn" href="#">Browse <i class="fa fa-caret-down"></i></a>
					<div class="dropdownContent">
						<a href="#" onclick="listitem()">Donation Items</a>
						<a href="#" onclick="listrequest()">Donation Requests</a>
						<a href="#" onclick="itemlocation()">Show item on Map</a>
					</div>
				</li>
				<li><a class="link" href="aboutUs.php">About Us</a></li>
				<li><a class="link" href="contactUs.php">Contact Us</a></li>
				<li><a class="link" href="usage_policy.php">Usage Policy</a></li>
				<li class="dropdown">
					<a href="#"><img id="login" src="images/avatar.png"></img></a>
					<div class="dropdownContent" style="right:0;">
						<a href="login.php">Login</a>
						<a href="register.php">Register</a>
					</div>
				</li>
			</ul>
		</nav>
	</header>
</html>		
<?php } 
	
		?>