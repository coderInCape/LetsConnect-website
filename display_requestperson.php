<?php	
  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $id = $_GET['requesteditemid'];
  $query = "select * from USER where itemname IN (SELECT username FROM REQUESTEDITEM where requesteditemid='$id')";	
  
  		
	echo($query);		
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
	$requesteditemid[] = $row['requesteditemid'];
    $itemid = $row['itemid'];
	$query2 = "SELECT * FROM ITEM where itemid='$itemid'";	
	$result2 = mysql_query( $query2 );
	$row2 = mysql_fetch_array( $result2 );
	$itemname = $row2['itemname'];
	$description = $row2['description'];
	$price = $row2['price'];
	$itemimage = $row2['image'];
	
?>
<div class="row">
								<span class="userImageCol">
									<img src="images/luffy.jpg"/>
								</span>
								<span class="userNameCol">
									Waleed85
								</span>
								<span class="btnCol">
									<button type="submit" class="button">Approve</button> 
								</span> 
							</div>
<?php	
    $x++;
  }
    $db->close();  
   ?>

 
		