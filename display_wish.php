<?php	
  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $y= $_GET['y'];
  $query = "SELECT * FROM REQUEST where requestid='$y'";	

  		
  //echo ($query);
			
  //include the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  $db->close();
  
  while( $row = mysql_fetch_array( $result ))
  {
	  
	$rows[] = $row;
	$requestid = $row['requestid'];
	$description = $row['description'];
	
	
	
?>
		
				<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Edit Post <span class="subtext"></span></h2>
					</div>
					<form action="upload_editwish.php?requestid=<?php echo ($requestid)?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Your Wished Item Description</label>
						<input id="wishedItemDescription" name="wishedItemDescription" required="required" type="text" value="<?php echo $row['description']?>"/>
						<button type="submit" id="submit" class="button" required="required">Save Edited Wished Item Post</button>
					</form>	
					<form action="deletewish.php?requestid=<?php echo ($requestid)?>" method="post" enctype="multipart/form-data">
						<button type="submit" id="submit" class="button" required="required">Delete</button>
					</div>
					</form>
				</div>
<?php	
    
  }
  
   
	
   
   ?>
	
 
		