<?php	
  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $query = "SELECT * FROM ITEM where userid='$userid'";	
  $query2 = "SELECT * FROM REQUEST where username='$username'";	
  		
	//echo($query2);		
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $result2 = mysql_query( $query2 );
  $db->close();
  $x=0;
  while( $row = mysql_fetch_array( $result ))
  {
	 
	$rows[] = $row;
	$itemid[] = $row['itemid'];
    $itemname = $row['itemname'];
	$description = $row['description'];
	$price = $row['price'];
	
	
?>
	<a class="row" href="editDeleteDonationPost.php?x=<?php echo ($itemid[$x])?>">
								<span class="postNameCol">
									<?php echo $row['itemname']?>
								</span>
								<span class="priceCol">
									<?php echo $row['price']?>
								</span>
							</a>
<?php	
    $x++;
  }
   $y=0;
   while( $row2 = mysql_fetch_array( $result2 ))
   {
	   $rows2[] = $row2;
	   $requestid2[] = $row2['requestid'];
	   $description2 = $row2['description'];
   
   ?>
	<a class="row" href="editDeleteWishedPost.php?y=<?php echo ($requestid2[$y])?>">
								<span class="postNameCol">
									<?php echo ($description2) ?>
								</span>
								<span class="priceCol">
									<?php echo "N/A"?>
								</span>
							</a>
<?php	
    $y++;
  }
 ?>
 
		