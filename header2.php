<?php	 	
    session_start();
    if ($_SESSION['login'] == 1) {
		
	?>
	  
<html>
<header class="mainHeader">
		<script src="ajax.js"></script>
		
		<div id="logo">
		<h1><a href="check_session.php">Let's<span id="boldLogo">Connect</span></a></h1>
		</div>
		<nav>
			<ul>
				<li class="dropdown">
					<a class="dropdownBtn" href="#">Browse <i class="fa fa-caret-down"></i></a>
					<div class="dropdownContent">
						<a href="#" onclick="listitem()">Donation Items</a>
						<a href="#"onclick="listrequest()">Wished Items</a>
					</div>
				</li>
				<li><a class="link" href="">About Us</a></li>
				<li><a class="link" href="#">Contact Us</a></li>
				<li><form><input id="search" type="text" name="search" placeholder="Search" size="20" onkeyup="showResult(this.value)"></form></li>
				<li class="dropdown">				
					<a href="#"><img id="login" src="<?php 
					      // if ($_SESSION['userimage'] == null) 
							//	echo ("images/avatar.png")
						   //else 
							   echo htmlspecialchars($_SESSION['userimage']); ?>"></img></a>
					<div class="dropdownContent" style="right:0;">						
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
	
		<div id="logo">
		<h1><a href="check_session.php">Let's<span id="boldLogo">Connect</span></a></h1>
		</div>
		<nav>
			<ul>
				<li class="dropdown">
					<a class="dropdownBtn" href="#">Browse <i class="fa fa-caret-down"></i></a>
					<div class="dropdownContent">
						<a href="#" onclick="listitem()">Donation Items</a>
						<a href="#" onclick="listrequest()">Donation Requests</a>
					</div>
				</li>
				<li><a class="link" href="">About Us</a></li>
				<li><a class="link" href="#">Contact Us</a></li>
				<li><form><input id="search" type="text" name="search" placeholder="Search" size="20" onkeyup="showResult(this.value)"></form></li>
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