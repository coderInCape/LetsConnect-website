<?php	
  $query = "SELECT * FROM USER";	
  //$query2 = "SELECT * FROM REQUEST where username='$username'";	
  		
//	echo($query2);		
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  //$result2 = mysql_query( $query2 );
  $db->close();
  $x=0;
   while( $row = mysql_fetch_array( $result ))
  {
	 
	$rows[] = $row;
	$itemid[] = $row['itemid'];
    $username2[] = $row['username'];
	$firstname2 = $row['firstname'];
	$lastname2 = $row['lastname'];
	$imageurl2[] = $row['image'];
	
	
?>

							<a href="manageUserFunction.php?username2=<?php echo ($username2[$x]) ?>&imageurl2=<?php echo ($username2[$x]) ?>" class="row">
								<div class="userImageCol">
									<img src="<?php echo htmlspecialchars($imageurl2[$x]); ?>" />
								</div>
								<div class="userNameCol">
									<?php echo ($firstname2." ".$lastname2); ?>
								</div>
							</a>
							
							
	
<?php	
    $x++;
  }
     
   ?>