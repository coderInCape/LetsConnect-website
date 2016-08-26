<?php
$itemid = $_GET['itemid'];
$username = $_GET['username'];
//echo ($username);
//echo ($itemid);
 //write the sql statement
  $query = "select * from REQUESTEDITEM where itemid = '$itemid' and username = '$username'";
  $query2 = "insert into REQUESTEDITEM (itemid,username) values ('$itemid','$username')";
  $query3 = "update ITEM set isrequested='YES' where itemid = '$itemid'";
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  if (mysql_num_rows($result)==0)
  {
		//echo ($result);
		$result2 = mysql_query( $query2 );
		$result3 = mysql_query( $query3 );
  }
  //close once finished to free up resources
  $db->close();
  //if ($result)
	  
?>
<html>
<div class="requestitembtns" id="requestitembtns">
					<a href='#' class='button'>Message User</a>
				
					<a href='#' >Requested</a>
				</div>
</html>				