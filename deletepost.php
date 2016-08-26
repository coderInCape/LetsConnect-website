<?php
session_start();

  //fetch username and password
  $itemid = $_GET['itemid'];
  
  //write the sql statement
  $query = "delete from ITEM where itemid = '$itemid'";
 // echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  
  $db->close();

  
  
  if ($_SESSION['usertype'] == "administrator") {
	 	
	  header("Location: manageDonationPostFunctionDeletionSuccess.php",true);
	}
	else
	header("Location: deletePostSucess.php",true);
   

?>