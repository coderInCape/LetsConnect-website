<?php
session_start();
//echo ($_POST['itemname']);

$target_dir = "images/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$x=0;
while(file_exists($target_file))
{
	
	$target_file = $target_dir . $x . basename($_FILES["fileToUpload"]["name"]);
	$x++;
}
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		chmod($target_file, 0755);
		 } else {
        echo "Sorry, there was an error uploading your file.";
    }
}       
		if ($uploadOk == 1)
		    $_SESSION['uploaditemimage'] = $target_file;
		else 
		{
			$_SESSION['uploaditemimage'] = "images/avatar.png";
			$target_file = "images/avatar.png";
		}
		$username = $_POST['username']; 
		$email = $_POST['email'];
		$password = $_POST['pass1'];
		$address = $_POST['address'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		
		
		
 
  //write the sql statement
  $query = "insert into USER
	(username,password,firstname,lastname,usertype,image,year,address) values('$username','$password','$firstname','$lastname','user','$target_file', DATE_FORMAT(SYSDATE(), '%Y'),'$address')";
 echo ($query);
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
    echo ("<script type='text/javascript'>alert('Your account is not created! Please try again')</script>") ; 
   
	header("Location: register.php",true);
}
	else {
		 echo ("<script type='text/javascript'>alert('Your account is successfully created!')</script>");
		header("Location: login.php?x=true",true);
	}
		
   

?>