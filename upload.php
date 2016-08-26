<?php
session_start();
//echo ($_POST['itemname']);
$target_dir = "uploads/";
if(!is_dir($target_dir. $_SESSION['username'] ."/")) {
    mkdir($target_dir. $_SESSION['username'] ."/");
	chmod($target_dir. $_SESSION['username'] ."/", 0755);
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
		$_SESSION['uploaditemimage'] = $target_file;
		$_SESSION['itemname'] = $_POST['itemname']; 
		$_SESSION['description'] = $_POST['itemDescription'];
		$_SESSION['price'] = $_POST['price'];
		$username11 = $_SESSION['username'];
		$category = $_POST['category'];
		
  //fetch username and password
  $itemname12 =  $_POST['itemname'];
  $itemDescription12 =  $_POST['itemDescription'];
  $price12 = $_POST['price'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];
  
  if (($latitude == null) or  ($longitude == null))
  {
	 $query = "insert into ITEM
	(price,userid,image,itemname,username,category) values ({$price12},{$_SESSION['userid']},'$target_file', '$itemname12','$username11','$category')"; 
  }
  else
  //write the sql statement
  $query = "insert into ITEM
	(price,userid,image,itemname,username,category,latitude,longitude) values ({$price12},{$_SESSION['userid']},'$target_file', '$itemname12','$username11','$category',{$latitude},{$longitude})";
  //echo ($query);
  //including the connection page
  include('./connect_to_db.php');

  //get an instance
  $db = new Connection();

  //connect to database
  $db->connect();

  //query the database
  $result2 = mysql_query( $query );
  
  $db->close();
	//echo $query ;
	header("Location: clientPanelDonationPostSuccess.php",true);
    } 
}
?>