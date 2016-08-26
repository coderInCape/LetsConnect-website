<?php	
  $key = $_SESSION['username'];
  $query = "SELECT U.*,W.id FROM USER U,WAITINGFEEDBACK W where U.username = W.approver and W.requester ='$key' and W.feedbackforapprover='waiting'";	
 $query2 = "SELECT U.*,W.id FROM USER U,WAITINGFEEDBACK W where U.username = W.requester and W.approver ='$key' and W.feedbackforrequester='waiting'";
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
  $result2 = mysql_query( $query2 );
  $db->close();
  while( $row = mysql_fetch_array( $result ))
  {
    $username2 = $row['username'];
	$firstname2 = $row['firstname'];
	$lastname2 = $row['lastname'];
	$imageurl2 = $row['image'];
	$id = $row[12];
	$feedback="approver";
	
	
?>
	<div class="row">
								<div class="userImageCol">
									<img src="<?php echo htmlspecialchars($imageurl2); ?>" />
								</div>
								<div class="userNameCol">
									<?php echo ($firstname2." ".$lastname2); ?>
								</div>
								
								<div class="btnCol">
									
									<a class="button" href="feedbackUserPage.php?user=<?php echo ($username2)?>&image=<?php echo 
									($imageurl2)?>&id=<?php echo ($id)?>&feedback=<?php echo ($feedback)?>">Leave Feedback</a>
								</div> 
							</div>
<?php	
    
  }
     while( $row2 = mysql_fetch_array( $result2 ))
  {
    $username2 = $row2['username'];
	$firstname2 = $row2['firstname'];
	$lastname2 = $row2['lastname'];
	$imageurl2 = $row2['image'];
	$id = $row2[12];
	$feedback="requester";
	
?>
	<div class="row">
								<div class="userImageCol">
									<img src="<?php echo htmlspecialchars($imageurl2); ?>" />
								</div>
								<div class="userNameCol">
									<?php echo ($firstname2." ".$lastname2); ?>
								</div>
								
								<div class="btnCol">
									
								<a class="button" href="feedbackUserPage.php?user=<?php echo ($username2)?>&image=<?php echo 
									($imageurl2)?>&id=<?php echo ($id)?>&feedback=<?php echo ($feedback)?>">Leave Feedback</a>
								</div> 
							</div>
<?php	
    
  }
     
   ?>
 