<?php
session_start();
//echo ($_POST['itemname']);


		
		$username = $_SESSION['username']; 
		$wishedItemDescription = $_POST['wishedItemDescription'];
		$latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
		
  if (($latitude != null) and ($longitude != null)) 
  {//write the sql statement
  $query = "insert into REQUEST
	(username,description,latitude,longitude) values('$username','$wishedItemDescription',{$latitude},{$longitude})";
  }
  else 
  {
	$query = "insert into REQUEST
	(username,description) values('$username','$wishedItemDescription')";  
  }
   $query2 = "select * from REQUEST
	where description ='$wishedItemDescription'";
 // echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $result2 = mysql_query( $query2 );
  $row2 = mysql_fetch_array( $result2 );
  
  $db->close();
  if(!$result){
    echo ("<script type='text/javascript'>alert('Your account is not created! Please try again')</script>") ; 
   
	header("Location: clientPanelWishedPost.php",true);
}
	else {
		 $_SESSION['wishedItemDescription'] = $wishedItemDescription;
		 $_SESSION['wishid'] = $row2[0];
		 echo ("<script type='text/javascript'>alert('Your account is successfully created!')</script>");
	 header("Location: clientPanelWishedPostSuccess.php",true);
	}
		
   

?>