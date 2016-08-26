<?php
if ($_POST['theme'] != "")
{
	if ($_POST['theme'] == "default")
	{
	copy("styles/default.css","styles/theme.css");
	copy("styles/default_nobodynoheader.css","styles/theme_nobodynoheader.css");
	}
    if ($_POST['theme'] == "facebook")
	{
	copy("styles/facebook.css","styles/theme.css");
	copy("styles/facebook_nobodynoheader.css","styles/theme_nobodynoheader.css");
	}
}
else
{
copy("styles/theme_nobodynoheader.css","styles/theme.css");

$file = fopen("styles/body.css","w+");
$color  = $_POST['color']; 
//echo ($color);
fwrite($file, $color);
fclose($file);

$text1 =  "body { background-color:";
$text2 = " ;font-family: 'Open Sans', sans-serif; }";
$body = $text1 . $color . $text2;

$file2 = fopen("styles/header.css","w+");
$color2  = $_POST['color2']; 
fwrite($file2, $color2);
fclose($file2);

$text3 = " .mainHeader{ position: fixed; top: 0; left: 0;bottom: 0; width: 100%; height: 3em;z-index: 2000; background-color: " ;	
$text4 = "	; } ";

$header = $text3 . $color2 . $text4 ;


$read = fopen("styles/theme_nobodynoheader.css","r");
while(!feof($read)) {
  $current .= fgetc($read);
}
fclose($read);


$text = $body . $header .$current ;
//echo ($text);
$file3 = fopen("styles/theme.css","w+");
fwrite($file3, $text);
fclose($file3);
}

header("Location: changeTheme.php",true);
    
?>