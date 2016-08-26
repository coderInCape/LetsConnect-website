<?php
	
	$key2 = $_GET['keyword'];
 //    echo ("'"."mark"."%'");
/* First, get the maximum order id from the database */

  //get the maximum order id from the database
//  alert("Key word is:"+$key);
	 
  $query = "SELECT *  
            FROM USER where username='$key2'";		
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
  $row = mysql_fetch_array( $result );
  if (strtolower($row['username']) == strtolower($key2))
  {
	  
	  ?>
	   
	<div id="checkusername">
	
	
						<h3 style="color:red;margin-left:30px;" ><font size="3">The username <?php echo ($row['username'])?> is not available!</font></h3>
						<div class="form-group">
						
						<div>
							Already a member ?
							<a href="login.php" class="to_register"> Go and log in </a>
						</div>
					</div>
						</div>

	  <?php
  }
  else
  {
	?>  
	<div id="checkusername">
				  <h3 style="color:green;margin-left:30px;"><font size="3">The username <?php echo ($row['username'])?> is available! You can use it</font></h3>

					<p> 
						<label> Your email</label>
						<input id="email" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 
					</p>
					<p> 
						<label>Your password </label>
						<input id="pass1" name="pass1" required="required" type="password" placeholder="eg. X8df!90EO"/>
						
					</p>
					<p> 
						<label>Please confirm your password </label>
						<input id="pass2" required="required" type="password" placeholder="eg. X8df!90EO"/>
					</p>
					<p>
						<label>Address</label>
						<input type="text" id="address" name="address" size="40" required>
					</p>
					<div class="form-group">
						<div id="signup">
						<button type="submit" id="submit" class="button">Sign up</button>
						</div>
						<div>
							Already a member ?
							<a href="login.php" class="to_register"> Go and log in </a>
						</div>
					</div>
						</div>
					
					
	
	<?php
  }
  
 ?>
 
		