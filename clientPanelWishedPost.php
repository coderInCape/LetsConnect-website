
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
	
	<script src="ajax.js"></script>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<div class="mainContent" id="mainContent">
		<div class="content"> 
			<div class="content1">
				<span id="hamburgerMenuLeft"><img src="images/hamburger.png"/></span><h1>Users Dashboard</h1>
				<div class="userFunctions" id="userFunctions">
					<div class="dashboardUserImageDiv">
						<img src="<?php echo htmlspecialchars($_SESSION['userimage']); ?>"/>
						<h1><?php echo $_SESSION['firstname'],' ',$_SESSION['lastname']?></h1>
						<p>Member since <?php echo $_SESSION['year']?></p> 
					</div>

					<ul class="userNav">
						<li class="checkedPost"><a href="clinetPanelPost.html">Add Post</a></li>
						<li class="subPost"><a href="clientPanlDonationPost.php">Donation Item Post</a></li>
						<li class="subPost"><a href="clientPanelWishedPost.php">Wished Item Post</a></li>
						<li><a href="editPosts.php">Edit Posts</a></li>
						<li><a href="approveDonations.php">Approve Donations</a></li>
						<li><a href="feedback.php">Leave Feedback</a></li>
						<li><a href="reportProblem.php">Report A Problem</a></li>
					</ul>
				</div>
				


	
	

				
				
				<div class="functionContent" >
					<div class="breadcrumbs">
						<h2>Add Post >> <span class="subtext">Wished Item Post</span></h2>
					</div>
					<form action="postwish.php" method="POST">
					<div class="form-group">
						<label>Your Wished Item Description</label>
						<input id="wishedItemDescription" name="wishedItemDescription"  required="required" type="text"/>
							<br>
						<div id="lo">
						<label >Latitude</label>
						<input type="text" id="latitude" name="latitude" value="" />
						<label >Longitude</label>
						<input type="text" id="longitude" name="longitude" value="" />
						</div>
						<button type="button" class="button" onclick="getLocation()">Tag location</button><br>
						<button type="submit" id="submit" class="button" required="required">Add Wished Item Post</button>
					</div>
					</form>
				</div>
				
				
				<script>
    function getLocation() {

         var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
         };

        function success(pos) {
           successFunction(pos);
        };

        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error,options);
        } else { 
            
        }
    }

    function successFunction(position) {
       var lat = position.coords.latitude;
       var longi = position.coords.longitude;

        $('#latitude').val(lat);
        $('#longitude').val(longi);
    }
   
</script>
				
				
				
			</div>
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>

	
	
		<?php	include('./footer.php'); ?>
</body>
</html>
