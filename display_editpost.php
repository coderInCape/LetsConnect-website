<script>
    function getLocation2() {

         var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
         };

        function success(pos) {
           successFunction(pos);
        };

        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error,options);
        } else { 
            
        }
    }

    function successFunction(position) {
       var lat = position.coords.latitude;
       var longi = position.coords.longitude;

        $('#latitude').val(lat);
        $('#longitude').val(longi);
    }
   
</script>
<?php	
  session_start();
  $userid = $_SESSION['userid'];
  $username = $_SESSION['username'];
  $x= $_GET['x'];
  $query = "SELECT * FROM ITEM where itemid='$x'";	

  		
 // echo ($query);
			
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
	$itemid = $row['itemid'];
    $itemname = $row['itemname'];
	$description = $row['description'];
	$price = $row['price'];
	$image = $row['image'];
	$category = $row['category'];
	
	
?>

	<div class="functionContent">
					<div class="breadcrumbs">
						<h2>Edit Posts<span class="subtext"></span></h2>
					</div>
					<form action="upload_editpost.php?itemid=<?php echo ($itemid)?>&image=<?php echo ($row['image'])?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Your Donation Item Photo</label>
						<div class="success"><img src="<?php echo htmlspecialchars($row['image']); ?>"/> </img></div>
						<label>Change Your Donation Item Photo</label>
						<input id="itemPhoto" type="file" name="fileToUpload">
						<label >Your item Category</label>
						 <select name="category">
							  <option value="Tools">Tools</option>
							  <option value="Clothes">Clothes</option>
							  <option value="Electronics">Electronics</option>
						</select> <br><br>
						<label>Your item Description</label>
						<input id="itemname" name="itemname" required="required" type="text" value="<?php echo ($itemname) ?>"/>
						<label>Your item Price in AU$</label>
						<input type="number" id="price" name="price" min="0" max="999" value="<?php echo ($price) ?>">
						<div id="lo">
						<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	            <script src="ajax.js"></script>
						<label >Latitude</label>
						<input type="text" id="latitude" name="latitude" value="<?php echo ($row['latitude']) ?>" />
						<label >Longitude</label>
						<input type="text" id="longitude" name="longitude" value="<?php echo ($row['longitude']) ?>" />
						</div>
						<button type="button" class="button" onclick="getLocation2()">Tag location</button><br>
						<div><button type="submit" id="update" class="button" required="required">Add Donation Item Post</button></div>
					</form>	
						
						<form action="deletepost.php?itemid=<?php echo ($itemid)?>" method="post" enctype="multipart/form-data">
						<div><button type="submit" id="delete" class="button" required="required">Delete Post</button></div>
					</div>
					</form>
				</div>
<?php	
    
  }
  
   
	
   
   ?>
	
 
		