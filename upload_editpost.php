<?php
session_start();
//echo ($_POST['itemname']);
if ($_FILES["fileToUpload"] != null)
{
$target_dir = "uploads/";
if(!is_dir($target_dir. $_SESSION['username'] ."/")) {
    mkdir($target_dir. $_SESSION['username'] ."/");
}
$target_dir = $target_dir .$_SESSION['username'] ."/";

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
		chmod($target_file, 0755);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	}
}
}

		$_SESSION['uploaditemimage'] = $target_file;
		$_SESSION['itemname'] = $_POST['itemname']; 
		$_SESSION['description'] = $_POST['itemDescription'];
		$_SESSION['price'] = $_POST['price'];
		$category = $_POST['category'];
		
  //fetch username and password
  $itemname =  $_POST['itemname'];
  $itemDescription =  $_POST['itemDescription'];
  $price = $_POST['price'];
  $itemid = $_GET['itemid'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];
  
  if ($_FILES["fileToUpload"] == null)
  {
	  $query = "update ITEM set
	price = {$price},category ='$category',  itemname = '$itemname', latitude ='$latitude', longitude= '$longitude' where itemid = '$itemid'";
	$_SESSION['uploaditemimage'] = $_GET['image'];
  }
  //write the sql statement
  else
  {
  $query = "update ITEM set
	price = {$price},category ='$category',image = '$target_file', itemname = '$itemname', latitude ='$latitude', longitude= '$longitude' where itemid = '$itemid'";
 // echo ($query);
  }
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result = mysql_query( $query );
  
  $db->close();


    if ($_SESSION['usertype'] == "administrator") {
	 	
	 header("Location: manageDonationPostFunctionSuccess.php",true);
	}
	else
	header("Location: editDeleteDonationPostSuccess.php",true);
	 
?>