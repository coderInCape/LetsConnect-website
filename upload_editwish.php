<?php
session_start();
  //fetch username and password
  $description =  $_POST['wishedItemDescription'];
  $requestid = $_GET['requestid'];
  $_SESSION['wishedItemDescription'] = $_POST['wishedItemDescription'];
  $_SESSION['requestid'] = $requestid;
  //write the sql statement
  $query = "update REQUEST set
	description = '$description' where requestid = '$requestid'";
   echo ($query);
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
	 	
	  header("Location: manageWishedPostFunctionSuccess.php",true);
	}
	else
	header("Location: editWishedPostSuccess.php",true);

?>