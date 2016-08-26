<?php
session_start();
  //fetch username and password
  $feedback =  $_POST['rating-input-1'];
  $comment =  $_POST['comment'];
  $recipientname = $_GET['user'];
  $username = $_SESSION['username'];
  $id = $_GET['id'];
  $feedback2 = $_GET['feedback'];
  //write the sql statement
  $query = "insert into FEEDBACK (username,recipientname,rating,comment) values
	('$username','$recipientname',{$feedback},'$comment')";
 if ($feedback2 == 'requester')
  $query2 = "update WAITINGFEEDBACK set feedbackforrequester='Left' where id='$id'";
 else
	$query2 = "update WAITINGFEEDBACK set feedbackforapprover='Left' where id='$id'"; 
   echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $result2 = mysql_query( $query2 );
  
  $db->close();

   header("Location: feedbackSuccess.php",true);

?>