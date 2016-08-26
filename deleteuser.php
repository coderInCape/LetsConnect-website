<?php
$userid8 = $_GET['id'];


 

  $query = "delete from USER where userid = '$userid8'";
  $query2 = "delete from FEEDBACK F,USER U where U.username = F.username and userid = '$userid8'";
  
 //echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  
  $db->close();
  if(!$result){
    echo "<script type='text/javascript'>alert('The action is not successful! Please try again')</script>" ; 
   
	
}
	else {
		 echo "<script type='text/javascript'>alert('The account is successfully deleted!')</script>";
		 header("Location: manageUserFunctionDeleteSuccess.php",true);
		//header("Location: manageUserFunctionSuccess.php",true);
	}
		
   

?>