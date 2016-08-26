<?php 
session_start();
if($_SESSION['login']==1) {
    header('Location: loggedin.php');
}
else
	header('Location: index.php')
?>