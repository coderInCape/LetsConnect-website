<?php
  //fetch username and password
  $username =  $_POST['username'];
  $password =  $_POST['password'];



  //write the sql statement
  $query = "select *
            FROM USER
            WHERE username = '$username' AND
                  password = '$password'";
  
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );

  

 
  if( mysql_num_rows( $result ) and (!strstr($password,' ')))
  { 
   $row = mysql_fetch_array( $result );
   session_start();
   $_SESSION['login']=1;
   $_SESSION['username']= $row['username']; // store the username for later use
   $_SESSION['userid']= $row['userid'];
   $_SESSION['firstname']= $row['firstname'];
   $_SESSION['lastname']= $row['lastname'];
   $_SESSION['userimage']= $row['image'];
   $_SESSION['year']= $row['year'];
   $_SESSION['usertype']= $row['usertype'];
   
   $query2 = "select count(*) from REQUESTEDITEM where username= '$username'";
   $result2 = mysql_query($query2);
   $row2 = mysql_fetch_array( $result2 );
   $_SESSION['requested'] = $row2[0];
   
   $query3 = "select count(*) from OFFEREDITEM where approver= '$username'";
   $result3 = mysql_query($query3);
   $row3 = mysql_fetch_array( $result3 );
   $_SESSION['offered'] = $row3[0];
   
   $query4 = "select count(*) from REQUEST where username= '$username'";
   $result4 = mysql_query($query4);
   $row4 = mysql_fetch_array( $result4 );
   $_SESSION['wished'] = $row4[0];
    //if user exists then forward it to pizza order page
	//close once finished to free up resources
   if ($_SESSION['usertype'] == "administrator")
   {
	   header("Location: adminPanel.php",true);
   }
   else
   header("Location: loggedin.php",true);
      //gets expanded to
      //header("Location: http://homepage.cs.latrobe.edu.au/sloke/lab5/solution/order_pizza.php?username=$username",true);
    exit();
  }
  else
  {
	  session_start();
   $_SESSION['login']=0;
    //else redirect to login page
    header("Location: login.php",true);
      //gets expanded to
      //header("Location: http://homepage.cs.latrobe.edu.au/sloke/lab5/solution/index.php?is_authenticated=no",true);
    exit();
      

  }
  $db->close();
?>
