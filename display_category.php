<div class="content" id="content">
<article class="topContent">
			
				<span><li class="dropdown">
					<a class="dropdownBtn" id="smallerDropdown" href="#">Browse <br> By Category <i class="fa fa-caret-down"></i></a>
					<div class="dropdownContent">
						<a href="#" onclick="listcategory('Tools')" >Tools</a>
						<a href="#" onclick="listcategory('Clothes')">Clothes</a>
						<a href="#" onclick="listcategory('Electronics')">Electronics</a>
						<a href="#" onclick="listrequest()">Wish List</a>
					</div>
				</li></span>
				
				<span><input id="search1" type="text" name="search2" placeholder="Search"
				 onkeydown = "if (event.keyCode == 13)                        document.getElementById('btnSearch').click()"></span>
			
				<span><a href="#" id="btnSearch" onclick="showResult(getElementById('search2').value,'<?php echo $_GET['category']?>')" class="button">Search</a></span>
			
				
			</article>

<?php


	if ($_GET['category'] != null)
	{	
    $key = $_GET['category'];
	$GLOBALS['category'] = $key;
	$_SESSION['category'] = $_GET['category'];
	 $key = "'".$_GET['category']."'";
  
     $query = "SELECT *  
            FROM ITEM where category={$key}";
	}
	else
	{
		if ($_GET['keyword'] != null)
		{
			$key = "'".$_GET['keyword']."%'";
			$category = $_SESSION['category'];
			$query = "SELECT *  
            FROM ITEM where category={$category} and itemname like {$key}";

		}
	}
	
 //    echo ("'"."mark"."%'");
/* First, get the maximum order id from the database */

  //get the maximum order id from the database
//  alert("Key word is:"+$key);

 		
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
  if ($result == null)
  {
	  ?>
	  
	<article class="topContent" id="topContent">
				 <h1> <?php echo ($query)?> There is no item match your keyword</h1>
			</article>
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
	$username10 = $row['username'];
	//echo ($row['itemid']);
	$count++;
	?>

	
	<article class="topContent" id="topContent">
				<figure class="itemImage"><a echo href="itemdetails.php?x=<?php echo $row['itemid'] ?>"><img src="<?php echo htmlspecialchars($row['image']); ?>"/> </a></figure>
				
				<div class="contentInfo">
					<header>
						<h1><a href="itemdetails.php?x=<?php echo $row['itemid'] ?>" title="first post"><?php echo $row['itemname']; ?></a><h1>
					</header>
					<footer>
						<p class="post-info"> Posted by <?php echo $row['username']; ?></p> 
					</footer>
					<content>
						<p class="cost">  <?php if ($row['price'] == 0)
							echo ("free");
						else 
						{
							echo("$");
							echo ($row['price']);
						}?></p>
						<p class="usersRequestsCount"></p>
					</content>
				</div>
			</article>
			
  <?php  }
   if ($count==0)
   {
	?>   
	<article class="topContent" id="topContent">
				 <h1> There is no item match your keyword</h1>
			</article>
	
	<?php
	}
  }
  
 ?>
</div>
 <aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
		
		