<?php


	
	$key = $_GET['keyword'];
 //    echo ("'"."mark"."%'");
/* First, get the maximum order id from the database */

  //get the maximum order id from the database
//  alert("Key word is:"+$key);
if ($_GET["keyword"] == null) 
  $query = "SELECT *  
            FROM ITEM";
else		
{	
  $key = "'".$_GET['keyword']."%'";
  
  $query = "SELECT *  
            FROM ITEM where itemname like {$key}";		
   //echo ($query);
			}
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
  if ($result == null)
  {
	  ?>
	  
	 
	  <html>
	<article class="topContent" id="topContent">
				 <h1> There is no item match your keyword</h1>
			</article>
	</html>
	  <?php
  }
else{
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
	<html>
	<article class="topContent" id="topContent">
				<figure class="itemImage"><a echo href="itemdetails.php?x=<?php echo $row['itemid'] ?>"><img src="<?php echo htmlspecialchars($row['image']); ?>"/> </a></figure>
				
				<div class="contentInfo">
					<header>
						<h1><a href="itemdetails.php?x=<?php echo $row['itemid'] ?>" title="first post"><?php echo $row['itemname']; ?></a><h1>
					</header>
					<footer>
						<p class="post-info"><?php echo $row['description']; ?></p> 
					</footer>
					<content>
						<p class="cost"><?php echo $row['price']?></p>
						<p class="usersRequestsCount"></p>
					</content>
				</div>
			</article>
			
	</html>
  <?php  }
   if ($count==0)
   {
	?>   <html>
	<article class="topContent" id="topContent">
				 <h1> There is no item match your keyword</h1>
			</article>
	</html>
	<?php
	}
  }
  
 ?>
 
		