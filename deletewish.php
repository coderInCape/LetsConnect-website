<?php
session_start();

  //fetch username and password
  $requestid = $_GET['requestid'];
  
  //write the sql statement
  $query = "delete from REQUEST where requestid = '$requestid'";
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
   session_start();
    if ($_SESSION['usertype'] == "administrator") {
	header("Location: manageWishedPostFunctionDeletionSuccess.php",true);	
	}
	else
	header("Location: deletePostSucess.php",true);
   

?>