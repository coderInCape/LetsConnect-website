<?php

copy("styles/theme_nobody.css","styles/theme.css");

$text1 =  "body { background-color:";
$color  = $_POST['color']." ;"; 
$text2 = " font-family: 'Open Sans', sans-serif; }";

$read = fopen("styles/theme.css","r");
while(!feof($read)) {
  $current .= fgetc($read);
}
fclose($read);

$text = $text1 . $color . $text2 . $current;
//echo ($text);
$file = fopen("styles/theme.css","w+");
fwrite($file, $text);
fclose($file);

header("Location: adminPanel.php",true);
header("Location: adminPanel.php",true);
    
?>





.mainHeader{
	position: fixed;
	top: 0;
	left: 0;
	bottom: 0; 
	width: 100%; 
	background-color: #e67e22;
	height: 3em;
	z-index: 2000; 
}