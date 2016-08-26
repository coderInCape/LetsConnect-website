<?php	
  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $query = "select * from ITEM where isrequested = 'YES' and userid='$userid'";
  
  //$query = "select distinct * from REQUESTEDITEM where itemid IN (SELECT itemid FROM ITEM where userid='$userid')";	
  
  		
	//echo($query);		
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  
  
  $x=0;
  
  while( $row = mysql_fetch_array( $result ))
  {
	 
	$rows[] = $row;
	
    $itemid = $row['itemid'];
	$query2 = "SELECT * FROM ITEM where itemid='$itemid'";	
	$result2 = mysql_query( $query2 );
	$row2 = mysql_fetch_array( $result2 );
	$itemname = $row2['itemname'];
	$description = $row2['description'];
	$price = $row2['price'];
	$itemimage = $row2['image'];

	
	
?>
	<a class="row" href="approveDonationsPostPage.php?itemid=<?php echo ($itemid)?>&description=<?php echo ($description)?>&price=<?php echo ($price)?>&itemimage=<?php echo ($itemimage)?>&requesteditemid=<?php echo ($requesteditemid[$x])?>">
								<span class="postNameCol">
									<?php echo ($itemname)?>
								</span>
								<span class="priceCol">
									<?php echo ($price)?>
								</span>
							</a>
<?php	
    $x++;
  }
    $db->close();  
   ?>

 
		