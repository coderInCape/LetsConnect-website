<?php
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
		 } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
		$username9 = $_POST['username']; 
		$email9 = $_POST['email'];
		$password9 = $_POST['pass1'];
		$address9 = $_POST['address'];
		$userid9 = $_GET['userid'];
		
		
  if ($uploadOk = 0)
	  $query = "update USER
  set username = '$username9',password = '$password9' , address = '$address9', email ='$email9' where userid={$userid9}";
  else
  //write the sql statement
  $query = "update USER
  set username = '$username9',password = '$password9' , image = '$target_file', address = '$address9', email ='$email9' where userid={$userid9}";
 // echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  echo ($query);
  $db->close();
  if(!$result){
    echo "<script type='text/javascript'>alert('Your account is not created! Please try again')</script>" ; 
   
	//header("Location: register.php",true);
}
	else {
		
		 echo "<script type='text/javascript'>alert('Your account is successfully created!')</script>";
		header("Location: manageUserFunctionSuccess.php?userid=".$userid9,true);
	}
		
   

?>