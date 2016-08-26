<?php	
 $userid2 = $_GET['userid'];
 if ($userid2 == null)
 $query = "SELECT * FROM USER";
 else	 
  $query = "SELECT * FROM USER where userid='$userid2'";	
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
	$itemid2[] = $row['itemid'];
    $username2[] = $row['username'];
	$firstname2 = $row['firstname'];
	$lastname2 = $row['lastname'];
	$imageurl2[x] = $row['image'];
	$imageurl3 = $row['image'];
	$email2 = $row['email'];
	$password2 = $row['password'];
    $address2 =  $row['address'];	
  }
  ?>