
<!DOCTYPE html>
<html>
<head>
	<title>Let's Connect: Donation Tool For Humanity</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles/theme.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
</head>
<body class="body">
<script src="ajax.js"></script>

<?php	 
	 
	  include('./header.php');  ?>
    
<?php	

$x = $_GET['x'];

	$query = "select *
            FROM ITEM
            WHERE itemid = '$x'";
	$query2 = "select U.* from USER U,ITEM I WHERE I.userid = U.userid and I.itemid = '$x'";
	

  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $result2 = mysql_query( $query2 );

  //close once finished to free up resources

  $row = mysql_fetch_array( $result );
  $itemname = $row['itemname'];
  $itemid = $row['itemid'];
  $description = $row['description'];
  $imageurl = $row['image'];
  $cost = $row['price'];
  
  $row2 = mysql_fetch_array( $result2 );
  $username2 = $row2['username'];
  $email2 = $row2['email'];
  $userid2 = $row2['userid'];
  $userimage2 =  $row2['image'];
  $year2 = $row2['year'];
  
  $query3 = "select count(I.itemid) from USER U,ITEM I WHERE I.userid = U.userid and U.username = '$username2' group by U.username";
  $result3 = mysql_query( $query3 );
  $row3 = mysql_fetch_array( $result3 );
  $itemdonated = $row3[0];
  
  $query4 = "select * from FEEDBACK WHERE recipientname = '$username2'";
  $result4 = mysql_query( $query4 );
  $count4=0;
    while( $row4 = mysql_fetch_array( $result4 ))
	{
    //fetch the higher order id
	$rows4[] = $row4;
	$comment[] = $row4['comment'];
	$commenter[] = $row4['username']; 
	$count4++;
	}
   $query5 = "select count(*) from REQUESTEDITEM where itemid='$itemid'";
   $result5 = mysql_query( $query5 );
   $row5 = mysql_fetch_array( $result5 );
   $countrequest = $row5[0];
   
   $query6 = "select AVG(rating) from FEEDBACK where recipientname='$username2'";
   $result6 = mysql_query( $query6 );
   $row6 = mysql_fetch_array( $result6 );
   $rating = $row6[0];
   session_start();
   $owner = $_SESSION['username'];
   $query7 = "select count(*) from REQUESTEDITEM where username='$owner' and itemid='$itemid'";
   $result7 = mysql_query( $query7 );
   $row7 = mysql_fetch_array( $result7 );
   $checkrequest = $row7[0];
   
  $db->close();
  
  
?>
	
	<div class="mainContent" id="mainContent">
		<div class="content">
			<div class="topContent">
			
				<figure class="itemImage"><a href="#"><img src="<?php echo htmlspecialchars($imageurl); ?>"/> </a></figure>
				<div class="contentInfo">
					<header>
						<h1><a href="#" ><?php echo $itemname?></a><h1>
					</header>
					<footer>
						<p class="post-info">Posted by <?php echo $username2?></p> 
					</footer>
					<content>
						<p class="cost">$<?php echo $cost?></p><br>
						<p class="usersRequestsCount"> <?php echo ($countrequest)?> users requested the item</p>
					</content>
				</div>
				
				
				<?php	 	
    
    if ($_SESSION['login'] == 1) {
		
		if ($_SESSION['username'] == $username2)
		{
		}
		else
		{
		if ($checkrequest == 0)
		{
	?>
				
				<div class="requestitembtns" id="requestitembtns">
					<a href="mailto:<?php echo $row2['email']?>?Subject=subject here&Body=bodytext" class='button'>Message User </a>
					
					<a href='#' class='button' onclick="requestitem(<?php echo ($itemid)?>,'<?php echo ((string)$_SESSION['username'])?>')" >Request Item</a>
				</div>
				
	<?php }
		else
		{
			?>
			<div class="requestitembtns" id="requestitembtns">
					<a href="mailto:<?php echo $row2['email']?>?Subject=subject here&Body=bodytext" class='button'>Message User </a>
				
					<a href='#'>Requested </a>
				</div>
			<?php
		}
		}
	}
	else {
		?>		

		<div class="requestitembtns" id="requestitembtns">
					<a href='login.php' class='button'>Login To Request Item</a>
				</div>

	<?php } 
		
			?>		
				
				
				
			</div>
			
			
			
			<div class="userInfo">
			<div>
				<figure class="userImage"><a href="#"><img src="<?php echo htmlspecialchars($userimage2); ?>"/></a></figure>
			</div> 
				<div class="userInfoDetails">
					<header>
						<h1><a href="#" > <?php echo $username2?></a><h1>
					</header>
					<footer>
						<p class="post-info">Member since <?php echo ($year2)?></p> 
					</footer>
					<content>
						<p>Items Donated: <?php echo ($itemdonated) ?> items</p>
						<fieldset>
							<span class="rating">
							<?php
								 
								 if ($rating == 0)
								 {
									 ?>
									 <input type="radio" class="rating-input"
								           id="rating-input-1-5" name="rating-input-1" disabled/>
									<label for="rating-input-1-5" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-4" name="rating-input-1" disabled/>
									<label for="rating-input-1-4" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-3" name="rating-input-1" disabled/>
									<label for="rating-input-1-3" class="rating-star" ></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-2" name="rating-input-1"  disabled/>
									<label for="rating-input-1-2" class="rating-star"></label>
										<input type="radio" class="rating-input"
											id="rating-input-1-1" name="rating-input-1"  disabled/>
									<label for="rating-input-1-1" class="rating-star"></label> 
								<?php 
								 }
								 
									 if ($rating >0 and $rating <= 1)
								 {
								?>
								 <input type="radio" class="rating-input"
								           id="rating-input-1-5" name="rating-input-1" disabled/>
									<label for="rating-input-1-5" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-4" name="rating-input-1" disabled/>
									<label for="rating-input-1-4" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-3" name="rating-input-1" disabled/>
									<label for="rating-input-1-3" class="rating-star" ></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-2" name="rating-input-1"  disabled/>
									<label for="rating-input-1-2" class="rating-star"></label>
										<input type="radio" class="rating-input"
											id="rating-input-1-1" name="rating-input-1" checked disabled/>
									<label for="rating-input-1-1" class="rating-star"></label> 
									
								<?php 
								 }
								 
									 if ($rating >1 and $rating<=2)
									 {
										 ?>
									<input type="radio" class="rating-input"
								           id="rating-input-1-5" name="rating-input-1" disabled/>
									<label for="rating-input-1-5" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-4" name="rating-input-1" disabled/>
									<label for="rating-input-1-4" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-3" name="rating-input-1" disabled/>
									<label for="rating-input-1-3" class="rating-star" ></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-2" name="rating-input-1" checked disabled/>
									<label for="rating-input-1-2" class="rating-star"></label>
										<input type="radio" class="rating-input"
											id="rating-input-1-1" name="rating-input-1"  disabled/>
									<label for="rating-input-1-1" class="rating-star"></label> 
									
									 <?php 
									 }	 
							 if ($rating >2 and $rating<=3)
								 {
									 ?>
									 <input type="radio" class="rating-input"
								           id="rating-input-1-5" name="rating-input-1" disabled/>
									<label for="rating-input-1-5" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-4" name="rating-input-1" disabled/>
									<label for="rating-input-1-4" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-3" name="rating-input-1" checked disabled/>
									<label for="rating-input-1-3" class="rating-star" ></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-2" name="rating-input-1"  disabled/>
									<label for="rating-input-1-2" class="rating-star"></label>
										<input type="radio" class="rating-input"
											id="rating-input-1-1" name="rating-input-1"  disabled/>
									<label for="rating-input-1-1" class="rating-star"></label> 
								<?php 
								 }
								 
									 if ($rating >3 and $rating<=4)
								 {
								?>
								 <input type="radio" class="rating-input"
								           id="rating-input-1-5" name="rating-input-1" disabled/>
									<label for="rating-input-1-5" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-4" name="rating-input-1" checked disabled/>
									<label for="rating-input-1-4" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-3" name="rating-input-1" disabled/>
									<label for="rating-input-1-3" class="rating-star" ></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-2" name="rating-input-1"  disabled/>
									<label for="rating-input-1-2" class="rating-star"></label>
										<input type="radio" class="rating-input"
											id="rating-input-1-1" name="rating-input-1"  disabled/>
									<label for="rating-input-1-1" class="rating-star"></label> 
									
								<?php 
								 }
								 
									 if ($rating >4 )
									 {
										 ?>
									<input type="radio" class="rating-input"
								           id="rating-input-1-5" name="rating-input-1" checked disabled/>
									<label for="rating-input-1-5" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-4" name="rating-input-1" disabled/>
									<label for="rating-input-1-4" class="rating-star"></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-3" name="rating-input-1" disabled/>
									<label for="rating-input-1-3" class="rating-star" ></label>
									<input type="radio" class="rating-input"
											id="rating-input-1-2" name="rating-input-1"  disabled/>
									<label for="rating-input-1-2" class="rating-star"></label>
										<input type="radio" class="rating-input"
											id="rating-input-1-1" name="rating-input-1"  disabled/>
									<label for="rating-input-1-1" class="rating-star"></label> 
									
									 <?php 
									 } 	 		 
									 ?>
									 
									
									
								
							</span>
							(<?php echo number_format($rating,1)?>)
						</fieldset>
					</content>
				</div>
			</div>
		





		
			<section class="comments">
				<h1>Comments on <?php echo ($username2)?></h1>
			<?php 
			//get an instance
			  $db2 = new Connection();

			  //connect to database
			  $db2->connect();
			
				if ($count4 ==0)
				{
					?>
					<p><?php echo ("No comment") ?></p>
					<?php 
				}
				else
				{
			for ($c = 0; $c < count($rows4); $c++) { 
			
			$temp = mysql_fetch_array(mysql_query("select *
            FROM USER
            WHERE username = '$commenter[$c]'"));
			$commenterimage = $temp['image']; 	
			$commenteryear = $temp['year'];
			

			
			 

			?>
				
				<div class="commentBlock">
					<div class="userImage">
						<img src="<?php echo htmlspecialchars($commenterimage); ?>"/>
					</div>
					<div class="commentorText">
						<h2><?php echo $commenter[$c]?></h2>
						<footer> Member since <?php echo $commenteryear ?> </footer>
						<p><?php echo $comment[$c] ?></p>
					</div>
				</div>
				
				
			<?php }
				}			$db2->close(); ?>
				
			
			
		
			
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>

	
	
<?php	include('./footer.php'); ?>
</body>
</html>
