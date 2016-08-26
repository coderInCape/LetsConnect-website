
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
	session_start();
    if ($_SESSION['login'] == 1)
	  include('./header.php'); 
     else
		 include('./gheader.php'); ?>	
	
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
  $userid2 = $row2['userid'];
  $userimage2 =  $row2['image'];
  $year2 = $row2['year'];
  
  $query3 = "select count(I.itemid) from USER U,ITEM I WHERE I.userid = U.userid and U.username = '$username2' group by U.username";
  $result3 = mysql_query( $query3 );
  $row3 = mysql_fetch_array( $result3 );
  $itemdonated = $row3[0];
  
  $query4 = "select * from FEEDBACK WHERE recipientname = '$username2'";
  $result4 = mysql_query( $query4 );
    while( $row4 = mysql_fetch_array( $result4 ))
	{
    //fetch the higher order id
	$rows4[] = $row4;
	$comment[] = $row4['comment'];
	$commenter[] = $row4['username']; 
	}
   $query5 = "select count(*) from REQUESTEDITEM where itemid='$itemid'";
   $result5 = mysql_query( $query5 );
   $row5 = mysql_fetch_array( $result5 );
   $countrequest = $row5[0];
  $db->close();
  
  
?>
	
	<div class="mainContent" id="mainContent">
		<div class="content">
			<div class="topContent">
			
				<figure class="itemImage"><a href="#"><img src="<?php echo htmlspecialchars($imageurl); ?>"/> </a></figure>
				<div class="contentInfo">
					<header>
						<h1><a href="#" title="first post"><?php echo $itemname?></a><h1>
					</header>
					<footer>
						<p class="post-info"><?php echo $description?></p> 
					</footer>
					<content>
						<p class="cost">$<?php echo $cost?></p><br>
						<p class="usersRequestsCount"> <?php echo ($countrequest)?> users requested the item</p>
					</content>
				</div>
				<div class="requestitembtns" id="requestitembtns">
					<a href='#' class='button'>Message User</a>
				
					<a href='#' class='button' onclick="requestitem(<?php echo ($itemid)?>,'<?php echo ((string)$_SESSION['username'])?>')" >Request Item</a>
					
				</div>
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
						<p class="post-info">Member since <?php echo $year?></p> 
					</footer>
					<content>
						<p>Items Donated: <?php echo $itemdonated ?> items</p>
						<fieldset>
							<span class="rating">
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
											id="rating-input-1-1" name="rating-input-1" disabled/>
									<label for="rating-input-1-1" class="rating-star"></label>
							</span>
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
				
				
			<?php } $db2->close(); ?>
				
			
			
		
			
		</div>
		<aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
	</div>

	
	
	<footer class="mainFooter">
		<div class="copyright"><p>Copyright &copy; Waleed Mosa</p>
		<p>Mark The database Maser</p>
		</div> 
		<div class="socialMedia">
			<a href="[full link to your Twitter]">
			<img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter1.png" width="35" height="35" />
			</a>
			<a href="[full link to your LinkedIn]">
			<img title="LinkedIn" alt="LinkedIn" src="https://socialmediawidgets.files.wordpress.com/2014/03/07_linkedin1.png" width="35" height="35" />
			</a>
			<a href="[full link to your Facebook page]">
			<img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook1.png" width="35" height="35" />
			</a>
			<a href="pinterestaddress">
			<img title="Pinterest" alt="Pinterest" src="https://socialmediawidgets.files.wordpress.com/2014/03/13_pinterest1.png" width="35" height="35" />
			</a>
		</div>
	</footer>
</body>
</html>
