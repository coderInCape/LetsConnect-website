<?php
	
	$username6 = $_GET['username6'];
	$itemid6 = $_GET['itemid6'];
 
  $query = "SELECT *  
            FROM ITEM where itemname like {$key}";		
   //echo ($query);
			
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  

  //close once finished to free up resources
  $db->close();

  $count=0;
 
  while( $row = mysql_fetch_array( $result ))
  {
	//echo ($row['itemname']);
    //fetch the higher order id
	$rows[] = $row;
    $itemname[] = $row['itemname'];
	$description[] = $row['description'];
	$imageurl[] = $row['image'];
	$cost[] = $row['price'];
	$itemid[] = $row['itemid'];
	//echo ($row['itemid']);
	$count++;
?>