<?php
session_start();
  //fetch username and password
  $description =  $_POST['description'];
  $subject= $_POST['subject'];
  $username = $_SESSION['username'];
  $_SESSION['requestid'] = $requestid;
  //write the sql statement
  $query = "insert into REPORT (username,subject,description) values ('$username','$subject', '$description')";
  mail("17818319@students.latrobe.edu.au",$subject,$description,"Group10");
 //  echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  
  $db->close();

	header("Location: reportProblemSuccess.php",true);

?>