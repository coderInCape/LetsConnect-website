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
				 onkeydown = "if (event.keyCode == 13)
                        document.getElementById('btnSearch').click()"></span>
			
				<span><a href="#" id="btnSearch" onclick="showResult2(getElementById('search2').value)" class="button">Search</a></span>
			
				
			</article>
<?php
	
	$key = $_GET['keyword'];
 //    echo ("'"."mark"."%'");
/* First, get the maximum order id from the database */

  //get the maximum order id from the database
//  alert("Key word is:"+$key);
if ($_GET["keyword"] == null) 
  $query = "SELECT *  
            FROM REQUEST";
else		
{	
  $key = "'%".$_GET['keyword']."%'";
  
  $query = "SELECT *  
            FROM REQUEST where description like {$key}";		
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
  
  

  $count=0;
  if ($result == null)
  {
	  ?>
	  
	 
	  <html>
	<article class="topContent" id="topContent">
				 <h1> There is no item match your keyword </h1>
			</article>
	</html>
	  <?php
  }
else{
  while( $row = mysql_fetch_array( $result ))
  {
	//echo ($row['resquestname']);
    //fetch the higher order id
	$rows[] = $row;
    $itemname[] = $row['itemtname'];
	$description[] = $row['description'];
	$requestid[] = $row['requestid'];
	//echo ("test".$row['requestid']);
	$result2 = mysql_query("SELECT U.*  
            FROM USER U,REQUEST R 
			WHERE U.username = R.username and R.requestid = {$row['requestid']}");
	$row2 = mysql_fetch_array( $result2 );
	$imageurl[] = $row2['image'];
	$username[] = $row2['username'];
	$count++;
	//echo ("ok".$row2['username']);
	?>
	
	<html>
	<article class="topContent" id="topContent">
				<figure class="itemImage"><a echo href="resquestdetails.php?x=<?php echo $row['requestid'] ?>"><img src="<?php echo htmlspecialchars($row2['image']); ?>"/> </a></figure>
				
				<div class="contentInfo">
					<header>
						<h1><a href="resquestdetails.php?x=<?php echo $row['requestid'] ?>"><?php echo $row['description']; ?></a></h1>
					</header>
					<header>
						<h1></h1>
					</header>
					<content>
						
						<p class="usersresquestsCount"></p>
					</content>
				</div>
			</article>
	</html>
  <?php  }
   if ($count==0)
   {
	?>   <html>
	<article class="topContent" id="topContent">
				 <h1> There is no resquest match your keyword <?php echo $query?></h1>
			</article>
	</html>
	<?php
	}
  }
	//close once finished to free up resources
    $db->close();
 ?>
 </div>
 <aside class="advert">
			<a href="#"><img src="images/advert.jpg"> </a>
		</aside>
		